
<?php
 include("../function.php");
 include("../session.php");

  
    if(isset($_POST['login'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      admin_login($username,$password);
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chillaxr | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <style type="text/css">
    .modal-header{background-color:#1975FF;color:white;}
    .inner-addon { 
    position: relative; 

  }

  /* style icon */
  .inner-addon .glyphicon {
    background-color:#1975FF;color:white;
    position: absolute;
    padding: 10px;
   margin-top: -1px;  
    pointer-events: none;
    
  }

  /* align icon */
  .left-addon .glyphicon  { left:  0px;}
  .right-addon .glyphicon { right: 0px;}

  /* add padding  */
  .left-addon input  { padding-left:  40px; }
  .right-addon input { padding-right: 40px; }
    
    .modal-header{
        background-color: #3385FF;
        color :white;
      }
      .box{
        border-top-color:#1975FF;
      }

    .main-header{
        color:grey;
        text-align: center;
      }
      body{
        background-color: #E8E8E8;
      }
      .box-title{
        color:#3385FF; 
        
      }
     
  </style>

      
   

  </head>
  <body >
    <div class="wrapper">
      <header class="main-header">
         <div class="row">
            <br>
            <br>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
        <h2><b>Chillaxr Store Admin</b></h2>
      </div>
      <div class="col-md-4">
            </div>
      </div>
      </header>
      
    
      <!-- Left side column. contains the logo and sidebar -->
       <section class="content">
          <div class="row">

            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <!-- small box -->
              
                <div class="box">
                  <div class="box-header">
                    <div class="row">

                      <div class="col-md-4">
                      </div>
                      <div class="col-md-6">
                    <h2 class="box-title"><b>Admin Login</b></h2>
                  </div>
                  <div class="col-md-2">
                      </div>
                  </div>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <form class="form-horizontal"  role="form" method="POST">
                      

                  <div class="form-group">
                     
                    
                    <div class="col-md-12" >
                      <div class="inner-addon left-addon">
                      <i class="glyphicon glyphicon-tag "></i><input class="form-control" id="username" type="text" name="username" placeholder="Username"/>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                     
                    
                    <div class="col-md-12">
                      <div class="inner-addon left-addon">
                      <i class="glyphicon glyphicon-lock "></i>
                      <input class="form-control" id="password" type="password" name="password" placeholder="Password">
                      </div>
                    </div>
                  </div>
                 
                  

                  <div class="form-group">
                    <div class="col-md-12">
                       
                       
                        <button type="submit" class="btn btn-md btn-primary btn-justified" name="login" style="width:100%" >
                          Log in
                        </button>
                      
                      
                    </div>
                  </div>
                </form>

                  </div>
                </div>
             

            </div><!-- ./col -->
             <div class="col-md-4">
            </div>
          </div>
        </section>
    
      
     

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
   
      $(function () {
       
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
