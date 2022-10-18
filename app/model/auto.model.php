<?php

class autoModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8','root','');
    }
    
    function getAutos(){

    
        $query = $this->db->prepare("SELECT * FROM autos");
        $query->execute();
    
        $autosbyid = $query->fetchAll(PDO::FETCH_OBJ);

       return $autosbyid;
       
    
    }

    
    public function insertAuto($autos, $modelo, $color, $km) {
        $query = $this->db->prepare("INSERT INTO autos (autos, modelo, color, km) VALUES (?, ?, ?, ?)");
        $query->execute([$autos, $modelo, $color, $km]);

        return $this->db->lastInsertId();
    }



    function deleteAutoById($id) {
        $query = $this->db->prepare('DELETE FROM autos WHERE id = ?');
        $query->execute([$id]);
    }

    public function getDetailAutos ($id){
        $query = $this->db->prepare("SELECT * FROM autos WHERE id=?");
        $query->execute([$id]);
        $autosbyid = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        return $autosbyid;
    }


    function getAutobyid($id){
        
        $query = $this->db->prepare("SELECT * FROM autos WHERE id=?");
        $query->execute([$id]);
    
        $autosbyid = $query->fetchAll(PDO::FETCH_OBJ);

       return $autosbyid;
    }

    public function updateAuto($id, $autos, $modelo, $color, $km) {
        $query = $this->getAutobyid($id);
        $query = $this->db->prepare('UPDATE autos SET autos=?, modelo=?,color=?,km=? WHERE id = ?');
        $query->execute([$id, $autos, $modelo, $color, $km]);
        
    }

    function getAutosByComprador($compradorby){
        $query = $this->db->prepare( "SELECT a.id, a.autos, a.modelo, a.color, a.km, c.id_comprador AS comprador FROM autos a JOIN comprador c ON a.id_comprador=c.id_comprador  WHERE comprador=?");
        $query -> execute([$compradorby]);
        $autosbyid = $query->fetchAll(PDO::FETCH_OBJ); 
        return $autosbyid;
    }




}

