<?php $page_name = "Add Product";require "inc/header.php";error_reporting(0);?>

<div class="right">
    <h1><?php echo $page_name; ?></h1>
    <div class="form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <label>category</label>
                    </td>
                    <td>
                    <select name="cat" id="sel1" onchange="giveSelection(this.value)">
                        <?php 
                        $query_cat = "select * from category";
                        $result_cat = mysqli_query($conn, $query_cat);

                        while ($row_cat = mysqli_fetch_assoc($result_cat)):
                        $cat_id = $row_cat['c_id'];
                        $category_name = $row_cat["c_name"];
                        ?>

                        <option value="<?php echo $cat_id; ?>"><?php echo $category_name; ?></option>

                        <?php endwhile;?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>sub category</label>
                    </td>
                    <td>
                    <select name="sub_cat" id="sel2">

                    <?php 
                    $query_sub_cat = "select * from sub_cat";
                    $result_sub_cat = mysqli_query($conn, $query_sub_cat);

                    $row_sub_cat = mysqli_fetch_all($result_sub_cat);

                    $x = 1;

                    for ($i = 0; $i <= sizeof($row_sub_cat); $i++):
                        $sub_cat_id = $row_sub_cat[$i][0];
                        $sub_cat_name = $row_sub_cat[$i][1];
                        $cat_name = $row_sub_cat[$i][2];
                        if ($sub_cat_id > 0):
                            if ($row_sub_cat[$i + 1][2] != $row_sub_cat[$i][2]):
                                $x++;
                    ?>
                        <option data-option="<?php echo $x-1; ?>" value="<?php echo $sub_cat_id; ?>">
                        <?php echo $sub_cat_name; ?></option>

                    <?php else: ?>

                    <option data-option="<?php echo $x; ?>" value="<?php echo $sub_cat_id; ?>">
                        <?php echo $sub_cat_name; ?></option>

                    <?php   
                            endif;
                        endif;
                    endfor;
                    ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>product name</label>
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="eg.chronicle sofa">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>product price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="eg. 2000">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Brand name</label>
                    </td>
                    <td>
                        <input type="text" name="brand">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>description</label>
                    </td>
                    <td>
                        <textarea cols="50" rows="6" name="description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>features</label>
                    </td>
                    <td>
                        <textarea name="features" cols="50" rows="6"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>weight</label>
                    </td>
                    <td>
                        <input type="text" name="weight">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>specification</label>
                    </td>
                    <td>
                        <input type="text" name="specification">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>product image</label>
                    </td>
                    <td>
                        <input type="file" name="img" placeholder="img">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="reset" value="reset" class="reset">
                    </td>
                    <td>
                        <input type="submit" value="insert new product" name="submit-insert">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php 

if (isset($_POST['submit-insert'])) {
    $sub_cat = $_POST['sub_cat'];
    $prod_name = $_POST['name'];
    $prod_price = $_POST['price'];
    $prod_img = $_FILES['img'];

    $prod_img_name = $prod_img['name'];
    $prod_img_type = $prod_img['type'];
    $prod_img_location = $prod_img['tmp_name'];
    $prod_img_size = $prod_img['size'];
    $prod_img_error = $prod_img['error'];

    if (empty($sub_cat) || empty($prod_name) || empty($prod_img_name)) {
        header('Location: ?error=emptyfield');
        exit();
    } else {

        $query1 = "SELECT MAX(p_id) FROM products";
		$result1 = mysqli_query($conn, $query1);
		$row = mysqli_fetch_assoc($result1);			
		$last_prod_id = $row['MAX(p_id)']+1;

        $fileExt = explode('.', $prod_img_name);
        $fileActualExt = strtolower(end($fileExt));
        $prod_img_new_location = '../image/sub_cat/'.$sub_cat.'/'.$last_prod_id.'.'.$fileActualExt;

        move_uploaded_file($prod_img_location,$prod_img_new_location);

        $p_image = 'image/sub_cat/'.$sub_cat.'/'.$last_prod_id.'.'.$fileActualExt;

        $insert_prod_query = "insert into products(p_id,sc_id,p_name,price,p_image) values('$last_prod_id','$sub_cat','$prod_name','$prod_price','$p_image')";
        
        if (mysqli_query($conn,$insert_prod_query)) {
            header('Location: ?success');
        } else {
            echo "ERROR";
        } 
    }
}

?>

<?php require "inc/footer.php";?>