<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Cadastro </title>
        <link rel="shortcut icon" href="../images/logo.png" >
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/estilo.min.css" />
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
    </head>
    <body>
        <!-- Menu -->
        <?php
            include "../inc/menu.inc";
        ?>

        <?php
            session_start();

            include "conexao_pdo.php";

            $nome=$_POST["nome"];
            $cpf=$_POST["cpf"];
            $email=$_POST["email"];
            $senha=$_POST["senha"];

            $sth = $link->prepare('INSERT into cliente (nome, cpf, email, senha)
            values (:nome, :cpf, :email, :senha)');

            $sth->bindValue(':nome', $nome, PDO::PARAM_STR);
            $sth->bindValue(':cpf', $cpf, PDO::PARAM_STR);
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
            $sth->bindValue(':senha', $senha, PDO::PARAM_STR);
            $sth->execute();

            header('Location: ../index.php');
        ?>

        <!-- Rodapé -->
        <?php
            include "../inc/rodape.inc";

            include "../inc/ModalContato.inc";
        ?>

        <?php
            include "../inc/funcoes.inc";
        ?>
    </body>
</html>
