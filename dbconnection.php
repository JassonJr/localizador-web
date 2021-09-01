<?php
    
    $sucesso = "conexão em análise";

    $host = "localhost";
    $user = "root";
    $pass = "usbw";
    $database = "location";


    $mysqli = new mysqli($host, $user, $pass, $database);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>
<html>
    <head>
     <meta charset="utf-8">
    </head>
    <body>
        <?php

        ?>
    </body>
</html>