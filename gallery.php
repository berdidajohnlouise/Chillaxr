<?php
	include'function.php';
	include 'session.php';
	include'galleryck.php';
	include'loginck.php';
	$c=0;
	$y=0;
	$genre ="";
	$imgformat = "";
	if(isset($_POST['search_music'])){
		unset($_POST['search_movie']);
		$music_title=$_POST['music_title'];
	}
	if(isset($_POST['search_movie'])){
		unset($_POST['search_music']);
		$movie_title=$_POST['movie_title'];
	}

	
	$page = $_GET['page'];
	$page1 = $page;
	
	if($page == "" || $page == 1){
		$page = 0;
	}else{
		$page = ($page*4)-4;
	}

	if(isset($_SESSION['mem_id'])){
	$fullname = getfullname($_SESSION['mem_id']);
	}
	
	$count1 = pageceil();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Store - MMS</title>


    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
    <link href="dist/css/lightbox.css" rel="stylesheet">	
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href='img/mixx.png' rel='icon' type='image/x-icon'/> 
    <link href="css/style.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
	

    <style type="text/css">

			/*Lightbox effect style*/
	  		/*  a.fancybox img
	  		   {
	    	    	border: none;
	      	 		 box-shadow: 0 1px 7px rgba(0,0,0,0.6);
	       			 -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition:all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out;transition: all 0.2s ease-in-out;
	  		  } 
	   		 a.fancybox:hover img 
	   		 {
	      			position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
	   		 }*/
	   		 .modal-header{background-color:#1975FF;color:white;}

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
			  padding: 5px 20px;
			  opacity: 0;
			  width:100%;
			  -webkit-transition: all 0.6s ease;
			  -moz-transition:    all 0.6s ease;
			  -o-transition:      all 0.6s ease;
			}
			figure:hover figcaption {
			  opacity: 1;
			}
			figure:before {
			  content: "?";
			  position: absolute;
			  font-weight: 800;
			  background: black;
			  background: rgba(255,255,255,0.75);
			  text-shadow: 0 0 5px white;
			  color: black;
			  width: 24px;
			  height: 24px;
			  -webkit-border-radius: 12px;
			  -moz-border-radius:    12px;
			  border-radius:         12px;
			  text-align: center;
			  font-size: 14px;
			  line-height: 24px;
			  -moz-transition: all 0.6s ease;
			  opacity: 0.75;
			}
			figure:hover:before {
			  opacity: 0;
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

			html, body, ul {
			  padding:0;
			  margin:0;
			}
			hr{
				height: 5px;
				border: 0;
			  border-left:200px solid #1975FF;
				box-shadow: 0 10px 10px -10px #8c8b8b inset;
			}

	</style>

  </head>
  <body onload=setInterval("window.clipboardData.setData('text','')",2) oncontextmenu="return false" onselectstart="return false">

   <div class="container-fluid">
   	<div class="row">
			<div class="col-md-12">
			<?php
				include('includes/header.php');
			?>
	<div class="row">
		<div class="col-md-12">
					<?php include('includes/main-menu.php');?>
				</div>
			</div>
			<br />
			<!--Code for Tab-pane -->
			<div class= "col-md-12">	
					<div class="tabbable" id="tabs-870796">
						<ul class="nav nav-tabs">
							<li <?php if((!isset($_GET['year'])) && (!isset($_GET['all'])) && (!isset($_GET['genre'])) && (!isset($_GET['music'])) && (!isset($_POST['search_movie']))  && (!isset($_POST['search_music'])) && (!isset($_GET['ebook'])) && (!isset($_POST['search_ebook']))){ ?> class="active" <?php } ?> >
								<a href="#panel-image" data-toggle="tab">Images</a>
							</li> 
							<li <?php if((isset($_GET['year'])) || (isset($_GET['all'])) || (isset($_GET['genre'])) || (isset($_POST['search_movie']))){ ?> class="active" <?php } ?>>
								<a  href="#panel-video" data-toggle="tab">Movies</a>
							</li>
							<li <?php if((isset($_GET['music'])) || (isset($_POST['search_music']))){ ?> class="active" <?php } ?>>
								<a href="#panel-audio" data-toggle="tab">Audio</a>
							</li>
							<li <?php if((isset($_GET['ebook'])) || (isset($_POST['search_ebook']))){ ?> class="active" <?php } ?>>
								<a href="#panel-text" data-toggle="tab">Text</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane <?php if((!isset($_GET['year'])) && (!isset($_GET['all'])) && (!isset($_GET['genre'])) && (!isset($_GET['music'])) && (!isset($_POST['search_movie']))  && (!isset($_POST['search_music'])) && (!isset($_GET['ebook'])) && (!isset($_POST['search_ebook']))){ ?> active	 <?php } ?>" id="panel-image">
								<br>
								<div class="row">
									<div class="col-md-10">
										<div>
											<form class="form-horizontal" role="form"   method="POST" enctype="multipart/form-data">
										 <span style="color:#1975FF:float:left;font-weight:300px;"><img src="img/image-icon.png" style="width:90px;height:80px;float:left;"/></span>
										 <span style="margin-top:20px;float:left;color:#1975FF;font-size:25px;"><b>Image</b> <i style="color:#8383FF;">Store</i></span>
										 <span style="float:right;margin-top:20px;"><button type="submit" name="search_image" class="form-control">Search</button></span>
										<div class="inner-addon left-addon" style="float:right;margin-top:20px;" >

											<i class="glyphicon glyphicon-search "></i><input style="width:100%;"class="form-control" id="username" type="text" name="image_title" placeholder="Enter Image Name"/>
																				
										</div>
										</form>
										</div>
										<br>
										<br>
										<hr>
										<br>
								<?php 
									$con = dbconn();
								 	$sql = "SELECT * FROM tblseller";
								 	$stm = $con->prepare($sql);
								 	$stm->execute();
								 	$trader = $stm->fetchAll();
										
										$con1 = dbconn();
									 	$sql1 = "SELECT * FROM tblphotos ";
										$stm1 = $con1->prepare($sql1);
										$stm1->execute();
										$image = $stm1->fetchAll();
										$con1 = null;

									if(isset($_GET['format'])){

										$imgformat = $_GET['format'];
										$con1 = dbconn();
									 	$sql1 = "SELECT * FROM tblphotos WHERE photo_type LIKE ?";
										$stm1 = $con1->prepare($sql1);
										$stm1->execute(array("%$imgformat%"));
										$image = $stm1->fetchAll();
										$con1 = null;
									}
									if(isset($_GET['image'])){

										
										$con1 = dbconn();
									 	$sql1 = "SELECT * FROM tblphotos";
										$stm1 = $con1->prepare($sql1);
										$stm1->execute(array());
										$image = $stm1->fetchAll();
										$con1 = null;
									}
									if(isset($_POST['search_image'])){

										$search_image = $_POST['image_title'];
										
										$con1 = dbconn();
									 	$sql1 = "SELECT * FROM tblphotos WHERE photo_name LIKE ?";
										$stm1 = $con1->prepare($sql1);
										$stm1->execute(array("%$search_image%"));
										$image = $stm1->fetchAll();
										$con1 = null;
									}


									if(count($image) > 0){
									foreach($trader as $trader){
										$fullname = ucfirst($trader['fname'])." ".ucfirst($trader['lname']);

										if(isset($_GET['format'])){
											$con1 = dbconn();
										 	$sql1 = "SELECT * FROM tblphotos WHERE photo_owner=? AND photo_type LIKE ?";
											$stm1 = $con1->prepare($sql1);
											$stm1->execute(array($trader['mem_id'],"%$imgformat%"));
											$image = $stm1->fetchAll();
											$con1 = null;
										}else if(isset($_POST['search_image'])){

										
										$con1 = dbconn();
									 	$sql1 = "SELECT * FROM tblphotos WHERE photo_owner=? AND photo_name LIKE ?";
										$stm1 = $con1->prepare($sql1);
										$stm1->execute(array($trader['mem_id'],"%$search_image%"));
										$image = $stm1->fetchAll();
										$con1 = null;

										}else{
											$con1 = dbconn();
										 	$sql1 = "SELECT * FROM tblphotos WHERE photo_owner=? ";
											$stm1 = $con1->prepare($sql1);
											$stm1->execute(array($trader['mem_id']));
											$image = $stm1->fetchAll();
											$con1 = null;
										}

										foreach($image as $image){ 
											$c++; 
											$image_id = $image['photo_id'];
											$img_name = explode(".", $image['photo_name']);
											$img = $img_name[0]; 
											$imagename=$image['photo_name']; list($width,$height,$type,$attr)=getimagesize("user_files/$fullname/image/$imagename");
											 
											

									?>
										
											
												<div class="col-md-4 " >
													<div class="thumbnail">
														
														
															
															<img class="img-responsive" src="user_files/<?php echo $fullname;?>/image/watermark/watermark_<?php echo $image['photo_name']; ?>" style="height:180px;width:100%"/>
															
														
												

														 <div class="caption" >

															<p style="color:#808080;font-family: Arial, Helvetica, sans-serif;font-size:150%;"><?php echo $img; ?></p>
															<p><b style="color:grey;align:left;">Type:</b><b style="color:#1975FF;align:left;"> <?php $type_exp = explode("/",$image['photo_type']); echo strtoupper($type_exp[1]);?></b>
									                      	 <b style="color:#1975FF;align:right;padding-left:20%;">PHP <?php echo number_format($image['photo_price'],2); ?></b></p>
									                       
									                        <p class="text-center" >

									                            <a href="processorder.php?action=process&product=image&id=<?php echo $image_id;?>" class="btn btn-primary">Buy Now</a> <a href="#" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $c;?>">More Info</a>
									                       		
									                        </p>
									                        <p class="text-center">
									                        <a href="processorder.php?action=process&product=image&id=<?php echo $image_id;?>" class="btn btn-primary btn-justified">Buy Ownership</a>
									                   		</p>
									                    </div>
									
													</div>
												
											<div id="<?php echo $c;?>" class="modal fade" role="dailog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4><p class="text-center">Image Infomation</p></h4>
														</div>
														<div class="modal-body">
															<a href="user_files/<?php echo $fullname;?>/image/watermark/watermark_<?php echo $image['photo_name'];?>" >
															<img src="user_files/<?php echo $fullname;?>/image/watermark/watermark_<?php echo $image['photo_name']; ?>" width="100%" height="100%">
															</a>
														</div>
														<div class="modal-footer">
															<table align="center" >
												                <tr>
												                    <td>Name</td>
												                    <td align="left"><h5 style='text-decoration:none; color:green;'>: <strong><?php echo $image['photo_name']; ?></strong></h5></td>                              
												                </tr>
												                <tr>
												                    <td>Size in bytes</td>
												                    <td align="left"><h5 style='text-decoration:none; color:green;'>: <strong><?php echo $image['photo_size'];?></strong></h5></td>
												                </tr>
												                <tr>
												                    <td>Attribute</td>
												                    <td align="left"><h5 style='text-decoration:none; color:green;'>: <strong><?php echo $width."x".$height; ?></strong></h5></td>
												                </tr>
												                <tr>
												                    <td>Category</td>
												                    <td align="left"><h5 style='text-decoration:none; color:green;'>: <strong><?php echo $image['photo_category']; ?></strong></h5></td>
												                </tr>
												                <tr>
												                    <td>Price</td>
												                    <td align="left"><h5 style='text-decoration:none; color:green;'>: <strong>&#8369;<?php echo number_format($image['photo_price'],2); ?></strong></h5></td>
												                </tr>
												                
												            </table>
														</div>
													</div>
												</div>

											</div>
										</div>
										
								<?php } } }else {?>
											<div style="width:100;padding-top:10%;" >
												<h1 style="color:#C6C6A9;align:center;"><p class="text-center">Oops Sorry!</p></h1>
												<h2 style="color:#C6C6A9;align:center;font-weight:50;font-weight:lighter;padding-left:5%"><p class="text-center">But we dont have yet a Image Collection for <?php echo $imgformat;?>!</p></h2>
											</div>
								<?php } ?>
										</div>
										<div class="col-md-2">
											<div class="panel-group">
											  <div class="panel panel-default">
											    <div class="panel-heading" style="background-color:#3083FF;color:white;">
											      <h4 class="panel-title">
											        <a data-toggle="collapse" href="#collapse1" style="text-decoration:none;">Search by Image Format</a>
											      </h4>
											    </div>
											    <div id="collapse1" class="panel-collapse collapse in">
											      <ul class="list-group">
											      	<li class="list-group-item"><a href="gallery.php?image=all&page=1">All Images</a></li>
											      	<li class="list-group-item"><a href="gallery.php?format=BMF&page=1">BMF</a></li>
											      	<li class="list-group-item"><a href="gallery.php?format=GIF&page=1">GIF</a></li>
											      	<li class="list-group-item"><a href="gallery.php?format=IFF&page=1">IFF</a></li>
											        <li class="list-group-item"><a href="gallery.php?format=JPG&page=1">JPG</a></li>
											        <li class="list-group-item"><a href="gallery.php?format=JPEG&page=1">JPEG</a></li>
											        <li class="list-group-item"><a href="gallery.php?format=JP2&page=1">JP2</a></li>
											        <li class="list-group-item"><a href="gallery.php?format=PNG&page=1">PNG</a></li>
											        <li class="list-group-item"><a href="gallery.php?format=TIFF&page=1">TIFF</a></li>
										 			<li class="list-group-item"><a href="gallery.php?format=XBM&page=1">XBM</a></li>
											      </ul>
											      <div class="panel-footer" style="background-color:#3083FF;color:white;">Image Format</div>
											    </div>
											  </div>
											</div>

										</div>
								
								</div>
							
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
									<ul class="pagination pagination">
										<li <?php if($page1==1){?>class="disabled"<?php } ?>>
											<a href="<?php if($page1==1){?> # <?php }?>" onClick='history.go(-1)'>Prev</a>
										</li>
										<?php for($i=1;$i<=$count1;$i++){?>
										<li>
											<a href="gallery.php?page=<?php echo $i; ?>"><?php echo $i;?></a>
										</li>
										<?php } ?>
										<li <?php if($page1==$count1){?>class="disabled"<?php } ?>>
											<a href="<?php if($page1==$count1){?> # <?php }?>"  onClick='history.go(+1)' >Next</a>
										</li>
									</ul>
								</div>
								<div class="col-md-4">
								</div>
							</div>
							<div class="tab-pane <?php if((isset($_GET['year'])) || (isset($_GET['all'])) || (isset($_GET['genre'])) || (isset($_POST['search_movie']))){ ?> active <?php } ?>" id="panel-video"><!--video tab pane start-->
								
								<br>
								<div class="row">	
									<div class="col-md-10" >
										<div>
										<form class="form-horizontal" role="form"   method="POST" enctype="multipart/form-data">
											 <span style="color:#1975FF:float:left;font-weight:300px;"><img src="img/movie-icon.png" style="width:90px;height:80px;float:left;"/></span>
											 <span style="margin-top:20px;float:left;color:#1975FF;font-size:25px;"><b>Movie</b> <i style="color:#8383FF;">Store</i></span>
											 <span style="float:right;margin-top:20px;"><button type="submit" name="search_movie" class="form-control">Search</button></span>
											<div class="inner-addon left-addon" style="float:right;margin-top:20px;" >

												<i class="glyphicon glyphicon-search "></i><input style="width:100%;"class="form-control" id="username" type="text" name="movie_title" placeholder="Enter Movie Title"/>
																						
											</div>
										</form>
										</div>
										<br>
										<br>
										<hr>
										<br>
								<?php 
									$con = dbconn();
								 	$sql = "SELECT * FROM tblseller";
								 	$stm = $con->prepare($sql);
								 	$stm->execute();
								 	$trader = $stm->fetchAll();
								 		
									if(isset($_POST['search_movie'])){

										$movie_title = $_POST['movie_title'];

										$video = count_search_movie($movie_title);
									}elseif(isset($_GET['genre'])){
										$genre = $_GET['genre'];
										$con1 = dbconn();
									 	$sql1 = "SELECT * FROM video WHERE genre LIKE ?";
										$stm1 = $con1->prepare($sql1);
										$stm1->execute(array("%$genre%"));
										$row_count = $stm1->rowCount();
										$video = $stm1->fetchAll();
										$con1 = null;
										
									}elseif(isset($_GET['year'])){
										$y = $_GET['year'];
										$con1 = dbconn();
									 	$sql1 = "SELECT * FROM video WHERE year=?";
										$stm1 = $con1->prepare($sql1);
										$stm1->execute(array($y));
										$row_count = $stm1->rowCount();
										$video = $stm1->fetchAll();
										$con1 = null;
										
									}elseif(isset($_GET['movies'])){
										$con1 = dbconn();
									 	$sql1 = "SELECT * FROM video";
										$stm1 = $con1->prepare($sql1);
										$stm1->execute();
										$row_count = $stm1->rowCount();
										$video = $stm1->fetchAll();
										$con1 = null;
										
									}else{
										$con1 = dbconn();
									 	$sql1 = "SELECT * FROM video";
										$stm1 = $con1->prepare($sql1);
										$stm1->execute();
										$row_count = $stm1->rowCount();
										$video = $stm1->fetchAll();
										$con1 = null;
									}

								if(count($video) > 0){
									foreach($trader as $trader){
										$fullname = ucfirst($trader['fname'])." ".ucfirst($trader['lname']);

										if(isset($_POST['search_movie'])){

										$movie_title = $_POST['movie_title'];
										$video = search_movie($trader['mem_id'],$movie_title);
										
										}elseif($y > 0){

										$con1 = dbconn();

									 	$sql1 = "SELECT * FROM video WHERE owner=? AND year=?";
										$stm1 = $con1->prepare($sql1);
										$stm1->execute(array($trader['mem_id'],$y));

										$row_count = $stm1->rowCount();
										$video = $stm1->fetchAll();
										$con1 = null;

										}else if(isset($_GET['genre'])){

										$con1 = dbconn();
									 	$sql1 = "SELECT * FROM video WHERE owner=? AND genre LIKE ?";
										$stm1 = $con1->prepare($sql1);
										$stm1->execute(array($trader['mem_id'],"%$genre%"));
										$row_count = $stm1->rowCount();
										$video = $stm1->fetchAll();
										$con1 = null;

											
										}else{

										$con1 = dbconn();
									 	$sql1 = "SELECT * FROM video WHERE owner=?";
										$stm1 = $con1->prepare($sql1);
										$stm1->execute(array($trader['mem_id']));
										$row_count = $stm1->rowCount();
										$video = $stm1->fetchAll();
										$con1 = null;
										}

									
										foreach($video as $video){ 
											$c++; 
											$new_genre = explode(",", $video['genre']);

									?>
										
										<div  class="col-md-4"  >
											<div class="thumbnail">
												
												<a href="watch.php?vid=<?php echo $video['vid_id'];?>&user=<?php echo $fullname;?>" target="_blank" >
													<img class="img-responsive" src="user_files/<?php echo $fullname;?>/video/<?php echo $video['poster_image']; ?>" style="height:180px;width:100%"/>
												</a>
											<div class="caption" style="padding-top:10px;">

												 <p class="text-left" style="color:#1975FF;" ><b><a data-tooltip="tooltip" title="<?php echo $video['title']; ?>" href="watch.php?vid=<?php echo $video['vid_id'];?>&user=<?php echo $fullname;?>" target="_blank" ><?php if(strlen($video['title'])>26){ echo substr($video['title'],0,26);}else{echo $video['title'];}  ?></a></b></p>
						                        <span style="color:#808080;font-family: Arial, Helvetica, sans-serif;">Quality :<label style="color:#1975FF"><?php echo $video['quality']; ?></label><span style="color:#808080;font-family: Arial, Helvetica, sans-serif;padding-left:10%;;">Year :<label style="color:#1975FF"><?php echo $video['year']; ?></label></span><br>
						                        <p data-tooltip="tooltip" title="<?php $len=''; for($i=0;$i<=count($new_genre)-1;$i++){ $len .= $new_genre[$i].' | ';} echo $len;?>" style="color:#808080;font-family: Arial, Helvetica, sans-serif;">genrere :<span data-tooltip="tooltip" title="<?php $len=''; for($i=0;$i<=count($new_genre)-1;$i++){ $len .= $new_genre[$i].' | ';} echo $len;?>" style="color:#1975FF;cursor:pointer;" ><?php $len=""; for($i=0;$i<=count($new_genre)-1;$i++){ $len .= $new_genre[$i]." | ";} if(strlen($len)>=18){ echo substr($len,0,18);}else{echo $len;} ?><span></p>
						                    </div>

										 
										</div>
											
									</div>
										
								<?php } } } else { if(isset($_POST['search_movie'])){ ?>
											<div style="width:100;padding-top:10%;" >
												<h1 style="color:#C6C6A9;align:center;"><p class="text-center">Oops Sorry!</p></h1>
												<h2 style="color:#C6C6A9;align:center;font-weight:50;font-weight:lighter;padding-left:5%"><p class="text-center">No Results Found for <?php echo $movie_title;?>!</p></h2>
											</div>
									<?php }elseif(isset($_GET['genre'])){?>

											<div style="width:100;padding-top:10%;" >
												<h1 style="color:#C6C6A9;align:center;"><p class="text-center">Oops Sorry!</p></h1>
												<h2 style="color:#C6C6A9;align:center;font-weight:50;font-weight:lighter;padding-left:5%"><p class="text-center">But we dont have yet a Movie collection for <?php echo $genre;?>!</p></h2>
											</div>
										<?php } else {?>
										<div style="width:100;padding-top:10%;" >
												<h1 style="color:#C6C6A9;align:center;"><p class="text-center">Oops Sorry!</p></h1>
												<h2 style="color:#C6C6A9;align:center;font-weight:50;font-weight:lighter;padding-left:5%"><p class="text-center">But we dont have yet a Movie collection for year <?php echo $y;?>!</p></h2>
											</div>
								<?php  } } ?>
								
									</div>
									<div  class="col-md-2">
											<div class="panel-group">
											  <div class="panel panel-default">
											    <div class="panel-heading" style="background-color:#3083FF;color:white;">
											      <h4 class="panel-title">
											        <a data-toggle="collapse" href="#genre" style="text-decoration:none;">Search by Genre</a>
											      </h4>
											    </div>
											    <div id="genre" class="panel-collapse collapse ">
											      <ul class="list-group">
											      	<li class="list-group-item"><a href="gallery.php?movies=all&page=1">All Movies</a></li>
											      	<li class="list-group-item"><a href="gallery.php?genre=Action&page=1">Action</a></li>
											      	<li class="list-group-item"><a href="gallery.php?genre=Adventure&page=1">Adventure</a></li>
											      	<li class="list-group-item"><a href="gallery.php?genre=Animation&page=1">Animation</a></li>
											        <li class="list-group-item"><a href="gallery.php?genre=Bibliography&page=1">Bibliography</a></li>
											        <li class="list-group-item"><a href="gallery.php?genre=Comedy&page=1">Comedy</a></li>
											        <li class="list-group-item"><a href="gallery.php?genre=Crime&page=1">Crime</a></li>
											        <li class="list-group-item"><a href="gallery.php?genre=Documentary&page=1">Documentary</a></li>
											        <li class="list-group-item"><a href="gallery.php?genre=Drama&page=1">Drama</a></li>
										 			<li class="list-group-item"><a href="gallery.php?genre=Family&page=1">Family</a></li>
										 			<li class="list-group-item"><a href="gallery.php?genre=Fantasy&page=1">Fantasy</a></li>
											        <li class="list-group-item"><a href="gallery.php?genre=History&page=1">History</a></li>
										 			<li class="list-group-item"><a href="gallery.php?genre=Horror&page=1">Horror</a></li>
										 			<li class="list-group-item"><a href="gallery.php?genre=Music&page=1">Music</a></li>
										 			<li class="list-group-item"><a href="gallery.php?genre=Musical&page=1">Musical</a></li>
											        <li class="list-group-item"><a href="gallery.php?genre=Mystery&page=1">Mystery</a></li>
										 			<li class="list-group-item"><a href="gallery.php?genre=News&page=1">News</a></li>
										 			<li class="list-group-item"><a href="gallery.php?genre=Philosophical&page=1">Philosophical</a></li>
										 			<li class="list-group-item"><a href="gallery.php?genre=Romance&page=1">Romance</a></li>
											        <li class="list-group-item"><a href="gallery.php?genre=Sci-Fi&page=1">Sci-Fi</a></li>
										 			<li class="list-group-item"><a href="gallery.php?genre=Thriller&page=1">Thriller</a></li>
										 			<li class="list-group-item"><a href="gallery.php?genre=War&page=1">War</a></li>

											      </ul>
											      <div class="panel-footer" style="background-color:#3083FF;color:white;">Movie genre</div>
											    </div>
											  </div>

											  <div class="panel panel-default">
											    <div class="panel-heading" style="background-color:#3083FF;color:white;">
											      <h4 class="panel-title">
											        <a data-toggle="collapse" href="#year" style="text-decoration:none;">Search by Year</a>
											      </h4>
											    </div>
											    <div id="year" class="panel-collapse collapse in">
											      <ul class="list-group">
											      	<li class="list-group-item"><a href="gallery.php?all=1&page=1">All Movies</a></li>
											      	<?php for($i=2015;$i>=1995;$i--){?>
											      	<li class="list-group-item"><a href="gallery.php?year=<?php echo $i;?>&page=1"><?php echo $i;?></a></li>
											      	<?php } ?>
												 </ul>
											      <div class="panel-footer" style="background-color:#3083FF;color:white;">Movie Year</div>
											    </div>
											  </div>
											</div>

										</div>
								</div>
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
									<ul class="pagination pagination">
										<li>
											<a href="#">Prev</a>
										</li>
										<li>
											<a href="#">1</a>
										</li>
										<li>
											<a href="#">2</a>
										</li>
										<li>
											<a href="#">3</a>
										</li>
										<li>
											<a href="#">4</a>
										</li>
										<li>
											<a href="#">5</a>
										</li>
										<li>
											<a href="#">Next</a>
										</li>
									</ul>
								</div>
								<div class="col-md-4">
								</div>
							</div><!--video tab pane end-->
							<div class="tab-pane <?php if((isset($_GET['music'])) || (isset($_POST['search_music']))){ ?> active <?php } ?>" id="panel-audio">
								<br>
								<div class="row">
									<div class="col-md-9">
										
										<div>
											<form class="form-horizontal" role="form"   method="POST" enctype="multipart/form-data">
										 <span style="color:#1975FF:float:left;font-weight:300px;"><img src="img/music-icon.png" style="width:90px;height:80px;float:left;"/></span>
										 <span style="margin-top:20px;float:left;color:#1975FF;font-size:25px;"><b>Music</b> <i style="color:#8383FF;">Store</i></span>
										 <span style="float:right;margin-top:20px;"><button type="submit" name="search_music" class="form-control">Search</button></span>
										<div class="inner-addon left-addon" style="float:right;margin-top:20px;" >

											<i class="glyphicon glyphicon-search "></i><input style="width:100%;"class="form-control" id="username" value="<?php if(isset($_POST['search_music'])){echo htmlentities($music_title);}?>" type="text" name="music_title" placeholder="Enter Music Title"/>
											
										
										</div>
										</form>
										</div>
										<br>
										<br>
										<hr>
									
										<br> 
										<div class="table-responsive">
											<table class="table table-hover">
												<?php 
													$con = dbconn();
												 	$sql = "SELECT * FROM tblseller";
												 	$stm = $con->prepare($sql);
												 	$stm->execute();
												 	$trader = $stm->fetchAll();

												 	if(isset($_POST['search_music'])){
												 		$music_title = $_POST['music_title'];
												 		$audio = count_search_music($music_title);
												 	}elseif(isset($_GET['music'])){
												 		$music = $_GET['music'];
												 		
												 		if($music == "All"){
												 		$audio = count_audio();
												 		}else{
												 		$audio = count_music_genre($music);
												 		}
												 	}else{
												 		$audio = count_audio();
												 	}

												 	if(count($audio) > 0){

													foreach($trader as $trader){

														if(isset($_POST['search_music'])){
												 		
												 		$audio = search_music($trader['mem_id'],$music_title);
												 		}elseif(isset($_GET['music'])){

															if ($music == "All") {
															$con1 = dbconn();

														 	$sql1 = "SELECT * FROM  tblmp3 WHERE owner=?";
															$stm1 = $con1->prepare($sql1);
															$stm1->execute(array($trader['mem_id']));

															$row_count = $stm1->rowCount();
															$audio = $stm1->fetchAll();
															$con1 = null;
																													
															}else{
																$audio = music_genre($music,$trader['mem_id']);	
																
															
															}
														}else{

														$con1 = dbconn();

													 	$sql1 = "SELECT * FROM  tblmp3 WHERE owner=?";
														$stm1 = $con1->prepare($sql1);
														$stm1->execute(array($trader['mem_id']));

														$row_count = $stm1->rowCount();
														$audio = $stm1->fetchAll();
														$con1 = null;
														}

														foreach($audio as $audio_dis){
														$audio_exp = explode(".",$audio_dis['name']);
														$audio_name = $audio_exp[0];
												?>
												<tr>
													
													<td>

														<a style="color:grey;text-decoration:none;" href="user_files/<?php echo $fullname;?>/audio/<?php echo $audio_dis['name']; ?>" value="<?php echo $audio_name;?>"><span  data-tooltip="tooltip" title="Click to Play" onMouseOver="this.style.color='#0055FF'" onMouseOut="this.style.color='grey'" style="cursor:pointer;"><?php echo $audio_name;?></span></a>
														
													</td>
													<td>

														<a style="color:grey;text-decoration:none;" href="gallery.php?music=<?php echo $audio_dis['category'];?>&page=1" value="<?php echo $audio_dis['category'];?>"><span  data-tooltip="tooltip" title="Genre" onMouseOver="this.style.color='#0055FF'" onMouseOut="this.style.color='grey'" style="cursor:pointer;float:right"><?php echo $audio_dis['category'];?></span></a>
														
													</td>
													<td>

														<a style="color:grey;text-decoration:none;" href="gallery.php?music=<?php echo $audio_dis['category'];?>&page=1" value="<?php echo $audio_dis['category'];?>"><span  data-tooltip="tooltip" title="Genre" onMouseOver="this.style.color='#0055FF'" onMouseOut="this.style.color='grey'" style="cursor:pointer;float:right"><?php echo "Php ".$audio_dis['price'].".00";?></span></a>
														
													</td>
													
													<td>
														<a href="processorder.php?action=process&product=music&id=<?php echo $audio_dis['mp3_id'];?>"><span data-tooltip="tooltip" title="Download" onMouseOver="this.style.color='#0055FF'" onMouseOut="this.style.color='grey'" class="glyphicon glyphicon-download" data-toggle="modal" data-target="#aud_e<?php echo $aud_e;?>"  style="color:grey;cursor:pointer;float:right;padding-left:5px;"></span></a>
														

													</td>
												</tr>
												<?php }} }else{ 
													if(isset($_POST['search_music'])){?>
													<div style="width:100;padding-top:10%;" >
													<h1 style="color:#C6C6A9;align:center;"><p class="text-center">Oops Sorry!</p></h1>
													<h2 style="color:#C6C6A9;align:center;font-weight:50;font-weight:lighter;padding-left:5%"><p class="text-center">No Result Found for <?php echo $music_title;?>!</p></h2>
													</div>

												<?php }elseif(isset($_GET['music'])){
												?>
												<div style="width:100;padding-top:10%;" >
													<h1 style="color:#C6C6A9;align:center;"><p class="text-center">Oops Sorry!</p></h1>
													<h2 style="color:#C6C6A9;align:center;font-weight:50;font-weight:lighter;padding-left:5%"><p class="text-center">But we dont have yet a Music Collection for <?php echo $music;?>!</p></h2>
												</div>
												<?php }else{?>
												<div style="width:100;padding-top:10%;" >
													<h1 style="color:#C6C6A9;align:center;"><p class="text-center">Oops Sorry!</p></h1>
													<h2 style="color:#C6C6A9;align:center;font-weight:50;font-weight:lighter;padding-left:5%"><p class="text-center">But we dont have yet a Music Collection!</p></h2>
												</div>
												<?php }} ?>
											</table>
										</div>
									</div>
								<div class="col-md-3">
									<div class="panel-group">
											  <div class="panel panel-default">
											    <div class="panel-heading" style="background-color:#3083FF;color:white;">
											      <h4 class="panel-title">
											        <a data-toggle="collapse" href="#audio_genre" style="text-decoration:none;">Search by Music Genre</a>
											      </h4>
											    </div>
											    <div id="audio_genre" class="panel-collapse collapse in">
											      <ul class="list-group">
											      	 <li class="list-group-item"><a href="gallery.php?music=All&page=1">All Music</a></li>
										 			 <li class="list-group-item"><a href="gallery.php?music=Alternative Music&page=1">Alternative Music</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Blues&page=1">Blues</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Classical Music&page=1">Classical Music</a>/li>
													 <li class="list-group-item"><a href="gallery.php?music=Country Music&page=1">Country Music</li>
													 <li class="list-group-item"><a href="gallery.php?music=Dance Music&page=1">Dance Music</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Easy Listening&page=1">Easy Listening</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Electronic Music&page=1">Electronic Music</a>/li>
													 <li class="list-group-item"><a href="gallery.php?music=European Music&page=1">European Music</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Hip Hop/Rap&page=1">Hip Hop/Rap</a>/li>
													 <li class="list-group-item"><a href="gallery.php?music=Indie Pop&page=1">Indie Pop</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Inspirational&page=1">Inspirational</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Asian Pop&page=1">Asian Pop</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Jazz&page=1">Jazz</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Latin Music&page=1">Latin Music</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=New Age&page=1">New Age</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Opera&page=1">Opera</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Pop&page=1">Pop</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=R&B&page=1">R&B</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Reggae&page=1">Reggae</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=Rock&page=1">Rock</a></li>
													 <li class="list-group-item"><a href="gallery.php?music=all&page=1">World Music/Beats</a></li>
											      </ul>
											      <div class="panel-footer" style="background-color:#3083FF;color:white;">Music</div>
											    </div>
											  </div>
											</div>
								</div>
								</div>
								<div class="row">
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
									<ul class="pagination pagination">
										<li>
											<a href="#">Prev</a>
										</li>
										<li>
											<a href="#">1</a>
										</li>
										<li>
											<a href="#">2</a>
										</li>
										<li>
											<a href="#">3</a>
										</li>
										<li>
											<a href="#">4</a>
										</li>
										<li>
											<a href="#">5</a>
										</li>
										<li>
											<a href="#">Next</a>
										</li>
									</ul>
								</div>
								<div class="col-md-4">
								</div>
							</div>
						</div>
							

							<div class="tab-pane <?php if((isset($_GET['ebook'])) || (isset($_POST['search_ebook']))){ ?> active <?php } ?>" id="panel-text">
									
									
								<div class="row">
									<div class="col-md-9">
									<div>
										<form class="form-horizontal" role="form"   method="POST" enctype="multipart/form-data">
											 <span style="color:#1975FF:float:left;font-weight:300px;"><img src="img/ebook-icon.png" style="width:90px;height:70px;float:left;margin-top:10px;"/></span>
											 <span style="margin-top:20px;float:left;color:#1975FF;font-size:25px;"><b>Ebook</b> <i style="color:#8383FF;">Store</i></span>
											 <span style="float:right;margin-top:20px;"><button type="submit" name="search_ebook" class="form-control">Search</button></span>
											<div class="inner-addon left-addon" style="float:right;margin-top:20px;" >

												<i class="glyphicon glyphicon-search "></i><input style="width:100%;"class="form-control" id="username" value="<?php if(isset($_POST['search_music'])){echo htmlentities($music_title);}?>" type="text" name="ebook_title" placeholder="Enter Ebook Title"/>
												
											
											</div>
										</form>
									</div>
										<br>
										<br>
										<hr>
									
										<br> 
										<?php
										  $trader = all_seller();
										  if(isset($_POST['search_ebook'])){
										  	$ebook_title = $_POST['ebook_title'];

										  	$ebook = search_ebook($ebook_title);
										  }elseif(isset($_GET['ebook'])){
										  	$ebook_genre = $_GET['ebook'];
										  	
										  	if($ebook_genre == "All"){
										  		$ebook = all_ebook();
										  	}else{
										  	$ebook = genre_ebook($ebook_genre);
										  	}
										  }else{
										  	$ebook = all_ebook();
										  }

										  if(count($ebook)>0){
										  foreach ($trader as $trader) {
										  		if(isset($_POST['search_ebook'])){
										  			$ebook = search_ebook_title($trader['mem_id'],$ebook_title);
										  		}elseif(isset($_GET['ebook'])){

										  			if($ebook_genre == "All"){
										  				$ebook = display_ebook($trader['mem_id']);
											  		
												  	}else{
												  		
											  		$ebook = display_ebook_genre($trader['mem_id'],$ebook_genre);
												  	}
											  	}else{
										  		
										  		$ebook = display_ebook($trader['mem_id']);
										  		}
										  		foreach ($ebook as $ebook) {
										  		
										  		$eb_exp = explode(".",$ebook['text_name']);
										  		$path_name = $eb_exp[0].".jpg";

										  	
										?>
										
										<div class="col-sm-3">
											
												<div class="thumbnail">
												
													<img class="img-thumbnail" src="user_files/<?php echo $fullname;?>/text/poster_<?php echo $path_name; ?>" style="height:180px;width:100%"/>
												
												</div>
								
										</div>
										<div class="col-lg-6" class="col-sm-3">
											

													 <p class="text-left" style="color:#1975FF;" ><b><a  target="_blank" ><?php if(strlen($ebook['text_title'])>26){ echo substr($ebook['text_title'],0,26);}else{echo $ebook['text_title'];}  ?></a></b><button style="float:right;" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"><label style="padding-left:7px;">Php<?php echo $ebook['text_price'].".00";?></label></span></button></p>
													 <p style="padding-top:10px;"><b style="color:#B8B8B8;">Genre:</b> <span style="color:#1975FF;" ><?php echo $ebook['text_category'];?></span><button style="float:right;" class="btn btn-success"><a href="processorder.php?action=process&product=ebook&id=<?php echo $ebook['text_id'];?>">Download Now</a><span style="padding-left:6px;" class="glyphicon glyphicon-download-alt"></span></button></p>
							                 		<p style="padding-top:6px;"><?php echo $ebook['text_summary'];?></p>
							                
							                 
										</div>
										<hr>
										

										<?php } } }else{ 
													if(isset($_POST['search_ebook'])){?>
													<div style="width:100;padding-top:10%;" >
													<h1 style="color:#C6C6A9;align:center;"><p class="text-center">Oops Sorry!</p></h1>
													<h2 style="color:#C6C6A9;align:center;font-weight:50;font-weight:lighter;padding-left:5%"><p class="text-center">No Result Found for <?php echo $ebook_title;?>!</p></h2>
													</div>

												<?php }elseif(isset($_GET['ebook'])){
												?>
												<div style="width:100;padding-top:10%;" >
													<h1 style="color:#C6C6A9;align:center;"><p class="text-center">Oops Sorry!</p></h1>
													<h2 style="color:#C6C6A9;align:center;font-weight:50;font-weight:lighter;padding-left:5%"><p class="text-center">But we dont have yet a Ebook Collection for <?php echo $ebook_genre;?>!</p></h2>
												</div>
												<?php }else{?>
												<div style="width:100;padding-top:10%;" >
													<h1 style="color:#C6C6A9;align:center;"><p class="text-center">Oops Sorry!</p></h1>
													<h2 style="color:#C6C6A9;align:center;font-weight:50;font-weight:lighter;padding-left:5%"><p class="text-center">But we dont have yet a Ebook Collection!</p></h2>
												</div>
												<?php }} ?>

										</div>
										<br>
										<div class="col-md-3">
											<div class="panel-group">
											  <div class="panel panel-default">
											    <div class="panel-heading" style="background-color:#3083FF;color:white;">
											      <h4 class="panel-title">
											        <a data-toggle="collapse" href="#ebook_genre" style="text-decoration:none;">Search by Ebook Genre</a>
											      </h4>
											    </div>
											    <div id="ebook_genre" class="panel-collapse collapse in">
											      <ul class="list-group">
											      	 <li class="list-group-item"><a href="gallery.php?ebook=All&page=1">All Ebook</a></li>
										 			 <li class="list-group-item"><a href="gallery.php?ebook=Drama&page=1">Drama</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Business&page=1">Business</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Erotica&page=1">Erotica</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Fiction&page=1">Fiction</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Health&page=1">Health</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Humor&page=1">Humor</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Mystery&page=1">Mystery</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Religious&page=1">Religious</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Romance&page=1">Romance</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Self-Improvement&page=1">Self-Improvement</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Sci-Fi Fantasy&page=1">Sci-Fi Fantasy</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Short Story&page=1">Short Story</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Youth&page=1">Youth</a></li>
													 <li class="list-group-item"><a href="gallery.php?ebook=Seasons&page=1">Seasons</a></li>
											      </ul>
											      <div class="panel-footer" style="background-color:#3083FF;color:white;">Ebook</div></a>
											    </div>
											  </div>
											</div>
										</div>
									
									
								</div>

								<div class="row">
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
									<ul class="pagination pagination">
										<li>
											<a href="#">Prev</a>
										</li>
										<li>
											<a href="#">1</a>
										</li>
										
										<li>
											<a href="#">Next</a>
										</li>
									</ul>
								</div>
								<div class="col-md-4">
								</div>
								</div>
							</div>
						</div>

							
							
						</div>
					</div>
				</div>
			</div>		
		</div>
				<!-- End of Tab-pane-->
		</div>
	</div>
	<?php
		include('includes/footer.php');
	?>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="dist/js/lightbox.js"></script>


    <!--Light Box Effect-->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
		<script>
    $(document).ready(function(){
    	 
			    
				
			    $(".btn-info").click(function(){
		        $(".collapse").collapse('toggle');
		    	});
			});
    </script>
		<!--<script type="text/javascript">
		    $(function($){
		        var addToAll = true;
		        var gallery = true;
		        var titlePosition = 'inside';
		        $(addToAll ? 'img' : 'img.fancybox').each(function(){
		            var $this = $(this);
		            var title = $this.attr('title');
		            var src = $this.attr('data-big') || $this.attr('src');
		            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
		            $this.wrap(a);
		        });
		        if (gallery)
		            $('a.fancybox').attr('rel', 'fancyboxgallery');
		        $('a.fancybox').fancybox({
		            titlePosition: titlePosition
		        });
		    });
		    $.noConflict();
		</script>-->
		<!-- End of Light Box Effect-->
  </body>
  <body oncontextmenu="return false;">

</html>