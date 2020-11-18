<?php

namespace controllers;

use models\M_vendedor as M_vendedor;

session_start();
require_once("../models/M_vendedor.php");


class C_loginAdmin
{
    public $rut;
    public $clave;
    public $estado;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->clave = $_POST['clave'];
        $this->estado = $_POST['estado'];
    }

    public function iniciarSesion()
    {
        if ($this->rut == "" || $this->clave == "") {
            $_SESSION['error'] = "Complete los datos";
            header("Location: ../login_user.php");
            return;
        }

        $model = new M_vendedor;
        $array = $model->vendedor_login($this->rut, $this->clave, $this->estado);


        if (count($array) == 0) {
            $_SESSION['error'] = "Email o Contraseña Incorrectos";
            header("Location: ../login_user.php");
            return;
        }

        $_SESSION['usuario'] = $array[0];

        header("Location: ../views/ingreso_clientes.php");
    }
}

$obj = new C_loginAdmin();
$obj->iniciarSesion();
