<?php

use models\M_admin as M_admin;

session_start();
require_once("models/M_admin.php");
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
    <title>Ingreso administrador</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/material.css">
</head>
<body style="background-image: url('icons/fondo.jpg'); font-family: 'Coustard', serif;">

<nav class="teal darken-2">
    <div class="nav-wrapper">
        <a href="clientes.php" class="brand-logo">Inico de vendedor</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="inedx.php"></a></li>
            <li><a href="./index.php">Regresar</a></li>
            <li><a href="inedx.php"></a></li>
        </ul>
    </div>
</nav>
    <div class="container">
        <div class="row">  
        <div class="col l4 m4 s12"></div>
            <div class="col l4 m4 s12">

                    <div class="login">
                    <h5>Ingresar como administrador</h5>
                        <form action="controllers/C_loginUser.php" method="POST">
                            <p class="red-text">
                                <?php
                            
                                    if (isset($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    }
                                ?>
                            </p>
                            <div class="login-admin">
                            <input type="text" name="rut" id="rut" placeholder="Ingrese su rut">
                            <input type="password" name="clave" id="clave" placeholder="ingrese su contraseña">
                            
                            <button class="btn blue ancho-100 redondo">Ingresar</button>
                            </div>
                            <p><a href="index.php" class="blue-text">Volver</a></p>  
                        </form>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</body>
</html>