<?php
        include "database_configure.second.php"; // Establish database connection

        function check_empty($input)
        {
            return strlen($input) == 0;
        }

        $name = $_POST['name'];
        $image = $_FILES['image'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $store = $_POST['store'];
        $shop;
        $shop_thumbnail;
        switch($store)
        {
            case "food":
                $shop =  "food";
                $shop_thumbnail = "food_thumbnail";
            break;

            case "drinks":
                $shop =  "drinks";
                $shop_thumbnail = "drinks_thumbnail";
            break;
        }

        $newName;

        $successful = false;
        
        if(check_empty($name))
        {
            die("empty field");
        }
        else if(check_empty($image['name']))
        {
            die("empty field");
        }
        else if(check_empty($price))
        {
            die("empty field");
        }
        else if(check_empty($stock))
        {
            die("empty field");
        }
        else
        {
            $filename = $image['name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION); 
            $newName =  uniqid() .  $extension;
            $old_location = $image['tmp_name'];
            $new_location = '../Assets/img/Web/Web_Food_Thumbnails/' . $newName;
           
            move_uploaded_file($old_location, $new_location );
            $successful = true;
            
        }

        if($successful)
        {
            $database->insert("insert into $shop (Food_Name, Food_Price, Food_Quantity) values (?,?,?)", [$name, $price, $stock]);
            $food_id = $database->get("select Food_ID from $shop where Food_Name = ? && Food_Price = ? && food_Quantity = ?", [$name, $price, $stock], "fetch");
            $database->insert("insert into $shop_thumbnail (Food_Thumbnail_Name, Food_Thumbnail_Directory, Food_ID) values  (?,?,?)", [$name, $newName, $food_id["Food_ID"]]);
            echo "<script> window.history.back(); </script>";
        }