<?php

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
<body>


<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>



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


<script src="AdminLTE/https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
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


<!--<script type="text/javascript">
    $(function () {
        $('#datetimepicker5').datepicker();
    });
</script>-->
</body>
</html>