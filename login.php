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

    <main class="contenedor">
        <h3 class="centrar-texto">Iniciar Sesión</h3>

        <div class="formulario-bg"></div>

        <form action="" class="formulario">
            <div class="campo">
                <label class="campo__label" for="user">Usuario</label>
                <input class="campo__field" type="text" placeholder="Usuario" id="user"> 
            </div>

            <div class="campo">
                <label class="campo__label" for="password">Contraseña</label>
                <input class="campo__field" type="password" placeholder="Contraseña" id="password">
            </div>

            <div class="campo">
                <input type="submit" value="Aceptar" class="boton boton--primario">
                <a href=index.php class="boton boton--secundario">Cancelar</a>
            </div>
        </form>
    </main>
</body>
</html>