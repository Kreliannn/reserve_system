<?php

include "database_configure.php"; // Establish database connection

$product_id = $_POST['product_id'];
$product_stock = $_POST['product_stock'];

$conn->query("update  food set Food_Quantity = '$product_stock' where Food_id = '$product_id'");

echo "<script> window.history.back(); </script>";