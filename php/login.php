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
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Sign In</h5>
              <form class="form-signin" action="login_user.php" method="POST">

                <div class="form-label-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                  <input type="text" id="usuario" name="username" class="form-control" placeholder="Usuario" autofocus>
                  <label for="usuario">Usuario</label>
                    <span class="help-block message">
                        <?php
                            if(isset($_COOKIE['username_error'])) {
                                echo $_COOKIE['username_error'];
                            } else {
                                echo "";
                            }
                        ?>
                    </span>
                </div>

                <div class="form-label-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                  <input type="password" id="contrasena" name="password" class="form-control" placeholder="Password">
                  <label for="contrasena">Contraseña</label>
                    <span class="help-block message">
                        <?php
                            if(isset($_COOKIE['password_error'])) {
                                echo $_COOKIE['password_error'];
                            } else {
                                echo "";
                            }
                        ?>
                    </span>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" value="Login">
                </div>
                <a href="register.php">Registrar nuevo</a>
                <!--<p>Para añadir usuarios de pruebita <a href="register.php">Click aqui</a>.</p>-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Opcional JavaScript -->
    <!-- jQuery first, then Popper.js, entonces Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
