
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Home - Empresa </title>
        <link rel="shortcut icon" href="../images/logo.png" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/estilo.min.css" />
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
    </head>
  <body>
        <!-- Menu -->
        <?php
            include "../inc/menuEmp.inc";
        ?>
   
   <div class="container-fluid" style="margin-top:1%; font-size: 1.125rem; text-anchor: middle;">
  <div class="row">
    <nav class="col-md-2 bg-light">
      <div class="sidebar-sticky">
        <ul class="nav flex-column" >
          <li class="nav-item" >
            <a class="nav-link active" href="#">
                <span class="material-icons">home</span>
                Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <span class="material-icons">file_copy</span>
              Cadastrar Cupom
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

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="jumbotron">
            <div class="container">
            <h1 class="display-3">Seja Bem Vindo!!</h1>
            <p> Venha fazer parte desta grande parceria, nos lhe ajudaremos a impulsionar o seu negocio, esse é o seu momento.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Começar &raquo;</a></p>
            </div>
        </div>
        <canvas class="my-4 w-100" id="myChart" width="800" height="110"></canvas>

            <?php
                include "../inc/rodape.inc";

                include "../inc/ModalContato.inc";
            ?>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
