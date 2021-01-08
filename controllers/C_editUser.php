<?php

namespace controllers;

use models\M_admin as M_admin;

require_once("../models/M_admin.php");
session_start();

class C_editUser
{
    public $rut;
    public $nombre;
    public $estado;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->nombre = $_POST['nombre'];
        $this->estado = $_POST['estado'];
    }

    public function editar()
    {
        if($this->rut == "" || $this->nombre == ""){
            $_SESSION['errorEdit'] = "Completa todos los campos";
            header("Location: ../views/ingreso_usuarios.php");
            return;
        }

        $data = ['nombre'=>$this->nombre, 'estado'=>$this->estado];
        $model = new M_admin;

        $count = $model->editarUsuario($this->rut, $data);
        if($count == 1){
            $_SESSION['ok_edit'] = "Usuario Actualizado";
        } else {
            $_SESSION['errorEdit'] = "Error en la Base de Datos";
        }
        header("Location: ../views/ingreso_usuarios.php");
    }
}

$obj = new C_editUser();
$obj->editar();

