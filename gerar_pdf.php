<?php

//reference the Dompdf namespace
use Dompdf\Dompdf;
require_once 'assets/dompdf/autoload.inc.php';

//Instanciar a classe dompdf
$dompdf = new Dompdf();


$dompdf-> loadHtml('

<! -- aqui entra o codigo html -->

<h3> Teste PDF </h3>

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