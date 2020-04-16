<!-- Menu -->
<?php
    include "../inc/menuFIS.inc";
?>

<div class="container-fluid" style="margin-top:1%; font-size: 1.125rem; text-anchor: middle;">
    <div class="row">
        <nav class="col-md-2 bg-light">
            <div class="sidebar-sticky">
                <ul class="nav flex-column" >
                    <li class="nav-item" >
                        <a class="nav-link active" href="home.php">
                            <span class="material-icons">home</span>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="material-icons">payment</span>
                            Seus Cupons
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="material-icons">equalizer</span>
                            Seu lucro
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="material-icons">person_outline</span>
                            Perfil
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Seja Bem Vindo!!</h1>
            </div>
        </div>
        <div class="container aling-center" style="margin-top:5%; margin-rigth:2%;">
        <?php
            if(file_exists("cupons.xml")){
                $preco=0;
                $xml = simplexml_load_file("cupons.xml");
                foreach($xml->children() as $cupons){
                    $preco=$cupons->valor - ($cupons->valor * ($cupons->desconto/100));

                    echo'
                        <div class="card mb-3" style="max-width: 1000px;">
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
                        <br/>
                    ';
                }
            }else{
                echo '<tr><td colspan="6"><h2 class=" display-5 text-center">Nenhum cupom cadastrado</h2></td></tr>';
            }
        ?>
    </main>
</div>
