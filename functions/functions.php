<?php


function setting($id){
	$q="SELECT content FROM settings WHERE name = '$id'";
	$results = query($q);
	$results = mysqli_fetch_assoc($results);
	return($results['content']);
}
$time = time();
$site_name = setting('Company name');

$new_interval = setting('new_time_interval');

$dev =  setting('dev_name');
$dev_web = setting('dev_website');
if($site_name == "") {
	
	$site_name = 'DoxaNet';
	
}

$year = setting('Year');
$company_name = '<a '.$dev_web.'>| '.$dev.'</a>';

global $rank_time_interval;
$rank_time_interval = 31104000;
//default declarations
$action="";
$toast="";
$sub_site_name = "";
// php helper functions##############################################
function clean_url($title) {
	$title = preg_replace('/[^A-Za-z0-9\-]/',' ', $title);
	$title = preg_replace('/\s+/',' ', $title);
	$title = trim($title);
	$cleantitle = str_replace(' ', '-', $title);
	return($cleantitle);
}

function end_text($string, $length){
	if(strlen($string) > $length) {
		echo(substr($string, 0, $length).'...');
	} else {
		echo($string);
	}
}

function newsemail_exists($email, $con) {
		$result = mysqli_query($con,"SELECT id FROM newsletter_emails WHERE email='$email'");
		if (mysqli_num_rows($result) > 0) {
			return true;
		} else {
			return false;
		}
	}

function url_exists($url_title, $con, $table) {
		$result = mysqli_query($con,"SELECT id FROM $table WHERE url_title='$url_title'");
		if (mysqli_num_rows($result) > 0) {
			return true;
		} else {
			return false;
		}
	}

function url_exists_subproducts($url_title, $con, $table, $main_category) {
	$result = mysqli_query($con,"SELECT id FROM $table WHERE url_title='$url_title' AND main_category = $main_category");
	if (mysqli_num_rows($result) > 0) {
		return true;
	} else {
		return false;
	}
}

function clean($string) {
	return htmlentities($string);
}

function redirect($location) {
	return header("Location: {$location}");
}

function set_message($message) {
	if(!empty($message)) {
		$_SESSION['message'] = $message;
	} else {
		$message = '';
	}
}

function display_message() {
	if(isset($_SESSION['message'])) {
		echo($_SESSION['message']);
		unset($_SESSION['message']);
	}
}

function token_generator() {
	$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
	return $token;
}

function validation_errors($error_message) {
	$error_message = <<<DELIMITER
	
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Warning!</strong> $error_message
			</div>
	
DELIMITER;
	return $error_message;
}

function admin_email_exists($email) {
	$sql = "SELECT id FROM admin WHERE email = '$email'";
	$results = query($sql);
	
	if (row_count($results) == 1) {
		return true;
	} else {
		return false;
	}
}

////////////////////////////////////////////////      PAGES   //////////////////////////
function get_page($page) {
	$sql = "SELECT * FROM pages where id = '$page'";
	$results = query($sql);
	$results = mysqli_fetch_assoc($results);
	return($results);

}


function getContactMessages(){
        $sql = "SELECT * FROM contact_messages ORDER BY id DESC";
        $result = query($sql);
        confirm($result);
        if ($result){
            return $result;
        }
}

function getcontactMsgReplyByEmail($email){
    $sql = "SELECT * FROM reply_contact_message WHERE email = '$email'";
    $result = query($sql);
    confirm($result);
    if ($result){
        return $result;
    }
}


