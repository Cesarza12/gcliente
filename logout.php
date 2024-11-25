<?php
// Cerrar sesión si se utiliza sesión
session_start();
session_destroy();

// Redirigir a la página de inicio de sesión o fuera de la aplicación
header("Location: login.php");
exit;
?>
