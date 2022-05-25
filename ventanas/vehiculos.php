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
            <li><a href=clientes.php>Clientes</a></li>
            <li><a href=aseguradoras.php>Aseguradoras</a></li>
            <li><a href=proveedores.php>Proveedores</a></li>
            <li><a class="activo" href=vehiculos.php>Vehículos</a></li>
            <li><a href=reparaciones.php>Reparaciones</a></li>
        </ul>
    </nav>
    <main>
    <form class="datos" name="vehiculos" method="post" action="../Procesado/vehiculos_procesar.php">
    <div>
        <div>
            <p>Matrícula:</p>
            <input type="text" name="matricula"/>
        </div>
        <div>
            <p>Cliente:</p>
            <input type="text" name="cliente"/>
        </div>
    </div>
    <div>
        <div>
            <p>Marca:</p>
            <input type="number" name="marca"/>
        </div>
        <div>
            <p>Modelo:</p>
            <input type="text" name="modelo"/>
        </div>
        <div>
            <p>Versión:</p>
            <input type="text" name="version"/>
        </div>
    </div>
    <div>
        <div>
            <p>Kilómetros:</p>
            <input type="number" name="km"/>
        </div>
        <div>
            <p>Última ITV:</p>
            <input type="date" name="litv"/>
        </div>
        <div>
            <p>Próxima ITV:</p>
            <input type="date" name="pitv"/>
        </div>
    </div>
    <div>
        <div>
            <p>Aseguradora:</p>
            <input type="text" name="aseguradora"/>
        </div>
        <div>
            <p>Datos seguro:</p>
            <textarea name="seguro"></textarea>
        </div>
    </div>
    <div>
        <div>
            <p>Otra información:</p>
            <textarea name="info"></textarea>
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