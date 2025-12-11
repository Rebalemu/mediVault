<?php
session_start();
include('db_connection.php');

$id = $_POST['patient_ID'];
$name = $_POST['patient_name'];
$age= $_POST['patient_age'];
$gender=$_POST['gender'];
$phone=$_POST['patient_phone'];


$sql = "INSERT INTO patients value ('$id','$name', '$age','$gender', '$phone')";
mysqli_query($con, $sql);
if (mysqli_affected_rows($con) >= 1) {
// $_SESSION['sessionname'];
$_SESSION['success'] = "Successfully Registred";
header("location: signup_patient.php");
} else {
$_SESSION['unsuccess'] = "Unsuccessfull";
header("location: signup_patient.php");
}
?>