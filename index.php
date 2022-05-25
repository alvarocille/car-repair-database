<?php
session_start();
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Talleres Cilsin</title>
    <meta lang="es">
    <meta name="description" content="Gestor de la base de datos de Talleres Cilsin">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <header>
        <h1>
            Talleres Cilsin
        </h1>
    </header>
    <main>
        <form class="login" name="login" method="post" action="login.php">
            <div class="login">
                <p>Nombre de usuario:</p>
                <input type="text" name="user"/>
            </div>
            <div class="login">
                <p>Contraseña:</p>
                <input type="password" name="password"/>
            </div>
            <div class="recordar">
                <p>¿Recordar datos de ingreso?</p>
                <input type="checkbox" name="Recordar">
            </div>
            <div class="btn">
                <input type="submit" value="Acceder">
                <input type="reset" value="Reestablecer">
            </div>
        </form>';


if (isset($_GET["e"]) && $_GET["e"] == 'error') {
        echo '<p class="error">Las credenciales empleadas son incorrectas.</p>';
}
if (isset($_GET["e"]) && $_GET["e"] == 'cerrado') {
    echo '<p class="aviso">La sesión se ha cerrado correctamente.</p>';
}
    
echo '</main>
    <footer>
        <div>
            <p>Contacto de soporte:</p>
            <a href="tel:+34618629266"><img alt="telefono" src="imagenes/atencion-al-cliente.png"></a>
            <a href="mailto:cillegta111202@gmail.com"><img alt="correo" src="imagenes/correo-electronico.png"></a>
            <a href="telegram.php"><img alt="telegram" src="imagenes/telegram.png"></a>
        </div>
        <div>
            <a href="avisolegal.docx">Aviso Legal</a>
        </div>
    </footer>
    </body>
    </html>';
?>


