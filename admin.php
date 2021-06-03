<!-- 
    admin.php
    En esta página se muestra una tabla que contiene información sobre 
    todos los marcadores almacenados en la BD, permitiendo editar y 
    eliminar cualquiera de ellos, así como crear uno completamente nuevo.
-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Sitios</title>
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

    <?php
        // Conexión con la base de datos
        try {
            require_once('db_connection.php');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        $conn->query("SET NAMES 'utf8'");
        
        // Obtenemos todos los marcadores de la base de datos
        $sql = "SELECT * FROM markers";
        $result = $conn->query($sql);

        // Se cierra la conexión
        $conn->close();
    ?>

    <!-- Se muestra la cabecera -->
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

                    <!-- Enlace a la página de logout -->
                    <a href="logout.php">Cerrar Sesión</a>

                </nav>
            </div> 
        </div> 
    </header>
    
    <main class="contenedor">

        <!-- Título de la página "Administrar Sitios" -->
        <h3 class="centrar-texto">Administrar Sitios</h3>

        <div class="formulario-bg"></div>

        <!-- Botón para añadir un nuevo sitio -->
        <div class="boton--admin">
            <a href="insert_form.php" class="boton nuevo--marcador">
                Nuevo Sitio
            </a>
        </div>

        <!-- Tabla de marcadores -->
        <table class="greyGridTable">
            
            <!-- Título de cada columna -->
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

            <!-- Cuerpo de la tabla -->
            <tbody>
                <?php
                    // Se recorren los marcadores, imprimiendo cada uno 
                    // como una nueva fila de la tabla, de forma que cada
                    // atributo sea una columna diferente.
                    // También se añaden enlaces que permiten editar o 
                    // eliminar el marcador.
                    while ($row = $result->fetch_assoc()) {
                        
                        echo 
                        "<tr>
                        
                        <td>".$row["name"]."</td>

                        <td>
                        <a href=\"update_form.php?id=".$row["id"]."\">
                            Editar
                        </a>
                        </td>

                        <td>
                        <a href=\"db_edit.php?delete=1&id=".$row["id"]."\">
                            Eliminar
                        </a>
                        </td>

                        </tr>"; 
                    }
                ?>
            </tbody>

        </table>
        
        <br><br>
    </main>

</body>

</html>