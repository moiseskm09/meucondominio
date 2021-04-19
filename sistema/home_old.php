<?php 
require_once '../config/conexao.php';
require_once '../config/sessao.php';
require_once '../config/config_geral.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="../css/menu.css" rel="stylesheet" />
        <link href="../css/geral.css" rel="stylesheet" />
        <link href="../css/dashboard.css" rel="stylesheet" />
          <link rel="stylesheet" href="../css/bootstrap.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    </head>
    <body class="sb-nav-fixed">
       <?php include_once "../ferramentas/navbar.php";?>
        <div id="layoutSidenav">
            <?php include_once "../ferramentas/menu.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <!--conteudo da tela aqui!-->
                       <div class="form-row mt-2">
                           <div class="col-md-12">
                               <h6>Olá, <span class="destaque"><?php echo ucwords($NOME);?></span></h6>
                               <p>Quem bom te ver por aqui :)</p>
                           </div>

                       </div>
                       <div class="form-row">
                           <div class="col-md-12">
                               <h4 class="blockquote-footer" style="font-size: 20px;">Acesso Rápido</h4>
                           </div>
                       </div>
                       <div class="form-row">
                           <?php 
                $selecionaAcessoRapido = mysqli_query($conexao, "SELECT submenu, marcado, cod_submenu, icone_sub, caminho FROM submenu
                                                            INNER JOIN nivel_acesso ON codSubmenu = cod_submenu and cod_perfil = '$NIVEL' LIMIT 12");
              if (mysqli_num_rows($selecionaAcessoRapido) == 0 ){
                  echo "sem permissão";
              }else {
                  while ($acessoRapido = mysqli_fetch_assoc($selecionaAcessoRapido)) {
        ?>
                           <div class="col-md-2">
                               <a href="<?php echo $acessoRapido['caminho'];?>" class="link-acesso">
                               <div class="card border-0 mb-1 mt-1">
  <div class="card-body acesso-rapido p-1">
      <h5 class="card-title text-center"><i class="<?php echo $acessoRapido['icone_sub'];?> icone-acesso"></i></h5>
      <h6 class="card-text text-center"><?php echo $acessoRapido['submenu'];?></h6>
  </div>
</div>
                               </a>
                           </div>
                  <?php }}   ?>
                       </div>
                       
                       <div class="form-row mt-3">
                           <div class="col-md-4">
                               <h4 class="blockquote-footer" style="font-size: 20px;">Agenda do mês <?php echo strftime('%B de %Y', strtotime('today'));?></h4>
                               <a href="#teste" class="link-acesso">
                               <div class="card border-0 mb-1 mt-1">
  <div class="card-body acesso-rapido p-1">
      <h5 class="card-title text-center"></h5>
      <h6 class="card-text text-center"></h6>
  </div>
</div>
                               </a>
                           </div>
                           <div class="col-md-4">
                               <h4 class="blockquote-footer" style="font-size: 20px;">Notificações</h4>
                               <a href="#teste" class="link-acesso">
                               <div class="card border-0 mb-1 mt-1">
  <div class="card-body acesso-rapido p-1">
      <h5 class="card-title text-center"></h5>
      <h6 class="card-text text-center"></h6>
  </div>
</div>
                               </a>
                           </div>
                           <div class="col-md-4">
                               <h4 class="blockquote-footer" style="font-size: 20px;">Mensagens</h4>
                               <a href="#teste" class="link-acesso">
                               <div class="card border-0 mb-1 mt-1">
  <div class="card-body acesso-rapido p-1">
      <h5 class="card-title text-center"></h5>
      <h6 class="card-text text-center"></h6>
  </div>
</div>
                               </a>
                           </div>
                       </div>
                       <!--fim conteudo da tela aqui!-->
                    </div>
                </main>
                <?php include_once "../ferramentas/rodape.php";?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>       
    </body>
</html>
