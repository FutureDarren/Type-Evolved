<?php

if(isset($_POST['login-submit'])) {

    require 'dbc.inc.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else {
        $sql = 'SELECT * FROM users WHERE email=?';
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../login.php?error=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passwordVerify = password_verify($password, $row['password']);
                if ($passwordVerify == false) {
                    header('Location: ../login.php?error=invalidpassword');
                    exit();
                }
                else if ($passwordVerify == true) {
                    session_start();
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    header('Location: ../index.php?login=success');
                    exit();
                }
            }
            else {
                header('Location: ../login.php?error=noemail');
                exit();
            }
        }
    }
}
else {
    header('Location: ../login.php');
    exit();
}