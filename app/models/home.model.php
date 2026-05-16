<?php
require_once __DIR__ . '/model.php';
class HomeModel extends Model{

    public function __construct() {
        parent::__construct(); 
    }

    public function getRandomSongs($limit = 5)
    {

        $query = $this->db->prepare("
        SELECT c.*, a.Nombre as Nombre_Artista
        FROM canciones c
        JOIN interpretes a ON c.ID_Interprete = a.ID_Interprete
        ORDER BY RAND()
        LIMIT ?
        ");
        $query->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
