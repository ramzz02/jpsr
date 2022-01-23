<?php
	include("header.php");
	$busid=$_GET["id"];
	$query = mysqli_query($con, "select * from business where id='$busid'");
	$row=mysqli_fetch_array($query);
		date_default_timezone_set("Asia/Kolkata");
	$time = date('H:i:s');
?>
	<!-- Agent Single Grid View -->
	<section class="our-agent-single">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8">
					<div class="row">
					<div class="col-lg-12 pl0 pr0 pl15-767 pr15-767">
					<div class="single_property_title">
						<div class="media">
							<img class="mr-3" src="images/business_logo.jpg" alt="agency1.png">
							<div class="media-body mt0">
						    	<h3 class="mt-0">S.S.V Enterprises</h2>
						    	
						    	<div class="col-lg-12 pl0 pr0">

						    		<div class="col-lg-5 pl0 pr0 float-left split_business1">

						    			<p class="color-black mb5"><span class="flaticon-avatar"></span> K.Sivaraman</p>

								    	<div class="mb5"><a class="color-black" href="tel:<?php echo $row['contact']; ?>"><span class="flaticon-phone"></span> <?php echo $row['contact']; ?></a></div>
								    	<div class="website_tZ mb5"><a href="<?php echo $row['website']; ?>"><span class="fa fa-globe"></span> Website</a></div>

								    </div>

								    <div class="col-lg-7 pr0 float-left split_business2">

								    	<div class="color-black mb5"><span class="flaticon-pin mr5"></span><?php echo $row['address']; ?></div>
								    	<div class="mb5"><a class="color-black" href="mailto:ramesh@gmail.com"><span class="flaticon-email mr5"></span>ramesh@gmail.com</a></div>
								    </div>

						    	</div>

						    	<!-- <ul class="mb0 agency_profile_contact">
						    		<li class="list-inline-item"></li>
    								<li class="list-inline-item"><a class="price_range" href="tel: <?php echo $row['contact']; ?>"><span class="flaticon-phone"></span> Call Now</a></li>
    								<li class="list-inline-item"><a class="price_range" href="mailto: <?php echo $row['email']; ?>"><span class="flaticon-email"></span> Mail</a></li>
    							    <li class="list-inline-item icon"><a href="<?php echo $row['website']; ?>"><span class="fa fa-globe"></span> Website</a></li>
						    	</ul> -->
							</div>
						</div>
					</div>
					<!--div class="dn db-lg">
						<div id="main2">
							<span id="open2" class="fa fa-filter filter_open_btn listing_single_v3"> Show Filter</span>
						</div>
					</div-->
				</div>

				
				<!--div class="col-lg-12 pl0 pr0 pl15-767 pr15-767" align="right">
					<div class="single_property_social_share">
						<div class="spss style2 mt30 float-left fn-lg">
							<ul class="mb0">
								<li class="list-inline-item icon"><a href="#"><span class="flaticon-upload"></span></a></li>
								<li class="list-inline-item"><a href="#">Share</a></li>
								<li class="list-inline-item icon"><a href="tel: <?php echo $row['contact']; ?>"><span class="flaticon-phone"></span></a></li>
								<li class="list-inline-item"><a href="tel: <?php echo $row['contact']; ?>">Call</a></li>
								<li class="list-inline-item icon"><a href="mailto: <?php echo $row['email']; ?>"><span class="flaticon-email"></span></a></li>
								<li class="list-inline-item"><a href="mailto: <?php echo $row['email']; ?>">Mail</a></li>
							</ul>
						</div>
					</div>
				</div-->
				<div class="col-lg-12 pl0 pr0 pl15-767 pr15-767 text-align-right"><br>

					<div class="link_share">

						<span><a id="direction" class="frontend_whatsapp" href="https://www.google.com/maps/search/" target="_blank"><i class="flaticon-pin" aria-hidden="true"></i> Get Direction</a></span>

						<span><a id="whatsapp" class="frontend_whatsapp" href="https://web.whatsapp.com/send?text=<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp</a></span>

						<span><a id="facebook" class="frontend_facebook " href="http://www.facebook.com/sharer.php?u=<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-facebook-f" aria-hidden="true"></i> Facebook</a></span>
		
						<span><a id="twitter" class="frontend_twitter" href="https://twitter.com/intent/tweet?url=<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></span>

					</div>

					<br>

				</div>
						<!-- <div class="col-lg-6 pl0 pr0 pl15-767 pr15-767">
							<div class="listing_single_description mb60">
								<h4 class="mb30">Business Description</h4><hr>
						    	<p class="first-para mb25"> <?php echo $row['description']; ?></p>
							</div>
						</div> -->
						<div class="col-lg-12 p0">
        				    <h4 class="mb20 text-deco-underline">Business Gallery Photos</h4>
        					<div class="listing_single_property_slider Buz_gallery">
        						<div class="item">
        							<img class="img-fluid" src="images/listing/lsps1.jpg" alt="ListingSinglePageSlider1.jpg">
        						</div>
        						<div class="item">
        							<img class="img-fluid" src="images/listing/lsps2.jpg" alt="ListingSinglePageSlider2.jpg">
        						</div>
        						<div class="item">
        							<img class="img-fluid" src="images/listing/lsps3.jpg" alt="ListingSinglePageSlider3.jpg">
        						</div>
        						<div class="item">
        							<img class="img-fluid" src="images/listing/lsps1.jpg" alt="ListingSinglePageSlider1.jpg">
        						</div>
        						<div class="item">
        							<img class="img-fluid" src="images/listing/lsps2.jpg" alt="ListingSinglePageSlider2.jpg">
        						</div>
        					</div>
        				</div>
        								<div class="col-lg-12 pl0 pr0 pl15-767 pr15-767"><br></div>
						<div class="col-lg-6 pl0 pr0 pl15-767 pr15-767">
							<div class="listing_single_description mb60">
								<h4 class="mb30">Business Offers</h4><hr>
						    	<p class="first-para mb25"> <?php echo $row['offer']; ?></p>
							</div>
						</div><hr>
						<div class="col-lg-6 pl0 pl15-767">
							<div class="listing_single_video">
								<div class="property_video">
									<div class="thumb">
										<img class="pro_img img-fluid w100" src="images/listing/lspv2.jpg" alt="ListingSingleVideo2.jpg">
										<div class="overlay_icon">
											<a class="video_popup_btn popup-youtube" href="https://www.youtube.com/watch?v=oqNZOOWF8qM"><span class="fa fa-play body-color"></span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--div class="col-lg-12 pl0 pl15-767">
							<div class="single_page_review_form p30-lg mb30-991">
								<div class="wrapper">
									<h4>Add a Review</h4>
									<div class="custom_reivews row mt40 mb30">
										<div class="col-lg-2 pr0">
											<div class="title">Overall Rating</div>
										</div>
										<div class="col-lg-4">
											<div class="review_star text-right">
												<ul>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="col-lg-2 pr0">
											<div class="title">Services</div>
										</div>
										<div class="col-lg-4">
											<div class="review_star text-right">
												<ul>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="col-lg-2 pr0">
											<div class="title">Hospitality</div>
										</div>
										<div class="col-lg-4">
											<div class="review_star text-right">
												<ul>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="col-lg-2 pr0">
											<div class="title">Pricing</div>
										</div>
										<div class="col-lg-4">
											<div class="review_star text-right">
												<ul>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												</ul>
											</div>
										</div>
									</div>
									<form class="review_form">
										<div class="form-group">
									    	<input type="text" class="form-control" placeholder="Name">
										</div>
										<div class="form-group">
									    	<input type="email" class="form-control" placeholder="Email">
										</div>
										<div class="form-group">
										    <textarea class="form-control" rows="7" placeholder="Your Review"></textarea>
										</div>
										<button type="submit" class="btn btn-thm">Submit Review</button>
									</form>
								</div>
							</div>
						</div-->
					</div>
				</div>
				<div class="col-lg-4 col-xl-4">
					<div class="listing_single_sidebar">
						<!-- <div class="lss_contact_location" style="background:#eee;">
							<h4 class="mb25">Location</h4>
							<ul class="contact_list list-unstyled mb15">
								<li class="df"><span class="flaticon-pin mr15"></span><?php echo $row['address'].", ".$row['ward'].", ".$row['area'].", ".$row['city'].", ".$row['state']." - ".$row['pincode']." | Landmark: ".$row['landmark']; ?></li>
								<li align="right"><a target="_blank" href="https://www.google.com/maps/search/<?php echo $row['name'].", ".$row['address'].", ".$row['ward'].", ".$row['area'].", ".$row['city'].", ".$row['state']." - ".$row['pincode']; ?>"> <span class="tdu text-thm">Get Direction</span></a></li>
								<li><span class="flaticon-email mr15"></span><a href="mailto:<?php echo $row['email']; ?>"> <?php echo $row['email']; ?></a></li>
								<li><span class="flaticon-link mr15"></span><a href="<?php echo $row['website']; ?>"> <?php echo $row['website']; ?></a></li>
							</ul>
							<ul class="sidebar_social_icon mb0">
								<li class="list-inline-item"><a href="http://www.facebook.com/sharer.php?u=<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><i class="fa fa-facebook"></i></a></li>
								<li class="list-inline-item"><a href="http://twitter.com/share?url=<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><i class="fa fa-twitter"></i></a></li>
								<li class="list-inline-item"><a href="whatsapp://send?text=<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><i class="fa fa-whatsapp"></i></a></li>
								<li class="list-inline-item"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div> -->
						<div class="sidebar_opening_hour_widget pb20" style="background:#eee;">
							<h4 class="title mb15">Hours <?php if(($time > $row['workingfrom']) && ($time < $row['workingto'])){ ?><small class="text-thm2 float-right">Now Open</small><?php }else{ ?><small class="text-thm3 float-right">Closed</small><?php } ?></h4>
							<ul class="list_details mb0">
								<li><a href="#">Monday <span class="float-right"> <?php echo $row['workingfrom']." - ".$row['workingto']; ?></span></a></li>
								<li><a href="#">Tuesday <span class="float-right"> <?php echo $row['workingfrom']." - ".$row['workingto']; ?></span></a></li>
								<li><a href="#">Wednesday <span class="float-right"> <?php echo $row['workingfrom']." - ".$row['workingto']; ?></span></a></li>
								<li><a href="#">Thursday <span class="float-right"> <?php echo $row['workingfrom']." - ".$row['workingto']; ?></span></a></li>
								<li><a href="#">Friday <span class="float-right"> <?php echo $row['workingfrom']." - ".$row['workingto']; ?></span></a></li>
								<li><a href="#">Saturday <span class="float-right"> <?php echo $row['workingfrom']." - ".$row['workingto']; ?></span></a></li>
								<li><a href="#">Sunday <span class="float-right"> <?php echo $row['workingfrom']." - ".$row['workingto']; ?></span></a></li>
							</ul>
						</div>
						<!--div class="sidebar_category_widget" style="background:#eee;">
							<h4 class="title mb30">Business Categories</h4>
							<ul class="mb0">
								<li class="mb25"><a href="#"><img class="mr5" src="images/icons/icon3.svg" alt="icon3.svg"> <?php echo $row['category']; ?></a></li>
							</ul>
						</div-->
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include("footer.php");?>