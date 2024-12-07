<?php

    // Establish database connection
    include "database_configure.php";

    // Prepare sql query for inserting sample data
    // Sample food data
    $sql = "INSERT INTO Food (Food_Name, Food_Price, Food_Quantity) VALUES
            ('French Fries', 40.00, 50),
            ('Burger Steak w/ Rice', 58.00, 100),
            ('Cheese Sticks', 20.00, 20),
            ('Ham w/ Rice', 45.00, 50),
            ('Japanese Siomai', 45.00, 30),
            ('Siomai', 33.00, 25),
            ('Luncheon Meat w/ Rice', 48.00, 55),
            ('Nuggets w/ Rice', 58.00, 50),
            ('Siopao', 25.00, 40),
            ('Tocino with Rice', 80.00, 75);";
    // Sample drinks data
    $sql .= "INSERT INTO drinks (Food_Name, Food_Price, Food_Quantity) VALUES
            ('Blueberry Juice', 38.00, 39),
            ('Chocolate Milktea', 30.00, 67),
            ('Coke Float', 45.00, 50),
            ('Cookies and Cream Milktea', 30.00, 32),
            ('Lemon Juice', 38.00, 40),
            ('Lychee Juice', 38.00, 40),
            ('Matcha Milktea', 30.00, 62),
            ('Okinawa Milktea', 30.00, 62),
            ('Royal Float', 45.00, 89),
            ('Water', 10.00, 150);";
    // Sample food thumbnails data
    $sql .= "INSERT INTO Food_Thumbnail (Food_Thumbnail_Name, Food_Thumbnail_Directory,Food_ID) VALUES
            ('fries','fries.jpg',1),
            ('burger_steak','burger_steak.jpg',2),
            ('cheese_sticks','cheese_sticks.jpg',3),
            ('ham','ham.jpg',4),
            ('japanese_siomai','japanese_siomai.jpg',5),
            ('siomai','siomai.jpg',6),
            ('luncheon_meat','luncheon_meat.jpeg',7),
            ('nuggets','nuggets.png',8),
            ('siopao','siopao.jpg',9),
            ('tocino','tocino.png',10);";
    // Sample drinks thumbnails data
    $sql .= "INSERT INTO Drinks_Thumbnail (Food_Thumbnail_Name, Food_Thumbnail_Directory,Food_ID) VALUES
            ('blueberry','blueberry.png',1),
            ('chocolate','chocolate.png',2),
            ('coke_float','coke_float.jpg',3),
            ('cookies_and_cream','cookies_and_cream.jpg',4),
            ('lemon','lemon.jpg',5),
            ('lychee','lychee.jpeg',6),
            ('matcha','matcha.png',7),
            ('okinawa milktea','okinawa_milktea.png',8),
            ('royal_float','royal_float.jpg',9),
            ('water','water.jpg',10)";
    // Insert all sample data
    try{
        if (!$conn->multi_query($sql) === TRUE){
            die("Error Sample Data Insertion: " . $conn->error);
        }
    }
    catch(Exception $sql_exception){}