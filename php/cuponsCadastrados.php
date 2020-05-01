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
                        <!-- Formulário de filtragem -->
                        <?php include "conexao_pdo.php"; ?>
                            <div style="color:white; background-color: #333;" class="jumbotron">
                                <form name="filtroCupom" method="GET">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-4">
                                            <label>Preço </label> <br/>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio"  id="filtroPreco" value="Normal" name="filtroPreco" class="custom-control-input" onchange="document.filtroCupom.submit()">
                                                <label class="custom-control-label" for="filtroPreco">Normal</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="filtroPreco2" value="Maior" name="filtroPreco" class="custom-control-input" onchange="document.filtroCupom.submit()">
                                                <label class="custom-control-label" for="filtroPreco2">Maior</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="filtroPreco3" value="Menor" name="filtroPreco" class="custom-control-input" onchange="document.filtroCupom.submit()">
                                                <label class="custom-control-label" for="filtroPreco3">Menor</label>
                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <label>Categoria </label>
                                            <select class="custom-select" name="filtroCat" onchange="document.filtroCupom.submit()">
                                                    <option value="Todas">Todas</option>
                                                <?php
                                                    $sth=$link->prepare('SELECT DISTINCT(categoria) as cat from empresa');

                                                    $sth->execute();

                                                    while($linha=$sth->fetch()){
                                                        echo'<option';

                                                        if(isset($_GET["filtroCat"])){
                                                            if($_GET["filtroCat"]==$linha['cat']){
                                                                echo' selected';
                                                            }
                                                        }

                                                        echo' value="'.$linha['cat'].'">';

                                                        if($linha['cat']=='beleza_saude'){
                                                            echo'Beleza/Saude';
                                                        }else if($linha['cat']=='comercio'){
                                                            echo'Comércio';
                                                        }else if($linha['cat']=='gastronomia'){
                                                            echo'Gastronomia';
                                                        }else if($linha['cat']=='entretenimento'){
                                                            echo'Entretenimento';
                                                        }else if($linha['cat']=='viagem'){
                                                            echo'Viagem';
                                                        }

                                                        echo'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <label>Cidade </label>
                                            <select class="custom-select" name="filtroCid" onchange="document.filtroCupom.submit()">
                                                <option value="Todas">Todas</option>
                                                <?php
                                                    $sth=$link->prepare('SELECT DISTINCT(cidade) as c from empresa');

                                                    $sth->execute();

                                                    while($linha=$sth->fetch()){
                                                        echo'<option';

                                                        if(isset($_GET["filtroCid"])){
                                                            if($_GET["filtroCid"]==$linha['c']){
                                                                echo' selected';
                                                            }
                                                        }

                                                        echo'>'.$linha['c'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <br/>
                    <div class="container-fluid" style="margin-rigth:2%;">
                        <div class="row">
                                <?php
                                    $consulta='SELECT * FROM cupom INNER JOIN empresa ON cupom.empresa=empresa.cnpj';
                                    $flagWhere=false;

                                    if(isset($_GET["filtroCid"])){
                                        if($_GET["filtroCid"]!='Todas'){
                                            if(!$flagWhere){
                                                $consulta.=" WHERE empresa.cidade = '".$_GET["filtroCid"]."'";
                                                $flagWhere=true;
                                            }else{
                                                $consulta.="  AND empresa.cidade = '".$_GET["filtroCid"]."'";
                                            }

                                        }
                                    }

                                    if(isset($_GET["filtroCat"])){
                                        if($_GET["filtroCat"]!='Todas'){
                                            if(!$flagWhere){
                                                $consulta.=" WHERE empresa.categoria = '".$_GET["filtroCat"]."'";
                                                $flagWhere=true;
                                            }else{
                                                $consulta.=" AND empresa.categoria = '".$_GET["filtroCat"]."'";
                                            }

                                        }
                                    }

                                    if(isset($_GET["filtroPreco"])){
                                        if($_GET["filtroPreco"]!='Normal'){
                                            if($_GET["filtroPreco"]=='Menor'){
                                                $consulta.=' ORDER BY valor asc';
                                            }

                                            if($_GET["filtroPreco"]=='Maior'){
                                                $consulta.=' ORDER BY valor desc';
                                            }
                                        }
                                    }

                                    $sth = $link->prepare($consulta);

                                    $sth->execute();

                                    //Exibição dos cupons
                                    if($sth->rowCount()){
                                        $preco=0;

                                        while($linha=$sth->fetch()){
                                            $preco = $linha['valor'] - ($linha['valor'] * ($linha['desconto']/100));

                                            echo'
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="card mb-4 shadow-sm">
                                                        <img src="../imgCupom/'.$linha['imagemcupom'].'" class="card-img" width="100%" height="100%" >
                                                        <div class="card-body">
                                                        <p class="card-text"><h4 class="card-title">'.$linha['titulo'].'</h5></p>
                                                            <h5 class="card-title">Desconto: '.$linha['desconto'].'%</h4>
                                                            <div class="card-title">De:
                                                                <h5  style="color:red; text-decoration:line-through;" class="valor">R$'.$linha['valor'].'</h5>Por:
                                                                <h5 style="color:green;" class="novoValor">R$'.$preco.'</h5>
                                                            </div>
                                                            <p class="card-text ">'.$linha['descricao'].'</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group">
                                                                <button style="background-color:#FFDB58; color:white;" class="btn" data-toggle="modal" data-target="#ModalCompra">
                                                                    Comprar
                                                                </button>
                                                            </div>
                                                            <small class="text-muted">Duração de 6 meses</small>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            ';
                                        }
                                    }else{
                                        echo '<div class="container">
                                                <h2 class=" display-5 text-center">NENHUM CUPOM ENCONTRADO</h2>
                                            </div>
                                            ';
                                    }
                            
                                echo'<div class="modal fade" id="ModalCompra" tabindex="-1" role="dialog" aria-labelledby="ModalCompra" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <center>
                                                    <h5 class="modal-title" id="ModalTitulo2">&nbsp; Cpmpra</h5>
                                                </center>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>Você deseja finalizar a compra?</h3>
                                                <div class = "float-right">
                                                    <a class="btn btn-md btn-warning" href="cuponsCadastrados.php" role="button">Cancelar</a>
                                                    <a class="btn btn-md btn-warning" href="finaliza_compra.php?codigo='.$linha['codigo'].'&cpf='.$_SESSION['cpf'].'" role="button">Finalizar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
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
