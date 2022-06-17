<?php
session_start();
$id = $_GET['id'];
echo $id;
//reference the Dompdf namespace
use Dompdf\Dompdf;
require_once 'assets/dompdf/autoload.inc.php';

//Instanciar a classe dompdf
$dompdf = new Dompdf();


$dompdf-> loadHtml('

<! -- aqui entra o codigo html -->
<p>Aqui vem</p>

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