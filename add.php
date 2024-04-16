<?php
$conexion = new mysqli("localhost", "root", "", "farmacia");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if(isset($_POST['medicineName']) && isset($_POST['stock'])){
    $medicineName = $conexion->real_escape_string($_POST['medicineName']);
    $stock = intval($_POST['stock']);

    $sql = "INSERT INTO medicinas (nombre, stock) VALUES ('$medicineName', $stock)";

    if ($conexion->query($sql) === TRUE) {
        echo "Medicina añadida correctamente.";
    } else {
        echo "Error al añadir la medicina: " . $conexion->error;
    }
}

$conexion->close();

echo "<script>location.href='index.php'</script>";
?>
