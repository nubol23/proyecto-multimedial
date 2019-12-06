<?php 
  require_once '../src/functions/user_functions.php';
  require_once '../src/functions/medicine_functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Adicionar medicina</title>
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
        <h2>Eleccion de medicamento</h2>
        <form method="POST" action="_refill.php">
          <div class="form-group">
            Medicina: <select name="medicine" class="form-control">
                <?php
                    include('../../src/functions/medicine_functions.php');
                    $arr = get_all_medicines_and_manufacturers();
                    $medicines = $arr['medicine_names'];
                    foreach ($medicines as $i => $value) {
                        echo "<option value='$value'>" . $value . "</option>";
                    }
                ?>
            </select> <br />
            Cantidad: <input name="quantity" type="number" class="form-control" />
          </div>
          <!--ESTO NO ESTABA PERO NO VI EL BOTON DE SUBMIT ASI QUE LO PUSE - DANGER HERE-->
          <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Submit">
              <input type="reset" class="btn btn-light" value="Reset">
          </div>
        </form>
      </div>

        <!-- Opcional JavaScript -->
        <!-- jQuery first, then Popper.js, entonces Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
