<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/app/controllers/interprete.controller.php';
require_once __DIR__ . '/app/controllers/cancion.controller.php';
require_once __DIR__ . '/app/controllers/home.controller.php';

require_once __DIR__ . '/app/controllers/auth.controller.php';
require_once __DIR__ . '/app/middleware/session.middleware.php';
require_once __DIR__ . '/app/middleware/guard.middleware.php';


  //TABLA DE RUTEO
  //home                        home                 HomeController->showHome()
  //interprete                  interprete           InterpreteController->showAll()
  //interprete/:id              interprete/:id       InterpreteController->showDetail($id)
  //addInterprete               addInterprete        InterpreteController->add()
  //editInterprete/:id          editInterprete/:id   InterpreteController->edit($id)
  //deleteInterprete/:id        deleteInterprete/:id InterpreteController->delete($id)
  //cancion                     cancion              CancionController->showAll()
  //cancion/:id                 cancion/:id          CancionController->showDetail($id)
  //add-cancion                 add-cancion          CancionController->add()
  //delete-cancion/:id          delete-cancion/:id   CancionController->delete()
  //login_form                  login_form           AuthController->showForm()
  //login                       login                AuthController->login()
  //logout                      logout               AuthController->logout()


$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$action = trim($action, '/');
$params = explode('/', $action);


$req = new StdClass();
$req = (new SessionMiddleware())->run($req);


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
        $req = (new GuardMiddleware())->run($req); 
        $controller = new InterpreteController();
        $controller->add($req);
        break;
    case 'editInterprete':
        $req = (new GuardMiddleware())->run($req); 
        $req->id = $params[1];
        $controller = new InterpreteController();
        $controller->edit($req);
        break;
    case 'deleteInterprete':
        $req = (new GuardMiddleware())->run($req); 
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

    case 'add-cancion':
        $req = (new GuardMiddleware())->run($req);
        $controller = new CancionController();
        $controller->add($req);
        break;

    case 'delete-cancion':
        $req = (new GuardMiddleware())->run($req); 
        $req->id = $params[1];
        $controller = new CancionController();
        $controller->delete($req);
        break;

    case 'home':
        $controller = new HomeController();
        $controller->showHome($req); 
        break;

    case 'login_form':
        $controller = new AuthController();
        $controller->showForm($req);
        break;

    case 'login':
        $controller = new AuthController();
        $controller->login($req);
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout($req);
        break;

    default:
        echo '404 - Página no encontrada';
        break;
}