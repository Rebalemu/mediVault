<?php
session_start();
include('db_connection.php');

$id=$_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * from admin WHERE id='$id' and username = '$username' ";
$result = mysqli_query($con, $sql);
if (mysqli_affected_rows($con)>=1) {
    $data = mysqli_fetch_array($result);
    if ($data['password'] == $password) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['id'] = $data['id'];
        header("location: home.php");
    } else {
        $_SESSION['logintest'] = "Incorrect password";
        header("location: signin.php");
    }
} else {
    $_SESSION['logintest'] = "Incorrect username";
    header("location: signin.php");
}
