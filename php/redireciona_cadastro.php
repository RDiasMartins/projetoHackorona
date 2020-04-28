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
                    <h2 class="display-3 text-bold font-weight-normal titulo<?=$dispositivo;?>">Escolha seu cadastro</h2>
                </div>
            </div>
        </main>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="card Cardcadastro">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de usuário</h5>
                        <hr>
                        <p class="card-text">Registre-se uma conta como pessoa física na plataforma.</p>
                        <div class="float-right">
                            <a href="cadastro_cliente.php" class="btn btn-dark">Entre</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="card Cardcadastro">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de empresa</h5>
                        <hr>
                        <p class="card-text">Registre-se como pessoa jurídica na plataforma.</p>
                        <div class="float-right">
                            <a href="cadastro_empresa.php" class="btn btn-dark">Entre</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