///////////////////  resize image //////////////////////////////////

	// Function for resizing jpg, gif, or png image files
	function resize($target, $newcopy, $w, $h, $ext) {
		list($w_orig, $h_orig) = getimagesize($target);
		$scale_ratio = $w_orig / $h_orig;
		if (($w / $h) > $scale_ratio) {
			   $w = $h * $scale_ratio;
		} else {
			   $h = $w / $scale_ratio;
		}
		$img = "";
		$ext = strtolower($ext);
		if ($ext == "gif"){ 
		  $img = imagecreatefromgif($target);
		} else if($ext =="png"){ 
		  $img = imagecreatefrompng($target);
		} else { 
		  $img = imagecreatefromjpeg($target);
		}
		$tci = imagecreatetruecolor($w, $h);
		// imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
		imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		imagejpeg($tci, $newcopy, 80);
	}

	/**
 * easy image resize function
 * @param  $file - file name to resize
 * @param  $string - The image data, as a string
 * @param  $width - new image width
 * @param  $height - new image height
 * @param  $proportional - keep image proportional, default is no
 * @param  $output - name of the new file (include path if needed)
 * @param  $delete_original - if true the original image will be deleted
 * @param  $use_linux_commands - if set to true will use "rm" to delete the image, if false will use PHP unlink
 * @param  $quality - enter 1-100 (100 is best quality) default is 100
 * @return boolean|resource
 */
  function smart_resize_image($file,
                              $string             = null,
                              $width              = 0, 
                              $height             = 0, 
                              $proportional       = false, 
                              $output             = 'file', 
                              $delete_original    = true, 
                              $use_linux_commands = false,
  							  $quality = 100
  		 ) {
      
    if ( $height <= 0 && $width <= 0 ) return false;
    if ( $file === null && $string === null ) return false;
 
    # Setting defaults and meta
    $info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;
	$cropHeight = $cropWidth = 0;
 
    # Calculating proportionality
    if ($proportional) {
      if      ($width  == 0)  $factor = $height/$height_old;
      elseif  ($height == 0)  $factor = $width/$width_old;
      else                    $factor = min( $width / $width_old, $height / $height_old );
 
      $final_width  = round( $width_old * $factor );
      $final_height = round( $height_old * $factor );
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
	  $widthX = $width_old / $width;
	  $heightX = $height_old / $height;
	  
	  $x = min($widthX, $heightX);
	  $cropWidth = ($width_old - $width * $x) / 2;
	  $cropHeight = ($height_old - $height * $x) / 2;
    }
 
    # Loading image to memory according to type
    switch ( $info[2] ) {
      case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
      case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
      case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
      default: return false;
    }
    
    
    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $transparency = imagecolortransparent($image);
      $palletsize = imagecolorstotal($image);
 
      if ($transparency >= 0 && $transparency < $palletsize) {
        $transparent_color  = imagecolorsforindex($image, $transparency);
        $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
      }
      elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
	
	
    # Taking care of original, if needed
    if ( $delete_original ) {
      if ( $use_linux_commands ) exec('rm '.$file);
      else @unlink($file);
    }
 
    # Preparing a method of providing result
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    
    # Writing image according to type to the output destination and image quality
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
      case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
      case IMAGETYPE_PNG:
        $quality = 9 - (int)((0.9*$quality)/10.0);
        imagepng($image_resized, $output, $quality);
        break;
      default: return false;
    }
 
    return true;
  }


///////////////////////////////////// carousel ///////////////////////////


	function images($imageid) {
		$q = "SELECT * FROM images WHERE ID = '$imageid'";
		$r = query($q);

		$set= mysqli_fetch_assoc($r);

		return $set;
	}
$owl = 'owl';
$carousel = 'carouselmain';
$carouselimg = images($carousel);
$carousels = 'carouselsmall';
$carouselsmall = images($carousels);


///////////////////////////////////// post ///////////////////////////

function get_news(){
	$q= "SELECT * FROM news ORDER BY id DESC";
	$results = query($q);
	return($results);
}

function get_events(){
	$q= "SELECT * FROM events ORDER BY id DESC";
	$results = query($q);
	return($results);
}

function select_from_id($table, $id) {
	$q= "SELECT * FROM $table WHERE id='$id'";
	$results = query($q);
	return($results);
}

function select_from_url($table, $url) {
	$q= "SELECT * FROM $table WHERE url_title='$url'";
	$results = query($q);
	return($results);
}


