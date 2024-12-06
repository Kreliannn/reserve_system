<?php

    $db_server = "localhost";
    $db_uname = "root";
    $db_pword = "";

    // Create connection
    $conn = new mysqli($db_server, $db_uname, $db_pword);
    // Check connection
    if ($conn->connect_errno){
        die("Connection error: " . $conn->connect_error);
    }

    // Create database
    $Database = "CREATE DATABASE storeDB";
    try{
        if(!$conn->query($Database) === TRUE){
            die("Error creating database: " . $conn->error);
        }
    }catch(Exception $db_exception){}

    // Select database
    $db_use = "USE storeDB";
    try{
        if (!$conn->query($db_use) === TRUE){
            die("Error database selection: " . $conn->error);
        }
    }
    catch(Exception $db_use_exception){}

    // Create table
    $table_food = "CREATE TABLE Food (
    Food_ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Food_Name varchar(255) NOT NULL UNIQUE,
    Food_Price decimal(15,2) NOT NULL,
    Food_Quantity int NOT NULL
    )";
    
    $table_drinks = "CREATE TABLE Drinks (
    Drink_ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Drink_Name varchar(255) NOT NULL UNIQUE,
    Drink_Price decimal(15,2) NOT NULL,
    Drink_Quantity int NOT NULL
    )";
    
    $table_food_thumbnail = "CREATE TABLE Food_Thumbnail (
    Food_Thumbnail_ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Food_Thumbnail_Name varchar(255) NOT NULL UNIQUE,
    Food_Thumbnail_Directory varchar(255) NOT NULL,
    Food_ID int,
    FOREIGN KEY (Food_ID) REFERENCES Food(Food_ID)
    )";

    $table_drinks_thumbnail = "CREATE TABLE Drinks_Thumbnail (
    Drink_Thumbnail_ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Drink_Thumbnail_Name varchar(255) NOT NULL UNIQUE,
    Drink_Thumbnail_Directory varchar(255) NOT NULL,
    Drink_ID int,
    FOREIGN KEY (Drink_ID) REFERENCES Drinks(Drink_ID)
    )";

    try{
        if (!$conn->query($table_food) === TRUE) {
            die("Error creating food table: " . $conn->error);
        }
        if (!$conn->query($table_drinks) === TRUE) {
            die("Error creating drinks table: " . $conn->error);
        }
        if (!$conn->query($table_food_thumbnail) === TRUE) {
            die("Error creating food thumbnail table: " . $conn->error);
        }
        if (!$conn->query($table_drinks_thumbnail) === TRUE) {
            die("Error creating drinks thumbnail table: " . $conn->error);
        }
    }catch(Exception $table_exception){}

    // TEMPORARY SAMPLE_DATA.PHP FILE FOR DATA INSERTION
    include_once "sample_data.php";