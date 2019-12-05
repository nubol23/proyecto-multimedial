<?php
  // Iniciamos la sesion
  session_start();

  // Revisamos la si ya ha iniciado session y si no es asi nos vamos al principio
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      header("location: index.php");
      exit;
  }
  // MIO HASTA AQUI ES MIO JAJAJA
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
        if (htmlspecialchars($_SESSION["position_id"] == 1)) {
          include("../../navbar.php");
        }else{
          include("../../navbarEmployee.php");
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
          
          <div class="form-control">
            <table class="table">
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
                    echo "<td> <a href='add_sale.php'>Adicionar</a>";
                    echo "</td>";
                    echo "<td>";
                    echo 'Total: ' . $total;
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> <input type='submit' value='Completar venta' class='btn btn-primary'/>";
                    echo "</td>";
                    echo "</tr>";
                    echo "</tbody>";
                ?>
            </table>
          </div>

        </form>
      </div>
    </body>
</html>
