<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
<<<<<<< HEAD
$username = $password = $confirm_password = $options = "";
=======
$username = $password = $confirm_password = "";
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
<<<<<<< HEAD
        $username_err = "Ingrese un nombre de usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE username = ?";
=======
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
<<<<<<< HEAD
                    $username_err = "Este nombre de usuario ya existe.";
=======
                    $username_err = "This username is already taken.";
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
<<<<<<< HEAD
                echo "Algo salio mal, reprobamos.";
=======
                echo "Oops! Something went wrong. Please try again later.";
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
<<<<<<< HEAD
        $password_err = "Ingresa una contraseña.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña debe tener almenos 6 caracteres.";
=======
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
<<<<<<< HEAD
        $confirm_password_err = "Confirma la contraseña.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "La contraseña no coincide.";
        }
    }

    $options = ($_POST['options']);

=======
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
<<<<<<< HEAD
        $sql = "INSERT INTO user (username, password, position_id) VALUES (?, ?, $options)";
=======
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
<<<<<<< HEAD
            $param_position_id = $options;
=======
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
<<<<<<< HEAD
                echo "Algo salio mal. Intenta más tarde.";
=======
                echo "Something went wrong. Please try again later.";
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
  <?php
    include("navbar.php");
  ?>
    <div class="container floatingb col-sm-9 col-md-7 col-lg-5 mx-auto">
        <h2>Sign Up</h2>
        <p>Por favor llena los campos del formulario.</p>
=======
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
<<<<<<< HEAD
            <div class="form-group">
                <label>Nivel</label>
                <select class="form-control" name="options">
                  <option value="2">Empleado</option>
                  <option value="1">Gerente</option>
                </select>
            </div>
=======
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
<<<<<<< HEAD
                <input type="reset" class="btn btn-light" value="Reset">
            </div>
        </form>
    </div>
    <!-- Opcional JavaScript -->
    <!-- jQuery first, then Popper.js, entonces Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
=======
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="index.php">Login here</a>.</p>
        </form>
    </div>
>>>>>>> af6785a7feb04680da07fb9acaf64ea0cacf0ef4
</body>
</html>
