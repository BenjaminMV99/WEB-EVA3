<<<<<<< HEAD
<?php

namespace controllers;

use models\M_admin as M_admin;

session_start();

require_once("../models/M_admin.php");

class C_insertUser
    {
        public $rut;
        public $nombre;
        public $rol;
        public $clave;
        public $estado;

        public function __construct()
        {
            $this->rut = $_POST['rut'];
            $this->nombre = $_POST['nombre'];
            $this->rol = $_POST['rol'];
            $this->clave = $_POST['clave'];
            $this->estado = $_POST['estado'];
        }

        public function insert_User()
        {
            if($this->rut == "" || $this->nombre == ""){
                $_SESSION['error'] = "Campos Vacios";
                header("Location: ../views/ingreso_usuarios.php");
                return;
            }

            $model = new M_admin;
            $data = ["rut" => $this->rut, "nombre" => $this->nombre, "rol" => $this->rol, 'clave'=>123456, 'estado'=>1];
            $count = $model->insertUser($data);

            if($count == 1){
                $_SESSION['respuesta'] = "Usuario Creado con éxito";
            } else {
                $_SESSION['error'] = "Hubo un error a nivel de base de datos";
            }
            header("Location: ../views/ingreso_usuarios.php");


        }

    }

    $obj = new C_insertUser();
=======
<?php

namespace controllers;

use models\M_admin as M_admin;

session_start();

require_once("../models/M_admin.php");

class C_insertUser
    {
        public $rut;
        public $nombre;
        public $rol;
        public $clave;
        public $estado;

        public function __construct()
        {
            $this->rut = $_POST['rut'];
            $this->nombre = $_POST['nombre'];
            $this->rol = $_POST['rol'];
            $this->clave = $_POST['clave'];
            $this->estado = $_POST['estado'];
        }

        public function insert_User()
        {
            if($this->rut == "" || $this->nombre == ""){
                $_SESSION['error'] = "Campos Vacios";
                header("Location: ../views/ingreso_usuarios.php");
                return;
            }

            $model = new M_admin;
            $data = ["rut" => $this->rut, "nombre" => $this->nombre, "rol" => $this->rol, 'clave'=>123456, 'estado'=>1];
            $count = $model->insertUser($data);

            if($count == 1){
                $_SESSION['respuesta'] = "Usuario Creado con éxito";
            } else {
                $_SESSION['error'] = "Hubo un error a nivel de base de datos";
            }
            header("Location: ../views/ingreso_usuarios.php");


        }

    }

    $obj = new C_insertUser();
>>>>>>> 41d826ab17f3648489a66f0916c3dcaf147a6990
    $obj->insert_User();