<?php
include("header.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header-container {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center;
        }

        .title {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .title img {
            max-width: 50px;
            margin-right: 10px;
        }

        /* Search Section styles */
        #search {
            text-align: center;
            margin-top: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            width: 200px;
            margin-right: 10px;
            border-radius: 10px;
        }

        .button {
            padding: 5px 15px;
            background-color: #13c5dd;
            color: #fff;
            font-size: 1.15rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        .sendid {
            margin-left: 80px;
            margin-top: 20px;
            padding: 5px;
        }

        .sendid input {
            margin: 10px;
        }
    </style>
</head>

<body>
    <div>
        <h3 id="search">Search Section</h3>
        <form method="post" action="search.php">
            <input type="text" id="patientId" name="patientId" placeholder="Search by Patient ID...">
            <button type="submit" class="button">Search</button>
        </form>
    </div>
    <?php
    include('db_connection.php');

    if (isset($_POST['patientId'])) {
        $patientId = $_POST['patientId'];

        $sql = "SELECT * FROM patients WHERE patient_id='$patientId'";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
    ?>
            <table width='100%' border="1">
                <tr>
                    <th>FULL NAME</th>
                    <th>Age</th>
                    <th>Patient_ID</th>
                    <th>Gender</th>
                    <th>Phone</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <tr>
                            <td align='center'>" . $row['patient_name'] . "</td>
                            <td align='center'>" . $row['patient_age'] . "</td>
                            <td align='center'>" . $row['patient_id'] . "</td>
                            <td align='center'>" . $row['gender'] . "</td>
                            <td align='center'>" . $row['phone'] . "</td> 
                        </tr>";
                }
                ?>
            </table>
    <?php
        } else {
            echo "No records found.";
        }
    }
    ?>


    <div class="sendid">
        <h3>Send patient's ID to the doctor.</h3>
        <form method="post" action="patient_list.php">
            <input type="text" id="patient_id" name="patient_id" placeholder="Enter Patient ID to Send"><br>
            <input type="submit" value="Send" class="button">
        </form>
    </div>
    <?php

    if (isset($_POST['patient_id'])) {
        $_SESSION['datasent'] = $_POST['patient_id'];

        $sql = "SELECT * FROM patients WHERE patient_id='" . $_SESSION['datasent'] . "'";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
    ?>
            <table width='100%' border="1">
                <tr>
                    <th>Patient_ID</th>
                </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                        <tr>
                            <td align='center'>" . $row['patient_id'] . "</td>
                        </tr>";
            }
        }
            ?>
            </table>
        <?php
    }
        ?>

</body>

</html>

<?php
include("footer.php")
?>