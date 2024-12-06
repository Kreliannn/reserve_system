<?php

    // Retrieved form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Check if form data match with login data
    if($username === "krel" && $password === "123"){
        $response['status'] = "valid";
    }
    else
    {
        $response['status'] = "invalid";
    }

    echo json_encode($response);