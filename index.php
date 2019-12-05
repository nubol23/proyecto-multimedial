<?php
<<<<<<< HEAD
// Inicioamos session
=======
// Inicializamos sesion
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
session_start();

// Revisamos si el usuario esta loggeado, si es asi nos vamos al welcome.php psdt: talvez el welcome no es necesario
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}

// Incluimos el config.php para cargar la base de datos
require_once "config.php";

// Definimos variables y las inicializamos vacias
$username = $password = "";
$username_err = $password_err = "";

// Procesamos los datos del formulario
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Revisamos si el campo del usuario esta lleno psdt: tal vez sea mejor require
    if(empty(trim($_POST["username"]))){
        $username_err = "Ingrese un nombre de usuario.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Revisamos si el campo de la contraseña esta vacia
    if(empty(trim($_POST["password"]))){
        $password_err = "Ingrese una contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validamos las credenciales
    if(empty($username_err) && empty($password_err)){
        // Preparamos un query
<<<<<<< HEAD
        $sql = "SELECT id, position_id, username, password FROM user WHERE username = ?";
=======
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4

        if($stmt = mysqli_prepare($link, $sql)){
            // Unimos la variables preparadas a la declaracion de variables
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Seteamos las variables o mejor dicho la de usuario
            $param_username = $username;

            // Intentamos ejecutar la declaracion preparada
            if(mysqli_stmt_execute($stmt)){
                // Salvamos el resultado
                mysqli_stmt_store_result($stmt);

                // Revisamos si el usuario esta en ls db, si existe entonces pasamos con contraseña
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Unimos las variables de los resultados
<<<<<<< HEAD
                    mysqli_stmt_bind_result($stmt, $id, $position_id, $username, $hashed_password);
=======
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Si la contraseña es correcta, llenamos la session
                            session_start();

                            // Salvamos los datos en las variables de la session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
<<<<<<< HEAD
                            $_SESSION["position_id"] = $position_id;
=======
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
                            $_SESSION["username"] = $username;

                            // Redirijimos a la pagina de welcome.php
                            header("location: welcome.php");
                        } else{
                            // Mostramos si hay un error con la contraseña
                            $password_err = "La contraseña que introdujo no es valida";
                        }
                    }
                } else{
                    // Mostramos si el usuario no esta en la base de datos
                    $username_err = "No se encontro una cuenta con ese nombre";
                }
            } else{
                echo "Algo salio mal. Tal vez reprobamos GG.";
            }
        }

        // Cerramos la declaracion
        mysqli_stmt_close($stmt);
    }

    // Cerramos la conexion
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Farmacias Multimedial</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<<<<<<< HEAD
    <link rel="stylesheet" href="css/estilo.css">
=======
    <link rel="stylesheet" href="css/estilos.css">
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Sign In</h5>
              <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-label-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                  <input type="text" id="usuario" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Usuario" autofocus>
                  <label for="usuario">Usuario</label>
                  <span class="help-block message"><?php echo $username_err; ?></span>
                </div>

                <div class="form-label-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                  <input type="password" id="contrasena" name="password" class="form-control" placeholder="Password">
                  <label for="contrasena">Contraseña</label>
                  <span class="help-block message"><?php echo $password_err; ?></span>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" value="Login">
                </div>
<<<<<<< HEAD
                <!--<p>Para añadir usuarios de pruebita <a href="register.php">Click aqui</a>.</p>-->
=======
                <p>Para añadir usuarios de pruebita <a href="register.php">Click aqui</a>.</p>
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
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
