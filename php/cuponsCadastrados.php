<?php
    session_start();

    if(!isset($_SESSION["cliente"])){
        session_destroy();
        header('location: ../index.php');
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
            include "../inc/menuFIS.inc";
        ?>

        <!-- Conteúdo -->
        <div class="fundo" style="background-color:#333; -webkit-text-stroke-width: 2px; -webkit-text-stroke-color: white;">
            <div class="p-4 p-md-5 text-white ">
                <h2 style="font-family: consolas;" class="display-4 text-bold font-weight-normal">Cupons</h2>
            </div>
        </div>
        <div class="container aling-center" style="margin-top:5%; margin-rigth:2%;">
            <?php
                if(file_exists("cupons.xml")){
                    $preco=0;
                    $xml = simplexml_load_file("cupons.xml");
                    foreach($xml->children() as $cupons){
                        $preco=$cupons->valor - ($cupons->valor * ($cupons->desconto/100));

                        echo' <div class="card mb-3" style="max-width: 1000px;">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="../images/teste.jpg" class="card-img" width="100%" height="100%" >
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">'.$cupons->titulo.'</h5>
                              <h5 class="card-title">R$'.$preco.'</h5>
                              <p class="card-text ">'.$cupons->descricao.'</p>
                              <a href="#"style="background-color:#FFDB58; color:white;"class="btn btn-warning btn-lg">Comprar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                        <br/>';
                    }
                }else{
                    echo '<tr><td colspan="6"><h2 class=" display-5 text-center">Nenhum cupom cadastrado</h2></td></tr>';
                }
            ?>
    	</div>
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
