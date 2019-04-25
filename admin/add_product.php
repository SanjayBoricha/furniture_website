<?php $page_name = "Add Product";require "inc/header.php";?>

<div class="right">
    <h1><?php echo $page_name; ?></h1>
    <div class="form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="pname">
            <select name="sub_cat">
                <?php
$query_sub_cat = "select * from sub_cat where category='$category_name'";
$result_sub_cat = mysqli_query($conn, $query_sub_cat);
while ($row_sub_cat = mysqli_fetch_assoc($result_sub_cat)):
    $sub_cat_id = $row_sub_cat['sc_id'];
    $sub_category_name = $row_sub_cat["sc_name"];?>

                <option value="<?php echo $sub_cat_id; ?>"><?php echo $sub_category_name; ?></option>

                <?php endwhile;?>
            </select>
            <input type="submit" value="insert">
        </form>
    </div>
</div>

<?php require "inc/footer.php";?>