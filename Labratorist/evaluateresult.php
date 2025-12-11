<?php
include("db_connection.php");
include("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lab_results'])) {
    $request_id = intval($_POST['request_id']);
    $lab_results = htmlspecialchars($_POST['lab_results']);
    $sql = "UPDATE lab_requests SET result = '$lab_results', status = 'Completed' WHERE id = $request_id";
    $message = $con->query($sql) ? "Lab results submitted!" : "Error: " . $con->error;
}

$pending_requests = $con->query("SELECT * FROM lab_requests WHERE status = 'Pending'")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Examine</title>
    <style>
        form div {
            margin-bottom: 15px;
        }

        input,
        textarea,
        button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
        }

        button {
            background: #13c5dd;
            color: white;
            border-radius: 15px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #13c5dd;
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
        <h2>Pending Lab Requests</h2>
        <?php if (isset($message)) echo "<div>$message</div>"; ?>
        <table border="1" width="700" bgcolor="azure" cellspacing="0" cellpadding="3" align="center">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Lab Tests</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pending_requests as $request): ?>
                    <tr>
                        <td><?= $request['id'] ?></td>
                        <td><?= $request['lab_tests'] ?></td>
                        <td>
                            <form method="POST">
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