<?php
require_once './app/models/cancion.model.php';
require_once './app/views/home.view.php';

class HomeController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new CancionModel();
        $this->view = new HomeView();
    }

    public function showHome() {
        $canciones = $this->model->getRandomSongs(5);
        $this->view->renderHome($canciones);
    }
}