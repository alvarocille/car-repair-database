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
    <h2>Centro de soporte por Telegram</h2>
    <form class=login name=telegram method=POST method="post" action="telegram.php"/>
    <div>
        <p>Asunto</p>
    </div>
    <div>
        <input name="asunto" type="text"></input>
    </div>
    <div>
        <p>Motivo de la incidencia</p>
    </div>
        <textarea name="mensaje"></textarea>
    </div>';

    if (isset($_REQUEST["asunto"]) | isset($_REQUEST["mensaje"])) {
        $token = 'Introducir el token del FatherBot';
    
        $datos = [
            'chat_id' => '@ del canal de difusión o ID del usuario de Telegram',
            'text' => 'Ha llegado una incidencia con el asunto "'.$_REQUEST["asunto"].'" debido al siguiente motivo: '.$_REQUEST["mensaje"],
            'parse_mode' => 'MarkdownV2' #formato del mensaje
        ];
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . $token . "/sendMessage");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $verificador = json_decode(curl_exec($ch), true);
    
        curl_close($ch);
        if ($verificador['ok'] == 1) {
            echo "<p class='aviso'>Mensaje enviado.</p>";
        } else {
            echo "<p class='error'>Mensaje no enviado.</p>";
        }
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
            <a href="index.php">Inicio de sesión</a>
        </div>
    </footer>
    </body>
    </html>';

 