<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    include('db_connection.php');

    $sql = "SELECT  * FROM staff WHERE id='" . $_SESSION['id'] . "'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $data = mysqli_fetch_array($result);
        if ($data) {
            //echo "Welcome, " . $data['name'];
        } else {
            echo "User data not found.";
        }
    } else {
        die("Query Failed: " . mysqli_error($con));
    }
} else {
    $_SESSION['logintest'] = "Please enter login";
    header('location: signin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECEPTIONIST</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <section class="header-container">
        <div class="title">
            <img src="images/fevicon.ico.png" alt="logo">
            <h1>MEDIVAULT</h1>
        </div>
    </section>
    <div class="grid-main">
        <div class="left">
            <div><img src="images/receptionist.png" alt="receptionist"></div>
            <div><a href="home.php">Profile</a></div>
            <div><a href="search.php">search patient</a></div>
            <div><a href="payment.php">Payment</a></div>
            <div><a href="signup_patient.php">Register Patient</a></div>
            <div><a href="logout.php">Logout</a></div>
        </div>
        <div class="right">
            <div class="bar">
                <h1>Welcome to Receptionist Page</h1>
            </div>