<?php
    require_once '../src/functions/bill_functions.php';
    $client_name = $_GET['client_name'];
    $client_nit = $_GET['client_nit'];
    $agency = $_GET['agency'];
    echo $client_name;
    echo $client_nit;
    echo $agency;
    $sales = json_decode(stripslashes($_COOKIE['medicine_names_quantity']), true);
    echo "<pre>";
    print_r($sales);
    echo "</pre>";
    echo register_bill(
        $client_name,
        $client_name,
        $sales,
        $_COOKIE['token_user'],
        $agency);
    setcookie('count','',time()-100);
    header('Location: main.php');
?>