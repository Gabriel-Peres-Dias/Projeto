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
<style type="text/css">
td{
    text-align: center;
}
h2{
    text-align: center;
}
</style>

<h2>Lanternagem e pintura do Baiano</h2>
<h2>Dados do Cliente</h2>
<table border = 2px;  width="550">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">E-mail</th>
        </tr>
        <tr>
            <td width="33%">'.$nome.'</td>
            <td width="33%">'.$cpf.'</td>
            <td width="33%">'.$email.'</td> 
        </tr>
</table>

<table border = 2px;  width="550">
        <tr>
            <th scope="col">Telefone</th>
            <th scope="col">Endereço</th>
        </tr>
        <tr>
        <td width="50%" text-align: center;>'.$telefone.'</td>
        <td width="50%" text-align: center;>'.$endereco.'</td>
        </tr>
</table>
<h2>Dados do Serviço</h2>
<table border = 2px;  width="550">
        <tr>
            <th scope="col">Data</th>
            <th scope="col">Horário</th>
            <th scope="col">Valor</th>
        </tr>
        <tr>
            <td width="25%" text-align: center;>'.$data.'</td>
            <td width="25%" text-align: center;>'.$horario.'</td>
            <td width="25%" text-align: center;>R$ '.$valor.'</td>
        </tr>
</table>

<table border = 2px;  width="550">
        <tr>
            <th scope="col">Serviço(s)</th>
        </tr>
        <tr>
            <td id="servico">'.$tiraRisco.
            $revitalizacaoPintura.
            $polimentoCristalizado.
            $microPintura.
            $polimentoFarol.
            $pinturaGeral.'</td>
          </tr>
</table>

    <h2>Contato e Localização</h2>
        <p><br>Baiano Lanternagem e Pintura Josemir Soares Mendes
        <br>Quadra 21 Conjunto A 35
        <br>Parque da Barragem Setor 03
        <br>Águas Lindas de Goiás GO
        <br>72910-286</p>
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