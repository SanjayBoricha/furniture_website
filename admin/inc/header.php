<?php
session_start();
require "../config/config.php";
require "../config/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page_name . " | " . $app_name; ?></title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="left">
        <ul>
            <li>hi , <?php echo $_SESSION['uname']; ?></li>
            <li><a href="../logout.php">logout</a></li>
            <br>
            <br>
            <li><a href="index.php">dashbord</a></li>
            <li><a href="addproduct.php">add product</a></li>
            <li><a href="duproduct.php">delete & update product</a></li>
            <li><a href="addcategory.php">add category</a></li>
            <li><a href="addsubcategory.php">add sub category</a></li>
        </ul>
    </div>