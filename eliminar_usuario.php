<?php
session_start();
include 'conexion.php';

// Verificar si el usuario ha iniciado sesión y es administrador
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'administrador') {
    header("Location: login.php");
    exit;
}

// Obtener el ID del usuario a eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el usuario
    $sql = "DELETE FROM usuarios WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Usuario eliminado con éxito.";
    } else {
        echo "Error al eliminar el usuario: " . mysqli_error($conn);
    }
} else {
    echo "ID de usuario no especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Enlace al CSS -->
</head>
<body>
    <h1>Eliminar Usuario</h1>
    <p><a href="listar_usuarios.php">Volver a la lista de usuarios</a></p>
</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conn);
?>
