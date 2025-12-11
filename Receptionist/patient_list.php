<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .button {
            margin: 40px;
            padding: 8px 15px;
            background-color:rgb(81, 171, 223);
            color: white;
            border-radius: 15px;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .button a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <button class="button"><a href="../doctor/patients.php">See Patient list</a></button>
</body>

</html>

<?php
include("footer.php");
?>