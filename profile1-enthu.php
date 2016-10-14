<?php  include("function.php"); 


  $sell=0;
    if(isset($_POST['del_seller'])){

        $del = $_POST['del_seller'];
     
       $msg = delete_seller($del[$i]);
       
        $message=$msg;

    }
    $seller = all_seller();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

   <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script> 



    
   

    <style>
    div.scrollable{width:100%; height:100%; margin:0; padding: 0; overflow:auto;}
   
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

body 
    { 
      background-color: #F0F8FF; 
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
     
    }
  

    </style>
 
 </head>
  <body>
    
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
            
            <?php include ("../main-menu.php");
           ?>
        <br><br><br><br>
        <div class="row">
          <div class="col-md-12">
           
           <div class="row">
            <div class="col-md-3">
              <?php
                  foreach ($seller as $seller) {
                    

                       //  $purchases = get_sales($seller['mem_id']);
                       
                                      get_seller( $seller['eeid']);


                      ?>
              
                  
                          <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.4s">
                             <img  src="user_files-enthu/<?php echo $seller['name'];?>/profile_pic/<?php echo $seller['image'];?>" height="200" width="200"/> 
 

                             </div>      
                             <br>
                        
                         
                        
                 <br>
                 <div class="table-responsive">
                 <table  class="table table-hover" class="scr" >
                     <tr>
                          <td><strong>Type of Establishment:</strong></td>
                          <td> <?php echo $seller['categoryid'];?></td>                              
                      </tr>
 
                           <tr>
                          <td><strong>Establishment Name:</strong></td>
                          <td><?php echo $seller['name']; ?></td>                              
                      </tr>
                      <tr>
                          <td><strong>Email:</strong></td>
                          <td ><?php echo $seller['email'];?></td>
                      </tr>
                      <tr>
                          <td><strong>Contact No.:</strong></td>
                          <td ><?php echo $seller['contact']; ?></td>
                      </tr>

                            <tr>
                          <td><strong>Establishment Address:</strong></td>
                          <td ><?php echo $seller['eelat']; ?></td>
                      </tr>


                      <tr>
                          <td><strong>Owner Name:</strong></td>
                          <td ><?php echo $seller['owner']; ?></td>
                      </tr>

                       <tr>
                          <td><strong>Time Open:</strong></td>
                          
                          <td ><?php echo date('g:i A',strtotime($seller['timeopen']));?></td>
                      </tr>

                       <tr>
                          <td><strong>Time Close:</strong></td>
                          <td ><?php echo date('g:i A',strtotime($seller['timeclose']));?></td>
                      </tr>
                     
                  </table>
              </div>
                  <?php } ?>
              
                </div>
                  <br><br><br>
            <div class="col-md-9">
              <!--Code for Tab-pane --> 
                <div class="tabbable" id="tabs-870796">
                  <ul class="nav nav-tabs">
                    <li <?php if((!isset($_POST['upload_event'])) && (!isset($_POST['event_update'])) ){?>class="active"<?php } ?>>
                      <a href="#panel-event" data-toggle="tab"><span class="glyphicon glyphicon-list-alt"></span><label style="padding-left:3px">Event Budget</label></a>
                    </li>
                    
                    <li <?php if(isset($_POST['upload_announcement'])||(isset($_POST['announcement_update']))||(isset($_POST['announcement_delete']))){ ?>class="active" <?php } ?>>
                      <a href="#panel-announcement" data-toggle="tab"><span class="glyphicon glyphicon-list"></span><label style="padding-left:3px">Announcement<label></a>
                    </li>
                    
                    <li <?php if(isset($_POST['upload_reservation'])||(isset($_POST['reservation_update']))||(isset($_POST['reservation_delete']))){ ?>class="active" <?php } ?>>
                      <a href="#panel-reservation" data-toggle="tab"><span class="glyphicon glyphicon-calendar"></span><label style="padding-left:3px">Reservation<label></a>
                    </li>

                    <li <?php if(isset($_POST['upload_services'])||(isset($_POST['services_update']))||(isset($_POST['services_delete']))){ ?>class="active" <?php } ?>>
                      <a href="#panel-services" data-toggle="tab"><span class="glyphicon glyphicon-align-justify"></span><label style="padding-left:3px">Services<label></a>
                    </li>

                    <li <?php if(isset($_POST['upload_rooms'])||(isset($_POST['rooms_update']))||(isset($_POST['rooms_delete']))){ ?>class="active" <?php } ?>>
                      <a href="#panel-rooms" data-toggle="tab"><span class="glyphicon glyphicon-bed"></span><label style="padding-left:3px">Rooms<label></a>
                    </li>
                    
                  </ul>
                <div class="tab-content">
                  
                    <!--  Tab contennt eventbudgets-->
                    <div class="tab-pane <?php if((!isset($_POST['upload_announcement'])) && (!isset($_POST['announcement_update'])) && (!isset($_POST['announcement_delete']))){?>active<?php } ?>" id="panel-event">
                      Event budgets here...
                    </div>        
                    <!--  Tab contennt announcement-->
                    <!-- <div class="tab-pane <?php if((!isset($_POST['upload_announcement'])) && (!isset($_POST['announcement_update'])) && (!isset($_POST['announcement_delete']))){?>active<?php } ?>" id="panel-announcement"> -->
                      <div class="tab-pane" id="panel-announcement">  
                                              Announcements here
                      </div>

                    <!--  Tab contennt reservation-->
                    <!-- <div class="tab-pane <?php if((!isset($_POST['upload_reservation'])) && (!isset($_POST['reservation_update'])) && (!isset($_POST['reservation_delete']))){?>active<?php } ?>" id="panel-reservation"> -->

                      <div class="tab-pane" id= "panel-reservation">
                      Reservation records hereKay love man nako si Park Hyomin HAHAHA
                               <?php  //include 'calendar-index2.php';?>
            
                            
                      </div> 
                    <!-- </div> -->

                    <!--  Tab contennt rooms-->
                    <div class="tab-pane" id="panel-rooms">
                      <h3>Room nako na pink(Room details here by estab)</h3>

                    </div>

                    <!--  Tab contennt services -->
                    <!-- <div class="tab-pane <?php if((!isset($_POST['upload_services'])) && (!isset($_POST['services_update'])) && (!isset($_POST['services_delete']))){?>active<?php } ?>" id="panel-services"> -->
                      <div class="tab-pane" id= "panel-services">
                        <?php   //include 'view-services.php?'; ?>

                      </div>
                    <!-- </div>  -->  


                    
                    
 

    <script>
    $(document).ready(function(){
      
          $('[data-toggle="popover"]').popover();   
        
          $(".btn-info").click(function(){
            $(".collapse").collapse('toggle');
          });

          
      });
    </script>
    
        </div>
      </div>
    </div>
  </div>      

</body>
</html>