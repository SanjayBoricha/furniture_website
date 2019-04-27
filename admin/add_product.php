<?php $page_name = "Add Product";require "inc/header.php";?>

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
                        <input type="text" name="pname" placeholder="eg.chronicle sofa">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>product image</label>
                    </td>
                    <td>
                        <input type="file" name="p_img" placeholder="img">
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
    $prod_name = $_POST['pname'];
    $prod_img = $_FILES['p_img'];

    $prod_img_name = $prod_img['name'];
    $prod_img_type = $prod_img['type'];
    $prod_img_location = $prod_img['tmp_name'];
    $prod_img_size = $prod_img['size'];
    $prod_img_error = $prod_img['error'];

}

?>
<script type="text/javascript">
var sel1 = document.querySelector('#sel1');
var sel2 = document.querySelector('#sel2');
var options2 = sel2.querySelectorAll('option');

function giveSelection(selValue) {
    sel2.innerHTML = '';
    for (var i = 0; i < options2.length; i++) {
        if (options2[i].dataset.option === selValue) {
            sel2.appendChild(options2[i]);
        }
    }
}
giveSelection(sel1.value);
</script>
<?php require "inc/footer.php";?>