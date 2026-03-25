<?php
$host = 'db'; // nombre del servicio en docker-compose
$dbname = 'db_biblioteca';
$user = 'root';
$password = '1234';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Error de conexión: " . $e->getMessage());
}
