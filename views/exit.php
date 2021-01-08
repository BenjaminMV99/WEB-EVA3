<<<<<<< HEAD
<?php

session_start();
if (isset($_SESSION['usuario'])) {
    unset($_SESSION['usuario']);
    session_destroy();
}
=======
<?php

session_start();
if (isset($_SESSION['usuario'])) {
    unset($_SESSION['usuario']);
    session_destroy();
}
>>>>>>> 41d826ab17f3648489a66f0916c3dcaf147a6990
header("Location: ../index.php");