<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Projeto</title>
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
    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $senha=$_POST["senha"];

    if(!file_exists("cliente.xml")){
$xml=
'<?xml version="1.0" encoding="UTF-8"?>
<clientes>
    <cliente>
        <nome>'.$nome.'</nome>
        <email>'.$email.'</email>
        <senha>'.$senha.'</senha>
    </cliente>
</clientes>';
        file_put_contents("cliente.xml",$xml);
        echo'<h2>Cadastro realizado com sucesso!</h2>';
    }else{
        $xml=simplexml_load_file("cliente.xml");
            $cliente=$xml->addChild("cliente");
            $cliente->addChild("nome", $nome);
            $cliente->addChild("email", $email);
            $cliente->addChild("telefone", $telefone);
            $cliente->addChild("data", $data);
            $cliente->addChild("hora", $hora);
            file_put_contents("cliente.xml", $xml->asXML());
            echo'<h2>Cadastro realizado com sucesso!</h2>';
    }
?>

<!-- Rodapé -->
<?php
    include "../inc/rodape.inc";

    include "../inc/ModalContato.inc";
?>
</body>
</html>