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
                    <h2 class="display-3 text-bold font-weight-normal">Cadastro de usuário</h2>
                </div>
            </div>
        </main>
    </div>

    <div class="container ">
        <?php
            if(empty($_POST)){
        ?>
            <form class="form formCliente" action = "cadastro_cliente.php" method = "POST" >
                <div class = "row">
                    <div class = "form-group col-lg-2 col-sm-4 ">
                        <label> CPF </label>
                        <input type="text" name="cpf" id="cpf" class="form-control cpf" required="required" placeholder="000.000.000-00"/>
                    </div>
                    <div class = "form-group col-lg-10 col-sm-8">
                        <label> Nome completo </label>
                        <input type="text" name="nome" id="nome" class="form-control" required="required;"/>
                    </div>
                </div>
                <div class = "row">
                    <div class = "form-group col-lg-6 col-sm-6">
                        <label> Email </label>
                        <input type="email" name="email" id="email" class="form-control email" required="required" placeholder="exemplo@email.com"/>
                    </div>
                    <div class="form-group col-lg-6 col-sm-6">
                        <label> Confirmação </label>
                        <input type="email" name="email" id="conf_email" class="form-control email" required="required" placeholder="exemplo@email.com"/>
                    </div>
                </div>
                <div class = "row">
                    <div class = "form-group col-lg-6 col-sm-6">
                        <label> Senha: </label>
                        <input type="password" name="senha" id="senha" class="form-control password" required="required"/>
                    </div>
                    <div class = "form-group col-lg-6  col-sm-6">
                        <label> Confirme a senha </label>
                        <input type="password" name="senha" id="conf_senha" class="form-control password" required="required"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <button type="submit" class="btn btn-dark btn-block">Cadastrar</button>
                    </div>
                </div>
            </form>
    </div>
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
