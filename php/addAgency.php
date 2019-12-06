<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Farmacias Multimedial</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>

<?php 
    require_once '../src/functions/user_functions.php';
    require_once '../entities/User.php';
    require_once '../entities/Position.php';
    $user = get_user($_COOKIE['token_user']);
    $position = $user->getPosition()->getId();
    if($position == 2) {
        require_once 'navbarE.php';
    } else {
        require_once 'navbarG.php';
    }
?>
<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
    <div class="card card-signin my-5">
        <div class="card-body">
            
              <h5 class="card-title text-center">Registrar agencia</h5>
              <form class="form-signin" action="register_agency.php" method="POST">

                <div class="form-label-group">
                  <input type="text" id="usuario" name="agency" class="form-control" placeholder="Agencia" autofocus>
                  <label for="usuario">Agencia</label>
                    <span class="help-block message">
                        <?php
                            if(isset($_COOKIE['agency_error'])) {
                                echo $_COOKIE['agency_error'];
                            } else {
                                echo "";
                            }
                        ?>
                    </span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" value="Registrar">
                </div>
                <!--<p>Para añadir usuarios de pruebita <a href="register.php">Click aqui</a>.</p>-->
              </form>
            </div>
        </div>
    </div>

</body>
</html>