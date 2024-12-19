<?php
session_start();
include 'conexion.php';


// Verificar si el usuario ha iniciado sesión y es profesor
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'profesor') {
    header("Location: login.php");
    exit;
}

// Manejar la inserción del curso
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $profesor_id = $_SESSION['usuario_id']; // ID del profesor

    $sql = "INSERT INTO cursos (nombre, descripcion, profesor_id, fecha_creacion) VALUES ('$nombre', '$descripcion', '$profesor_id', NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "Curso agregado con éxito.";
    } else {
        echo "Error al agregar el curso: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Curso</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Enlace al CSS -->
</head>
<body>
    <h1>Agregar Nuevo Curso</h1>
    <form action="agregar_curso.php" method="POST">
        <label for="nombre">Nombre del Curso:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
        
        <button type="submit">Agregar Curso</button>
    </form>
    <a href="panel_profesor.php">Volver al panel</a>
</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conn);
?>
