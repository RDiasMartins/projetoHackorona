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

        <!-- Conteúdo -->
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



                    $sth = $link->prepare('INSERT into cupom (titulo, descricao, valor, desconto, imagemcupom) values (:titulo, :descricao, :valor, :desconto, :imagemcupom)');

                    $sth->bindValue(':titulo', $titulo, PDO::PARAM_INT);
                    $sth->bindValue(':descricao', $descricao, PDO::PARAM_STR);
                    $sth->bindValue(':valor', $valor, PDO::PARAM_STR);
                    $sth->bindValue(':desconto', $desconto, PDO::PARAM_STR);
                    $sth->bindValue(':imagemcupom', $imagem, PDO::PARAM_STR);
                    $sth->execute();

                }
            ?>

        <!-- Rodapé -->
        <?php
            include "../inc/rodape.inc";

            include "../inc/ModalContato.inc";
        ?>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
