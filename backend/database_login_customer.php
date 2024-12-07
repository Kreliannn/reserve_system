<?php

include "database_configure.second.php"; // Establish database connection


$username = $_POST['username'];
$password = $_POST['password'];

$user = $database->get("select * from customer where username = ? && password =?", [$username, $password], "fetch");

if($user)
{   
    $_SESSION['user'] = $user;
    die("success");
}
else
{
    echo "error";
}


