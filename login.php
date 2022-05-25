<?php
session_start();
include('funciones.php');
define('DIRECTORIO', '');

/* CONFIGURACIÓN */
$_SESSION["host"] = 'localhost';
$_SESSION["user"] = $_REQUEST["user"];
$_SESSION["contraseña"] = $_REQUEST["password"];
$_SESSION["bd"] = 'proyecto';

define('SERVIDOR', $_SESSION["host"]);
define('USUARIO', $_SESSION["user"]);
define('CONTRASEÑA', $_SESSION["contraseña"]);
define('BASE_DE_DATOS', $_SESSION["bd"]);

/* CONEXIÓN */


conexion();

?>

