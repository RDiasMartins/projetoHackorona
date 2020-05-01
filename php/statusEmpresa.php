<?php
    session_start();

    if($_SESSION["tabela"]!='empresa'){
        session_destroy();
        header("location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <title> Home - Cliente </title>
        <link rel="shortcut icon" href="../images/logo.png" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/estilo.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/chart.min.css" />
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    </head>
    <body>
        <!-- Menu -->
        <div class="d-flex" id="wrapper">
            <?php
                include "../inc/PainelJUR.php";
            ?>
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button style="background-color:#FFDB58;" class="btn btn-md btn-warning" id="menu-toggle">
                        <span class="navbar-toggler-icon"></span><!--Não há necessidade de escrever painel,os tres traços já deixa subentendido-->
                    </button>
                </nav>

                <!-- Conteúdo -->
                <div class="container-fluid" style="margin-top:1%; font-size: 1.125rem; text-anchor: middle;">
                    <main role="main">
                            <div style="background-color: #333;" class="jumbotron">
                                <div style="color: white;"class="container">
                                    <h1 class="display-3 text-bold font-weight-normal">Status</h1>
                                </div>
                            </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="card mb-4">
                                        <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Lucro obtido</div>
                                        <canvas id="Lucro"></canvas>
                                        <script>
                                            var ctx = document.getElementById('Lucro').getContext('2d');
                                            var Lucro = new Chart(ctx, {
                                                type: 'line',
                                                data: {
                                                        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'  ],
                                                    datasets: [{
                                                        label: 'Lucro R$',
                                                        data: [20, 30, 40, 50, 60, 40, 80, 10, 30, 120, 140, 200],
                                                        backgroundColor: [
                                                            'transparent',
                                                        ],
                                                        borderColor: [
                                                            '#FFD700',
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {


                                                        yAxes: [{
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]

                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="card mb-4">
                                        <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Vendas realizadas</div>
                                        <canvas id="Vendas"></canvas>
                                        <script>
                                            var ctx = document.getElementById('Vendas').getContext('2d');
                                            var Vendas = new Chart(ctx, {
                                                type: 'doughnut',
                                                data: {
                                                        labels: ['Link', 'Direto'],
                                                    datasets: [{
                                                        label: 'Lucro obtido',
                                                        data: [20, 30],
                                                        backgroundColor: [
                                                            'yellow', '#333',
                                                        ],
                                                        borderColor: [
                                                            'transparent',
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {
                                                    scales: {
                                                        yAxes: [{
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="card mb-4">
                                        <div class="card-header"></i>Tabela de vendas</div>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>ID Cupom</th>
                                                    <th>Valor</th>
                                                    <th>Data</th>
                                                    <th>Status</th>
                                                    <th>E-mail comprador</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>1</th>
                                                    <th>01</th>
                                                    <td>R$ 150</td>
                                                    <td>2020-05-01</td>
                                                    <th>Aprovada</th>
                                                    <td>exemplo@email.com</td>
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <th>02</th>
                                                    <td>R$100</td>
                                                    <td>2020-05-01</td>
                                                    <th>Pendente</th>
                                                    <td>exemplo2@email.com</td>
                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <th>03</th>
                                                    <td>R$50,00</td>
                                                    <td>2020-05-01</td>
                                                    <th>Recusada</th>
                                                    <td>exemplo3@email.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-footer small text-muted">Atualizada em tempo real</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>

        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </body>
</html>
