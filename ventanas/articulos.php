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
            <li><a class="activo" href=articulos.php>Artículos</a></li>
            <li><a href=clientes.php>Clientes</a></li>
            <li><a href=aseguradoras.php>Aseguradoras</a></li>
            <li><a href=proveedores.php>Proveedores</a></li>
            <li><a href=vehiculos.php>Vehículos</a></li>
            <li><a href=reparaciones.php>Reparaciones</a></li>
        </ul>
    </nav>
    <main>
        <form class="datos" name="articulos" method="post" action="../Procesado/articulos_procesar.php">
            <div>
                <div>
                    <p>Referencia:</p>
                    <input type="text" name="referencia"/>
                </div>
                <div>
                    <p>Marca:</p>
                    <input type="text" name="marca"/>
                </div>
            </div>
            <div>
                <div>
                    <p>Familia:</p>
                    <input type="text" name="familia"/>
                </div>
                <div>
                    <p>Proveedor:</p>
                    <input type="text" name="proveedor"/>
                </div>
            </div>
            <div>
                <div>
                    <p>Descripción:</p>
                    <textarea name="descripcion"></textarea>
                </div>
                <div>
                    <p>Reparacion:</p>
                    <input type="text" name="reparacion"/>
                </div>
            </div>
            <div class="precios">
                <div>
                    <p>Precio tarifa:</p>
                    <input type="number" name="precio_tarifa"/>
                </div>
                <div>
                    <p>Descuento:</p>
                    <input type="number" name="descuento"/>
                </div>
                <div>
                    <p>Precio coste:</p>
                    <input type="number" name="precio_coste"/>
                </div>
                <div>
                    <p>Impuesto:</p>
                    <input type="number" name="impuesto"/>
                </div>
                <div>
                    <p>Precio venta:</p>
                    <input type="number" name="precio_venta"/>
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