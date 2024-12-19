<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="login.css"> <!-- Enlace al CSS -->
</head>
<body>
    <h1>Inicio de Sesión</h1>
    <form action="procesar_login.php" method="POST">
        <!-- Campo para el correo -->
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>

        <!-- Campo para la contraseña -->
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>

        <!-- Botón para iniciar sesión -->
        <button type="submit">Iniciar Sesión</button>
        <a href="registro_usuario.php">registrate</a>
    </form>
</body>
</html>
