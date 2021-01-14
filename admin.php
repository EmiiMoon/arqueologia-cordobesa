<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Marcadores</title>
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
    <!-- Conexión con la base de datos -->
    <?php
        try {
            require_once('db_connection.php');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        $conn->query("SET NAMES 'utf8'");

        $sql = "SELECT * FROM markers";
        $result = $conn->query($sql);

        $conn->close();
    ?>

    <!-- Se muestra la cabecera -->
    <header class="site-header">
        <div class="contenedor">
            <div class="barra">
                <a href="index.php">
                    <h1 class=no-margin>Arqueología<span>Cordobesa</span></h1>
                </a>
                <nav class="navegacion">
                    <a href="logout.php">Cerrar Sesión</a>
                </nav>
            </div> <!-- Barra -->
        </div> <!-- Contenedor -->
    </header>
    
    <main class="contenedor">

    <h3 class="centrar-texto">Administrar Marcadores</h3>

        <div class="formulario-bg"></div>

        <div class="boton--admin">
            <a href="insert_form.php" class="boton nuevo--marcador">Nuevo Marcador</a>
        </div>

        <!-- Tabla de marcadores -->
        <table class="greyGridTable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Informaci&oacute;n</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = $result->fetch_assoc()) {
                        echo 
                        "<tr>
                            <td>".$row["name"]."</td>
                            <td>".$row["lat"]."</td>
                            <td>".$row["lng"]."</td>
                            <td>".$row["info"]."</td>
                            <td><a href=\"update_form.php?id=".$row["id"]."\">Editar</a></td>
                            <td><a href=\"db_edit.php?delete=1&id=".$row["id"]."\">Eliminar</a></td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>

</body>
</html>