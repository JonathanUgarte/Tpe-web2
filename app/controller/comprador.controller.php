<?php

require_once './app/model/comprador.model.php';
require_once './app/view/comprador.view.php';
require_once './app/helpers/login.helper.php';

class compradorController{

    private $model;
    private $view;
    private $helper;
   
    public function __construct() {
      $this->model = new compradorModel();
      $this->view = new compradorView();
      $this->helper = new loginHelper();
    }
  
  
  public function showCompradores(){
    session_start();
    $compradorbyid= $this->model->getCompradores();
    $logged= $this->helper->logged();
    $this->view->showCompradores($compradorbyid,$logged);
  
  }

  function addComprador() {
    // TODO: validar entrada de datos
      $id_comprador=$_POST['id_comprador'];
      $nombre=$_POST['nombre'];
      $email=$_POST['email'];
      $this->model->insertComprador($id_comprador,$nombre, $email);
      header("Location: " . BASE_URL. "compradores"); 
}

function deleteComprador($id_comprador) {
  $this->model->deleteCompradorById($id_comprador);
  header("Location: " . BASE_URL. "compradores");
}

function showFormEdit(){
  session_start();
  $this->view->showFormEdit();
}

public function editComprador($id_comprador) {
  $compradorbyid=$this->model->getCompradorbyid($id_comprador);
  $this->view->showEdit($compradorbyid);
  if (!empty($_POST['nombre'])&& (!empty($_POST['email']))){
  $nombre=$_POST['nombre'];
  $email=$_POST['email'];
  $id_comprador=$this->model->updateComprador($nombre,$email,$id_comprador);
    header("Location: " . BASE_URL. "compradores");
}
}


  
 
}
  
  