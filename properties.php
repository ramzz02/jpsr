<?php include("header.php");
	if(isset($_POST['searchProperty'])){
	$search=$_POST['lang'];
	$search1=$_POST['type'];
	$search2=$_POST['loc'];
	$query1=mysqli_query($con,"SELECT * FROM property where houseType='$search' and bhk='$search1' and location='$search2' ;");
			 $count1=mysqli_num_rows($query1);
	}
	else
	{
	    	$query1=mysqli_query($con,"SELECT * FROM property;");
			 $count1=mysqli_num_rows($query1);
	}
	?>

	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb style2">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">Properties</h2>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item active" aria-current="page">Available Properties</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Listing Search Option -->
	<section class="bgc-f4 pt0-767">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="home_adv_srch_opt text-center">
						<div class="wrapper">
							<div class="home_adv_srch_form listing_page_v3">
								<form class="bgc-white bgct-767 pl30 pt10 pl0-767" method="POST" action="">
									<div class="form-row align-items-center">
									    <div class="col-auto home_form_input mb20-xsd mr15 mr0-lg">
									      	<div class="input-group style1 mb-2 mb0-767 pl10 pl0-lg">
									        	<div class="input-group-prepend">
									        		<div class="input-group-text pl0 pb0-767">Looking for</div>
									        	</div>
												<div class="select-wrap style1-dropdown">
											    	<select name="lang" id="lang" class="form-control js-searchBox">
													<option value="">Select Option</option>
														<option value="Rented">Rented</option>
														<option value="Lease">Lease</option>
														<option value="Sale">Sale</option>
											    	</select>
											    </div>
									      	</div>
									    </div>
									    <div class="col-auto home_form_input mr15 mr0-lg mb20-767">
									      	<div class="input-group style2 mb-2 mb0-767 pl10 pl0-lg">
									        	<div class="input-group-prepend">
									        		<div class="input-group-text pb0-767">Type</div>
									        	</div>
												<div class="select-wrap style2-dropdown">
													<select class="selectpicker" id="type" name="type">
													<option value="">Select BHK </option>
														<option value="1 BHK">1 BHK</option>
														<option value="2 BHK">2 BHK</option>
														<option value="3 BHK">3 BHK</option>
														<option value="4 BHK">4 BHK</option>
														<option value="5 BHK">5 BHK</option>
														<option value="Others">Others</option>
													</select>
											    </div>
									      	</div>
									    </div>
									    <div class="col-auto home_form_input mr15 mr0-lg">
									      	<div class="input-group style2 mb-2 mb0-767 pl10 pl0-lg">
									        	<div class="input-group-prepend">
									        		<div class="input-group-text pb0-767">Location</div>
									        	</div>
												<div class="select-wrap style2-dropdown">
													<select class="selectpicker" id="loc" name="loc">
													<option value="">Select Location</option>
														<option value="Hosur">Hosur</option>
													</select>
											    </div>
									      	</div>
									    </div>
									    <div class="col-auto home_form_input2 pl10 pl0-lg">
									    	<button type="submit" class="btn search-btn mb-2" id="searchProperty" name="searchProperty"><span class="flaticon-loupe"></span></button>
									    </div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<p align="right"><a href="house.php" class="btn btn-thm btn-lg rounded"><i class="fa fa-institution"></i> Submit Your Property</a></p>
	<!-- Listing Grid View -->
	<section class="our-listing pb30-991">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="listing_sidebar dn db-lg">
						<div class="sidebar_content_details style3">
							<!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
							<div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
								<div class="sidebar_advanced_search_widget">
									<h4 class="mb25">Advanced Search <a class="filter_closed_btn float-right" href="#"><small>Hide Filter</small> <span class="flaticon-close"></span></a></h4>
									<ul class="sasw_list style2 mb0">
										<li class="search_area">
										    <div class="form-group">
										    	<input type="text" class="form-control" id="exampleInputName1" placeholder="What are you looking for">
										    </div>
										</li>
										<li>
											<div class="search_option_two">
												<div class="sidebar_select_options">
													<select class="selectpicker w100 show-tick">
														<option value="">All Categories</option>
														<option value="Automotive">Automotive</option>
														<option value="Beautu&Spa">Beautu & Spa</option>
														<option value="Hotels">Hotels</option>
														<option value="Istanbul">Outdoor Activities</option>
														<option value="Restaurant">Restaurant</option>
														<option value="Shopping">Shopping</option>
													</select>
												</div>
											</div>
										</li>
										<li>
											<div class="search_option_two">
												<div class="sidebar_select_options">
													<select class="selectpicker w100 show-tick">
														<option value="Location">Location</option>
														<option value="NewYork">New York</option>
														<option value="London">London</option>
														<option value="Paris">Paris</option>
														<option value="Istanbul">Istanbul</option>
														<option value="LogAngeles">Log Angeles</option>
													</select>
												</div>
											</div>
										</li>
										<li>
											<div class="sidebar_range_slider mb30 mt70">
												<input class="range-example-km mb20" value="50" type="text">
												<P class="mt20">Radius around selected destination</P>
											</div>
										</li>
										<li>
											<div class="search_option_button text-center mt25">
											    <button type="submit" class="btn btn-block btn-thm mb15">Search</button>
											    <a class="tdu fz14" href="#">Reset Filter</a>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="dn db-lg mt30 mb0 tac-767">
						<div id="main2">
							<span id="open2" class="fa fa-filter filter_open_btn style2"> Show Filter</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
					<?php
					while($row=mysqli_fetch_array($query1))
					{
					?>
					<div class="col-md-6 col-lg-4">
							<div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="uploads/<?php echo $row['images'];?>" alt="lg3.jpg">
								</div>
								<div class="details">
									<div class="tc_content">
										<h4>Name:<?php echo $row['name'];?></h4>
										<h5>Rent:<?php echo $row['rent'];?></h5>
										<p>More Info:<?php echo $row['info'];?></p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-phone pr5"></span> <?php echo $row['contact'];?></a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-pin pr5"></span> <?php echo $row['location'];?></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>
						<!--div class="col-md-6 col-lg-4">
							<div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/listing/lg3.jpg" alt="lg3.jpg">
								</div>
								<div class="details">
									<div class="tc_content">
										<h4>Sales Executive</h4>
										<p>sales executive sample job description to be entered here</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-phone pr5"></span> +91-12345-67890</a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-pin pr5"></span> Hosur</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div-->
					</div>
				</div>
				<div class="col-lg-12">
					<div class="mbp_pagination mt10">
						<div class="new_line_pagination text-center">
							<p>Showing 0 of 0 Results</p>
							<div class="pagination_line"></div>
							<a class="pagi_btn text-thm" href="#">Show More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include("footer.php");?>