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
        <script src="../js/jquery3.2.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

        <title>Meu Condomínio - Home</title>
        <style>
            body{background-color: #f5f5f5;}
        </style>

    </head>
    <body>
        <div class="page-wrapper chiller-theme toggled">
            <?php require_once '../ferramentas/menu.php'; ?>
            <!-- sidebar-wrapper  -->
            <main class="page-content">
                <div class="container-fluid">
                    <h3 style="border-bottom: 3px solid #ffffff;">Áreas Comuns</h3>
                    <form method="POST">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="nome_area">Nome da área</label>
      <input type="text" class="form-control" id="nome_area" name="nome_area" placeholder="Salão de festas, Espaço Gourmet, Salão de Jogos, Home cinema">
    </div>
    <div class="form-group col-md-6">
      <label for="taxa">Taxa de Utilização</label>
      <input type="text" class="form-control taxa" id="taxa" name="taxa" placeholder="R$ 0,00">
    </div>
      <div class="form-group col-md-6">
      <label for="lotacao">Lotação</label>
      <input type="text" class="form-control numero" id="lotacao" name="lotacao" placeholder="Máximo de pessoas">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="chaves">Controle de Chaves?</label>
      <select id="chaves" name="chaves" class="form-control">
        <option selected>Escolha uma opção...</option>
        <option value="1">Sim</option>
        <option value="0">Não</option>
      </select>
    </div>
      <div class="form-group col-md-6">
      <label for="reserva">Confirma Reserva?</label>
      <select id="reserva" name="reserva" class="form-control">
        <option selected>Escolha uma opção...</option>
        <option value="1">Sim</option>
        <option value="0">Não</option>
      </select>
    </div>

  </div>
  <button type="submit" class="btn btn-primary col-md-12">Entrar</button>
</form>
                    <?php
error_reporting(0);
ini_set( 'display_errors', 0 );

include_once '../ferramentas/conexao.php';

$nome_area = $_POST['nome_area'];
$taxa = $_POST['taxa'];
$lotacao = $_POST['lotacao'];
$chaves = $_POST['chaves'];
$reserva = $_POST['reserva'];

if (!isset($nome_area) || !isset ($taxa) || !isset ($lotacao) || !isset ($chaves) || !isset ($reserva)) {
} else {
    $sql = mysqli_query($conexao, "INSERT INTO areas_comuns (nome_area, taxa_utilizacao, lotacao, chaves, confirma_reserva) VALUES ('$nome_area', '$taxa', '$lotacao', '$chaves', '$reserva')");
    echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
  Cadastro realizado com sucesso!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
                </div>
            </main>
            <!-- page-content" -->
        </div>
        <!-- page-content" -->

<script>
    $(document).ready(function(){
        $('.numero').mask('000');
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.phone').mask('0000-0000');
  $('.phone_with_ddd').mask('(00) 0000-0000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.taxa').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.percent').mask('##0,00%', {reverse: true});
  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});
    </script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/menu.js"></script>
    </body>
</html>