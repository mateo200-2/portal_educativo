<?php
session_start();
include 'conexion.php';
include 'menu.php'; 
// Verificar si el usuario ha iniciado sesión y es profesor
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'profesor') {
    header("Location: login.php");
    exit;
}

// Obtener los cursos del profesor
$profesor_id = $_SESSION['usuario_id'];
$sql = "SELECT * FROM cursos WHERE profesor_id = '$profesor_id'";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Cursos</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Enlace al CSS -->
</head>
<body>
    <h1>Mis Cursos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha de Creación</th>
        </tr>
        <?php while ($curso = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?php echo $curso['id']; ?></td>
            <td><?php echo $curso['nombre']; ?></td>
            <td><?php echo $curso['descripcion']; ?></td>
            <td><?php echo $curso['fecha_creacion']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="agregar_curso.php">Agregar Nuevo Curso</a>
    <a href="panel_profesor.php">Volver al panel</a>
</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conn);
?>
