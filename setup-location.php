<?php
 include 'session.php';
  include 'checksession.php';
  include'function.php';
  $sc=0;
  $edit=0;
  //$aud=0;
  //$aud_e=0;
  //$aud_d=0;
  //$vid_e=0;
  //$vid_d=0;
  //$vid_down=0;
  //$txt_down=0;
  //$txt_e=0;
  //$txt_d=0;

  
  $invalid_event=false;
  //$invalid_audio=false;
  //$invalid_video=false;
  //$invalid_text=false;

  unset($_SESSION['eventbudgetid']);
  unset($_SESSION['alertmsg_event']);
  unset($_SESSION['alertmsg_announcement']);
  unset($_SESSION['alertmsg_services']);
  unset($_SESSION['alertmsg_rooms']);
  if(isset($_SESSION['eeid'])){
    include 'dbconn.php';
    $eeid = $_SESSION['eeid'];
    //getuser($userid)
    $sql = "SELECT * FROM entertainmentestablishment WHERE eeid=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($eeid));
    $user = $stm->fetch();
  //  $seller = $_SESSION['id'] = $user['eeid'];
    $_SESSION['eeid'] = $user['eeid'];

    $fullname = ucfirst($user['estalishment_name']);
    //include'sell_video.php';
    //include'sell_audio.php';
    include'event.php';
    //include'sell_text.php';

  if(isset($_POST['save'])){
     include 'dbconn.php';
    $lat = $_POST['lat'];
    $long = $_POST['long'];

    $coordinates = $lat.",".$long;
    $query = "UPDATE entertainmentestablishment SET lat=?,long=? WHERE eeid=?";
    $cmd = $con->prepare($query);
      if($cmd->execute(array($lat,$long,$user['eeid']))){
         header("location:dashboard.php");
      }else{
        echo "Error data query!";
      }
  }else{
   echo "error getting data!";

      }
    /// Fetch All establishment


  }

 /* $sell=0;
    if(isset($_POST['del_seller'])){

        $del = $_POST['del_seller'];
     
       $msg = delete_seller($del[$i]);
       
        $message=$msg;

    }
    $seller = all_seller();*/


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Establishments</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='img/mixx.png' rel='icon' type='image/x-icon'/> 
    <link rel="stylesheet" href="build/mediaelementplayer.css" />
    <script src="build/jquery.js"></script>
    <script src="build/mediaelement-and-player.min.js"></script>

     <script>
     $(document).ready(function(){
    // using jQuery
    $('video,audio').mediaelementplayer(/* Options */);
    });
    </script>
   

    <style type="text/css">

    .modal-header{background-color:#1975FF;color:white;}
    
    th{
      background-color:#1975FF;color:white;
    }
       figure {
        display: block;
        position: relative;
        float: left;
        overflow: hidden;
        margin: 0 0px 0px 0;
      }
      figcaption {
        position: absolute;
        background: black;
        background: rgba(0,0,0,0.75);
        color: white;
        height:38px;
        padding: 2px 2px;
        opacity: 0;
        -webkit-transition: all 0.6s ease;
        -moz-transition:    all 0.6s ease;
        -o-transition:      all 0.6s ease;
      }
      figure:hover figcaption {
        opacity: 1;
      }
      figure:before {
        content: "Modify";
        position: absolute;
        font-weight: 800;
        background: black;
        background: rgba(255,255,255,0.75);
        text-shadow: 0 0 5px white;
        color: red;
        width: 24px;
        height: 24px;
        -webkit-border-radius: 12px;
        -moz-border-radius:    12px;
        border-radius:         12px;
        text-align: center;
        font-size: 14px;
        line-height: 24px;
       
        opacity: 0.75;
      }
      figure:hover:before {
        opacity: 0;
      }

      img {
        cursor: default;
      }
      .cap-left:before {  bottom: 10px; left: 10px; }
      .cap-left figcaption { bottom: 0; left: -30%; }
      .cap-left:hover figcaption { left: 0; }

      .cap-right:before { bottom: 10px; right: 10px; }
      .cap-right figcaption { bottom: 0; right: -30%; }
      .cap-right:hover figcaption { right: 0; }

      .cap-top:before { top: 10px; left: 10px; }
      .cap-top figcaption { left: 0; top: -30%; }
      .cap-top:hover figcaption { top: 0; }

      .cap-bot:before { bottom: 10px; left: 10px; }
      .cap-bot figcaption { left: 0; bottom: -30%;}
      .cap-bot:hover figcaption { bottom: 0; }

      .scr {
                     /* Just for the demo          */
          overflow-x: auto;    /* Trigger vertical scroll    */
          overflow-y: hidden;  /* Hide the horizontal scroll */
      }
      td{
        padding: 6px;   
      }

      table label{

        font-family: helvetica;
        color:#949494;
      }

      table tr td strong{
        color:#1975FF;
      }

      .box_esh{
        border: 1px solid #b3b3b3;
        padding: 10px;
        height:50px;
        width: 100%;
        overflow: hidden;
        margin-top:72px;
        background-color: white;
      }
      .box_esh input{
        padding: 3px;
       

      }
      .box_esh span,.esh h4{
        font-weight: 900;
        font-style: calibri;
        color:#782E53;
      }
      .container-fluid{
        background-color: #f2f2f2;
      }
      h2{
         color:#782E53;
      }

      .thumbnail img{
        height: 200px;
        width:auto;
      }

      .thumbnail{
        width: 238px;
      }
      .esh p{
        margin-top: -2px;
        font-weight: 700;
        color: #808080;
       

      }
      a{

      }
      .esh{
        line-height: 0.5em;
      }
    </style>
<head>
<style type="text/css">
    .form-group{
      margin-left: 200px;
    }
</style>
</head>
<body>
<div class="container-fluid">    
        <!-- Main content -->
      <div class="row">
         <?php include('main-menu.php');?>
    
          <?php if(isset($message)){?>
            <div class="alert alert-success">
              <h4><?php echo $message;?></h4>
           </div> 
        <?php } ?>
          <br><br><br><br>
          <div class="col-lg-12">
           <h2 style="color:#782E53;">Set-Up Coordinates for Mapping</h2>
             <span>If you already know what is your coordinates for your establishment location Paste the latittude and Longitude form below otherwise click the link below.</span>
              <br>
              <br>
              <a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Get Coordinates(lattitude|longitude)</a>
              <br>
              <br>
            </div>  
         </div>
         <div class="row" style="background-color:white;">
          <div class="col-md-1">
          </div>
          <div class="col-md-10">
            <br>

              <h2>Enter Coordinates</h2>
              <form method="POST" class="form-horizontal" role="form">
                  <div class="form-group">
                      <label>Latittude</label>
                      
                      <input type="number" step="any" class="form-control" name="lat" id="lat"/>
                  </div>
                 
                   <div class="form-group">
                      <label>Longitude</label>
                      <input type="number" step="any" class="form-control" name="long" id="long"/>
                  </div>
                   <div class="form-group">
                     
                      <input type="submit" class="btn btn-primary"  name="save" />
                   </div> 
               </form> 
             </div>
         <div class="col-md-1">
          </div>
           </div>   
          
         </div>        
      

  </div>

                
        <!-- /.content-wrapper -->

  
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>

    