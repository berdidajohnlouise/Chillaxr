<?php
include 'session.php';
include 'checksession-enthu.php';
include'function.php';

$enthu_id = '';
 if(isset($_SESSION['enthu_id'])){

    include 'dbconn.php';
    
     $enthu_id = $_SESSION['enthu_id'];
    //getuser($userid)
    $sql = "SELECT * FROM enthusiast WHERE EnthusiastID=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($enthu_id));
    $user = $stm->fetch();
  //  $seller = $_SESSION['id'] = $user['eeid'];


    $fullname = ucfirst($user['enthusiast_name']);

    /*if($user['lat'] == 0){
      header("location:setup-location.php");
    }*/
    //include'sell_video.php';
    
    
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chillaxr | History</title>

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
    <link rel="stylesheet" href="MMSAdmin/plugins/datatables/dataTables.bootstrap.css">
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
                        <img src="user_files-enthu/<?php echo $fullname;?>/profile_pic/<?php echo $user['enthusiast_image']; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $fullname;?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="user_files-enthu/<?php echo $fullname;?>/profile_pic/<?php echo  $user['enthusiast_image']; ?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $fullname;?>
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="edit_profile-enthu.php" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-left" style="margin-left: 5%">
                                <a href="profile-enthu.php" class="btn btn-default btn-flat">Dashboard</a>
                            </div>
                            <div class="pull-right">
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
                <img src="user_files-enthu/<?php echo $fullname;?>/profile_pic/<?php if(!empty($user['enthusiast_image'])){echo $user['enthusiast_image'];}else{echo "gravatar.jpg";} ?>" class="img-circle" alt="User Image">
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
            <li>
                <a href="profile-enthu.php">
                   <span>Dashboard</span> <i class="glyphicon glyphicon-dashboard pull-right"></i>
                </a>
            </li>
            <li>
                <a href="monitoring.php">
                    <span>Reservation Monitoring</span> <i class="glyphicon glyphicon-home pull-right"></i>
                </a>
            </li>
            <li >
                <a href="index.php">
                    <span>Available Establishments</span> <i class="glyphicon glyphicon-credit-card pull-right"></i>
                </a>
            </li>

            <li class="active">
                <a href="history-enthu.php">
                    <span>History</span> <i class="glyphicon glyphicon-home pull-right"></i>
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
        <small>History</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">History</li>
    </ol>
</section>
    <?php if(isset($_SESSION['message'])){?>

            <div class="col-lg-12">
                <br>
            <div class="alert alert-success" class="center">
                <p class="text-center"><?php echo $_SESSION['message'];?></p>
            </div>
            </div>

    <?php } ?>

<!-- Main content -->

    <section class="content">
        <div class="row">
            
            <div class="col-md-9">
                <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">History</h3>
                </div><!-- /.box-header -->
                    <div class="box-body">
                        <!-- THE CALENDAR -->
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Data </th>
                            <th>Date</th>
                            <th>Time</th>
                            <!-- <th>Action</th> -->

                        </tr>
                        </thead>
                        <tbody>

                                <?php
                                    $hs = get_history($enthu_id);
                                  foreach ($hs as $hss){
                                        ?>
                                <tr>
                                <td><?php $myhistory = get_enthu_history($hss['user']); echo $myhistory;?></td>
                                <td><?php echo $hss['action'];?></td>
                                <td><?php echo $hss['datez'];?></td>
                                <td><?php echo $hss['time'];?></td>
                            
                                <!-- <td>

                                    <form role="form" method="post">
                                    <a class="btn btn-primary" href="history-enthu.php?id=<?php echo $hss['id'];?>"><span class="glyphicon glyphicon-edit"></span></a>

                                    <button class="btn btn-danger" type="submit" name="delete" value="<?php echo $hss['id'];?>"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>

                                </td> -->
                                </tr>
                                  <?php } ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>User</th>
                            <th>Data</th>
                             <th>Date</th>
                            <th>Time</th>
                            <!-- <th>Action</th> -->
                        </tr>
                        </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?php echo date("Y");?> <a href="index2.php">Chillaxr</a>.</strong> All rights reserved.
</footer>
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
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




<script>
    $(document).ready(function(){

        $('[data-toggle="popover"]').popover();




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
    var audio;
    var playlist;
    var tracks;
    var current;

    init();
    function init(){
        current = 0;
        audio = $('audio');
        playlist = $('#playlist');

        tracks = playlist.find('tr td strong a');
        len = tracks.length - 1;
        audio[0].volume = .90;
        playlist.find('strong a').click(function(e){
            e.preventDefault();
            link = $(this);
            played = link.attr('value');
            current = link.parent().index();
            run(link, audio[0]);
            document.getElementById('playing').innerHTML = played;
        });
        audio[0].addEventListener('ended',function(e){
            current++;
            if(current == len){
                current = 0;
                link = playlist.find('strong a')[0];
            }else{
                link = playlist.find('strong a')[current];
            }
            run($(link),audio[0]);
        });

    }
    function run(link, player){
        player.src = link.attr('href');
        par = link.parent();
        par.addClass('active').siblings().removeClass('active');
        audio[0].load();
        audio[0].play();
    }


    $(document).ready(function(){
        $('[data-tooltip="tooltip"]').tooltip();
    });



    $(document).ready(function() {
        $('#id_from_span_tag').hover(function() {
            var $this = $(this);
            $this.css("color", "red");

        });
    });


    $(document).ready(function(){
        $("#sample").click(function(){
            $("#sample").modal();
        });
    });
</script>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script src="build/jquery3.js"></script>


<script src="MMSAdmin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="MMSAdmin/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="MMSAdmin/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="MMSAdmin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="MMSAdmin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="MMSAdmin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="MMSAdmin/https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="MMSAdmin/plugins/daterangepicker/daterangepicker.js"></script>

<script src="MMSAdmin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="MMSAdmin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- datepicker -->
<script src="MMSAdmin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="MMSAdmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="MMSAdmin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="MMSAdmin/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="MMSAdmin/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="MMSAdmin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="MMSAdmin/dist/js/demo.js"></script>
</body>
</html>