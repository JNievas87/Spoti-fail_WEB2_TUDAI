<?php
require_once __DIR__ . '/model.php';
class UsersModel extends Model{
    

    public function __construct() {
        parent::__construct(); 
    }

    public function getByUser($user) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE user = ?');
        $query->execute([$user]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}