<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  $curDate = date("Y/m/d");

  $time = date('H:i:s');

  if(empty($_GET['temple_view'])){
  	header('Location: index.php');
  }

  $_SERVER['PHP_SELF'];
 
  $web_link = "https://www.$_SERVER[HTTP_HOST]";
  $actual_link = "https://www.$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  $BuzzExplode =explode("/", $_GET['temple_view']);

  $viewprofiledetails = new Temple();
  $viewprofiledetails = $viewprofiledetails->fetchTemple("WHERE id = '{$BuzzExplode[0]}' ")->resultSet();
  $viewprofiledetail = $viewprofiledetails[0];

  $app_temple_name = str_replace(" ", "-", $viewprofiledetail['temple_name']);
  $app_user_credentials = "Authorized Person Name: ".$viewprofiledetail['person_name'];

  if($viewprofiledetail['temple_image'] != ''){

  	$webSi_URlug = $web_link.'/'.$viewprofiledetail['temple_image'];

  } else {

  	$webSi_URlug = $web_link.'/images/jpsrlogo.png';

  }

  if($viewprofiledetail['temple_image'] != ''){
  		$logo_img_file1 = $viewprofiledetail['temple_image'];
	} else {
		$logo_img_file1 = 'images/nologo.jpg';
	}

	$logo_type = pathinfo($logo_img_file1, PATHINFO_EXTENSION);
	$logo_data = file_get_contents($logo_img_file1);
	$logo_base64_IMg = 'data:image/' . $logo_type . ';base64,' . base64_encode($logo_data);


		$galleryBuzImages = new Temple();
		$galleryBuzImages = $galleryBuzImages->fetchTempleImage("WHERE temple_id = '{$BuzzExplode[0]}' ORDER BY id DESC LIMIT 5")->resultSet();

		if($galleryBuzImages[0]['image_path'] != ''){
			$first_base_templeimg_img_file = $galleryBuzImages[0]['image_path'];
		} else {
			$first_base_templeimg_img_file = "images/no-image-available.jpg";
		}

		if($galleryBuzImages[1]['image_path'] != ''){
			$sec_base_templeimg_img_file = $galleryBuzImages[1]['image_path'];
		} else {
			$sec_base_templeimg_img_file = "images/no-image-available.jpg";
		}

		if($galleryBuzImages[2]['image_path'] != ''){
			$third_base_templeimg_img_file = $galleryBuzImages[2]['image_path'];
		} else {
			$third_base_templeimg_img_file = "images/no-image-available.jpg";
		}

		if($galleryBuzImages[3]['image_path'] != ''){
			$fourth_base_templeimg_img_file = $galleryBuzImages[3]['image_path'];
		} else {
			$fourth_base_templeimg_img_file = "images/no-image-available.jpg";
		}

		if($galleryBuzImages[4]['image_path'] != ''){
			$fifth_base_templeimg_img_file = $galleryBuzImages[4]['image_path'];
		} else {
			$fifth_base_templeimg_img_file = "images/no-image-available.jpg";
		}


	
	$first_templeimg_type = pathinfo($first_base_templeimg_img_file, PATHINFO_EXTENSION);
	$first_templeimg_data = file_get_contents($first_base_templeimg_img_file);
	$first_base64_templeimg_IMg = 'data:image/' . $first_templeimg_type . ';base64,' . base64_encode($first_templeimg_data);

	$sec_templeimg_type = pathinfo($sec_base_templeimg_img_file, PATHINFO_EXTENSION);
	$sec_templeimg_data = file_get_contents($sec_base_templeimg_img_file);
	$sec_base64_templeimg_IMg = 'data:image/' . $sec_templeimg_type . ';base64,' . base64_encode($sec_templeimg_data);

	$third_templeimg_type = pathinfo($third_base_templeimg_img_file, PATHINFO_EXTENSION);
	$third_templeimg_data = file_get_contents($third_base_templeimg_img_file);
	$third_base64_templeimg_IMg = 'data:image/' . $third_templeimg_type . ';base64,' . base64_encode($third_templeimg_data);

	$fourth_templeimg_type = pathinfo($fourth_base_templeimg_img_file, PATHINFO_EXTENSION);
	$fourth_templeimg_data = file_get_contents($fourth_base_templeimg_img_file);
	$fourth_base64_templeimg_IMg = 'data:image/' . $fourth_templeimg_type . ';base64,' . base64_encode($fourth_templeimg_data);

	$fifth_templeimg_type = pathinfo($fifth_base_templeimg_img_file, PATHINFO_EXTENSION);
	$fifth_templeimg_data = file_get_contents($fifth_base_templeimg_img_file);
	$fifth_base64_templeimg_IMg = 'data:image/' . $fifth_templeimg_type . ';base64,' . base64_encode($fifth_templeimg_data);

	if($video_success == 1){
		if($viewprofiledetail['video'] != ''){
			$video_base_img_file = $viewprofiledetail['video'];
			$video_type = pathinfo($video_base_img_file, PATHINFO_EXTENSION);
			$video_data = file_get_contents($video_base_img_file);
			$video_base64_IMg = 'data:video/' . $video_type . ';base64,' . base64_encode($video_data);
		} else {
			$video_base_img_file = 'images/no-video-available.jpg';
			$video_type = pathinfo($video_base_img_file, PATHINFO_EXTENSION);
			$video_data = file_get_contents($video_base_img_file);
			$video_base64_IMg_path = 'data:image/' . $video_type . ';base64,' . base64_encode($video_data);
		}
		
	} else {
		$video_base_img_file = 'images/no-video-available.jpg';
		$video_type = pathinfo($video_base_img_file, PATHINFO_EXTENSION);
		$video_data = file_get_contents($video_base_img_file);
		$video_base64_IMg_path = 'data:image/' . $video_type . ';base64,' . base64_encode($video_data);
	}

	

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
		<meta property="og:title" content="<?php echo $app_temple_name; ?>" />
		<meta property="og:description" content="<?php echo $app_user_credentials; ?>" />
		<meta property="og:url" content="<?php echo $actual_link; ?>" />
		<meta property="og:site_name" content="JPSR - Know Your Neighbors">
		<meta property="og:image" content="<?php echo $webSi_URlug; ?>" />
		<meta property="og:image:secure_url" content="<?php echo $webSi_URlug; ?>" />
		<meta property="og:image:width" content="400">
		<meta property="og:image:height" content="300">

		<?php include("includes/headerTop.php"); ?>

	</head>
		
	<body>

		<?php include("includes/Header.php"); ?>

	<!-- Agent Single Grid View -->
	<section class="our-agent-single">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8">
					<div class="row">
					<div class="col-lg-12 pl0 pr0 pl15-767 pr15-767">
					<div class="single_property_title">
						<div class="media">
							<img class="col-lg-3 p0 mr-3 buz_logo_UNqI float-left" src="<?php echo $logo_base64_IMg; ?>" alt="Business Logo">
							<div class="col-lg-9 media-body mt0">
						    	
						    	<div class="prof_NMKQ_M">
						    	    
						    	    <h4 class="mt-0"><?php echo $viewprofiledetail['temple_name']; ?></h4>
						    	    
						    		<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<!-- <p class="color-black mb5"><?php echo $getbuzzcategory['category_name']; ?></p> -->
									<!--<p class="color-black mb5"><span class="flaticon-avatar"></span> <?php echo $viewprofiledetail['person_name']; ?></p>-->
						    	</div>
						    	
						    	
						    	<div class="col-lg-12 pl0 pr0 prof_NMKQ_d">
						    	    
						    	    <h3 class="mt-0"><?php echo $viewprofiledetail['temple_name']; ?></h3>

						    		<div class="col-lg-5 pl0 pr0 float-left split_business1">

						    			<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
                                        <!-- <p class="color-black mb5"><?php echo $getbuzzcategory['category_name']; ?></p> -->
						    			<p class="color-black mb5"><span class="flaticon-avatar"></span> <?php echo ucwords($viewprofiledetail['person_name']); ?></p>

								    	<div class="mb5"><a class="color-black" href="tel:<?php echo $viewprofiledetail['mobile_no']; ?>"><span class="flaticon-phone"></span> <?php echo $viewprofiledetail['mobile_no']; ?></a></div>
								    	<?php if($viewprofiledetail['website'] != ''){ ?>
								    	<div class="mb5"><a target="_blank" class="website_tZ" href="<?php echo $viewprofiledetail['website']; ?>"><span class="fa fa-globe"></span> Website</a></div>
								    	<?php } else { ?>
								    	<div class="mb5"><a class="website_tZ" href="javascript:void(0)"><span class="fa fa-globe"></span> Website</a></div>
								    	<?php } ?>

								    </div>

								    <div class="col-lg-7 pr0 float-left split_business2">

								    	<div class="color-black mb5"><span class="flaticon-pin mr5"></span><?php echo $viewprofiledetail['address']; ?></div>
								    	<?php if($viewprofiledetail['email'] != ''){ ?>
								    	<div class="mb5"><a class="color-black" href="mailto:<?php echo $viewprofiledetail['email']; ?>"><span class="flaticon-email mr5"></span><?php echo $viewprofiledetail['email']; ?></a></div>
								    	<?php } else { ?>
								    	<div class="mb5"><a class="color-black" href="javascript:void(0)"><span class="flaticon-email mr5"></span>Add your Email</a></div>
								    	<?php } ?>

								    	<?php if($viewprofiledetail['working_hour'] != '-'){ 
								    		$clock_exp = explode("-",$viewprofiledetail['working_hour']); 
								    		$endT = $clock_exp[1] - 12;

								    		?>
								    	<div class="mb5"><a class="color-black" href="mailto:<?php echo $viewprofiledetail['email']; ?>"><span class="fa fa-clock-o mr5"></span><?php echo $clock_exp[0].' AM - '.$endT.':00 PM'; ?></a></div>
								    	<?php } else { ?>
								    	<div class="mb5"><a class="color-black" href="javascript:void(0)"><span class="flaticon-email mr5"></span>Available for any Time</a></div>
								    	<?php } ?>

								    </div>

						    	</div>

						    	
							</div>
						</div>
					</div>

				</div>

				<div class="col-lg-12 prof_NMKQ_M mt15 p0">
				    
				    <div class="col-lg-12 new_J_qO">
						<span class="col-lg-2 flaticon-avatar clock_NB_W font-weight-600 pl-1 pr-1 pt0 pb0" ></span>
						<span class="col-lg-9 pin_addres font-s-18">
							<?php echo ucwords($viewprofiledetail['person_name']); ?>
						</span>
						<div class="clear-both"></div>
					</div>
					
					<div class="col-lg-12 new_J_qO">
						<span class="col-lg-2 flaticon-pin pin_NB_W" ></span>
						<span class="col-lg-9 pin_addres"><?php echo $viewprofiledetail['address']; ?>,<?php echo $viewprofiledetail['city']; ?></span>
						<div class="clear-both"></div>
					</div>

					<div class="col-lg-12 new_J_qO">
						<span class="col-lg-2 fa fa-clock-o clock_NB_W" ></span>
						<span class="col-lg-9 clock_Tme">
							<?php if($viewprofiledetail['working_hour'] != '-'){ 
					    		$clock_exp = explode("-",$viewprofiledetail['working_hour']); 
					    		$endT = $clock_exp[1] - 12;
					    		?>
					    	<?php if(($time > $clock_exp[0]) && ($time < $clock_exp[1])){ ?><span class="text-thm2">Opened</span><?php }else{ ?><span class="text-thm3">Closed</span><?php } ?> . <?php echo $clock_exp[0].' AM - '.$endT.':00 PM'; ?>
					    	<?php } else { ?>
					    	Available for any Time
					    	<?php } ?>
								
							</span>
						<div class="clear-both"></div>
					</div>

				</div>

				<div class="col-lg-12 prof_NMKQ_M mt15">

						<div class="col-lg-3 float-left Icon_view">
							<a href="tel: <?php echo $viewprofiledetail['mobile_no']; ?>">
								<span class="flaticon-phone icon_v" ></span>
    							<div class="clear-both"></div>
								<div class="text-align-center mt15 color-black" >Call</div>
							</a>
						</div>
						<div class="col-lg-3 float-left Icon_view">
							<?php if($viewprofiledetail['email'] != ''){ ?>
							<a  href="mailto: <?php echo $viewprofiledetail['email']; ?>">
								<span class="flaticon-email icon_v"></span>
								<div class="clear-both"></div>
								<div class="text-align-center mt15 color-black" >Email</div>
							</a>
							<?php } else { ?>
							<a href="javascript:void(0)">
								<span class="flaticon-email icon_v"></span>
								<div class="clear-both"></div>
								<div class="text-align-center mt15 color-black" >Email</div>
							</a>
							<?php } ?>
						</div>
					    <div class="col-lg-3 icon float-left Icon_view p0">
					    	<?php if($viewprofiledetail['website'] != ''){ ?>
					    	<a target="_blank" href="<?php echo $viewprofiledetail['website']; ?>">
					    		<span class="fa fa-globe icon_v3"></span>
					    		<div class="clear-both"></div>
					    		<div class="text-align-center mt5 color-black" >Website</div>
					    	</a>
					    	<?php } else { ?>
					    	<a href="javascript:void(0)">
					    		<span class="fa fa-globe icon_v3"></span>
					    		<div class="clear-both"></div>
					    		<div class="text-align-center mt5 color-black" >Website</div>
					    	</a>
					    	<?php } ?>
					    </div>
					    <div class="col-lg-3 icon float-left Icon_view">
					    	<a href="https://www.google.com/maps/search/<?php echo $viewprofiledetail['address']; ?>,<?php echo $viewprofiledetail['city']; ?>">
					    		<span class="flaticon-pin icon_v"></span>
					    		<div class="clear-both"></div>
					    		<div class="text-align-center mt15 color-black" >Direction</div>
					    	</a></div>

				</div>

				
				<div class="col-lg-12 pl0 pr0 pl15-767 pr15-767 text-align-right"><br>

					<div class="link_share">

						<span><a id="whatsapp" class="frontend_whatsapp" href="https://api.whatsapp.com/send?text=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp</a></span>

						<span><a id="facebook" class="frontend_facebook " href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-facebook-f" aria-hidden="true"></i> Facebook</a></span>
		
						<span><a id="twitter" class="frontend_twitter" href="https://twitter.com/intent/tweet?url=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></span>

						<span><a id="direction" class="frontend_whatsapp" href="http://www.linkedin.com/shareArticle?url=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i> Linked In</a></span>

					</div>

					<br>

				</div>

						<div class="col-lg-12 pl15-767 pr15-767 p0 mb20">
        				    <h4 class="mb20 text-deco-underline">Temple Gallery Photos</h4>
        					<div class="listing_single_property_slider Buz_gallery img-container">
        						<div class="item">
        							<img class="img-fluid BusZGalleryImg" src="<?php echo $first_base64_templeimg_IMg; ?>" alt="Gallery 1">
        						</div>
        						<div class="item">
        							<img class="img-fluid BusZGalleryImg" src="<?php echo $sec_base64_templeimg_IMg; ?>" alt="Gallery 2">
        						</div>
        						<div class="item">
        							<img class="img-fluid BusZGalleryImg" src="<?php echo $third_base64_templeimg_IMg; ?>" alt="Gallery 3">
        						</div>
        						<div class="item">
        							<img class="img-fluid BusZGalleryImg" src="<?php echo $fourth_base64_templeimg_IMg; ?>" alt="Gallery 4">
        						</div>
        						<div class="item">
        							<img class="img-fluid BusZGalleryImg" src="<?php echo $fifth_base64_templeimg_IMg; ?>" alt="Gallery 5">
        						</div>
        					</div>
        				</div>

        				<div class="col-lg-6 pl0 pl15-767 pr15-767 p0">
        					<h4 class="mb20 text-deco-underline">Gallery Video</h4>
							<div class="listing_single_video">
								<div class="property_video">
									<div class="thumb">

										<?php if($video_base64_IMg != ''){ ?>
										<video style="height: 220px;" controls><source  src="<?php echo $video_base64_IMg; ?>" type="video/mp4"></video>
										<?php } else { ?>
										<img src="<?php echo $video_base64_IMg_path; ?>">
										<?php } ?>

									</div>
								</div>
							</div>
						</div>

        				<!-- <div class="col-lg-12 pl0 pr0 pl15-767 pr15-767"><br></div> -->
						<!--<div class="col-lg-12 pl0 pr0 pl15-767 pr15-767 mt15">-->
						<!--	<h4 class="mb20 text-deco-underline">Business Description</h4>-->
						<!--	<div class="listing_single_description mb60">-->
						<!--		<?php if($viewprofiledetail['business_description'] != '<br>'){ ?>-->
						<!--    	<p class="first-para mb25"> <?php echo $viewprofiledetail['business_description']; ?></p>-->
						<!--	    <?php } else { ?>-->
						<!--	    <p class="first-para mb25"> We will update soon</p>-->
						<!--	    <?php } ?>-->
						<!--	</div>-->
						<!--</div><hr>-->
						

					</div>
				</div>
				<div class="col-lg-4 col-xl-4">
					<div class="listing_single_sidebar">

						<div class="mb15" >
							<h4 class="mb20 text-deco-underline">Map</h4>
							<iframe height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $viewprofiledetail['address']; ?>,<?php echo $viewprofiledetail['city']; ?>&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
						</div>

						<div class="sidebar_category_widget" style="background:#eee;">
							<h4 class="title mb30">Temple Special</h4>
							<ul class="mb0">
								<?php if($viewprofiledetail['special_offer'] != '<br>' || $viewprofiledetail['special_offer'] != ''){ ?>
								<li class="mb25"><?php echo $viewprofiledetail['special_offer']; ?></li>
								<?php } else { ?>
								<li class="mb25">Not Available</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="col-md-12">

					<div class="col-lg-12 pl0 pr0 pl15-767 pr15-767 mt15">
						<h4 class="mb20 text-deco-underline">Temple Description</h4>
						<div class="listing_single_description mb60 text-align-justify">
							<?php if($viewprofiledetail['temple_description'] != '<br>' || $viewprofiledetail['temple_description'] != ''){ ?>
					    	<p class="first-para mb25"> <?php echo $viewprofiledetail['temple_description']; ?></p>
						    <?php } else { ?>
						    <p class="first-para mb25"> We will update soon</p>
						    <?php } ?>
						</div>
					</div>
						
				</div>
				
			</div>
		</div>
	</section>

	<?php include("includes/Footer.php"); ?>

	<?php include("includes/footerBottom.php"); ?>

</body>
</html>