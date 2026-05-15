<?php
require_once __DIR__ . '/../../config.php';

class InterpreteModel {
    private $db;

    public function __construct() {
        $this->db = new PDO( 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER,
            DB_PASS
        );
    }

    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM interprete');
        $query->execute();
        $interprete = $query->fetchAll(PDO::FETCH_OBJ);
        return $interprete;
    }

    public function get($id) {
        $query = $this->db->prepare('SELECT * FROM interprete WHERE ID_Interprete = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insert($nombre, $genero, $tipo, $pais_origen, $sello, $imagen, $sitio_web, $fecha_inicio) {
        $query = $this->db->prepare('
        INSERT INTO interprete (Nombre, Genero, Tipo, Pais_Origen, SelloDiscografico, Imagen, SitioWeb, FechaInicio) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $query->execute([$nombre, $genero, $tipo, $pais_origen, $sello, $imagen, $sitio_web, $fecha_inicio]);
        return $this->db->lastInsertId();
}

    public function delete($id) {
        $query = $this->db->prepare('DELETE FROM interprete WHERE ID_Interprete = ?');
        $query->execute([$id]);
        return $query->rowCount();
}

    public function update($id, $nombre, $genero, $tipo, $pais_origen, $sello, $imagen, $sitio_web, $fecha_inicio) {
        $query = $this->db->prepare ('UPDATE interprete SET Nombre=?, Genero=?, Tipo=?, Pais_Origen=?, SelloDiscografico=?, Imagen=?, SitioWeb=?, FechaInicio=?WHERE ID_Interprete=?');
        $query->execute([$nombre, $genero, $tipo, $pais_origen, $sello, $imagen, $sitio_web, $fecha_inicio, $id]);
        return $query->rowCount();
        }


    public function getCancionesByInterprete($id) {
        $query = $this->db->prepare('SELECT * FROM cancion WHERE id_interprete = ?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}