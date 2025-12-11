<?php
include("header.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <style>
        * {
            font-family: 'poppons', sans-serif;
            box-sizing: border-box;
        }

        .header-container {
            margin: 0;
            padding: 0;
        }

        .header-container .title {
            display: flex;
            font-size: 1.1rem;
            padding: 10px;
            color: #13C5DD !important;
            align-self: center;
        }

        .title img {
            width: 70px;
            padding: 2px;
        }

        form {
            display: flex;
            width: 80%;
            flex-direction: column;
        }

        label {
            width: 20%;
            padding: 0px;
            margin: 0;
        }

        input {
            width: 100%;
            margin: 10px;
            margin-left: 30px;
            padding: 10px;
            border: 1px solid #c2c2c2;
            border-radius: 10px;
        }

        input[type="radio"] {
            width: 100px;
            margin-top: 0px;
            padding: 0;
        }

        input[type=submit] {
            background-color: #13c5dd;
            margin: auto;
            font-size: 1.3rem;
            font-weight: bolder;
            padding: 5px;
            width: 150px;
            text-align: center;
            border-radius: 20px;
        }

        .loginform {
            width: 80%;
            margin: auto;
            margin-top: 30px;
            text-align: center;
            margin-top: 150px;
            background-color: rgb(207, 237, 238);
            padding: 20px;
            border-radius: 20px;
        }

        .loginform label,
        select {
            width: fit-content;
            font-size: 1rem;
            font-weight: bolder;
            margin-bottom: 10px;
            margin-left: 70px;
        }

        .success {
            color: green;
            font-size: 1.5rem;
            text-align: center;
        }

        .unsuccess {
            color: red;
            font-size: 1.5rem;
            text-align: center;
        }

        .loginform {
            margin-top: 0px;
        }
    </style>
    <script type="text/javascript">
        function validateForm() {
            var name = document.forms["patientForm"]["patient_name"].value;
            var age = document.forms["patientForm"]["patient_age"].value;
            var id = document.forms["patientForm"]["patient_ID"].value;
            var gender = document.forms["patientForm"]["gender"].value;
            var phone = document.forms["patientForm"]["patient_phone"].value;

            if (name == "" || age == "" || id == "" || gender == "" || phone == "") {
                alert("All fields must be filled out");
                return false;
            }
            if (age < 0 || age >= 150) {
                alert("please enter a valid age!!!");
                return false;
            }
            var nameRegex = /^[A-Za-z\s]+$/; // Allows only letters and spaces
            if (!name.match(nameRegex)) {
                alert("Name must not contain numbers or special characters.");
                return false;
            }
            var phonePattern = /^[0-9]+$/; // Regex to match only numbers

            if (!phone.match(phonePattern)) {
                alert("Please enter a valid phone number without characters or special characters.");
                return false;
            }
            // Gender validation
            if (gender.toLowerCase() !== "male" && gender.toLowerCase() !== "female") {
                alert("Gender must be either Male or Female");
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
        <form name="patientForm" action="signup_patientdb.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <input type="text" name="patient_name" placeholder="full name">
            <input type="number" name="patient_age" placeholder="age">
            <input type="text" name="patient_ID" placeholder="Patient_ID">
            <input type="text" name="gender" placeholder="Gender">
            <input type="tel" name="patient_phone" placeholder="phone_number">
            <input type="submit" value="Register">
        </form>

        <div>
</body>

</html>
<?php
include("footer.php");

?>