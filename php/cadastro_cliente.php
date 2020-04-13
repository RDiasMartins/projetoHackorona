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
        include "../inc/menu.inc";
    ?>
    <?php
    session_start();
    if(isset($_SESSION["conf_email"])){
        if(!$_SESSION["conf_email"]){
            echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Email já cadastrado.<strong> Favor inserir um email válido.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            $_SESSION["conf_email"]=true;
        }
    }
    ?>
    <div class = "row">
        <div class = "col-lg-4 offset-lg-4   col-sm-5 offset-sm-3">
            <h2 class="h2_cad">Cadastre-se</h2>
            <form class="form" action = "salvar_cliente.php" method = "POST">
                <div class = "row">
                    <div class = "col-lg-7 offset-lg-2    col-sm-8 offset-sm-1">
                        <label style="padding-top:5%"> Nome: </label>
                        <input type="text" name="nome" id="nome" class="form-control" required="required"/>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-lg-7 offset-lg-2    col-sm-8 offset-sm-1">
                        <label> Email: </label>
                        <input type="email" name="email" id="email" class="form-control email" required="required"/>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-lg-7 offset-lg-2    col-sm-8 offset-sm-1">
                        <label> Senha: </label>
                        <input type="password" name="senha" id="senha" class="form-control" required="required"/>
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
    <script src="../js/validaform.min.js"></script>
</body>
</html>