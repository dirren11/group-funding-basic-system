<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection credentials
    $db_host = "localhost";
    $db_user = "root"; 
    $db_pass = "";
    $db_name = "chama";

    // Establish a database connection
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve form data
    $name   = $_POST["name"];
    $amount = $_POST["amount"];
    $reason = $_POST["reason"];

    // Sanitize the form data to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $amount = mysqli_real_escape_string($conn, $amount);
    $reason = mysqli_real_escape_string($conn, $reason);

    // Your code to insert the deduction data into the database
    // For example, you can use an SQL INSERT query to add the data to the "deductions" table
    $sql = "INSERT INTO penalties ( name, amount, reason) VALUES ('$name', '$amount', '$reason')";

    if (mysqli_query($conn, $sql)) {
        echo "Penalty applied successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
