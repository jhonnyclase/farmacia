<?php
session_start();

if(isset($_SESSION['message'])) {

    $_SESSION['message'] = "Operación completada con éxito.";
    exit;
    
} else {
    echo "Hubo un error al realizar la operación.";
    exit;
}

echo "<script>location.href='index.php'</script>";
?>