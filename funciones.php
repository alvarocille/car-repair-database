<?php
    function conexion() {
        $dbhost=SERVIDOR;
        $dbuser=USUARIO;
        $dbpass=CONTRASEÑA;
        $dbname=BASE_DE_DATOS;
        $directorio=DIRECTORIO;
        try {
            $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
            $dbConnection->exec("set names utf8");
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<script language='JavaScript'>
                location = 'main.php'
            </script>";
            return $dbConnection;
        }
        catch (PDOException $e) {
            echo "<script language='JavaScript'>
                location = '".$directorio."index.php?e=error'
            </script>";
        }
    }

    function desconexion () {
        global $dbConnection;
        $dbConnection = null;
        session_destroy();
        echo "<script language='JavaScript'>
                location = 'index.php?e=cerrado'
            </script>";
    }
?>