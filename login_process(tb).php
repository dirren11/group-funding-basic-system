<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "chama");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to fetch user data based on the provided username
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows === 1) {
        // User exists, fetch the data
        $user = $result->fetch_assoc();

        // Verify the password using password_verify()
        if (password_verify($password, $user["password"])) {
            // Successful login, redirect to the dashboard or the next page
            header("Location: index.php"); 
            exit();
        }
    }

    // Invalid credentials, redirect back to the login page with an error message
    header("Location: login.php?error=InvalidCredentials");
    exit();
}
?>
