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
            $_SESSION["Email"] = $_POST["EmailLogin"];
            $_SESSION["Senha"] = $_POST["SenhaLogin"];
            $_SESSION["checkLogin"]=$_POST["checkLogin"];

            $EmailLogar = $_SESSION["Email"];
            $SenhaLogar = $_SESSION["Senha"];

            $clientes=simplexml_load_file("cliente.xml");
            $empresas=simplexml_load_file("empresas.xml");

            if($_SESSION["checkLogin"]==1){
                foreach($clientes->children() as $cliente){
                    if(($EmailLogar==$cliente->email)&&($SenhaLogar==$cliente->senha)){
                        $aux=1;
                        break;
                    }
                }
            }else{
                foreach($empresas->children() as $proprietario){
                    if(($EmailLogar==$proprietario->email)&&($SenhaLogar==$proprietario->senha)){
                        $aux=2;
                        break;
                    }
                }
            }

            if($aux==1){
                $_SESSION["cliente"]=true;
                header ("Location: homeUsuario.php");
            }else if($aux==2){
                $_SESSION["empresa"]=true;
                header ("Location: homeEmpresa.php");
            }else{
        ?>
        <script>
            window.location.href="../index.php";
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
