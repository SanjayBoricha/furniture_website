<?php

if (isset($_GET['p_id'])) {
    require "inc/header.php";
    
    $p_id = $_GET['p_id'];

    $query = "SELECT * FROM products WHERE p_id='$p_id'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
    // print_r($product);   

    $sc_id = $product['sc_id'];
    $p_name = $product['p_name'];
    $price = $product['price'];
    $brand = $product['brand'];
    $description = $product['description'];
    $more = $product['more'];
    $p_image = $product['p_image'];
    
?>

<section class="product">

<div class="right">
    <h1 style="font-family: serif;font-size: 40px;text-transform:uppercase;"><?php echo $product['p_name']; ?></h1>
    <img class="p-img" src="<?php echo $p_image; ?>" alt="image goes here">
</div>
<div class="left">
    <p><img src="image/inr.svg" class="inr"><?php echo $price; ?></p>
    <p>Shoping For Client? Get Trade Benefits</p>
    <div class="delivery">
        FREE All - Inclusive Delivery & Assembly <br>
        Ships in 9-10 weeks
    </div>
    <div class="quantity">
        Select Quantity <br>
        <select name="qty">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </div>
    <div class="button-save-cart">
        <button class="save"> <img src="image/heart.svg" class="heart">  Save</button>
        <button class="cart">Add to Cart</button>
    </div>
    <div class="protection">
        <p>Add Protection Plan <a href="#">What's Covered</a></p><br>
        <div class="plan">
            <div>
                <input type="radio" name="plan" value="noplan" checked>
                <span class="noplan">No Plan</span>
            </div>
            <div>
                <input type="radio" name="plan" value="3plan">
                <span  class="3plan">3 Years - <img src="image/inr.svg" class="inr"> 250</span>
            </div>
            <div>
                <input type="radio" name="plan" value="5plan">
                <span class="5plan">5 Years - <img src="image/inr.svg" class="inr"> 400</span>
            </div>
        </div>
      
    </div>
</div>

</section>

<?php
    echo "<br><br>";

    $query = "SELECT * FROM features WHERE p_id='$p_id'";
    $result = mysqli_query($conn, $query);
    $features = mysqli_fetch_assoc($result);

    echo "<table>";
    echo "<tr class='open'><th> product features </th><th></th><tr>";    
    foreach ($features as $name => $value) {
        if ($name != 'id' && $name != 'p_id' && $value !== '') {
            if ($value == '0') {
                $value = "No";
            }
            if ($value == '1') {
                $value = "Yes";
            }
            echo "<tr><td>";
            echo $name;
            echo " </td> <td> ";
            echo $value;
            echo "</td></tr>";
        }
    }
    echo "<table>";

    echo "<br><br>";

    $query = "SELECT * FROM weights_dimensions WHERE p_id='$p_id'";
    $result = mysqli_query($conn, $query);
    $wd = mysqli_fetch_assoc($result);

    echo "<table>";
    foreach ($wd as $name => $value) {
        if ($name != 'id' && $name != 'p_id' && $value !== '') {
            echo "<tr><td>";
            echo $name;
            echo " </td> <td> ";
            echo $value;
            echo "</td></tr>";
        }
    }
    echo "<table>";
    require "inc/footer.php";


} else {
    header('Location: index.php');
}
?>