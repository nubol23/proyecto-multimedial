<?php
require_once "../src/functions/user_functions.php";

$username = $_POST['username'];
$options = $_POST['options'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

echo $username . "<br />";
echo $options . "<br />";
echo $password . "<br />";
echo $confirm_password . "<br />";

if($password != $confirm_password) {
    setcookie("confirm_password_error", "Las contrasenas no son iguales");
    header('Location: register.php');
}

register($username, $password, $options);
header('Location: login.php');
?>