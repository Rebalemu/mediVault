<?php
include("db_connection.php");
include("header.php");

$pending_requests = $con->query("SELECT * FROM lab_requests WHERE status = 'Pending'")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reception/Payment</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>

<body>
    <div class="container">
        <h2>Pending Lab Requests</h2>
        <table border="1" width="700" bgcolor="azure" cellspacing="0" cellpadding="3" align="center">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Patient ID</th>
                    <th>Lab Tests</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pending_requests as $request): ?>
                    <tr>
                        <td><?= $request['id'] ?></td>
                        <td><?= $request['patient_id'] ?></td>
                        <td><?= $request['lab_tests'] ?></td>
                        <td>
                            <form action="../Labratorist/evaluateresult.php" method="POST">
                                <input type="hidden" name="request_id" value="<?= $request['id'] ?>">
                                <button type="submit">Send to Lab</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php include("footer.php"); ?>