<?php
	include 'session.php';
	include 'checksession.php';
	include'function.php';


	$invalid_event=false;
	$invalid_rooms=false;
	$invalid_announcement=false;
	$invalid_services=false;
	//$invalid_audio=false;
	//$invalid_video=false;
	//$invalid_text=false;

	unset($_SESSION['eventbudgetid']);
	unset($_SESSION['alertmsg_event']);
	unset($_SESSION['alertmsg_announcement']);
	unset($_SESSION['alertmsg_services']);
	unset($_SESSION['alertmsg_rooms']);
	unset($_SESSION['alertmsg_img']);
	if(isset($_SESSION['eeid'])){

		include 'dbconn.php';

		$eeid = $_SESSION['eeid'];
		//getuser($userid)
		$sql = "SELECT * FROM entertainmentestablishment WHERE eeid=?";
		$stm = $con->prepare($sql);
		$stm->execute(array($eeid));
		$user = $stm->fetch();
	//	$seller = $_SESSION['id'] = $user['eeid'];
		$_SESSION['eeid'] = $user['eeid'];

		$fullname = ucfirst($user['establishment_name']);

		/*if($user['lat'] == 0){
			header("location:setup-location.php");
		}*/
		//include'sell_video.php';
		//include'sell_audio.php';
		include'event.php';
		include 'room1.php';
		//include'sell_text.php';
		if(isset($_POST['delete'])){
			$del = $_POST['delete'];
			del_post_event($del);

		}
		if(isset($_POST['update'])){
			$eventbudgetid = $_POST['update'];
			//$name = $_POST['name'];
			$price = $_POST['price'];
			$description = $_POST['description'];
			update_post_event($eventbudgetid,$price,$description);


		}

        if(isset($_POST['confirm'])){
           $status = $_POST['confirm'];
            $reservation = $_POST['resid'];
            update_reservation($status,$reservation);


        }
        if(isset($_POST['cancel'])){
            $status = $_POST['cancel'];
            $reservation = $_POST['resid'];
            update_reservation($status,$reservation);


        }
        if(isset($_POST['noshow'])){
            $status = $_POST['noshow'];
            $reservation = $_POST['resid'];
            update_reservation($status,$reservation);


        }

		if(isset($_POST['update_rooms'])){
			$roomid = $_POST['update_rooms'];

			$room_capacity = $_POST['room_capacity'];

			$price = $_POST['price'];
			update_post_room($roomid,$room_capacity,$price);


		}
		if(isset($_POST['delete'])){
			$del = $_POST['delete'];
			del_post_room($del);

		}

        if(isset($_POST['map'])){
            $lat = $_POST['lat'];
            $long = $_POST['long'];

            $con = dbconn();
            $sql = "UPDATE entertainmentestablishment SET lattitude=?,longitude=? WHERE eeid=?";
            $stm = $con->prepare($sql);
            if($stm->execute(array($lat,$long,$user['eeid']))){
                $_SESSION['msg'] = "Location Map Has been Set!";
                header("location:dashboard.php");
            }
            $con = null;
        }

		include 'view_user_event.php';
		include 'view_user_room.php';

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="build/mediaelementplayer.css" />

      <link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="admin/plugins/datatables/dataTables.bootstrap.css">
      <link rel="stylesheet" href="MMSAdmin/plugins/datepicker/datepicker3.css.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="admin/dist/css/skins/_all-skins.min.css">


      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <script src="build/jquery.js"></script>


      <style type="text/css">
          th{
              background-color:#1975FF;color:white;
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
      }
      </style>
    <!-- <script>
          function search(str) {
            if (str.length==0) {
              document.getElementById("searchOuput").innerHTML="";
              return;
            }
            if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
            } else {  // code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
              if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById("searchOuput").innerHTML=xmlhttp.responseText;
              }
            }
            xmlhttp.open("GET","search.php?q="+str,true);
            xmlhttp.send();
          }
  </script>//-->

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">


  <header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Chi</b>ll</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Chilla</b>xr</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
  <!-- Messages: style can be found in dropdown.less-->

  <!-- User Account: style can be found in dropdown.less -->
  <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="user_files/<?php echo $fullname;?>/profile_pic/<?php echo $user['establishment_image']; ?>" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo $fullname;?></span>
      </a>
      <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
              <img src="user_files/<?php echo $fullname;?>/profile_pic/<?php echo $user['establishment_image']; ?>" class="img-circle" alt="User Image">
              <p>
                  <?php echo $fullname;?>
                  <small>Member since Nov. 2012</small>
              </p>
          </li>

          <!-- Menu Body -->
          <li class="user-body">
              <div class="col-xs-4 text-center">
              <form role="form">
                  <a href="#" data-toggle="modal" data-target="#myModal">
                      <?php
                          $eeid = $_SESSION['eeid'];
                          $numoffollow = getnumoffollow($eeid);
                          echo $numoffollow;
                      ?>
                      Followers
                  </a>
                  <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Followers</h4>
                              </div>
                              <div class="modal-body">
                                  <?php
                                    $viewfollow = get_all_followers($_SESSION['eeid']);
                                    foreach($viewfollow as $follower){
                                        $userfoll = $follower['user'];
                                        $userfollower = get_view_all_followers($userfoll);
                                        echo "<img src='user_files-enthu/".$userfollower['enthusiast_name']."/profile_pic/".$userfollower['enthusiast_image']."' class='user-image' alt='User Image'>";
                                        echo "<p>".$userfollower['enthusiast_name']."</p>";
                                    }
                                  ?>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>


              </div>

             <!-- <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
              </div>-->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
              <div class="pull-left">
                  <a href="edit-profile.php" class="btn btn-default btn-flat">Profile</a>
              </div>

              <div class="pull-left" style="margin-left: 4%">
                  <a href="dashboard.php" class="btn btn-default btn-flat">Dashboard</a>
              </div>
              <div class="pull-left"  style="margin-left: 3%">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>

          </li>
      </ul>
  </li>
  <!-- Control Sidebar Toggle Button -->
  <li>
      <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
                  <img src="user_files/<?php echo $fullname;?>/profile_pic/<?php if(!empty($user['establishment_image'])){echo $user['establishment_image'];}else{echo "gravatar.jpg";} ?>" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                  <p><?php echo $fullname;?></p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
              </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="active">
                  <a href="#">
                     <span>Dashboard</span> <i class="glyphicon glyphicon-dashboard pull-right"></i>
                  </a>
              </li>


              <li>
                  <a href="event-budget.php">
                     <span>Packages</span> <i class="glyphicon glyphicon-credit-card pull-right"></i>
                  </a>
              </li>

              <li>
                  <a href="room.php">
                      <span>Rooms</span> <i class="glyphicon glyphicon-home pull-right"></i>
                  </a>
              </li>

              <li>
                  <a href="announcement.php">
                     <span>Announcement</span> <i class="glyphicon glyphicon-bullhorn pull-right"></i>
                  </a>
              </li>
              <li>
                  <a href="product.php">
                      <span>Product</span> <i class="glyphicon glyphicon-list-alt pull-right"></i>
                  </a>
              </li>


          </ul>
      </section>
      <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
          Dashboard
          <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
      </ol>
  </section>

  <!-- Main content -->
  <section class="content">
  <div id="map" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
              <form role="form" method="post">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><i class="glyphicon glyphicon-map-marker"></i>&nbsp;&nbsp;Set-Up Map Location</h4>
              </div>
              <div class="modal-body">

                  <div class="form-group">

                      <div class="col-sm-12">
                          <label for="inputEmail3" class=" control-label"><i class="fa fa-map"></i>&nbsp;&nbsp;Lattiude</label>
                      </div>
                      <div class="col-sm-12">
                          <input type="text" placeholder="Lattitude" class="form-control" name="lat" >

                      </div>
                  </div>
                  <div class="col-sm-12">
                      <br>
                  </div>

                  <div  class="form-group">

                      <div class="col-sm-12">
                          <label for="inputEmail3" class=" control-label"><i class="fa fa-map"></i>&nbsp;&nbsp;Longitude</label>
                      </div>
                      <div class="col-sm-12">
                          <input type="text" placeholder="Longitude" class="form-control" name="long" >

                          <br>



                      </div>

                  </div>
              </div>
              <div class="modal-footer">
                  <div class="col-sm-8">
                  <small class="pull-left">You want to Set-Up your Map Location?</small>
                  <br><small class="pull-left" >To be more accurate get your coordinates here.&nbsp;<a href="http://www.latlong.net" target="_blank">www.latlong.net</a></small>
                    </div>
                  <div class="col-sm-4">
                  <button type="submit" name="map" class="btn btn-info">Set-Up</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Later</button>
                </div>
              </div>
                  </form>
          </div>

      </div>
  </div>

  <!-- Small boxes (Stat box) -->
  <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
                  <h3>
                    <?php
                      $cntcan = get_count_cancel($_SESSION['eeid'], "4");
                      echo $cntcan;
                    ?>
                  </h3>
                  <p>Reservation</p>
              </div>
              <div class="icon">
                  <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Reserved <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div><!-- ./col -->
     <!-- <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-green">
              <div class="inner">
                  <h3>
                    <?php
                      $cntcan //= get_count_cancel($_SESSION['eeid'], "3");
                      //echo $cntcan;
                    ?>
                  </h3>
                  <p>No Show</p>
              </div>
              <div class="icon">
                  <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Show<i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
              <div class="inner">
                  <h3>
                    <?php
                      $cntcan = get_count_cancel($_SESSION['eeid'], "2");
                      echo $cntcan;
                    ?>
                  </h3>
                  <p>Confirmed</p>
              </div>
              <div class="icon">
                  <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner">
                  <h3>
                    <?php
                      $cntcan = get_count_cancel($_SESSION['eeid'], "1");
                      echo $cntcan;
                    ?>
                  </h3>
                  <p>Cancelled</p>
              </div>
              <div class="icon">
                  <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Cancelled<i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div><!-- ./col -->
  </div><!-- /.row -->
  <!-- Main row -->
  <div class="row">
  <!-- Left col -->
  <section class="col-lg-12 connectedSortable">
  <!-- Custom tabs (Charts with tabs)-->


  <!-- TO DO List -->
  <div class="box box-primary">
      <div class="box-header bg-light-blue-gradient">
          <i class="fa fa-calendar"></i>
          <h3 class="box-title">Reservation List</h3>
          <div class="pull-right">
            <form method="POST">
              <button class="btn btn-warning" type="submit" name="search">Search Code:</button>
              <input type="text" id="resv_code" placeholder="Code" style="color:#000" name="code"/>
            </form>
          </div>

      </div><!-- /.box-header -->
      <div class="box-body">
          <table id="example1" class="table ">
              <thead class="bg-aqua color-info">
              <tr >
                  <th>Customer Name</th>
                  <th>Package</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Hour</th>
                  <th>Status</th>

                  <th>Reservation Code</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
                    <?php
                        if(isset($_POST["search"])){
                        $reservations = get_reservation_by_resv_code($_POST["code"]);
                        }else{
                        $reservations = get_reservation_by_estab($_SESSION['eeid']);
                        }
                        foreach($reservations as $reservation){
                            $name = get_enthu_name($reservation['EnthusiastID']);
                            $status = get_reservation_status($reservation['reservation_status']);
                            ?>
                      <tr>

                      <td><?php echo $name['enthusiast_name'];?></td>
                      <td><?php echo get_package_name($reservation['eventid']); ?></td>
                      <td><?php echo $reservation['reservation_date'];?></td>
                      <td><?php echo date('g:i A',strtotime('-1 hour', strtotime($reservation['reservation_time'])))/*." ".strtotime(date('h:i:sa'))." ".strtotime('+'. $finalStoper .' hours', strtotime($reservation['reservation_time']))*/;?></td>

                      <?php

                                if(preg_match_all('/\d+/', $reservation['reservation_timerange'], $matches)){
                                   $finalStoper = intval($matches[0][0]);
                                }
                               /* echo date('g:i A',strtotime('+'. $finalStoper .' hours', strtotime($reservation['reservation_time']))); */
                                if($status['name'] == 'Reserved'){
                                  if(strtotime($reservation['reservation_date']) < strtotime(date('Y-m-d'))){
                                      $reserv = $reservation['ReservationID'];
                                      update_reservation(1,$reserv);
                                  }else if(strtotime($reservation['reservation_date']) == strtotime(date('Y-m-d')) && strtotime(date('h:i:sa')) >= strtotime('+'. $finalStoper .' hours', strtotime($reservation['reservation_time'])))
                                  {
                                      $reserv = $reservation['ReservationID'];
                                      update_reservation(1,$reserv);
                                  }
                                }
                      ?>
                      <td><?php echo $reservation['reservation_timerange'];?></td>
                      <td><?php echo $status['name'];?></td>
                      <td><?php echo $reservation['reservation_invoice'];?></td>
                      <td>

                          <form role="form" method="post">
                              <input type="hidden" name="resid" value="<?php echo $reservation['ReservationID'];?>">
                              <button class="btn btn-info"<?php if($status['name'] != 'Reserved'){ ?> disabled <?php } ?> type="submit" name="confirm" value="2"><span class="glyphicon glyphicon-pencil"></span>Confirm</button>
                              <!-- <button class="btn btn-warning"<?php if($status['name'] != 'Reserved'){ ?> disabled <?php } ?> type="submit" name="noshow" value="3"><span class="glyphicon glyphicon-pencil"></span>No Show</button> -->
                              <button class="btn btn-danger"<?php if($status['name'] != 'Reserved'){ ?> disabled <?php } ?> type="submit" name="cancel" value="1"><span class="glyphicon glyphicon-pencil"></span>Cancel</button>
                          </form>

                      </td>
                  </tr>
                <?php } ?>



              </tbody>
             <!-- <tfoot>
              <tr >
                  <th>Name</th>
                  <th>Package Name</th>
                  <th>Reservation Datetime</th>

                  <th>Status</th>

              </tr>
              </tfoot>-->
          </table>
      </div><!-- /.box-body -->
      <div class="box-footer clearfix no-border">
          <button class="btn btn-default pull-right"><i class="fa fa-calendar"></i>&nbsp; Walk In Reservation</button>
      </div>
  </div><!-- /.box -->


  </section><!-- /.Left col -->
  <!-- right col (We are only adding the ID to make the widgets sortable)-->
