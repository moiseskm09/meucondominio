<?php 
require_once '../ferramentas/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
          <link href="menu.css" rel="stylesheet" />
          <link href="dashboard.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
       <?php include_once "navbar.php";?>
        <div id="layoutSidenav">
            <?php include_once "menu.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <!--conteudo da tela aqui!-->
                      <div class="row mt-3">
      <div class="col-xl-3 col-sm-6 col-12 mb-2"> 
        <div class="card ">
            <a href="clientes" class="card-link">
          <div class="card-content">
            <div class="card-body cards-dashboard">
              <div class="media d-flex">
                <div class="align-self-center">
                    <i class="fas fa-plus icone-dashboard float-left"></i>
                  
                </div>
                <div class="media-body text-right">
                  <h3>278</h3>
                  <span>Novo Cliente</span>
                </div>
              </div>
            </div>
          </div>
            </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
              <a href="faturas" class="card-link">
            <div class="card-body cards-dashboard">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fas fa-barcode icone-dashboard float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>156</h3>
                  <span>Faturas</span>
                </div>
              </div>
            </div>
              </a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
              <a href="contas-a-pagar" class="card-link">
            <div class="card-body cards-dashboard">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fas fa-cash-register icone-dashboard float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>64.89 %</h3>
                  <span>Contas a pagar</span>
                </div>
              </div>
            </div>
              </a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
              <a href="financeiro" class="card-link">
            <div class="card-body cards-dashboard">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fas fa-money-bill-wave icone-dashboard float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>423</h3>
                  <span>Financeiro</span>
                </div>
              </div>
            </div>
              </a>
          </div>
        </div>
      </div>
    </div>
                       <div class="row mt-2">
      <div class="col-xl-3 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
              <a href="usuarios" class="card-link">
            <div class="card-body cards-dashboard">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fas fa-users icone-dashboard float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>278</h3>
                  <span>Usuários</span>
                </div>
              </div>
            </div>
              </a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
              <a href="servicos" class="card-link">
            <div class="card-body cards-dashboard">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fas fa-laptop-code icone-dashboard float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>200</h3>
                  <span>Serviços</span>
                </div>
              </div>
            </div>
              </a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
              <a href="filiais" class="card-link">
            <div class="card-body cards-dashboard">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fas fa-city icone-dashboard float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>64.89 %</h3>
                  <span>Filiais</span>
                </div>
              </div>
            </div>
              </a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
              <a href="tipos-de-recebimento" class="card-link">
            <div class="card-body cards-dashboard">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fas fa-receipt icone-dashboard float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>423</h3>
                  <span>Tipos Recebimentos</span>
                </div>
              </div>
            </div>
              </a>
          </div>
        </div>
      </div>
    </div>
                       <div class="row mt-5">
                           <div class="col-xl-12 col-sm-12 col-12 text-center">
                               <img src="../img/logo_horizontal.png" class="imagem-principal" width="300px">
                           </div>
                       </div>
                       <!--fim conteudo da tela aqui!-->
                </main>
                <?php include_once "rodape.php";?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>       
    </body>
</html>
