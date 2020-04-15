<?php
    session_start();

    if(!isset($_SESSION['login'])){
        $_SESSION['login']=0;
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <title> Página inicial </title>
        <link rel="shortcut icon" href="../images/logo.png" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/estilo.min.css" />
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
    </head>
    <body>

        <!-- Menu -->
        <?php
            if($_SESSION['login']==1){
                include "../inc/menuFIS.inc";
            }else if($_SESSION['login']==2){
                include "../inc/menuJUR.inc";
            }else{
                include "../inc/menu.inc";
            }
        ?>

        <!-- Conteúdo -->
        <nav style="margin-top:50px;">
            <p style="padding-left:10%"><img src="../images/perfil.png" width="60px" height="60px" style="position:absolute;"></p>
            <h3 style="padding-left:30%;"> Nome </h3>
        </nav>
        <div class = "row pb-3" style=" width:80%; margin-left:10%">
            <div class = "col-lg-8 offset-lg-2">
                <section class="node_category" style="margin-top:10%; border: 1px solid silver;">
                <br/>
                    <ul style="list-style-type: none; padding-top:0%;">
                        <li class="contentnode">
                            <dl>
                                <dt> CPF </dt>
                                <dd>Número do cpf</dd>
                            </dl>
                        </li>
                        <br/>
                        <li>
                            <dl>
                                <dt> E-mail </dt>
                                <dd>Endereço de email</dd>
                            </dl>
                        </li>
                    </ul>
                    <br/>   
                </section>
            </div>
        </div>
        <div class = "row pb-3" style=" width:80%; margin-left:10%">
            <div class = "col-lg-8 offset-lg-2"> 
                <div class="page-content" style=" border: 1px solid silver;">
                <br/>
                    <ul style="list-style-type: none; padding-top:0%;">
                        <li class="contentnode">
                            <dl>
                                <dt> Seus cupons </dt>
                                <dd>Cupom 1</dd>
                                <dd>Cupom 2</dd>
                                <dd>Cupom 3</dd>
                            </dl>
                        </li>
                        <br/>
                    </ul>   
                </div>
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
    </body>
</html>
