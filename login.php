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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chillaxr Login</title>
        <link href="css/stylesheet.css" rel="stylesheet"/>

        <script src="js/modernizr.js"></script>
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
        </div>

        <div class="col-md-6 login-form-parent">

            <div id="signup-container" class="login-form-container">
                <div id="signup-form-group" class="form-group">
                    <div class="row col-md-10" id="aspatient-container">
                        <a id="aspatient" href="login-enthu.php" type="button" class="btn btn-primary btn-create-profile">LOGIN AS ENTHUSIAST</a>
                    </div>
                    <div class="row col-md-10" id="asdoctor-container">
                        <a id="asdoctor" href="login-estab.php" type="button" class="text-white btn btn-default btn-create-profile">LOGIN AS ESTABLISHMENT</a>
                    </div>
                    <div class="row col-md-10" id="alreadyauser-container">
                        <br />
                        <!-- <h6><span class="m3-text">New user</span> <a href="/Account/Login" class="a2-text">Sign up</a></h6> -->
                        <h6><span class="m3-text">New user?</span> <a href= "signupindex.php" class="a2-text">Sign up</a></h6>
                    </div>
                </div>
            </div>
        </div>


    </div>

        </div>

        <script src="js/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>

        
        <script src="/Scripts/clickDesk-widget.js"></script>
</body>
</html>
