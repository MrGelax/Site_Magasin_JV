<!--Fin de l'authentification-->
<?php
    session_destroy();
    unset($_SESSION);
    header("Location:index.php");
    exit();
?>

