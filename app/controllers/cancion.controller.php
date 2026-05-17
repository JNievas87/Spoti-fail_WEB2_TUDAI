<?php
require_once __DIR__ . '/../models/cancion.model.php';
require_once __DIR__ . '/../models/interprete.model.php';
require_once __DIR__ . '/../views/cancion.view.php';

class CancionController {
    private $model;           // Modelo de canciones
    private $interpreteModel; // Modelo de intérpretes, necesario para cargar el select en el formulario
    private $view;            // Vista de canciones

    public function __construct() {
        $this->model = new CancionModel();
        $this->interpreteModel = new InterpreteModel();
        $this->view = new CancionView();
    }

    // Obtiene todas las canciones y las muestra en el listado
    public function showAll($req) {
        $canciones = $this->model->getAll();
        $this->view->setReq($req);
        $this->view->showAll($canciones);
    }

    // Obtiene el detalle de una canción por su ID
    public function showDetail($req) {
        $cancion = $this->model->get($req->id);
        $this->view->setReq($req);
        $this->view->renderDetail($cancion);
    }

    // Maneja el alta de una canción
    // Si recibe POST, procesa el formulario, si no, muestra el formulario vacío
    public function add($req) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Convierte minutos y segundos a segundos totales para guardar en la BD
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
            // Carga los intérpretes para el select del formulario
            $interpretes = $this->interpreteModel->getAll();
            $this->view->setReq($req);
            $this->view->renderForm($interpretes);
        }
    }

    // Maneja la modificación de una canción existente
    // Si recibe POST, procesa el formulario, si no, muestra el formulario con los datos actuales
    public function edit($req) {
        $cancion = $this->model->get($req->id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Convierte minutos y segundos a segundos totales para guardar en la BD
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
            // Carga los intérpretes para el select del formulario
            $interpretes = $this->interpreteModel->getAll();
            $this->view->setReq($req);
            $this->view->renderForm($interpretes, $cancion);
        }
    }

    // Elimina una canción por su ID y redirige al listado
    public function delete($req) {
        $this->model->delete($req->id);
        header('Location: ' . BASE_URL . 'cancion');
    }
}