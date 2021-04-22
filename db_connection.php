<?php   
/* 
    db_connection.php
    Se encarga de realizar la conexión con la base de datos
*/

    $conn = new mysqli('localhost:3307', 'root', 'root', 'markers');

    if($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>