<?php include("header.php");?>
	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f4 ovh">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="dashboard_navigationbar dn db-992">
						<div class="dropdown">
							<button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
							<ul id="myDropdown" class="dropdown-content">
								<li><a href="page-my-dashboard.html"><span class="flaticon-web-page"></span> Dashboard</a></li>
								<li><a href="page-profile.html"><span class="flaticon-avatar"></span> My Profile</a></li>
								<li><a href="page-my-listing.html"><span class="flaticon-list"></span> My Listings</a></li>
								<li><a href="page-my-bookmark.html"><span class="flaticon-love"></span> Bookmarks</a></li>
								<li><a href="page-message.html"><span class="flaticon-chat"></span> Message</a></li>
								<li><a href="page-my-review.html"><span class="flaticon-note"></span> Reviews</a></li>
								<li class="active"><a href="page-add-new-listing.html"><span class="flaticon-web-page"></span> Add New Listing</a></li>
								<li><a href="page-my-logout.html"><span class="flaticon-logout"></span> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-12 mb10">
					<div class="breadcrumb_content style2 mb25">
						<h2 class="breadcrumb_title text-thm"><i class="fa fa-image"></i> Submit your Profile</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
				<?php
					if($username == '')
					{
					?>
					<a data-toggle="modal" data-target=".bd-example-modal-lg">
						<?php
						}
					?>
				<form action="add.php" method="post" enctype="multipart/form-data" autocomplete="off">
					<div class="my_dashboard_review">
						<div class="row">
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Name <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" id="name" value="<?php if(isset($username)){ echo $names; }?>" name="name" readonly placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Contact <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="contact" id="contact" value="<?php	if(isset($username)){ echo $username; }?>" readonly required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Position <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="position" id="position" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Vaccancies<span class="text-danger">*</span></label>
							    	<input type="number" class="form-control" name="van" id="van" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Qualification <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="qualification" id="qualification" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Experience<span class="text-danger">*</span></label>
							    	<input type="number" class="form-control" name="experience" id="experience" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Location <span class="text-danger">*</span></label>
							    	<select  name="loc" id="loc" class="form-control js-searchBox">
									<option value="">Select Location</option>
														<option value="Hosur">Hosur</option>
													</select>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Type<span class="text-danger">*</span></label>
							    	<select name="type" id="type" class="form-control js-searchBox">
									<option value="">Select Type</option>
														<option value="Full Time">Full Time</option>
														<option value="Part Time">Part Time</option>
														<option value="Work From Home">Work From Home</option>
														<option value="Others">Others</option>
											    	</select>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_textarea">
								    <label for="propertyDescription">Company<span class="text-danger">*</span></label>
								    <textarea class="form-control" name="company" id="company" required rows="3"></textarea>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_textarea">
								    <label for="propertyDescription">Designation<span class="text-danger">*</span></label>
								   <select name="designation" id="designation" class="form-control js-searchBox">
								   <option value="">Select Designation</option>
														<option value="Sales Executive">Sales Executive</option>
														<option value="Driver">Driver</option>
														<option value="Telecaller">Telecaller</option>
														<option value="Marketing">Marketing</option>
													</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">			
						<div class="col-lg-9" align="right">
								<br>
								<div class="g-recaptcha wpcf7-form-control" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu"></div>
							</div>
							<div class="col-lg-3" align="right">
								<button class="btn btn-thm listing_save_btn mt30" type="submit" name="submitEmployee" id="submitEmployee"><i class="fa fa-sign-in"></i> Submit</button>
							</div>
						</div>
					</form>
					<?php
						if($username == '')
						{
						?>
					</a>
					<?php
					}
				?>
				</div>
			</div>
		</div>
	</section>
<?php include("footer.php");?>