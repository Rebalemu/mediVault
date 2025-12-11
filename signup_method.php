
<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected role
    if (isset($_POST['user'])) {
        $selectedRole = $_POST['user'];

        // Redirect to the corresponding signup page
        switch ($selectedRole) {
            case 'receptionist':
                header('Location: Receptionist/signin.php');
                exit();
            case 'doctor':
                header('Location: doctor/signin.php');
                exit();
            case 'labratorist':
                header('Location: labratorist/signin.php');
                exit();
            case 'admin':
                header('Location: Admin/signin.php');
                exit();
            default:
                // Handle invalid role (optional)
                echo '<script>alert("Please select a valid role.");</script>';
                break;
        }
    } else {
        // No role selected
        echo '<script>alert("Please select a role.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Method</title>
    <link rel="stylesheet" href="signup_method.css">
</head>

<body>

    <section class="header-container">
        <div class="title">
            <img src="images/fevicon.ico.png" alt="logo">
            <h1>MEDIVAULT</h1>
        </div>
    </section>

    <form class="body" method="post">
        <h1>Join as staff or Admin</h1>
        <div class="choose-box">
            <div class="user">
                I'm Receptionist,<br> that manage patient information<br>
                <input type="radio" name="user" id="receptionist" value="receptionist">
            </div>
            <div class="user">
                I'm a Doctor,<br>that treats patients. <br><br>
                <input type="radio" name="user" id="doctor" value="doctor">
            </div>
            <div class="user">
                I'm a Labratorist,<br>that tests patient results.<br>
                <input type="radio" name="user" id="labratorist" value="labratorist">
            </div>
            <div class="user">
                I'm an Admin,<br>that manages system information.<br>
                <input type="radio" name="user" id="admin" value="admin">
            </div>
        </div>
        <input type="submit" value="Sign In" id="Sign_up">
    </form>

</body>

</html>