///////////////////////////////// Site Details /////////////////////////////
function single_image($image){
	$q="SELECT image FROM single_images WHERE id = '$image'";
	$results = query($q);
	$results = mysqli_fetch_assoc($results);
	return($results['image']);
}
function image_url($id){
	$q="SELECT url FROM single_images WHERE id = '$id'";
	$results = query($q);
	$results = mysqli_fetch_assoc($results);
	return($results['url']);
}

/////////////////////////////////  author  /////////////////////////////
function author($id){
	$r = query("SELECT * FROM admin WHERE id = $id");
	$results = mysqli_fetch_assoc($r);
	
	return($results['last_name'].' '.$results['first_name']);
}

function author_news($id, $extra){
	$r = query("SELECT * FROM news WHERE author = $id $extra");
	return($r);
}

function admin_attr($id, $attr){
	$r = query("SELECT * FROM admin WHERE id = $id ");
	$results = mysqli_fetch_assoc($r);
	return($results[$attr]);
}

///////////////////////////////////// categories ///////////////////////////

function get_categories(){
	$q= "SELECT * FROM categories ORDER BY title ASC";
	$results = query($q);
	return($results);
}

function categories_news_count($cat){
	$q= "SELECT * FROM news WHERE category = '$cat'";
	$results = query($q);
	return(mysqli_num_rows($results));
}

function categories_news($cat){
	$q= "SELECT * FROM news WHERE category = '$cat'";
	$results = query($q);
	return($results);
}

function cat_title($url){
	$q="SELECT title FROM categories WHERE url_title = '$url'";
	$results = query($q);
	$results = mysqli_fetch_assoc($results);
	return($results['title']);
}
///////////////////////////////////// Advertisements ///////////////////////////

function get_ads(){
	$q= "SELECT * FROM advertisements ORDER BY id DESC";
	$results = query($q);
	return($results);
}

///////////////////////////////////// Comments ///////////////////////////

function get_comments(){
	$q= "SELECT * FROM comments ORDER BY id DESC";
	$results = query($q);
	return($results);
}

function comment_count($id){
	$q= "SELECT * FROM comments WHERE news_id = '$id' AND approved = 1";
	$results = query($q);
	return(mysqli_num_rows($results));
}

///////////////////////////////////// convert tags to array ///////////////////////////

function tags_to_array($tags){
	$explode = explode(',', $tags);
	return ($explode);
	
}

///////////////////////////////////// extension ///////////////////////////

function ext($string){
	$explode = explode('.', $string);
	return $media_ext = strtolower(end($explode));
}

function bef_ext($string){
	$explode = explode('.', $string);
	return $media_ext = strtolower(($explode[0]));
}

///////////////////////////////////// slot count ///////////////////////////

function slots($col){
	$q="SELECT * FROM news where $col = 1";
	$results = query($q);
	return(mysqli_num_rows($results));
}

///////////////////////////////// Random background /////////////////////////////
function color(){
$color = ["bg-b-purple","cyan-bgcolor","light-dark-bgcolor","bg-b-orange","bg-b-green","bg-b-danger","bg-b-black","bg-b-yellow","bg-b-pink"];

$color_num = rand(0,count($color) - 1);
	echo($color[$color_num]);
}

function page_content($id){
	$q="SELECT content FROM pages WHERE id = '$id'";
	$results = query($q);
	$results = mysqli_fetch_assoc($results);
	return($results['content']);
}
///////////////////////////////// Social /////////////////////////////
function social($col, $name){
	$q="SELECT $col FROM social WHERE name = '$name'";
	$results = query($q);
	$results = mysqli_fetch_assoc($results);
	return($results[$col]);
}

function get_social($name){
	$q="SELECT * FROM social WHERE name = '$name'";
	$results = query($q);
	$results = mysqli_fetch_assoc($results);
	if($results['status']==1 && $results['link'] != ''){
		return(true);
	} else {
		return(false);
	}
}

///////////////////////////////// get_ads_for display /////////////////////////////

