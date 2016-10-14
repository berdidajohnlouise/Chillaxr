<?php
  
 



 include'function.php';
  include 'dbconn.php';
    include 'session.php';
  unset($_SESSION['msg']);
  //include'loginck.php';
  //include 'budgetexec.php';
  if(isset($_SESSION ['eeid'])){
    

    $mem_id = $_SESSION['mem_id'];
    $con = dbconn();
    $sql = "SELECT * FROM entertainmentestablishment WHERE mem_id=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($mem_id));
    $user = $stm->fetch();
    $seller = $_SESSION['id'] = $user['mem_id'];
    $fullname = ucfirst($user['name']);
    $con = null;


  }
  



  

    

  
      
      
   ?>      
      
    


<!DOCTYPE html>
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
    <link href="css/style.css" rel="stylesheet">


    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>



    
   

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
            
            <?php include 'main-menu.php';
           ?>
        <br><br><br><br>
        <div class="row">
          <div class="col-md-12">
          
            <br><br>

            <form class="form-horizontal" role="form"   method="POST" enctype="multipart/form-data">
                 <div class="" style="color:#1975FF;font-family:cambria" align="center"><h4>Event Budget </h4>
                 </div>
                 <center>
                  <?php  include 'dbconn.php';
                 $sql = "SELECT name, description, price FROM eventbudget";
 $stm = $con->prepare($sql);
 $stm->execute();
 $results = $stm->fetchAll(PDO:: FETCH_ASSOC);
  ?>

                            
  <table class="table">
    <tr>
       <th> <?php foreach ($results as $row)    echo "<center>"; echo $row['name']; ?></th>  
      
    <?php
  
  $count = 1;
foreach( $results as $row ) 
{
    if ($count%2== 1)
    {  
        echo '<div class="jumbotron">'; 
         //echo "";
         echo "<br>" ;
         echo $row['name'];
         echo "\r\n";
          echo   "Description: &nbsp;";
          echo $row['description'];
    
    echo "<br><br>";
      echo   "Price: &nbsp;";
      echo $row['price'];
    }
    //echo $kicks->brand;
    if ($count%2 == 0)
    {
        echo "</div>";
    }
    $count++;
}
if ($count%2 != 1) echo "</div>";
                  
  

?>

  <?php  $eeid ="1"; $events = getbudget($eeid);  ?>
                              <table class="table">
                                <tr><td>Name</td> <td> <div class="scrollable">Description</td></div><td>Price</td><td>Action</td></tr>
                              <?php  foreach ($events as $eve) { ?>
                                  <tr><td><?php echo $eve['name'];?></td> <td><?php echo $eve['description'];?> </td><td><?php echo $eve['price'];?></td><td>Action</td></tr>
                              <?php }  ?>
</table>
    </center>

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