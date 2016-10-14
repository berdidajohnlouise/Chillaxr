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

    /*$sql1 = "SELECT * FROM room WHERE roomid=?";
    $stm1 = $con->prepare($sql1);
    $stm1->execute(array($user['eeid']));
    $room = $stm1->fetchAll();*/

    /*if($user['lat'] == 0){
        header("location:setup-location.php");
    }*/
    //include'sell_video.php';
    //include'sell_audio.php';

    //include'sell_text.php';

    if(isset($_GET['id'])) {
        $prod = get_product_id($_GET['id']);


        if (isset($_POST['update'])) {

            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_FILES['image'];

            update_product($name,$price,$image,$_SESSION['eeid'],$fullname);
        }
    }

    if(isset($_POST['delete'])){
        delete_product($_POST['delete']);
    }

    if(isset($_POST['upload_product'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_FILES['image'];

        insert_product($name,$price,$image,$_SESSION['eeid'],$fullname);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chillaxr | Products</title>

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
            <li>
                <a href="dashboard.php">
                    <span>Dashboard</span> <i class="glyphicon glyphicon-dashboard pull-right"></i>
                </a>
            </li>

            <li>
                <a href="event-budget.php">
                    <span>Packages</span> <i class="glyphicon glyphicon-credit-card pull-right"></i>
                </a>
            </li>
            <li  >
                <a href="room.php">
                    <span>Rooms</span> <i class="glyphicon glyphicon-home pull-right"></i>
                </a>
            </li>
            <li>
                <a href="announcement.php">
                    <span>Announcement</span> <i class="glyphicon glyphicon-bullhorn pull-right"></i>
                </a>
            </li>
            <li class="active">
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
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header with-border" style="background-color:#0097cf;color:white;">
                        <h3 class="box-title">Add New Product</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-bullhorn"></i></span>
                                <input type="text" name="name" value="<?php if(isset($_GET['id'])){ echo $prod['product_name']; }?>" class="form-control" placeholder="Product Name" required="required">
                            </div>
                            <br>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                <input type="text" name="price" value="<?php if(isset($_GET['id'])){ echo $prod['product_price']; }?>" class="form-control" placeholder="Price" required="required">

                            </div>

                            <br>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                <input type="file" name="image"  class="form-control" placeholder="Price">
                            </div>
                            <br>
                            <div>
                                <button type="submit" name="<?php
                                if(isset($_GET['id'])){ echo "update";}else{ echo "upload_product"; } ?>" class="btn btn-block btn-primary"><?php
                                    if(isset($_GET['id'])){ echo "Edit";}else{ echo "Save"; } ?></button>
                                <?php if(isset($_GET['id'])){?>
                                    <a href="product.php" class="btn btn-block btn-danger">Cancel</a>
                                <?php } ?>
                            </div>

                        </form>
                        <!-- /btn-group -->

                    </div>
                </div>
            </div><!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title">Product </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <!-- THE CALENDAR -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Product Name</th>

                                <th>Price</th>

                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            $products = get_product($_SESSION['eeid']);
                            foreach($products as $product){


                                ?>
                                <tr>
                                    <td align="center"><img src="user_files/<?php echo $fullname;?>/services/photos/<?php echo $product['product_image'];?>" width="50px" height="50px" align="center"></td>
                                    <td><?php echo $product['product_name'];?></td>

                                    <td><?php echo $product['product_price'];?></td>

                                    <td>

                                        <form role="form" method="post">
                                            <a class="btn btn-primary" href="product.php?id=<?php echo $product['product_id'];?>"><span class="glyphicon glyphicon-edit"></span></a>

                                            <button class="btn btn-danger" type="submit" name="delete" value="<?php echo $product['product_id'];?>"><span class="glyphicon glyphicon-trash"></span></button>
                                        </form>

                                    </td>
                                </tr>
                            <?php  } ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>

                                <th>Product Name</th>

                                <th>Price</th>

                                <th>Action</th>
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
