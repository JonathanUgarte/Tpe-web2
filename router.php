<?php
require_once './app/controller/auto.controller.php';
require_once './app/controller/comprador.controller.php';
require_once './app/controller/home.controller.php';
require_once './app/controller/login.controller.php';



define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; //accion por defecto

if(!empty($_GET['action'])){
    $action = $_GET['action'];
}

$params = explode('/', $action);


switch($params[0]){
   
    case 'autos':
        $autoController = new autoController();
        $autoController->showAutos();
        break;

    case 'home':
    $homeController = new homeController();
     $homeController->showHome();
            break;
    
    
    case 'detalle':
        $autoController = new autoController();
        $id= $params[1];
        $autoController->showDetailAutos($id);
        break;
    
    case 'login':
        $loginController = new loginController();
        $loginController->showLogin();
        break;
        

    case 'admin':
        $autoController = new autoController();
        $autoController->showAutos();
        break;


    case 'validate':
            $loginController = new loginController();
            $loginController->validateUser();
            break;
    
    case 'logout':
            $loginController = new loginController();
            $loginController->logoutUser();

    case 'add':
            $autoController = new autoController();
            $autoController->addAutos();
            break;

    case 'delete':
        $autoController = new autoController();
        $id = $params[1];
        $autoController->deleteAuto($id);
        break;

    case 'formEdit':
            $autoController = new autoController();
            $autoController->showFormEditAutos();
            $id = $params[1];
            $autoController->editAuto($id);
            break;
    case 'listVentas':
            $autoController = new autoController();
            $id_comprador = $params[1];
            $autoController->showVentas($id_comprador);
            break;

    case 'compradores':
            $compradorController = new compradorController();
            $compradorController->showCompradores();
            break;

    case 'addComprador':
            $compradorController = new compradorController();
            $compradorController->addComprador();
            break;

    case 'deleteComprador':
            $compradorController = new compradorController();
            $id_comprador = $params[1];
            $compradorController->deleteComprador($id_comprador);
            break;

    case 'formEditComprador':
            $compradorController = new compradorController();
            $compradorController->showFormEdit();
            $id_comprador = $params[1];
            $compradorController->editComprador($id_comprador);
            break;


         default:
         echo('404');
         break;   
}
