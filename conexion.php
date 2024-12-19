<?php
$host = "localhost"; // Cambia si usas un servidor diferente
$usuario = "root"; // Nombre de usuario de la base de datos
$contrasena = ""; // Contraseña del usuario de la base de datos
$base_datos = "portal_educativo"; // Nombre de tu base de datos

// Crear la conexión
$conn = mysqli_connect($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>
