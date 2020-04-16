<?php
    session_start();

    if(!isset($_SESSION["empresa"])){
        header("location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <title> Home - Empresa </title>
        <link rel="shortcut icon" href="../images/logo.png" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/estilo.min.css" />
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
    </head>
    <body>
        <!-- Menu -->
        <?php
            include "../inc/menuJUR.inc";
        ?>

        <div class="container-fluid" style="margin-top:1%; font-size: 1.125rem; text-anchor: middle;">
           <?php
                include "../inc/PainelJUR.inc";
           ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-3">Seja Bem Vindo!!</h1>
                    <p> Venha fazer parte desta grande parceria, nos lhe ajudaremos a impulsionar o seu negocio, esse é o seu momento.</p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Começar &raquo;</a></p>
                </div>
            </div>
            <canvas class="my-4 w-100" id="myChart" width="800" height="110"></canvas>
        </main>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
