<?php
session_start();
if (isset($_POST['review-submit']) && isset($_SESSION['userid'])) {
    require 'dbc.inc.php';
    $userid = $_SESSION['userid'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    if (empty($review) || empty($rating)) {
        header('Location: ../postreview.php?error=emptyfields');
        exit();
    }
    else {
        $sql = 'INSERT INTO reviews (userid, review, rating) VALUES(?,?,?)';
        $stmt = mysqli_stmt_init($connect);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'isi', $userid,$review, $rating);
        mysqli_stmt_execute($stmt);
        header("Location: ../index.php?postreview=success");
        exit();
    }
}
else {
    header('Location: ../postreview.php');
}