function get_ad($position){
	
$adsq = "SELECT * FROM advertisements WHERE UNIX_TIMESTAMP() < expiretimestamp AND shown = 0 AND position = '$position' ORDER BY id ASC LIMIT 1" ;
$adsr = query($adsq);

	if(mysqli_num_rows($adsr) > 0) {
while($ad = mysqli_fetch_assoc($adsr)) { ?>

	<a <?php if($ad['url'] != '') { echo('target="_blank"'); } ?> <?php if($ad['url'] != '') { echo('href="go.php?advert='.$ad['id'].'"'); } ?>><img src="uploads/images/ads/<?php echo($ad['image']);?>" alt="<?php echo($ad['title']);?>" class="center-block"></a>
	
<?php 
		query("UPDATE advertisements SET shown = 1, impression = impression +1 WHERE id = $ad[id]");							   
									   
   		$shown = query("SELECT * FROM advertisements WHERE shown = 0 AND position = '$position'");
		if (mysqli_num_rows($shown) == 0) {
			$r = query("UPDATE advertisements SET shown = 0 WHERE position = '$position'");
		}
	   }
	} 
//	else {
//		echo('No ads');
//	}
}

function get_countries(){
	$q= "SELECT * FROM apps_countries";
	$results = query($q);
	return($results);
}

///////////////////////////////// farm /////////////////////////////

function get_courses(){
	$q="SELECT * FROM courses";
	$results = query($q);
	return($results);
}

function get_schools(){
	$q="SELECT * FROM schools ORDER BY title ASC";
	$results = query($q);
	return($results);
}

function get_services(){
	$q= "SELECT * FROM services ORDER BY title ASC";
	$results = query($q);
	return($results);
}

function get_teams(){
	$q= "SELECT * FROM team ORDER BY title ASC";
	$results = query($q);
	return($results);
}

function get_title_from_id($id, $table){
	$q = query("SELECT title FROM $table WHERE id='$id'");
	$r = mysqli_fetch_assoc($q);
	return($r['title']);
}

function get_url_title_from_id_all($id, $table){
	$q = query("SELECT url_title FROM $table WHERE id='$id'");
	$r = mysqli_fetch_assoc($q);
	return($r['url_title']);
}



///////////////////////////////// shop /////////////////////////////
function get_shop_categories(){
	$q= "SELECT * FROM products_categories ORDER BY title ASC";
	$results = query($q);
	return($results);
}

function get_image_from_id($id){
	$q = query("SELECT image FROM tbl_products WHERE id='$id'");
	$r = mysqli_fetch_assoc($q);
	return($r['image']);
}

function get_url_title_from_id($id){
	$q = query("SELECT url_title FROM tbl_products WHERE id='$id'");
	$r = mysqli_fetch_assoc($q);
	return($r['url_title']);
}

function get_shop_brands(){
	$q= "SELECT * FROM products_brands ORDER BY title ASC";
	$results = query($q);
	return($results);
}

function get_shop_subcategories(){
	$q= "SELECT * FROM products_subcategories ORDER BY main_category, title ASC";
	$results = query($q);
	return($results);
}

function get_category_subcategories($id){
	$q= "SELECT * FROM products_subcategories WHERE main_category = $id ORDER BY title ASC";
	$results = query($q);
	return($results);
}

function get_products($order = "ORDER BY title ASC"){
	$q= "SELECT * FROM tbl_products $order";
	$results = query($q);
	return($results);
}

function get_orders(){
	$q= "SELECT * FROM orders ORDER BY id DESC";
	$results = query($q);
	return($results);
}

function get_not_delivered_orders(){
	$q= "SELECT * FROM orders WHERE order_status = '0' ORDER BY id DESC";
	$results = query($q);
	return($results);
}

function get_not_paid_orders(){
	$q= "SELECT * FROM orders WHERE  payment_status = '0' ORDER BY id DESC";
	$results = query($q);
	return($results);
}

