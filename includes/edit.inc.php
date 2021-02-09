<?php
    session_start();
    require 'dbc.inc.php';

    if (isset($_POST['update-submit']) && isset($_SESSION['uid'])) {
        $prodid = $_POST['prodid'];
        $title = $_POST['title'];
        $descript = $_POST['descript'];
        $price = $_POST['price'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));


        $extensions = array("jpg", "jpeg", "png", "gif");

        if (empty($title) || empty($descript) || empty($price) || empty($fileName)) {
            header('Location: ../editproduct.php?success=no');
            exit();
        }
        else if (in_array($fileActualExt, $extensions)) {
            $fileNameNew = uniqid().'.'.$fileActualExt;
            $dir = '../uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $dir);

            $update = $dbc->prepare("UPDATE listings SET title = ?, descript = ?, price = ?, image = ? WHERE id = ?;");
            $update->bind_param("sssss", $title, $descript, $price, $dir, $prodid);
            $update->execute();
            $update->close();


            header("Location: ../index.php?update=yes");
            exit();
        }

    }