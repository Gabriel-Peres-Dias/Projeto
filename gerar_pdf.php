<?php
include "validation/conn.php";

session_start();


$id = $_GET['id'];

$resultado = mysqli_query($conexao, "SELECT orcamento.id, cliente.nomeC, cliente.emailC, cliente.cpf,
 cliente.enderecoC, cliente.telefoneC, tira_risco,revitalizacao_pintura,polimento_cristalizado,
 micro_pintura,polimento_farol,pintura_geral, dia,horario, orcamento.valor
FROM servico
INNER JOIN orcamento on orcamento.servico_id = servico.id
INNER JOIN cliente on servico.cliente_id = cliente.id;
");

while ($user_data = mysqli_fetch_assoc($resultado)) {

   $nome = $user_data['nomeC'];
   $email = $user_data['emailC'];
   $cpf = $user_data['cpf'];
   $endereco = $user_data['enderecoC'];
   $telefone = $user_data['telefoneC'];
   $data =  date('d/m/Y', strtotime($user_data['dia']));
   $valor = $user_data['valor'];
   $horario = $user_data['horario'];
    if ($user_data['tira_risco'] == 1) {
        $tiraRisco = "Tira Risco<BR>";
    } else {
        $tiraRisco = "";
    }
    if ($user_data['revitalizacao_pintura'] == 1) {
        $revitalizacaoPintura = "Revitalização de Pintura<BR>";
    } else {
        $revitalizacaoPintura = "";
    }
    if ($user_data['polimento_cristalizado'] == 1) {
        $polimentoCristalizado = "Polimento Cristalizado<BR>";
    } else {
        $polimentoCristalizado = "";
    }
    if ($user_data['micro_pintura'] == 1) {
        $microPintura = "Micro Pintura<BR>";
    } else {
        $microPintura = "";
    }
    if ($user_data['polimento_farol'] == 1) {
        $polimentoFarol = "Polimento de Farol<BR>";
    } else {
        $polimentoFarol = "";
    }
    if ($user_data['pintura_geral'] == 1) {
        $pinturaGeral = "Pintura Geral<BR>";
    } else {
        $pinturaGeral = "";
    }
   



}


//reference the Dompdf namespace
use Dompdf\Dompdf;
require_once 'assets/dompdf/autoload.inc.php';

//Instanciar a classe dompdf
$dompdf = new Dompdf();


$dompdf-> loadHtml('

<! -- aqui entra o codigo html -->
<h1>Dados do Corno </h1>
<p>Nome do Corno: </p>'.$nome.'
<br><p>CPF do Corno: </p>'.$cpf.'
<br><p>E-mail do Corno: </p>'.$email.'
<br><p>Telefone do Corno: </p>'.$telefone.'
<br><p>Endereço do Corno: </p>'.$endereco.'
<br><p>Dia que o Corno teve o carro arrumado: </p>'.$data.'
<br><p>Horario que o Corno veio: </p>'.$horario.'
<br><p>Valor o Corno teve que pagar: </p>'.$valor.'
<br><p>Serviço(s) que o Corno fez: </p>'.$tiraRisco.
$revitalizacaoPintura.
$polimentoCristalizado.
$microPintura.
$polimentoFarol.
$pinturaGeral.'



');

//Renderização do HTML
$dompdf-> render();

//gerar a saída do documneto PDF
$dompdf -> stream(
    "nota-fiscal.pdf", //nome do arquivo pdf gerado
    array(
        "Attachment"=>false 
    )
);

?>