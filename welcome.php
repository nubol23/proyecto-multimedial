<?php
// Iniciamos la sesion
session_start();

// Revisamos la si ya ha iniciado session y si no es asi nos vamos al principio
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
setcookie('count', 1, time() - 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
      if (htmlspecialchars($_SESSION["position_id"] == 1)) {
        include("navbar.php");
      }else{
        include("navbarEmployee.php");
      }
    ?>

    <div class="card w-100 text-center floatingb">
      <div class="card-body">
        <h1 class="card-title">Saludos, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido a la farmacia.</h1>
        <p>
            <a href="reset-password.php" class="btn btn-warning">Cambia contraseña</a>
            <a href="logout.php" class="btn btn-danger">Salir de la cuenta</a>
        </p>
      </div>
    </div>

    <!-- Opcional JavaScript -->
    <!-- jQuery first, then Popper.js, entonces Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
