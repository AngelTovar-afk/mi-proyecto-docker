
<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        'INSERT INTO plataformas (nombre, fabricante) VALUES (?, ?)'
    );
    $stmt->execute([
        $_POST['nombre'],
        $_POST['fabricante']
    ]);
    header('Location: index.php');
    exit;
}
?>