<?php
require_once __DIR__ . '/../../config.php';

class InterpreteModel {
    private $db;

    public function __construct() {
        $this->db = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
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

}