<?php
///////..................................clean url functions....................

 error_reporting(0);


	function get_path() {
	  $path = array();
	  if (isset($_SERVER['REQUEST_URI'])) {
		$request_path = explode('?', $_SERVER['REQUEST_URI']);

		$path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
		$path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
		$path['call'] = utf8_decode($path['call_utf8']);
		if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
		  $path['call'] = '';
		}
		$path['call_parts'] = explode('/', $path['call']);

		$path['query_utf8'] = urldecode($request_path[1]);
		$path['query'] = utf8_decode(urldecode($request_path[1]));
		$vars = explode('&', $path['query']);
		foreach ($vars as $var) {
		  $t = explode('=', $var);
		  $path['query_vars'][$t[0]] = $t[1];
		}
	  }
	return $path;
	}

$path = get_path();

switch($path['call_parts'][0]) {
  case 'home': include 'pages/home.php';
    break;
  case 'blog-details': include 'pages/blog-details.php';
    break;
  case 'blog': include 'pages/blog.php';
    break;
  case 'products': include 'pages/products.php';
    break;
  case 'product-details': include 'pages/product-details.php';
    break;
  case 'contact': include 'pages/contact.php';
    break;
  case 'checkout': include 'pages/checkout.php';
    break;
  case 'cart': include 'pages/cart.php';
    break;
  case 'wishlist': include 'pages/wishlist.php';
    break;
  case 'logout': include 'pages/logout.php';
    break;
  case 'search': include 'pages/search.php';
    break;
  case 'privacy-policy': include 'pages/privacy.php';
    break;
  case 'terms-and-conditions': include 'pages/terms.php';
    break;
  case 'access-denied': include 'pages/restricted.php';
    break;
  case 'about-us': include 'pages/about.php';
    break;
  case 'login': include 'pages/login.php';
    break;
  case 'register': include 'pages/register.php';
    break;
  case '': include 'pages/home.php';
    break;
  default:
    include 'pages/404.php';
}

?>