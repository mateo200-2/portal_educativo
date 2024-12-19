<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Iniciar una sesión
session_start();

// Verificar si se recibieron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = mysqli_real_escape_string($conn, $_POST['correo']); // Escapar caracteres especiales
    $contrasena = $_POST['contrasena']; // No necesitamos escapar contraseñas porque no se ejecutan en la consulta directamente

    // Buscar al usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) === 1) {
        // Si el usuario existe, verificar la contraseña
        $usuario = mysqli_fetch_assoc($resultado);

        if (password_verify($contrasena, $usuario['contrasena'])) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['usuario_tipo'] = $usuario['tipo'];

            // Redirigir según el tipo de usuario
            switch ($usuario['tipo']) {
                case 'estudiante':
                    header('Location: panel_estudiante.php');
                    break;
                case 'profesor':
                    header('Location: panel_profesor.php');
                    break;
                case 'administrador':
                    header('Location: panel_administrador.php');
                    break;
            }
            exit;
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Correo no registrado.";
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>
