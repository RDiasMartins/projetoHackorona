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
        <title> Cadastro de Cupons </title>
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
                include "../inc/PainelJUR.php";
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
                            <div style="color: white;" class="container">
                                <h1 class="display-3 text-bold font-weight-normal">Cadastro de cupons</h1>
                            </div>
                        </div>
                        <div class="container aling-center" style="margin-top:5%; margin-rigth:2%;">
                            <?php
                                if(empty($_POST)){
                                    include "../inc/form_cupon.inc";
                                }else{
                                    include "conexao_pdo.php";

                                    $imagem=@date('Ymdhis') . md5($_FILES['imagemCupom']['name']) . '.' . substr($_FILES['imagemCupom']['name'], '-3');

                                    $destino = '../imgCupom/' . $imagem;

                                    $arquivo_tmp = $_FILES['imagemCupom']['tmp_name'];

                                    move_uploaded_file( $arquivo_tmp, $destino  );

                                    $titulo= $_POST["titulo"];
                                    $descricao= $_POST["descricao"];
                                    $valor=$_POST["valor"];
                                    $desconto=$_POST["desconto"];
                                    $data_venda=$_POST["data_venda"];
                                    $empresa=$_SESSION["cnpj"];


                                    $sth = $link->prepare('INSERT into cupom (titulo, descricao, valor, desconto, imagemcupom, data_venda, empresa) values (:titulo, :descricao, :valor, :desconto, :imagemcupom, :data_venda, :empresa)');

                                    $sth->bindValue(':titulo', $titulo, PDO::PARAM_INT);
                                    $sth->bindValue(':descricao', $descricao, PDO::PARAM_STR);
                                    $sth->bindValue(':valor', $valor, PDO::PARAM_STR);
                                    $sth->bindValue(':desconto', $desconto, PDO::PARAM_STR);
                                    $sth->bindValue(':imagemcupom', $imagem, PDO::PARAM_STR);
                                    $sth->bindValue(':data_venda', $data_venda, PDO::PARAM_STR);
                                    $sth->bindValue(':empresa', $empresa, PDO::PARAM_STR);
                                    $sth->execute();

                                    header ('Location: cadastroCupons.php');

                                }
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
