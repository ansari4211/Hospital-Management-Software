<!-- delete.php -->
<?php
include 'conn.php';

if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];

    $sql = "DELETE FROM hospital WHERE Id='$Id'";

    if (mysqli_query($conn, $sql)) {
        header('location: index.php');
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
