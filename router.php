<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/app/controllers/interprete.controller.php';
require_once __DIR__ . '/app/controllers/cancion.controller.php';
require_once __DIR__ . '/app/controllers/home.controller.php';

session_start();

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$action = trim($action, '/');
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
    case 'addInterprete':
     // $req = (new GuardMiddleware())->run($req);
        $controller = new InterpreteController();
        $controller->add($req);
        break;
    case 'editInterprete':
        // $req = (new GuardMiddleware())->run($req); // descomentar cuando esté el login
        $req->id = $params[1];
        $controller = new InterpreteController();
        $controller->edit($req);
        break;
    case 'deleteInterprete':
        // $req = (new GuardMiddleware())->run($req); // descomentar cuando esté el login
        $req->id = $params[1];
        $controller = new InterpreteController();
        $controller->delete($req);
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
    case 'home':
        $controller = new HomeController();
        $controller->showHome();
        break;

    default:
        echo '404 - Página no encontrada';
        break;
}