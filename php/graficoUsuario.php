<?php
    session_start();

    if($_SESSION["tabela"]!='cliente'){
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
                include "../inc/PainelFIS.php";
            ?>
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button style="background-color:#FFDB58;" class="btn btn-md btn-warning" id="menu-toggle">
                        <span class="navbar-toggler-icon"></span>
                        Painel
                    </button>
                </nav>

                <!-- Conteúdo -->
                <div class="container-fluid" style="margin-top:1%; font-size: 1.125rem; text-anchor: middle;">
                    <main role="main">
                            <div style="background-color: #333;" class="jumbotron">
                                <div style="color: white;"class="container">
                                    <h1 class="display-3 text-bold font-weight-normal">Seus lucros</h1>
                                    <p> Você obteve um lucro total de R$ 820,00 !</p>
                                </div>
                            </div>
                        <div class="container aling-center">
                            <canvas id="myChart"></canvas>
                                <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'  ],
                                        datasets: [{
                                            label: 'Lucro obtido',
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
