<?php require "inc/header.php";

if (isset($_GET['sc_id'])):
    $sc_id = $_GET['sc_id'];

    $limit = 12;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $query_prod = "select * from products where sc_id='$sc_id' limit $start,$limit";
    $products = mysqli_query($conn, $query_prod);
    
    $result1 = mysqli_query($conn, "select count(p_id) as p_id from products where sc_id='$sc_id'");
    $prodCount = mysqli_fetch_assoc($result1);
    $total = $prodCount['p_id'];
    $pages = ceil($total/$limit);
    ?>
<div class="products">
    <?php while ($product = mysqli_fetch_assoc($products)):
        $id = $product['p_id'];
        $name = $product['p_name'];
        $price = $product['price'];
        $img = $product['p_image'];?>

    <div class="product-card">
        <a href="product.php?p_id=<?php echo $id; ?>">
            <div class="product-img">
                <img src="<?php echo $img; ?>">
            </div>
            <div class="product-content">
                <p class="product-name">
                    <?php echo $name; ?>
                </p>
                <p class="product-price"><?php echo '<img src="image/INR.svg"/>',$price; ?></p>
            </div>
        </a>
    </div>
        
    <?php endwhile;?>
</div>
        <ul class="pagination">
            <li>
                <a href="products.php?sc_id=<?php echo $sc_id; ?>&page=<?php if($page>1) echo $page-1; else echo $page; ?>"><</a>
            </li>
            <?php for($i = 1; $i <= $pages; $i++): ?>
            <li>
                <a <?php if(isset($page)): if($i == $page): echo 'class="active"'; endif; endif; ?> href="products.php?sc_id=<?php echo isset($sc_id) ? $sc_id : 1; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
            <?php endfor; ?>
            <li>
                <a href="products.php?sc_id=<?php echo $sc_id; ?>&page=<?php if($page < $pages) echo $page+1; else echo $page;?>">></a>
            </li>
        </ul>
<?php endif;?>

<?php require "inc/footer.php"?>

