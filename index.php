<?php require "inc/header.php";?>

<?php

if (isset($_SESSION['u_type'])) {
    if ($_SESSION['u_type'] == 'admin') {
        header('Location: admin/');
    }
}

?>
<head>
    <link rel="stylesheet" href="css/slider.css">
</head>
<section>
<div class="slider">
      <div class="slide current">
        <div class="content">
          <h1>Slide One</h1>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
            eveniet. Adipisci consequatur explicabo aperiam dignissimos.
          </p>
        </div>
      </div>
      <div class="slide">
        <div class="content">
          <h1>Slide Two</h1>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
            eveniet. Adipisci consequatur explicabo aperiam dignissimos.
          </p>
        </div>
      </div>
      <div class="slide">
        <div class="content">
          <h1>Slide Three</h1>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
            eveniet. Adipisci consequatur explicabo aperiam dignissimos.
          </p>
        </div>
      </div>
      <div class="slide">
        <div class="content">
          <h1>Slide Four</h1>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
            eveniet. Adipisci consequatur explicabo aperiam dignissimos.
          </p>
        </div>
      </div>
    </div>
    <div class="buttons">
      <button id="prev"><=</button>
      <button id="next">=></button>
    </div>
</section>
<script src="js/slider.js"></script>
<?php require "inc/footer.php";?>