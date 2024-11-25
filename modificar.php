<?php
include 'conexion.php';

$cliente = $_GET['cliente'] ?? '';
$sql = "SELECT * FROM clientes WHERE cliente LIKE '%$cliente%'";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nuevo_cliente = $_POST['cliente'];
    $nuevo_debe = $_POST['debe'];
    $nueva_fecha = $_POST['fecha'];

    $update_sql = "UPDATE clientes SET cliente='$nuevo_cliente', debe='$nuevo_debe', fecha='$nueva_fecha' WHERE id=$id";
    if ($conn->query($update_sql) === TRUE) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
       header("Location: http://localhost/app-negocio/index.html");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Modificar Cliente</h1>
        <?php if ($result->num_rows > 0): 
            $row = $result->fetch_assoc(); ?>
            <form method="POST" action="modificar.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div>
                    <label for="cliente">Cliente:</label>
                    <input type="text" name="cliente" id="cliente" value="<?php echo $row['cliente']; ?>" required>
                </div>
                <div>
                    <label for="debe">Debe:</label>
                    <input type="number" name="debe" id="debe" step="0.01" value="<?php echo $row['debe']; ?>" required>
                </div>
                <div>
                    <label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo $row['fecha']; ?>" required>
                </div>
                <button type="submit" class="btn btn-modificar">Guardar Cambios</button>
            </form>
        <?php else: ?>
            <p>No se encontraron registros para "<?php echo htmlspecialchars($cliente); ?>".</p>
        <?php endif; ?>
        <a href="index.html" class="btn btn-volver">Volver</a>

    </div>
</body>
</html>
