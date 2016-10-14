<?php
	include 'session.php';
	include 'checksession.php';
	include'function.php';
	$total=0;
	if(isset($_SESSION['userid'])){
		include 'dbconn.php';
		$userid = $_SESSION['userid'];
		//getuser($userid)
		$sql = "SELECT * FROM tblseller WHERE userid=?";
		$stm = $con->prepare($sql);
		$stm->execute(array($userid));
		$user = $stm->fetch();
		$seller = $_SESSION['id'] = $user['userid'];
		$_SESSION['mem_id'] = $user['mem_id'];

		$fullname = ucfirst($user['fname'])." ".ucfirst($user['lname']);
	
		}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Sales-MMS!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='img/mixx.png' rel='icon' type='image/x-icon'/> 
    <link rel="stylesheet" href="build/mediaelementplayer.css" />
    <script src="build/jquery.js"></script>
		<script src="build/mediaelement-and-player.min.js"></script>
		
    
   

    <style type="text/css">

    .modal-header{background-color:#1975FF;color:white;}
    
    th{
    	background-color:#1975FF;color:white;
    }
    	 figure {
			  display: block;
			  position: relative;
			  float: left;
			  overflow: hidden;
			  margin: 0 0px 0px 0;
			}
			figcaption {
			  position: absolute;
			  background: black;
			  background: rgba(0,0,0,0.75);
			  color: white;
			  height:38px;
			  padding: 2px 2px;
			  opacity: 0;
			  -webkit-transition: all 0.6s ease;
			  -moz-transition:    all 0.6s ease;
			  -o-transition:      all 0.6s ease;
			}
			figure:hover figcaption {
			  opacity: 1;
			}
			figure:before {
			  content: "Modify";
			  position: absolute;
			  font-weight: 800;
			  background: black;
			  background: rgba(255,255,255,0.75);
			  text-shadow: 0 0 5px white;
			  color: red;
			  width: 24px;
			  height: 24px;
			  -webkit-border-radius: 12px;
			  -moz-border-radius:    12px;
			  border-radius:         12px;
			  text-align: center;
			  font-size: 14px;
			  line-height: 24px;
			 
			  opacity: 0.75;
			}
			figure:hover:before {
			  opacity: 0;
			}

			img {
    		cursor: default;
			}
			.cap-left:before {  bottom: 10px; left: 10px; }
			.cap-left figcaption { bottom: 0; left: -30%; }
			.cap-left:hover figcaption { left: 0; }

			.cap-right:before { bottom: 10px; right: 10px; }
			.cap-right figcaption { bottom: 0; right: -30%; }
			.cap-right:hover figcaption { right: 0; }

			.cap-top:before { top: 10px; left: 10px; }
			.cap-top figcaption { left: 0; top: -30%; }
			.cap-top:hover figcaption { top: 0; }

			.cap-bot:before { bottom: 10px; left: 10px; }
			.cap-bot figcaption { left: 0; bottom: -30%;}
			.cap-bot:hover figcaption { bottom: 0; }

			.scr {
			   				     /* Just for the demo          */
			    overflow-x: auto;    /* Trigger vertical scroll    */
			    overflow-y: hidden;  /* Hide the horizontal scroll */
			}
			td{
				padding: 2px;		
				text-align: center;
			}

			table label{

				font-family: helvetica;
				color:#949494;
			}

			table tr td strong{
				color:#1975FF;
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

    <div class="container-fluid">
    	<div class="row">
			<div class="col-md-12">
				
				<div class="row">
					<div class="col-md-12">
						<?php include('main-menu.php');?>
						
						
					<div >
					  <h2 style="color:#1975FF;font-family:cambria">Sales Record</h2>
					</div>
					<div class="col-lg-12">
					<h3 style="float:right;color:#1975FF;font-family:cambria">No of Sold Item:<?php echo count($purchases);?></h3> 
					</div>
				</div>
				</div>
					<div class="row">
						<div class="col-lg-12">
							
							<div class="table-responsive">

												<table class="table table-hover table-bordered">
													<thead>
														<tr>
															
															<!--<th>id</th>-->
															<th>type</th>
															<th>name</th>
															<th>quantity</th>
															<th>amount</th>
															<th>name</th>
															<th>address</th>
															<th>email</th>
															<th>status</th>
															<th>posted_date</th>
														</tr>
													</thead>
													
													<tbody>
											<?php 
												
												
												foreach($purchases as $purchases){
													 $total = $total + $purchases['product_amount'];
													

											?>		
														<tr>
															
															<!--<td><?php echo $purchases['product_id'];?></td>-->
															<td><?php echo $purchases['product_type'];?></td>
															<td><?php echo $purchases['product_name'];?></td>
															<td><?php echo $purchases['product_quantity'];?></td>
															<td><?php echo "Php".$purchases['product_amount'].".00";?></td>
															<td><?php echo $purchases['payer_fname']." ".$purchases['payer_lname'];?></td>
															<td><?php echo $purchases['payer_address'].",".$purchases['payer_city'];?></td>
												  			<td><?php echo $purchases['payer_email'];?></td>
															<td><?php echo $purchases['payment_status'];?></td>
															<td><?php echo $purchases['posted_date'];?></td>

														</tr>	
														
																		
													<?php } ?>
													</tbody>
													
													
												</table>
											
											</div>

						</div>
						<div class="col-lg-12">
							<h3 style="float:right;color:#1975FF;font-family:cambria">Total Sales: Php<?php echo $total;?>.00</h3> 
					
						</div>
				
				<!--
				<div class="row">
					<div class="col-md-12">
						<div class="page-footer">
							<h5>
								© 2004-<?php echo date("Y");?> All rights reserved - Multimediastore.com  ® <br /> 
								<small>Design by: Multi Media Store Group</small>
							</h5>
						</div>
					</div>
				</div>
				-->
				<?php
					include('includes/footer.php');
				?>
			</div>
		</div>
	</div>
	</div>
	
		 <script>
		// using jQuery
		$('video,audio').mediaelementplayer(/* Options */);
		</script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="build/jquery3.js"></script>
		<script src="build/mediaelement-and-player.min.js"></script>
    
    

    <script>
    $(document).ready(function(){
			    $('[data-toggle="popover"]').popover();   
				
			    $(".btn-info").click(function(){
		        $(".collapse").collapse('toggle');
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
		    
		    tracks = playlist.find('tr td a');
		    len = tracks.length - 1;
		    audio[0].volume = .90;
		    playlist.find('a').click(function(e){
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
		            link = playlist.find('a')[0];
		        }else{
		            link = playlist.find('a')[current];    
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
	


	

  </body>
</html>