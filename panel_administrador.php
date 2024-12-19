<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit; // Asegurarse de que el script se detenga aquí
}

// Si ha iniciado sesión, mostrar el contenido del panel
echo "Bienvenido al panel del administrador, " . $_SESSION['usuario_nombre'];
?>
<link rel="stylesheet" href="listar_usuarios.css">
<a href="listar_usuarios.php">Gestionar Usuarios</a>

<a href="logout.php">Cerrar sesión</a> <!-- Enlace para cerrar sesión -->
