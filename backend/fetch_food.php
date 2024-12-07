<?php

    include "database_configure.second.php"; // Establish database connection


  $result = $database->get("select * from food inner join food_thumbnail on food.Food_id = food_Thumbnail.Food_ID", [], "fetchAll");


  echo json_encode($result);