function get_order_items($order_id){
	$q= "SELECT * FROM order_items WHERE order_id = '$order_id'";
	$results = query($q);
	return($results);
}

function get_product_image($product_id){
	$q= "SELECT image FROM tbl_products WHERE id = '$product_id'";
	$results = mysqli_fetch_assoc(query($q));
	return($results['image']);
}

function categories_products_count($cat){
	$q= "SELECT * FROM tbl_products WHERE category = '$cat'";
	$results = query($q);
	return(mysqli_num_rows($results));
}

function get_customers(){
	$q= "SELECT * FROM customers ORDER BY id DESC";
	$results = query($q);
	return($results);
}

function total_orders_count($customer){
	$q= "SELECT * FROM orders WHERE customer_id = '$customer'";
	$results = query($q);
	return(mysqli_num_rows($results));
}

function product_cat_title($id){
	$q="SELECT title FROM products_subcategories WHERE id = '$id'";
	$results = query($q);
	$results = mysqli_fetch_assoc($results);
	return($results['title']);
}

function get_slot($col, $limit){
	$q= "SELECT * FROM tbl_products WHERE $col=1 AND in_stock = 1 ORDER BY id DESC LIMIT $limit";
	$results = query($q);
	return($results);
}

function product_settings($product_id, $setting){
	$q= query("SELECT $setting FROM tbl_products WHERE id = '$product_id'");
	$results = mysqli_fetch_assoc($q);
	if($results[$setting] == 1) {
		return(true);
	} else {
		return(false);
	}
}

////////////////////////////////////  WISHLIST FUNCTIONS ////////////////////////

function select_list($customer_id, $product_id) {
	
	$sql = "SELECT * FROM wishlist WHERE customer_id = $customer_id AND product_id = $product_id";
	$result = query($sql);
	confirm($result);
	
	if(mysqli_num_rows($result) > 0) {
		return(true);
	} else {
		return(false);
	}
	
}

function wishlist_product($product_id) {
	
	$sql = "SELECT * FROM tbl_products WHERE id = $product_id";
	$result = query($sql);
	confirm($result);
	return($result);
	
}

function wishlist($customer_id) {
	
	$sql = "SELECT * FROM wishlist WHERE customer_id = '$customer_id' ORDER BY id DESC ";
	$result = query($sql);
	confirm($result);
	return($result);
	
}

function wishlist_count($customer_id) {
	
	$sql = "SELECT * FROM wishlist WHERE customer_id = $customer_id";
	$result = query($sql);
	confirm($result);
	return(mysqli_num_rows($result));
	
}

function get_rating($id) {
	$query_avg = "SELECT ROUND(AVG(rating),1) as averageRating FROM rating WHERE product_id=$id";
	$result4 =  query($query_avg);
	confirm($result4);
	
	$fetchAverage = mysqli_fetch_array($result4);
	$averageRating = $fetchAverage['averageRating'];

		return(round($averageRating));
}


///////////////////////////////// stats /////////////////////////////
function get_highest($col, $limit){
	global $rank_time_interval;
	
	$q= "SELECT * FROM news WHERE UNIX_TIMESTAMP() - timestamp < $rank_time_interval ORDER BY $col DESC LIMIT $limit";
	$results = query($q);
	return($results);
}

function top_reviews($limit) {
	global $rank_time_interval;
	 
	$q = "SELECT news_id, COUNT(news_id) AS count FROM comments WHERE UNIX_TIMESTAMP() - timestamp < $rank_time_interval GROUP BY news_id ORDER BY count(news_id) DESC";
	$results = query($q);
	return($results);
}

function getPercentageChange($oldNumber, $newNumber){
    $decreaseValue = $oldNumber - $newNumber;

    return ($decreaseValue / $oldNumber) * 100;
}

function product_name_stock($title, $stock) {
	if($stock != 1) {
		return $title." <sup style='color: black; margin-top: 4px'> (out of stock)</sup>";
	} else {
		return $title;
	}
}



?>