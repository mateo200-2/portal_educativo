<?php
session_start();
echo "Bienvenido al panel del estudiante, " . $_SESSION['usuario_nombre'];
?>
<a href="logout.php">Cerrar sesión</a> <!-- Enlace para cerrar sesión -->
