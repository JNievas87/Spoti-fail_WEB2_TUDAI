<?php
class HomeModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
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
