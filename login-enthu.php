<?php

session_start();
if(isset($_SESSION['enthu_id'])){
    echo "<script language='JavaScript' type='text/JavaScript'>
		<!--
		window.location='profile-enthu.php';
		//-->
		</script>
		";
    exit();
}
include'function.php';
include 'loginck-enthu.php';

?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chillaxer Login</title>
    <link href="css/stylesheet.css" rel="stylesheet"/>

    <script src="js1/modernizr.js"></script>


</head>
<body>
    <div>
        


<div>

    <div class="col-md-6 login-image">
        <div class="login-inner-text">
            
            <h1>We are glad to <br />have you back</h1>
            <h4 class="login-subtext">Login to have a chillaxing moment while<br />exploring the convenience of online reservation.</h4>
        </div>

        <div class="row optus-logo-wrapper">
            <img src="Content/DesktopImages/logo4.png" alt="logo4.png" height= "5%" width= "5%" />
        </div>
    </div>

    <div class="col-md-6 login-form-parent">

        <div class="login-form-container">
                <h2>Login as Enthusiast</h2>

            <br />
                <div class="row">
                <div class="col-md-12">
                    <section id="loginForm">
 <form  class="form-horizontal" method="post" role="form" >                         
 <div class="form-group">
                                <div class="input-field col-md-10">
                                    <input class="form-control" data-val="true" data-val-email="The username does not exist." data-val-required="The Username field is required." id="enthusiast_username" name="enthusiast_username" type="text" value="" />
                                    <label for="enthusiast_username">Username</label>
                                    <span class="field-validation-valid text-danger" data-valmsg-for="enthusiast_username" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-field col-md-10">
                                    <input class="form-control login-password" data-val="true" data-val-required="The Password field is required." id="enthusiast_password" name="enthusiast_password" type="password" />
                                    <label for="enthusiast_password">Password</label>
                                    <span class="field-validation-valid text-danger" data-valmsg-for="enthusiast_password" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="submit" value= "Login" name="loginenthu" class="btn btn-primary btn-enter-account" />
                                </div>
                            </div>
<!--                             <div class="col-md-offset-2">

                                <a class="forgot-password" href="/Account/ForgotPassword">Forgot Password</a>
                            </div> -->
</form>                    </section>
                </div>
            </div>
        </div>

        <div class="new-user-text-container">
            <h5> <span class="m3-text">NEW USER</span> ? <a class="a2-text" href="signupindex.php">SIGN UP</a></h5>
           
                <div class="col-md-4 col-md-offset-4">

                    <span id="siteseal">
                       
                    </span>


                </div>
          
        </div>


    </div>
</div>


 <script src="js1/jquery.min.js"></script>

<script src="js1/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        var showPassword = true;
        $('#enthusiast_password').on('mouseover', function (e) {
            $("#enthusiast_password").focus();
            var pWidth = $(this).innerWidth(); //use .outerWidth() if you want borders

            var pOffset = $(this).offset();

            var x = e.pageX - pOffset.left;
            //alert(pWidth + " - " + pOffset.left+" - "+x);
            //alert(x);
            if (x > 230) {
                $('#enthusiast_password').css('cursor', 'pointer');
            }
            else {
                $('#enthusiast_password').css('cursor', 'text');
            }
        });



        $('#enthusiast_password').on('click', function (e) {

            var passVal = $("#enthusiast_password").val();

            //alert("" + passVal.length);
            var pWidth = $(this).innerWidth(); //use .outerWidth() if you want borders
            var pOffset = $(this).offset();
            var x = e.pageX - pOffset.left;

            if (x > 260) {

                if (passVal.length > 0) {
                    $("#enthusiast_password").removeClass("login-enthusiast_password");
                    if (showPassword) {
                        $("#enthusiast_password").attr("type", "text");
                        $("#enthusiast_password").css("background-image", "url('Content/DesktopImages/eye-05.png')");
                        $("#enthusiast_password").css("background-repeat", "no-repeat");
                        $("#enthusiast_password").css("background-position", "right");

                        showPassword = false;
                    }
                    else {
                        $("#enthusiast_password").attr("type", "enthusiast_password");
                        $("#enthusiast_password").css("background-image", "url('Content/DesktopImages/eye-06.png')");
                        $("#enthusiast_password").css("background-repeat", "no-repeat");
                        $("#enthusiast_password").css("background-position", "right");
                        // alert($("#enthusiast_password").css("background"));
                        showPassword = true;
                    }
                }
            }

        });
    });
</script>


    </div>

    <script src="js1/jquery.min.js"></script>

    <script src="js1/bootstrap.min.js"></script>

    
    <script src="/Scripts/clickDesk-widget.js"></script>
</body>
</html>
