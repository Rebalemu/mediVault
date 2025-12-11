<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signinsignup.css">
    <title>Sign Up</title>
    <style>
        .loginform {
            margin-top: 0px;
            width: 90%;
        }

        .login form input {
            width: 80%;

        }
    </style>
    <script type="text/javascript">
        function validateForm() {
            var id = document.forms["StaffForm"]["form_id"].value;
            var name = document.forms["StaffForm"]["form_name"].value;
            var username = document.forms["StaffForm"]["form_username"].value;
            var password = document.forms["StaffForm"]["form_password"].value;

            if (id == "" || name == "" || username == "" || password == "") {
                alert("please, fill the empty fields!");
                return false;
            }
            var nameRegex = /^[A-Za-z\s]+$/; // Allows only letters and spaces
            if (!name.match(nameRegex)) {
                alert("Name must not contain numbers or special characters.");
                return false;
            }

            // Password validation
            var passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
            if (!password.match(passwordRegex)) {
                alert("Password must have at least one capital letter, one number, and one special character.");
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="loginform">
        <?php
        if (isset($_SESSION['success'])) {
            echo "<div class='success'>" . $_SESSION['success'] . "</div>";
        } elseif (isset($_SESSION['unsuccess'])) {
            echo "<div class='unsuccess'>" . $_SESSION['unsuccess'] . "</div>";
        }
        unset($_SESSION['success']);
        unset($_SESSION['unsuccess']);
        ?>
        <form name="StaffForm" action="AddStaffdb.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <input type="text" name="form_id" placeholder="Staff's ID">
            <input type="text" name="form_name" placeholder="Staff's name">
            <input type="text" name="form_username" placeholder="Username">
            <input type="password" name="form_password" placeholder="Password">
            <input type="text" name="form_department" placeholder="Department">
            <input type="submit" value="Register">
        </form>
    </div>
</body>

</html>
<?php
include("footer.php");
?>