<?php
function cadastrar_cliente(){
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
        echo'<h2 style="padding:10% 0% 10% 0%;">Cadastro realizado com sucesso!</h2>';
    }else{
        $xml=simplexml_load_file("cliente.xml");
        $cliente=$xml->addChild("cliente");
        $cliente->addChild("nome", $nome);
        $cliente->addChild("email", $email);
        $cliente->addChild("senha", $senha);
        file_put_contents("cliente.xml", $xml->asXML());
        echo'<h2>Cadastro realizado com sucesso!</h2>';
    }
}
?>