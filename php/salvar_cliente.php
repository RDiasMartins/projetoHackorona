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
            include "../inc/funcoes.inc";
            session_start();
            $nome=$_POST["nome"];
            $email=$_POST["email"];
            $senha=$_POST["senha"];
            if(file_exists("cliente.xml")){
                $xml=simplexml_load_file("cliente.xml");
                $achou = false;
                foreach($xml->children() as $cliente){
                    if($email == $cliente->email){
                        $achou = true;
                        break;
                    }
                }
                if($achou){
                    $_SESSION["conf_email"]=false;
                    header("Location:cadastro_cliente.php");
                }else{
                   cadastrar_cliente();
                }
            }else{
                cadastrar_cliente();
            }
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
