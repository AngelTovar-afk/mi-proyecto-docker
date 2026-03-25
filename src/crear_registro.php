<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $genero  = $_POST['genero'];
  $desarrollador  = $_POST['desarrollador'];
  $editor  = $_POST['editor'];
  $fecha_lanzamiento  = $_POST['fecha_lanzamiento'];
  $review  = $_POST['review'];

  $stmt = $pdo->prepare("INSERT INTO juegos (titulo, genero, desarrollador, editor, fecha_lanzamiento, review) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->execute([$titulo, $genero, $desarrollador, $editor, $fecha_lanzamiento, $review]);

  header("Location: index.php");
  exit;
}
