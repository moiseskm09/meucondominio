<?php include_once '../ferramentas/sessao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/menu.css">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

        <title>Meu Condomínio - Home</title>
        <style>
            body{background-color: #f5f5f5;}
            .btn-aviso {width: 100%;}
            .card-header{background-image: linear-gradient(to top, #09203f 0%, #537895 100%); border-radius:10px;}
            .todos-avisos{color:#f58322; text-decoration: none;}
            .todos-avisos:hover{color:#ffffff;text-decoration: none;}
            .chat{color:#f58322; text-decoration: none;}
            .chat:hover{color:#000000;text-decoration: none;}
            .dashboard{height: 200px; border-radius:10px;}
            .btn-white{background-color: #ffffff; border-radius: 10px}
            .btn-white:hover{background-color: #e3e3e3;}
        </style>
    </head>
    <body>
        <div class="page-wrapper chiller-theme toggled">
            <?php require_once '../ferramentas/menu.php'; ?>
            <!-- sidebar-wrapper  -->
            <main class="page-content">
                <div class="container-fluid">
                    <div class="row mb-4">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <button type="button" class="btn btn-white btn-aviso">
                                <span class="badge" style="font-size:18px;">25</span><br>Ocorrências 
                            </button>
                        </div>    
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <button type="button" class="btn btn-white btn-aviso">
                                <span class="badge" style="font-size:18px;">5</span><br>Reservas 
                            </button>
                        </div> 
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <button type="button" class="btn btn-white btn-aviso">
                                <span class="badge" style="font-size:18px;">400</span><br>Unidades 
                            </button>
                        </div> 
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <button type="button" class="btn btn-white btn-aviso">
                                <span class="badge" style="font-size:18px;">100</span><br>Visitantes 
                            </button>
                        </div> 
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <button type="button" class="btn btn-white btn-aviso">
                                <span class="badge" style="font-size:18px;">2</span><br>Tarefas 
                            </button>
                        </div> 
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <button type="button" class="btn btn-white btn-aviso">
                                <span class="badge" style="font-size:18px;">1</span><br>Avisos 
                            </button>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="card" style="border-radius:10px;">
                                <div class="card-header font-weight-bold text-white">
                                    Quadro de avisos <a href="#" class="float-right todos-avisos"> Todos os avisos</a>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                                        <div class="carousel-inner">
                                            <div class="carousel-item active">

                                                <p>Fique atento aos avisos de hoje.</p>

                                            </div>
                                            <div class="carousel-item">
                                                <p>Próxima Assembleia no dia 01/02/2021. <a href="#"> Saiba Mais</a></p>
                                            </div>
                                            <div class="carousel-item">
                                                <p>Cano quebrado no bloco C causa alagamentos.<a href="#"> Saiba Mais</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card dashboard">
                                <div class="card-header font-weight-bold text-white">
                                    Últimas visitas
                                </div>
                                <div class="card-body">

                                    <p class="card-text"><span class="font-weight-bold">Moises</span> <span class="float-right">Bloco C</span> </p>
                                    <p class="card-text"><span class="font-weight-bold">Karina</span> <span class="float-right">Bloco A</span> </p>
                                    <p class="card-text"><span class="font-weight-bold">Emanuelle</span> <span class="float-right">Bloco D</span> </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card dashboard">
                                <div class="card-header font-weight-bold text-white">
                                    Últimas Ocorrências
                                </div>
                                <div class="card-body">

                                    <p class="card-text">Barulho no bloco A encomoda vizinhos. <span class="float-right"><span class="font-weight-bold">Data:</span> 01/02/2021</span></p>
                                    <p class="card-text">Som alto no carro causa alvoroço. <span class="float-right"><span class="font-weight-bold">Data:</span> 01/02/2021</span></p>
                                    <p class="card-text">Corrimão da escada da portaria caiu. <span class="float-right"><span class="font-weight-bold">Data:</span> 01/02/2021</span></p>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">

                        </div>
                        <div class="col-md-6 mt-3 text-right" >
                            <a class="fixed-bottom chat " style="padding-right: 50px"href="chat.php">Estamos Online <img src="../img/chat.png" width="70"></a>
                        </div>
                    </div>
                </div>
            </main>
            <!-- page-content" -->
        </div>
        <!-- page-content" -->
        <script src="../js/jquery3.2.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/menu.js"></script>
    </body>
</html>