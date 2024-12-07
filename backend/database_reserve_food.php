<?php

include "database_configure.second.php"; // Establish database connection


$customer_id = $_POST['customer_id'];
$date = $_POST['date'];
$time = $_POST['time'];
$orders = $_POST['order'];
$total = $_POST['total'];


if(empty($orders))
{
    die(json_encode(["type" => "error", "text" => "error cart is empty" ]));
}

if(empty($time))
{
    die(json_encode(["type" => "error", "text" => "error time to pick up is empty" ]));
}

$store = $_POST["store"];

$reserve_variable = "reserve_food";
$reserve_variable_item = "reserve_food_item;";

switch($store)
{
    case "food":
        $reserve_variable = "reserve_food";
        $reserve_variable_item = "reserve_food_items";
    break;

    case "drink": 
        $reserve_variable = "reserve_drinks";
        $reserve_variable_item = "reserve_drinks_items";
    break;   
}

$current_date = new DateTime(); 

switch($date)
{
    case "tommorow":
        $current_date->modify('+1 days');
    break;

    case "2days": 
        $current_date->modify('+2 days');
    break;
}

$pick_up_date = $current_date->format('Y-m-d');

$customer = $database->get("select * from customer where customer_id = ?", [$customer_id ], "fetch");


$query = "insert into $reserve_variable (customer_name, customer_student_id, date, time, total, status) values(?,?,?,?,?,?)";

$database->insert($query, [$customer['customer_name'], $customer['username'], $pick_up_date, $time, $total , "waiting"]);


$query_get = "select * from $reserve_variable where customer_name = ? && customer_student_id = ? && date = ? && time = ? && total = ? ";
$lastId = $database->get($query_get, [$customer['customer_name'], $customer['username'], $pick_up_date, $time, $total ], "fetch");


foreach($orders as $order)
{
    $query = "insert into $reserve_variable_item (reserve_id, price, quantity, food_name) values (?,?,?,?) ";
    $database->insert($query, [ $lastId['reserve_id']  , $order['price'], $order['quantity'], $order['name']]);
}

die(json_encode(["type" => "success", "text" => "success" ]));