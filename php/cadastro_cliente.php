<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Cadastro - Cliente </title>
    <link rel="shortcut icon" href="../images/logo.png" >
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.min.css" />
    <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>

</head>
<body>
    <!-- Menu -->
    <?php
        include "../inc/menu_cadastro.inc";
    ?>
    <br/> <br/>

    <!-- Conteúdo -->

    <div style="font-size: 1.125rem; text-anchor: middle;">
        <main role="main">
            <div style="background-color: #333;" class="jumbotron">
                <div style="color: white;"class="container">
                    <h2 class="display-3 text-bold font-weight-normal titulo<?=$dispositivo;?>">Cadastro de usuário</h2>
                    <p class="float-right">Cadastre sua empresa
                        <a class="btn btn-warning btn-sm" href="../php/cadastro_empresa.php">Aqui</a>
                    </p>
                </div>
            </div>
        </main>
    </div>

    <div class="container-fluid ">
        <?php
            if(empty($_POST)){
        ?>
            <form class="form formCliente" action = "cadastro_cliente.php" method = "POST" style="margin-left:3%;">
                <div class = "row" style="width:100%;">
                    <div class = " form-group col-lg-4 offset-lg-1    col-sm-8 offset-sm-1" style="position:relative;">
                        <label style="padding-top:5%"> Nome completo: </label>
                        <input type="text" name="nome" id="nome" class="form-control" required="required;"/>
                    </div>

                    <div class = "form-group col-lg-4 offset-lg-1    col-sm-8 offset-sm-1"  style="position:relative;">
                        <label style="padding-top:5%"> CPF: </label>
                        <input type="text" name="cpf" id="cpf" class="form-control cpf" required="required"/>
                    </div>
                </div>
                <div class = "row" style="width:100%;">
                    <div class = "form-group col-lg-4 offset-lg-1   col-sm-8 offset-sm-1" style="position:relative;">
                        <label style="padding-top:5%"> Email: </label>
                        <input type="email" name="email" id="email" class="form-control email" required="required" placeholder="nome@email.com"/>

                        <label style="padding-top:5%"> Confirmação: </label>
                        <input type="email" name="email" id="conf_email" class="form-control email" required="required" placeholder="nome@email.com"/>
                    </div>
                    <div class = "form-group col-lg-2 offset-lg-1    col-sm-8 offset-sm-1" style="position:relative;">
                        <label style="padding-top:10%"> Senha: </label>
                        <input type="password" name="senha" id="senha" class="form-control password" required="required"/>
                    </div>
                    <div class = "form-group col-lg-2 offset-lg-0    col-sm-8 offset-sm-1">
                        <label style="padding-top:10%"> Confirme a senha: </label>
                        <input type="password" name="senha" id="conf_senha" class="form-control password" required="required"/>
                    </div>
                </div>
                <div class = "row" style="width:100%;">
                    <div class = "col offset-lg-9 offset-sm-7">
                        <p style="padding-top:40px; position:absolute;"><button type="submit" class="btn btn-warning">Cadastrar</button></p>
                    </div>
                </div>
            </form>
        <?php
            }
            else{
                session_start();

                include "conexao_pdo.php";

                $nome=$_POST["nome"];
                $cpf=$_POST["cpf"];
                $email=$_POST["email"];
                $senha=$_POST["senha"];

                $sth = $link->prepare("SELECT cpf from cliente WHERE email=:email");
                $sth -> bindValue(":email", $email);

                $sth -> execute();

                if($sth->rowCount()>0){
                    //Fazer verificação de email cadastrado
                }else{
                    $sth = $link->prepare('INSERT into cliente (nome, cpf, email, senha)
                    values (:nome, :cpf, :email, :senha)');

                    $sth->bindValue(':nome', $nome, PDO::PARAM_STR);
                    $sth->bindValue(':cpf', $cpf, PDO::PARAM_STR);
                    $sth->bindValue(':email', $email, PDO::PARAM_STR);
                    $sth->bindValue(':senha', $senha, PDO::PARAM_STR);
                    $sth->execute();

                    header('Location: ../index.php');
                }
            }
        ?>
    </div>

    <!-- Rodapé -->
    <?php
        include "../inc/rodape.inc";
        include "../inc/ModalContato.inc";

    ?>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/validaform.min.js"></script>
</body>
</html>
