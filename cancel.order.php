<?php

include "database_configure.second.php"; // Establish database connection

$reserve_id = $_POST['reserve_id'];

$database->update("update reserve_food set status = 'cancelled' where reserve_id = ?", [$reserve_id]);

echo "<script> window.history.back(); </script>";