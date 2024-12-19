<?php
session_start();

// Verificar si el usuario ha iniciado sesión y es profesor
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'profesor') {
    header("Location: login.php");
    exit;
}

// Mostrar el mensaje de bienvenida
$nombreProfesor = $_SESSION['usuario_nombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Profesor</title>
    <link rel="stylesheet" href="panel_profesor.css">
</head>
<body>
    <header>
        <h1>Panel del Profesor</h1>
        <strong><p>Bienvenido, <?php echo htmlspecialchars($nombreProfesor); ?></p>
        </strong>
    </header>
    <main>
        <a href="agregar_curso.php">Agregar Curso</a>
        <a href="mis_cursos.php">Ver Mis Cursos</a>
        <a href="logout.php">Cerrar sesión</a>
    </main>
    <footer>
        <p>&copy; 2024 Portal Educativo. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
