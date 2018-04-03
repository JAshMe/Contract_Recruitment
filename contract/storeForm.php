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

//include '../lib/pdfmerger/PDFMerger.php';
//
//$pdf = new PDFMerger;


if($_SERVER['REQUEST_METHOD']=='POST')
        die("<h2>Unauthorized Access</h2>");
if(!isset($_SESSION['user']))
        die("Please Login First!!");


$id=$_SESSION['user'];
$post_type = $_GET['type'];


require_once("./included_classes/class_misc.php");

$misc= new miscfunctions();



//saving PDF form to server

$saved = saveForm($post_type);

$pdf->addPDF('samplepdfs/one.pdf', '1, 3, 4')
        ->addPDF('samplepdfs/two.pdf', '1-2')
        ->addPDF('samplepdfs/three.pdf', 'all')
        ->merge('file', 'samplepdfs/TEST2.pdf'); // REPLACE 'file' WITH 'browser', 'download', 'string', or 'file' for output options

if($saved)
        $misc->palert("Error in saving form to the server","home.php?val=app_post");
else
        header("Location:printform.php?type=$post_type");






//function to save the form to server
function saveForm($post_type)
{
        ob_start();
        $id = $_SESSION['user'];
        require_once("printform".$post_type."_server.php");
        $output = ob_get_clean();

        $dompdf = new DOMPDF();
        $dompdf->loadHtml($output);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents("applications/".$id."_".$post_type.".pdf", $output);
        return true;

}
