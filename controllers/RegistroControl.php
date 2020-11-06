<?php
namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class RegistroControl{
    public $email;
    public $nombre;
    public $clave;

    public function __construct()
    {
       $this->email = $_POST['email'];
       $this->nombre = $_POST['nombre'];
       $this->clave =$_POST['clave']; 
    }
    public function registrar(){
        session_start();
        if($this->email=="" || $this->nombre=="" || $this->clave==""){
            
            $_SESSION ['error'] ="Complete la informacion";
            header("Location: ../registro.php");
            return;
        }
        $modelo = new UsuarioModel();
        $data = ['email'=>$this->email,'nombre'=>$this->nombre,'clave'=>$this->clave];
        $count = $modelo->insertarUsuario($data);

        if($count == 1){
            $_SESSION['respuesta'] = "usuario creado con exito";
        }else{
            $_SESSION['error'] = "hubo un error en la base de datos";
        }
        header("Location:../Registro.php");
    }

}
$obj = new RegistroControl();
$obj->registrar();