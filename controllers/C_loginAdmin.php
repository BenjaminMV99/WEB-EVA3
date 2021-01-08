<<<<<<< HEAD
<?php

namespace controllers;

use models\M_admin as M_admin;

session_start();
require_once("../models/M_admin.php");


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
            header("Location: ../index.php");
            return;
        }

        $model = new M_admin;
        $array = $model->admin_login($this->rut, $this->clave, $this->estado);


        if (count($array) == 0) {
            $_SESSION['error'] = "Email o Contraseña Incorrectos";
            header("Location: ../login_admin.php");
            return;
        }

        $_SESSION['usuario'] = $array[0];

        header("Location: ../views/ingreso_usuarios.php");
    }
}

$obj = new C_loginAdmin();
$obj->iniciarSesion();
=======
<?php

namespace controllers;

use models\M_admin as M_admin;

session_start();
require_once("../models/M_admin.php");


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
            header("Location: ../index.php");
            return;
        }

        $model = new M_admin;
        $array = $model->admin_login($this->rut, $this->clave, $this->estado);


        if (count($array) == 0) {
            $_SESSION['error'] = "Email o Contraseña Incorrectos";
            header("Location: ../login_admin.php");
            return;
        }

        $_SESSION['usuario'] = $array[0];

        header("Location: ../views/ingreso_usuarios.php");
    }
}

$obj = new C_loginAdmin();
$obj->iniciarSesion();
>>>>>>> 41d826ab17f3648489a66f0916c3dcaf147a6990
