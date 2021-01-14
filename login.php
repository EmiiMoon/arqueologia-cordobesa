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
                    
                </nav>
            </div> <!-- Barra -->
        </div> <!-- Contenedor -->
    </header>

    <?php

        session_start();
        
        if (isset($_POST['login'])) {

            // Conexión con la BD
            try {
                require_once('db_connection.php');
                $conn->query("SET NAMES 'utf8'");
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = $conn->query("SELECT * FROM users WHERE username='$username'");
            
            if ($result->num_rows != 1) {
                echo '<p class="error-msg">ERROR: Combinación de usuario y contraseña incorrecta.</p>';
            } else {

                $user = $result->fetch_assoc();
                
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    echo '<p class="success">Congratulations, you are logged in!</p>';
                    header('Location: admin.php');
                    exit;
                } else {
                    echo '<p class="error">Username password combination is wrong!</p>';
                }
            }

            $conn->close();
        }
    
    ?>


    <main class="contenedor">
        <h3 class="centrar-texto">Iniciar Sesión</h3>

        <div class="formulario-bg"></div>

        <form action="" class="formulario" method="post">
            <div class="campo">
                <label class="campo__label" for="username">Usuario</label>
                <input class="campo__field" type="text" placeholder="Usuario" name="username"> 
            </div>

            <div class="campo">
                <label class="campo__label" for="password">Contraseña</label>
                <input class="campo__field" type="password" placeholder="Contraseña" name="password">
            </div>

            <div class="campo">
                <input type="submit" value="Aceptar" class="boton boton--primario" name="login">
                <a href=index.php class="boton boton--secundario">Cancelar</a>
            </div>
        </form>
    </main>
</body>
</html>