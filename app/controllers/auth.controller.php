<?php
require_once 'app/models/users.model.php';

class AuthController {
    private $model; // Modelo de usuarios para consultar la BD

    public function __construct() {
        $this->model = new UsersModel();
    }

    // Guarda el mensaje de error en la sesión y redirige al home para mostrar el modal
    public function showForm($req, $error = null) {
        if ($error) {
            $_SESSION['login_error'] = $error;
        }
        header('Location: ' . BASE_URL . 'home');
        exit();
    }

    // Valida las credenciales del usuario y crea la sesión si son correctas
    public function login($req) {
        if (!empty($_POST['user']) && !empty($_POST['password'])) {
            $user = $_POST['user'];
            $password = $_POST['password'];

            // Busca el usuario en la BD
            $userFromDB = $this->model->getByUser($user);

            // Verifica la contraseña contra el hash almacenado en la BD
            if ($userFromDB && password_verify($password, $userFromDB->password)) {
                // Guarda los datos del usuario en la sesión
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

    // Destruye la sesión y redirige al home
    public function logout($req) {
        session_destroy();
        header('Location: ' . BASE_URL . 'home');
    }
}