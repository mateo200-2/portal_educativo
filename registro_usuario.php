<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="estylos.css"> <!-- Enlace al CSS -->
</head>
<body>
    <h1>Registro de Usuarios</h1>
    <form action="procesar_registro.php" method="POST">
        <!-- Campo para el nombre -->
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <!-- Campo para el correo -->
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>

        <!-- Campo para la contraseña -->
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>

        <!-- Selector para el tipo de usuario -->
        <label for="tipo">Tipo de Usuario:</label>
        <select id="tipo" name="tipo" required>
            <option value="estudiante">Estudiante</option>
            <option value="profesor">Profesor</option>
            <option value="administrador">Administrador</option>
        </select>

        <!-- Botón para enviar el formulario -->
        <button type="submit">Registrar</button><br><br>
        <button><a href="login.php" style="color: white;">iniciar sesion</a></button>
    </form>
</body>
</html>
