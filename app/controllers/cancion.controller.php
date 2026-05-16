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

    public function showAll($req) {
        $canciones = $this->model->getAll();
        $this->view->setReq($req);
        $this->view->showAll($canciones);
    }

    public function showDetail($req) {
        $cancion = $this->model->get($req->id);
        $this->view->setReq($req);
        $this->view->renderDetail($cancion);
    }

    public function add($req) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $duracion = ($_POST['Minutos'] * 60) + $_POST['Segundos'];
            $this->model->insert(
                $_POST['Titulo'],
                $duracion,
                $_POST['Genero'],
                $_POST['Idioma'],
                $_POST['Album'],
                $_POST['Portada'],
                $_POST['Año'],
                $_POST['ID_Interprete']
            );
            header('Location: ' . BASE_URL . 'cancion');
        } else {
            $interpretes = $this->interpreteModel->getAll();
            $this->view->setReq($req);
            $this->view->renderForm($interpretes);
        }
    }

    public function edit($req) {
        $cancion = $this->model->get($req->id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $duracion = ($_POST['Minutos'] * 60) + $_POST['Segundos'];
            $this->model->update(
                $req->id,
                $_POST['Titulo'],
                $duracion,
                $_POST['Genero'],
                $_POST['Idioma'],
                $_POST['Album'],
                $_POST['Portada'],
                $_POST['Año'],
                $_POST['ID_Interprete']
            );
            header('Location: ' . BASE_URL . 'cancion/' . $req->id);
        } else {
            $interpretes = $this->interpreteModel->getAll();
            $this->view->setReq($req);
            $this->view->renderForm($interpretes, $cancion);
        }
    }

    public function delete($req) {
        $this->model->delete($req->id);
        header('Location: ' . BASE_URL . 'cancion');
    }
}