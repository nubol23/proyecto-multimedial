<?php
    require_once '../src/functions/bill_functions.php';
    require_once '../src/functions/medicine_functions.php';
    require_once '../src/functions/user_functions.php';
    require_once '../entities/User.php';
    require_once '../entities/Position.php';
    $id = 1;
    //$info = get_bill_information($id);

    if(!isset($_COOKIE['count'])) {
        setcookie('count', 1);
        $medicined_buyed = array();
        $json = json_encode($medicined_buyed);
        setcookie('medicine_names_quantity', $json);
    }
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Nueva venta.</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/estilo.css">
    </head>
    <body>
      <?php
        $user = get_user($_COOKIE['token_user']);
        $position = $user->getPosition()->getId();
        if($position == 2) {
          require_once 'navbarE.php';
        } else {
          require_once 'navbarG.php';
        }
      ?>
      <div class="container floatingb col-sm-9 col-md-7 col-lg-5 mx-auto">
        <h2>Factura</h2>
        <form action="add_bill.php" method="GET">
          <div class="form-group">
            NIT: <input type="text" name="client_nit" class="form-control"> <br />
          </div>
          <div class="form-group">
            Cliente: <input type="text" name="client_name" class="form-control"> <br />
          </div>
          <div class="form-group">
            Sucursal: <input type="text" name="agency" class="form-control"> <br />
          </div>        
        <br />
        <table class="table table-dark">
              <thead class="thead-dark">
                <tr>
                    <td scope="col">Cantidad</td>
                    <td scope="col">Descripcion</td>
                    <td scope="col">Precio unitario</td>
                    <td scope="col">Subtotal</td>
                </tr>
              </thead>

                <?php
                    $sales = json_decode(stripslashes($_COOKIE['medicine_names_quantity']), true);
                    $total = 0;
                    echo "<tbody>";
                    foreach ($sales as $i => $value) {
                        echo "<tbody><tr>";
                        echo "<td>" . $value['quantity'] . "</td>";
                        echo "<td>" . $value['name'] . "</td>";
                        echo "<td>" . get_medicine_price($value['name']) . "</td>";
                        echo "<td>" . (get_medicine_price($value['name']) * $value['quantity']) . "</td>";
                        echo "</tr></tbody>";
                        $total = $total + get_medicine_price($value['name']) * $value['quantity'];
                    }
                    echo "<tr>";
                    echo "<td class='btn btn-light'> <a href='add_sale.php'>Adicionar</a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<div class='form-group'>";
                    echo "Total: <input type='text' name='total_price' class='form-control' value='$total' readonly> <br />";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> <input type='submit' value='Completar venta' class='btn btn-primary'/>";
                    echo "</td>";
                    echo "</tr>";
                    echo "</tbody>";
                ?>
            </table>
            </form>
      </div>
    </body>
</html>
