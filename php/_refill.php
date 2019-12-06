<?php
    require_once "../src/functions/medicine_functions.php";

    $medicine = $_POST['medicine'];
    $quantity = $_POST['quantity'];

    refill_medicine($medicine, $quantity);
    header('Location: main.php');
?>