<?php

#Token da conta bancária cadastrada
$fields = array(
'remessa.conta.token'=> 'api-key_rq0o3u6atdJViXoGKJTQoBz0QhjhEfgwqfMnyajQEaE='
);


$fields_string = '';

foreach($fields as $key=>$value) {
    if(is_array($value)){
        foreach($value as $v){
            $fields_string .= urlencode($key).'='.urlencode($v).'&';
        }
    }else{
        $fields_string .= urlencode($key).'='.urlencode($value).'&';
    }
}

$data = rtrim($fields_string, '&');
$accept_header = 'Accept: application/pdf, application/json';
$content_type_header = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
$headers = array($accept_header, $content_type_header);

$url = 'https://sandbox.boletocloud.com/api/v1/arquivos/cnab/remessas';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_USERPWD, "api-key_rq0o3u6atdJViXoGKJTQoBz0QhjhEfgwqfMnyajQEaE=:token"); #TOKEN do usuário
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);# Basic Authorization
curl_setopt($ch, CURLOPT_HEADER, true);#Define que os headers estarÃ£o na resposta
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); #Para uso com https
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); #Para uso com https

$response = curl_exec($ch);

$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

curl_close($ch);

$created = 201;

$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
$header_array = explode("\r\n", $header);

$boleto_cloud_version = '';
$boleto_cloud_token = '';
$location = '';
$file_name = '';

foreach($header_array as $h) {
    if(preg_match('/X-BoletoCloud-Version:/i', $h)) {
        $boleto_cloud_version = $h;
    }
    if(preg_match('/X-BoletoCloud-Token:/i', $h)) {
        $boleto_cloud_token = $h;
    }
    if(preg_match('/Location:/i', $h)) {
        $location = $h;
    }
    if(preg_match('/Content-Disposition: .*filename=([^ ]+)/i', $h)) {
        $file_name = preg_replace('/Content-Disposition:.*filename=/i', '', $h);
    }
}

if($http_code == $created){
    
    header('Content-type: application/text');
    header('Content-Disposition: attachment; filename="'.$file_name.'"' );
    header('Content-Length: ' . strlen($body));

    echo $body;
    
}else{
    header('Content-Type: application/text; charset=utf-8');
    echo "NENHUMA REMESSA DISPONÍVEL.";
}
