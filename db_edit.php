<?php
    //Si no se ha iniciado sesión se redirecciona al log in
    session_start();
    
    if(!isset($_SESSION['user_id'])){
        header('Location: login.php');
        exit;
    }

    else {
        // Conexión con la BD
        try {
            require_once('db_connection.php');
            $conn->query("SET NAMES 'utf8'");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        // Se ejecuta cuando se envía un nuevo marcador que insertar en la BD
        if (isset($_POST['insert'])) {
            
            $name = $_POST['name'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            $info = $_POST['info'];
            $video = $_POST['video'];

            $result = $conn->query("SELECT * FROM markers WHERE name='$name'");

            // Se comprueba si el marcador ya existe
            if ($result->num_rows > 0) {
                header('Location: insert_form.php?x=1');
            }
            // En caso de que no exista se inserta
            else {
                $conn->query("INSERT INTO markers (`name`, `lat`, `lng`, `info`, `video`) VALUES('$name','$lat', '$lng', '$info', '$video');");
                header('Location: admin.php');
            }
            
        }

        // Se ejecuta cuando se envían los datos para actualizar un marcador
        elseif (isset($_POST['update'])) {
            
            $name = $_POST['name'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            $info = $_POST['info'];
            $video = $_POST['video'];
            $id = $_GET['id'];

            // Se seleccionan aquellas filas con el mismo nombre que queremos introducir, pero con distinto id
            $result = $conn->query("SELECT * FROM markers WHERE name='$name' and id!='$id'");

            // Se comprueba si el marcador ya existe
            if ($result->num_rows > 0) {
                header('Location: update_form.php?id='.$id.'&x=1');
            }
            // En caso de que no exista se actualiza
            else {
                $conn->query("UPDATE markers
                            SET `name` = '$name',
                                `lat` = '$lat',
                                `lng` = '$lng',
                                `info` = '$info',
                                `video` = '$video'
                            WHERE id = '$id';");

                header('Location: admin.php');
            }

            
        }

        // Se ejecuta cuando se envía un marcador que hay que eliminar
        elseif (isset($_GET['delete'])) {
            $id = $_GET['id'];
            $conn->query("DELETE FROM markers WHERE id='$id';");
            header('Location: admin.php');
        }

        $conn->close();
    }
?>