<?php
	date_default_timezone_set("Asia/Kolkata");
	include("header.php");
	$title=$_GET['title'];
	
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
	<section class="blog_post_container pb80">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
					
					<?php
					if($_GET['title'] !='')
					{
				$query1 = mysqli_query($con, "select * from newsreport where title = '$title'");
					while($row=mysqli_fetch_array($query1))
					{ ?>
				<div class="col-lg-6">
							<div class="for_blog feat_property">
								<div class="thumb">
									<img class="img-whp" src="uploads/<?php echo $row["newsimage"]; ?>" alt="1.jpg">
									<div class="tag bgc-thm"><a class="text-white" href="#"><?php echo $row["title"]; ?></a></div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="bp_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="fa fa-newspaper-o mr10"></span> <?php echo $row["category"]; ?></a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-date mr10"></span> <?php echo $row["date"]; ?></a></li>
											</ul>
										</div>
										<h4><?php echo $row["newsdescription"]; ?></h4>
										<div class="bp_meta">
										    <?php
										    $contact = $row["contact"];
										    $query1 = mysqli_query($con, "select name from user where contact = '$contact';");
	                                        $row1=mysqli_fetch_array($query1);
										    ?>
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-avatar mr10"></span>News Report by: <?php echo $row1["name"]; ?></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }}
					else if($_GET['title'] =='')
					{
				$query = mysqli_query($con, "select * from newsreport;");
	$count=mysqli_num_rows($query);
					while($row=mysqli_fetch_array($query))
					{
					?>
						<div class="col-lg-6">
							<div class="for_blog feat_property">
								<div class="thumb">
									<img class="img-whp" src="uploads/<?php echo $row["newsimage"]; ?>" alt="1.jpg">
									<div class="tag bgc-thm"><a class="text-white" href="#"><?php echo $row["title"]; ?></a></div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="bp_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="fa fa-newspaper-o mr10"></span> <?php echo $row["category"]; ?></a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-date mr10"></span> <?php echo $row["date"]; ?></a></li>
											</ul>
										</div>
										<h4><?php echo $row["newsdescription"]; ?></h4>
										<div class="bp_meta">
										    <?php
										    $contact = $row["contact"];
										    $query1 = mysqli_query($con, "select name from user where contact = '$contact';");
	                                        $row1=mysqli_fetch_array($query1);
										    ?>
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-avatar mr10"></span>News Report by: <?php echo $row1["name"]; ?></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					}
					?>
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
					<div class="terms_condition_widget">
						<h4 class="title">NEWS</h4>
						<div class="widget_list">
							<ul class="list_details order_list list-style-type-bullet">
								<li><a href="#">International News</a></li>
								<li><a href="#">National News</a></li>
								<li><a href="#">State News</a></li>
								<li><a href="#">Astrology</a></li>
								<li><a href="#">Birthday Wishes</a></li>
								<li><a href="#">Kids Articles [Talents]</a></li>
							</ul>
						</div>
						<hr><h4 class="title">HOSUR NEWS</h4>
						<div class="widget_list">
							<ul class="list_details order_list list-style-type-bullet">
								<li><a href="#">General News</a></li>
								<li><a href="#">Business News</a></li>
								<li><a href="#">Educational News</a></li>
								<li><a href="#">Events</a></li>
								<li><a href="#">Industry News</a></li>
								<li><a href="#">Social News</a></li>
								<li><a href="#">Spiritual News</a></li>
								<li><a href="#">Property</a></li>
								<li><a href="#">Jobs</a></li>
							</ul>
						</div>
					</div>
					<!--div class="sidebar_feature_listing">
						<h4 class="title">Top Article</h4>
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
					<div class="blog_tag_widget">
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