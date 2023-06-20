<?php


include('ajax_init.php');
$errors = [];
$message = [];

//print_r($_POST);

if(isset($_POST['task']) && $_POST["task"] == "add_news") {
	$title = escape(clean($_POST["title"]));
	$url = clean_url($title);
	$keywords = nl2br(escape($_POST["keywords"]));
	$description = escape($_POST["description"]);
	$author = escape(clean($_POST["author"]));
	$category = escape(clean($_POST["category"]));
	$format = escape(clean($_POST["format"]));
	$update = $_POST['update'];
	
	$timestamp = time();
	
	$tags = escape(clean($_POST["tags"]));
	$featured_news = (int)$_POST['featured_news'];
	$breaking_news = (int)$_POST['breaking_news'];
	$trending_news = (int)$_POST['trending_news'];
	$top_stories = (int)$_POST['top_stories'];
	$carousel_small_news = (int)$_POST['carousel_small_news'];
	
	if($update == 'add') {
		
	//-----------------------image upload valitate------------------------------//
	if(!empty($_FILES['newspic'])) {
		$media_name = $_FILES['newspic']['name'];
		$media_size = $_FILES['newspic']['size'];
		$media_temp = $_FILES['newspic']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $url;
		$rand = time();
		$newimage_name = $newname.'_'.$rand.'.'.$media_ext;
		$fileinfo = getimagesize($_FILES['newspic']['tmp_name']);
		$filewidth = $fileinfo[0];
		$fileheight = $fileinfo[1];
		
		
	if($media_name !== '') {
		if ($media_size > 2097152 || $media_size < 1) 
			{
				$errors[] = 'Image size should not be more than 2mb';
			}
		if(in_array($media_ext, $allowed_ext) === false) {
			$errors[] = 'Image File type not allowed';
			}

	   }
		
//	if ($fileheight != '490' && $filewidth != '586') { 
//		$errors[] = 'Image size whould be 586 by 490px';
//	}
		
	} else {
		$errors[] = 'Image not uploaded';
	}

	
		
	} elseif(!empty($_FILES['newspic'])) {
		
		$media_name = $_FILES['newspic']['name'];
		$media_size = $_FILES['newspic']['size'];
		$media_temp = $_FILES['newspic']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $url;
		$rand = time();
		$newimage_name = $newname.'_'.$rand.'.'.$media_ext;
		$fileinfo = getimagesize($_FILES['newspic']['tmp_name']);
		$filewidth = $fileinfo[0];
		$fileheight = $fileinfo[1];
		
		
	if($media_name !== '') {
		if ($media_size > 2097152 || $media_size < 1) 
			{
				$errors[] = 'Image size should not be more than 2mb';
			}
		if(in_array($media_ext, $allowed_ext) === false) {
			$errors[] = 'Image File type not allowed';
			}

	   }
		
//	if ($fileheight != '490' && $filewidth != '586') { 
//		$errors[] = 'Image size whould be 586 by 490px';
//	}
		
	}
	
	
		
	
	//----------------------------- mediafile validate ----------------------------------//
	if(!empty($_FILES['media'])) {
			$mediaf_name = $_FILES['media']['name'];
			$mediaf_size = $_FILES['media']['size'];
			$mediaf_temp = $_FILES['media']['tmp_name'];

			$allowedf_audio_ext = ['mp4', 'ogg', 'mp3', 'webm'];
			$allowedf_video_ext = ['mp4', 'ogg', 'mp3', 'webm'];
			$explode = explode('.', $mediaf_name);
			$mediaf_ext = strtolower(end($explode));

			$newnamef = $url;
			$rand = time();
			$newmedia_name = $newnamef.'_'.$rand.'.'.$mediaf_ext;

	
		if ($format == 'nomedia' && !empty($_FILES['media'])) { 
			$errors[] = 'Please choose the correct media format for uploaded file';
		}
		if ($format != 'nomedia' && empty($_FILES['media'])) { 
			$errors[] = 'Media format('.$format.') chosen but no '.$format.' selected';
		}
		if($format == 'audio' && $mediaf_ext != 'mp3'){
				$errors[] = 'Media File type not allowed; only MP3 allowed for audios';
		} elseif($format == 'video' && $mediaf_ext != 'mp4'){
				$errors[] = 'Media File type not allowed; only MP4 allowed for videos';
		}
	} else {
		$newmedia_name = '';
	}
	
	
	
	//----------------------------- validate text fields ----------------------------------//
	if($title == "") {
		$errors[] = 'Title Field cannot be empty';
	}
	if($keywords == ""){
		$errors[] = 'Short Description cannot be empty';
	}
	if($description == ""){
		$errors[] = 'Full Description cannot be empty';
	}
	
	if(slots('carousel_small_news') > 3 && $carousel_small_news == 1 && $update == 'add') {
		$errors[] = 'Maximum mini carousel news of 4 reached';
	}
	if(slots('top_stories') > 9 && $top_stories == 1 && $update == 'add') {
		$errors[] = 'Maximum top stories of 10 reached';
	}
	if(url_exists($url, $con, 'news') && $update == 'add'){
		$errors[] = 'Post with same title already exist';
	}
	
	
	//----------------------------- add news if no errors ------------------------------//
		if(empty($errors)) {
			

			if($update == 'add') {

				$r = query("INSERT INTO news (title, description, keywords, image, media, url_title, category, author, tags, breaking_news, top_stories, carousel_small_news, featured_news, trending_news, timestamp, date) VALUES ('$title', '$description', '$keywords', '$newimage_name', '$newmedia_name', '$url', '$category','$author', '$tags', '$breaking_news', $top_stories, $carousel_small_news, '$featured_news', '$trending_news', '$timestamp', NOW())");

					if($r) { 
						$lastid = mysqli_insert_id($con);
						
					if($newmedia_name != ''){
						move_uploaded_file($mediaf_temp, '../../uploads/media/'.$newmedia_name);
					}
						
					move_uploaded_file($media_temp, '../../uploads/images/news/'.$newimage_name);
						
					$imagePath = "../../uploads/images/news/$newimage_name";	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 1200, 
													  $height             = 450, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/news/thumb/$newimage_name", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 80
										);
										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 390, 
													  $height             = 265, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/news/thumb/mini_$newimage_name", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 80
										);
										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 50, 
													  $height             = 50, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/news/thumb/small_$newimage_name", 
													  $delete_original    = true, 
													  $use_linux_commands = false,
													  $quality = 80
										);

						echo("success".$lastid);
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}
			} else {
				//update post info
				$update_id = (int)$update;
				$r = query("UPDATE news set title='$title', description='$description', keywords='$keywords', category='$category', author='$author', tags='$tags', breaking_news='$breaking_news', featured_news='$featured_news', trending_news ='$trending_news', top_stories='$top_stories', carousel_small_news='$carousel_small_news', url_title='$url', timestamp='$timestamp', date=NOW() WHERE id = '$update_id' ");
				
					if($r) { 
						
							if($newmedia_name != ''){
								
								$vid = query("SELECT media FROM news WHERE id = '$update_id'");
								$vid_results = mysqli_fetch_assoc($vid);
								
								$r = query("UPDATE news set media='$newmedia_name' WHERE id = '$update_id' ");
								
									if($r) {
										
										move_uploaded_file($mediaf_temp, '../../uploads/media/'.$newmedia_name);
										if($vid_results['media'] != ''){
											unlink('../../uploads/media/'.$vid_results['media']);
										}
										
									} else {
										$message[] = 'Media not updated'.mysqli_error($con);
									}
								
							}
						
						//update image if not empty on update
							if(!empty($_FILES['newspic'])) {
								
								$img = query("SELECT image FROM news WHERE id = '$update_id'");
								$img_results = mysqli_fetch_assoc($img);
								
								$r = query("UPDATE news set image='$newimage_name' WHERE id = '$update_id' ");
								
									if($r) {
										
								//unlink('../../uploads/images/news/'.$img_results['image']);
								unlink('../../uploads/images/news/thumb/'.$img_results['image']);
								unlink('../../uploads/images/news/thumb/mini_'.$img_results['image']);
								unlink('../../uploads/images/news/thumb/small_'.$img_results['image']);
										
								move_uploaded_file($media_temp, '../../uploads/images/news/'.$newimage_name);
										
						
								$imagePath = "../../uploads/images/news/$newimage_name";	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 1200, 
													  $height             = 450, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/news/thumb/$newimage_name", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 80
										);
										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 390, 
													  $height             = 265, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/news/thumb/mini_$newimage_name", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 80
										);
										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 50, 
													  $height             = 50, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/news/thumb/small_$newimage_name", 
													  $delete_original    = true, 
													  $use_linux_commands = false,
													  $quality = 80
										);
										
									} else {
										$message[] = 'Image not updated'.mysqli_error($con);
									}
							}

						echo("success".$update_id);
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}


			}
		
		} else {	
				foreach($errors as $error) {
					echo($error."<br>");
				}
			}
	
	
	
	if($message != "") {
		foreach($message as $mes) {
					echo($mes."<br>");
				}
	}
	
	
	    
	
}// else {
//	echo("ne");
//}

			
?>