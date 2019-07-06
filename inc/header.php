<?php
session_start();

if (isset($_SESSION['u_type'])) {
    if ($_SESSION['u_type'] == 'admin') {
        header('Location: admin/');
        exit();
    }
}

require "config/db.php";
require "config/config.php";
require "unirest-php-master/src/unirest.php";
$query_cat = "select * from category";
$result_cat = mysqli_query($conn, $query_cat);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $app_name; ?></title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>
        <div class="nav">
            <div class="logo">
                <h1><a href="index.php"><?php echo $app_name; ?></a></h1>
            </div>
            <div class="search">
                <p>Search</p>
                <input type="search" name="search" id="search">
            </div>
            <div class="account">
                <a href="signin.php" class="item">Sign In</a>
                <div class="item">
                    <p>Account</p>
                    <?php if (isset($_SESSION['uname'])): ?>
                    <ul class="dropdown">
                        <li><a href="#">Account</a></li>
                        <li><a href="#">My Orders</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Recently Viewed</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="logout.php">Sign Out</a></li>
                    </ul>
                    <?php else:?>
                    <ul class="dropdown">
                        <li><a href="#">Recently Viewed</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="signin.php">Sign In</a></li>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="item">
                    <p>Cart</p>
                </div>
            </div>
        </div>
        <ul>
            <?php while ($row_cat = mysqli_fetch_assoc($result_cat)):
    $category_name = $row_cat["c_name"];?>
            <li><?php echo $category_name; ?>
                <div class="dropdown">
                    <?php
                $query_sub_cat = "select * from sub_cat where category='$category_name'";
                $result_sub_cat = mysqli_query($conn, $query_sub_cat);
                while ($row_sub_cat = mysqli_fetch_assoc($result_sub_cat)):
                    $sub_cat_id = $row_sub_cat['sc_id'];
                    $sub_category_name = $row_sub_cat["sc_name"];

                    if (isset($_GET['sc_id'])):
                        if ($sub_cat_id == $_GET['sc_id']):
                            ?>
                            <ul>
                                <a href="products.php?sc_id=<?php echo $sub_cat_id; ?>">
                                    <li class="active"><?php echo $sub_category_name; ?></li>
                                </a>
                            </ul>
                            <?php
                        else:
                    ?>
                    <ul>
                        <a href="products.php?sc_id=<?php echo $sub_cat_id; ?>">
                            <li><?php echo $sub_category_name; ?></li>
                        </a>
                    </ul>
                    <?php endif; else: ?>
                    <ul>
                        <a href="products.php?sc_id=<?php echo $sub_cat_id; ?>">
                            <li><?php echo $sub_category_name; ?></li>
                        </a>
                    </ul>
                    <?php endif; endwhile;?>

                </div>
            </li>
            <?php endwhile;?>
        </ul>
    </header>