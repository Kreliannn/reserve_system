<?php

    // Retrieved form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Check if form data match with login data
    $response;

    if($username === "admin" && $password === "123")
    {
        $response = "admin";
    }
    else if($username === "food" && $password === "123")
    {
        $response = "food";
    }
    else if($username === "drinks" && $password === "123")
    {
        $response = "drinks";
    }
    else
    {
        $response = "invalid";
    }

    echo $response;