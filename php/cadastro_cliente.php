<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto</title>
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

    <?php
        if(isset($_SESSION["conf_email"])){
            if(!$_SESSION["conf_email"]){
                echo'
                    <div class="alert alert-warning " role="alert">
                         <strong>E-mail já cadastrado!</strong> Tente novamente com outro endereço.
                    </div>
                ';
                $_SESSION["conf_email"]=true;
            }
        }
    ?>
    <div class = "row">
        <div class = "col-lg-2 offset-lg-9" style="position:absolute; margin-top:6%; text-align:center; background-color: #F5F5F5; border: 1px solid silver;">
            <p> Tem um estabelecimento e quer fazer negócio conosco? <br/><b>Cadastre-se aqui:</b></p>
            <a type="button" class="btn btn-primary" href="cadastro_empresa.php" style="margin-bottom:12px;">Aqui</a>
        </div>
    </div>
    <div class = "row">
        <div class = "col-lg-4 offset-lg-4   col-sm-5 offset-sm-3">
            <h2 style="font-family:consolas;" class="h2_cad">Cadastre-se</h2>
            <form class="form formCliente" action = "salvar_cliente.php" method = "POST">
                <div class = "row">
                    <div class = "col-lg-7 offset-lg-2    col-sm-8 offset-sm-1">
                        <label style="padding-top:5%"> Nome: </label>
                        <input type="text" name="nome" id="nome" class="form-control" required="required"/>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-lg-7 offset-lg-2    col-sm-8 offset-sm-1">
                        <label style="padding-top:5%"> CPF: </label>
                        <input type="text" name="cpf" id="cpf" class="form-control cpf" required="required"/>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-lg-7 offset-lg-2    col-sm-8 offset-sm-1">
                        <label style="padding-top:5%"> Email: </label>
                        <input type="email" name="email" id="email" class="form-control email" required="required"/>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-lg-7 offset-lg-2    col-sm-8 offset-sm-1">
                        <label style="padding-top:5%"> Senha: </label>
                        <input type="password" name="senha" id="senha" class="form-control password" required="required"/>
                    </div>
                    <div class = "col-lg-7 offset-lg-2    col-sm-8 offset-sm-1">
                        <label style="padding-top:5%"> Confirme a senha: </label>
                        <input type="password" name="senha" id="conf_senha" class="form-control password" required="required"/>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col offset-lg-6 offset-sm-5">
                        <p style="padding-top:10px;"><button type="submit" class="btn btn-warning">Cadastrar</button></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Rodapé -->
    <?php
        include "../inc/rodape.inc";
        include "../inc/ModalContato.inc";
    ?>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/validaform.min.js"></script>
    <script src="../js/validarForm.js"></script>
</body>
</html>
