<?php
session_start();
include 'conexion.php';

// Verificar si el usuario ha iniciado sesión y es administrador
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'administrador') {
    header("Location: login.php");
    exit;
}

// Obtener todos los usuarios
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="listar_usuarios.css"> <!-- Enlace al CSS -->
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
        <?php while ($usuario = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nombre']; ?></td>
            <td><?php echo $usuario['correo']; ?></td>
            <td><?php echo $usuario['tipo']; ?></td>
            <td>
                <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                <a href="eliminar_usuario.php?id=<?php echo $usuario['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="agregar_usuario.php">Agregar Nuevo Usuario</a>
    <a href="panel_administrador.php">Volver al panel</a>
    <td>
    <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>">Editar</a>
    <a href="eliminar_usuario.php?id=<?php echo $usuario['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
</td>

</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conn);
?>
