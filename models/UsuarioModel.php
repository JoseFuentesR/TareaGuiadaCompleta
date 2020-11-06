<?php

namespace models;

require_once("Conexion.php");
class UsuarioModel{

    public function insertarUsuario($data)
    {
        $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:A,:B,:C)");
        $stm->bindParam(":A",$data['email']);
        $stm->bindParam(":B",$data['nombre']);
        $stm->bindParam(":C", md5($data['clave']));//md5 sirve para encriptar
        return $stm->execute();

    }

}