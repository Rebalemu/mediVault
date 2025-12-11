<?php
session_start();
include('db_connection.php');



$id = $_GET['id'];  // Get the ID from the URL

// SQL query to delete the user from the database based on the ID
$sql = "DELETE FROM staff WHERE id = '$id'";  // Assuming you're deleting from the 'staff' table

if (mysqli_query($con, $sql)) {
    // If the query was successful, set a success session and redirect
    header("location: staff_list.php");  // Redirect to the staff list page
    exit();
} else {
    // If there was an error, set an error session and redirect
    header("location: staff_list.php");  // Redirect back to the staff list page
    exit();
}
