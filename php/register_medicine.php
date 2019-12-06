<?php
    require_once "../src/functions/medicine_functions.php";

    $medicine = $_POST['medicine'];
    $price = $_POST['price'];
    $manufacturer = $_POST['manufacturer'];

    add_medicine($medicine, $price, 10, 20, $manufacturer);
    header('Location: main.php');
?>