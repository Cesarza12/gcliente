<?php
include 'conexion.php';

// Consulta para obtener todos los registros
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Registros</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="visualizar.css">
</head>
<body>
    <div class="container">
        <h1>Todos los Registros</h1>
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
            <p>No hay registros en la base de datos.</p>
        <?php endif; ?>
        <a href="index.html" class="btn btn-volver">Volver</a>
    </div>
</body>
</html>
