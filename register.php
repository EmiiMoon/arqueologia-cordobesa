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
        <h3 class="centrar-texto">Registrar Administrador</h3>

        <div class="formulario-bg"></div>

        <form method="post" action="" class="formulario">

            <?php
                // Conexión con la BD
                try {
                    require_once('db_connection.php');
                    $conn->query("SET NAMES 'utf8'");
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }

                // El condicional se ejecuta si hemos enviado el formulario con los datos
                if (isset($_POST['register'])) {
            
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    // Crea un hash de 60 caracteres y en un único sentido
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);

                    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
                
                    if ($result->num_rows > 0) {
                        echo '<p class="error-msg">[ERROR] El nombre de usuario ya existe.</p>';
                    }
                
                    if ($result->num_rows == 0) {
                        $result2 = $conn->query("INSERT INTO users (`username`, `password`) VALUES('$username','$password_hash');");
                        
                        if ($result2) {
                            echo '<p class="centrar-texto">Administrador registrado con éxito.</p>';
                        } else {
                            echo '<p class="error-msg">[ERROR] No se pudo registrar al administrador.</p>';
                        }
                    }
                }
            ?>

            <div class="campo">
                <label class="campo__label" for="user">Usuario</label>
                <input class="campo__field" type="text" placeholder="Usuario" name="username" pattern="[a-zA-Z0-9]+" required> 
            </div>

            <div class="campo">
                <label class="campo__label" for="password">Contraseña</label>
                <input class="campo__field" type="password" placeholder="Contraseña"  name="password" required">
            </div>

            <div class="campo">
                <input type="submit" value="Aceptar" class="boton boton--primario" name="register">
                <a href=index.php class="boton boton--secundario">Cancelar</a>
            </div>
        </form>
    </main>

</body>
</html>