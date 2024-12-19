<?php
session_start();
include 'conexion.php';

// Verificar si el usuario ha iniciado sesión y es estudiante
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'estudiante') {
    header("Location: login.php");
    exit;
}

// Obtener los cursos disponibles
$sql = "SELECT * FROM cursos";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Disponibles</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Enlace al CSS -->
</head>
<body>
    <h1>Cursos Disponibles</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Inscribirse</th>
        </tr>
        <?php while ($curso = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?php echo $curso['id']; ?></td>
            <td><?php echo $curso['nombre']; ?></td>
            <td><?php echo $curso['descripcion']; ?></td>
            <td>
                <form action="procesar_inscripcion.php" method="POST">
                    <input type="hidden" name="curso_id" value="<?php echo $curso['id']; ?>">
                    <button type="submit">Inscribirse</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="panel_estudiante.php">Volver al panel</a>
</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conn);
?>
