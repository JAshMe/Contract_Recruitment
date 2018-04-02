<?php
/**
 * Created by PhpStorm.
 * User: Family
 * Date: 4/2/2018
 * Time: 5:24 AM
 */

ob_start();
require 'printform.php';
$output = ob_get_clean();

require_once "lib/dompdf/autoload.inc.php";
use Dompdf\Dompdf;

//echo htmlentities($output);
$dompdf = new DOMPDF();
$dompdf->loadHtml($output);
$dompdf->render();

$output = $dompdf->output();
file_put_contents("file.pdf", $output);



//
//
//$output = file_get_contents('http://localhost/Contract_Recruitment/contract/printform.php?type=1');
//echo $output;