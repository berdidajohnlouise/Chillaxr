<?php 
	include 'function.php';
	include 'dbconn.php';
	include 'event-enthu.php';
	include 'main-menu-enthu.php';
  include 'session-enthu.php';
	unset($_SESSION['msg']);
  //include'loginck.php';
	//include 'budgetexec.php';
	if(isset($_SESSION ['eeid'])){
		
		$eeid = $_SESSION['eeid'];
		//getuser($userid)
		$sql = "SELECT * FROM entertainmentestablishment WHERE eeid=?";
		$stm = $con->prepare($sql);
		$stm->execute(array($eeid));
		$user = $stm->fetch();
		$seller = $_SESSION['id'] = $user['eeid'];
		$_SESSION['mem_id'] = $user['mem_id'];

		$fullname = ucfirst($user['name']);

		include'sell_image.php';
	 }
		
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
    <link href='img/mixx.png' rel='icon' type='image/x-icon'/> 
    <link rel="stylesheet" href="build/mediaelementplayer.css" />
    <script src="build/jquery.js"></script>
		<script src="build/mediaelement-and-player.min.js"></script>

     <script>
		 $(document).ready(function(){
		// using jQuery
		$('video,audio').mediaelementplayer(/* Options */);
		});
		</script>
   

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
				padding: 6px;		
			}

			table label{

				font-family: helvetica;
				color:#949494;
			}

			table tr td strong{
				color:#1975FF;
			}

			input.button-add {
    background-image: url(camera.ico); /* 16px x 16px */
    background-color: transparent; /* make the button transparent */
    background-repeat: no-repeat;  /* make the background image appear only once */
    background-position: 0px 0px;  /* equivalent to 'top left' */
    border: none;           /* assuming we don't want any borders */
    cursor: pointer;        /* make the cursor like hovering over an <a> element */
    height: 5;           /* make this the size of your image */
    padding-left: ;     /* make text start to the right of the image */
    vertical-align: middle; /* align the text vertically centered */
}


input#file {
  display: inline-block;
  width: 10%;
  padding: 50px 20px 0 0;
  height: 5px;
  overflow: hidden;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  background: url('img/camera.ico') center center no-repeat #e4e4e4;
  border-radius: 10px;
  background-size: 50px 50px;

}
body 
    { 
      background-color: #F0F8FF; 
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
     
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

  	<br><br><br><br><br>
														<div class="panel panel-primary">
														  <div class="panel-heading">
														    <h3 class="panel-title">Packages</h3>
														  </div>
														  <?php  $eeid ="1"; $events = getbudget($eeid);  ?>
														  <table class="table">
														  	<tr><td>Name</td> <td> <div class="scrollable">Description</td></div><td>Price</td><td>Action</td></tr>
														  <?php  foreach ($events as $eve) { ?>
														  		<tr><td><?php echo $eve['name'];?></td> <td><?php echo $eve['description'];?> </td><td><?php echo $eve['price'];?></td><td><a href="calendar-enthu-index.php" style=text-decoration:none; ><button>Reserve</button></a></td></tr>
														  <?php }  ?>
														  </table>
														</div>

										<?php $event_count=''; if($event_count>0){?>
											<div class="row">
											<?php foreach($result as $row){
												$edit++;
												 $sc++;
												
												 if($sc%2==1){?>
												<div class="row">
													<?php }?>
											
															
                                                  
														<figcaption>
														<div class="btn-group btn-group-justified" >	
															<div class="btn-group">
																<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#e<?php echo $edit;?>"><span class="glyphicon glyphicon-edit"></span></button> 
															</div>

															<div class="btn-group">
																	<button type="button" class="btn btn-danger"   data-toggle="modal" data-target="#d<?php echo $sc;?>" ><span class="glyphicon glyphicon-trash"></span></button> 
															</div>
															<div class="btn-group">
																	<button type="button" class="btn btn-success"  ><a style="color:white;" href="download.php?path=user_files/<?php echo $fullname;?>/image/<?php echo $image['photo_name'];?>"><span class="glyphicon glyphicon-download-alt"></span></a></button> 
															</div>
														</div>
														</figcaption>
					   
					    	                  <div id="e<?php echo $edit;?>" class="modal fade"   role="dialog" aria-labelledby="confirmUpdateLabel" aria-hidden="true">
														
														  <div class="modal-dialog">
													
														    <div class="modal-content">
													
														      <div class="modal-header">
														
														        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													
														        <h4 class="modal-title">Edit Price and Description </h4>
														
														      </div>
														
														      <div class="modal-body">
														
														            <img class="fancybox" src="user_files/<?php echo $fullname;?>/image/<?php echo $image['photo_name']; ?>" style="float:left;" height="100px" width="150px">
															       
															       <table style="align:right;" cellpadding="1">

															       	<tr>
															<td>
																<label class="control-label">
																Description
																</label>
															</td>
															<td>
																 <textarea rows="6" cols="50" name="description" value="<?php echo $result['description'];?>" required></textarea><br>
		     													 
															</td>
														</tr>
															            <tr>
															                <td>
																               <label class="control-label">
																                   Price 
																               </label>
															                  </td>
															  <td>
																<div class="input-group">
		     													 <div class="input-group-addon">&#8369;</div>
															      <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control" value = "<?php echo $result['price'];?>" id="exampleInputAmount" name="price" placeholder="Enter Price" required>
															      <div class="input-group-addon">.00</div>
															    </div>
															</td>
														</tr>
															
																     
															       </table>
														      </div>
														
														      <div class="modal-footer">
														
														        <button  class="btn btn-default" data-dismiss="modal">Cancel</button>
														
														        <button type="submit" class="btn btn-primary"  value="<?php echo $result['eventbudgetid'];?>"  name="update" >Update</button>
														
														      </div>
													
														    </div>
														
														  </div>
														
														</div>
														<!-- End of Modal Edit-->

                                                       </figure>
												</form>
												</div>
												<?php if($sc%2==1){?>
													</div>
												<?php } } }?>


											</body>
											</html>
