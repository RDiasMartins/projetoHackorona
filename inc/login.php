<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <title> Página inicial </title>
        <link rel="shortcut icon" href="images/logo.png" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/estilo.min.css" />
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
    </head>
    <body>

        <!-- Menu -->
        <?php
            if($_SESSION['login']==1){
                include "../inc/menuFIS.inc";
            }else if($_SESSION['login']==2){
                include "..inc/menuJUR.inc";
            }else{
                include "inc/menu.inc";
            }
        ?>

        <!--Carrossel index-->
        <?php
                include "inc/carrossel.inc";
        ?>

        <!-- Conteúdo -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="images/descontoIcon.png" class="bd-placeholder-img rounded-circle" width="140" height="140"/>
                    <br/> <br/> <h2>Vouchers</h2>
                    <p>Cupons de desconto com variadas promoções ao consumidor.</p>
                </div>
                <div class="col-lg-4">
                    <img src="images/dinheiroIcon.png" class="bd-placeholder-img rounded-circle" width="140" height="140"/>
                    <br/> <br/> <h2>Ganhos</h2>
                    <p>Ganhe dinheiro promovendo cupons de outros estabelecimentos.</p>
                </div>
                <div class="col-lg-4">
                    <img src="images/MarketingIcon.png" class="bd-placeholder-img rounded-circle" width="140" height="140"/>
                    <br/> <br/> <h2>Marketing</h2>
                    <p>Realize vendas de cupons promocionais e ganhe visibilidade ao seu negócio.</p>
                </div>
            </div>
        </div>

        <br/> <br/> <br/> <br/>


        <!-- Rodapé -->
        <?php
            include "inc/rodape.inc";
            include "inc/ModalContato.inc";

        ?>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
