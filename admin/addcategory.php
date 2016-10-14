 <?php
  include("../function.php");

$edit= 0;
 

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chillaxr | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
     
    </style>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  
  
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Establishments</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active"><a href="#">Establishments</a></li>
            
          </ol>
        </section>
        

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <?php if(isset($message)){?>
                <div class="alert alert-success">
                  <h4><?php echo $message;?></h4>
               </div> 

            <?php } ?>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Add Type of Establishment</h3>
                </div><!-- /.box-header -->
                      

 <br>
				
				 <form class="form-horizontal" role="form"   method="POST" enctype="multipart/form-data">   

              <div class="form-group">
               
              <label  class="col-sm-2 control-label">
               Enter Type of Category
             </label>
              <div class="col-sm-5">
                <input class="form-control" id="categoryid" type="text" name="categoryid" required >
                </div>  
             
            </div>

			
           
				<div class="btn-group">
					<button type="submit" name="submit"class="btn btn-primary" data-toggle="modal" data-target="#e<?php echo $edit;?>">
                  Submit 
                </button>
				
<div id="e<?php echo $edit;?>" class="modal fade"   role="dialog" aria-labelledby="confirmUpdateLabel" aria-hidden="true">
				 <div class="modal-dialog">
													
														    <div class="modal-content">
													
														      <div class="modal-header">
														
														       
														
														
														        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														        <h4 class="modal-title">Success </h4>
														           
														      </div>
														
														      <div class="modal-body">
															   You've successfully added another type of establishment. :)
					  </div>									</div>
				   </div>
				 </div>
				</div>
			</form>	
      <div class="box-body">
          <table id="example1" class="table ">
              <thead class="bg-aqua color-info"">
              <tr >

                  <th>ID</th>
                  <th>Category</th>

                  <th>Status</th>

              </tr>
              </thead>
              <tbody>

                    <?php 
                     include ("../dbconn.php");

                     if(isset($_POST['submit'])){
                        $categoryid= $_POST['categoryid'];
                        
                        
                        
                         $sql = "INSERT INTO category(categoryid)values(?)";
                          $stm = $con->prepare($sql);
                          
                          $stm->execute(array($categoryid));
                     }
                     
                    if (isset($_POST['delete'])) {
                         $del = $_POST['delete'];
                        $sql = "DELETE FROM category WHERE id=?";
                            $stm = $con->prepare($sql);
                            
                            $stm->execute(array($del));
                       }
                        $cat = get_all_category();
                        foreach ($cat as $cate) {
                          
                    ?>
                  <tr>
                      <td><?php echo $cate['id'];?></td>
                      <td><?php echo $cate['categoryid'];?></td>
                      <td>

                          <form role="form" method="post">
                              <!-- <a class="btn btn-primary" href="room.php?id="><span class="glyphicon glyphicon-edit"></span></a> -->

                              <button class="btn btn-danger" type="submit" name="delete" value="<?php echo $cate['id'];?>"><span class="glyphicon glyphicon-trash"></span></button>
                          </form>

                      </td>
                  </tr>
                  <?php } ?>

              </tbody>
             <!-- <tfoot>
              <tr >
                  <th>ID</th>
                  <th>Category</th>

                  <th>Status</th>

              </tr>
              </tfoot>-->
          </table>
      </div>	
		  </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->										
														
  </body>
 </html> 
 
 <?php
 
/* include ("../dbconn.php");*/

 $category = "";
$del = ''; 
 /*if(isset($_POST['submit'])){
		$categoryid= $_POST['categoryid'];
		
		
		
		 $sql = "INSERT INTO category(categoryid)values(?)";
			$stm = $con->prepare($sql);
			
			$stm->execute(array($categoryid));
 }*/

 /*if (isset($_POST['delete'])) {
   $del = $_POST['delete'];
  $sql = "DELETE FROM category WHERE id=?";
      $stm = $con->prepare($sql);
      
      $stm->execute(array($del));
 }*/
 
 
 ?>