
<?php
include("../session.php");
if(!isset($_SESSION['id'])){

    echo "<script language='JavaScript' type='text/JavaScript'>
    <!--
    alert('You must Login');
    //-->
    </script>
    ";

   header("location:index.php");
    exit();
  } 
    if(isset($_GET['rec'])){
     $rec = $_GET['rec'];
     if(isset($_GET['id'])){
      $mem_id = $_GET['id'];
     }
    }

   if(isset($_POST['logout'])){
      session_unset();
      session_destroy();

    header("location:index.php");
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
    <style>
      .modal-header{
        background-color: #3385FF;
        color :white;
      }
      h4 b{
        color:#9E9E9E;
      }
       .modal-body p{
        margin-left:20px;
        font-family: calibri;
        font-size: 20px;
        color:#4F4F4F
      }
      a{
        text-decoration: none;
        color:black;
        cursor: pointer;
      }
      .alert .alert-success label{
        
         font-size: 50px;
      }

     .alert span{
        font-size: 13px;
      }
    </style>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="admin.php?rec=useracc" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Chillaxr</B></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Chillaxr</b>Admin</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
                  
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/villarin.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/villarin.jpg" class="img-circle" alt="User Image">
                    <p>
                     Admin- Chillaxr Developer
                      <small>University of Cebu</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="row">
                    <div class="col-lg-12">
                      <form method="POST">
                      <button type="submit" name="logout" class="btn btn-default btn-flat btn-justify">Sign out</button>
                      </form>
                    </div>
                  </div>
                  </li>
                </ul>
              </li>
             
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/villarin.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <br><br>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li <?php if($rec=="useracc"){?> class="active"<?php } ?>>
              <a href="admin.php?rec=useracc">
                <i class="fa fa-user"></i>
                <span>Subscriber Accounts</span>
              </a>
            </li>
			
			<ul class="nav navbar-nav">
            <li <?php if($rec=="category"){?> class="active"<?php } ?>>
              <a href="" data-toggle="dropdown" class="dropdown-toggle">   <i class="fa fa-inbox"></i>
                <span>Category Accounts</span> <b class="caret"></b>
              
				   
              <ul class="dropdown-menu">
			 <li>
              <a href="admin.php?rec=addcategory">Add </a>
            </li>
			
            <li>
              <a href="admin.php?rec=category">View </a>	
            </li> 
            
			
              </a>
          
         

		
		 
            </ul>
          </ul>
		  </ul> 
        </section>
        <!-- /.sidebar -->
      </aside>
      <?php 

         

          switch ($rec) {
			  
            case 'addcategory':
			  include 'addcategory.php';
            break;
			  case 'category':
              include 'category.php';
            break;
            case 'userrec':
              include 'userrec.php';
            break;
            
            default:
                include 'seller.php';
           break;
          }

      ?>
      
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="#">Chillaxr Store</a>.</strong> All rights reserved.
      </footer>

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
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
        $("#example2").DataTable();
        $("#example3").DataTable();
        $("#example4").DataTable();
        $('#example5').DataTable({
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
