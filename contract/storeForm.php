<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 4/3/2018
 * Time: 10:03 PM
 */

session_start();
require_once ("included_classes/class_sql.php");
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
$kind = $_GET['kind'];
$db = new sqlfunctions();


require_once("./included_classes/class_misc.php");

$misc= new miscfunctions();

//fetching for files
$doc_10th = "doc_edu/$id"."_doc_10th.pdf";
$doc_12th = "doc_edu/$id"."_doc_12th.pdf";
$doc_ug = '';
$doc_dip = '';
$doc_pg = '';
$doc_dpg = '';
$doc_dug = '';

$query = "select user_id from diploma where user_id = '$id'";
$r = $db->process_query($query);
if(mysqli_num_rows($r)>0)
        $doc_dip = "doc_edu/$id"."_doc_dip.pdf";

$query = "select user_id from ug where user_id = '$id'";
$r = $db->process_query($query);
if(mysqli_num_rows($r)>0)
        $doc_ug = "doc_edu/$id"."_doc_ug.pdf";


$query = "select user_id from dug where user_id = '$id'";
$r = $db->process_query($query);
if(mysqli_num_rows($r)>0)
        $doc_pg = "doc_edu/$id"."_doc_dug.pdf";

$query = "select user_id from pg where user_id = '$id'";
$r = $db->process_query($query);
if(mysqli_num_rows($r)>0)
        $doc_pg = "doc_edu/$id"."_doc_pg.pdf";

$query = "select user_id from dpg where user_id = '$id'";
$r = $db->process_query($query);
if(mysqli_num_rows($r)>0)
        $doc_pg = "doc_edu/$id"."_doc_dpg.pdf";



//echo $doc_10th." ".$doc_12th." ".$doc_ug." ".$doc_exp;



//saving PDF form to server

$saved = saveForm($post_type);
if(!$saved)
        $misc->palert("Error in saving form to the server","home.php?val=app_post");


//merge files
$pdf = new PDFMerger;

$pdf->addPDF($saved,'all');
$pdf->addPDF($doc_10th, 'all');

$pdf->addPDF($doc_12th, 'all');
if($doc_dip) $pdf->addPDF($doc_dip,'all');
if($doc_ug) $pdf->addPDF($doc_ug, 'all');
if($doc_pg) $pdf->addPDF($doc_pg, 'all');
if($doc_dpg) $pdf->addPDF($doc_dpg, 'all');
if($doc_dug) $pdf->addPDF($doc_dug, 'all');

//adding experience pages

$expQuery = "select user_id,id from experience where user_id = '$id' ORDER by id desc";
$r = $db->process_query($expQuery);
while($row = $db->fetch_rows($r))
{
       $doc_exp = "doc_exp/$id"."_doc_exp".$row['id'].".pdf";
	   
        $pdf->addPDF($doc_exp, 'all');
}


$pdf->merge('file',"/var/www/html/academics/acadserver/academic_new/Contract_Recruitment/contract/final_app/$id"."_$post_type.pdf"); // generate the file

if($kind=="1")
        header("Location:printform.php?type=$post_type");
else
        header("Location:final_app/$id"."_$post_type.pdf");




//function to save the form to server
function saveForm($post_type)
{
        ob_start();
        $id = $_SESSION['user'];
        require_once( "printform".$post_type."_server.php");
        $output = ob_get_clean();

        $dompdf = new DOMPDF();
        $dompdf->loadHtml($output);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents("applications/".$id."_".$post_type.".pdf", $output);
        return "applications/".$id."_".$post_type.".pdf";

}


