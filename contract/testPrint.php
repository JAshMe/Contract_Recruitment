<?php
/**
 * Created by PhpStorm.
 * User: Family
 * Date: 4/2/2018
 * Time: 5:24 AM
 */

ob_start();
require 'printform1_server.php';
$output = ob_get_clean();




require_once "../lib/dompdf/autoload.inc.php";
use Dompdf\Dompdf;

//echo htmlentities($output);
$dompdf = new DOMPDF();
//$dompdf->loadHtml($output);
//$html = '
//        <style>
//                @font-face {
//                font-family: \'Roboto Condensed\';
//                font-style: normal;
//                src: url(http://localhost/Contract_Recruitment/fonts/Roboto_Condensed/RobotoCondensed-Regular.ttf) format(\'truetype\');
//
//                }
//        </style>
//        <h3 style="font-family: \'Roboto Condensed\',sans-serif;">MOTILAL NEHRU NATIONAL INSTITUTE OF TECHNOLOGY</h3>
//';
//echo $html;
$dompdf->loadHtml($output);
$dompdf->render();
$dompdf->stream("text.pdf");

//$output = $dompdf->output();
//file_put_contents("file.pdf", $output);



//
//
//$output = file_get_contents('http://localhost/Contract_Recruitment/contract/printform.php?type=1');
//echo $output;