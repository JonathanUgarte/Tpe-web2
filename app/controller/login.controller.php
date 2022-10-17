<?php
require_once './app/view/login.view.php';
require_once './app/model/login.model.php';
require_once './app/helpers/login.helper.php';

class loginController {
    private $view;
    private $model;
    private $helper;

    
    public function __construct() {
        $this->model = new loginModel();
        $this->view = new loginView();
        $this->helper = new loginHelper();
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start(); // verifica que haya un inicio de sesion
        }  
     
    }

    public function showLogin() {
        $this->view->showLogin();
    }
    public function validateUser() { // valida los datos
       
        $email = $_POST['email'];
        $password = $_POST['password'];

        // busco el usuario por email
        $usuarios = $this->model->getUsuarios($email);

        // verifico que el usuario existe y que las contraseñas son iguales
        if ($usuarios && password_verify($password, $usuarios->password)) {
            $this->helper->login($usuarios);

            // inicio una session para este usuario
            session_start();
            $_SESSION['USER_ID'] = $usuarios->id;
            $_SESSION['USER_EMAIL'] = $usuarios->email;
            $_SESSION['IS_LOGGED'] = true;

            header("Location:" . BASE_URL);
        } else {
            // si los datos son incorrectos muestro el form con un erro
           $this->view->showLogin("El usuario o la contraseña no existe.");
        } 
    }

    public function logoutUser() {
        session_start();
        session_destroy();
        header("Location:" . BASE_URL. "login");
    }
}