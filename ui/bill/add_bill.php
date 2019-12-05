<?php
    require_once '../../src/functions/bill_functions.php';
    $client_name = $_GET['client_name'];
    $client_nit = $_GET['client_nit'];
    $sales = json_decode(stripslashes($_COOKIE['medicine_names_quantity']), true);
    echo register_bill(
        $client_name,
        $client_name,
        array(
            array('name' => 'Alercet D', 'quantity' => 1),
            array('name' => 'Omeprazol', 'quantity' => 5)
        ),
        '4f7c55ed262b10c5f3b556136d50143af1d51f66',
        'Downtown');
    header('Location: ../../welcome.php');
?>