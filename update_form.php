<!-- 
    update_form.php
    Página que contiene el formulario para editar los datos de un marcador existente.
-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arquelogía Cordobesa</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" 
          rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/styles.css">
    <!-- Include CKEditor library -->
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
</head>

<body>
    
    <!-- Se comprueba que previamente se haya establecido la sesión, en caso contrario se redirecciona a la 
    página de login -->
    <?php
        session_start();
        
        if(!isset($_SESSION['user_id'])){
            header('Location: login.php');
            exit;
        }
    ?>

    <?php 
        
        // Conexión con la base de datos
        try {
            require_once('db_connection.php');
            $conn->query("SET NAMES 'utf8'");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        // Se obtiene el ID del marcador que vamos a editar
        $id = $_GET["id"];

        // Realizamos una consulta para obtener los datos del marcador de la BD
        $result = $conn->query("SELECT * FROM markers WHERE id='$id'");
        $marker = $result->fetch_assoc();

        // Cerramos la conexiçon con la BD
        $conn->close();
    ?>
    
    <!-- Se añade la cabecera -->
    <header class="site-header">
        <div class="contenedor">
            <div class="barra">
                <a href="index.php">
                    <!-- Título de la web, con enlace a la página principal -->
                    <h1 class=no-margin>Arqueología<span>Cordobesa</span></h1>
                </a>
                <nav class="navegacion">
                    <!-- Opción para ir a la página de administración -->
                    <a href="admin.php">                  
                        <img width="55" height="55" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnIHRyYW5zZm9ybT0ibWF0cml4KDAuNzQsMCwwLDAuNzQsNjYuNTYsMTIxLjU2MDAwMTk4MzY0MjU2KSI+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNNDkwLjY2Nyw0MDUuMzMzaC01Ni44MTFDNDI0LjYxOSwzNzQuNTkyLDM5Ni4zNzMsMzUyLDM2Mi42NjcsMzUycy02MS45MzEsMjIuNTkyLTcxLjE4OSw1My4zMzNIMjEuMzMzICAgIEM5LjU1Nyw0MDUuMzMzLDAsNDE0Ljg5MSwwLDQyNi42NjdTOS41NTcsNDQ4LDIxLjMzMyw0NDhoMjcwLjE0NGM5LjIzNywzMC43NDEsMzcuNDgzLDUzLjMzMyw3MS4xODksNTMuMzMzICAgIHM2MS45MzEtMjIuNTkyLDcxLjE4OS01My4zMzNoNTYuODExYzExLjc5NywwLDIxLjMzMy05LjU1NywyMS4zMzMtMjEuMzMzUzUwMi40NjQsNDA1LjMzMyw0OTAuNjY3LDQwNS4zMzN6IE0zNjIuNjY3LDQ1OC42NjcgICAgYy0xNy42NDMsMC0zMi0xNC4zNTctMzItMzJzMTQuMzU3LTMyLDMyLTMyczMyLDE0LjM1NywzMiwzMlMzODAuMzA5LDQ1OC42NjcsMzYyLjY2Nyw0NTguNjY3eiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNNDkwLjY2Nyw2NGgtNTYuODExYy05LjI1OS0zMC43NDEtMzcuNDgzLTUzLjMzMy03MS4xODktNTMuMzMzUzMwMC43MzYsMzMuMjU5LDI5MS40NzcsNjRIMjEuMzMzICAgIEM5LjU1Nyw2NCwwLDczLjU1NywwLDg1LjMzM3M5LjU1NywyMS4zMzMsMjEuMzMzLDIxLjMzM2gyNzAuMTQ0QzMwMC43MzYsMTM3LjQwOCwzMjguOTYsMTYwLDM2Mi42NjcsMTYwICAgIHM2MS45MzEtMjIuNTkyLDcxLjE4OS01My4zMzNoNTYuODExYzExLjc5NywwLDIxLjMzMy05LjU1NywyMS4zMzMtMjEuMzMzUzUwMi40NjQsNjQsNDkwLjY2Nyw2NHogTTM2Mi42NjcsMTE3LjMzMyAgICBjLTE3LjY0MywwLTMyLTE0LjM1Ny0zMi0zMmMwLTE3LjY0MywxNC4zNTctMzIsMzItMzJzMzIsMTQuMzU3LDMyLDMyQzM5NC42NjcsMTAyLjk3NiwzODAuMzA5LDExNy4zMzMsMzYyLjY2NywxMTcuMzMzeiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNNDkwLjY2NywyMzQuNjY3SDIyMC41MjNjLTkuMjU5LTMwLjc0MS0zNy40ODMtNTMuMzMzLTcxLjE4OS01My4zMzNzLTYxLjkzMSwyMi41OTItNzEuMTg5LDUzLjMzM0gyMS4zMzMgICAgQzkuNTU3LDIzNC42NjcsMCwyNDQuMjI0LDAsMjU2YzAsMTEuNzc2LDkuNTU3LDIxLjMzMywyMS4zMzMsMjEuMzMzaDU2LjgxMWM5LjI1OSwzMC43NDEsMzcuNDgzLDUzLjMzMyw3MS4xODksNTMuMzMzICAgIHM2MS45MzEtMjIuNTkyLDcxLjE4OS01My4zMzNoMjcwLjE0NGMxMS43OTcsMCwyMS4zMzMtOS41NTcsMjEuMzMzLTIxLjMzM0M1MTIsMjQ0LjIyNCw1MDIuNDY0LDIzNC42NjcsNDkwLjY2NywyMzQuNjY3eiAgICAgTTE0OS4zMzMsMjg4Yy0xNy42NDMsMC0zMi0xNC4zNTctMzItMzJzMTQuMzU3LTMyLDMyLTMyYzE3LjY0MywwLDMyLDE0LjM1NywzMiwzMlMxNjYuOTc2LDI4OCwxNDkuMzMzLDI4OHoiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+" />
                    </a>
                </nav>
            </div>
        </div>
    </header>


        <!-- Título de la página "Editar Sitio" -->
        <?php echo "<h3 class=\"centrar-texto\">Editar Sitio: ".$marker["name"]."</h3>"?>

        <div class="formulario-bg"></div>
        
        <br>

        <!-- Si al enviar los datos, la página "db_edit.php" devuelve el valor x=1 mediante GET, indica que 
        ese nombre ya existe para otro marcador -->
        <?php
            if($_GET["x"] == 1) {
                echo '<p class="error-msg">[ERROR] Ya existe un marcador con ese nombre.</p>';
            }
        ?>

        <!-- Elemento div dentro del cual se va a mostrar el mapa -->
        <div class="campo">Seleccione la ubicación:</div>
        <div id ='map2'></div>

        <br>

        <!-- Formulario que permite editar la información del marcador -->
        <form method="post" 
              action=<?php echo "\"db_edit.php?id=".$id."&lat=".$marker['lat']."&lng=".$marker['lng']."\"";?> 
              class="formulario">
            
            <!-- Campo para modificar el nombre del sitio -->
            <div class="centrar-texto">
            <label class="campo__label2" for="name">Nombre del sitio:</label><br>
            <input class="campo__field2" 
                   type="text" 
                   placeholder="Nombre del sitio" 
                   name="name" 
                   id="nombre"
                   value=<?php echo '"'.$marker["name"].'"';?>
                   required> 
            </div>
            
            <br>

            <!-- Campo para introducir el texto de información sobre el sitio.
            Se ha utilizado el editor de texto CKEditor que nos permite dar algo de formato al texto e insertar
            vídeos pegando únicamente la URL. Para llamar al CKEditor especificamos el id="info", que vinculado
            al CKEditor que se declara más abajo. -->
            <div class="campo">
                <textarea class="campo__field--textarea" name="info" id="info">
                    <?php echo $marker["info"]; ?>
                </textarea>
            </div>
            
            <!-- Botones de aceptar y cancelar -->
            <div class="campo">

                <!-- El botón de aceptar envía la información del formulario. Mediante name="update" se indica
                a la página "db_edit" que debe actualizar el marcador en la base de datos. -->
                <input type="submit" value="Aceptar" class="boton boton--primario" name="update">
                
                <!-- El botón de cancelar descarta la información que hayamos introducido y nos redirecciona a
                la pagina de administración -->
                <a href=admin.php class="boton boton--secundario">Cancelar</a>
            </div>

        </form>

    <!--Script que carga la librería de Google Maps.
    El enlace contiene la API key que enlaza con el proyecto de Google Cloud
    callback=initMap se encarga de llamar a la función initMap() que definimos más abajo
    atributo async para que la página se muestre mientras que se carga el mapa-->
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>

    <script>
        
        id = "<?php echo $marker['id'];?>";

        // La función initMap() se encarga de crear el mapa y añadir el marcador
        function initMap() {

            // Se declara un objeto de la clase Map pasándole el ID del elemento div donde vamos a mostrarlo
            const map = new google.maps.Map(document.getElementById('map2'), {
                
                // Coordenadas del centro del mapa y nivel de zoom
                center: {lat: <?php echo $marker['lat'];?>, lng:  <?php echo $marker['lng'];?>}, 
                zoom: 12,
            
            });

            // Declaramos el marcador en el centro del mapa, y de tipo draggable para poder arrastrarlo.
            const marker = new google.maps.Marker({
                position: {lat: <?php echo $marker['lat'];?>, lng:  <?php echo $marker['lng'];?>},
                map: map,
                draggable: true,
                title: "Localización"
            });

            // Añadimos un listener al mapa que controle el evento de click.
            map.addListener("click", (e) => {
                // Las coordenadas del punto donde hemos hecho click se asignan al marcador
                marker.setPosition(e.latLng);
                // Se centra el mapa en estas coordenadas
                map.panTo(e.latLng);

                $lat = e.latLng.lat();
                $lng = e.latLng.lng();

                // Se modifica el atributo "action" del formulario, y añadimos los parámetros latitud y longitud para
                // que se envíen mediante GET.
                $(".formulario").attr('action', 'db_edit.php?id=' + id + '&lat=' + $lat + '&lng=' + $lng);

            });

            // Añadimos al marcador un listener que controla el evento de drag (arrastrar).
            marker.addListener("drag", (e) => {
                // Se centra el mapa en las coordenadas donde arrastramos el marcador
                //map.panTo(e.latLng);

                $lat = e.latLng.lat();
                $lng = e.latLng.lng();
                
                // Se modifica el atributo "action" del formulario, y añadimos los parámetros latitud y longitud para
                // que se envíen mediante GET. 
                $(".formulario").attr('action', 'db_edit.php?id=' + id + '&lat=' + $lat + '&lng=' + $lng);
            });
        }

    </script> 

    <script>

        // Declaramos el editor de texto que usamos en el formulario, indicandole las opciones que queremos
        // que tenga: encabezados, negrita, cursiva, url, listas de puntos y numeradas y vídeo.
        ClassicEditor
            .create( document.querySelector( '#info' ), {
                
                toolbar: ['heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'mediaEmbed'],
                mediaEmbed: {previewsInData: true}
            } )
            .catch( error => {
                console.error( error );
            } );

    </script>

    <script src="jquery-1.12.0.min.js"></script>

</body>
</html>