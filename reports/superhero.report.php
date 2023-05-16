<?php

require_once '../vendor/autoload.php';
require_once '../models/Superhero.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {

    //Instancias clase Superhero
    $superhero = new Superhero();
    $datos = $superhero->listar($_GET['publisher_id']);
    $titulo = $_GET['titulo'];

    ob_start();

    //Archivos que componen PDF
    //Hoja de estilos
    include './estilos.report.html';
    //Archivos con datos (estáticos/dinámicos)
    include './superhero.data.php';

    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->writeHTML($content);
    $html2pdf->output('example01.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}