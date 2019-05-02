<?php $page_name = "Delete & Update Product";require "inc/header.php";?>

<div class="right">
    <h1><?php echo $page_name; ?></h1>
    <div class="filter">
    <table>
        <tr>
            <td>
                <label>filter product</label>
            </td>
        </tr>
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
                    <td></td>
                    <td>
                        <input type="submit" value="apply filters" name="submit-insert">
                    </td>
                </tr>
    </table>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td><label>id</label></td>
                    <td><label>name</label></td>
                    <td><label>price</label></td>
                    <td><label>image</label></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['sc_id'])):
                $sc_id = $_GET['sc_id'];
                $query_prod = "select * from products where sc_id='$sc_id'";
                $products = mysqli_query($conn, $query_prod);
                while ($product = mysqli_fetch_assoc($products)):
                $id = $product['p_id'];
                $name = $product['p_name'];
                $price = $product['price'];
                $img = $product['p_image'];?>

                    <tr>
                        <td><label><?php echo $id; ?></label></td>
                        <td><label><?php echo $name; ?></label></td>
                        <td><label><?php echo $price; ?></label></td>
                        <td><img src="<?php echo '../'.$img; ?>"></td>
                        <td><label><a class="edit" href="execute.php?op=edit&p_id='<?php echo $id; ?>'">edit</a></label></td>
                        <td><label><a class="delete" href="execute.php?op=delete&p_id='<?php echo $id; ?>'">delete</a></label></td>
                    </tr>
                <?php endwhile; endif;?>
            </tbody>
        </table>
    </div>
</div>

<?php require "inc/footer.php";?>