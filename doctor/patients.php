<?php
include("header.php");
?>
<div class="data-container">
    <table border="1" width="700" bgcolor="azure" cellspacing="0" cellpadding="3" align="center">
        <tr>
            <td><b>Patient Name</b></td>
            <td><b>Patient Age</b></td>
            <td><b>Patient ID</b></td>
            <td><b>Gender</b></td>
            <td><b>Phone</b></td>
        </tr>
        <?php
        include('db_connection.php');
        if (isset($_SESSION['datasent'])) {
            $patientId = $_SESSION['datasent'];

            $sql = "SELECT * FROM patients WHERE patient_id='$patientId'";
            $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($result)) {
                        echo "
                        <tr>
                            <td align='center'>" . $row['patient_name'] . "</td>
                            <td align='center'>" . $row['patient_age'] . "</td>
                            <td align='center'>" . $row['patient_id'] . "</td>
                            <td align='center'>" . $row['gender'] . "</td>
                            <td align='center'>" . $row['phone'] . "</td> 
                        </tr>";
                    }
                }
                    ?>
                </table>

        <?php
        include("footer.php");
        ?>