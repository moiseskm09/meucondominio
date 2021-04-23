<?php 
require_once '../config/conexao.php';
require_once '../config/sessao.php';
require_once '../config/config_geral.php';
$menu_clicado = $_GET['id'];
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
    <body>
       <?php include_once "../ferramentas/navbar.php";?>
                <main>
                    <div class="container-fluid">
                        <div class="container">
                       <!--conteudo da tela aqui!-->
                       <div class="form-row mt-2">
                           <div class="col-md-12">
                               <h6>Olá, <span class="destaque"><?php echo ucwords($NOME);?></span></h6>
                               <p>Quem bom te ver por aqui :)</p>
                           </div>

                       </div>
                       <div class="form-row">
                           <div class="col-md-12">
                               <h4 class="blockquote-footer" style="font-size: 20px;"><a href="home.php" class="destaque">MENU PRINCIPAL</a></h4>
                           </div>
                       </div>
                       <div class="form-row">
                           <?php 
                $selecionaAcessoRapido = mysqli_query($conexao, "SELECT submenu, marcado, cod_submenu, icone_sub, caminho FROM submenu
                                                            INNER JOIN nivel_acesso ON codSubmenu = cod_submenu and cod_perfil = '$NIVEL'  and codMenu = '$menu_clicado' ORDER BY cod_submenu");
              if (mysqli_num_rows($selecionaAcessoRapido) == 0 ){
                  echo "sem permissão";
              }else {
                  while ($acessoRapido = mysqli_fetch_assoc($selecionaAcessoRapido)) {
        ?>
                           <div class="col-lg-3 col-md-3 col-6">
                               <a href="<?php echo $acessoRapido['caminho'];?>" class="link-acesso">
                               <div class="card border-0 mb-1 mt-1 rounded-circle ml-3">
  <div class="card-body acesso-rapido p-4 rounded-circle" style="height: 152px; width: 152px">
      <h5 class="card-title text-center"><i class="<?php echo $acessoRapido['icone_sub'];?> icone-acesso"></i></h5>
      <h6 class="card-text text-center"><?php echo $acessoRapido['submenu'];?></h6>
  </div>
</div>
                               </a>
                           </div>
                  <?php }}   ?>
                       </div>
                        </div>
                       
                       <!--fim conteudo da tela aqui!-->
                    </div>
                </main>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>       
    </body>
</html>