</div>

  </div><!-- /.content-wrapper -->
  <footer class="main-footer">
      <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; <?php echo date("Y");?> <a href="index2.php">Chillaxr</a>.</strong> All rights reserved.
  </footer>


  </div><!-- ./wrapper -->
  <script>
      $(document).ready(function(){
          // using jQuery
          $('video,audio').mediaelementplayer(/* Options */);
      });
  </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="build/jquery3.js"></script>



  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="build/jquery3.js"></script>


    <script>
    $(document).ready(function(){

        $('[data-toggle="popover"]').popover();

        <?php
            if($user['lattitude']=="" && $user['longitude']==""){
        ?>

            $("#map").modal().open();
        <?php } ?>

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

	<script>



			$(document).ready(function(){
		    $('[data-tooltip="tooltip"]').tooltip();
			});



			$(document).ready(function() {
		    $('#id_from_span_tag').hover(function() {
		        var $this = $(this);
		        $this.css("color", "red");

		    	});
			});



		</script>




  <script src="MMSAdmin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
      $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.5 -->
  <script src="AdminLTE/bootstrap/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="AdminLTE/plugins/morris/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="AdminLTE/plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="AdminLTE/plugins/knob/jquery.knob.js"></script>
  <!-- daterangepicker -->
  <script src="AdminLTE/https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script src="AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>

  <script src="AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- datepicker -->
  <script src="AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="AdminLTE/plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="AdminLTE/dist/js/app.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="AdminLTE/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="AdminLTE/dist/js/demo.js"></script>
  </body>
  <script type="text/javascript">
      $(function () {
          $('#datetimepicker5').datepicker();
      });
  </script>

</html>
