<?php

use models\M_admin as M_admin;

session_start();
require_once("../models/M_admin.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_SESSION['user'])) {
    $model = new M_admin();
    $usuario = $model->getAllUsuarios();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body style="background-image: url('../icons/fondo.jpg'); font-family: 'Coustard', serif;">
<nav class="teal darken-2">
    <div class="nav-wrapper">
        <a href="clientes.php" style="margin-left: 20px;" class="brand-logo">Ingreso de clientes</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="active"><a href="clientes.php">Crear Cliente</a></li>
            <li><a href="exit.php">Salir</a></li>
            <li><a href="exit.php"></a></li>
        </ul>
    </div>
</nav>
<div class="container">
                <div class="row">
                    <div class="col l2 m4 s12"></div>
                    <div class="col l8 m4 s12">
                        <div class="card" style="justify-content: center;">
                            <div class="card-action" style="align-items: center;">
                                <h6 class="blue-text">Nuevo Cliente</h6>
                                <form action="../controllers/C_insertCliente.php" method="POST">
                                    <p class="green-text">
                                        <?php
                                        if (isset($_SESSION['respuesta'])) {
                                            echo $_SESSION['respuesta'];
                                            unset($_SESSION['respuesta']);
                                        } else
                                        ?>
                                    </p>
                                    <p class="red-text">
                                        <?php
                                    if (isset($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    }
                                        ?>
                                    </p>

                                        <input id="rut" type="text" name="rut" placeholder="Rut del clinte">


                                        <input id="nombre" type="text" name="nombre" placeholder="Nombre del cliente">


                                        <input id="direccion" type="text" name="direccion" placeholder="Direccion del cliente">


                                        <input id="telefono" type="text" name="telefono" placeholder="Telefono cliente">
  
                                        <input id="icon_prefix" type="text" class="validate datepicker" name="fecha" placeholder="fehca de creacion">

                                        <input id="email" type="email" name="email" placeholder="Correo del cliente">

                                    <button class="btn ">Crear  Cliente</button>
                                </form>
                                <p class="red-text">
                                    <?php
                                    if (isset($_SESSION['respuesta'])) {
                                        echo $_SESSION['respuesta'];
                                        unset($_SESSION['respuesta']);
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.datepicker');
                var instances = M.Datepicker.init(elems, {
                    'autoClose': true,
                    'format': 'yyyy/mm/dd',
                    i18n: {
                        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                        weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                        weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                        weekdaysAbbrev: ["D", "L", "M", "M", "J", "V", "S"],
                        cancel: 'Cancelar',
                        clear: 'Limpiar',
                        done: 'Aceptar'
                    }
                });
            });
        </script>

</body>
</html>