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
  //edit-cancion/:id            edit-cancion/:id     CancionController->edit($id)
  //delete-cancion/:id          delete-cancion/:id   CancionController->delete($id)
  //login_form                  login_form           AuthController->showForm()
  //login                       login                AuthController->login()
  //logout                      logout               AuthController->logout()

// Acción por defecto si no se especifica ninguna en la URL
$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Limpia barras al inicio y al final, y separa la acción en partes
// Ejemplo: "cancion/5" → $params[0] = "cancion", $params[1] = "5"
$action = trim($action, '/');
$params = explode('/', $action);

// Crea el objeto request y carga los datos de sesión
$req = new StdClass();
$req = (new SessionMiddleware())->run($req);

switch ($params[0]) {

    // ==================== RUTAS DE INTÉRPRETES ====================

    // Muestra el listado o el detalle según si se pasa un ID
    case 'interprete':
        $controller = new InterpreteController();
        if (isset($params[1]) && is_numeric($params[1])) {
            $req->id = $params[1];
            $controller->showDetail($req);
        } else {
            $controller->showAll($req);
        }
        break;

    // Muestra el formulario de alta y procesa el POST (requiere login)
    case 'addInterprete':
        $req = (new GuardMiddleware())->run($req);
        $controller = new InterpreteController();
        $controller->add($req);
        break;

    // Muestra el formulario de edición y procesa el POST (requiere login)
    case 'editInterprete':
        $req = (new GuardMiddleware())->run($req);
        $req->id = $params[1];
        $controller = new InterpreteController();
        $controller->edit($req);
        break;

    // Elimina el intérprete por ID (requiere login)
    case 'deleteInterprete':
        $req = (new GuardMiddleware())->run($req);
        $req->id = $params[1];
        $controller = new InterpreteController();
        $controller->delete($req);
        break;

    // ==================== RUTAS DE CANCIONES ====================

    // Muestra el listado o el detalle según si se pasa un ID
    case 'cancion':
        $controller = new CancionController();
        if (isset($params[1]) && is_numeric($params[1])) {
            $req->id = $params[1];
            $controller->showDetail($req);
        } else {
            $controller->showAll($req);
        }
        break;

    // Muestra el formulario de alta y procesa el POST (requiere login)
    case 'add-cancion':
        $req = (new GuardMiddleware())->run($req);
        $controller = new CancionController();
        $controller->add($req);
        break;

    // Muestra el formulario de edición y procesa el POST (requiere login)
    case 'edit-cancion':
        $req = (new GuardMiddleware())->run($req);
        $req->id = $params[1];
        $controller = new CancionController();
        $controller->edit($req);
        break;

    // Elimina la canción por ID (requiere login)
    case 'delete-cancion':
        $req = (new GuardMiddleware())->run($req);
        $req->id = $params[1];
        $controller = new CancionController();
        $controller->delete($req);
        break;

    // ==================== RUTA HOME ====================

    // Muestra la página principal con el carrusel de canciones
    case 'home':
        $controller = new HomeController();
        $controller->showHome($req);
        break;

    // ==================== RUTAS DE AUTENTICACIÓN ====================

    // Muestra el formulario de login (modal)
    case 'login_form':
        $controller = new AuthController();
        $controller->showForm($req);
        break;

    // Procesa el formulario de login y crea la sesión
    case 'login':
        $controller = new AuthController();
        $controller->login($req);
        break;

    // Destruye la sesión y redirige al home
    case 'logout':
        $controller = new AuthController();
        $controller->logout($req);
        break;

    // Si la ruta no existe muestra un mensaje de error
    default:
        echo '404 - Página no encontrada';
        break;
}