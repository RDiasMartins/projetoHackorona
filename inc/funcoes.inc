<?php

    function cadastrar_cliente(){
        $nome=$_POST["nome"];
        $cpf=$_POST["cpf"];
        $email=$_POST["email"];
        $senha=$_POST["senha"];

        if(!file_exists("cliente.xml")){
$xml=
'<?xml version="1.0" encoding="UTF-8"?>
<clientes>
    <cliente>
        <nome>'.$nome.'</nome>
        <cpf>'.$cpf.'</cpf>
        <email>'.$email.'</email>
        <senha>'.$senha.'</senha>
    </cliente>
</clientes>';
            file_put_contents("cliente.xml",$xml);
            echo'<h2 style="padding:10% 0% 10% 0%;"> Cadastro realizado com sucesso. </h2>';
        }else{
            $xml=simplexml_load_file("cliente.xml");
            $cliente=$xml->addChild("cliente");
            $cliente->addChild("nome", $nome);
            $cliente->addChild("cpf", $cpf);
            $cliente->addChild("email", $email);
            $cliente->addChild("senha", $senha);
            file_put_contents("cliente.xml", $xml->asXML());
            echo'<h2 style="padding:10% 0% 10% 0%;">Cadastro realizado com sucesso.</h2>';
        }
    }

    function buscarCodigo($entidade) {
    if (file_exists("sequencia_codigos.xml")) {
        $xml = simplexml_load_file("sequencia_codigos.xml");
        switch ($entidade) {
            case "cupon":
                return $xml-> cupon;
                break;
        }
    }
    else {
    $xml =
'<?xml version="1.0" encoding="UTF-8" ?>
    <codigos>
        <cupon>1</cupon>
    </codigos>';

            file_put_contents("sequencia_codigos.xml", $xml);
                return 1;
        }
    }

    function atualizarCodigo($entidade){
        if(file_exists("sequencia_codigos.xml")){
            $xml = simplexml_load_file("sequencia_codigos.xml");
            switch($entidade){
                case "cupon":
                    $xml-> cupon++;
                    break;
                case "usuario":
                    $xml-> usuario++;
                    break;
            }
            file_put_contents("sequencia_codigos.xml", $xml->asXML());
        }
    }

 function cadastrarCupon(){
        $codigo = $_POST["codigo"];
        $titulo  = $_POST["titulo"];
        $descricao   = $_POST["descricao"];
        $valor = $_POST["valor"];
        $desconto    = $_POST["desconto"];

         $alterar =$_POST["alterar"];
        if(!file_exists("cupons.xml")){
            $xml =
'<?xml version="1.0" encoding="UTF-8"?>
<cupons>
    <cupon>
        <codigo>'. $codigo .'</codigo>
        <titulo>'. $titulo .'</titulo>
        <descricao>'. $descricao .'</descricao>
        <valor>'. $valor .'</valor>
        <desconto>'. $desconto .'</desconto>
    </cupon>
</cupons>';
            file_put_contents("cupons.xml", $xml);
            atualizarCodigo("cupon");
            echo '<div class="container center" style="margin-top:5%;">
                    <h2 class="text-center">Cupom cadastrado com sucesso!</h2>
                    <br/>
                    <div class="float-right">
                        <a href="cadastroCupons.php"style="background-color:#FFDB58; color:white;"class="btn btn-warning btn-lg">Novo cupom</a>
                    </div>
            </div>';
        }else{
            $xml=simplexml_load_file("cupons.xml");

                $cupons = $xml->addChild("cupon");
                $cupons->addChild("codigo", $codigo);
                $cupons->addChild("titulo", $titulo);
                $cupons->addChild("descricao", $descricao);
                $cupons->addChild("valor", $valor);
                $cupons->addChild("desconto", $desconto);
                atualizarCodigo("cupon");
               echo '<div class="container center" style="margin-top:5%;">
                    <h2 class="text-center">Cupom cadastrado com sucesso!</h2>
                    <br/>
                    <div class="float-right">
                        <a href="cadastroCupons.php"style="background-color:#FFDB58; color:white;"class="btn btn-warning btn-lg">Novo cupom</a>
                    </div>

            </div>';

            file_put_contents("cupons.xml", $xml->asXML());
        }
        return true;
    }
    function buscarCupon($codigo){
        if(file_exists("cupons.xml")){
            $xml = simplexml_load_file("cupons.xml");
            foreach($xml->children() as $cupon){
                if($cupon->codigo == $codigo){
                    return true;
                }
            }
        }
    }

?>
