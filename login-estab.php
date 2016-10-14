<?php
include'function.php';
include 'session.php';
include'loginck.php';

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
                <h2>Login as Establishment</h2>

            <br />
                <div class="row">
                <div class="col-md-12">
                    <section id="loginForm">
<form class="form-horizontal" method="post" role="form"><input name="__RequestVerificationToken" type="hidden" value=" " />                            <div class="form-group">
                                <div class="input-field col-md-10">
                                    <input class="form-control" data-val="true" data-val-email="The Username field does not exist." data-val-required="The Username field is required." id="Username" name="username" type="text" value="" />
                                    <label for="Username">Username</label>
                                    <span class="field-validation-valid text-danger" data-valmsg-for="Username" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-field col-md-10">
                                    <input class="form-control login-password" data-val="true" data-val-required="The Password field is required." id="Password" name="password" type="password" />
                                    <label for="Password">Password</label>
                                    <span class="field-validation-valid text-danger" data-valmsg-for="password" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="submit" value= "Login" name="login" class="btn btn-primary btn-enter-account" />
                                </div>
                            </div>
                            <div class="col-md-offset-2">

                                <a class="forgot-password" href="/Account/ForgotPassword">Forgot Password</a>
                            </div>
</form>                    </section>
                </div>
            </div>
        </div>

        <div class="new-user-text-container">
            <h5> <span class="m3-text">NEW USER</span> ? <a class="a2-text" href="signupindex.php">SIGN UP</a></h5>
           
                <div class="col-md-4 col-md-offset-4">

                   <!-- <span id="siteseal">
                        <script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=F8lC7q7bJsDlUo339zVWG9n88V94eg0zgsfDw5x5Ep9PJyXgAmU8yssOXIhY"></script>
                    </span> -->


                </div>
          
        </div>


    </div>
</div>


 <script src="js1/jquery.min.js"></script>

<script src="js1/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        var showPassword = true;
        $('#Password').on('mouseover', function (e) {
            $("#Password").focus();
            var pWidth = $(this).innerWidth(); //use .outerWidth() if you want borders

            var pOffset = $(this).offset();

            var x = e.pageX - pOffset.left;
            //alert(pWidth + " - " + pOffset.left+" - "+x);
            //alert(x);
            if (x > 230) {
                $('#Password').css('cursor', 'pointer');
            }
            else {
                $('#Password').css('cursor', 'text');
            }
        });



        $('#Password').on('click', function (e) {

            var passVal = $("#Password").val();

            //alert("" + passVal.length);
            var pWidth = $(this).innerWidth(); //use .outerWidth() if you want borders
            var pOffset = $(this).offset();
            var x = e.pageX - pOffset.left;

            if (x > 260) {

                if (passVal.length > 0) {
                    $("#Password").removeClass("login-password");
                    if (showPassword) {
                        $("#Password").attr("type", "text");
                        $("#Password").css("background-image", "url('Content/DesktopImages/eye-05.png')");
                        $("#Password").css("background-repeat", "no-repeat");
                        $("#Password").css("background-position", "right");

                        showPassword = false;
                    }
                    else {
                        $("#Password").attr("type", "password");
                        $("#Password").css("background-image", "url('Content/DesktopImages/eye-06.png')");
                        $("#Password").css("background-repeat", "no-repeat");
                        $("#Password").css("background-position", "right");
                        // alert($("#Password").css("background"));
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
