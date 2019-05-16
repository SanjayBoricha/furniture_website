<?php

if (isset($_GET['p_id'])) {
    require "inc/header.php";
    
    $p_id = $_GET['p_id'];

    $query = "SELECT * FROM products WHERE p_id='$p_id'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    print_r($product);

?>

<section class="product">

<h1 style="font-family: serif;font-size: 40px;text-transform:uppercase;"><?php echo $product['p_name']; ?></h1>
<p><?php echo $product['price']; ?></p>
<img src="<?php echo $product['p_image']; ?>" alt="image goes here">

</section>

<?php

    require "inc/footer.php";

} else {
    header('Location: index.php');
}
?>