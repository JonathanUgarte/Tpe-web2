<?php
require_once './app/model/auto.model.php';
require_once './app/model/comprador.model.php';
require_once './app/view/auto.view.php';
require_once './app/helpers/login.helper.php';


class autoController{

    private $model;
    private $view;
    private $helper;
   

   
    public function __construct() {
      $this->model = new autoModel();
      $this->view = new autoView();
      $this->helper = new loginHelper();
     
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
      $id_comprador = $_POST['id_comprador'];
      $autos = $_POST['autos'];
      $modelo = $_POST['modelo'];
      $color = $_POST['color'];
      $km = $_POST['km'];

      $this->model->insertAuto( $id_comprador,$autos, $modelo, $color,$km);

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
function filter(){
  if(isset ($_POST['selected'])&&(!empty($_POST['selected']))){
      $selected = $_POST['selected'];
      $autosbyid = $this->model->getAutosAndCompradores($selected);
      $this->view->showVentas($autosbyid);
  }
}


}
