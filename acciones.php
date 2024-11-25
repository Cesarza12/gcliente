<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $cliente = $_POST['cliente'] ?? '';
    $debe = $_POST['debe'] ?? 0;
    $fecha = $_POST['fecha'] ?? null;
    $accion = $_POST['accion'];

    switch ($accion) {
        case 'guardar':
            $sql = "INSERT INTO clientes (cliente, debe, fecha) VALUES ('$cliente', '$debe', '$fecha')";
            break;
        case 'buscar':
            // Buscar por el cliente especificado
            $sql = "SELECT * FROM clientes WHERE cliente LIKE '%$cliente%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Formatear los resultados
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Cliente</th><th>Debe</th><th>Fecha</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['cliente'] . "</td>";
                    echo "<td>" . $row['debe'] . "</td>";
                    echo "<td>" . $row['fecha'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No se encontraron resultados para '$cliente'.";
            }
            exit; // Detener la ejecución después de la búsqueda
        case 'modificar':
            $sql = "UPDATE clientes SET cliente='$cliente', debe='$debe', fecha='$fecha' WHERE id=$id";
            break;
        case 'eliminar':
            $sql = "DELETE FROM clientes WHERE id=$id";
            break;
    }

    if ($accion !== 'buscar') {
        if ($conn->query($sql) === TRUE) {
            echo "Operación exitosa.";

             
        } else {
            echo "Error: " . $conn->error;
        }
    }
       header("Location: http://localhost/app-negocio/index.html");
   exit();
}
?>
