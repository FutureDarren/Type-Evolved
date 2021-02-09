<?php
require 'dbc.inc.php';
$email = $_POST['email'];
$sql = 'SELECT id FROM users WHERE email = ?';
$stmt = mysqli_stmt_init($connect);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$result = mysqli_stmt_num_rows($stmt);
if($result == 0)
{
    echo 'true';
}
else
{
echo 'false';
}

