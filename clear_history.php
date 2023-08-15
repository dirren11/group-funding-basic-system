<!-- clear_history.php -->
<?php
require_once 'db_config.php'; // Include the database configuration file

if (isset($_POST['clear_history'])) {
    // Query to delete all records from the contributions table
    $query = "DELETE FROM contributions";

    // Execute the query
    if ($conn->query($query) === TRUE) {
        echo "Contribution history cleared successfully.";
    } else {
        echo "Error clearing contribution history: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
