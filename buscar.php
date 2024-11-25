<?php
include 'conexion.php';

// Obtener el cliente desde los parámetros GET
$cliente = $_GET['cliente'] ?? '';

// Consultar la base de datos
$sql = "SELECT * FROM clientes WHERE cliente LIKE '%$cliente%'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Búsqueda</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Resultados de la Búsqueda</h1>
        <p>Búsqueda para: <strong><?php echo htmlspecialchars($cliente); ?></strong></p>
        <?php if ($result->num_rows > 0): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Debe</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['cliente']; ?></td>
                            <td><?php echo $row['debe']; ?></td>
                            <td><?php echo $row['fecha']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados para "<?php echo htmlspecialchars($cliente); ?>".</p>
        <?php endif; ?>
        <a href="index.html" class="btn btn-volver">Volver</a>
    </div>
</body>
</html>
