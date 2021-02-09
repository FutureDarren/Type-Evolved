<?php

$DB_HOST = "[HOST]";
$DB_USER = "[USER]";
$DB_PASS = "[PASS]";
$DB_NAME = "[NAME]";

$connect = mysqli_connect($DB_HOST ,$DB_USER, $DB_PASS, $DB_NAME);

if(!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}