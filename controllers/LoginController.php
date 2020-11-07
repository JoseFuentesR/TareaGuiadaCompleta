<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once ("../models/UsuarioModel.php");

class LoginController{
    public $email;
    public $clave;


    public function __construct()
    {
        $this->email = $_POST['email'];
        $this->clave = $_POST['clave'];
    }
    public function iniciarSesion(){
        session_start();
        if($this->email=="" || $this->clave==""){
            $_SESSION['error']="complete los datos";
            header("Location: ../index.php");
            return;
        }
        $modelo = new UsuarioModel();
        $array = $modelo->buscarUsuarioLogin($this->email, $this->clave);
        if(count($array) ==0){
            $_SESSION['error']="email o clave no se encuentran";
            header("Location: ../index.php");
            return;
        }
        $_SESSION['usuario'] = $array[0];
        header("Location: ../view/nuevo_link.php");
    }
}
$obj = new LoginController();
$obj->iniciarSesion();