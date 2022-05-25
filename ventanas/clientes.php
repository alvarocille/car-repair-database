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
    <link rel="stylesheet" href="../styles.css" type="text/css">
</head>
<body>
    <nav>
        <ul>
            <li><a href=articulos.php>Artículos</a></li>
            <li><a class="activo" href=clientes.php>Clientes</a></li>
            <li><a href=aseguradoras.php>Aseguradoras</a></li>
            <li><a href=proveedores.php>Proveedores</a></li>
            <li><a href=vehiculos.php>Vehículos</a></li>
            <li><a href=reparaciones.php>Reparaciones</a></li>
        </ul>
    </nav>
    <main>
    <form class="datos" name="clientes" method="post" action="../Procesado/clientes_procesar.php">
    <div>
        <div>
            <p>DNI:</p>
            <input type="text" name="DNI"/>
        </div>
        <div>
            <p>Nombre:</p>
            <input type="text" name="nombre"/>
        </div>
    </div>
    <div>
        <div>
            <p>Código Postal:</p>
            <input type="number" name="cp"/>
        </div>
        <div>
            <p>Población:</p>
            <input type="text" name="poblacion"/>
        </div>
    </div>
    <div>
        <div>
            <p>Teléfono:</p>
            <input type="text" name="tlf"/>
        </div>
        <div>
            <p>Teléfono2:</p>
            <input type="text" name="tlf2"/>
        </div>
        <div>
            <p>Correo electrónico:</p>
            <input type="email" name="email"/>
        </div>
    </div>
    <div>
        <div>
            <p>Banco:</p>
            <input type="text" name="banco"/>
        </div>
        <div>
            <p>IBAN:</p>
            <input type="text" name="iban"/>
        </div>
    </div>
    <div>
        <div>
            <p>Otra información:</p>
            <textarea name="info"></textarea>
        </div>
        <div>
            <p>Particular:</p>
            <input type="checkbox" name="particular"/>
        </div>
    </div>
    <div class="btn">
        <input type="submit" value="Ingresar datos" name="ingresar">
        <input type="submit" value="Búsqueda" name="buscar">
        <input type="reset" value="Reestablecer">
    </div>
</form>
    </main>
    <footer>
        <div>
            <p>Contacto de soporte:</p>
            <a href="tel:+34618629266"><img alt="telefono" src="../imagenes/atencion-al-cliente.png"></a>
            <a href="mailto:cillegta111202@gmail.com"><img alt="correo" src="../imagenes/correo-electronico.png"></a>
        </div>
        <div>';

if (isset($_SESSION["user"])) {
    echo ('
    <img alt="usuario" src="../imagenes/usuario.png">
    <p>'.$_SESSION["user"].'</p>
    <a href="../close_session.php"><img alt="cerrar sesión" src="../imagenes/off.png"></a>
    ');

}

echo '</div>
    </footer>
</body>
</html>
';
?>