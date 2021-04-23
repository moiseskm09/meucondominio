<?php
include_once '../../config/conexao.php';
require '../autoloader.php';

$busca_infoCedente = mysqli_query($conexao, "SELECT * FROM empresa INNER JOIN contas_financeiras ON conta_id = conta_empresa LIMIT 1");
$resultadoCedente = mysqli_fetch_assoc($busca_infoCedente);

$buscaSacado = mysqli_query($conexao, "SELECT * FROM morador WHERE m_cod = '2'");
$resultadoSacado = mysqli_fetch_assoc($buscaSacado);

use OpenBoleto\Banco\Itau;
use OpenBoleto\Agente;


$sacado = new Agente($resultadoSacado['m_nome'].' '.$resultadoSacado['m_sobrenome'], $resultadoSacado['m_cpf'], $resultadoSacado['m_cep'], $resultadoSacado['m_cidade'], $resultadoSacado['m_estado']);
$cedente = new Agente($resultadoCedente['emp_razao'], $resultadoCedente['emp_cnpj'], $resultadoCedente['emp_cep'], $resultadoCedente['emp_cidade'], $resultadoCedente['emp_estado']);

$boleto = new Itau(array(
    // Parâmetros obrigatórios
    'dataVencimento' => new DateTime('2021-04-21'),
    'valor' => 750.00,
    'sequencial' => 36246817, // 8 dígitos
    'sacado' => $sacado,
    'cedente' => $cedente,
    'agencia' => $resultadoCedente['conta_agencia'], // 4 dígitos
    'carteira' => 109, // 3 dígitos
    'conta' => $resultadoCedente['conta_numero'], // 5 dígitos
    
    // Parâmetro obrigatório somente se a carteira for
    // 107, 122, 142, 143, 196 ou 198
    'codigoCliente' => $resultadoSacado['m_cod'], // 5 dígitos
    'numeroDocumento' => 1234567, // 7 dígitos

    // Parâmetros recomendáveis
    'logoPath' => 'https://quallyplan.com.br/wp-content/uploads/2021/04/LOGOQUALLYPLAN-1024x619.png', // Logo da sua empresa
    'contaDv' => $resultadoCedente['conta_dv'],
    'agenciaDv' => $resultadoCedente['conta_agenciadv'],
    'descricaoDemonstrativo' => array( // Até 5
        'Cobrança de Aluguel',
    ),
    'instrucoes' => array( // Até 8
        'Após o vencimento cobrar 2% de mora e 1% de juros ao dia.',
    ),

    // Parâmetros opcionais
    //'resourcePath' => '../resources',
    //'moeda' => Itau::MOEDA_REAL,
    //'dataDocumento' => new DateTime(),
    //'dataProcessamento' => new DateTime(),
    //'contraApresentacao' => true,
    //'pagamentoMinimo' => 23.00,
    //'aceite' => 'N',
    //'especieDoc' => 'ABC',
    //'usoBanco' => 'Uso banco',
    //'layout' => 'layout.phtml',
    //'logoPath' => 'http://boletophp.com.br/img/opensource-55x48-t.png',
    //'sacadorAvalista' => new Agente('Antônio da Silva', '02.123.123/0001-11'),
    //'descontosAbatimentos' => 123.12,
    //'moraMulta' => 123.12,
    //'outrasDeducoes' => 123.12,
    //'outrosAcrescimos' => 123.12,
    //'valorCobrado' => 123.12,
    //'valorUnitario' => 123.12,
    //'quantidade' => 1,
));

echo $boleto->getOutput();
