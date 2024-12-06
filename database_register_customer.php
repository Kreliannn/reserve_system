<?php

include "database_configure.second.php"; // Establish database connection

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

if($database->get("select * from customer where username = ? && password =?", [$username, $password], "fetch"))
{
    die("error : account already exist");
}

$database->insert("insert into customer (customer_name, username, password) values (?,?,?)", [$name, $username, $password]);

echo "account created";