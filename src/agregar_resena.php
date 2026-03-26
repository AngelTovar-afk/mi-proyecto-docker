<?php
require 'conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        'INSERT INTO resenas (juego_id, autor, calificacion, comentario, fecha)'
        . ' VALUES (?, ?, ?, ?, ?)'
    );
    
    $stmt->execute([
        $_POST['juego_id'],
        $_POST['autor'],
        $_POST['calificacion'],
        $_POST['comentario'],
        $_POST['fecha']
    ]);
    
    header('Location: index.php'); 
    exit;
}
?>