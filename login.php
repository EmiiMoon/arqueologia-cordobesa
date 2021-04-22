<!-- 
    login.php
    En esta página se muestra el formulario de inicio de sesión, donde el usuario introduce su nombre de usuario y 
    su contraseña. Esa información es enviada a esta misma página mediante POST para se verificada e inicializar
    las variables de sesión..
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
            </div> 
        </div>
    </header>

    <?php

        // Se inicia la sesión
        session_start();
        
        // Este condicional sólo se ejecuta si previamente se ha enviado información de usuario utilizando el 
        // formulario de más abajo.
        // Se recibe la información, se verifica y se inicia la sesión en caso de ser correcta.
        if (isset($_POST['login'])) {

            // Conexión con la BD
            try {
                require_once('db_connection.php');
                $conn->query("SET NAMES 'utf8'");
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            
            // Almacenamos las variables username y password recibidas por POST (las que ha introducido el usuario
            // en el formulario)
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Obtenemos los usuarios de la base de datos que coinciden con el nombre de usuario recibido
            $result = $conn->query("SELECT * FROM users WHERE username='$username'");
            
            // Si el resultado de la consulta tiene 0 filas significa que no hay ningún usuario con ese nombre.
            // Si la consulta devuelve más de una fila significa que hay más de un usuario con el mismo nombre. 
            // Esto último no debería ocurrir en nigún momento ya que se controla a la hora de insertar nuevos 
            // usuarios en la BD.
            if ($result->num_rows != 1) {
                
                echo '<p class="error-msg">ERROR: Combinación de usuario y contraseña incorrecta.</p>';
            
            // Si devuelve una única fila
            } else {
                
                // Se obtiene la información del usuario de la base de datos
                $user = $result->fetch_assoc();
                
                // Se verifica que la contraseña introducida coincide con la contraseña almacenada en la base de 
                // datos. Se utiliza la función password_verify() debido a que la contraseña almacenada en la BD 
                // está cifrada.
                if (password_verify($password, $user['password'])) {
                    
                    // Se actualizan las variables de SESSION con el ID del usuario
                    $_SESSION['user_id'] = $user['id'];

                    // Se redirecciona a la página de administración con la sesión ya iniciada
                    header('Location: admin.php');
                    exit;
                    
                // Si no coincide se un mensaje de error
                } else {
                    echo '<p class="error-msg">ERROR: Combinación de usuario y contraseña incorrecta.</p>';
                }
            }

            $conn->close();
        }
    
    ?>

    
    <main class="contenedor">
        <!-- Título de la página "Iniciar Sesión" -->
        <h3 class="centrar-texto">Iniciar Sesión</h3>

        <div class="formulario-bg"></div>

        <!-- Formulario de inicio de sesión -->
        <!-- Mediante este formulario se recoge la información del usuario y se envía a esta misma página mediante 
        POST para pasar a verificarla -->
        <form action="" class="formulario" method="post">

            <!-- Campo para introducir el nombre de usuario -->
            <div class="campo">
                <label class="campo__label" for="username">Usuario</label>
                <input class="campo__field" type="text" placeholder="Usuario" name="username"> 
            </div>
            
            <!-- Campo para introducir la contraseña -->
            <div class="campo">
                <label class="campo__label" for="password">Contraseña</label>
                <input class="campo__field" type="password" placeholder="Contraseña" name="password">
            </div>
            
            <!-- Botones de aceptar y cancelar-->
            <div class="campo">
            
                <!-- El boton aceptar envíar la información del formulario por método POST -->
                <input type="submit" value="Aceptar" class="boton boton--primario" name="login">
            
                <!-- El botón cancelar te dirige a la página principal desechando cualquier información introducida 
                en el formulario -->
                <a href=index.php class="boton boton--secundario">Cancelar</a>
            
            </div>
        </form>
    </main>

</body>

</html>