<?php
$conexion = new mysqli("localhost", "root", "", "farmacia");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if(isset($_POST['updateMedicineName']) && isset($_POST['updateStock'])){
    $updateMedicineName = $conexion->real_escape_string($_POST['updateMedicineName']);
    $updateStock = intval($_POST['updateStock']);

    $sql = "UPDATE medicinas SET stock = $updateStock WHERE nombre = '$updateMedicineName'";

    if ($conexion->query($sql) === TRUE) {
        echo "Stock actualizado correctamente.";
    } else {
        echo "Error al actualizar el stock: " . $conexion->error;
    }
}

$conexion->close();

echo "<script>location.href='index.php'</script>";
?>
