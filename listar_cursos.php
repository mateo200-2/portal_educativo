<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cursos</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="estylos.css">
</head>
<body>
    <?php
    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';

    // Escribir la consulta SQL para obtener los cursos
    $sql = "SELECT id, nombre, descripcion FROM cursos"; // Selecciona las columnas id, nombre y descripcion de la tabla "cursos"

    // Ejecutar la consulta
    $resultado = mysqli_query($conn, $sql); // $resultado contendrá los datos obtenidos de la base de datos

    // Verificar si hay resultados
    if (mysqli_num_rows($resultado) > 0) { // Si hay más de 0 filas
        echo "<h1>Lista de Cursos Disponibles</h1>"; // Título de la lista
        echo "<ul>"; // Inicia una lista no ordenada en HTML

        // Recorrer cada fila de los resultados
        while ($fila = mysqli_fetch_assoc($resultado)) { 
            // Mostrar los datos de cada curso
            echo "<li>";
            echo "<strong>" . $fila['nombre'] . "</strong><br>"; // Mostrar el nombre del curso en negrita
            echo $fila['descripcion']; // Mostrar la descripción del curso
            echo "</li>";
        }

        echo "</ul>"; // Cierra la lista no ordenada
    } else {
        // Si no hay cursos, mostrar un mensaje
        echo "No hay cursos disponibles.";
    }

    // Cerrar la conexión
    mysqli_close($conn); // Siempre es una buena práctica cerrar la conexión
    ?>
</body>
</html>
