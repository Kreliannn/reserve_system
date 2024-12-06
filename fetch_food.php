<?php
    include "database_configure.php"; // Establish database connection

    // Corrected query for fetching food items and thumbnails
    $sql = "SELECT Food.Food_ID, Food.Food_Name, Food.Food_Price, Food.Food_Quantity, Food_Thumbnail.Food_Thumbnail_Directory
            FROM Food
            INNER JOIN Food_Thumbnail ON Food.Food_ID = Food_Thumbnail.Food_ID";

    $result = $conn->query($sql);

    $data = []; // Initialize array for fetched food data
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            // Push each row inside data array
            $data[] = [
                'Food_ID' => $row['Food_ID'],
                'Food_Name' => $row['Food_Name'],
                'Food_Price' => $row['Food_Price'],
                'Food_Quantity' => $row['Food_Quantity'],
                'Food_Thumbnail' => $row['Food_Thumbnail_Directory']
            ];
        }
        // Encode data array into JSON and output it
        echo json_encode($data);
    } else {
        // If no rows are found, return an empty array
        echo json_encode([]);
    }
?>
