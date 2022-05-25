<?php
session_start();
echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Talleres Cilsin</title>
    <meta lang="es">
    <meta name="description" content="Gestor de la base de datos de Talleres Cilsin">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <nav>
        <ul>
            <li><a href=ventanas/articulos.php>Artículos</a></li>
            <li><a href=ventanas/clientes.php>Clientes</a></li>
            <li><a href=ventanas/aseguradoras.php>Aseguradoras</a></li>
            <li><a href=ventanas/proveedores.php>Proveedores</a></li>
            <li><a href=ventanas/vehiculos.php>Vehículos</a></li>
            <li><a href=ventanas/reparaciones.php>Reparaciones</a></li>
        </ul>
    </nav>
    <main>
        <img alt="ordenador" src="imagenes/informatica.png">
';

if (isset($_SESSION["user"])) {
    echo ('<p class="aviso">Bienvenido '.$_SESSION["user"].'</p>');
}

echo '
    </main>
    <footer>
        <div>
            <p>Contacto de soporte:</p>
            <a href="tel:+34618629266"><img alt="telefono" src="imagenes/atencion-al-cliente.png"></a>
            <a href="mailto:cillegta111202@gmail.com"><img alt="correo" src="imagenes/correo-electronico.png"></a>
        </div>
        <div>';

if (isset($_SESSION["user"])) {
    echo ('
    <img alt="usuario" src="imagenes/usuario.png">
    <p>'.$_SESSION["user"].'</p>
    <a href="close_session.php"><img alt="cerrar sesión" src="imagenes/off.png"></a>
    ');

}

echo '
    <div>
        <a href="Facilita.docx>Aviso Legal</a>
    </div>
';
echo '</div>
    </footer>
</body>
</html>
';

?>