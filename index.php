<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia - Buscar Medicinas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Farmacia</h1>
        
        <h2>Buscar Medicinas</h2>
        <form action="index.php" method="GET">
            <label for="searchInput">Buscar:</label>
            <input type="text" id="searchInput" name="searchInput">
            <button type="submit">Buscar</button>
        </form>

        <div class="action-buttons">
            <a href="gestionar_medicinas.php">Gestionar Medicinas</a>
        </div>

        <?php
        // Establecer la conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "farmacia");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Verificar si se ha enviado el formulario de búsqueda
        if(isset($_GET['searchInput'])){
            // Limpiar el input de búsqueda para evitar inyecciones SQL
            $searchInput = $conexion->real_escape_string($_GET['searchInput']);

            // Preparar la consulta SQL con una consulta preparada para evitar inyecciones SQL
            $sql = "SELECT * FROM medicinas WHERE nombre LIKE ?";

            // Preparar la declaración
            $stmt = $conexion->prepare($sql);

            // Vincular los parámetros
            $searchInput = "%$searchInput%";
            $stmt->bind_param("s", $searchInput);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener el resultado de la consulta
            $result = $stmt->get_result();

            // Verificar si se encontraron resultados
            if ($result->num_rows > 0) {
                echo "<h3>Resultados de búsqueda:</h3>";
                echo "<ul>";
                // Mostrar los resultados
                while($row = $result->fetch_assoc()) {
                    echo "<li>{$row['nombre']} - Stock: {$row['stock']}</li>";
                }
                echo "</ul>";
            } else {
                echo "No se encontraron medicinas.";
            }

            // Cerrar la consulta preparada
            $stmt->close();
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
        ?>

    </div>
</body>
</html>
