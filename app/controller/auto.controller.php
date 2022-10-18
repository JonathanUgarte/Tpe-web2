<?php
require_once './app/model/auto.model.php';
require_once './app/model/comprador.model.php';
require_once './app/view/auto.view.php';
require_once './app/helpers/login.helper.php';


class autoController{

    private $model;
    private $view;
    private $helper;
    private$compradorModel;

   
    public function __construct() {
      $this->model = new autoModel();
      $this->view = new autoView();
      $this->helper = new loginHelper();
      $this->compradorModel = new compradorModel();
    }


  public function showAutos(){
    session_start();
    $autosbyid= $this->model->getAutos();
    $logged= $this->helper->logged();
    $this->view->showAutos($autosbyid, $logged);
   

    }

    public function showDetailAutos($id) {
      session_start();
      $detailAutos= $this->model->getDetailAutos($id);
      $this->view->showDetail($detailAutos);
    }

    

    function addAutos() {
      // TODO: validar entrada de datos
     

      $auto = $_POST['autos'];
      $modelo = $_POST['modelo'];
      $color = $_POST['color'];
      $km = $_POST['km'];

      $this->model->insertAuto($auto, $modelo, $color,$km);

      header("Location: " . BASE_URL. "autos"); 
  }
 
  function deleteAuto($id) {
      $this->model->deleteAutoById($id);
      header("Location: " . BASE_URL."autos");
  }
  function showFormEditAutos(){
    session_start();
    $this->view->showFormEdit();
  }

   public function editAuto($id) {
    $autosbyid=$this->model->getAutobyid($id);
    $this->view->showEdit($autosbyid);
    if (!empty($_POST['autos'])&& (!empty($_POST['modelo']))&& (!empty($_POST['color']))&&(!empty($_POST['km']))){
    $autos=$_POST['autos'];
    $modelo=$_POST['modelo'];
    $color=$_POST['color'];
    $km=$_POST['km'];
    $id=$this->model->updateAuto($autos,$modelo,$color,$km,$id);
      header("Location: " . BASE_URL."autos");
  }
}



}

