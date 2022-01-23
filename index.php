<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');
  
  $_SERVER['PHP_SELF'];
 
  $web_link = "https://www.$_SERVER[HTTP_HOST]";
  $actual_link = "https://www.$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
	    
	    <meta property="og:title" content="JPSR - Know Your Neighbors" />
		<meta property="og:description" content="JPSR is a local guide for all your needs." />
		<meta property="og:url" content="<?php echo $actual_link; ?>" />
		<meta property="og:site_name" content="JPSR - Know Your Neighbors">
		<meta property="og:image" content="<?php echo $web_link; ?>/images/jpsrlogo.png" />
		<meta property="og:image:secure_url" content="<?php echo $web_link; ?>/images/jpsrlogo.png" />
		<meta property="og:image:width" content="400">
		<meta property="og:image:height" content="300">
		
		<?php include("includes/headerTop.php"); ?>
	</head>
		
	<body>

		<?php include("includes/Header.php"); ?>

		<!-- Home Design -->
		<audio autoplay>
		  <source src="jpsr.mp3" type="audio/mpeg">
		</audio>
		<section class="home-one home1-overlay bg-img1">
				<div class="container">
					<div class="row posr">
						<div class="col-lg-12">
							<div class="home_content">
								<!--h3 style="position:absolute:z-index:999999999999;background:#fff"><marquee onMouseOver="this.stop()" onMouseOut="this.start()"><a style="color:#f00;" href="newstile.php">Sample Flash News</a></marquee></h3-->
								<div class="home-text text-center">
								<img src="images/jpsr_logo.png" width="40%">
									<h2 class="fz50">Know Your Neighbours...</h2>
									<!--p class="fz18 color-white">Explore!</p-->
								</div>
								<div class="row justify-content-center">
									<div class="col-lg-10 col-xl-8">
										<div class="home_adv_srch_opt text-center">
											<div class="wrapper">
												<div class="home_adv_srch_form">
													<form action="search.php" method="post" class="bgc-white bgct-767 pl30 pt10 pl0-767">
													<input hidden type="text">
														<div class="form-row align-items-center">
														    <div class="col-auto home_form_input mb20-xsd">
														      	<label class="sr-only">JPSR</label>
														      	<div class="input-group style1 mb-2 mb0-767">
														        	<div class="input-group-prepend">
														        		<div class="input-group-text pl0 pb0-767">Search</div>
														        	</div>
																	<div class="select-wrap style1-dropdown">
																    	<select name="category" id="category"class="form-control js-searchBox">
																    	    <option selected disabled> Categories</option>
																			<option value="business">Business Directory Listing</option>
																			<option value="news">News</option>
																    	</select>
																    </div>
														      	</div>
														    </div>
														    <div class="col-auto home_form_input">
														      	<label class="sr-only">JPSR</label>
														      	<div class="input-group style2 mb-2 mb0-767">
														        	
																	<div class="select-wrap style2-dropdown" id="one">
																		<select class="form-control js-searchBox2" placeholder=" are you looking for ?" required name="busid" id="busid">
																		<option value="Select Category">Select Category</option>
		                                                                
																	</select>
																    </div>
																	
														      	</div>
														    </div>
														    <div class="col-auto home_form_input2">
														    	<button type="submit" class="btn search-btn mb-2" name="submitbus" id="submitbus"><span class="flaticon-loupe"></span></button>
														    </div>
														</div>
													</form>
												</div>	
											</div>
											<div class="home_mobile_slider home_custom_list dn db-767">
												<a href="business-directory.php"><div class="item">
													<div class="icon_home1">
														<div class="icon text-danger"><span class="fa fa-briefcase"></span></div>
														<p class="text-danger">Business Directory</p>
													</div>
												</div></a>
												<a href="jpsr-services.php"><div class="item">
													<div class="icon_home1">
														<div class="icon text-danger"><span class="fa fa-cogs"></span></div>
														<p class="text-danger">JPSR Services</p>
													</div></a>
												</div></a>
												<a href=""><div class="item">
													<div class="icon_home1">
														<div class="icon text-danger"><span class="fa fa-percent"></span></div>
														<p class="text-danger">Offers Near You</p>
													</div>
												</div></a>
												<a href="newstile.php"><div class="item">
													<div class="icon_home1">
														<div class="icon text-danger"><span class="fa fa-newspaper-o"></span></div>
														<p class="text-danger">News</p>
													</div>
												</div></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</section>

		<!-- Feature Properties -->
		<section id="feature-property" class="feature-property pt0 border-bottom">
			<div class="container p0">
				<div class="feature-content dn-767">
					<div class="row justify-content-center mt-80 mb45">
						<div class="col-lg-4 text-center">
							<p><em class="text-white">What are you interested in?</em></p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-4 col-xl-3">
							<a href="business-directory.php"><div class="icon-box text-center">
								<div class="icon"><span class="fa fa-briefcase text-danger"></span></div>
								<div class="content-details">
									<div class="title">Business Directory</div>
								</div>
							</div></a>
						</div>
						<div class="col-sm-6 col-md-4 col-xl-3">
							<a href="jpsr-services.php"><div class="icon-box text-center">
								<div class="icon"><span class="fa fa-cogs text-danger"></span></div>
								<div class="content-details">
									<div class="title">JPSR Services</div>
								</div>
							</div></a>
						</div>
						<div class="col-sm-6 col-md-4 col-xl-3">
							<a href="offers.php"><div class="icon-box text-center">
								<div class="icon"><span class="fa fa-percent text-danger"></span></div>
								<div class="content-details">
									<div class="title">Offers Near You</div>
								</div>
							</div></a>
						</div>
						<div class="col-sm-6 col-md-4 col-xl-3">
							<a href="newstile.php"><div class="icon-box text-center">
								<div class="icon"><span class="fa fa-newspaper-o text-danger"></span></div>
								<div class="content-details">
									<div class="title">News</div>
								</div>
							</div></a>
						</div>
					</div>
				</div>
			</div>
			<div class="container pt100-767">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="text-center"><br>
							<img src="images/logo.png" width="50%">
							<h2 class="text-thm">Welcome to JPSR Enterprisess</h2><hr>
							<p>JPSR - Know your Neightbour is a hosur based company offering businesses from your neighborhood by presenting all available nearby business.</p>
							<a class="btn btn-thm btn-lg rounded" href="referral.php"><i class="fa fa-database"></i> Refer & Earn Money</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Start Partners -->
		<section class="start-partners bgc-thm pt60 pb60">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="start_partner tac-smd">
							<h2>Add Your Business Today!</h2>
							<p>Become an entrepreneur.</p>
						</div>
					</div>
					<div class="col-lg-4 pr10">
						<div class="parner_reg_btn text-right tac-smd">
							<a class="btn" href="register-ur-business.php"><i class="fa fa-user-plus"></i> Register Now</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="w3-content w3-display-container">
		  <img class="mySlides" src="images/slider1.jpg" style="width:100%">
		  <img class="mySlides" src="images/slider2.jpg" style="width:100%">
		  <img class="mySlides" src="images/slider1.jpg" style="width:100%">
		  <img class="mySlides" src="images/slider2.jpg" style="width:100%">

		  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
		  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
		</div>

		<script>
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
		  showDivs(slideIndex += n);
		}

		function showDivs(n) {
		  var i;
		  var x = document.getElementsByClassName("mySlides");
		  if (n > x.length) {slideIndex = 1}
		  if (n < 1) {slideIndex = x.length}
		  for (i = 0; i < x.length; i++) {
		    x[i].style.display = "none";  
		  }
		  x[slideIndex-1].style.display = "block";  
		}
		</script>

		<!-- How It Works -->
		<section id="why-chose" class="whychose_us bgc-f7 pb70">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="main-title text-center">
							<h2 class="text-thm">JPSR Add-ons</h2>
							<p>We offer additional add-on benefits to our customers.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-lg-4 col-xl-4">
						<a href="registeroffer.php"><div class="why_chose_us">
							<div class="icon">
								<span class="flaticon-find-location"></span>
							</div>
							<div class="details">
								<h4>Submit your Offers</h4>
								<p>Discover & connect with your local neighborhood by offering benefits through JPSR Enterprisess.</p>
							</div>
						</div></a>
					</div>
					<div class="col-md-6 col-lg-4 col-xl-4">
						<a href="registerad.php"><div class="why_chose_us">
							<div class="icon">
								<span class="flaticon-comment"></span>
							</div>
							<div class="details">
								<h4>Post your Ad</h4>
								<p>JPSR Allows business users to post Ads across JPSR platfrom to gain additional benefits.</p>
							</div>
						</div></a>
					</div>
					<div class="col-md-6 col-lg-4 col-xl-4">
						<a href="newsreport.php"><div class="why_chose_us">
							<div class="icon">
								<span class="fa fa-newspaper-o"></span>
							</div>
							<div class="details">
								<h4>Submit News</h4>
								<p>Submit an article and become a reporter of JPSR Enterprisess for your nearby neighbours.</p>
							</div>
						</div></a>
					</div>
				</div>
			</div>
		</section>

		<!-- Our Testimonials -->
		<section class="our-testimonials">
			<div class="container ovh max1800">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="main-title text-center">
							<h2 class="text-thm"><i class="fa fa-comments"></i> Testimonials</h2>
							<p>Valuable reviews from JPSR customers about JPSR.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="testimonial_slider_home1">
							<div class="item">
								<div class="testimonial_post text-center">
									<div class="thumb">
										<img src="images/testimonial/1.png" alt="1.png">
										<h4 class="title">Alison Dawn</h4>
										<div class="client-postn">WordPress Developer</div>
									</div>
									<div class="details">
										<div class="icon"><span>“</span></div>
										<p>“ I believe in lifelong learning and Skola is a great place to learn from experts. I've learned a lot and recommend it to all my friends “</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial_post text-center">
									<div class="thumb">
										<img src="images/testimonial/2.png" alt="2.png">
										<h4 class="title">Albert Cole</h4>
										<div class="client-postn">Designer</div>
									</div>
									<div class="details">
										<div class="icon"><span>“</span></div>
										<p>“ I believe in lifelong learning and Skola is a great place to learn from experts. I've learned a lot and recommend it to all my friends “</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial_post text-center">
									<div class="thumb">
										<img src="images/testimonial/3.png" alt="3.png">
										<h4 class="title">Daniel Parker</h4>
										<div class="client-postn">Front-end Developer</div>
									</div>
									<div class="details">
										<div class="icon"><span>“</span></div>
										<p>“ I believe in lifelong learning and Skola is a great place to learn from experts. I've learned a lot and recommend it to all my friends “</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial_post text-center">
									<div class="thumb">
										<img src="images/testimonial/2.png" alt="2.png">
										<h4 class="title">Alison Dawn</h4>
										<div class="client-postn">WordPress Developer</div>
									</div>
									<div class="details">
										<div class="icon"><span>“</span></div>
										<p>“ I believe in lifelong learning and Skola is a great place to learn from experts. I've learned a lot and recommend it to all my friends “</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial_post text-center">
									<div class="thumb">
										<img src="images/testimonial/1.png" alt="1.png">
										<h4 class="title">Albert Cole</h4>
										<div class="client-postn">Designer</div>
									</div>
									<div class="details">
										<div class="icon"><span>“</span></div>
										<p>“ I believe in lifelong learning and Skola is a great place to learn from experts. I've learned a lot and recommend it to all my friends “</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Our Divider -->
		<section class="divider home-style1 parallax" data-stellar-background-ratio="0.2">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="business_exposer text-center">
							<h2 class="title text-white mb20">JPSR Services<br>Name it, We Do it	!</h2>
							<p class="text-white mb35">Services offered by JPSR Enterprisess benefits for a daily regular routine life in your city.</p>
							<a class="btn exposer_btn" href="jpsr-services.php"><i class="fa fa-briefcase"></i> Explore Services</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Our Blog -->
		<section class="our-blog pb70">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="main-title text-center">
							<h2 class="text-thm"><i class="fa fa-newspaper-o"></i> Top Businesses</h2>
							<p>Category-wise top businesses from JPSR Enterprisess.</p>
						</div>
						</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-lg-4 col-xl-4">
						<div class="for_blog feat_property">
							<div class="thumb">
								<img class="img-whp" src="images/blog/1.jpg" alt="1.jpg">
								<div class="tag bgc-thm"><a class="text-white" href="#">Health & Care</a></div>
							</div>
							<div class="details">
								<div class="tc_content">
									<div class="bp_meta">
										<ul>
											<li class="list-inline-item"><a href="#"><span class="flaticon-avatar mr10"></span> Jack Wilson</a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-date mr10"></span> 06 April, 2020</a></li>
										</ul>
									</div>
									<h4>The Top 25 Bike Stores in Toronto by Neighbourhood</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 col-xl-4">
						<div class="for_blog feat_property">
							<div class="thumb">
								<img class="img-whp" src="images/blog/2.jpg" alt="2.jpg">
								<div class="tag bgc-thm"><a class="text-white" href="#">Culture</a></div>
							</div>
							<div class="details">
								<div class="tc_content">
									<div class="bp_meta">
										<ul>
											<li class="list-inline-item"><a href="#"><span class="flaticon-avatar mr10"></span> Jack Wilson</a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-date mr10"></span> 06 April, 2020</a></li>
										</ul>
									</div>
									<h4>How to Wear a Headscarf Like a Gucci Muse</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 col-xl-4">
						<div class="for_blog feat_property">
							<div class="thumb">
								<img class="img-whp" src="images/blog/3.jpg" alt="3.jpg">
								<div class="tag bgc-thm"><a class="text-white" href="#">Travelling</a></div>
							</div>
							<div class="details">
								<div class="tc_content">
									<div class="bp_meta">
										<ul>
											<li class="list-inline-item"><a href="#"><span class="flaticon-avatar mr10"></span> Jack Wilson</a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-date mr10"></span> 06 April, 2020</a></li>
										</ul>
									</div>
									<h4>Quisque sed eros mollis, pretium odio feugiat dictum</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
			<!-- Our Partners -->
		<section id="our-partners" class="our-partners pt60 pb60">
			<div class="container">
				<div class="row">
				<div class="col-sm-6 col-md-12 col-lg-12">
					<div class="main-title text-center">
							<h2 class="text-thm"><i class="fa fa-image"></i> Premium Business Logos</h2>
						</div><hr>
						</div>
					<div class="col-sm-6 col-md-4 col-lg-2">
						<div class="our_partner">
							<img class="img-fluid" src="images/partners/1.png" alt="1.png">
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-2">
						<div class="our_partner">
							<img class="img-fluid" src="images/partners/2.png" alt="2.png">
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-2">
						<div class="our_partner">
							<img class="img-fluid" src="images/partners/3.png" alt="3.png">
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-2">
						<div class="our_partner">
							<img class="img-fluid" src="images/partners/4.png" alt="4.png">
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-2">
						<div class="our_partner">
							<img class="img-fluid" src="images/partners/5.png" alt="5.png">
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-2">
						<div class="our_partner">
							<img class="img-fluid" src="images/partners/6.png" alt="6.png">
						</div>
					</div>
				</div>
			</div>
		</section>
	
	<?php include("includes/Footer.php"); ?>

	<?php include("includes/footerBottom.php"); ?>

</body>
</html>