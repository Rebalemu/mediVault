<?php

include("db_connection.php");


$appointment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];

    $sql = "SELECT *from appointment where patient_id = $patient_id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Your appointment date is: " . $row['appointment_date'];
    } else {
        echo "No appointment found for this patient ID.";
    }
}
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Appointment</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');

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
            padding: 5px;
            color: #13C5DD !important;
            align-self: center;
        }

        .title img {
            width: 70px;
            padding: 0px;

        }

        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif, sans-serif;

            text-align: center;
            padding: 50px;
        }

        .container {
            background-color: rgb(206, 249, 255);
            padding: 50px;
            margin: 100px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(65, 64, 64, 0.68);
            max-width: 500px;
            margin: auto;
        }

        input {
            margin-top: 10px;
            padding: 15px;
            width: 60%;
            border-radius: 15px;
            background-color: #f2f2f2;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 50%;
            padding: 10px;
            border-radius: 20px;
            margin: auto;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            box-shadow: 3px 4px 5px rgb(131, 238, 252);
            background-color: rgb(255, 255, 255);
            cursor: pointer;
        }
    </style>
</head>
<section class="header-container">
    <div class="title">
        <img src="images/fevicon.ico.png" alt="logo">
        <h1>MEDIVAULT</h1>
    </div>

    <body>
        <div class="container">
            <h2>Check Your Appointment</h2>
            <form method="post" action="appointment.php">
                <input type="text" name="patient_id" placeholder="Enter Patient ID" required><br>
                <button type="submit">Check Appointment</button>
            </form>
            <p><?php echo $appointment; ?></p>
        </div>
    </body>

</html>