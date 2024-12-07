<?php

include "database_configure.second.php"; // Establish database connection

$reserve_id = $_POST['reserve_id'];
$store = $_POST['store'];
$product_item;
$product;

switch($store)
{
    case "reserve_food":
        $product_item =  "reserve_food_items";
        $product = "food";
    break;

    case "reserve_drinks":
        $product_item =  "reserve_drinks_items";
        $product = "drinks";
    break;
}


$database->update("update $store set status = 'completed' where reserve_id = ?", [$reserve_id]);

$items = $database->get("select * from $product_item  where reserve_id = ?", [$reserve_id], "fetchAll");

foreach($items  as $item)
{
    $food = $database->get("select Food_Quantity from  $product where Food_Name = ?", [$item['food_name']], "fetch");
    $current_quantity = $food['Food_Quantity'];
    $updated_quantity = (int)$current_quantity - (int)$item['quantity'];
    $database->update("update $product set Food_Quantity = ? where Food_Name = ?", [$updated_quantity, $item['food_name']]);
}

echo "<script> window.history.back(); </script>";