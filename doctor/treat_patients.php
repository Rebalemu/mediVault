<?php
include("db_connection.php");
include("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lab_tests'])) {
    $patient_id = intval($_POST['patient_id']);
    $lab_tests = implode(", ", $_POST['lab_tests']);
    $sql = "INSERT INTO lab_requests (patient_id, doctor_id, lab_tests, status) 
            VALUES ($patient_id, 1, '$lab_tests', 'Pending')";
    $message = $con->query($sql) ? "Lab request sent to reception!" : "Error: " . $con->error;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treat Patient</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>

<body>
    <div class="container">
        <h2>Send Lab Test Request</h2>
        <?php if (isset($message)) echo "<div>$message</div>"; ?>
        <form method="POST">
            <input type="hidden" name="patient_id" value="1">
            <h3>Chemistry</h3>
            <label><input type="checkbox" name="lab_tests[]" value="FBS"> FBS</label>
            <label><input type="checkbox" name="lab_tests[]" value="RBS"> RBS</label>
            <label><input type="checkbox" name="lab_tests[]" value="SGOT"> SGOT</label>
            <h3>Serology</h3>
            <label><input type="checkbox" name="lab_tests[]" value="HBsAg"> HBsAg</label>
            <label><input type="checkbox" name="lab_tests[]" value="Anti HCV Ab"> Anti HCV Ab</label>
            <h3>Hematology</h3>
            <label><input type="checkbox" name="lab_tests[]" value="CBC"> CBC</label>
            <label><input type="checkbox" name="lab_tests[]" value="Hemoglobin"> Hemoglobin</label>
            <button type="submit">Send to Reception</button>
        </form>
    </div>
</body>

</html>
<?php include("footer.php"); ?>