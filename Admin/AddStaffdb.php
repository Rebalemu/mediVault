<?php
session_start();
include('db_connection.php');
$id = $_POST['form_id'];
$name = $_POST['form_name'];
$username = $_POST['form_username'];
$password= $_POST['form_password'];
$department=$_POST['form_department'];


$sql = "INSERT INTO staff value ('$id','$name', '$username','$password', '$department')";
mysqli_query($con, $sql);
if (mysqli_affected_rows($con) >= 1) {
    // $_SESSION['sessionname'];
    $_SESSION['success'] = "Successfully Registered";
    header("location: AddStaff.php");
} else {
    $_SESSION['unsuccess'] = "Unsuccessful";
    header("location: AddStaff.php");
}
?>
