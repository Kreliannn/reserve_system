<?php

include "database_configure.second.php"; // Establish database connection

$product_id = $_POST['product_id'];
$product_name= $_POST['product_name'];



$database->update("update  drinks set Food_Name = ? where Food_id = ?", [$product_name, $product_id ]);

echo "<script> window.history.back(); </script>";