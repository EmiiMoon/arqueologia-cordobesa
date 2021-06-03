<!-- 
    logout.php
    Únicamente se encarga de destruir la sesión y redireccionar a la 
    página principal.
-->

<?php
    @session_start();
    session_destroy();
    header("Location: index.php");
?>