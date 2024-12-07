<?php

    include "database_configure.second.php"; // Establish database connection

    $store = $_POST['store'];
    $food_id = $_POST['food_id'];

    $shop;
    $shop_thumbnail;

    switch($store)
    {
        case "food":
            $shop = "food";
            $shop_thumbnail = "food_thumbnail";
        break;

        case "drinks":
            $shop = "drinks";
            $shop_thumbnail = "drinks_thumbnail";
        break;
    }

    $database->delete("delete from $shop where Food_ID = ?", [ $food_id]);
    $database->delete("delete from $shop_thumbnail where Food_ID = ?", [ $food_id]);

    echo "<script> window.history.back(); </script>";

