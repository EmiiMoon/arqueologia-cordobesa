<!-- 
    register.php
    Página para registrar un nuevo usuario. Mediante un formulario se
    introducen los datos del nuevo usuario, se envían mediante POST y son
    recibidos por la propia página que se ocupa de comprobar que no exista
    otro usuario con el mismo nombre y codificar la contraseña mediante un
    hash antes de insertarlo en la base de datos.
-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" 
          rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    
    <!-- Se comprueba que previamente se haya establecido la sesión, en
         caso contrario se redirecciona a la página de login -->
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

                <!-- Imagen con enlace a canal de YouTube -->
                <a class="foto" 
                   href="https://www.youtube.com/channel/UC9ggJ6dE24RkRcpZizYPDsw" 
                   target="_blank" >
                        
                        <img width="128.75" 
                             height="100%" 
                             src=img/cristobal.png>

                </a>
                
                <!-- Título de la web, con enlace a la página principal -->
                <a href="index.php">
                    <h1 class=no-margin>
                        Arqueología<span>Cordobesa</span>
                    </h1>
                </a>

                <nav class="navegacion">

                    <!-- Opción para ir a la página de administración -->
                    <a href="admin.php">                  
                        <img width="55" 
                             height="55" 
                             src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnIHRyYW5zZm9ybT0ibWF0cml4KDAuNzQsMCwwLDAuNzQsNjYuNTYsMTIxLjU2MDAwMTk4MzY0MjU2KSI+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNNDkwLjY2Nyw0MDUuMzMzaC01Ni44MTFDNDI0LjYxOSwzNzQuNTkyLDM5Ni4zNzMsMzUyLDM2Mi42NjcsMzUycy02MS45MzEsMjIuNTkyLTcxLjE4OSw1My4zMzNIMjEuMzMzICAgIEM5LjU1Nyw0MDUuMzMzLDAsNDE0Ljg5MSwwLDQyNi42NjdTOS41NTcsNDQ4LDIxLjMzMyw0NDhoMjcwLjE0NGM5LjIzNywzMC43NDEsMzcuNDgzLDUzLjMzMyw3MS4xODksNTMuMzMzICAgIHM2MS45MzEtMjIuNTkyLDcxLjE4OS01My4zMzNoNTYuODExYzExLjc5NywwLDIxLjMzMy05LjU1NywyMS4zMzMtMjEuMzMzUzUwMi40NjQsNDA1LjMzMyw0OTAuNjY3LDQwNS4zMzN6IE0zNjIuNjY3LDQ1OC42NjcgICAgYy0xNy42NDMsMC0zMi0xNC4zNTctMzItMzJzMTQuMzU3LTMyLDMyLTMyczMyLDE0LjM1NywzMiwzMlMzODAuMzA5LDQ1OC42NjcsMzYyLjY2Nyw0NTguNjY3eiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNNDkwLjY2Nyw2NGgtNTYuODExYy05LjI1OS0zMC43NDEtMzcuNDgzLTUzLjMzMy03MS4xODktNTMuMzMzUzMwMC43MzYsMzMuMjU5LDI5MS40NzcsNjRIMjEuMzMzICAgIEM5LjU1Nyw2NCwwLDczLjU1NywwLDg1LjMzM3M5LjU1NywyMS4zMzMsMjEuMzMzLDIxLjMzM2gyNzAuMTQ0QzMwMC43MzYsMTM3LjQwOCwzMjguOTYsMTYwLDM2Mi42NjcsMTYwICAgIHM2MS45MzEtMjIuNTkyLDcxLjE4OS01My4zMzNoNTYuODExYzExLjc5NywwLDIxLjMzMy05LjU1NywyMS4zMzMtMjEuMzMzUzUwMi40NjQsNjQsNDkwLjY2Nyw2NHogTTM2Mi42NjcsMTE3LjMzMyAgICBjLTE3LjY0MywwLTMyLTE0LjM1Ny0zMi0zMmMwLTE3LjY0MywxNC4zNTctMzIsMzItMzJzMzIsMTQuMzU3LDMyLDMyQzM5NC42NjcsMTAyLjk3NiwzODAuMzA5LDExNy4zMzMsMzYyLjY2NywxMTcuMzMzeiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNNDkwLjY2NywyMzQuNjY3SDIyMC41MjNjLTkuMjU5LTMwLjc0MS0zNy40ODMtNTMuMzMzLTcxLjE4OS01My4zMzNzLTYxLjkzMSwyMi41OTItNzEuMTg5LDUzLjMzM0gyMS4zMzMgICAgQzkuNTU3LDIzNC42NjcsMCwyNDQuMjI0LDAsMjU2YzAsMTEuNzc2LDkuNTU3LDIxLjMzMywyMS4zMzMsMjEuMzMzaDU2LjgxMWM5LjI1OSwzMC43NDEsMzcuNDgzLDUzLjMzMyw3MS4xODksNTMuMzMzICAgIHM2MS45MzEtMjIuNTkyLDcxLjE4OS01My4zMzNoMjcwLjE0NGMxMS43OTcsMCwyMS4zMzMtOS41NTcsMjEuMzMzLTIxLjMzM0M1MTIsMjQ0LjIyNCw1MDIuNDY0LDIzNC42NjcsNDkwLjY2NywyMzQuNjY3eiAgICAgTTE0OS4zMzMsMjg4Yy0xNy42NDMsMC0zMi0xNC4zNTctMzItMzJzMTQuMzU3LTMyLDMyLTMyYzE3LjY0MywwLDMyLDE0LjM1NywzMiwzMlMxNjYuOTc2LDI4OCwxNDkuMzMzLDI4OHoiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+" />
                    </a>

                </nav>

            </div>
        </div>
    </header>

    <main class="contenedor">
        
        <!-- Título de la página "Registrar Administrador" -->
        <h3 class="centrar-texto">Registrar Administrador</h3>

        <div class="formulario-bg"></div>

        <form method="post" action="" class="formulario">

            <?php

                // El condicional se ejecuta si se ha enviado el 
                // formulario con los datos
                if (isset($_POST['register'])) {
                    
                    // Conexión con la BD
                    try {
                        require_once('db_connection.php');
                        $conn->query("SET NAMES 'utf8'");
                    } catch (\Exception $e) {
                        echo $e->getMessage();
                    }

                    // Obtenemos el nombre y la contraseña enviados por
                    // POST
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // Crea un hash de 60 caracteres de único sentido a
                    // partir de la contraseña.
                    $password_hash = password_hash($password, 
                                                   PASSWORD_BCRYPT);

                    // Consulta para obtener todos los usuarios de la base
                    // de datos que tengan ese nombre
                    $result = $conn->query("SELECT * 
                                            FROM users 
                                            WHERE username='$username'");
                    
                    // Si la consulta devuelve alguna fila significa que ya
                    // existe un usuario con ese nombre.
                    // Se muestra mensaje de error.
                    if ($result->num_rows > 0) {
                       
                        echo 
                        '<p class="error-msg">
                            [ERROR] El nombre de usuario ya existe.
                        </p>';
                    }
                    
                    // En caso de que no exista ningún usuario con ese
                    // nombre, procedemos a insertarlo en la base de datos
                    if ($result->num_rows == 0) {

                        $result2 = $conn->query("INSERT INTO users (
                                                    `username`, 
                                                    `password`) 
                                                 VALUES (
                                                    '$username',
                                                    '$password_hash');");
                        
                        // Comprobamos que se haya insertado correctamente
                        // y mostramos mensaje informando.
                        if ($result2) {
                            
                            echo 
                            '<p class="centrar-texto">
                                Administrador registrado con éxito.
                            </p>';

                        } else {
                            
                            echo 
                            '<p class="error-msg">
                            [ERROR] No se pudo registrar al administrador.
                            </p>';
                        }
                    }

                    // Se cierra la conexión con la BD
                    $conn->close();
                }

                
            ?>

            <!-- Campo para introducir el nombre de usuario -->
            <div class="campo">
                <label class="campo__label" for="user">Usuario</label>
                <input class="campo__field" 
                       type="text" 
                       placeholder="Usuario" 
                       name="username" 
                       pattern="[a-zA-Z0-9]+" 
                       required> 
            </div>
            
            <!-- Campo para introducir la contraseña -->
            <div class="campo">

                <label class="campo__label" for="password">
                    Contraseña
                </label>
                
                <input class="campo__field" 
                       type="password" 
                       placeholder="Contraseña" 
                       name="password"
                       required>

            </div>
            
            <!-- Botones de aceptar y cancelar -->
            <div class="campo">
                
                <!-- El botón de aceptar envía la información recogida en
                     el formulario -->
                <input type="submit" 
                       value="Aceptar" 
                       class="boton boton--primario" 
                       name="register">

                <!-- El botón de cancelar descarta la información 
                     introducida y nos redirecciona a la página principal
                -->
                <a href=index.php class="boton boton--secundario">
                    Cancelar
                </a>

            </div>
    
        </form>
    
    </main>

</body>

</html>