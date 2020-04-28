<?php
    session_start();

    unset($_SESSION["tabela"]);

    session_destroy();

    header("Location: ../index.php");
?>
