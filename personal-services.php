<?php include("header.php");?>

<!-- Listing Grid View -->
<section class="our-listing bgc-f4 pb30-991">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="listing_sidebar dn db-lg">
					<div class="sidebar_content_details style3">
						<!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
						<div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
							<div class="sidebar_advanced_search_widget">									
								<br><h4 class="title">JPSR Services</h4><hr>
								<ul class="list_details order_list list-style-type-bullet">
									<li><a href="#">Home Services</a></li>
									<li><a href="#">Business Services</a></li>
									<li><a href="#">Property Management Services</a></li>
									<li><a href="#">Other Personal Services</a></li>
								</ul>
								<br><h4 class="text-thm">About JPSR Enterprisess</h4><hr>
								<video width="100%" height="240" controls>
									<source src="download.mp4" type="video/mp4">
								</video>
								<br><h4 class="text-thm">ABCD<br>(AnyBody Cand Do)</h4><hr>
								<video width="100%" height="240" controls>
									<source src="download.mp4" type="video/mp4">
								</video>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb_content style2 mb0-991">
					<h1 class="breadcrumb_title text-thm">JPSR Services</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item">A to Z Services</li>
						<li class="breadcrumb-item active" aria-current="page">Name it! We do it!</li>
					</ol>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="dn db-lg mt30 mb0 tac-767">
					<div id="main2">
						<span id="open2" class="fa fa-filter filter_open_btn style2"> Service Category</span>
					</div>
				</div>
			</div>
		</div>
		<img src="images/background/inner-pagebg3.jpg" width="100%">
		<div class="row">
			<div class="col-xl-3">
				<div class="sidebar_listing_grid1 dn-lg">
					<div class="sidebar_listing_list style3">
						<div class="sidebar_advanced_search_widget">
							<br><h4 class="title">JPSR Services</h4><hr>
							<ul class="list_details order_list list-style-type-bullet">
								<li><a href="#">Home Services</a></li>
								<li><a href="#">Business Services</a></li>
								<li><a href="#">Property Management Services</a></li>
								<li><a href="#">Other Personal Services</a></li>
							</ul>
							<br><h4 class="text-thm">About JPSR Enterprises</h4><hr>
							<video width="100%" controls>
								<source src="download.mp4" type="video/mp4">
								</video>
								<h4 align="center" class="text-danger"><br><br>ABCD<br>(AnyBody Can Do)</h4><hr>
								<video width="100%" height="240" controls>
									<source src="download.mp4" type="video/mp4">
								</video>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9" style="background:#fff"><br>
					<div class="container">
					<div class="col-xl-12">
					<form action="add.php" method="post" enctype="multipart/form-data" autocomplete="off">
										<div class="row">
											<input type="text" name="category" hidden value="personal">
											<?php include("jpsr-services-form.php");?>
											<div class="col-lg-6">
												<div class="my_profile_setting_input ui_kit_select_search form-group">
													<label>Required Services <span class="text-danger">*</span></label>
													<select class="selectpicker" name="service" data-live-search="true" data-width="100%">
														<option data-tokens="">Select Services</option>
														<option value="Doctor Appointment">Doctor Appointment</option>
														<option value="Medical Lab Test">Medical Lab Test</option>
														<option value="Pan">Pan</option>
														<option value="Aadhaar">Aadhaar</option>
														<option value="Passport">Passport</option>
														<option value="Voters ID">Voters ID</option>
														<option value="License">License</option>
														<option value="Income Tax">Income Tax</option>
														<option value="Emergency Service">Emergency Service</option>
														<option value="House Warming (A - Z)">House Warming (A - Z)</option>
														<option value="Catering Service">Catering Service</option>
														<option value="Birthday Party">Birthday Party</option>
														<option value="Marriage">Marriage</option>
														<option value="Others">Others</option>
													</select>
												</div>
											</div>
											<?php include("jpsr-services-form-bottom.php");?>
											<div class="col-lg-12" align="right">
												<button type="submit" name="submitjpsrservices" class="btn btn-thm listing_save_btn mt30" href="#"><i class="fa fa-sign-in"></i> Submit</button>
											</div>
										</div>
									</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include("footer.php");?>