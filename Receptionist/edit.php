<?php

session_start();
include('db_connection.php');
$id = $_POST['form_id'];
$name = $_POST['form_name'];
$username = $_POST['form_username'];
$password = $_POST['form_password'];

$sql="UPDATE users set col_name='$name',col_username='$username',col_password='$password'  WHERE col_ID='$id'";
mysqli_query($con, $sql);
if (mysqli_affected_rows($con) >= 1) {
    // $_SESSION['sessionname'];
    $_SESSION['success'] = "Successfully Edited";
    header("location: signup.php");
} else {
    $_SESSION['unsuccess'] = "Unsuccessfull";
    header("location: edit.php");
}
?>

<?php
include("header.php");

?>

<div class="loginform">
    <?php
    // session_start();
    if (isset($_SESSION['success'])) {
        echo "<div class='success'>" . $_SESSION['success'] . "</div>";
    } elseif (isset($_SESSION['unsuccess'])) {
        echo "<div class='unsuccess'>" . $_SESSION['unsuccess'] . "</div>";
    }
    unset($_SESSION['success']);
    unset($_SESSION['unsuccess']);
    $id = $_GET['id'];
    $sql = "SELECT * FROM admin where col_ID='$id'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);
    ?>
    <form action="edit.php" method="post" enctype="multipart/form-data">
        <input type="text" name="form_id" value="<?php echo $data['ID']; ?>" readonly>
        <input type="text" name="form_name" value="<?php echo $data['name']; ?>">
        <input type="text" name="form_username" value="<?php echo $data['username']; ?>">
        <input type="password" name="form_password" value="<?php echo $data['password']; ?>">
        <input type="submit" value="Update">
    </form>

</div>
<?php
include("footer.php");

?>