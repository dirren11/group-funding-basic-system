<?php
// server.php


$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "chama";

// Initialize a connection to the database
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to hash the password using PHP's password_hash function
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Signup (Create an account)
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = hashPassword($_POST['psw']); // 'psw' is the name attribute of the password input field
    $email = $_POST['email'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User with the same username or email already exists
        echo "User with the same username or email already exists.";
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $email);
        if ($stmt->execute()) {
            echo '<script>alert("User registered successfully.");</script>';
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

// Login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // You should add proper validation and sanitization for user input here

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // User found and password matches, login successful
            echo '<script>alert("Login successful.");</script>';
        } else {
            // Incorrect password
            echo "Invalid password.";
        }
    } else {
        // User not found
        echo "Invalid username or password.";
    }
}

// Close the database connection
$conn->close();
?>
