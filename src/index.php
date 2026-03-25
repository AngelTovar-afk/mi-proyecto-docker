<?php
require 'conexion.php';

$juegos = $pdo->query("SELECT * FROM juegos ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
$plataformas = $pdo->query("SELECT * FROM plataformas")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Biblioteca de Videojuegos</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background: #EFEFEF;
      color: #0A3143;
    }

    header {
      background: #0A3143;
      padding: 20px 40px;
      border-bottom: 4px solid #276E90;
    }

    header h1 {
      color: #EFEFEF;
    }

    nav {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    nav a {
      color: #CECFC9;
      text-decoration: none;
      padding: 6px 14px;
      border-radius: 4px;
      background: #276E90;
      font-size: 0.9em;
      transition: background 0.2s;
    }

    nav a:hover {
      background: #1e5470;
      color: #fff;
    }

    .container {
      max-width: 960px;
      margin: 30px auto;
      padding: 0 20px;
    }

    .section {
      margin-bottom: 50px;
    }

    h2 {
      color: #0A3143;
      margin-bottom: 15px;
      padding-bottom: 8px;
      border-bottom: 2px solid #276E90;
    }

    /* Formulario */
    form {
      background: #fff;
      padding: 24px;
      border-radius: 10px;
      margin-bottom: 30px;
      border: 1px solid #CECFC9;
      box-shadow: 0 2px 8px rgba(10, 49, 67, 0.07);
    }

    label {
      font-size: 0.85em;
      color: #276E90;
      font-weight: bold;
      display: block;
      margin-bottom: 3px;
    }

    input,
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 14px;
      background: #EFEFEF;
      border: 1px solid #CECFC9;
      color: #0A3143;
      border-radius: 6px;
      font-size: 0.95em;
      outline: none;
      transition: border 0.2s;
    }

    input:focus,
    select:focus {
      border-color: #276E90;
      background: #fff;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #276E90;
      color: #fff;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1em;
      font-weight: bold;
      transition: background 0.2s;
    }

    button:hover {
      background: #0A3143;
    }

    /* Tabla */
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(10, 49, 67, 0.07);
      border: 1px solid #CECFC9;
    }

    th {
      background: #0A3143;
      color: #EFEFEF;
      padding: 12px 14px;
      text-align: left;
      font-size: 0.9em;
    }

    td {
      padding: 10px 14px;
      border-bottom: 1px solid #CECFC9;
      color: #0A3143;
      font-size: 0.9em;
    }

    tr:last-child td {
      border-bottom: none;
    }

    tr:hover td {
      background: #f0f5f8;
    }

    .badge {
      background: #276E90;
      color: #fff;
      padding: 3px 10px;
      border-radius: 12px;
      font-size: 0.8em;
    }
  </style>
</head>

<body>

  <header>
    <h1>🎮 Biblioteca de Videojuegos</h1>
    <nav>
      <a href="#juegos">Juegos</a>
      <a href="#plataformas">Plataformas</a>
      <a href="#dlcs">DLCs</a>
    </nav>
  </header>

  <div class="container">

    <!-- SECCIÓN: Juegos -->
    <div class="section" id="juegos">
      <h2>➕ Agregar Juego</h2>
      <form action="crear_registro.php" method="POST">
        <label>Título</label>
        <input type="text" name="titulo" placeholder="Ej: Elden Ring" required>

        <label>Género</label>
        <input type="text" name="genero" placeholder="Ej: RPG" required>

        <label>Desarrollador</label>
        <input type="text" name="desarrollador" placeholder="Ej: FromSoftware" required>

        <label>Editor</label>
        <input type="text" name="editor" placeholder="Ej: Bandai Namco" required>

        <label>Fecha de lanzamiento</label>
        <input type="date" name="fecha_lanzamiento" required>

        <label>Review</label>
        <input type="text" name="review" placeholder="Breve reseña..." required>

        <button type="submit">💾 Guardar Juego</button>
      </form>

      <h2>📋 Juegos Registrados</h2>
      <table>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Género</th>
          <th>Desarrollador</th>
          <th>Editor</th>
          <th>Lanzamiento</th>
          <th>Review</th>
        </tr>
        <?php foreach ($juegos as $j): ?>
          <tr>
            <td><?= $j['id'] ?></td>
            <td><?= htmlspecialchars($j['titulo']) ?></td>
            <td><span class="badge"><?= htmlspecialchars($j['genero']) ?></span></td>
            <td><?= htmlspecialchars($j['desarrollador']) ?></td>
            <td><?= htmlspecialchars($j['editor']) ?></td>
            <td><?= $j['fecha_lanzamiento'] ?></td>
            <td><?= htmlspecialchars($j['review']) ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>

    <!-- SECCIÓN: Plataformas -->
    <div class="section" id="plataformas">
      <h2>🖥️ Plataformas Disponibles</h2>
      <table>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Fabricante</th>
        </tr>
        <?php foreach ($plataformas as $p): ?>
          <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['nombre']) ?></td>
            <td><?= htmlspecialchars($p['fabricante']) ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>

    <!-- SECCIÓN: Reseñas -->



    <!-- SECCIÓN: DLCs -->
    <div class="section" id="dlcs">
      <?php
        $juegos_select = $pdo->query("SELECT id, titulo FROM juegos ORDER BY titulo")->fetchAll(PDO::FETCH_ASSOC);
        $dlcs = $pdo->query("
            SELECT d.*, j.titulo AS nombre_juego 
            FROM dlcs d 
            JOIN juegos j ON j.id = d.juego_id
            ORDER BY d.id DESC
        ")->fetchAll(PDO::FETCH_ASSOC);
      ?>

      <h2>🕹️ Agregar DLC</h2>
      <form action="agregar_dlc.php" method="POST">
        <label>Juego</label>
        <select name="juego_id" required>
          <option value="">-- Selecciona un juego --</option>
          <?php foreach ($juegos_select as $j): ?>
            <option value="<?= $j['id'] ?>">
              <?= htmlspecialchars($j['titulo']) ?>
            </option>
          <?php endforeach; ?>
        </select>

        <label>Título del DLC</label>
        <input type="text" name="titulo" placeholder="Ej: Shadow of the Erdtree" required>

        <label>Precio</label>
        <input type="number" step="0.01" min="0" name="precio" placeholder="Ej: 299.99" required>

        <label>Fecha de lanzamiento</label>
        <input type="date" name="fecha_lanzamiento" required>

        <button type="submit">💾 Guardar DLC</button>
      </form>

      <h2>📋 DLCs Registrados</h2>
      <table>
        <tr>
          <th>ID</th>
          <th>Juego</th>
          <th>Título DLC</th>
          <th>Precio</th>
          <th>Fecha lanzamiento</th>
        </tr>
        <?php foreach ($dlcs as $d): ?>
        <tr>
          <td><?= $d['id'] ?></td>
          <td><span class="badge"><?= htmlspecialchars($d['nombre_juego']) ?></span></td>
          <td><?= htmlspecialchars($d['titulo']) ?></td>
          <td>$<?= number_format($d['precio'], 2) ?></td>
          <td><?= $d['fecha_lanzamiento'] ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>

  </div>
</body>

</html>