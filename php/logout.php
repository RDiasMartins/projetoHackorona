<?php
    session_start();

    unset($_SESSION["Email"]);
    unset($_SESSION["Senha"]);

    session_destroy();

    header("Location: ../index.php");
?>
