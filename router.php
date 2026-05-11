<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/app/controllers/interprete.controller.php';
require_once __DIR__ . '/app/controllers/cancion.controller.php';

session_start();

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'interprete';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$req = new StdClass();

switch ($params[0]) {
    case 'interprete':
        $controller = new InterpreteController();
        if (isset($params[1]) && is_numeric($params[1])) {
            $req->id = $params[1];
            $controller->showDetail($req);
        } else {
            $controller->showAll($req);
        }
        break;
    case 'cancion':
        $controller = new CancionController();
        if (isset($params[1]) && is_numeric($params[1])) {
            $req->id = $params[1];
            $controller->showDetail($req);
        } else {
            $controller->showAll($req);
        }
        break;

    default:
        echo '404 - Página no encontrada';
        break;
}