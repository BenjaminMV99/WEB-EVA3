<?php

namespace controllers;

use models\M_admin as M_admin;

session_start();

require_once("../models/M_admin.php");

class C_listUser
{
    public $bt_edit;

    public function __construct()
    {
        $modelo = new M_admin;
        $this->bt_edit = $_POST['bt_edit'];

        if(isset($this->bt_edit)){
            
            $_SESSION['editar'] = "ON";
            $usuario = $modelo->buscarUsuario($this->bt_edit);
            $_SESSION['usuario'] = $usuario[0];
            
            header("Location: ../views/ingreso_usuarios.php");
            
        }
        
    }
    public function procesar()
    {

    }
}
$obj = new C_listUser();
$obj->procesar();
