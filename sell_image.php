<?php
if(isset($POST['upload_image']))
{
   include 'dbconn.php';
 $promo = $_POST['Promo'];
 $image = $FILE['News_Image']; //News_Image
 $news = $_POST['News']; //News
 
 
$sql1 = "SELECT * FROM announcement WHERE photo_owner=? AND News_Image=?";
$stm1 = $con->prepare($sql1);
$stm1->execute(array($user['mem_id'],$image['name']));
$img_count = $stm1->fetchAll();

		if(count($img_count) == 0){
		
		if(($image['type'] == 'image/jpg') || ($image['type'] == 'image/jpeg') || ($image['type'] == 'image/gif') 
			||($image['type'] == 'image/png') || ($image['type'] == 'image/bmp') || ($image['type'] == 'image/tiff') 
			|| ($image['type'] == 'image/jp2') || ($image['type'] == 'image/iff') || ($image['type'] == 'image/xbm') &&($image['size'] < 2048000)){


$sql = "INSERT INTO announcement(Promo,News_Image,News,photo_owner)values(?,?,?,?)";
$stm = $con->prepare($sql);
if($stm->execute(array($promo,$image['name'], $news,$_SESSION['mem_id'])))

{move_uploaded_file($image['tmp_name'], 'user_files/'.$fullname.'/image/'.$image['name']);
 $_SESSION['alertmsg_img'] = "Image Successfully Posted to Image Store!";
 $img_exp = explode(".",$image['name']);
				$source = 'user_files/'.$fullname.'/image/'.$image['name'];
	$watermark = imagecreatefrompng('watermark/logo.png');
				//imagealphablending($image,true);

				$black = imagecolorallocate($watermark, 0, 0, 0);

				// Make the background transparent
				imagecolortransparent($watermark, $black);

				$image_size = getimagesize($source);
				$watermark_width = imagesx($watermark);
				$watermark_height = imagesy($watermark);
				switch($image_size[2]){
				case IMAGETYPE_JPEG:
				$image = imagecreatefromjpeg($source);
				$name = $img_exp[0].".jpg";
				break;
				case IMG_GIF:
				$image = imagecreatefromgif($source);
				$name = $img_exp[0].".gif";
				break;
				case IMAGETYPE_PNG:
				$image = imagecreatefrompng($source);
				$name = $img_exp[0].".png";
				break;
				case IMAGETYPE_WBMP:
				$image = imagecreatefromwbmp($source);
				$name = $img_exp[0].".png";
				break;
				
				case IMAGETYPE_XMP:
				$image = imagecreatefromjpeg($source);
				$name = $img_exp[0].".xmp";
				break;
				default: return ''; break;
				}
				$x = $image_size[0] - $watermark_width -60;
				$y = $image_size[1] - $watermark_height -60;

				imagealphablending($image,true);
				// Set the margins ima the stamp and get the height/width of the stamp image
				$black = imagecolorallocate($image, 0, 0, 0);

				// Make the background transparent
				imagecolortransparent($image, $black);


				$newWatermarkWidth = $image_size[0]-20;
				$newWatermarkHeight = $watermark_height * $newWatermarkWidth / $watermark_width;
				// Copy the stamp image onto our photo using the margin offsets and the photo 
				// width to calculate positioning of the stamp. 
				imagecopyresized($image, $watermark, $image_size[0]/2 - $newWatermarkWidth/2, $image_size[1]/2 - $newWatermarkHeight/2, 0, 0, $newWatermarkWidth, $newWatermarkHeight, imagesx($watermark), imagesy($watermark));
				
				// Output and free memory
				switch($image_size[2]){
				case IMAGETYPE_JPEG:
				

				imagejpeg($image,'user_files/'.$fullname.'/image/watermark/watermark_'.$name);
				break;
				case IMG_GIF:
				imagegif($image,'user_files/'.$fullname.'/image/watermark/watermark_'.$name);
				break;
				case IMAGETYPE_PNG:


				imagepng($image,'user_files/'.$fullname.'/image/watermark/watermark_'.$name);
				break;
				case IMAGETYPE_WBMP:
				imagewbmp($image,'user_files/'.$fullname.'/image/watermark/watermark_'.$name);
				break;
				
				case IMAGETYPE_XMP:
				imagewbmp($image,'user_files/'.$fullname.'/image/watermark/watermark_'.$name);
				break;
				default: return ''; break;
				}
				
				
			}
			
		
		}else{
				$invalid_img=true;
				$_SESSION['alertmsg_img'] = "Invalid Image File Format!";

			}

		}else{

			$invalid_img=true;
				$_SESSION['alertmsg_img'] = "Image Already exist!";
		}

	}

?> 



