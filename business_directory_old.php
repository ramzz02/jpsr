<?php
	include("header.php");
	$category=$_GET['category'];
	
	
?>
	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb style2">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content style2 mb0-991">
						<h1 class="breadcrumb_title text-thm">Business Directory</h1>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item active" aria-current="page">Know your Neighbors</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<p align="right"><a href="register.php" class="btn btn-thm btn-lg rounded"><i class="fa fa-briefcase"></i> Add your Business</a></p>
	<!-- Listing Grid View -->
	<section class="our-listing bgc-f4">
		<div class="container">
			<div class="row">
			    <div class="col-lg-12">
				<div class="dn db-lg mt30 mb0 tac-767">
					<div id="main2">
						<span id="open2" class="fa filter_open_btn style2"><i class="fa fa-filter"></i> Service Category</span>
					</div>
				</div>
			</div>
				<div class="col-lg-12">
					<div class="listing_sidebar dn db-lg">
						<div class="sidebar_content_details style3">
							<div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
								<div class="sidebar_advanced_search_widget">
									<h4 class="mb25">Advanced Search <a class="filter_closed_btn float-right" href="#"><small>Hide Filter</small> <span class="flaticon-close"></span></a></h4>
									<form class="bgc-white bgct-767 pl30 pt10 pl0-767" method="POST" action="">
									<ul class="sasw_list style2 mb0">
										<li class="search_area">
										    <div class="form-group">
										    	<input type="text" class="form-control" name="keyw" placeholder="What are you looking for">
										    </div>
										</li>
										<li>
											<div class="search_option_two">
												<div class="sidebar_select_options">
													<select class="selectpicker w100 show-tick" name="type">
														<option =""> Select Categories</option>
                                                        <?php include('list.php'); ?>
													</select>
												</div>
											</div>
										</li>
										<li>
											<div class="search_option_button text-center mt25">
											    <button type="submit" name="searchlist" class="btn btn-block btn-thm mb15">Search</button>
											</div>
										</li>
									</ul>
									</form>
									<br><h4 class="title">Business Directory</h4><hr>
							<ul class="list_details order_list list-style-type-bullet">
								<li><a href="#">Business Directory</a></li>
								<li><a href="#">Bus Timings</a></li>
								<li><a href="http://www.tneb.in/">Electricity Board (TNEB)</a></li>
								<li><a href="#">Essential & Emergency Services</a></li>
								<li><a href="#">Government Office & Officers Number</a></li>
								<li><a href="https://www.tnurbantree.tn.gov.in/hosur/">Municipal Corporation</a></li>
								<li><a href="#">Temples</a></li>
								<li><a href="#">Train Timings</a></li>
								<li><a href="#">Govt Links</a>
									<ul>
									<li><a href="https://uidai.gov.in/my-aadhaar/get-aadhaar.html">Aadhaar</a></li>
									<li><a href="https://applypanindia.com/">Pancard</a></li>
									<li><a href="https://org2.passportindia.gov.in/">Passport</a></li>
									<li><a href="https://www.incometaxindiaefiling.gov.in/">Income Tax</a></li>
									<li><a href="https://www.tnpds.gov.in/">Ration Card</a></li>
									<li><a href="https://www.nvsp.in/">Voters ID</a></li>
									<li><a href="https://tnsta.gov.in/">RTO</a></li>
									</ul>
									</li>
							</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4">
					<div class="sidebar_listing_grid1 dn-lg">
						<div class="sidebar_listing_list style3">
							<div class="sidebar_advanced_search_widget">
							    <form class="bgc-white bgct-767 pl30 pt10 pl0-767" method="POST" action="">
								<ul class="sasw_list mb0">
									<li class="search_area">
									    <div class="form-group">
									    	<input type="text" class="form-control" name="keyw" placeholder="What are you looking for">
									    </div>
									</li>
									<li>
										<div class="search_option_two">
											<div class="sidebar_select_options">
												<select class="selectpicker w100 show-tick" name="type">
													<option value="">All Categories</option>
													<?php include('list.php'); ?>
												</select>
											</div>
										</div>
									</li>
										<div class="search_option_button text-center mt25">
										    <button type="submit" name="searchlist" class="btn btn-block btn-thm mb15">Search</button>
										</div>
									</li>
								</ul>
								</form>
								<br><h4 class="title">Business Directory</h4><hr>
							<ul class="list_details order_list list-style-type-bullet">
								<li><a href="#">Business Directory</a></li>
								<li><a href="#">Bus Timings</a></li>
								<li><a href="http://www.tneb.in/">Electricity Board (TNEB)</a></li>
								<li><a href="#">Essential & Emergency Services</a></li>
								<li><a href="#">Government Office & Officers Number</a></li>
								<li><a href="https://www.tnurbantree.tn.gov.in/hosur/">Municipal Corporation</a></li>
								<li><a href="#">Temples</a></li>
								<li><a href="#">Train Timings</a></li>
								<li><a href="#">Govt Links</a>
									<ul>
									<li><a href="https://uidai.gov.in/my-aadhaar/get-aadhaar.html">Aadhaar</a></li>
									<li><a href="https://applypanindia.com/">Pancard</a></li>
									<li><a href="https://org2.passportindia.gov.in/">Passport</a></li>
									<li><a href="https://www.incometaxindiaefiling.gov.in/">Income Tax</a></li>
									<li><a href="https://www.tnpds.gov.in/">Ration Card</a></li>
									<li><a href="https://www.nvsp.in/">Voters ID</a></li>
									<li><a href="https://tnsta.gov.in/">RTO</a></li>
									</ul>
									</li>
							</ul>
							</div>
						</div>
					</div>
				</div>
				<?php
					if(isset($_POST['searchlist']))
                	{
                    	$search=$_POST['keyw'];
                    	$search1=$_POST['type'];
                    	$query=mysqli_query($con,"SELECT * FROM business where name='$search' or category='$search1';");
                	}
                	elseif($busid != '')
					{
						$query = mysqli_query($con, "select * from business where id = '$busid'");
					}
					else
					{
						$query = mysqli_query($con, "select * from business;");
					}
					$count=mysqli_num_rows($query);
				?>
				<div class="col-xl-8">
					<div class="row">
					<?php
					if($_GET['category'] !='')
					{
				$query1 = mysqli_query($con, "select * from business where category = '$category'");
					while($row=mysqli_fetch_array($query1))
					{
					?>
						<a href="business.php?id=<?php echo $row['id']; ?>"><div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<img class="img-whp" src="uploads/<?php echo $row["logo"]; ?>" alt="ll1.jpg">
								</div>
								<div class="details">
									<div class="tc_content">
										<h4><?php echo $row["name"]; ?></h4>
										<p><span class="fa fa-address-card pr5"></span> <?php echo $row["proprietor"]; ?></p>
										<ul class="prop_details mb0 mt15">
											<li class="list-inline-item"><a href="business.php?id=<?php echo $row['id']; ?>"><span class="flaticon-phone pr5"></span> <?php echo $row["contact"]; ?></a></li>
											<li class="list-inline-item"><a href="business.php?id=<?php echo $row['id']; ?>"><span class="flaticon-pin pr5"></span> <?php echo $row["area"]; ?></a></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="business.php?id=<?php echo $row['id']; ?>"><span class="fa fa-edit pr5"></span> <?php echo $row["description"]; ?></a></li>
										</ul>
										<ul class="fp_meta float-right mb0">
											<li class="list-inline-item"><a href="business.php?id=<?php echo $row['id']; ?>"><span class="flaticon-zoom"></span></a></li>
											<li class="list-inline-item"><a class="icon" href="business.php?id=<?php echo $row['id']; ?>"><span class="flaticon-love"></span></a></li>
										</ul>
									</div>
								</div>
							
						</div>
						</div></a>
						<?php
					}
}
					else
					{
					?>
					<div class="col-md-6 col-lg-4">
							<a href="business-directory.php?category=1"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/1.jpeg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Plumber</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="business-directory.php?category=1"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Electrician</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="business-directory.php?category=1"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/3.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Carpenter</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="business-directory.php?category=1"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/4.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">A/C Mechanic</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="business-directory.php?category=1"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/5.jpeg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Cleaning Service</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="business-directory.php?category=1"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/6.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Painter</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="business-directory.php?category=1"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/7.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Cab Service</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="business-directory.php?category=1"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/8.jpg" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Pest Control</a></li>
										</ul>
									</div>
								</div></a>
							</div>
						</div>
						<div class="col-md-6 col-lg-4">
							<a href="business-directory.php?category=1"><div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/9.png" alt="lg1.jpg">
								</div>
								<div class="details">
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/icons/icon3.svg" alt="icon3.svg"></a></li>
											<li class="list-inline-item"><a href="#">Groceries</a></li>
										</ul>
									</div>
								</div>
							</div></a>
						</div>
						<div class="col-lg-12">
					<div class="mbp_pagination mt10">
						<div class="new_line_pagination text-center">
							<p>Showing 36 of 497 Results</p>
							<div class="pagination_line"></div>
							<a class="pagi_btn text-thm" href="#">Show More</a>
						</div>
					</div>
				</div>
						<?php
					}
					?>
						<p><br><img src="images/background/inner-pagebg3.jpg" width="100%"></p>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include("footer.php");?>