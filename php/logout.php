<?php
    setcookie('token_user','',time()-100);
    header("location: login.php");
    exit;
?>
