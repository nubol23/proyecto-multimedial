<?php 
    require_once "../src/functions/medicine_functions.php";
    
    $manufacturer = $_POST['manufacturer'];
    
    if(add_manufacturer($manufacturer)) {
        header('Location: main.php');
    } else {
        header('Location: addManufacturer.php');
    }

?>