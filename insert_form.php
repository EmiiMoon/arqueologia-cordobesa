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
    <!-- Include CKEditor library -->
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
</head>
<body>
    
<!-- Si no se ha iniciado sesión se redirecciona al log in -->
    <?php
        session_start();
        
        if(!isset($_SESSION['user_id'])){
            header('Location: login.php');
            exit;
        }
    ?>
    
    <!-- Se añade la cabecera -->
    <header class="site-header">
        <div class="contenedor">
            <div class="barra">
                <a href="index.php">
                    <h1 class=no-margin>Arqueología<span>Cordobesa</span></h1>
                </a>
                <nav class="navegacion">
                    <a href="admin.php">Administrar</a>
                </nav>
            </div> <!-- Barra -->
        </div> <!-- Contenedor -->
    </header>

    <main class="contenedor">
        <h3 class="centrar-texto">Nuevo Marcador</h3>

        <div class="formulario-bg"></div>
        
        <form method="post" action="db_edit.php" class="formulario">

            <?php
                if($_GET["x"] == 1) {
                    echo '<p class="error-msg">[ERROR] Ya existe un marcador con ese nombre.</p>';
                }
            ?>

            <div class="campo">
                <label class="campo__label" for="name">Nombre</label>
                <input class="campo__field" type="text" placeholder="Nombre del marcador" name="name" required> 
            </div>

            <div class="campo">
                <label class="campo__label" for="lat">Latitud</label>
                <input class="campo__field" placeholder="Latitud"  name="lat" type="number" step="any" required>
            </div>

            <div class="campo">
                <label class="campo__label" for="lng">Longitud</label>
                <input class="campo__field" placeholder="Longitud"  name="lng" type="number" step="any" required>
            </div>
            
            <div class="campo">
                <label class="campo__label" for="video">Vídeo</label>
                <input class="campo__field" type="text" placeholder="URL del vídeo" name="video"> 
            </div>

            <div class="campo">
                <label class="campo__label" for="info">Información</label>
                <textarea class="campo__field--textarea" name="info" id="info">Información del marcador</textarea>
            </div>

            <div class="campo">
                <input type="submit" value="Aceptar" class="boton boton--primario" name="insert">
                <a href=admin.php class="boton boton--secundario">Cancelar</a>
            </div>

        </form>
    </main>
    
    <script>
        ClassicEditor
            .create( document.querySelector( '#info' ), {
                toolbar: ['heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList']
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>