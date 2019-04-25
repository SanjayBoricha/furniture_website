<?php

if (isset($_POST['login-submit'])) {
    require "../config/db.php";

    $mailuname = $_POST['mailuname'];
    $password = $_POST['pwd'];

    if (empty($mailuname) || empty($password)) {
        header("Location: ../signin.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE uname='$mailuname' OR email='$mailuname'";

        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {

            $pwdCheck = password_verify($password, $row['pwd']);

            $pwd = $row['pwd'];

            if ($password != $pwd) {
                header("Location: ../signin.php?error=wrongpassword&mailuname=$mailuname");
                exit();
            } else if ($password == $pwd) {
                session_start();
                $_SESSION['uname'] = $row['uname'];
                $_SESSION['u_type'] = $row['utype'];

                header("Location: ../index.php?login=success");
                exit();
            } else {
                header("Location: ../signin.php?error=wrongpassword");
                exit();
            }
        } else {
            header("Location: ../signin.php?error=nouser");
            exit();
        }
    }
} else {
    header("Location: ../signin.php");
    exit();
}