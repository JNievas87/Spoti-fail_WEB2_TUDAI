<?php
require_once __DIR__ . '/../models/interprete.model.php';
require_once __DIR__ . '/../views/interprete.view.php';
require_once __DIR__ . '/../views/error.view.php';

class InterpreteController {
    private $model;
    private $view;
    private $errorView;

    public function __construct() {
        $this->model = new InterpreteModel();
        $this->view = new InterpreteView();
        $this->errorView = new ErrorView();
    }

    public function showAll($req) {
    $interpretes = $this->model->getAll();
    $this->view->setUser(null); //cuando tengamos el login tenemos que cambiarlo por $req->use
    $this->view->renderAll($interpretes);
    }

    public function showDetail($req) {
        $id = $req->id;
        $interprete = $this->model->get($id);

        if (!$interprete) {
            return $this->errorView->renderError("Intérprete no encontrado");
        }

        $this->view->setUser(null);
        $this->view->renderDetail($interprete);
    }
/**
     * Método privado para centralizar la captura y validación de datos del formulario.
     * Esto evita repetir código en add() y edit().
     */
    private function getFormData() {
        if (
            empty($_POST['Nombre']) || empty($_POST['Genero']) ||
            empty($_POST['Tipo']) || empty($_POST['Pais_Origen']) ||
            empty($_POST['SelloDiscografico']) || empty($_POST['Imagen']) ||
            empty($_POST['SitioWeb']) || empty($_POST['FechaInicio'])
        ) {
            return $this->errorView->renderError("Por favor, complete todos los campos.");
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

            // El spread operator desglosa el array en los argumentos que espera el model->insert
            $this->model->insert(...array_values($datos));
            header('Location: ' . BASE_URL . '?action=interprete');
        } else {
            $this->view->setUser(null); 
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
            $datos = $this->getDatosInterprete();

            if ($datos === null) {
                return $this->errorView->renderError("Faltan datos para actualizar el intérprete.");
            }

            // Pasamos el ID y despues el resto de los datos desglosados
            $this->model->update($id, ...array_values($datos));
            header('Location: ' . BASE_URL . '?action=interprete');
        } else {
            $this->view->setUser(null);
            $this->view->renderForm($interprete);
        }
    }
        public function delete($req) {
        $id = $req->id;
        $interprete = $this->model->get($id);

        if (!$interprete) {
            return $this->errorView->renderError("No se puede eliminar un intérprete inexistente.");
        }

        $this->model->delete($id);
        header('Location: ' . BASE_URL . '?action=interprete');
    }
}