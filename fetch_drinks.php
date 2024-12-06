<?php

    include "database_configure.php"; // Establish database connection

    $sql = "SELECT Drinks.Drink_Name, Drinks.Drink_Price, Drinks.Drink_Quantity, Drinks_Thumbnail.Drink_Thumbnail_Directory
            FROM Drinks
            CROSS JOIN Drinks_Thumbnail
            WHERE Drinks.Drink_ID = Drinks_Thumbnail.Drink_ID";

    $result = $conn->query($sql);

    $data = []; // Initialize array for fetched drinks data
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            // Push each row inside data array
            $data[] = [
                'Drink_Name' => $row['Drink_Name'],
                'Drink_Price' => $row['Drink_Price'],
                'Drink_Quantity' => $row['Drink_Quantity'],
                'Drink_Thumbnail' => $row['Drink_Thumbnail_Directory']
            ];
        }
        // Encode data array into json and output it
        echo json_encode($data);
    } else {
        // If no rows are found, return an empty array
        echo json_encode([]);
    }