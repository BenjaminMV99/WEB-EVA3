<?php

namespace controllers;

use models\M_vendedor as M_vendedor;

require_once("../models/M_vendedor.php");



class C_insertCliente
    {
        public $rut;
        public $nombre;
        public $telefono;
        public $direccion;
        public $fecha;
        public $email;

        public function __construct()
        {
            $this->rut = $_POST['rut'];
            $this->nombre = $_POST['nombre'];
            $this->telefono = $_POST['telefono'];
            $this->direccion = $_POST['direccion'];
            $this->fecha = $_POST['fecha'];
            $this->email = $_POST['email'];
        }

        public function insert_cliente()
        {
            if($this->rut == ""|| $this->nombre == "" || $this->direccion == ""|| $this->telefono == ""|| $this->fecha == ""|| $this->email == ""){
                $_SESSION['errorCli'] = "Complete los campos vacios";
                header("Location: ../views/ingreso_clientes.php");
                return;
            }

            $model = new M_vendedor;
            $data = ["rut_cliente" => $this->rut, "nombre_cliente" => $this->nombre, "direccion_cliente" => $this->direccion, "telefono_cliente" => $this->telefono, "fecha_creacion" => $this->fecha, "email_cliente" => $this->email];
            
            $count = $model->insertCliente($data);
            if($count == 1){
                $_SESSION['respuesta'] = "Cliente creado con éxito";
            } else {
                $_SESSION['error'] = "Hubo un error en la base de datos";
            }
            header("Location: ../views/ingreso_clientes.php");
        }

    }     
    
    $obj = new C_insertCliente();
$obj->insert_cliente();

