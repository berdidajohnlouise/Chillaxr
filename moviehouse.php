<?php
session_start();

include'function.php';


$moviehouse = get_all_moviehouse();

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

    if(isset($_POST['reserve'])){
        $package = $_POST['package'];
        //$range = $_POST['range'];
        $date= $_POST['date'];
        $eeid = $_POST['eeid'];
        $time = $_POST['time']; // ex: 1 PM to 2 PM ===> value - 2-PM

        $time1 = checktime($eeid,$time,$date);
        $temptime = intval($time1);
        //$temptime2 = date('h:i A', strtotime(implode(" ", $_POST['time'])));
        //get the AM/PM
        $arrcnt = 2;
        $strtime = '';
        //if(strlen($temptime) > 1){  $arrcnt = 3;  }
        //$strtime = substr(strval($time1), 2);
        if (strlen($time1) == 4) {
            $strtime = substr(strval($time1), 2);
        }
        else{
            $strtime = substr(strval($time1), 3);
        }
        /*$temptime3 = str_split(implode(" ", $_POST['time']), $arrcnt);
        $strtime = substr(strval($temptime3[1]), 0);*/
        /*if(strlen($temptime3[0]) > 2){  $strtime = substr(strval($temptime3[0]), 0, 1);  }
        else{   $strtime = substr(strval($temptime3[0]), 2, 3);    }
        $temptime3 = implode(" ", $_POST['time']);*/
        //if(){}
        /*if(strlen($temptime3[0]) >= 4){  $strtime = substr(strval($temptime3[0]), 1, 3);  }
        else{   $strtime = substr(strval($temptime3[0]), 3, 4);    }*/
        /*$cnt = 0;
        while ($cnt <= 2) {
            if ($cnt == 1) {   $strtime = $temptime3[$cnt];   }
            $cnt++;
        }*/
        //count the number of hours
        $arrcnt2 = 4;
        if(strlen($temptime) > 1){  $arrcnt2 = 5;  }
        $temptime4 = str_split(implode("", $_POST['time']), $arrcnt2);
        $hrcnt = 0;   $cnt2 = 0;
        /*while ($cnt2 < count($temptime4)) {
            $ttime = strval($temptime4[$cnt2]);
            if(strlen($ttime) == 4 || strlen($ttime) == 5){
                if(counthour($eeid,$ttime,$_POST['date'])){
                    $hrcnt++;
                }
            }
            $cnt2++;
        }*/
        $ttime = strval($temptime4[$cnt2]);
        //$hrcnt = counthour($eeid,$ttime,$_POST['date']);
        $hrcnt = counthour($eeid,$_POST['time'],$_POST['date'],$package);
        $hrrange = '';
        if($hrcnt > 1){  $hrrange = strval($hrcnt) .' Hours';  } else {  $hrrange = strval($hrcnt) .' Hour';  }
        $strtmlow = strtolower($strtime);
        //$datetime = date_create_from_format('H:i:s',($temptime - 1) +" "+ $strtime);
        $dttime = strval(($temptime));
        $dt = $dttime .''. $strtmlow;
        $datetime = date('H:i:s',strtotime($dt));

        /*echo $temptime ." -- ". $strtime ." -- ". $datetime . " -- ". $dt ." -- ". $strtmlow ." -- ". $hrrange;
        echo " || ";
        echo implode(", ", $time)." || ";
        echo $time1." || ";
        echo $temptime4[0]." || ";
        echo $date." || ".$package;*/
        //echo implode(", ", $time);

        //umm, guys about gani sa time sa reservation monitoring, unsa ni cya, imean unsay sulod ani, ang time nga unsa cya orasa nagpa.reserve or oras sa kanang.........start jud sa time na iyang gi.reserve?

        //before reservation, check the date(use your choosen date)
        //and time(use the time you choosen) in db
        //fix the time range


        /*$new_date = explode("/",$date);
        print_r($date);*/
  /*      if(check_reservation($package,$range,$date, $time, $eeid)){
                 echo "<script language='JavaScript' type='text/JavaScript'>
        alert('Reservation Denied');
        //-->
        </script>
        ";
        }*/
        /*else if(check_reservation_timerange($package,$range,$date, $time, $eeid)){
            echo "<script language='JavaScript' type='text/JavaScript'>
        alert('Reservation Denied');
        //-->
        </script>
        ";
        }*/
       /* else{*/


        insert_reservation($package,$hrrange,$date,$datetime,$_SESSION['enthu_id'],$eeid,$time);

        //insert_reservation($package,$range,$date, $datetime,$_SESSION['enthu_id'],$eeid, $time2);
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
    <link rel="stylesheet" href="mydatepicker/mydatepicker.css">
    <!--<link rel="stylesheet" href="datetimepicker/build/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="datetimepicker/build/css/bootstrap-datetimepicker-standalone.css">-->

    <link rel="stylesheet" href="AdminLTE/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="AdminLTE/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="AdminLTE/plugins/datatables/dataTables.bootstrap.css">
   <!-- <link rel="stylesheet" href="AdminLTE/plugins/datepicker/datepicker3.css.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
    <script type="text/javascript" src="js/jquery.min.js">

    </script>


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
    <script src="datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="datetimepicker/src/js/bootstrap-datetimepicker.js"></script>

   <!-- <script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
    <script src="datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
    <script src="datetimepicker-master/build/jquery.datetimepicker.min.js"></script>

    <script src="datetimepicker-master/jquery.datetimepicker.min.js"></script>
    <script src="datetimepicker-master/jquery.datetimepicker.js"></script>

    <link rel="stylesheet" href="datetimepicker-master/build/jquery.datetimepicker.min.css">

    <link rel="stylesheet" href="datetimepicker-master/jquery.datetimepicker.css">-->

</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand"><b>Chilla</b>xr</a>
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
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <?php if(isset($_SESSION['enthu_id'])){?>

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
                            <!-- <li class="user-body">

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
<?php
    if(isset($_GET['id'])){
        include('estab-movie-view.php');

    }else{
        include('estab-movie-list.php');
    }
?>




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

        $('[data-toggle="popover"]').popover();
        $('[data-toggle="modal"]').modal();



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

<script src="mydatepicker/moment.js"></script>

<!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->

<script src="AdminLTE/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="AdminLTE/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="AdminLTE/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->

<script src="AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>

<script src="AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="Adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- datepicker -->
<!--<script src="AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script>-->
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
<script src="mydatepicker/mydatepicker.js"></script>
<script src="datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="datetimepicker/src/js/bootstrap-datetimepicker.js"></script>



<script src="jquery-ui.js"></script>
<link href="jquery-ui.css" rel="stylesheet">

<script type="text/javascript">
var counter = 1;

function tConvert (time) {
  // Check correct time format and split into components
  time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

  if (time.length > 1) { // If time format correct
    time = time.slice (1);  // Remove full string match value
    time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
    time[0] = +time[0] % 12 || 12; // Adjust hours
  }
  return time.join (''); // return adjusted time or original string
}
var unavailableDates = [];
var recounter = 1;
var DateList = [];

$('#time_range').on('change', function(){
    var id = $(this).children(":selected").attr("id");
    $('#packageid').val(id);
    unavailableDates = [];
    DateList = [];
    $('#datepicker').datepicker( "destroy" );
    recounter = 1;
    counter = 1;
    checker = false;

    /*alert(id);*/

    $.get('reservationChecker.php?eeid='+ $('#eeid').val(), function(data){
     DateList.push(String(data[0].reservation_date));
    for(i=1;i<data.length;i++){
        for(j = 0; j < DateList.length; j++){
            if(String(data[i].reservation_date) != DateList[j] && data[i].eventid == id && data[i].reservation_status == 4){
                checker = true;
            }else{
                checker = false;
                break;
            }
        }

        if(checker){
            DateList.push(String(data[i].reservation_date));
            checker = false;
        }
    }

    for(z=0;z<DateList.length;z++){
        for(x=0;x<data.length;x++){
            if(DateList[z] == String(data[x].reservation_date) && data[x].eventid == id && data[x].reservation_status == 4){
                console.log(DateList[z] +"="+ String(data[x].reservation_date) + "AND" + data[x].eventid +"="+ id );
                recounter++;
                console.log(recounter);
            }
        }
        if(counter == recounter){
            var customDate = DateList[z].charAt(8)+DateList[z].charAt(9) +"-"+ DateList[z].charAt(5)+DateList[z].charAt(6) +"-"+ DateList[z].charAt(0)+DateList[z].charAt(1)+DateList[z].charAt(2)+DateList[z].charAt(3);
            if(DateList[z].charAt(8) == '0' && DateList[z].charAt(5) != '0'){
              customDate = DateList[z].charAt(9) +"-"+ DateList[z].charAt(5)+DateList[z].charAt(6) +"-"+ DateList[z].charAt(0)+DateList[z].charAt(1)+DateList[z].charAt(2)+DateList[z].charAt(3);
            }else if(DateList[z].charAt(5) == '0' && DateList[z].charAt(8) != '0'){
                customDate = DateList[z].charAt(8)+DateList[z].charAt(9) +"-"+ DateList[z].charAt(6) +"-"+ DateList[z].charAt(0)+DateList[z].charAt(1)+DateList[z].charAt(2)+DateList[z].charAt(3);
            }else if(DateList[z].charAt(5) == '0' && DateList[z].charAt(8) == '0'){
                customDate = DateList[z].charAt(9) +"-"+ DateList[z].charAt(6) +"-"+ DateList[z].charAt(0)+DateList[z].charAt(1)+DateList[z].charAt(2)+DateList[z].charAt(3);
            }else{
                customDate = DateList[z].charAt(8)+DateList[z].charAt(9) +"-"+ DateList[z].charAt(5)+DateList[z].charAt(6) +"-"+ DateList[z].charAt(0)+DateList[z].charAt(1)+DateList[z].charAt(2)+DateList[z].charAt(3);
            }
            console.log(customDate);
            unavailableDates.push(customDate);
            recounter = 1;
        }else{
            recounter = 1;
        }
    }

        $('#datepicker').datepicker({
            dateFormat:"yy-mm-dd",
            beforeShowDay: unavailable,
            onSelect: function (dateText, inst){
                selectedDate = $(this).val();
                $('#datepick').val($(this).val());
                    $.get('officehours.php?eeid='+ $('#eeid').val(), function(data){
                        if(String(tConvert(data[0].establishment_timeopen)).charAt(1) != ":"){
                            ot = String(tConvert(data[0].establishment_timeopen)).charAt(0)+String(tConvert(data[0].establishment_timeopen)).charAt(1);
                            if(String(tConvert(data[0].establishment_timeclose)).charAt(1) != ":"){
                                ct = String(tConvert(data[0].establishment_timeclose)).charAt(0)+String(tConvert(data[0].establishment_timeclose)).charAt(1);
                                ctExt = String(tConvert(data[0].establishment_timeclose)).charAt(9)+String(tConvert(data[0].establishment_timeclose)).charAt(10);
                            }else{
                                ct = String(tConvert(data[0].establishment_timeclose)).charAt(0);
                                ctExt = String(tConvert(data[0].establishment_timeclose)).charAt(10)+String(tConvert(data[0].establishment_timeclose)).charAt(11);
                            }
                            otExt = String(tConvert(data[0].establishment_timeopen)).charAt(7)+String(tConvert(data[0].establishment_timeopen)).charAt(8);
                        }else{
                            ot = String(tConvert(data[0].establishment_timeopen)).charAt(0);
                            if(String(tConvert(data[0].establishment_timeclose)).charAt(1) != ":"){
                                ct = String(tConvert(data[0].establishment_timeclose)).charAt(0)+String(tConvert(data[0].establishment_timeclose)).charAt(1);
                                ctExt = String(tConvert(data[0].establishment_timeclose)).charAt(9)+String(tConvert(data[0].establishment_timeclose)).charAt(10);
                            }else{
                                ct = String(tConvert(data[0].establishment_timeclose)).charAt(0);
                                ctExt = String(tConvert(data[0].establishment_timeclose)).charAt(10)+String(tConvert(data[0].establishment_timeclose)).charAt(11);
                            }
                            otExt = String(tConvert(data[0].establishment_timeopen)).charAt(8)+String(tConvert(data[0].establishment_timeopen)).charAt(9);
                        }

                        otInt = parseInt(ot);
                        tempExt = otExt;
                        $('#time').html('');

                    while(true){
                        counter++;
                        otInt++;

                        if(otInt == 12 && tempExt == "AM"){
                            tempExt = "PM";
                        }else if(otInt == 12 && tempExt == "PM"){
                            tempExt = "AM";
                        }

                        $('#time').append('<div class="checkbox"><label><input type="checkbox" class="test" name="time[]" onclick="checkedBoxed();" id="'+ otInt + "-" + tempExt +'" value="'+ otInt + "-" + tempExt +'">'+ (parseInt(otInt)-1) +" "+ tempExt +" to" +" "+ otInt + " " + tempExt+'</label></div>');

                        if(parseInt(ct) == otInt && ctExt == tempExt){
                            break;
                        }
                        if(otInt == 12){
                            otInt = 1;
                        }
                    }
                });
                $.get('reservationChecker.php?eeid='+ $('#eeid').val(), function(data){
                    for(i=0;i<data.length;i++){
                         $('input#'+data[i].attr_tr_range).attr('type', 'checkbox');
                    }
                    for(i=0;i<data.length;i++){
                        if(String(data[i].reservation_date) == String(selectedDate) && data[i].eventid == $('#packageid').val() && data[i].reservation_status == 4){
                            $('input#'+data[i].attr_tr_range).attr('type', 'hidden');
                        }
                    }
                });
            },
            minDate: dtd
        });
    });
});

$('.close').click(function() {
  $('#time').html(' ');
/*  $('#datepicker').html(' ');
  $('select option[value="ts"]').attr('selected', true);
  $('#default').attr('selected', true);*/
});

$('#close').click(function(){
  $('#time').html(' ');
/*  $('#datepicker').html(' ');
  $('select option[value="ts"]').attr('selected', true);
  $('#default').attr('selected', true);*/
});



function checkedBoxed(){
   if($(":checkbox:checked").length ==  $('#time_range').val()){
        $('input.test').prop('disabled', !this.checked);
        $('input.test:checked').removeAttr('disabled');
   }else{
         $('input.test').removeAttr('disabled');
   }
}

var dtd = new Date();

function unavailable(date) {
    dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
    if ($.inArray(dmy, unavailableDates) == -1) {
        console.log('true');
        return [true, ""];
    } else {
        return [false, "", "Unavailable"];
        console.log('false');
    }
}


</script>
</body>
</html>
