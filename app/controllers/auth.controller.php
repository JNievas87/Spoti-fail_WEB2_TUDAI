<?php
require_once 'app/models/users.model.php';

class AuthController {
    private $model;

    public function __construct() {
        $this->model = new UsersModel();
    }

    public function showForm($req, $error = null) {
        if ($error) {
            $_SESSION['login_error'] = $error;
        }
        header('Location: ' . BASE_URL . 'home');
        exit();
    }

    public function login($req) {
        if (!empty($_POST['user']) && !empty($_POST['password'])) {
            $user = $_POST['user'];
            $password = $_POST['password'];

            $userFromDB = $this->model->getByUser($user);

            if ($userFromDB && password_verify($password, $userFromDB->password)) {
                $_SESSION["id"] = $userFromDB->ID_Usuario;
                $_SESSION["user"] = $userFromDB->user;

                header('Location: ' . BASE_URL . 'home');
            } else {
                $this->showForm($req, 'Usuario o contraseña incorrectos');
            }
        } else {
            $this->showForm($req, 'Faltan completar campos obligatorios');
        }
    }

    public function logout($req) {
        session_destroy();
        header('Location: ' . BASE_URL . 'home');
    }
}