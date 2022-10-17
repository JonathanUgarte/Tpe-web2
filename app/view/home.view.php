<?php

require_once 'libs/smarty-master/libs/Smarty.class.php';

class homeView{
    private $smarty;

    
    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showHome(){

        // asigno variables al tpl smarty
        $this->smarty->assign('home'); 
     

        // mostrar el tpl
        $this->smarty->display('home.tpl');
    }

    }
