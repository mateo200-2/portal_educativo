<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se recibieron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']); // Escapar caracteres especiales
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptar la contraseña
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);

    // Insertar los datos en la tabla usuarios
    $sql = "INSERT INTO usuarios (nombre, correo, contrasena, tipo) 
            VALUES ('$nombre', '$correo', '$contrasena', '$tipo')";

    if (mysqli_query($conn, $sql)) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error: " . mysqli_error($conn); // Mostrar el error si ocurre
    }

    // Cerrar la conexión
    mysqli_close($conn);
}
?>
