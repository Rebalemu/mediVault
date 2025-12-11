<?php
session_start();
include("header.php");
include('db_connection.php');

// Validate if ID is provided
if (!isset($_GET['id'])) {
    $_SESSION['unsuccess'] = "Invalid ID";
    header("location: staff_list.php");
    exit();
}

$id = $_GET['id'];

// Fetch staff data from the database
$sql = "SELECT * FROM staff WHERE id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password =$_POST['password']; // Hash the password
    $department = $_POST['department'];

    // Update staff data using prepared statements
    $update_sql = "UPDATE staff SET name=?, username=?, password=?, department=? WHERE id=?";
    $stmt = mysqli_prepare($con, $update_sql);
    mysqli_stmt_bind_param($stmt, 'ssssi', $name, $username, $password, $department, $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_affected_rows($con) >= 1) {
        $_SESSION['success'] = "Successfully Updated";
    } else {
        $_SESSION['unsuccess'] = "Update failed";
    }
    header("location: staff_list.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
        }

        input {
            width: 70%;
            margin: 10px;
            margin-left: 50px;
            padding: 10px;
            border: 1px solid #c2c2c2;
            border-radius: 10px;
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
            width: 90%;
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
    </style>
</head>

<body>
    <div class="loginform">
        <?php
        if (isset($_SESSION['success'])) {
            echo "<div class='success'>" . $_SESSION['success'] . "</div>";
            unset($_SESSION['success']);
        } elseif (isset($_SESSION['unsuccess'])) {
            echo "<div class='unsuccess'>" . $_SESSION['unsuccess'] . "</div>";
            unset($_SESSION['unsuccess']);
        }
        ?>

        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <input type="text" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required minlength="3" maxlength="50">
            <input type="text" name="username" value="<?php echo htmlspecialchars($data['username']); ?>" required pattern="^[a-zA-Z0-9_]{3,20}$" title="Username should be 3-20 characters and contain only letters, numbers, or underscores.">
            <input type="password" name="password" placeholder="Enter new password" required minlength="6" maxlength="50">
            <input type="text" name="department" value="<?php echo htmlspecialchars($data['department']); ?>" required>
            <input type="submit" name="edit" value="Update">
        </form>
    </div>
</body>

</html>
<?php
include("footer.php");
?>