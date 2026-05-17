<?php
require_once __DIR__ . '/model.php';

class CancionModel extends Model {

    public function __construct() {
        parent::__construct(); 
    }

    // Retorna todas las canciones con el nombre del intérprete usando JOIN
    public function getAll() {
        $query = $this->db->prepare('
            SELECT cancion.*, interprete.Nombre AS Nombre_Artista 
            FROM cancion 
            JOIN interprete ON cancion.ID_Interprete = interprete.ID_Interprete
        ');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Retorna una canción por su ID con el nombre del intérprete usando JOIN
    public function get($id) {
        $query = $this->db->prepare('
            SELECT c.*, i.Nombre AS Nombre_Artista
            FROM cancion c 
            JOIN interprete i ON c.ID_Interprete = i.ID_Interprete 
            WHERE c.ID_Cancion = ?
        ');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Retorna una cantidad limitada de canciones aleatoria5, usado en el carrusel del home
    public function getRandomSongs($limit = 5) {
        $query = $this->db->prepare("
            SELECT cancion.*, interprete.Nombre AS Nombre_Artista 
            FROM cancion 
            JOIN interprete ON cancion.ID_Interprete = interprete.ID_Interprete 
            ORDER BY RAND() 
            LIMIT ?
        ");
        // Se usa bindValue con PDO::PARAM_INT porque LIMIT no acepta strings
        $query->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Retorna todas las canciones de un intérprete por su ID
    public function getBySinger($id) {
        $query = $this->db->prepare('
            SELECT * FROM cancion 
            WHERE ID_Interprete = ?
        ');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Inserta una nueva canción en la BD y retorna el ID generado
    public function insert($titulo, $duracion, $genero, $idioma, $album, $portada, $anio, $id_interprete) {
        $query = $this->db->prepare('
            INSERT INTO cancion (Titulo, Duracion, Genero, Idioma, Album, Portada, Año, ID_Interprete) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ');
        $query->execute([$titulo, $duracion, $genero, $idioma, $album, $portada, $anio, $id_interprete]);
        return $this->db->lastInsertId();
    }

    // Elimina una canción por su ID
    public function delete($id) {
        $query = $this->db->prepare('DELETE FROM cancion WHERE ID_Cancion = ?');
        $query->execute([$id]);
    }

    // Actualiza los datos de una canción existente
    public function update($id, $titulo, $duracion, $genero, $idioma, $album, $portada, $anio, $id_interprete) {
        $query = $this->db->prepare('
            UPDATE cancion 
            SET Titulo = ?, Duracion = ?, Genero = ?, Idioma = ?, Album = ?, Portada = ?, Año = ?, ID_Interprete = ? 
            WHERE ID_Cancion = ?
        ');
        $query->execute([$titulo, $duracion, $genero, $idioma, $album, $portada, $anio, $id_interprete, $id]);
    }
}