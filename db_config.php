<?php
// Replace these values with your actual MySQL server credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chama";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection and display an error message if it fails
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
