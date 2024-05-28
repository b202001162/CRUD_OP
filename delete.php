<?php

include 'config.php';

// check if the id parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // delete the record from the database
    $sql = "DELETE FROM students WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "Record deleted successfully";
        header('location: view.php');
    } else {
        echo "Error deleting record: " . $connection->error;
    }
} else {
    echo "Invalid request";
}
