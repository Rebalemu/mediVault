<?php
include("db_connection.php");
include("header.php");

$completed_requests = $con->query("SELECT * FROM lab_requests WHERE doctor_id = 1 AND status = 'Completed'")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Results</title>
</head>

<body>
    <div class="container">
        <h2>Completed Lab Requests</h2>
        <table border="1" width="700" bgcolor="azure" cellspacing="0" cellpadding="3" align="center">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Patient ID</th>
                    <th>Lab Tests</th>
                    <th>Results</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($completed_requests as $request): ?>
                    <tr>
                        <td><?= $request['id'] ?></td>
                        <td><?= $request['patient_id'] ?></td>
                        <td><?= $request['lab_tests'] ?></td>
                        <td><?= $request['result'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php include("footer.php"); ?>