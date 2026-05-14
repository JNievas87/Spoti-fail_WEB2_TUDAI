<?php
class CancionModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER, DB_PASS);
    }

    public function getAll() {
        $query = $this->db->prepare('
            SELECT cancion.*, interprete.Nombre AS Nombre_Artista 
            FROM cancion 
            JOIN interprete ON cancion.ID_Interprete = interprete.ID_Interprete
        ');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function get($id) {
        $query = $this->db->prepare('
            SELECT c.*, i.Nombre as nombre_interprete 
            FROM cancion c 
            JOIN interprete i ON c.ID_Interprete = i.ID_Interprete 
            WHERE c.ID_Cancion = ?
        ');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getById($id) {
        $query = $this->db->prepare("
            SELECT c.*, i.Nombre AS Nombre_Artista 
            FROM cancion c 
            JOIN interprete i ON c.ID_Interprete = i.ID_Interprete 
            WHERE c.ID_Cancion = ?
        ");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getRandomSongs($limit = 5) {
        $query = $this->db->prepare("
            SELECT cancion.*, interprete.Nombre AS Nombre_Artista 
            FROM cancion 
            JOIN interprete ON cancion.ID_Interprete = interprete.ID_Interprete 
            ORDER BY RAND() 
            LIMIT ?
        ");
        // Forzamos que el límite sea un entero para evitar errores de SQL
        $query->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($titulo, $duracion, $genero, $idioma, $album, $portada, $anio, $id_interprete) {
        $query = $this->db->prepare('
            INSERT INTO cancion (Titulo, Duracion, Genero, Idioma, Album, Portada, Año, ID_Interprete) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $query->execute([$titulo, $duracion, $genero, $idioma, $album, $portada, $anio, $id_interprete]);

        return $this->db->lastInsertId();
    }

    public function delete($id) {
        $query = $this->db->prepare('DELETE FROM cancion WHERE ID_Cancion = ?');
        $query->execute([$id]);
    }

    public function update($id, $titulo, $duracion, $genero, $idioma, $album, $portada, $anio, $id_interprete) {
        $query = $this->db->prepare('
            UPDATE cancion 
            SET Titulo = ?, Duracion = ?, Genero = ?, Idioma = ?, Album = ?, Portada = ?, Año = ?, ID_Interprete = ? 
            WHERE ID_Cancion = ?
        ');
        $query->execute([$titulo, $duracion, $genero, $idioma, $album, $portada, $anio, $id_interprete, $id]);
    }
}