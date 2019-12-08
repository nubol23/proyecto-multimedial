<?php
    require_once '../src/functions/bill_functions.php';
    require_once '../src/functions/medicine_functions.php';
    require_once '../src/functions/user_functions.php';
    require_once '../entities/User.php';
    require_once '../entities/Position.php';
    require_once '../reports/factura.php';
    $id = get_last_bill();
    factura($id);
?>