<?php
require_once __DIR__ . '/../models/cancion.model.php';
require_once __DIR__ . '/../models/interprete.model.php';
require_once __DIR__ . '/../views/cancion.view.php';

class CancionController {
    private $model;
    private $interpreteModel;
    private $view;

    public function __construct() {
        $this->model = new CancionModel();
        $this->interpreteModel = new InterpreteModel();
        $this->view = new CancionView();
    }

    // Listado público
    public function showAll() {
        $canciones = $this->model->getAll();
        $this->view->showAll($canciones);
    }

    // Detalle de ítem
    public function showDetail($req) {
        $cancion = $this->model->getById($req->id);
        $this->view->renderDetail($cancion);
    }

    public function add($req) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->model->insert(
                    $_POST['titulo'],
                    $_POST['duracion'],
                    $_POST['genero'],
                    $_POST['idioma'],
                    $_POST['album'],
                    $_POST['portada'],
                    $_POST['anio'],
                    $_POST['id_interprete']
                );
                header('Location: ' . BASE_URL . 'canciones');
            } else {
                $interpretes = $this->interpreteModel->getAll();
                $this->view->setUser($req->user);
                $this->view->renderForm($interpretes);
            }
        }

    // Eliminar
    public function delete($req) {
        $this->model->delete($req->id);
        header('Location: ' . BASE_URL . 'canciones');
    }
}