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
    setcookie('count','',time()-100);
    $user = get_user($_COOKIE['token_user']);
    $position = $user->getPosition()->getId();
    if($position == 2) {
        require_once 'navbarE.php';
    } else {
        require_once 'navbarG.php';
    }
?>

</body>
</html>