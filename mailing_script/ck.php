  <?php 
 include ("class.phpmailer.php");
include ("class.smtp.php");
echo 1;
$mail = new PHPMailer ( );
$mail->IsSMTP ();
$mail->Host = "172.31.100.9"; // SMTP server
$mail->SMTPAuth = false; // enable SMTP authentication
$mail->SMTPSecure = "tls";
$mail->Port = 25; // set the SMTP port for the  server
$mail->Username = "placement"; // SMTP account username
$mail->Password = "abcd"; // SMTP account password
$mail->From = 'placement@mnnit.ac.in';
$mail->FromName = 'TPO';
$mail->AddAddress( "alokmaurya825@gmail.com");
$mail->Subject = "Password Retrieval";	
$mail->Body = "BODY";
// Send and verify
if (! $mail->Send ()) {
echo "no";
}
else echo "y";  


?>  