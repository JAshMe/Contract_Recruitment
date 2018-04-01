

   
       
        <div id="headerbg" class="col-md-12" style="padding:1%"> 
         	<div class="col-md-2 col-xs-4 col-xs-offset-4" style="margin-left:40px;width:150px">
            	<img class="img-responsive" src="logo-MNNIT.png" style="height:150px">
            </div>
            <div class="col-md-9">
            <center><h3 style="color:white;font-family: 'Graduate', cursive;margin-left:50px; line-height:30px;">MOTILAL NEHRU NATIONAL INSTITUTE OF TECHNOLOGY<br />ALLAHABAD<br /></h3></center>
            </div>
        </div>
        
        
    
    <div class="container-fluid" style="padding-top:10px">
        <div class="col-xs-offset-2 col-xs-8 col-md-offset-0 col-md-3" style="margin-top:3%">
            <div class="panel panel-primary">
                <div class="panel panel-heading" style="border-bottom-left-radius:0; border-bottom-right-radius:0; margin-bottom:0px;">
                        <h4 align="center">
                        	Contents
                        </h4>
                </div>
                <div class="panel panel-body" style="padding:0px; margin:0px;">
                	<div class="well" style="margin:0px;">
                        <div class="list-group">           	
                            <a class="list-group-item" name="logout" href="./logout.php" style="background:#E53935;color:white">Logout <span class="glyphicon glyphicon-off"></span></a>
                            <a class="list-group-item <?php if(isset($_GET['val']) && $_GET['val']=='perinfo' ) echo "active"; ?> " name="profile" href="./home.php?val=perinfo" >Personal Information</a>
                            <a class="list-group-item <?php if(isset($_GET['val']) && $_GET['val']=='image' ) echo "active"; ?>" id="midframe" href="./home.php?val=image">Upload Photograph</a>
                            <a class="list-group-item <?php if(isset($_GET['val']) && $_GET['val']=='education_qual' ) echo "active"; ?>" id="midframe" href="./home.php?val=education_qual">Educational Qualification</a>
                            <a class="list-group-item <?php if(isset($_GET['val']) && $_GET['val']=='present_emp' ) echo "active"; ?>" id="midframe" href="./home.php?val=present_emp">Present Employer</a>
                            <a class="list-group-item <?php if(isset($_GET['val']) && $_GET['val']=='work_exp' ) echo "active"; ?>" id="midframe" href="./home.php?val=work_exp">Work Experience</a>
                            <a class="list-group-item <?php if(isset($_GET['val']) && $_GET['val']=='reference' ) echo "active"; ?> " id="midframe" href="./home.php?val=reference">Reference</a>
                            <a class="list-group-item <?php if(isset($_GET['val']) && $_GET['val']=='other_info' ) echo "active"; ?> " id="midframe" href="./home.php?val=post_detail">Details Regarding Posts</a>
                            <a class="list-group-item <?php if(isset($_GET['val']) && $_GET['val']=='other_info' ) echo "active"; ?> " id="midframe" href="./home.php?val=other_info">Any Other Information</a>
                                <a class="list-group-item <?php

                                                $verdict = verify_fill($_SESSION['user']);
                                                $_SESSION['verdict']=$verdict;
                                                if($verdict!="ok")
                                                        echo "disabled\" href=\"#\" data-toggle=\"tooltip\" title=\"Please fill $verdict before applying for any post.\" ";
                                                else echo " \" href=\"./home.php?val=app_post";
                                                 if(isset($_GET['val']) && $_GET['val']=='app_post' ) echo "active";
                                                ?>" id="midframe">Apply For Post</a>
                                <a class="list-group-item <?php if(isset($_GET['val']) && $_GET['val']=='print' ) echo "active"; ?> " id="midframe" href="./home.php?val=print">Print Form</a>
                            <a class="list-group-item <?php if(isset($_GET['val']) && $_GET['val']=='contact' ) echo "active"; ?> " id="midframe" href="./home.php?val=contact">Contact Us</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
            <script>
                    $(document).ready(function(){
                            $('[data-toggle="tooltip"]').tooltip();
                    });
            </script>
                                                   