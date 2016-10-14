<?php
session_start();

include'function.php';


$estab = get_all_establishment();

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

}

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

    if(isset($_POST['feed'])){

        $eeid = $_POST['eeid'];
        $enthu = $_POST['enthu'];
        $feed = $_POST['feedback'];

        insert_feed($eeid,$enthu,$feed);
    }



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chillaxr | Establishment</title>

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
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="../../index2.html" class="navbar-brand"><b>Chilla</b>xr</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Establishment <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="team.php">Meet the Team</a></li>
                    <li><a href="aboutus.php">Abouts Us </a></li>
                    <li><a href="contactus.php">Contact Us </a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                    </div>
                </form>
            </div><!-- /.navbar-collapse -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <?php
                        if(isset($_SESSION['eeid'])){

                    ?>
                    <!-- Messages: style can be found in dropdown.less-->
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
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
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
                    <?php }else if(isset($_SESSION['enthu_id'])){?>

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="user_files-enthu/<?php echo $fullname;?>/profile_pic/<?php echo $user['enthusiast_image']; ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $fullname;?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="user_files-enthu/<?php echo $fullname;?>/profile_pic/<?php echo $user['enthusiast_image']; ?>" class="img-circle" alt="User Image">
                                <p>
                                    <?php echo $fullname;?>
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">

                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="edit_profile-enthu.php" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="logout-enthu.php" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                    <?php }else{ ?>
                        <li class="pull-right">
                            <a href="login.php">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-custom-menu -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Contact Us
                <small></small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            
            <section class="col-lg-4 connectedSortable" >
                <div class="container-fluid">
                     <div class="row">
                        <div class="panel panel-default">
      <div class="panel-body">
                         
                       <p>Lorem ipsum dolor sit amet, consectetuer adipiscing 
elit. Aenean commodo ligula eget dolor. Aenean massa 
<strong>strong</strong>. Cum sociis natoque penatibus 
et magnis dis parturient montes, nascetur ridiculus 
mus. Donec quam felis, ultricies nec, pellentesque 
eu, pretium quis, sem. Nulla consequat massa quis 
enim. Donec pede justo, fringilla vel, aliquet nec, 
vulputate eget, arcu. In enim justo, rhoncus ut, 
imperdiet a, venenatis vitae, justo. Nullam dictum 
felis eu pede 
mollis pretium. Integer tincidunt. Cras dapibus. 
Vivamus elementum semper nisi. Aenean vulputate 
eleifend tellus. Aenean leo ligula, porttitor eu, 
consequat vitae, eleifend ac, enim. Aliquam lorem ante, 
dapibus in, viverra quis, feugiat a, tellus. Phasellus 
viverra nulla ut metus varius laoreet. Quisque rutrum. 
Aenean imperdiet. Etiam ultricies nisi vel augue. 
Curabitur ullamcorper ultricies nisi.</p>


<p>Lorem ipsum dolor sit amet, consectetuer adipiscing 
elit. Aenean commodo ligula eget dolor. Aenean massa. 
Cum sociis natoque penatibus et magnis dis parturient 
montes, nascetur ridiculus mus. Donec quam felis, 
ultricies nec, pellentesque eu, pretium quis, sem.</p>

                       </div>
                 </div>    
                      </div>
                 </div>     
                <!-- /.box -->
                </section>
              
            </section><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Chillaxr</a>.</strong> All rights reserved.
    </div><!-- /.container -->
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