<?php

if (isset($_POST['registerSubmit'])) {

    require 'dbc.inc.php';

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if (empty($email) || empty($username) || empty($password) || empty($passwordConfirm)) {
        header('Location: ../register.php?error=emptyfields&email='.$email.'&username='.$username);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match('/^[a-zA-Z0-9]*$/', $username)) {
        header('Location: ../register.php?error=invalidemailusername');
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../register.php?error=invalidemail&username='.$username);
        exit();
    }
    else if (!preg_match('/^[a-zA-Z0-9]*$/', $username)) {
        header('Location: ../register.php?error=invalidusername&email='.$email);
        exit();
    }
    else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {
        header('Location: ../register.php?error=invalidpassword');
        exit();
    }
    else if ($password !== $passwordConfirm) {
        header('Location: ../register.php?error=passwordconfirm&email='.$email.'&username='.$username);
        exit();
    }
    else {
        $sql = 'SELECT email FROM users WHERE email=?;';
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../register.php?error=sqlerror');
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);
            if ($result > 0) {
                header('Location: ../register.php?error=emailtaken&username='.$username);
                exit();
            }
            else {
                $sql = 'INSERT INTO users (email, username, password) VALUES(?, ?, ?);';
                $stmt = mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header('Location ../register.php?error=sqlerror');
                    exit();
                }
                else {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, 'sss', $email, $username, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    header('Location: ../index.php?register=success');
                    exit();
                }
            }
        }
    }
}
else {
    header('Location: ../register.php');
    exit();
}