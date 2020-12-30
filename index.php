<!DOCTYPE html>
<html lang="en">
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

    <header class="site-header">
        <div class="contenedor">
            <div class="barra">
                <a href="">
                    <h1 class=no-margin>Arqueología<span>Cordobesa</span></h1>
                </a>
                <nav class="navegacion">
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
        function initMap() {
                
            // Se declara un objeto de la clase Map pasándole el ID del elemento div donde vamos a mostrarlo
            const map = new google.maps.Map(document.getElementById('map'), {
                // Coordenadas del centro del mapa y nivel de zoom
                center: {lat: 37.89155, lng:  -4.77275}, 
                zoom: 13,
            });
        }
        
    </script>
</body>
</html>