<?php

session_start();
require 'dbc.inc.php';
if (isset($_POST['book-submit']))
{
    $userid = $_SESSION['userid'];
    $eventid = $_POST['eventid'];
    $adultPrice = $_POST['adultPrice'];
    $adultQuantity = $_POST['adultQuantity'];
    $childPrice = $_POST['childPrice'];
    $childQuantity = $_POST['childQuantity'];
    $concessionPrice = $_POST['concessionPrice'];
    $concessionQuantity = $_POST['concessionQuantity'];

    $count = 0;

    if ($adultQuantity > 0)
    {
        $adultTotal = $adultPrice * $adultQuantity;
        $sql = 'INSERT INTO bookings (userid, eventid, price, quantity, total ) VALUES(?,?,?,?,?);';
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header('');
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, 'iiiii', $userid, $eventid, $adultPrice, $adultQuantity, $adultTotal);
            mysqli_stmt_execute($stmt);
            $count++;
        }
    }

    if ($childQuantity > 0)
    {
        $childTotal = $childPrice * $childQuantity;
        $sql = 'INSERT INTO bookings (userid, eventid, price, quantity, total ) VALUES(?,?,?,?,?);';
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header('');
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, 'iiiii', $userid, $eventid, $childPrice, $childQuantity, $childTotal);
            mysqli_stmt_execute($stmt);
            $count++;
        }
    }

    if ($concessionQuantity > 0)
    {
        $concessionTotal = $concessionPrice * $concessionQuantity;
        $sql = 'INSERT INTO bookings (userid, eventid, price, quantity, total ) VALUES(?,?,?,?,?);';
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header('');
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, 'iiiii', $userid, $eventid, $concessionPrice, $concessionQuantity, $concessionTotal);
            mysqli_stmt_execute($stmt);
            $count++;
        }

    }

    if($count == 0) {
        echo 'it is 0';
    }
    else if($count > 0) {
        echo'it is more than 0';
    }


}
