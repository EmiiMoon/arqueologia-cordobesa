<!-- 
    index.php
    Página principal que se muestra de cara al usuario. Contiene un mapa de Google Maps centrado en Córdoba, en el 
    cual se recogen una serie de marcadores señalizando la ubicación de diversos yacimientos arqueológicos. 
    Haciendo click en estos marcadores se despliegan ventanas con información sobre los mismos.
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

</head>

<body>


    <!-- Se añade la cabecera -->
    <header class="site-header">
        <div class="contenedor">
            <div class="barra">
                <!-- Título de la web, con enlace a la página principal -->
                <a href="index.php">
                    <h1 class=no-margin>Arqueología<span>Cordobesa</span></h1>
                </a>
                <nav class="navegacion">
                    
                    <a href="admin.php">                  
                        <img width="55" height="55" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnIHRyYW5zZm9ybT0ibWF0cml4KDAuNzQsMCwwLDAuNzQsNjYuNTYsMTIxLjU2MDAwMTk4MzY0MjU2KSI+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNNDkwLjY2Nyw0MDUuMzMzaC01Ni44MTFDNDI0LjYxOSwzNzQuNTkyLDM5Ni4zNzMsMzUyLDM2Mi42NjcsMzUycy02MS45MzEsMjIuNTkyLTcxLjE4OSw1My4zMzNIMjEuMzMzICAgIEM5LjU1Nyw0MDUuMzMzLDAsNDE0Ljg5MSwwLDQyNi42NjdTOS41NTcsNDQ4LDIxLjMzMyw0NDhoMjcwLjE0NGM5LjIzNywzMC43NDEsMzcuNDgzLDUzLjMzMyw3MS4xODksNTMuMzMzICAgIHM2MS45MzEtMjIuNTkyLDcxLjE4OS01My4zMzNoNTYuODExYzExLjc5NywwLDIxLjMzMy05LjU1NywyMS4zMzMtMjEuMzMzUzUwMi40NjQsNDA1LjMzMyw0OTAuNjY3LDQwNS4zMzN6IE0zNjIuNjY3LDQ1OC42NjcgICAgYy0xNy42NDMsMC0zMi0xNC4zNTctMzItMzJzMTQuMzU3LTMyLDMyLTMyczMyLDE0LjM1NywzMiwzMlMzODAuMzA5LDQ1OC42NjcsMzYyLjY2Nyw0NTguNjY3eiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNNDkwLjY2Nyw2NGgtNTYuODExYy05LjI1OS0zMC43NDEtMzcuNDgzLTUzLjMzMy03MS4xODktNTMuMzMzUzMwMC43MzYsMzMuMjU5LDI5MS40NzcsNjRIMjEuMzMzICAgIEM5LjU1Nyw2NCwwLDczLjU1NywwLDg1LjMzM3M5LjU1NywyMS4zMzMsMjEuMzMzLDIxLjMzM2gyNzAuMTQ0QzMwMC43MzYsMTM3LjQwOCwzMjguOTYsMTYwLDM2Mi42NjcsMTYwICAgIHM2MS45MzEtMjIuNTkyLDcxLjE4OS01My4zMzNoNTYuODExYzExLjc5NywwLDIxLjMzMy05LjU1NywyMS4zMzMtMjEuMzMzUzUwMi40NjQsNjQsNDkwLjY2Nyw2NHogTTM2Mi42NjcsMTE3LjMzMyAgICBjLTE3LjY0MywwLTMyLTE0LjM1Ny0zMi0zMmMwLTE3LjY0MywxNC4zNTctMzIsMzItMzJzMzIsMTQuMzU3LDMyLDMyQzM5NC42NjcsMTAyLjk3NiwzODAuMzA5LDExNy4zMzMsMzYyLjY2NywxMTcuMzMzeiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNNDkwLjY2NywyMzQuNjY3SDIyMC41MjNjLTkuMjU5LTMwLjc0MS0zNy40ODMtNTMuMzMzLTcxLjE4OS01My4zMzNzLTYxLjkzMSwyMi41OTItNzEuMTg5LDUzLjMzM0gyMS4zMzMgICAgQzkuNTU3LDIzNC42NjcsMCwyNDQuMjI0LDAsMjU2YzAsMTEuNzc2LDkuNTU3LDIxLjMzMywyMS4zMzMsMjEuMzMzaDU2LjgxMWM5LjI1OSwzMC43NDEsMzcuNDgzLDUzLjMzMyw3MS4xODksNTMuMzMzICAgIHM2MS45MzEtMjIuNTkyLDcxLjE4OS01My4zMzNoMjcwLjE0NGMxMS43OTcsMCwyMS4zMzMtOS41NTcsMjEuMzMzLTIxLjMzM0M1MTIsMjQ0LjIyNCw1MDIuNDY0LDIzNC42NjcsNDkwLjY2NywyMzQuNjY3eiAgICAgTTE0OS4zMzMsMjg4Yy0xNy42NDMsMC0zMi0xNC4zNTctMzItMzJzMTQuMzU3LTMyLDMyLTMyYzE3LjY0MywwLDMyLDE0LjM1NywzMiwzMlMxNjYuOTc2LDI4OCwxNDkuMzMzLDI4OHoiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+" />
                    </a>
                                        
                </nav>
            </div>
        </div>
    </header>
    
    <!-- Elemento div dentro del cual se va a mostrar el mapa -->
    <div id ='map'></div> 
    
    <!--Script que carga la librería de Google Maps.
    	El enlace contiene la API key que enlaza con el proyecto de Google Cloud
        callback=initMap se encarga de llamar a la función initMap() que definimos más abajo
        atributo async para que la página se muestre mientras que se carga el mapa-->
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
    
    <script>
        // Conexión con la base de datos. Se seleccionan todas las filas de la tabla marcadores.
        <?php
            try {
                require_once('db_connection.php');
                $conn->query("SET NAMES 'utf8'");
                $sql = "SELECT * FROM markers";
                $result = $conn->query($sql);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        ?>
            
        // Array en el que se van a almacenar los marcadores.
        var markers = [];

        // El bucle recorre cada marcador, almacenando sus datos en un objeto "marker" que se añade al vector que 
        // hemos definido previamente.
        <?php
            while ($row = $result->fetch_assoc()){
        ?>
                // Objeto que contiene todos los atributos de un marcador.
                var marker = {
                    
                    name: `<?php echo $row["name"];?>`,
                    info: `<?php echo $row["info"];?>`,
                    lat: <?php echo $row["lat"];?>,
                    lng: <?php echo $row["lng"];?>
                
                };
                
                // Se inserta el objeto marcador al final del array de marcadores.
                markers.push(marker);
        
        <?php
            }

            // Cierre de la conexión con la base de datos
            $conn->close();
        ?>


        // La función initMap() se encarga de crear el mapa y añadir los marcadores
        function initMap() {
                
            // Se declara un objeto de la clase Map pasándole el ID del elemento div donde vamos a mostrarlo
            const map = new google.maps.Map(document.getElementById('map'), {
                
                // Coordenadas del centro del mapa y nivel de zoom
                center: {lat: 37.89155, lng:  -4.77275}, 
                zoom: 12,
            
            });

            // Se itera por todos los elementos del vector de marcadores, añadiéndolos al mapa.
            markers.forEach(marker => {
                
                // Se declara un nuevo marcador con los parámetros latitud, longitud y nombre.
                const map_marker = new google.maps.Marker({
                    
                    position: {lat: marker["lat"], lng: marker["lng"]},
                    map: map,
                    title: marker["name"]
               
                });

                // Se declara una ventana de información. 
                // El contenido es un string con el HTML que se mostrará en la ventana, dentro del cual incluimos 
                // el nombre y la información del marcador.
                const infowindow = new google.maps.InfoWindow({
                   
                    content: marker["info"]
                        
                });

                // Añadimos al marcador un listener para que al hacer click se abra la ventana que hemos declarado.
                map_marker.addListener("click", () => {
                  
                    infowindow.open(map, map_marker);
             
                });
            });

        }
        
    </script>

</body>

</html>