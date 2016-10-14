<?php
  include'function.php';
  include 'session-enthu.php';
  unset($_SESSION['msg']);
  include'loginck-enthu.php';

  if(isset($_SESSION['EnthusiastID'])){

    $EnthusiastID = $_SESSION['EnthusiastID'];
    $con = dbconn();
    $sql = "SELECT * FROM enthusiast WHERE EnthusiastID=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($EnthusiastID));
    $user = $stm->fetch();
    $seller = $_SESSION['id'] = $user['EnthusiastID'];
    $fullname = ucfirst($user['name']);
    $con = null;
  }
  if(isset($_POST['signup'])){
    header('location:signup.php');
    exit();
  }
  


  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <title>Chillaxr</title>

    <!-- Bootstrap core CSS -->
    <link rel="shortcut img" href="img/chillaxr.jpg">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script> 
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">

     
   
   
    <br/>
    <br/>
    <br/>
    <br/>

    <div class="container">
      <div class="row">
      

 <div class="row">
        
        <div class="col-md-12">
          
        
          <?php include('main-menu-enthu.php');?>
        </div>
      </div>

      <div class="jumbotron">
  <center><h1 style="color:white"><b>chillaxr</b></h1></center>
  <center><p>A Software-as-a Service for Group Entertainment Service Providers</p></center>
  <center><p><a href="signup.php" class="btn btn-primary btn-lg" href="#" role="button">Subscribe Now <span class="glyphicon glyphicon-hand-right"></span></a></p></center>
    </div>

</div>
</div>




<footer>
 
       <h4> <center><p>&copy; 20014-2015 All rights reserved - Chillaxr.com  ® <br />
        <small>Designed by: <a href=""> Todders Group</a></small>
         </p>
        </center>
       </h4>

</footer>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
