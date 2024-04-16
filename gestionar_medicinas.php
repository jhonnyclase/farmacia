<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia - Añadir Medicinas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Farmacia</h1>
        
        <h2>Añadir Medicinas</h2>
        <form action="add.php" method="POST">
            <label for="medicineName">Nombre:</label>
            <input type="text" id="medicineName" name="medicineName">
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock">
            <button type="submit">Añadir</button>
        </form>
        
        <h2>Actualizar Stock</h2>
        <form action="update.php" method="POST">
            <label for="updateMedicineName">Nombre:</label>
            <input type="text" id="updateMedicineName" name="updateMedicineName">
            <label for="updateStock">Nuevo Stock:</label>
            <input type="number" id="updateStock" name="updateStock">
            <button type="submit">Actualizar</button>
        </form>
        
        <h2>Borrar Medicinas sin Stock</h2>
        <form action="delete.php" method="POST">
            <label for="deleteMedicineName">Nombre:</label>
            <input type="text" id="deleteMedicineName" name="deleteMedicineName">
            <button type="submit">Borrar</button>
        </form>

        <div class="action-buttons">
            <a href="index.php">Buscar Medicinas</a>
        </div>
    </div>
</body>
</html>
