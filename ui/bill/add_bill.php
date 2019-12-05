<?php
    require_once '../../src/functions/bill_functions.php';
    $client_name = $_GET['client_name'];
    $client_nit = $_GET['client_nit'];
    $sales = json_decode(stripslashes($_COOKIE['medicine_names_quantity']), true);
    register_bill($client_name, $client_nit, $sales,
                           string $user_token,
                       string $agency_location,
                       'LP');
?>