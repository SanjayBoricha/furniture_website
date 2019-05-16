<?php require "config/config.php";?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/form.css">
</head>
<body>
    <div class="header">
        <a href="index.php"><h1>Friend Furniture</h1></a>
        <p>Secure Signup</p>
    </div>

    <div class="form">
        <div>
            <h2>Create an Account</h2>
            <form action="process/signup-process-admin.php" method="post">
                <input type="text" name="uname" placeholder="User Name"><br>
                <input type="email" name="email" placeholder="Email Address"><br>
                <input type="password" name="pwd" placeholder="Password"><br>
                <input type="password" name="pwd-r" placeholder="Re-enter Password"><br>
                <input type="hidden" name="type" value="admin">
                <button type="submit" name="signup-submit">Submit</button>
            </form>
            <a href="signin.php">Have an account? Sign In</a>
            <p>By creating account, you are agreeing to our <span>privacy policy</span> and <span>terms of use</span>. You also agree to receive exclusive offers via emails; you can unsubscribe at any time.</p>
        </div>
    </div>

    <div class="footer">
        <p>&copy;Friend Furniture</p>
        <p><a href="term-condition.php">Term & condition</a></p>
    </div>
</body>
</html>