<?php
require_once 'libs/smarty-master/libs/Smarty.class.php';

class autoView{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    function showAutos($autosbyid , $logged){
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('autosbyid', $autosbyid);
        $this->smarty->display('table.tpl');

    }


function showFormEdit(){
    $this->smarty->display('formEdit.tpl');

}

function showEdit($autosbyid){
    $this->smarty->assign('autosbyid', $autosbyid);
    
}

function showDetail($autosbyid){
    $this->smarty->assign('autosbyid', $autosbyid);

    $this->smarty->display('detail.tpl');
  }

  
function resultFilter($autosbyid){
    $this->smarty->assign('autosbyid', $autosbyid);
      $this->smarty->display('resultFilter.tpl');

}

}





