<?php

include "database_configure.second.php"; // Establish database connection

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username ) || empty($password) || empty($name ) )
{
    die("empty");
}



if($database->get("select * from customer where username = ? && password =?", [$username, $password], "fetch"))
{
    die("accountExist");
}

$database->insert("insert into customer (customer_name, username, password) values (?,?,?)", [$name, $username, $password]);

echo "success";