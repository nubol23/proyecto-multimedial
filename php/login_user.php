<?php

    require_once "../src/functions/user_functions.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $token = login($username, $password);
    if($token == "") {
        header('Location: login.php');    
    } else {
        setcookie("token_user", $token);
        header('Location: main.php');
    }
?>