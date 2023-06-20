


    <meta charset="utf-8">
    <base href="https://www.cox90.com/" />
    <!-- <base href="/cox90-web/" /> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo(setting('Company keywords')); ?>">
    <meta name="description" content="<?php echo(setting('Company description')); ?>">
    <meta name="author" content="Cox90">
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="43b68e59-d797-4965-b1c3-0f2c670c98dd";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
    <!-- Favicons-->
    <link rel="shortcut icon" href="uploads/<?php echo single_image('favicon'); ?>" type="image/png">

    <title><?php if($sub_site_name == 'Home'){ echo(setting('home description')); } else { echo($site_name." | ".$sub_site_name); } ?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" type="text/css" href="css/magnific-popup.css" media="screen">	 -->
    <link href="css/style-custom3.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
    <!-- template CSS -->
    <!-- <link href="css/style.css" rel="stylesheet">
      
    <link href="css/custom.css" rel="stylesheet"> -->

        <?php if($sub_site_name === '404') { ?>

            <link href="css/404style.css" rel="stylesheet">

        <?php } ?>

    <style>
        .fa-heart-o, .fa-shopping-basket {
            cursor: pointer !important;
        }
        .loader2 {
            left: 35%;
        }
        .facebook_off, .social-icon:hover .facebook_on{
        display:none;
        animation: showNav 200ms ease-in-out both;
        }
        .facebook_on, .social-icon:hover .facebook_off{
        display:block;
        animation: showNav 200ms ease-in-out both;
        }
        .instagram_off, .social-icon:hover .instagram_on{
        display:none;
        animation: showNav 200ms ease-in-out both;
        }
        .instagram_on, .social-icon:hover .instagram_off{
        display:block;
        animation: showNav 200ms ease-in-out both;
        }
        .twitter_off, .social-icon:hover .twitter_on{
        display:none;
        animation: showNav 200ms ease-in-out both;
        }
        .twitter_on, .social-icon:hover .twitter_off{
        display:block;
        animation: showNav 200ms ease-in-out both;
        }
        @keyframes showNav {
        from {opacity: 0;}
        to {opacity: 1;}
        }
        /*.block-sticker-tag3 {*/
        /*    display: none;*/
        /*}*/

@media only screen and (max-width: 768px) {
	.navbar-brand img.logo {
		height: 35px !important;
	    margin-left: -60%!important;
	}
	.singleItem {
	    margin-right: 5px;
	    font-size: 13px;
	}
	.singleItem .fa-heart {
	    font-size: 18px;
	}
	.singleItem2 {
	    margin-right: 10px;
	    font-size: 18px;
	    transform: translateY(-5px);
	}
}
@media only screen and (max-width: 350px) {
	nav.navbar.awesomenav .navbar-brand {
		display: none;
	}
	.navbar-brand img.logo {
		display: none;
	}
	.singleItem {
	    margin-right: 10px;
	    font-size: 13px;
	}
	.singleItem .fa-heart {
	    font-size: 18px;
	}
	.singleItem2 {
	    margin-right: 10px;
	    font-size: 18px;
	    transform: translateY(-5px);
	}
}
	.imageStockOut {
	    filter: sepia(100%) saturate(300%) brightness(70%) hue-rotate(180deg); 
	}
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105338193-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-105338193-3');
</script>
