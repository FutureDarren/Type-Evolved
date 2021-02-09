<?php
session_start();

if (isset($_GET['delete'])) {
        $prodid = $_GET['delete'];
        require 'dbc.inc.php';

        $edit = $dbc->prepare("DELETE FROM listings WHERE id = ?;");
        $edit->bind_param("s", $prodid);
        $edit->execute();
        $edit->close();
        header("Location: ../index.php?update=yes");
        exit();
    }