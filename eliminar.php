<?php
include 'conexion.php';

$cliente = $_GET['cliente'] ?? '';
$sql = "SELECT * FROM clientes WHERE cliente LIKE '%$cliente%'";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $delete_sql = "DELETE FROM clientes WHERE id=$id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Cliente eliminado correctamente.";
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
     header("Location: http://localhost/app-negocio/index.html");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Cliente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Eliminar Cliente</h1>
        <?php if ($result->num_rows > 0): 
            $row = $result->fetch_assoc(); ?>
            <p>¿Está seguro de que desea eliminar al cliente "<?php echo $row['cliente']; ?>"?</p>
            <form method="POST" action="eliminar.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" class="btn btn-eliminar">Eliminar</button>
            </form>
        <?php else: ?>
            <p>No se encontraron registros para "<?php echo htmlspecialchars($cliente); ?>".</p>
        <?php endif; ?>
        <a href="index.html" class="btn btn-volver">Volver</a>
    </div>
</body>
</html>
