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
        <title> Cadastro de Cupons </title>
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
                include "..inc/menuJUR.inc";
            }else{
                include "../inc/menu.inc";
            }
        ?>

        <!-- Conteúdo -->
            <?php
                if(empty($_POST)){
                    include "../inc/form_cupon.inc";
                }else{
                    if(!file_exists("cupon.xml")){
                        cadastrarCupon();
                    }
                    else{
                        if(conferirCupon()){
                            cadastrarCupon();

                        }else{
                            echo "<section>
                                        <h2 class=\"text-center\">Cupom já cadastrado. <br><b><a href=\"cadastro_palavras.php\">Cadastre uma nova palavra.</a></b></h2>
                                    </section>";
                        }
                    }
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
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
