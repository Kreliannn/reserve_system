<?php

include "database_configure.second.php"; // Establish database connection

$reserve_id = $_POST['reserve_id'];
$store = $_POST['store'];

$database->update("update $store  set status = 'cancelled' where reserve_id = ?", [$reserve_id]);

echo "<script> window.history.back(); </script>";