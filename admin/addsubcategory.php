<?php $page_name = "Add Sub Category";require "inc/header.php";?>

<div class="right">
    <h1><?php echo $page_name; ?></h1>
    <div class="form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
                        <label>sub category name</label>
                    </td>
                    <td>
                        <input type="text" name="subcat">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="insert new sub category" name="submit-insert">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php require "inc/footer.php";?>