<?php
session_start();
include 'conexion.php';

// Verificar si el usuario ha iniciado sesión y es estudiante
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'estudiante') {
    header("Location: login.php");
    exit;
}

// Obtener el ID del curso a inscribirse
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['curso_id'])) {
    $curso_id = mysqli_real_escape_string($conn, $_POST['curso_id']);
    $estudiante_id = $_SESSION['usuario_id'];

    // Insertar la inscripción
    $sql = "INSERT INTO inscripciones (estudiante_id, curso_id) VALUES ('$estudiante_id', '$curso_id')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Inscripción exitosa.";
    } else {
        echo "Error al inscribirse: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>
