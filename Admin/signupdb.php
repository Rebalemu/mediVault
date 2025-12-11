<?php
session_start();
include('db_connection.php');
$id = $_POST['form_id'];
$name = $_POST['form_name'];
$username = $_POST['form_username'];
$password= $_POST['form_password'];


$sql = "INSERT INTO admin value ('$id','$name', '$username','$password')";
mysqli_query($con, $sql);
if (mysqli_affected_rows($con) >= 1) {
    // $_SESSION['sessionname'];
    $_SESSION['success'] = "Successfully Registred";
    header("location: signup.php");
} else {
    $_SESSION['unsuccess'] = "Unsuccessfull";
    header("location: signup.php");
}
?>
