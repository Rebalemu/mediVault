<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signinsignup.css">
    <title>Receptionist Sign In</title>
    
</head>
<body>
    <section class="header-container">
        <div class="title">
            <img src="images/fevicon.ico.png" alt="logo">
            <h1>MEDIVAULT</h1>
        </div>
    </section>
    <div class="loginform">
        <?php
        session_start();
        if (isset($_SESSION['logintest'])) {
            echo "<div class='success'>" . $_SESSION['logintest'] . "</div>";
        }
        // unset($_SESSION['success']);
        unset($_SESSION['logintest']);
        ?>
        <form action="checklogin.php" method="post" enctype="multipart/form-data">
            <input type="text" name="id" placeholder="Receptionist's ID">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login">
        </form>
        
    </div>
</body>

</html>