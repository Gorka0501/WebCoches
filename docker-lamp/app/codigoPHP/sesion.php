<?php
ini_set('session.cookie_httponly', "1");
ini_set('session.cookie_samesite', 'Strict');
session_start();
if(!$_SESSION['loged']==true){header('Location: ../paginas/index.php');}
if(!isset($_SESSION["token"])){$_SESSION['token'] = bin2hex(random_bytes(32));}
?>
