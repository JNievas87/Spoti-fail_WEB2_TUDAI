<?php
require_once __DIR__ . '/../models/interprete.model.php';
require_once __DIR__ . '/../views/interprete.view.php';

class InterpreteController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new InterpreteModel();
        $this->view = new InterpreteView();
    }

    public function showAll($req) {
    $interpretes = $this->model->getAll();
    $this->view->setUser(null);
    $this->view->renderAll($interpretes);
    }

    public function showDetail($req) {
        $id = $req->id;
        $interprete = $this->model->get($id);

        if (!$interprete) {
            echo "Intérprete no encontrado";
            return;
        }
        $this->view->renderDetail($interprete);
    }

}