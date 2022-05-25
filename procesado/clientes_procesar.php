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
if (isset($_REQUEST["Particular"])) {
    $particular=1;
}
else {
    $particular=0;
}
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
            <li><a class=activo href=../Ventanas/clientes.php>Clientes</a></li>
            <li><a href=../Ventanas/aseguradoras.php>Aseguradoras</a></li>
            <li><a href=../Ventanas/proveedores.php>Proveedores</a></li>
            <li><a href=../Ventanas/vehiculos.php>Vehículos</a></li>
            <li><a href=../Ventanas/reparaciones.php>Reparaciones</a></li>
        </ul>
    </nav>
    <main>';

if (isset($_REQUEST["buscar"])) {
    $consulta  = 'SELECT * FROM clientes';
    $resultado = $pdo->query($consulta);
    echo '
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>C.P.</th>
            <th>Población</th>
            <th>Teléfono</th>
            <th>Tlf. 2</th>
            <th>Email</th>
            <th>Banco</th>
            <th>IBAN</th>
            <th>Otra información</th>
            <th>¿Particular?</th>
        </tr>
        ';
    foreach ($resultado as $valor) {
        echo '
        <tr>
            <td>'.$valor["DNI"].'</td>
            <td>'.$valor["Nombre"].'</td>
            <td>'.$valor["Código Postal"].'</td>
            <td>'.$valor["Población"].'</td>
            <td>'.$valor["Teléfono"].'</td>
            <td>'.$valor["Teléfono 2"].'</td>
            <td>'.$valor["Correo electrónico"].'</td>
            <td>'.$valor["Banco"].'</td>
            <td>'.$valor["IBAN"].'</td>
            <td>'.$valor["Otra información"].'</td>
            <td>'.$valor["Particular"].'</td>
        </tr>
        ';
    }
    echo '
    </table>
    ';
}

if (isset($_REQUEST["ingresar"])) {
    try {
        $insert  = "INSERT INTO clientes VALUES
            ('".$_REQUEST['DNI']."',
            '".$_REQUEST['nombre']."',
            '".$particular."',
            '".$_REQUEST['cp']."',
            '".$_REQUEST['poblacion']."',
            '".$_REQUEST['tlf']."',
            '".$_REQUEST['tlf2']."',
            '".$_REQUEST['email']."',
            '".$_REQUEST['banco']."',
            '".$_REQUEST['iban']."',
            '".$_REQUEST['info']."'
        );";
        $registro = $pdo->prepare($insert);
        $registro->execute();
        echo '<p class="aviso">Se ha ingresado el cliente '.$_REQUEST["nombre"].'.</p>';

        
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