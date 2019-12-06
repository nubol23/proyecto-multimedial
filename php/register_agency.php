<?php 
    require_once "../src/functions/bill_functions.php";
    
    $agency = $_POST['agency'];
    
    if(add_agency($agency)) {
        header('Location: main.php');
    } else {
        header('Location: addAgency.php');
    }

?>