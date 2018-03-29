<?php
if(isset($_POST['submit'])){

    //collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
     $file1 = $_POST['file'];
	$file2 = $_POST['doc'];
    //check name is set
    if($name ==''){
        $error[] = 'Name is required';
    }
    
    //check for a valid email address
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $error[] = 'Please enter a valid email address';
    }
    
     if($file1 ==''){
        $error[] = 'PDF file is required';
    }

  
     if($file2 ==''){
        $error[] = 'DOC file is required';
    }
    //if no errors carry on
    if(!isset($error)){

        //create html of the data
        ob_start();
        ?>

        <h1>Data from form</h1>
        <p>Name: <?php echo $name;?></p>
        <p>Email: <?php echo $email;?></p>

        <?php 
        $body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

        include("mpdf60/mpdf.php");
        $mpdf=new \mPDF('c','A4','','' , 0, 0, 0, 0, 0, 0); 

        //write html to PDF
        $mpdf->WriteHTML($body);
 
        //output pdf
        //$mpdf->Output('demo.pdf','D');
         
        //open in browser
        // $mpdf->Output();
 

        //save to server
        $mpdf->Output("/opt/lampp/htdocs/mydata.pdf",'F');

        

       //doc2pdf
	$cmd1 = "sudo /usr/bin/doc2pdf $file2" ;

        $result2 = shell_exec($cmd1);
         
	//merge pdf
        $fileArray= array("/opt/lampp/htdocs/mydata.pdf","/opt/lampp/htdocs/a.pdf",$file1);

	$datadir = "/opt/lampp/htdocs/";
	$outputName = $datadir."merged.pdf";

	$cmd = "gs -q -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -sOutputFile=$outputName ";
	//Add each pdf file to the end of the command
	foreach($fileArray as $file) {
   	 $cmd .= $file." ";
	} 

	$result = shell_exec($cmd);




          
    }
}

/* /if their are errors display them
if(isset($error)){
    foreach($error as $error){
        echo "<p style='color:#ff0000'>$error</p>";
    }
} */

?> 

 <a href="merged.pdf" target="_blank">Preview</a>
<form action=' ' method='post'>
<p><label>Name</label><br><input type='text' name='name' value=''></p> 
<p><label>Email</label><br><input type='text' name='email' value=''></p> 
<p><input type='submit' name='submit' value='Submit'></p> 
</form>


