<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
        <title> Validação de login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/login.css" />
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
    </head>
    <body>
        <?php
            include "conexao_pdo.php";

            $EmailLogar = $_POST["EmailLogin"];
            $SenhaLogar = $_POST["SenhaLogin"];

            $checkLogin = $_POST["checkLogin"];

            if($checkLogin==1){
                $_SESSION["tabela"]='cliente';
                $coluna='cpf';

            }else{
                $_SESSION["tabela"]='empresa';
                $coluna='cnpj';
            }

            $sth = $link->prepare('SELECT cpf
                FROM cliente
                WHERE email =:email and senha=:senha');
            $sth->bindValue(':email', $EmailLogar, PDO::PARAM_INT);
            $sth->bindValue(':senha', $SenhaLogar, PDO::PARAM_STR);
            $sth->execute();

            $linha=$sth->fetch();

            if($linha){
                $_SESSION[$tabela]=$linha[$coluna];

                if($_SESSION["tabela"]=='cliente'){
                    header('Location: homeUsuario.php');
                }else{
                    header('Location: homeEmpresa.php');
                }
            }else{
        ?>
        <script>
            window.location.href= "../index.php";
            window.alert("Usuário inválido!");
        </script>
        <?php
            }

        ?>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/validaform.min.js"> </script>
    </body>
</html>
