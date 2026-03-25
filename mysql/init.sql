CREATE DATABASE IF NOT EXISTS db_biblioteca;
USE db_biblioteca;

-- Juegos
CREATE TABLE IF NOT EXISTS juegos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    genero VARCHAR(100) NOT NULL,
    desarrollador VARCHAR(100) NOT NULL,
    editor VARCHAR(100) NOT NULL,
    fecha_lanzamiento DATE NOT NULL,
    review VARCHAR(255) NOT NULL
);

-- Plataformas (muchos a muchos)
CREATE TABLE IF NOT EXISTS plataformas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    fabricante VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS juego_plataforma (
    juego_id INT NOT NULL,
    plataforma_id INT NOT NULL,
    PRIMARY KEY (juego_id, plataforma_id),
    FOREIGN KEY (juego_id) REFERENCES juegos(id) ON DELETE CASCADE,
    FOREIGN KEY (plataforma_id) REFERENCES plataformas(id) ON DELETE CASCADE
);

-- Reseñas de usuarios (uno a muchos)
CREATE TABLE IF NOT EXISTS resenas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    juego_id INT NOT NULL,
    autor VARCHAR(100) NOT NULL,
    calificacion TINYINT NOT NULL CHECK (calificacion BETWEEN 1 AND 10),
    comentario TEXT NOT NULL,
    fecha DATE NOT NULL,
    FOREIGN KEY (juego_id) REFERENCES juegos(id) ON DELETE CASCADE
);

-- DLCs/expansiones (uno a muchos)
CREATE TABLE IF NOT EXISTS dlcs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    juego_id INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    precio DECIMAL(6,2) NOT NULL,
    fecha_lanzamiento DATE NOT NULL,
    FOREIGN KEY (juego_id) REFERENCES juegos(id) ON DELETE CASCADE
);
