<?php
  include 'session.php';
  include 'checksession-enthu.php';
  include'function.php';
  $mem_id = $_GET['id'];
if(isset($_SESSION['username'])){
    include 'dbconn.php';
    
    
    $username = $_SESSION['username'];
    //getuser($userid)
    $sql = "SELECT * FROM enthusiast WHERE username=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($username));
    $user = $stm->fetch();
    $seller = $_SESSION['id'] = $user['username'];
    $_SESSION['EnthusiastID'] = $user['EnthusiastID'];

    $fullname = ucfirst($user['name']);
    $_SESSION['fullname'] = $fullname;
    $_SESSION['user'] = $user['image'];

   

    $st = "SELECT * FROM entertainmentestablishment WHERE mem_id=?";
    $query = $con->prepare($st);
    $query->execute(array($mem_id));
    $establishment = $query->fetch();

    $exp = explode(",",$establishment['coordinates']);
    $lat = $exp[0];
    $long = $exp[1];  
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
     <script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(<?php echo $lat;?>,<?php echo $long;?>),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
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
      .box_esh span,.esh h3,h3{
        font-weight: 700;
        font-style: calibri;
        color:#782E53;

      }
      .container-fluid{
        background-color: #f2f2f2;
      }

      .thumbnail img{
        height: 350px;
        width:100%;
      }

      .thumbnail{
        width: auto;
        height:auto;
        margin-top: 75px;
      }
      p{
        line-height: 1.5em;
        position: justify;
      }
     
      .esh{
        line-height: 0.5em;
      }
  
    .nopadding {
       padding: 0 !important;
       margin: 0 !important;
    }
    </style>

</head>
<body>
<div class="container-fluid">
       
           
            
          
 
        <!-- Main content -->
       
            <div class="row " >
               <?php include('main-menu-enthu.php');?>
              
             
                <?php if(isset($message)){?>
                  <div class="alert alert-success">
                    <h4><?php echo $message;?></h4>
                 </div> 
              <?php } ?>

              
                
                  <div class="col-md-6 nopadding">
                    <div class="thumbnail" >
                  <img  src="user_files/<?php echo $establishment['name'];?>/profile_pic/<?php echo $establishment['image'];?>" > 
                    <div class="esh">
                         <a href="establishment1.php?id=<?php echo $establishment['mem_id'];?>" style="text-decoration: none;" target="_blank"><h3><?php echo $establishment['name'];?></h3> </a>
                        <p><?php echo $establishment['categoryid'];?></p>
                          
                      </div>
                   
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#reserve"><span class="glyphicon glyphicon-calendar" style="width:auto;"> </span>Reserve Now</button>

                        <!-- Modal -->
                        <div id="reserve" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header" style="background-color:#782E53;">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><span class="glyphicon glyphicon-calendar">&nbsp;</span>Reservation</h4>
                              </div>
                              <div class="modal-body">
                                <p>Some text in the modal.</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>
                       <button class="btn btn-info"><span class="glyphicon glyphicon-eye-open" style="width:auto;"> </span> Hours Open <?php echo date('g:i A',strtotime($establishment['timeopen']))."-".date('g:i A',strtotime($establishment['timeclose']));?></button>
                  </div>
                </div>
                <div class="col-md-6 nopadding">
                  <div class="thumbnail" >
                    <div id="googleMap" style="width:auto;height:350px;"></div>
                    <div class="row">
                      <div class="col-lg-6"><h3>Location </h3> <?php echo $establishment['eelat'];?></div>
                      <div class="col-lg-6"><img src="img/marker.jpg" style="width:60px;height:80px;float:right;margin-top:-55px;margin-left:-80px;"/></div>
                    </div>  
                  </div> 
                  <div class="thumbnail" style="margin-top:-16px;">
                    <div class="row">
                     <div class="col-lg-6"><img src="img/phone.png"  style="width:50px;height:50px;float:left;margin-top:3px;"/></div>
                     <div class="col-lg-6">  <h3>&nbsp;&nbsp;<?php echo $establishment['contact'];?></h3></div>
                    </div>
                    
                   </div> 
                   <div class="thumbnail" style="margin-top:-16px;">
                    <div class="row">
                    <div class="col-lg-6"><img src="img/gmail.ico" style="width:50px;height:50px;float:left;margin-top:3px;"/></div>
                     <div class="col-lg-6"> <h3> &nbsp;&nbsp; <?php echo $establishment['email'];?></h3></div>
                      </div>
                   </div> 
              </div>
        <!-- /.content-wrapper -->
              <?php
          include('footer-enthu.php');
        ?>
        </div>
      </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>

    