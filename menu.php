<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Educativo</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Enlace al CSS -->
</head>
<body>
    <header>
        <h1>Portal Educativo</h1>
        <nav>
            <ul>
                <?php if (isset($_SESSION['usuario_tipo'])): ?>
                    <?php if ($_SESSION['usuario_tipo'] === 'administrador'): ?>
                        <li><a href="listar_usuarios.php">Gestionar Usuarios</a></li>
                    <?php endif; ?>
                    <?php if ($_SESSION['usuario_tipo'] === 'profesor'): ?>
                        <li><a href="mis_cursos.php">Mis Cursos</a></li>
                        <li><a href="agregar_curso.php">Agregar Curso</a></li>
                    <?php endif; ?>
                    <li><a href="panel_profesor.php">Panel de Profesor</a></li>
                    <li><a href="panel_administrador.php">Panel de Administrador</a></li>
                    <li><a href="logout.php">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="login.php">Iniciar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <!-- Aquí se cargará el contenido de las otras páginas -->
