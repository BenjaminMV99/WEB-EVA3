<?php

use models\M_admin as M_admin;

session_start();
require_once("../models/M_admin.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION['usuario'])) {
    $model = new M_admin();
    $usuario = $model->getAllUsuarios();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Gestión de Usuarios</title>
</head>

<body style="background-image: url('../icons/fondo.jpg'); font-family: 'Coustard', serif;">
    <?php if (isset($_SESSION['usuario'])) { ?>
        <nav class="teal darken-2">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo" style="margin-left: 25px;">Ingreso de vendedores </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="exit.php">regresar</a></li>
                    <li><a href="exit.php"></a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
<!-- Para editar datos de vendedores -->
<div class="col l4 m4 s12">
    <?php if (isset($_SESSION['editar'])) { ?>
    <div class="card">
        <div class="card-content">
            <img src="icons/user.svg" alt="">
            <h4 class="center blue-text accent-2">Editar Usuario</h4>
            <form action="../controllers/C_editUser.php" method="POST">
                <input id="rut" type="text" name="rut" placeholder="Nuevo rut" value="<?= $_SESSION['usuario']['rut'] ?>">
                <input id="nombre" type="text" name="nombre" placeholder="Nuevo nombre" value="<?= $_SESSION['usuario']['nombre'] ?>">
                <div class="input-field col s12">
                    <select name="estado" id="estado">
                        <option value="1">Habilitado</option>
                        <option value="0">Bloqueado</option>
                    </select>
                    </div>
                    <button class="btn teal lighten-2">Editar Usuario</button>
            </form>
         </div>
    </div>
    <?php
    unset($_SESSION['editar']);
    unset($_SESSION['usuario']);
    } else if (isset($_SESSION['usuario'])) {
    ?>
<!-- para agregar vendedores -->
<div class="card" style="margin-top:50px; ">
    <div class="card-content"  style="justify-content:center;">   
    <img src="icons/admin.svg" alt="">
        <h5 class="center blue-text accent-2">Datos del vendedor</h5>            
    </div>
    <div class="card-action">
        <form action="../controllers/C_insertUser.php" method="POST">
            <input id="rut" type="text" name="rut" placeholder="Ingrese rut del vededor">
            <input id="nombre" type="text" name="nombre" placeholder="Ingrese nombre del vedendor">
            <input type="hidden" name="rol" value="vendedor">
            <input type="hidden" name="clave" value="123456">
            <input type="hidden" name="estado" value="1">
            <button class="btn  teal darken-3">Crear vendedor</button>             
        </form>
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
    </div>
</div>            
<?php
}
?>
</div>
<div class="col l8 m8 s12">
<div class="card" style="margin-top:50px; ">
        <div class="card-content">
            <h4 class="center blue-text accent-2" >Lista de los vendedores</h4>
            <form action="../controllers/C_tabla.php" method="POST">
                <table class="blue-text accent-2">
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                <?php foreach ($usuario as $item) { ?>
                    <tr>
                        <td> <?= $item["rut"] ?> </td>
                        <td> <?= $item['nombre'] ?> </td>
                        <?php if ($item['estado'] == 1) { ?>
                            <td class="blue-text"> <?= $item['estado'] = "Habilitado"; ?> </td>
                         <?php } else { ?>
                            <td class="red-text"> <?= $item['estado'] = "Bloqueado"; ?> </td>
                         <?php } ?>
                            <td>
                             <button name="bt_edit" value="<?= $item["rut"] ?>" class="btn" style="height: 30px;">
                                <i class="material-icons" style="font-size: 12px;">Editar</i>
                            </button>
                            </td>
                    </tr>
                <?php } ?>
                </table>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<?php } else { ?>
    <h3 class="red-text">Error de Acceso</h3>
    <p>
         Usted no tiene permisos para estar aqui
        <br><br>
        <a href="../index.php">Home</a>
        </p>

    <?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>

</body>

</html>