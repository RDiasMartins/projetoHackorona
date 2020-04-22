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
                        <span class="navbar-toggler-icon"></span>
                        Painel
                    </button>
                </nav>
                <div class="container-fluid" style="margin-top:1%; font-size: 1.125rem; text-anchor: middle;">
                    <main role="main">
                        <div class="container aling-center" style="margin-top:5%; margin-rigth:2%;">
                        <?php
                            if($_SESSION["tabela"]=='cliente'){
                                include "../inc/cuponsCliente.inc";
                            }
                            else{
                                include "../inc/cuponsEmp.inc";
                            }
                        ?>
                        <?php
                                /*include "conexao_pdo.php";

                                $sth = $link->prepare('SELECT *
                                    FROM cupom
                                    ORDER BY titulo');

                                $sth->execute();

                                if($sth->rowCount()){
                                    $preco=0;

                                    while($linha=$sth->fetch()){
                                        $preco = $linha['valor'] - ($linha['valor'] * ($linha['desconto']/100));

                                        echo'
                                            <div class="card mb-3" style="max-width: 1000px;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <img src="../imgCupom/'.$linha['imagemcupom'].'" class="card-img" width="100%" height="100%" >
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">'.$linha['titulo'].'</h5>
                                                            <h5 class="card-title">R$'.$preco.'</h5>
                                                            <p class="card-text ">'.$linha['descricao'].'</p>
                                                            <a href="#"style="background-color:#FFDB58; color:white;"class="btn btn-warning btn-lg">Comprar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                        ';
                                    }
                                }else{
                                    echo '<tr><td colspan="6"><h2 class=" display-5 text-center">Nenhum cupom cadastrado</h2></td></tr>';
                                }*/
                            ?>
                        </div>
                    </main>
                </div>
            </div>

        <?php
            include "../inc/funcoes.inc";
        ?>
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
