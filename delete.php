<?php
$conexion = new mysqli("localhost", "root", "", "farmacia");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if(isset($_POST['deleteMedicineName'])){
    $deleteMedicineName = $conexion->real_escape_string($_POST['deleteMedicineName']);

    $sql = "DELETE FROM medicinas WHERE nombre = '$deleteMedicineName'";

    if ($conexion->query($sql) === TRUE) {
        echo "Medicina eliminada correctamente.";
    } else {
        echo "Error al eliminar la medicina: " . $conexion->error;
    }
}

$conexion->close();

echo "<script>location.href='index.php'</script>";
?>
