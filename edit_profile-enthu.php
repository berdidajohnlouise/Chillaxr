<?php
include 'session.php';
include 'dbconn.php';
include 'function.php';

require 'checksession-enthu.php';
$msg = "";

function createHours($id='hours_select', $selected=null)
{
    /*** range of hours ***/
    $r = range(1, 12);

    /*** current hour ***/
    $selected = is_null($selected) ? date('h') : $selected;

    $select = "<select name=\"$id\" id=\"$id\">\n";
    foreach ($r as $hour)
    {
        $select .= "<option value=\"$hour\"";
        $select .= ($hour==$selected) ? ' selected="selected"' : '';
        $select .= ">$hour</option>\n";
    }
    $select .= '</select>';
    return $select;
}


function createMinutes($id='minute_select', $selected=null)
{
    /*** array of mins ***/
    $minutes = array(0, 15, 30, 45);

    $selected = in_array($selected, $minutes) ? $selected : 0;

    $select = "<select name=\"$id\" id=\"$id\">\n";
    foreach($minutes as $min)
    {
        $select .= "<option value=\"$min\"";
        $select .= ($min==$selected) ? ' selected="selected"' : '';
        $select .= ">".str_pad($min, 2, '0')."</option>\n";
    }
    $select .= '</select>';
    return $select;
}


function createAmPm($id='select_ampm', $selected=null)
{
    $r = array('AM', 'PM');


    /*** set the select minute ***/
    $selected = is_null($selected) ? date('A') : strtoupper($selected);

    $select = "<select name=\"$id\" id=\"$id\">\n";
    foreach($r as $ampm)
    {
        $select .= "<option value=\"$ampm\"";
        $select .= ($ampm==$selected) ? ' selected="selected"' : '';
        $select .= ">$ampm </option>\n";
    }
    $select .= '</select>';
    return $select;
}

if(isset($_SESSION['enthu_id'])){

    $enthu_id = $_SESSION['enthu_id'];

    $sql = "SELECT * FROM enthusiast WHERE EnthusiastID=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($enthu_id));
    $user = $stm->fetch();
    //$seller = $_SESSION['id'] = $user['enthu_id'];
    $fullname = ucfirst($user['enthusiast_name']);
   // $con = null;



    //$exp_bday = explode("-", $user['bday']);
    //$b_year = $exp_bday[0];
    //$b_month = $exp_bday[1];
    //$b_day = $exp_bday[2];
    if(isset($_POST['account'])){
        include('dbconn.php');
        $username = $user['enthusiast_username'];
        $current_pass = $_POST['current_password'];
        $new_password = $_POST['new_password'];

        $current_pass = md5($current_pass);

        if($current_pass != $user['enthusiast_password']){
            unset($_SESSION['msg']);
            $msg = "Your Current password is Incorrect!";
            $_SESSION['msg'] = $msg;
            header("location:edit_profile-enthu.php");
        }else{

            $new_password = md5($new_password);
            $sql = "UPDATE enthusiast SET enthusiast_password=?  WHERE EnthusiastID=$EnthusiastID";

            $stm = $con->prepare($sql);
            $stm->execute(array($new_password));
            unset($_SESSION['msg']);
            $msg = "Account Updated!";
            $_SESSION['msg'] = $msg;
            header("location:edit_profile-enthu.php");
        }


    }

    if(isset($_POST['update'])){
        include 'dbconn.php';
        $enthu_id = $user['EnthusiastID'];
        $enthusiast_name = $_POST['enthusiast_name'];
        $enthusiast_contact= $_POST['enthusiast_contact'];

        $enthusiast_email = $_POST['enthusiast_email'];
        
        $enthusiast_address = $_POST['enthusiast_address'];
        

        $new_fullname = ucfirst($enthusiast_name);


        $sql = "UPDATE enthusiast SET enthusiast_name=?,enthusiast_contact=?,enthusiast_email=?,enthusiast_address=?  WHERE EnthusiastID=$enthu_id";

        $stm = $con->prepare($sql);
        if($stm->execute(array($enthusiast_name,$enthusiast_contact,$enthusiast_email,$enthusiast_adress))){
            rename("user_files-enthu/".$fullname."/", "user_files-enthu/".$new_fullname."/");

            unset($_SESSION['msg']);
            $msg = "Your Profile is has been Updated!";
            $_SESSION['msg'] = $msg;
            header("location:edit_profile-enthu.php");


        }else{
            unset($_SESSION['msg']);
            $msg = "Failed to Update Profile!";
            $_SESSION['msg'] = $msg;
            header("location:edit_profile-enthu.php");
        }
    }

    //there are some changes
    if(isset($_POST['upload'])){
        include 'dbconn.php';
        //$pic = $_FILES['file'];
        $pic = $_FILES['file']['tmp_name'];
        $enthu_id= $user['EnthusiastID'];

        $filepath = 'user_files-enthu/'.$fullname.'/profile_pic';

        //move_uploaded_file($pic['tmp_name'], 'user_files-enthu/'.$fullname.'/profile_pic/'.$pic['enthusiast_name']);
        
        $ptype = "";
        $pic_type = $_FILES['file']['type'];
        if($pic_type == 'image/jpeg'){
            $ptype = '.jpeg';
        }
        else if ($pic_type == 'image/jpg') {
            $ptype = '.jpg';
        }
        else if ($pic_type == 'image/png') {
            $ptype = '.png';
        }
        $mypic = basename($_FILES['file']['name'],$ptype);

        if (!(file_exists($filepath.'/'.$mypic))) {

            move_uploaded_file($pic, $filepath.'/'.$mypic);
            move_uploaded_file($pic,"/Images/".$mypic);
        }


        $sql = "UPDATE enthusiast SET enthusiast_image=? WHERE EnthusiastID=$enthu_id";
        $stm = $con->prepare($sql);
        //if($stm->execute(array($pic['enthusiast_name']))){
        if($stm->execute(array($mypic))){
            unset($_SESSION['msg']);
            $msg = "Your Profile Picture has been Updated!";
            $_SESSION['msg'] = $msg;
            header("location:edit_profile-enthu.php");


        }else{
            unset($_SESSION['msg']);
            $msg = "Failed to Update Picture!";
            $_SESSION['msg'] = $msg;
            header("location:edit_profile-enthu.php");
        }
    }

   

}


