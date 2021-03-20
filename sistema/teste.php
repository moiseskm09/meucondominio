<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Atualização de Taxas Pleno</title>
  </head>
  <body>
<?php
$host = "168.227.251.187:40275";
$user = "plenokw";
$pass = "ygz2QbG50SkcaLg7";
$banco = "pleno";


$conexao = mysqli_connect ($host, $user, $pass) or die (mysqli_error("falha na conexao"));
mysqli_select_db($conexao, $banco) or die (mysqli_error("banco de dados nao encontrado"));

echo "<br>"."atualizando taxas de credito parcelado"."<br><br>";

$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 15) AND fin19_operacaotef_id = 5)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateElo1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.10' WHERE fin22_id = $fin22_id");
       echo "Elo. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateElo2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.52' WHERE fin22_id = $fin22_id");
       echo "Elo. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}

$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 2) AND fin19_operacaotef_id = 5)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateVisa1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.09' WHERE fin22_id = $fin22_id");
       echo "Visa. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateVisa2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.56' WHERE fin22_id = $fin22_id");
 echo "Visa. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}

$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 4) AND fin19_operacaotef_id = 5)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateMatercard1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.14' WHERE fin22_id = $fin22_id");
       echo "Matercard. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateMatercard2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.24' WHERE fin22_id = $fin22_id");
 echo "Matercard. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}

$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 24) AND fin19_operacaotef_id = 5)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateDiners1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.16' WHERE fin22_id = $fin22_id");
       echo "Diners. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateDinners2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.34' WHERE fin22_id = $fin22_id");
 echo "Diners. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}


$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 13) AND fin19_operacaotef_id = 5)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateAmex1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.64' WHERE fin22_id = $fin22_id");
       echo "Amex. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateAmex2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.69' WHERE fin22_id = $fin22_id");
 echo "Amex. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}


$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 14) AND fin19_operacaotef_id = 5)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateHipercard1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.54' WHERE fin22_id = $fin22_id");
       echo "Hipercard. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateHipercard2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.89' WHERE fin22_id = $fin22_id");
 echo "Hipercard. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}


echo "<br>"."atualizando taxas de credito a vista"."<br><br>";

$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 15) AND fin19_operacaotef_id = 4)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateElo1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '1.94' WHERE fin22_id = $fin22_id");
       echo "Elo. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateElo2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.52' WHERE fin22_id = $fin22_id");
       echo "Elo. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}

$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 2) AND fin19_operacaotef_id = 4)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateVisa1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '1.94' WHERE fin22_id = $fin22_id");
       echo "Visa. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateVisa2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.56' WHERE fin22_id = $fin22_id");
 echo "Visa. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}


$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 4) AND fin19_operacaotef_id = 4)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateMatercard1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '1.95' WHERE fin22_id = $fin22_id");
       echo "Matercard. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateMatercard2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.24' WHERE fin22_id = $fin22_id");
 echo "Matercard. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}

$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 24) AND fin19_operacaotef_id = 4)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateDiners1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '1.89' WHERE fin22_id = $fin22_id");
       echo "Diners. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateDinners2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.34' WHERE fin22_id = $fin22_id");
 echo "Diners. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}

$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 13) AND fin19_operacaotef_id = 4)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateAmex1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.32' WHERE fin22_id = $fin22_id");
       echo "Amex. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateAmex2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.69' WHERE fin22_id = $fin22_id");
 echo "Amex. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}

$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 14) AND fin19_operacaotef_id = 4)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateHipercard1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.24' WHERE fin22_id = $fin22_id");
       echo "Hipercard. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateHipercard2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.89' WHERE fin22_id = $fin22_id");
 echo "Hipercard. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}


echo "<br>"."atualizando taxas de debito"."<br><br>";

$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 15) AND fin19_operacaotef_id = 1)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateElo1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '0.98' WHERE fin22_id = $fin22_id");
       echo "Elo. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateElo2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.52' WHERE fin22_id = $fin22_id");
       echo "Elo. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}


$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 1) AND fin19_operacaotef_id = 1)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateVisa1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '0.94' WHERE fin22_id = $fin22_id");
       echo "Visa. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateVisa2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.56' WHERE fin22_id = $fin22_id");
 echo "Visa. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}

$busca_info = mysqli_query($conexao, "SELECT * FROM fin22_contrato_operacaotef_parcelas WHERE fin20_contrato_operacaotef_id in( SELECT fin20_id FROM fin20_contrato_operacaotef WHERE fin17_contratotef_id in( SELECT fin17_id FROM fin17_contratotef WHERE fin16_rede_id = 7 AND fin15_bandeira_id = 3) AND fin19_operacaotef_id = 1)");

while($info_recebida = mysqli_fetch_assoc($busca_info)){
   $fin22_id = $info_recebida['fin22_id'];
   $fin22_nroparcelas = $info_recebida['fin22_nroparcelas'];
   
   if ($fin22_nroparcelas <= 6){
       $updateMatercard1= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '0.98' WHERE fin22_id = $fin22_id");
       echo "Maestro. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }elseif ($fin22_nroparcelas >=7){
       $updateMatercard2= mysqli_query($conexao, "UPDATE fin22_contrato_operacaotef_parcelas SET fin22_taxa_adm = '2.24' WHERE fin22_id = $fin22_id");
 echo "Maestro. Parcela".$fin22_nroparcelas."atualizada"."<br>";
   }else{
       echo "erro";
   }
}
?>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
