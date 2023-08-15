<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the user input (you can add more validation as needed)
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_FLOAT);

    // Validate if the amount is a valid positive number
    if ($amount <= 0) {
        echo "Invalid contribution amount. Please enter a valid positive number.";
    } else {
        // Database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "chama";

        // Create a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL query to insert the contribution into the database
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO contributions (date, name, amount) VALUES (CURDATE(), ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sd", $name, $amount);

        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            echo "Contribution added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    }
}
?>
