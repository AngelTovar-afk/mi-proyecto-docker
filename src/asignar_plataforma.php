<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        'INSERT INTO juego_plataforma (juego_id, plataforma_id) VALUES (?, ?)'
    );
    $stmt->execute([
        $_POST['juego_id'],
        $_POST['plataforma_id']
    ]);
    header('Location: index.php');
    exit;
}
?>