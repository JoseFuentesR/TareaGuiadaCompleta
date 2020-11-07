<?php

namespace model;

use models\Conexion;

require_once("Conexion.php");

class LinksModel{

    public function insertarLink($data){
        $stm = Conexion::conector()->prepare("INSERT INTO links VALUES(NULL,:A,:B,:C)");
        $stm->bindParam(":A",$data['nombre']);
        $stm->bindParam(":B",$data['link']);
        $stm->bindParam(":C",$data['email']);
        return $stm->execute();
    }
    public function getaAllLinksByEmail(){
        $stm = Conexion::conector()->prepare("SELECT * FROM links WHERE emailFK=:A");
        $stm->bindParam(":A",$email);
    }
}