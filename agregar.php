<div class="card">  
    <div class="card-content">
        <h4 class="center blue-text accent-2">Nuevo Usuario</h4>
        </div>
            <div class="card-action">
                <form action="../controllers/C_insertUser.php" method="POST">
                    <input id="rut" type="text" name="rut" placeholder="Rut del vendedor">
                    <input id="nombre" type="text" name="nombre" placeholder="Nombre del vendedor">
                    </div>
                        <input type="hidden" name="rol" value="vendedor">
                        <input type="hidden" name="clave" value="123456">
                        <input type="hidden" name="estado" value="1">
                        <button class="btn blue ancho-100 redondo">Crear vendedor</button>
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
