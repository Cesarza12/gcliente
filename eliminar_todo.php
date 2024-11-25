<?php
// Conexión a la base de datos (ajusta los datos de la base de datos)
$servername = "localhost";
$username = "root"; // Cambia según tu configuración
$password = ""; // Cambia según tu configuración
$dbname = "clientes_db"; // Nombre de la base de datos

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// SQL para eliminar todos los registros
$sql = "DELETE FROM clientes"; // Asegúrate de que 'clientes' es el nombre de tu tabla

if ($conn->query($sql) === TRUE) {
    // Reiniciar el ID a 0 (si la tabla usa AUTO_INCREMENT)
    $resetSql = "ALTER TABLE clientes AUTO_INCREMENT = 1";
    if ($conn->query($resetSql) === TRUE) {
        echo "Todos los registros fueron eliminados y el ID ha sido reiniciado.";
    } else {
        echo "Error al reiniciar el ID: " . $conn->error;
    }
} else {
    echo "Error al eliminar los registros: " . $conn->error;
}

$conn->close();
?>
