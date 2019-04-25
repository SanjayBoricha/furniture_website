<?php require "inc/header.php";

if (isset($_GET['sc_id'])):
    $sc_id = $_GET['sc_id'];
    $query_prod = "select * from products where sc_id='$sc_id'";
    $products = mysqli_query($conn, $query_prod);?>
<div class="products">
    <?php while ($product = mysqli_fetch_assoc($products)):
        $id = $product['p_id'];
        $name = $product['p_name'];
        $img = $product['p_image'];?>




    <div class="product-card">
        <a href="product.php?p_id=<?php echo $id; ?>">
            <div class="product-img">
                <img src="<?php echo $img; ?>" alt="sofa image">
            </div>
            <div class="product-content">
                <p class="product-name">
                    <?php echo $name; ?>
                </p>
            </div>
        </a>
    </div>




    <?php endwhile;?>
</div>
<?php endif;?>

<?php require "inc/footer.php"?>