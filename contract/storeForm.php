<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 4/3/2018
 * Time: 10:03 PM
 */

session_start();
require_once("../lib/dompdf/autoload.inc.php");
use Dompdf\Dompdf;

require_once ("../lib/PDFMerger/PDFMerger.php");
use PDFMerger\PDFMerger;
//


if($_SERVER['REQUEST_METHOD']=='POST')
        die("<h2>Unauthorized Access</h2>");
if(!isset($_SESSION['user']))
        die("Please Login First!!");


$id=$_SESSION['user'];
$post_type = $_GET['type'];


require_once("./included_classes/class_misc.php");

$misc= new miscfunctions();

//fetching for files
$doc_10th = "doc_edu/$id"."_doc_10th.pdf";
$doc_12th = "doc_edu/$id"."_doc_12th.pdf";
$doc_ug = "doc_edu/$id"."_doc_ug.pdf";
$doc_exp = "doc_exp/$id"."_doc_exp1.pdf";


echo $doc_10th." ".$doc_12th." ".$doc_ug." ".$doc_exp;



//saving PDF form to server

$saved = saveForm($post_type);


//merge files
$pdf = new PDFMerger;

$pdf->addPDF($saved,'all');
$pdf->addPDF($doc_10th, 'all');
$pdf->addPDF($doc_12th, 'all');
$pdf->addPDF($doc_ug, 'all');
$pdf->addPDF($doc_exp, 'all');

$pdf->merge('file',"/I:/Xampp/htdocs/Contract_Recruitment/contract/final_app/$id"."_$post_type.pdf"); // generate the file




if(!$saved)
        $misc->palert("Error in saving form to the server","home.php?val=app_post");
else
        header("Location:printform.php?type=$post_type");






//function to save the form to server
function saveForm($post_type)
{
//        ob_start();
        $id = $_SESSION['user'];
//        require_once("printform".$post_type."_server.php");
//        $output = ob_get_clean();
//
//        $dompdf = new DOMPDF();
//        $dompdf->loadHtml($output);
//        $dompdf->render();
//        $output = $dompdf->output();
//        file_put_contents("applications/".$id."_".$post_type.".pdf", $output);
        return "applications/".$id."_".$post_type.".pdf";

}


