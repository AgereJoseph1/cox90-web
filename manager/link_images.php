<?php

require_once('functions/init.php');

$sub_site_name = "Images";

if(isset($_GET['id'])) {
	$id = clean(escape($_GET['id']));
	$w = clean(escape($_GET['w']));
	$h = clean(escape($_GET['h']));
	$page = single_image($id);
} else {
	$page = '';
	$id = '';
}
?>



<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <?php include('webparts/css.php'); ?>
    <style>
	.sweet-alert {
    background-color: white;
    font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;
    width: 100%;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
     position: initial; 
    left: 50%;
     top: 0%; 
     margin-left: 0px; 
     margin-top: 0; 
	margin: auto;
    /* overflow: hidden; */
    /* display: none; */
     z-index: 0;
		}
	</style>
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
        <?php include('webparts/header.php'); ?>
        <!-- end header -->
        <!-- start page container -->
        <div class="page-container">
 			<!-- start sidebar menu -->
        <?php include('webparts/nav.php'); ?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
		<?php include('webparts/breadcrumb.php'); ?>
                    </div>
                     <div>
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-head">
                                </div>
                                <div class="card-body ">
                                  <div class="row">
									
		<div class="col-md-4">

<div class="panel-group col-lg-12 col-md-12" id="accordion1" role="tablist" aria-multiselectable="true">

    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">CAROUSEL MAIN</a></h4>
      </div>
      <div id="collapseOne1" class="panel-collapse collapse  <?php if ($page == 'carouselmain' || $page === ' ') {echo('in');}?>">
        <?php for($x=1; $x<13; $x++) { ?>  
        
        <div class="panel-body">
            <a href="?page=images&id=<?php echo($x) ?>&image=carouselmain" 
            <?php if(($page == 'carouselmain') && ($x == $id)) echo ("class='active'"); ?>
            > Image <?php echo($x) ?></a>
        
        </div>    
        
         
        <?php } ?>
        
      </div>
  </div>
    
    <!--<-- small carousel list -->
  <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">CAROUSEL SMALL</a></h4>
      </div>
      <div id="collapseTwo1" class="panel-collapse collapse <?php  if ($page == 'carouselsmall') {echo('in');}?>">
        <?php for($x=1; $x<10; $x++) { ?>  
        <div class="panel-body">
            <a href="?page=images&id=<?php echo($x) ?>&image=carouselsmall" 
            <?php if(($page == 'carouselsmall') && ($x == $id)) echo ("class='active'"); ?>
            > Image <?php echo($x) ?></a>
        </div> 
        <?php }  ?>
      </div>
  </div>
  
   <!--<-- aside banner list -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1">ASIDE BANNERS</a></h4>
      </div>
      <div id="collapseThree1" class="panel-collapse collapse <?php if ($page == 'aside-banner') {echo('in');}?>">
        <?php for($x=1; $x<2; $x++) { ?>  
        
        <div class="panel-body">
            <a href="?page=images&id=<?php echo($x) ?>&image=aside-banner" 
            <?php if(($page == 'aside-banner') && ($x == $id)) echo ("class='active'"); ?>> Image <?php echo($x) ?></a>
        
        </div>    
        
         
        <?php } ?>
      </div>
  </div>
  
  <!--<-- mid banner list -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapsefour1">MID BANNERS</a></h4>
      </div>
      <div id="collapsefour1" class="panel-collapse collapse <?php if ($page == 'mid-banner') {echo('in');}?>">
        <?php for($x=1; $x<3; $x++) { ?>  
        
        <div class="panel-body">
            <a href="?page=images&id=<?php echo($x) ?>&image=mid-banner" 
            <?php if(($page == 'mid-banner') && ($x == $id)) echo ("class='active'"); ?>> Image <?php echo($x) ?></a>
        
        </div>    
        
         
        <?php } ?>
      </div>
      </div>
      
      
                          <!--<-- botom banner list -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapsefive1">HOME BOTTOM BANNERS</a></h4>
      </div>
      <div id="collapsefive1" class="panel-collapse collapse <?php if ($page == 'bottom-banner') {echo('in');}?>">
        <?php for($x=1; $x<4; $x++) { ?>  
        
        <div class="panel-body">
            <a href="?page=images&id=<?php echo($x) ?>&image=bottom-banner" 
            <?php if(($page == 'bottom-banner') && ($x == $id)) echo ("class='active'"); ?>> Image <?php echo($x) ?></a>
        
        </div>    
        
         
        <?php } ?>
      </div>
      </div>
  
  
</div> 
</div>








