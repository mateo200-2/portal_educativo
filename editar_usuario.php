<?php
session_start();
include 'conexion.php';

// Verificar si el usuario ha iniciado sesión y es administrador
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'administrador') {
    header("Location: login.php");
    exit;
}

// Obtener el ID del usuario a editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultado = mysqli_query($conn, $sql);
    $usuario = mysqli_fetch_assoc($resultado);
} else {
    echo "ID de usuario no especificado.";
    exit;
}

// Manejar la actualización del usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);

    // Actualizar el usuario
    $sql = "UPDATE usuarios SET nombre = '$nombre', correo = '$correo', tipo = '$tipo' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Usuario actualizado con éxito.";
    } else {
        echo "Error al actualizar el usuario: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Enlace al CSS -->
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="editar_usuario.php?id=<?php echo $usuario['id']; ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
        
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $usuario['correo']; ?>" required>
        
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="estudiante" <?php echo ($usuario['tipo'] == 'estudiante') ? 'selected' : ''; ?>>Estudiante</option>
            <option value="profesor" <?php echo ($usuario['tipo'] == 'profesor') ? 'selected' : ''; ?>>Profesor</option>
        </select>
        
        <button type="submit">Actualizar Usuario</button>
    </form>
    <a href="listar_usuarios.php">Ver Lista de Usuarios</a>
    <a href="panel_administrador.php">Volver al panel</a>
</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conn);
?>
