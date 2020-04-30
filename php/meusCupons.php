<?php
    session_start();

    if(($_SESSION["tabela"]!='empresa')&&($_SESSION["tabela"]!='cliente')){
        session_destroy();
        header("location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <title> Meus Cupons </title>
        <link rel="shortcut icon" href="../images/logo.png" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/estilo.min.css" />
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
    </head>
    <body>

        <!-- Menu -->
        <div class="d-flex" id="wrapper">
            <?php
                if($_SESSION["tabela"]=='cliente'){
                    include "../inc/PainelFIS.php";
                }
                else{
                    include "../inc/PainelJUR.php";
                }

            ?>
            <!-- Conteúdo -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button style="background-color:#FFDB58;" class="btn btn-md btn-warning" id="menu-toggle">
                        <span class="navbar-toggler-icon"></span><!--Não há necessidade de escrever painel,os tres traços já deixa subentendido-->
                    </button>
                </nav>

                <div class="container-fluid" style="margin-top:1%; font-size: 1.125rem; text-anchor: middle;">
                    <div style="background-color: #333;" class="jumbotron">
                        <div style="color: white;"class="container">
                            <h1 class="display-3 text-bold font-weight-normal"> Inventário </h1>
                            <p> Atenção aos prazos de validade! </p>
                        </div>
                    </div>
                    <main role="main">
                        <div class="container align-center" style="margin-left:0;">
                        <?php
                            if($_SESSION["tabela"]=='cliente'){
                                include "../inc/cuponsCliente1.php";
                            }
                            else{
                                include "../inc/cuponsEmp1.php";
                            }
                            /*if($_SESSION["tabela"]=='cliente'){
                                include "../inc/cuponsCliente.inc";
                            }
                            else{
                                include "../inc/cuponsEmp.inc";
                            }*/
                        ?>
                        <?php

                            ?>
                        </div>
                    </main>
                </div>
            </div>
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </body>
</html>
