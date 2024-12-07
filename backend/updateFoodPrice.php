<?php

include "database_configure.second.php"; // Establish database connection

$product_id = $_POST['product_id'];
$product_price = $_POST['product_price'];

$database->update("update  food set Food_Price = ? where Food_id = ?", [$product_price, $product_id ]);

echo "<script> window.history.back(); </script>";