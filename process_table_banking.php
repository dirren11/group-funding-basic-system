<?php
// Include the database configuration
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $contribution_amount = $_POST['contribution_amount'];
    $date_column = $_POST['date_column'];

    // Insert the data into the database
    $query = "INSERT INTO table_banking (name, contribution_amount, date_column) VALUES ('$name', '$contribution_amount', '$date_column')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Data inserted successfully
        // Redirect back to the table_banking.php page
        header('Location: table_banking.php');
        exit;
    } else {
        // Error occurred during data insertion
        echo "Error: " . mysqli_error($conn);
    }
}
?>
