<?php
    require_once '../../src/functions/bill_functions.php';
    require_once '../../src/functions/medicine_functions.php';
    $id = 1;
    $info = get_bill_information($id);

    if(!isset($_COOKIE['count'])) {
        setcookie('count', 1);
        $medicined_buyed = array();
        $json = json_encode($medicined_buyed);
        setcookie('medicine_names_quantity', $json);
    }

    echo $_COOKIE['medicine_names_quantity'];
?>

<html>
    <head>
        <title>Nueva venta.</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
        <form action="add_bill.php" method="GET">
            Factura <br />
            NIT: <input type="text" name="client_nit"> <br />
            Cliente: <input type="text" name="client_name"> <br />

            <table border="1">
                <tr>
                    <td>Cantidad</td>
                    <td>Descripcion</td>
                    <td>Precio unitario</td>
                    <td>Subtotal</td>
                </tr>
                <?php
                    $sales = json_decode(stripslashes($_COOKIE['medicine_names_quantity']), true);
                    $total = 0;
                    foreach ($sales as $i => $value) {
                        echo "<tr>";
                        echo "<td>" . $value['quantity'] . "</td>";
                        echo "<td>" . $value['name'] . "</td>";
                        echo "<td>" . get_medicine_price($value['name']) . "</td>";
                        echo "<td>" . (get_medicine_price($value['name']) * $value['quantity']) . "</td>";
                        echo "</tr>";
                        $total = $total + get_medicine_price($value['name']) * $value['quantity'];
                    }
                ?>
                <div>
                    <a href="add_sale.php">Adicionar</a>
                </div>
            </table>

            <?php
                echo 'Total: ' . $total;
            ?>
            <br />
            <input type="submit" value="Completar venta" />
        </form>
    </body>
</html>