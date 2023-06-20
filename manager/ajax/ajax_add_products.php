<?php


include('ajax_init.php');
$errors = [];
$message = [];

//print_r($_POST);

if(isset($_POST['task']) && $_POST["task"] == "add_products") {
	$title = escape(clean($_POST["title"]));
	$url = clean_url($title);
	$description = escape($_POST["description"]);
	$color = escape($_POST["color"]);
	$brand = (int)$_POST["brand"];
	$category = (int)$_POST["category"];
	$maincategory = (int)$_POST["maincategory"];
	$keywords = escape($_POST['keywords']);
	$price = escape($_POST['price']);
	$old_price = escape($_POST['old_price']);
	$update = escape($_POST['update']);
	
	$featured = (int)$_POST["featured"];
	$new_arrival = (int)$_POST["new_arrival"];
	$most_wanted = (int)$_POST["most_wanted"];
	$best_seller = (int)$_POST["best_seller"];
	$slot_1 = (int)$_POST["slot_1"];
	$slot_2 = (int)$_POST["slot_2"];
	$slot_3 = (int)$_POST["slot_3"];
	$slot_4 = (int)$_POST["slot_4"];

	$timestamp = time();
	
	if($update == 'add') {
		
	//-----------------------image upload valitate------------------------------//
	if(!empty($_FILES['productspic1'])) {
		$media_name = $_FILES['productspic1']['name'];
		$media_size = $_FILES['productspic1']['size'];
		$media_temp1 = $_FILES['productspic1']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $url;
		$rand = time();
		$newimage_name1 = $newname.'_'.$rand.'1.'.$media_ext;
		$fileinfo = getimagesize($_FILES['productspic1']['tmp_name']);
		$filewidth = $fileinfo[0];
		$fileheight = $fileinfo[1];
		
		
	if($media_name !== '') {
		if ($media_size > 2097152 || $media_size < 1) 
			{
				$errors[] = 'Image 1 size should not be more than 2mb';
			}
		if(in_array($media_ext, $allowed_ext) === false) {
			$errors[] = 'Image 1 File type not allowed';
			}

	   }
		
//	if ($fileheight != '490' && $filewidth != '586') { 
//		$errors[] = 'Image size whould be 586 by 490px';
//	}
		
	} else {
		$errors[] = 'Image not uploaded';
	}

	
		
	} elseif(!empty($_FILES['productspic1'])) {
		
		$media_name = $_FILES['productspic1']['name'];
		$media_size = $_FILES['productspic1']['size'];
		$media_temp1 = $_FILES['productspic1']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $url;
		$rand = time();
		$newimage_name1 = $newname.'_'.$rand.'1.'.$media_ext;
		$fileinfo = getimagesize($_FILES['productspic1']['tmp_name']);
		$filewidth = $fileinfo[0];
		$fileheight = $fileinfo[1];
		
		
	if($media_name !== '') {
		if ($media_size > 2097152 || $media_size < 1) 
			{
				$errors[] = 'Image 1 size should not be more than 2mb';
			}
		if(in_array($media_ext, $allowed_ext) === false) {
			$errors[] = 'Image 1 File type not allowed';
			}

	   }
		
//	if ($fileheight != '490' && $filewidth != '586') { 
//		$errors[] = 'Image size whould be 586 by 490px';
//	}
		
	}
	
	
	if(!empty($_FILES['productspic2'])) {
		
		$media_name = $_FILES['productspic2']['name'];
		$media_size = $_FILES['productspic2']['size'];
		$media_temp2 = $_FILES['productspic2']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $url;
		$rand = time();
		$newimage_name2 = $newname.'_'.$rand.'2.'.$media_ext;
		$fileinfo = getimagesize($_FILES['productspic2']['tmp_name']);
		$filewidth = $fileinfo[0];
		$fileheight = $fileinfo[1];
		
		
	if($media_name !== '') {
		if ($media_size > 2097152 || $media_size < 1) 
			{
				$errors[] = 'Image 2 size should not be more than 2mb';
			}
		if(in_array($media_ext, $allowed_ext) === false) {
			$errors[] = 'Image 2 File type not allowed';
			}

	   }
		
//	if ($fileheight != '490' && $filewidth != '586') { 
//		$errors[] = 'Image size whould be 586 by 490px';
//	}
		
	} else {
		$newimage_name2 = '';
	}
	
	if(!empty($_FILES['productspic3'])) {
		
		$media_name = $_FILES['productspic3']['name'];
		$media_size = $_FILES['productspic3']['size'];
		$media_temp3 = $_FILES['productspic3']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $url;
		$rand = time();
		$newimage_name3 = $newname.'_'.$rand.'3.'.$media_ext;
		$fileinfo = getimagesize($_FILES['productspic3']['tmp_name']);
		$filewidth = $fileinfo[0];
		$fileheight = $fileinfo[1];
		
		
	if($media_name !== '') {
		if ($media_size > 2097152 || $media_size < 1) 
			{
				$errors[] = 'Image 3 size should not be more than 2mb';
			}
		if(in_array($media_ext, $allowed_ext) === false) {
			$errors[] = 'Image 3 File type not allowed';
			}

	   }
		
//	if ($fileheight != '490' && $filewidth != '586') { 
//		$errors[] = 'Image size whould be 586 by 490px';
//	}
		
	} else {
		$newimage_name3 = '';
	}
	
	if(!empty($_FILES['productspic4'])) {
		
		$media_name = $_FILES['productspic4']['name'];
		$media_size = $_FILES['productspic4']['size'];
		$media_temp4 = $_FILES['productspic4']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $url;
		$rand = time();
		$newimage_name4 = $newname.'_'.$rand.'4.'.$media_ext;
		$fileinfo = getimagesize($_FILES['productspic4']['tmp_name']);
		$filewidth = $fileinfo[0];
		$fileheight = $fileinfo[1];
		
		
	if($media_name !== '') {
		if ($media_size > 2097152 || $media_size < 1) 
			{
				$errors[] = 'Image 4 size should not be more than 2mb';
			}
		if(in_array($media_ext, $allowed_ext) === false) {
			$errors[] = 'Image 4 File type not allowed';
			}

	   }
		
//	if ($fileheight != '490' && $filewidth != '586') { 
//		$errors[] = 'Image size whould be 586 by 490px';
//	}
		
	} else {
		$newimage_name4 = '';
	}
		
	
	
	//----------------------------- validate text fields ----------------------------------//
	if($title == "") {
		$errors[] = 'Title Field cannot be empty';
	}
	if($price == 0 || $price == '') {
		$errors[] = 'Price cannot be null';
	}
	if($description == ""){
		$errors[] = 'Full Description cannot be empty';
	}
	if(url_exists($url, $con, 'tbl_products') && $update == 'add'){
		$errors[] = 'Product with same name already exist';
	}
	
	
	//----------------------------- add products if no errors ------------------------------//
		if(empty($errors)) {
			

			if($update == 'add') {

				$r = query("INSERT INTO tbl_products (title, description, keywords, image, image2, image3, image4, url_title, category, maincategory, price, old_price, best_seller, new_arrival, most_wanted, featured, slot_1, slot_2, slot_3, slot_4, color, brand) VALUES ('$title', '$description', '$keywords', '$newimage_name1', '$newimage_name2', '$newimage_name3', '$newimage_name4', '$url', '$category', '$maincategory', '$price', '$old_price', $best_seller, $new_arrival, $most_wanted, $featured, $slot_1, $slot_2, $slot_3, $slot_4, '$color', $brand)");

					if($r) { 
						$lastid = mysqli_insert_id($con);
						
					move_uploaded_file($media_temp1, '../../uploads/images/shop/'.$newimage_name1);
						
					$imagePath = "../../uploads/images/shop/$newimage_name1";	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 550, 
													  $height             = 550, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/$newimage_name1", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 180,
													  $height             = 200, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/home_$newimage_name1", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 270,
													  $height             = 270, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/product_$newimage_name1", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 86, 
													  $height             = 85, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/mini_$newimage_name1", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

						
						
						
					if($newimage_name2 != ''){
					move_uploaded_file($media_temp2, '../../uploads/images/shop/'.$newimage_name2);
						
					$imagePath = "../../uploads/images/shop/$newimage_name2";	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 550, 
													  $height             = 550, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/$newimage_name2", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 180,
													  $width              = 190, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/home_$newimage_name2", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 270,
													  $height             = 270, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/product_$newimage_name2", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 86, 
													  $height             = 85, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/mini_$newimage_name2", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

					}
						
					if($newimage_name3 != ''){
					move_uploaded_file($media_temp3, '../../uploads/images/shop/'.$newimage_name3);
						
					$imagePath = "../../uploads/images/shop/$newimage_name3";	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 550, 
													  $height             = 550, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/$newimage_name3", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 180,
													  $width              = 190, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/home_$newimage_name3", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 270,
													  $height             = 270, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/product_$newimage_name3", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 86, 
													  $height             = 85, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/mini_$newimage_name3", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

					}
						
					if($newimage_name4 != ''){
					move_uploaded_file($media_temp4, '../../uploads/images/shop/'.$newimage_name4);
						
					$imagePath = "../../uploads/images/shop/$newimage_name4";	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 550, 
													  $height             = 550, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/$newimage_name4", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 180,
													  $width              = 190, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/home_$newimage_name4", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 270,
													  $height             = 270, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/product_$newimage_name4", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 86, 
													  $height             = 85, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/mini_$newimage_name4", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

					}
						
						
						
						echo("success".$lastid);
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}
			} else {
				//update post info
				$update_id = (int)$update;
				$r = query("UPDATE tbl_products set title='$title', description='$description', keywords='$keywords', category='$category', maincategory='$maincategory', url_title='$url', price='$price', old_price='$old_price', best_seller= $best_seller, new_arrival= $new_arrival, most_wanted = $most_wanted, featured = $featured, slot_1 = $slot_1, slot_2 = $slot_2, slot_3 = $slot_3, slot_4 = $slot_4, color = '$color', brand = '$brand' WHERE id = '$update_id' ");
				
					if($r) { 
						
						//update image if not empty on update
							if(!empty($_FILES['productspic1'])) {
								
								$img = query("SELECT image FROM tbl_products WHERE id = '$update_id'");
								$img_results = mysqli_fetch_assoc($img);
								
								$r = query("UPDATE tbl_products set image='$newimage_name1' WHERE id = '$update_id' ");
								
									if($r) {
										
								if ($img_results['image']) {
									unlink('../../uploads/images/shop/'.$img_results['image']);
									unlink('../../uploads/images/shop/thumb/'.$img_results['image']);
									unlink('../../uploads/images/shop/thumb/mini_'.$img_results['image']);
									unlink('../../uploads/images/shop/thumb/home_'.$img_results['image']);
									unlink('../../uploads/images/shop/thumb/product_'.$img_results['image']);
								}
										
								move_uploaded_file($media_temp1, '../../uploads/images/shop/'.$newimage_name1);
										
						
								$imagePath = "../../uploads/images/shop/$newimage_name1";	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 550, 
													  $height             = 550, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/$newimage_name1", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 180,
													  $width              = 190, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/home_$newimage_name1", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 270,
													  $height             = 270, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/product_$newimage_name1", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 86, 
													  $height             = 85, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/mini_$newimage_name1", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
										
									} else {
										$message[] = 'Image 1 not updated'.mysqli_error($con);
									}
							}
						
						
						
							if(!empty($_FILES['productspic2'])) {
								
								$img = query("SELECT image2 FROM tbl_products WHERE id = '$update_id'");
								$img_results = mysqli_fetch_assoc($img);
								
								$r = query("UPDATE tbl_products set image2='$newimage_name2' WHERE id = '$update_id' ");
								
									if($r) {
								
								if($img_results['image2'] != '') {
								unlink('../../uploads/images/shop/'.$img_results['image2']);
								unlink('../../uploads/images/shop/thumb/'.$img_results['image2']);
								unlink('../../uploads/images/shop/thumb/mini_'.$img_results['image2']);
								unlink('../../uploads/images/shop/thumb/home_'.$img_results['image2']);
								unlink('../../uploads/images/shop/thumb/product_'.$img_results['image2']);
									}
										
								move_uploaded_file($media_temp2, '../../uploads/images/shop/'.$newimage_name2);
										
						
								$imagePath = "../../uploads/images/shop/$newimage_name2";	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 550, 
													  $height             = 550, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/$newimage_name2", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 180,
													  $width              = 190, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/home_$newimage_name2", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 270,
													  $height             = 270, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/product_$newimage_name2", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 86, 
													  $height             = 85, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/mini_$newimage_name2", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
										
									} else {
										$message[] = 'Image 2 not updated'.mysqli_error($con);
									}
							}
						
							if(!empty($_FILES['productspic3'])) {
								
								$img = query("SELECT image3 FROM tbl_products WHERE id = '$update_id'");
								$img_results = mysqli_fetch_assoc($img);
								
								$r = query("UPDATE tbl_products set image3='$newimage_name3' WHERE id = '$update_id' ");
								
									if($r) {
										
								if($img_results['image3'] != '') {
								unlink('../../uploads/images/shop/'.$img_results['image3']);
								unlink('../../uploads/images/shop/thumb/'.$img_results['image3']);
								unlink('../../uploads/images/shop/thumb/mini_'.$img_results['image3']);
								unlink('../../uploads/images/shop/thumb/home_'.$img_results['image3']);
								unlink('../../uploads/images/shop/thumb/product_'.$img_results['image3']);
								}
										
								move_uploaded_file($media_temp3, '../../uploads/images/shop/'.$newimage_name3);
										
						
								$imagePath = "../../uploads/images/shop/$newimage_name3";	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 550, 
													  $height             = 550, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/$newimage_name3", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 180,
													  $width              = 190, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/home_$newimage_name3", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 270,
													  $height             = 270, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/product_$newimage_name3", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 86, 
													  $height             = 85, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/mini_$newimage_name3", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
										
									} else {
										$message[] = 'Image 3 not updated'.mysqli_error($con);
									}
							}
						
							if(!empty($_FILES['productspic4'])) {
								
								$img = query("SELECT image4 FROM tbl_products WHERE id = '$update_id'");
								$img_results = mysqli_fetch_assoc($img);
								
								$r = query("UPDATE tbl_products set image4='$newimage_name4' WHERE id = '$update_id' ");
								
									if($r) {
										
								if($img_results['image4'] != '') {
								unlink('../../uploads/images/shop/'.$img_results['image4']);
								unlink('../../uploads/images/shop/thumb/'.$img_results['image4']);
								unlink('../../uploads/images/shop/thumb/mini_'.$img_results['image4']);
								unlink('../../uploads/images/shop/thumb/home_'.$img_results['image4']);
								unlink('../../uploads/images/shop/thumb/product_'.$img_results['image4']);
								}
										
								move_uploaded_file($media_temp4, '../../uploads/images/shop/'.$newimage_name4);
										
						
								$imagePath = "../../uploads/images/shop/$newimage_name4";	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 550, 
													  $height             = 550, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/$newimage_name4", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 180,
													  $width              = 190, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/home_$newimage_name4", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 270,
													  $height             = 270, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/product_$newimage_name4", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 86, 
													  $height             = 85, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/shop/thumb/mini_$newimage_name4", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
										
									} else {
										$message[] = 'Image 4 not updated'.mysqli_error($con);
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