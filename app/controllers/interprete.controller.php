<?php
require_once __DIR__ . '/../models/interprete.model.php';
require_once __DIR__ . '/../views/interprete.view.php';
require_once __DIR__ . '/../views/error.view.php';
require_once __DIR__ . '/../models/cancion.model.php'; 

class InterpreteController {
    private $model;
    private $view;
    private $errorView;
    private $cancionModel; 

    public function __construct() {
        $this->model = new InterpreteModel();
        $this->view = new InterpreteView();
        $this->errorView = new ErrorView();
        $this->cancionModel = new CancionModel();
    }

    public function showAll($req) {
        $interpretes = $this->model->getAll();
        $this->view->setReq($req); 
        $this->view->renderAll($interpretes);
    }

    public function showDetail($req) {
    $id = $req->id;
    $interprete = $this->model->get($id);

    if (!$interprete) {
        return $this->errorView->renderError("Intérprete no encontrado");
    }

    $canciones = $this->cancionModel->getBySinger($id);
    $this->view->setReq($req); 
    $this->view->renderDetail($interprete, $canciones);
    }

    private function getFormData() {
    if (
        empty($_POST['Nombre']) || empty($_POST['Genero']) ||
        empty($_POST['Tipo']) || empty($_POST['Pais_Origen']) ||
        empty($_POST['SelloDiscografico']) || empty($_POST['Imagen']) ||
        empty($_POST['SitioWeb']) || empty($_POST['FechaInicio'])
        ) {
            return $this->errorView->renderError("Por favor, complete todos los campos.");
        }
        if($_POST['FechaInicio'] > date('Y-m-d')) {
        return $this->errorView->renderError("La fecha de inicio no puede ser futura.");
        }
        return [
            'Nombre'             => $_POST['Nombre'],
            'Genero'             => $_POST['Genero'],
            'Tipo'               => $_POST['Tipo'],
            'Pais_Origen'        => $_POST['Pais_Origen'],
            'SelloDiscografico'  => $_POST['SelloDiscografico'],
            'Imagen'             => $_POST['Imagen'],
            'SitioWeb'           => $_POST['SitioWeb'],
            'FechaInicio'        => $_POST['FechaInicio']
        ];
    }

    public function add($req) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = $this->getFormData();

            if ($datos === null) {
                return $this->errorView->renderError("Faltan datos obligatorios para agregar el intérprete.");
            }
            $this->model->insert(...array_values($datos));
            header('Location: ' . BASE_URL . 'add-cancion');
        } else {
            $this->view->setReq($req); 
            $this->view->renderForm(null);
        }
    }

    public function edit($req) {
        $id = $req->id;
        $interprete = $this->model->get($id);

        if (!$interprete) {
            return $this->errorView->renderError("El intérprete que intenta editar no existe.");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = $this->getFormData();
            if ($datos === null) {
                return $this->errorView->renderError("Faltan datos para actualizar el intérprete.");
            }
            $this->model->update($id, ...array_values($datos));
            header('Location: ' . BASE_URL . 'interprete');
        } else {
            $this->view->setReq($req);
            $this->view->renderForm($interprete);
        }
    }

    public function delete($req) {
        $id = $req->id;
        $interprete = $this->model->get($id);

            if (!$interprete) {
            return $this->errorView->renderError("No se puede eliminar un intérprete inexistente.");
    }
                if ($this->model->tieneCanciones($id)) {
                return $this->errorView->renderError("No se puede eliminar el intérprete porque tiene canciones asociadas.");
    }
            $this->model->delete($id);
            header('Location: ' . BASE_URL . 'interprete');
    }
}