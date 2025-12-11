<?php
include("header.php");

?>
<?php

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    include('db_connection.php');

    $sql = "SELECT  * FROM staff WHERE id='" . $_SESSION['id'] . "' and department='Labratorist'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $data = mysqli_fetch_array($result);
        if ($data) {
            echo "<font size='5' color='darkslategrey' >Name : " . $data['name'] . "</font><br>";
            echo "<font size='5' color='darkslategrey' >Username : " . $data['username'] . "</font><br>";
            echo "<font size='5' color='darkslategrey' >ID : " . $data['id'] . "</font><br>";
            echo "<font size='5' color='darkslategrey' >Job : " . $data['department'] . "</font><br>";
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
<?php
include("footer.php");

?>
