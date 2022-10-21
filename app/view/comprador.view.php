<?php

require_once 'libs/smarty-master/libs/Smarty.class.php';

class compradorView{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }


    function  showCompradores($compradorbyid, $logged){
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('compradorbyid', $compradorbyid);
        $this->smarty->display('tableVentas.tpl');

}

function showFormEdit(){
    $this->smarty->display('formEditComprador.tpl');

}

function showEdit($compradorbyid){
    $this->smarty->assign('compradorbyid', $compradorbyid);
    
}

function showVentas($autosbycomprador){
    $this->smarty->assign('autosbycomprador', $autosbycomprador);
    $this->smarty->display('formListVentas.tpl');


  }
}