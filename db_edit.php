<?php
/*
    db_edit.php
    Esta página recibe las peticiones de insertar, actualizar y eliminar marcadores de la base de datos y las
    ejecuta.
*/
    
    session_start();
    
    // Se comprueba que previamente se haya establecido la sesión, en caso contrario se redirecciona a la página 
    // de login
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

        // Cuando desde la página "insert_form" se recibe la información de un nuevo marcador
        if (isset($_POST['insert'])) {
            
            // Obtenemos la información del marcador
            $name = $_POST['name'];
            $lat = $_GET['lat'];
            $lng = $_GET['lng'];
            $info = $_POST['info'];

            // Consulta a la BD para obtener marcadores con el nombre recibido
            $result = $conn->query("SELECT * FROM markers WHERE name='$name'");

            // Si ya existe un marcador con ese nombre, se redirecciona a "insert_form", enviando x=1 como código
            // de error.
            if ($result->num_rows > 0) {    
                
                $conn->close();
                header('Location: insert_form.php?x=1');
            }

            // En caso de que no existan marcadores con ese nombre, se inserta
            else {

                $conn->query("INSERT INTO markers (`name`, `lat`, `lng`, `info`) 
                              VALUES('$name','$lat', '$lng', '$info');");
                
                $conn->close();
                echo "3";
                // Se redirecciona a la página de administración
                header('Location: admin.php');
            }
            
        }

        // Cuando desde "update_form" se recibe la información actualizada de un marcador.
        elseif (isset($_POST['update'])) {
            
            // Obtenemos los valores de los atributos
            $name = $_POST['name'];
            $lat = $_GET['lat'];
            $lng = $_GET['lng'];
            $info = $_POST['info'];
            $id = $_GET['id'];            

            // Cabe la posibilidad de que el nuevo nombre ya exista en otro marcador, por tanto seleccionamos 
            // aquellos marcadores con DISTINTO ID pero con el mismo nombre que queremos actualizar.
            $result = $conn->query("SELECT * FROM markers WHERE name='$name' and id!='$id'");

            // Si existe algún marcador con ese nombre se redirecciona a "update_form" indicando que se ha 
            // producido un error con x=1.
            if ($result->num_rows > 0) {
                
                $conn->close();
                header('Location: update_form.php?id='.$id.'&x=1');
            }

            // En caso de que no exista se actualiza
            else {

                // Se actualiza el marcador en la base de datos
                $conn->query("UPDATE markers
                              SET `name` = '$name', 
                                  `lat` = '$lat',
                                  `lng` = '$lng',
                                  `info` = '$info'
                              WHERE id = '$id';");

                $conn->close();

                // Redireccionar a admin.php
                header('Location: admin.php');

            }

            
        }

        // Si desde la página "admin" se recibe "delete" por GET
        elseif (isset($_GET['delete'])) {

            // Obtenemos el ID del marcador que se va a eliminar (recibido por GET)
            $id = $_GET['id'];

            // Se elimina de la base de datos
            $conn->query("DELETE FROM markers WHERE id='$id';");

            $conn->close();

            // Redireccionar a admin.php
            header('Location: admin.php');

        }

    }

?>