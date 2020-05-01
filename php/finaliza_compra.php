<?php
    include "conexao_pdo.php";
    $codigo=$_GET["codigo"];
    $cpf=$_GET["cpf"];

    $sth = $link->prepare('INSERT into cupom_cliente (codigo, cpf) values (:codigo, :cpf)');

    $sth->bindValue(':codigo', $codigo, PDO::PARAM_INT);
    $sth->bindValue(':cpf', $cpf, PDO::PARAM_STR);
    $sth->execute();
    header('Location:meusCupons.php');
?>