<?php
session_start();
define('SERVIDOR', $_SESSION["host"]);
define('USUARIO', $_SESSION["user"]);
define('CONTRASEÑA', $_SESSION["contraseña"]);
define('BASE_DE_DATOS', $_SESSION["bd"]);
function conexion() {
    $dbhost=SERVIDOR;
    $dbuser=USUARIO;
    $dbpass=CONTRASEÑA;
    $dbname=BASE_DE_DATOS;
    $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
    $dbConnection->exec("set names utf8");
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConnection;
}
$pdo=conexion();

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
            <li><a href=../Ventanas/articulos.php>Artículos</a></li>
            <li><a href=../Ventanas/clientes.php>Clientes</a></li>
            <li><a href=../Ventanas/aseguradoras.php>Aseguradoras</a></li>
            <li><a href=../Ventanas/proveedores.php>Proveedores</a></li>
            <li><a class=activo href=../Ventanas/vehiculos.php>Vehículos</a></li>
            <li><a href=../Ventanas/reparaciones.php>Reparaciones</a></li>
        </ul>
    </nav>
    <main>';

if (isset($_REQUEST["buscar"])) {
    $consulta  = 'SELECT * FROM vehículos';
    $resultado = $pdo->query($consulta);
    echo '
    <table>
        <tr>
            <th>Matrícula</th>
            <th>Cliente</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Versión</th>
            <th>KM</th>
            <th>Última ITV</th>
            <th>Próx. ITV</th>
            <th>Otra info</th>
            <th>Aseguradora</th>
            <th>Seguro</th>
        </tr>
        ';
    foreach ($resultado as $valor) {
        echo '
        <tr>
            <td>'.$valor["Matrícula"].'</td>
            <td>'.$valor["Cliente"].'</td>
            <td>'.$valor["Marca"].'</td>
            <td>'.$valor["Modelo"].'</td>
            <td>'.$valor["Versión"].'</td>
            <td>'.$valor["Kilómetros"].'</td>
            <td>'.$valor["Última ITV"].'</td>
            <td>'.$valor["Próxima ITV"].'</td>
            <td>'.$valor["Otra información"].'</td>
            <td>'.$valor["Aseguradora"].'</td>
            <td>'.$valor["Datos seguro"].'</td>
        </tr>
        ';
    }
    echo '
    </table>
    ';
}

if (isset($_REQUEST["ingresar"])) {
    try {
        $insert  = "INSERT INTO vehículos VALUES
            '".$_REQUEST['matricula']."',
            '".$_REQUEST['cliente']."',
            '".$_REQUEST['marca']."',
            '".$_REQUEST['modelo']."',
            '".$_REQUEST['version']."',
            '".$_REQUEST['km']."',
            '".$_REQUEST['litv']."',
            '".$_REQUEST['pitv']."',
            '".$_REQUEST['info']."',
            '".$_REQUEST['aseguradora']."',
            '".$_REQUEST['seguro']."'
        );";
        $registro = $pdo->prepare($insert);
        $registro->execute();
        echo '<p class="aviso">Se ha ingresado el vehículo '.$_REQUEST["matricula"].'.</p>';

        
    }
    catch (PDOException) {
        echo '<p class="error">No ha sido posible ingresar los datos.</p>';
    }
}
    echo '
    </table>
    ';

echo '</main>
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