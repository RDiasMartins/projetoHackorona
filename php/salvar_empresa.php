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

            $razao_social=$_POST["razao_social"];
            $nomef=$_POST["nomef"];
            $cnpj=$_POST["cnpj"];
            $categoria=$_POST["categoria"];
            $cep=$_POST["cep"];
            $estado=$_POST["estado"];
            $cidade=$_POST["cidade"];
            $bairro=$_POST["bairro"];
            $rua=$_POST["rua"];
            $numero=$_POST["numero"];
            $nome=$_POST["nome"];
            $cpf=$_POST["cpf"];
            $email=$_POST["email"];
            $senha=$_POST["senha"];


            $sth = $link->prepare('INSERT into empresa (razao_social, nomef, cnpj, categoria, cep, estado, cidade, bairro, rua, numero, nome, cpf, email, senha) 
            values (:razao_social, :nomef, :cnpj, :categoria, :cep, :estado, :cidade, :bairro, :rua, :numero, :nome, :cpf, :email, :senha)');

            $sth->bindValue(':razao_zocial', $razao_zocial, PDO::PARAM_STR);
            $sth->bindValue(':nomef', $nomef, PDO::PARAM_STR);
            $sth->bindValue(':cnpj', $cnpj, PDO::PARAM_INT);
            $sth->bindValue(':categoria', $categoria, PDO::PARAM_STR);
            $sth->bindValue(':cep', $cep, PDO::PARAM_INT);
            $sth->bindValue(':estado', $estado, PDO::PARAM_STR);
            $sth->bindValue(':cidade', $cidade, PDO::PARAM_STR);
            $sth->bindValue(':bairro', $bairro, PDO::PARAM_STR);
            $sth->bindValue(':rua', $rua, PDO::PARAM_STR);
            $sth->bindValue(':numero', $numero, PDO::PARAM_INT);
            $sth->bindValue(':nome', $nome, PDO::PARAM_STR);
            $sth->bindValue(':cpf', $cpf, PDO::PARAM_INT);
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
