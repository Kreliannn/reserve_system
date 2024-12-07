<?php

include "database_configure.second.php"; // Establish database connection

$product_id = $_POST['product_id'];
$product_stock = $_POST['product_stock'];

$database->update("update food set Food_Quantity = ? where Food_id = ?", [$product_stock, $product_id ]);

echo "<script> window.history.back(); </script>";

