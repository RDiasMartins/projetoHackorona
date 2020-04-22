<?php
    session_start();

    if($_SESSION["tabela"]!='empresa'){
        session_destroy();
        header("location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <title> Empresa - Perfil </title>
        <link rel="shortcut icon" href="../images/logo.png" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/estilo.min.css" />
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
    </head>
    <body>
        <?php
            include "conexao_pdo.php";

            $cpf=$_SESSION["cpf"];
            $cnpj=$_SESSION["cnpj"];
            $email=$_SESSION["EmailLogado"];
            $nome=$_SESSION["NomeProprietario"];
            $nome_fantasia=$_SESSION["nome_fantasia"];
            $endereco=$_SESSION["endereco"];
        ?>

        <!--Menu-->
        <div class="d-flex" id="wrapper">
            <?php
                include "../inc/PainelJUR.php";
            ?>

            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button style="background-color:#FFDB58;" class="btn btn-md btn-warning" id="menu-toggle">
                        <span class="navbar-toggler-icon"></span><!--Não há necessidade de escrever painel,os tres traços já deixa subentendido-->
                    </button>
                </nav>

                <!--Conteúdo-->
                <div class="container-fluid">
                    <nav style="margin-top:50px;">
                        <p style="padding-left:25%"><img src="../images/perfil.png" width="60px" height="60px"></p>
                        <h3 style="padding-left:25%;"> <?php echo"$nome_fantasia"; ?> </h3>
                    </nav>
                    <div class = "row pb-3" style=" width:80%; margin-left:10%">
                        <div class = "col-lg-8 offset-lg-2">
                            <section class="node_category" style="border: 1px solid silver;">
                            <br/>
                                <ul style="list-style-type: none; padding-top:0%;">
                                    <li class="contentnode">
                                        <dl>
                                            <dt> CNPJ </dt>
                                            <dd><?php echo"$cnpj"; ?></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt> Proprietário </dt>
                                            <dd><?php echo"$nome" ?></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt> E-mail </dt>
                                            <dd><?php echo"$email" ?></dd>
                                        </dl>
                                        <dl>
                                            <dt> CPF </dt>
                                            <dd><?php echo"$cpf" ?></dd>
                                        </dl>
                                    </li>
                                </ul>
                                <br/>
                            </section>
                        </div>
                    </div>
                    <div class = "row pb-3" style=" width:80%; margin-left:10%">
                        <div class = "col-lg-8 offset-lg-2">
                            <div class="page-content" style=" border: 1px solid silver;">
                            <br/>
                                <ul style="list-style-type: none; padding-top:0%;">
                                    <li class="contentnode">
                                        <dl>
                                            <dt> Endereço </dt>
                                            <dd><?php echo"$endereco"; ?></dd>
                                        </dl>
                                    </li>
                                    <br/>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
