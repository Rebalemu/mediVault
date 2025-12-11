<?php
include("header.php");
include("db_connection.php");

// Handle form submissions
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['lab_tests'])) { // Doctor sending tests
        $sql = "INSERT INTO lab_requests (patient_id, doctor_id, lab_tests) 
                VALUES (" . intval($_POST['patient_id']) . ", 1, '" . implode(", ", $_POST['lab_tests']) . "')";
        $message = $con->query($sql) ? "Lab request sent!" : "Error: " . $con->error;
    } elseif (isset($_POST['lab_results'])) { // Lab sending results
        $sql = "UPDATE lab_requests SET result = '" . htmlspecialchars($_POST['lab_results']) . "', status = 'Completed' 
                WHERE id = " . intval($_POST['request_id']);
        $message = $con->query($sql) ? "Lab results submitted!" : "Error: " . $con->error;
    } elseif (isset($_POST['payment_confirmed'])) { // Handle payment confirmation
        // Update the status of pending requests to 'In Progress' or similar
        $sql = "UPDATE lab_requests SET status = 'In Progress' WHERE status = 'Pending'";
        $message = $con->query($sql) ? "Payment confirmed and requests updated!" : "Error: " . $con->error;
    }
}

// Fetch requests
$pending_requests = $con->query("SELECT * FROM lab_requests WHERE status = 'Pending'")->fetch_all(MYSQLI_ASSOC);
$completed_requests = $con->query("SELECT * FROM lab_requests WHERE doctor_id = 1 AND status = 'Completed'")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab System</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        h2,
        h3 {
            text-align: center;
        }

        form div {
            margin-bottom: 15px;
        }

        input,
        textarea,
        button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }

        button {
            background: #13c5dd;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #13a3b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Laboratory Test System</h2>
        <?php if ($message) echo "<div>$message</div>"; ?>

        <!-- Pending Requests -->
        <h2>Pending Requests</h2>
        <table>
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Patient ID</th>
                    <th>Lab Tests</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pending_requests as $request): ?>
                    <tr>
                        <td><?= $request['id'] ?></td>
                        <td><?= $request['patient_id'] ?></td>
                        <td><?= $request['lab_tests'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form method="post" action="">
            <button type="submit" name="payment_confirmed">Confirm Payment</button>
        </form>
        <!-- Completed Requests -->
        <h2>Completed Requests</h2>
        <table>
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Lab Tests</th>
                    <th>Results</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($completed_requests as $request): ?>
                    <tr>
                        <td><?= $request['id'] ?></td>
                        <td><?= $request['lab_tests'] ?></td>
                        <td><?= $request['result'] ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="request_id" value="<?= $request['id'] ?>">
                                <textarea name="lab_results" placeholder="Enter results" required></textarea>
                                <button type="submit">Submit Results</button>
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