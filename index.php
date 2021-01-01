<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arquelogía Cordobesa</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/styles.css">

</head>
<body>
    <!-- Se añade la cabecera -->
    <header class="site-header">
        <div class="contenedor">
            <div class="barra">
                <a href="index.php">
                    <h1 class=no-margin>Arqueología<span>Cordobesa</span></h1>
                </a>
                <nav class="navegacion">
                    <a href="admin.php">Filtrar</a>
                    <a href="admin.php">Log In</a>
                </nav>
            </div> <!-- Barra -->
        </div> <!-- Contenedor -->
    </header>
    <div id ='map'></div> 
    
    <!--Script que carga la librería de Google Maps.
    	Enlace para la fase de desarrollo. Cuando se vaya a utilizar la aplicación de manera definitiva es necesario añadir un API key que vincule con nuestro proyecto de Google Cloud.
        callback=initMap se encarga de llamar a la función initMap() que definimos más abajo
        atributo async para que la página se muestre mientras que se carga el mapa-->
    <script src="https://maps.googleapis.com/maps/api/js?&callback=initMap" async defer></script>

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

        // Se itera por cada fila de la tabla.
        <?php
            while ($row = $result->fetch_assoc()){
        ?>
                // Objeto que contiene todos los atributos de un marcador.
                var marker = {
                    name: "<?php echo $row["name"];?>",
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

        function initMap() {
                
            // Se declara un objeto de la clase Map pasándole el ID del elemento div donde vamos a mostrarlo
            const map = new google.maps.Map(document.getElementById('map'), {
                // Coordenadas del centro del mapa y nivel de zoom
                center: {lat: 37.89155, lng:  -4.77275}, 
                zoom: 13,
            });

            // Se itera por todos los elementos del vector de marcadores, añadiéndolos al mapa.
            markers.forEach(marker => {
                
                const map_marker = new google.maps.Marker({
                    position: {lat: marker["lat"], lng: marker["lng"]},
                    map: map,
                    title: marker["name"]
                });

                // Se declara una ventana de información. El contenido es un string con el HTML que se mostrará en la ventana.
                const infowindow = new google.maps.InfoWindow({
                    content: '<b>'+marker["name"]+'</b><p>'+marker["info"]+'</p>',
                });

                // Añadimos al marcador un listener para que al hacer click se muestre la ventana que hemos declarado.
                map_marker.addListener("click", () => {
                    infowindow.open(map, map_marker);
                });
            });
        }
        
    </script>
</body>
</html>