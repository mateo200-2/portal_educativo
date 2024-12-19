<?php
session_start();
include 'conexion.php';

// Verificar si el usuario ha iniciado sesión y es administrador
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'administrador') {
    header("Location: login.php");
    exit;
}

// Manejar la inserción del usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $contrasena = password_hash(mysqli_real_escape_string($conn, $_POST['contrasena']), PASSWORD_DEFAULT); // Hashear la contraseña

    $sql = "INSERT INTO usuarios (nombre, correo, tipo, contrasena) VALUES ('$nombre', '$correo', '$tipo', '$contrasena')";

    if (mysqli_query($conn, $sql)) {
        echo "Usuario agregado con éxito.";
    } else {
        echo "Error al agregar el usuario: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Enlace al CSS -->
</head>
<body>
    <h1>Agregar Nuevo Usuario</h1>
    <form action="agregar_usuario.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>
        
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="estudiante">Estudiante</option>
            <option value="profesor">Profesor</option>
        </select>
        
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        
        <button type="submit">Agregar Usuario</button>
    </form>
    <a href="listar_usuarios.php">Ver Lista de Usuarios</a>
    <a href="panel_administrador.php">Volver al panel</a>
</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conn);
?>
