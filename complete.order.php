<?php

include "database_configure.second.php"; // Establish database connection

$reserve_id = $_POST['reserve_id'];

$database->update("update reserve_food set status = 'completed' where reserve_id = ?", [$reserve_id]);

$items = $database->get("select * from reserve_food_items where reserve_id = ?", [$reserve_id], "fetchAll");

foreach($items  as $item)
{
    $food = $database->get("select Food_Quantity from  food where Food_Name = ?", [$item['food_name']], "fetch");
    $current_quantity = $food['Food_Quantity'];
    $updated_quantity = (int)$current_quantity - (int)$item['quantity'];$database->update("update food set Food_Quantity = ? where Food_Name = ?", [$updated_quantity, $item['food_name']]);
}

echo "<script> window.history.back(); </script>";