<div class="col-md-8">
<div class="card">
<div class="card-body client_details">

 <div class="col-lg-9 col-md-9">
         <div style='margin-bottom: 1%'></div>
       <div style="padding: 2%; color: gold" class=" <?php if(isset($message)) {echo('bg-success');} elseif(isset($errormessage)) {echo('bg-danger');} ?> text-center">
                      <?php if(isset($message)) {echo($message);} elseif(isset($errormessage)) {echo($errormessage);} ?>
      </div>
      <div style='margin-bottom: 1%'></div>

<?php if (isset($id)) { ?>	
<!-- image upload form beggining-->
<!--image 1-->
          <?php if ($page == 'carouselmain') { ?>
              <div><h2><b>MAIN CAROUSEL IMAGE 
              <label class="badge" style="font-size: 1em"><?php echo($id); ?></label> </b>
              </h2><h5>NOTE: <span> image size should be <b>Width 570px by height 490px</b></span></h5></div>
          <?php } ?>
          <?php if ($page == 'carouselsmall') { ?>
              <div><h2><b>SMALL CAROUSEL IMAGE 
              <label class="badge" style="font-size: 1em"><?php echo($id); ?></label></b><h5>NOTE: <span> image size should be <b>Width 270px by Height 230px</b></span></h5></div>
          <?php } ?>
          <?php if ($page == 'aside-banner') { ?>
              <div><h2><b>ASIDE VERTICAL BANNERS 
              <label class="badge" style="font-size: 1em"><?php echo($id); ?></label></b></h2><h5>NOTE: <span> image size should be <b>Width 270px  by Height 387px</b></span></h5></div>
          <?php } ?>
          <?php if ($page == 'mid-banner') { ?>
              <div><h2><b>HOME PAGE MID BANNERS 
              <label class="badge" style="font-size: 1em"><?php echo($id); ?></label></b></h2><h5>NOTE: <span> image size should be <b>Width 570px  by Height 232px</b></span></h5></div>
          <?php } ?>
          <?php if ($page == 'bottom-banner') { ?>
              <div><h2><b>BOTTOM BANNERS 
              <label class="badge" style="font-size: 1em"><?php echo($id); ?></label></b></h2><h5>NOTE: <span> image size should be <b>Width 1170px  by Height 191px</b></span></h5></div>
          <?php } ?>
          
          
          
          <form action="?page=carousel_images&id=<?php echo($id);?>&amp;image=<?php echo($page);?>" class="dropzone image" id="avatar-dropzone">

          <label>Image <?php echo($id);?></label>
          </form>
          
          
          <label for="image" style="color: gold;"> Image <?php echo($id); ?> Activity:</label>
          <select class="form-control" type="text" id="activity" name="imageactive">
                     <option value="1" <?php 
                              if ($activity['image'.$id.'active'] == "1") {echo('selected');}?> >Active</option>
                              
                              <?php if(($page != 'aside' && $id != 1) || ($page == 'aside' && $id > 4) ) {  ?> 
                    <option value="0" <?php 
                              if ($activity['image'.$id.'active'] == "0" ) {echo('selected');}?>>Inactive</option>
                              <?php } ?>
          </select>
          
      
          <div class="form-group">
              <label for="name" style="color:#8B6505;"> URL(optional) Please leave blank if not sure:</label>
              <input class="form-control" id="url" type="text" name="title" value="<?php echo($activity['title'.$id]); ?>" placeholder="Enter URL">
          </div>

         
             <!--update button-->
         <input type="hidden" value="<?php echo($id); ?>" name="idhidden" >
         <input type="hidden" value="<?php echo($page); ?>" name="pagehidden">
      <button class="btn btn-primary update" style="display: block; clear: both; margin-top: 2%;"> Update Image </button>

      <div class="response"></div>
      
          <?php if ($activity['image'.$id] != '' ) { ?>

          <img style="margin-top: 2%" src="../../uploads/images/<?php echo($page); ?>/<?php echo($activity['image'.$id]); ?>" class="img-responsive" width="30%" />
                          <?php } else { echo("<h4 style = 'color: black'>No image uploaded</h4>");
                   }
          ?>
<?php } else { ?>
<h3>Please Select the Image you want to Modify</h3>
<?php } ?>
 </div>
</div>
</div>
</div>
                                  </div>
                                </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
        </div>

<!--end .section-body -->


        <?php include('webparts/footer.php'); ?>

<script>
   window.onload = function () {
	
	$('.update').click(function(){
		
		$.ajax({
                   url:"ajax/process_images.php",
                   method: "POST",
                   dataType: "html",
                   data:{
					   id: '<?php echo($id); ?>',
					   page: '<?php echo($page); ?>',
					   imageactive: $('#activity').val(),
					   url: $('#url').val(),
                   },
					beforeSend: function() {
						$('.response').html('<div>Updating Image <b>please wait</b></div>');
					},
                   success:function(data){
					   
					   $('.response').html(data);
					   console.log(data);
					   
                   },
                   fail:function(data){
					   
                   }
               });
		
	});	   
	   
   }
</script>
