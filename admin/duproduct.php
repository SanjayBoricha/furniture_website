<?php $page_name = "Delete & Update Product";require "inc/header.php";?>

<?php 
function main($limit,$page,$start)
{   
    if (isset($_GET['sc_id'])){
        $sc_id = $_GET['sc_id'];
        $query_prod = "select * from products where sc_id='$sc_id' limit $start,$limit";
    } else {
        $query_prod = "select * from products limit $start,$limit";
    }
    return $query_prod;
}

function pagination($conn,$pagi)
{
    $limit = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $query_prod = main($limit,$page,$start);
    $products = mysqli_query($conn, $query_prod);
    $result1 = mysqli_query($conn, "select count(p_id) as p_id from products");
    $prodCount = mysqli_fetch_assoc($result1);
    $total = $prodCount['p_id'];
    $pages = ceil($total/$limit);
    if ($pagi == true) {
    ?>
    <ul class="pagination">
        <li>
            <a href="duproduct.php?page=<?php if($page>1){ echo $page-1; }else { echo $page; } ?>"><</a>
        </li>
            <?php for($i = 1; $i <= $pages; $i++): ?>
        <li>
            <a <?php if(isset($page)): if($i == $page): echo 'class="active"'; endif; endif; ?> href="duproduct.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
            <?php endfor; ?>
        <li>
            <a href="duproduct.php?page=<?php if($page == $pages){ echo $page; }else{ echo $page+1; }?>">></a>
        </li>
    </ul>
    <?php
    }
    return $products;
}
?>

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
                pagination($conn,true);
                $new = pagination($conn,false);
                while ($product = mysqli_fetch_assoc($new)):
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
                <?php endwhile;?>
               
            </tbody>
        </table>
        
    </div>
</div>

<?php require "inc/footer.php";?>