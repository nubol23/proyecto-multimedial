<?php
    $medicine_name = $_GET['medicine'];
    $quantity = $_GET['quantity'];
    $buy_medicine = json_decode(stripslashes($_COOKIE['medicine_names_quantity']), true);
    $flag = true;
    foreach ($buy_medicine as $i => $value) {
        if($value['name'] == $medicine_name) {
            echo $value['quantity'];
            $buy_medicine[$i]['quantity'] = $value['quantity'] + $quantity;
            echo $value['quantity'];
            $flag = false;
        }
    }
    if($flag) {
        array_push($buy_medicine, array('name' => $medicine_name, 'quantity' => $quantity));
    }
    $json = json_encode($buy_medicine);
    setcookie('medicine_names_quantity', $json);
    header("Location: ./bill.php");
?>