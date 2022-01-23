<?php
	include("header.php");
	$query = mysqli_query($con, "select * from newsreport;");
	$count=mysqli_num_rows($query);
?>
	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb style2">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">News</h2>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">News</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Main Blog Post Content -->
	<section class="blog_post_container">
		<div class="container">
		    			    <h2 class="text-danger"><marquee>Sample Flash News</marquee></h2>
			    <h2 align="center" class="text-thm"><?php echo date('d-m-Y'); ?></h2><p align="center">Have a Great Day!</p><hr>
			<div class="row">
			    <div class="col-lg-7"><br>
			        <img src="images/download.jfif" width="7%"><marquee style="position:absolute;background:#ddd;padding:10px;font-weight:bold;border-radius:0px 10px 10px 0px"><span style="color:#f00">Gold(24k):</span> ₹.4650 | <span style="color:#f00">Gold(22k):</span> ₹4600/gram | <span style="color:#f00">Platinum:</span> ₹.2451/gram | <span style="color:#f00">Silver:</span> ₹.36/gram</marquee>
			     </div>
			     <div class="col-lg-1">
			         </div>
			    <div class="col-lg-4"><br>
                    <img src="images/BPCL-ENGLISH-HINDI-LOGO-CDR-13-1-e1589376240922.jpg" width="10%"><marquee style="background:#ccc;padding:10px;font-weight:bold;border-radius:0px 10px 10px 0px;position:absolute;"><span style="color:#f00">Petrol:</span> ₹.113.00 | <span style="color:#f00">Diesel:</span> ₹.102.21</marquee>
			     </div>
				<div class="col-lg-8"><br>
					<div class="row">
					<div class="col-md-6 col-lg-4 col-xl-4">
					
					<a href="recentVeg.php"><div class="why_chose_us">
						<div class="icon">
							<span class="fa fa-home"></span>
						</div>
						<div class="details">
							<h4>Vegetables & Fruits Pricelist</h4>
						</div>
					</div></a>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<a href="recentGr.php"><div class="why_chose_us">
						<div class="icon">
							<span class="fa fa-briefcase"></span>
						</div>
						<div class="details">
							<h4>Groceries Pricelist</h4>
						</div>
					</div></a>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<a href="property-management-services.php"><div class="why_chose_us">
						<div class="icon">
							<span class="fa fa-calendar-o"></span>
						</div>
						<div class="details">
							<h4>Today's<br>Special</h4>
						</div>
					</div></a>
				</div>
				</div>
								<br><h2 align="center">Hosur News</h2><hr>
					<div class="row">
					    <div class="col-md-6 col-lg-4">
							<a href="news.php"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">General News</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
				<div class="col-md-6 col-lg-4">
							<a href="news.php"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Business News</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="news.php"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Educational News</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="news.php"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Social News</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="news.php"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Spiritual News</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="news.php"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Industry News</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="eventlist.php"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Events</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="vacancies.php"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Jobs</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="properties.php"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Property</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="news.php"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Kids Article</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="news.php"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Birthday Wishes</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
				    <p align="right"><a href="newsreport.php" class="btn btn-thm btn-lg rounded"><i class="fa fa-newspaper-o"></i> Submit Your News</a></p>
					<div class="sidebar_search_widget">
						<div class="blog_search_widget">
							<div class="search_option_two">
											<div class="sidebar_select_options">
												<select class="selectpicker w100 show-tick" name="type">
													<option value="">Select Language</option>
													<option>Tamil</option>
													<option>English</option>
													<option>Telugu</option>
												</select>
											</div>
										</div>
							<div class="search_option_two">
											<div class="sidebar_select_options">
												<select class="selectpicker w100 show-tick" name="type">
													<option value="">Select Categories</option>
													<option>International News</option>
													<option>State News</option>
													<option>National News</option>
                    								<option>Astrology</option>
                    								<option>Birthday Wishes</option>
                    								<option>Kids Articles [Talents]</option>
                    								<option>Business News</option>
                    								<option>Educational News</option>
                    								<option>Events</option>
                    								<option>Industry News</option>
                    								<option>Social News</option>
                    								<option>Spiritual News</option>
												</select>
											</div>
										</div>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="To search type and hit enter">
							</div>
							<div class="search_option_button text-center mt25">
										    <button type="submit" name="searchlist" class="btn btn-block btn-thm mb15">Search</button>
										</div>
						</div>
					</div>
					<div class="terms_condition_widget" style="background:#ddd">
						<h4 class="title text-thm"><i class="fa fa-newspaper-o"></i> OTHER NEWS</h4><hr>
						<div class="widget_list">
							<ul class="list_details order_list list-style-type-bullet">
								<li><a href="#">International News</a></li>
								<li><a href="#">National News</a></li>
								<li><a href="#">State News</a></li>
								<li><a href="#">Astrology</a></li>
							</ul>
						</div>
					</div>
					<div class="sidebar_feature_listing">
						<h4 class="title">Birthday Wishes <a href="" style="float:right">View all</a></h4>
						<div class="media">
							<img class="align-self-start mr-3" src="images/blog/fls1.jpg" alt="fls1.jpg">
							<div class="media-body">
						    	<h5 class="mt-0 post_title">Great Business Tips in 2020</h5>
						    	<a href="#">January 7, 2021</a>
							</div>
						</div>
						<div class="media">
							<img class="align-self-start mr-3" src="images/blog/fls2.jpg" alt="fls2.jpg">
							<div class="media-body">
						    	<h5 class="mt-0 post_title">Excited News About Fashion.</h5>
						    	<a href="#">January 7, 2021</a>
							</div>
						</div>
						<div class="media mb0">
							<img class="align-self-start mr-3" src="images/blog/fls3.jpg" alt="fls3.jpg">
							<div class="media-body">
						    	<h5 class="mt-0 post_title">8 Amazing Tricks About Business</h5>
						    	<a href="#">January 7, 2021</a>
							</div>
						</div>
						<div class="media">
							<img class="align-self-start mr-3" src="images/blog/fls1.jpg" alt="fls1.jpg">
							<div class="media-body">
						    	<h5 class="mt-0 post_title">Great Business Tips in 2020</h5>
						    	<a href="#">January 7, 2021</a>
							</div>
						</div>
						<div class="media">
							<img class="align-self-start mr-3" src="images/blog/fls2.jpg" alt="fls2.jpg">
							<div class="media-body">
						    	<h5 class="mt-0 post_title">Excited News About Fashion.</h5>
						    	<a href="#">January 7, 2021</a>
							</div>
						</div>
						<div class="media mb0">
							<img class="align-self-start mr-3" src="images/blog/fls3.jpg" alt="fls3.jpg">
							<div class="media-body">
						    	<h5 class="mt-0 post_title">8 Amazing Tricks About Business</h5>
						    	<a href="#">January 7, 2021</a>
							</div>
						</div>
					</div>
					<!--div class="blog_tag_widget">
						<h4 class="title">Tags</h4>
						<ul class="tag_list">
							<li class="list-inline-item"><a href="#">Business Directory</a></li>
							<li class="list-inline-item"><a href="#">Offers</a></li>
							<li class="list-inline-item"><a href="#">News</a></li>
							<li class="list-inline-item"><a href="#">Bus</a></li>
							<li class="list-inline-item"><a href="#">Train</a></li>
							<li class="list-inline-item"><a href="#">Govt Office & Officers</a></li>
							<li class="list-inline-item"><a href="#">Temples</a></li>
							<li class="list-inline-item"><a href="#">Articles</a></li>
						</ul>
					</div-->
				</div>
			</div>
		</div>
	</section>
	<img src="images/background/inner-pagebg3.jpg" width="100%">
<?php include("footer.php");?>