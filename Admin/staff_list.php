<?php
include("header.php");

?>
<div class="data-container">
    <table border="1" width="700" bgcolor="azure" cellspacing="0" cellpadding="3" align="center">
        <tr>
            <td><b>Staff ID</b></td>
            <td><b>Staff Name</b></td>
            <td><b>Staff username</b></td>
            <td><b>Staff Password</b></td>
            <td><b>Staff Department</b></td>
            <td><b>Update</b></td>
            <td><b>Delete </b></td>
        </tr>
        <?php
        $sql = "SELECT *from staff";
        $result = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($result)) {
            echo "<tr>
            <td>" . $data['id'] . "</td>
            <td>" . $data['name'] . "</td>
            <td>" . $data['username'] . "</td>
            <td>" . $data['password'] . "</td>
            <td>".$data['department']."</td>
            <td><a href='update.php?id=" . $data['id'] . "'><img src='images/edit.jpg' width='20'></a></td>
            <td><a href='delete_staff.php?id=" . $data['id'] . "'><img src='images/remove.png'width='20'></a></td>
    </tr>";
        }
        ?>
    </table>
</div>
<?php
include("footer.php");

?>