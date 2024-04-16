<?php

$conexion = new mysqli("localhost", "root", "", "farmacia");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if(isset($_GET['searchInput'])){
    $searchInput = $conexion->real_escape_string($_GET['searchInput']);

    $sql = "SELECT * FROM medicinas WHERE nombre LIKE '%$searchInput%'";

    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Resultados de búsqueda:</h3>";
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>{$row['nombre']} - Stock: {$row['stock']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No se encontraron medicinas.";
    }
}

$conexion->close();
?>
