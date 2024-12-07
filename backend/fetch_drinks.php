<?php

    include "database_configure.second.php"; // Establish database connection


  $result = $database->get("select * from drinks inner join drinks_thumbnail on drinks.Food_id = drinks_Thumbnail.Food_ID", [], "fetchAll");


  echo json_encode($result );