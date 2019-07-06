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
    <p><span class="inr"></span>&nbsp;&nbsp;&nbsp;<?php echo $price; ?></p>
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
                <span  class="threeplan">3 Years - <span class="inr"></span> &nbsp;&nbsp;&nbsp; 250</span>
            </div>
            <div>
                <input type="radio" name="plan" value="5plan">
                <span class="fiveplan">5 Years - <span class="inr"></span> &nbsp;&nbsp;&nbsp; 400</span>
            </div>
        </div>
      
    </div>
</div>

</section>
<h1 style="margin:5px 20px;font-weight:normal;">Product Overview</h1>
<section class="p-desc">
    <div class="description">
        <h3>Description</h3>
        <p><?php echo $description; ?></p>
    </div>
    <?php
        $query = "SELECT * FROM features WHERE p_id='$p_id'";
        $result = mysqli_query($conn, $query);
        $features = mysqli_fetch_assoc($result);

        echo "<table>";
        echo "<tr class='open'><th> product features </th><tr>";    
        foreach ($features as $name => $value) {
            if ($name != 'id' && $name != 'p_id' && $value !== '') {
                if ($value == '0') {
                    $value = "No";
                }
                if ($value == '1') {
                    $value = "Yes";
                }
                echo "<tr class='features'><td>";
                echo $name;
                echo " </td> <td> ";
                echo $value;
                echo "</td></tr>";
            }
        }
        echo "</table>";

        $query = "SELECT * FROM weights_dimensions WHERE p_id='$p_id'";
        $result = mysqli_query($conn, $query);
        $wd = mysqli_fetch_assoc($result);

        echo "<table>";
        echo "<tr class='open-wd'><th> product weight and dimention </th><tr>";
        foreach ($wd as $name => $value) {
            if ($name != 'id' && $name != 'p_id' && $value !== '') {
                echo "<tr class='wd'><td>";
                echo $name;
                echo " </td> <td> ";
                echo $value;
                echo "</td></tr>";
            }
        }
        echo "</table>";
    ?>
</section>
<script>
    var x = document.querySelector('.open');
    var y = document.querySelectorAll('.features');
    var a = document.querySelector('.open-wd');
    var b = document.querySelectorAll('.wd');

    x.addEventListener('click',()=>{
        
        y.forEach(tr => {
            if (tr.style.transform == "scaleY(1)") {
                tr.style.transform = "scaleY(0)";
                tr.style.position = "absolute";
                tr.style.background = "#fff";
                tr.style.color = "#fff";
            }else {
                tr.style.transform = "scaleY(1)";
                tr.style.position = "relative";
                tr.style.background = "#eee";
                tr.style.color = "#333";
            }
        });
    });

    a.addEventListener('click',()=>{
        
        b.forEach(tr => {
            if (tr.style.transform == "scaleY(1)") {
                tr.style.transform = "scaleY(0)";
                tr.style.position = "absolute";
                tr.style.background = "#fff";
                tr.style.color = "#fff";
            }else {
                tr.style.transform = "scaleY(1)";
                tr.style.position = "relative";
                tr.style.background = "#eee";
                tr.style.color = "#333";
            }
        });
    });
</script>
<?php
    require "inc/footer.php";
} else {
    header('Location: index.php');
}
?>