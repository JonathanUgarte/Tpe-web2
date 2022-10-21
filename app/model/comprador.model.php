<?php

class compradorModel{


    private $db;
   
       public function __construct(){
           $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8','root','');
       }
       

   function getCompradores(){
       $query =$this->db->prepare('SELECT * FROM comprador');
       $query->execute();
   
       $compradorbyid=$query->fetchAll(PDO::FETCH_OBJ);
       
       return $compradorbyid;
   }

   public function insertComprador($id_comprador, $nombre, $email) {
    $query = $this->db->prepare('INSERT INTO comprador (id_comprador,nombre , email) VALUES (?,?, ?)');
    $query->execute([$id_comprador, $nombre, $email]);
    return $this->db->lastInsertId();
  }

  function deleteCompradorById($id_comprador) {
    $query = $this->db->prepare('DELETE FROM comprador WHERE id_comprador = ?');
    $query->execute([$id_comprador]);
}

function getCompradorbyid($id_comprador){
        
    $query = $this->db->prepare("SELECT * FROM comprador WHERE id_comprador=?");
    $query->execute([$id_comprador]);

    $compradorbyid = $query->fetchAll(PDO::FETCH_OBJ);

   return $compradorbyid;
}

public function updateComprador($id_comprador, $nombre, $email) {
    $query = $this->getCompradorbyid($id_comprador);
    $query = $this->db->prepare('UPDATE comprador SET nombre=?, email=? WHERE id_comprador = ?');
    $query->execute([$id_comprador, $nombre, $email]);
    
}

}