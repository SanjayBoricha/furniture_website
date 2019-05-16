<?php require "config/config.php";?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SignIn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/form.css">
</head>

<body>
    <div class="header">
        <a href="index.php">
            <h1><?php echo $app_name; ?></h1>
        </a>
        <p>Secure Login</p>
    </div>

    <div class="form">
        <div>
            <h2>Login</h2>
            <form action="process/signin-process.php" method="post">
                <input 
                    type="text" 
                    name="mailuname" 
                    placeholder="User name or email" 
                    value="<?php if (isset($_GET['mailuname'])) { echo $_GET['mailuname']; } ?>"
                >
                <br>
                <input type="password" name="pwd" placeholder="Password"><br>
                <button type="submit" name="login-submit">Submit</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>&copy;<?php echo $app_name; ?></p>
        <p><a href="term-condition.php">Term & condition</a></p>
    </div>
</body>

</html>