$con = null;
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
    <script src="http://maps.googleapis.com/maps/api/js">
    </script>

    <script>

        var lat = <?php echo $lat;?>;
        var long = <?php echo $long;?>;
        var myCenter=new google.maps.LatLng(lat,long);

        function initialize()
        {
            var mapProp = {
                center: myCenter,
                zoom:10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

            var marker = new google.maps.Marker({
                position: myCenter,
                title:'Click to zoom'
            });

            marker.setMap(map);

// Zoom to 9 when clicking on marker
            google.maps.event.addListener(marker,'click',function() {
                map.setZoom(15);
                map.setCenter(marker.getPosition());
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
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
                            <img src="user_files-enthu/<?php echo $fullname;?>/profile_pic/<?php echo $user['enthusiast_image']; ?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $fullname;?>
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                       
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="edit_profile-enthu.php" class="btn btn-default btn-flat">Profile</a>
                            </div>

                            <div class="pull-left" style="margin-left: 4%">
                                <a href="profile-enthu.php" class="btn btn-default btn-flat">Dashboard</a>
                            </div>
                            <div class="pull-left"  style="margin-left: 3%">
                                <a href="logout-enthu.php" class="btn btn-default btn-flat">Sign out</a>
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
              <li class="active">
                  <a href="#">
                     <span>Dashboard</span> <i class="glyphicon glyphicon-dashboard pull-right"></i>
                  </a>
              </li>
           <li >
               <a href="monitoring.php">
                   <span>Reservation Monitoring</span> <i class="glyphicon glyphicon-home pull-right"></i>
               </a>
           </li>
              <li>
                  <a href="index.php">
                     <span>Available Establishments</span> <i class="glyphicon glyphicon-credit-card pull-right"></i>
                  </a>
              </li>

              <li>
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
        <small>Profile</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-12">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class=" inner row">
                <div class="col-md-2">
                <img src="user_files-enthu/<?php echo $fullname;?>/profile_pic/<?php echo $user['enthusiast_image']; ?>" width="100px" height="100px" class="img-circle" alt="User Image">
                </div>
                <div class="col-md-10" style="margin-left: -6%;margin-top: 5px;">
                   <h3><?php echo $fullname;?></h3>
                   <h5><?php echo $user['enthusiast_address'];?></h5>
                </div>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>

        </div>
    </div><!-- ./col -->

</div><!-- /.row -->

<?php if(isset($_SESSION['msg'])){?>
    <div width="100%">

        <div class="alert alert-success" class="center">
            <p class="text-center"><?php echo $_SESSION['msg'];?></p>
        </div>
    </div>
<?php } ?>
<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable">
<!-- Custom tabs (Charts with tabs)-->
<div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs pull-right">
       
        <li><a href="#account" data-toggle="tab"><i class="glyphicon glyphicon-lock "></i>&nbsp; Account</a></li>
        <li class="active"><a href="#information" data-toggle="tab"><i class="glyphicon glyphicon-info-sign"></i>&nbsp;General Information</a></li>
    
        <li class="pull-left header"><i class="fa fa-inbox"></i>Profile</li>
    </ul>
    <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
       
        <div class="chart tab-pane" id="map" style="position: relative;height: 300px;">
            <div class="row">
             <div class="col-sm-4">
                 <form class="form" role="form" method="post">
                     <div class="row" style="margin-left: 5%;">
                        

                            
                         </div>
                 </form>

             </div>
             <div class="col-sm-8">
          
            </div>
             </div>
            </div>

        <div class="chart tab-pane" id="account" style="position: relative;     ">
            <form class="form-horizontal" role="form" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="enthusiast_username" class="form-control" value="<?php echo $user['enthusiast_username'];?>" placeholder="Username" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Current Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="current_password" class="form-control" id="inputPassword3" placeholder="Current Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="new_password" class="form-control" id="inputPassword3" placeholder="New Password">
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" name="account" class="btn btn-info pull-right">Save</button>
                </div><!-- /.box-footer -->
            </form>
        </div>

        <div class="chart tab-pane active" id="information" style="position: relative; ">

            <form class="form-horizontal" role="form"   method="POST" enctype="multipart/form-data">
                <div class="box-body">

                    <div class="col-lg-3">

                        <div class="form-group" align="center">
                            <img src="user_files-enthu/<?php echo $fullname;?>/profile_pic/<?php echo $user['enthusiast_image']; ?>" width="200px" height="200px" class="img-circle user-image" alt="User Image">
                            <br>
                            <br>
                            <input type="file" name="file" value="profile_avatar/<?php echo $user['enthusiast_image']; ?>" style="margin-left: 15%;"/><br>

                            <button type="submit" name="upload" class="btn btn-primary" >
                                Change Picture 
                            </button>
                        </div>
                        <!--<div class="form-group">
                                  <label for="category" class="col-sm-3 control-label-left">
                                     Type of Establishment
                                   </label>
                                   <div class="col-sm-5" class="select" >
                                    <select name="category"  value="<?php //echo $user ['category'];?>">
                                       <option id="category1" value="Movie House" size="5" >Movie House  </option>
                                        <option id="category2" value="KTV Studio"  >KTV Studio       </option>
                                        <option id="category3" value="Gaming Studio"  >Gaming Studio        </option>
                                    </select>
                                  </div>
                              </div>-->

                    </div>
                    <div class="col-lg-9">
                    <div class="form-group">

                        <label for="name" class="col-lg-3 control-label-left">
                           Full Name 
                        </label>
                        <div class="col-lg-9">
                            <input class="form-control" id="name" type="text" name="enthusiast_name" placeholder="Full Name" value="<?php echo $user['enthusiast_name'];?>" >
                        </div>

                    </div>


                    <div class="form-group">

                        <label for="contact" class="col-lg-3 control-label-left">
                            Contact No.
                        </label>
                        <div class="col-lg-9">
                            <input class="form-control" id="contact" type="text" name="enthusiast_contact" placeholder="Contact No." value="<?php echo $user['enthusiast_contact'];?>" >
                        </div>

                    </div>



                    <div class="form-group">

                        <label for="inputEmail3" class="col-lg-3 control-label-left">
                            Email
                        </label>
                        <div class="col-lg-9">
                            <input class="form-control" id="inputEmail3" type="email" name="enthusiast_email" placeholder="Email" value="<?php echo $user['enthusiast_email'];?>">

                        </div>

                    </div>


                 


                    <div class="form-group">

                        <label for="enthusiast_address" class="col-lg-3 control-label-left">
                             Address
                        </label>
                        <div class="col-lg-9">
                            <input class="form-control" id="enthusiast_address" type="text" name="enthusiast_address" placeholder=" Address" value="<?php echo $user['enthusiast_address'];?>">
                        </div>

                    </div>




                   

                        <div class="form-group">

                            <div class="col-lg-3">
                                </div>
                            <div class="col-lg-9">
                                <button type="submit" name="update" class="btn btn-info pull-right" data-toggle="modal" data-target="#mymodal">
                                    Save
                                </button>
                                </div>
                        </div>

                    </div>
                    <!-- /.box-footer -->
                </div>
            </form>

        </div>


    </div>
</div><!-- /.nav-tabs-custom -->

<!-- Chat box -->

</section><!-- right col -->
</div><!-- /.row (main row) -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?php echo date("Y");?> <a href="index2.php">Chillaxr</a>.</strong> All rights reserved.
</footer>
<!-- /.control-sidebar -->
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
<script src="MMSAdmin/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="MMSAdmin/https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="MMSAdmin/plugins/daterangepicker/daterangepicker.js"></script>
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