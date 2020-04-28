<?php
    session_start();

    if($_SESSION["tabela"]!='cliente'){
        session_destroy();
        header("location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <title> Loja - Cupons </title>
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
                include "../inc/PainelFIS.php";
            ?>
            <!-- Conteúdo -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button style="background-color:#FFDB58;" class="btn btn-md btn-warning" id="menu-toggle">
                        <span class="navbar-toggler-icon"></span><!--Não há necessidade de escrever painel,os tres traços já deixa subentendido-->
                    </button>
                </nav>

                <div class="container-fluid" style="margin-top:1%; font-size: 1.125rem; text-anchor: middle;">
                    <main role="main">
                            <div style="background-color: #333;" class="jumbotron">
                                <div style="color: white;"class="container">
                                    <h1 class="display-3 text-bold font-weight-normal">Cupons</h1>
                                </div>
                            </div>
                        <div class="container aling-center" style="margin-rigth:2%;">
                        <div class="row">
                                <?php
                                    include "conexao_pdo.php";

                                    $sth = $link->prepare('SELECT *
                                        FROM cupom
                                        ORDER BY titulo');

                                    $sth->execute();

                                    if($sth->rowCount()){
                                        $preco=0;

                                        while($linha=$sth->fetch()){
                                            $preco = $linha['valor'] - ($linha['valor'] * ($linha['desconto']/100));

                                            echo'
                                                <div class="col-md-4">
                                                    <div class="card mb-4 shadow-sm">
                                                        <img src="../imgCupom/'.$linha['imagemcupom'].'" class="card-img" width="100%" height="100%" >
                                                        <div class="card-body">
                                                        <p class="card-text"><h5 class="card-title">'.$linha['titulo'].'</h5></p>
                                                            <h4 class="card-title">Desconto:'.$linha['desconto'].'%</h4>
                                                            <div class="card-title">De:
                                                                <h5  style="color:red; text-decoration:line-through;" class="valor">R$'.$linha['valor'].'</h5>Por:
                                                                <h5 style="color:green;" class="novoValor">R$'.$preco.'</h5>
                                                            </div>
                                                            <p class="card-text ">'.$linha['descricao'].'</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group">
                                                                <a href="#"style="background-color:#FFDB58; color:white;"class="btn btn-warning btn-lg">Comprar</a>
                                                            </div>
                                                            <small class="text-muted">Duração de 6 meses</small>
                                                        </div>
                                                        </div>
                                                    </div>
<<<<<<< HEAD
                                                </div>
=======
                                                </div>  
>>>>>>> 43dfb3568ecd8938c4cfd033cffd28f8e7f1c46b
                                            ';
                                        }
                                    }else{
                                        echo '<tr><td colspan="6"><h2 class=" display-5 text-center">Nenhum cupom cadastrado</h2></td></tr>';
                                    }
                                ?>
                        </div>
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
