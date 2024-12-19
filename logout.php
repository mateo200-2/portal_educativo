<?php
session_start(); // Iniciar la sesión
session_unset(); // Eliminar todas las variables de sesión
session_destroy(); // Destruir la sesión

// Redirigir al formulario de inicio de sesión
header("Location: login.php");
exit; // Asegurarse de que el script se detenga aquí
?>
