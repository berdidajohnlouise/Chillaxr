<?php
	include 'session.php';
	include 'checksession.php';
	include'function.php';


?>

 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event Budget</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   <link rel="shortcut icon" href="ico/camera.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>


     <link rel="stylesheet" type="text/css" href="css/tooltipster.css" />

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>

  </head>

   <body>
         <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
        <br><br><br><br>
        <div class="row">
          <div class="col-md-12">
              
            <?php include('main-menu.php');?>
            <br><br>

            <div class="row">
            <div class="col-md-3">
       
                          <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.4s">
                             <img src="user_files/<?php echo $fullname;?>/services/<?php echo $user['image']; ?>" height="200px" width="100%"/>  
            </div>
          </div>
        </div>



          </div></div></div></div></div>    
            
    </body>
 </html>     	