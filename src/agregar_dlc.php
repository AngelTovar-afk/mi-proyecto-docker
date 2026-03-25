<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        'INSERT INTO dlcs (juego_id, titulo, precio, fecha_lanzamiento)'
        . ' VALUES (?, ?, ?, ?)'
    );
    $stmt->execute([
        $_POST['juego_id'],
        $_POST['titulo'],
        $_POST['precio'],
        $_POST['fecha_lanzamiento']
    ]);
    header('Location: index.php');
    exit;
}
?>