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
				<div class="col-lg-12">
					<div class="breadcrumb_content style2">
						<h2 class="breadcrumb_title text-thm"><i class="fa fa-briefcase"></i> Register your Ad</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="my_dashboard_review">
					<form action="add.php" method="post" enctype="multipart/form-data" autocomplete="off">
					<?php
											if($username == '')
											{
											?>
											<a data-toggle="modal" data-target=".bd-example-modal-lg">
											<?php
											}
											?>
						<div class="row">
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label>Business Name <span class="text-danger">*</span></label>
							    	<input type="text" required class="form-control" name="name" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label>Proprietor (or) Authorized person name <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" value="<?php if(isset($username)){ echo $names; }?>" required name="proprietor" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label>Contact Number <span class="text-danger">*</span></label>
							    	<input type="number" maxlength="10" class="form-control" value="<?php if(isset($username)){ echo $username; }?>" readonly required name="contact" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label>Email ID (Optional)</label>
							    	<input type="email" class="form-control" name="email" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-8">
								<div class="my_profile_setting_input form-group">
							    	<label>Address Line <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" required name="address" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label>Area <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" required name="area" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>State <span class="text-danger">*</span></label>
									<select class="selectpicker" id="state" required name="state" data-live-search="true" data-width="100%">
									<option disabled="disabled">Select State</option>
									<option selected="true" value="Tamil Nadu">Tamil Nadu</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>City <span class="text-danger">*</span></label>
									<select class="form-control" id="city" required name="city">
									<option disabled="disabled">Select city</option>
									<option selected="true">Krishnagiri</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label>Pincode <span class="text-danger">*</span></label>
							    	<input type="number" maxlength="6" class="form-control" name="pincode" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label>Landmark <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="landmark" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Select Ad Page <span class="text-danger">*</span></label>
									<select class="selectpicker" data-live-search="true" name="adpage" required data-width="100%">
										<option data-tokens="">Select Ad Page</option>
										<option>Home Page</option>
										<option>News Page</option>
										<option>Business Directory Page</option>
										<option>JPSR Services Page</option>
									</select>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Select Ad Position <span class="text-danger">*</span></label>
									<select class="selectpicker" data-live-search="true" name="adposition" required data-width="100%">
										<option data-tokens="">Select</option>
									</select>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Select Ad Category <span class="text-danger">*</span></label>
									<select class="selectpicker" data-live-search="true" name="adcategory" required data-width="100%">
										<option data-tokens="">Select</option>
									</select>
								</div>
							</div>
							<div class="col-lg-3" align="center">
								<h5>Ad Image <span class="text-danger">*</span></h5>
							  	<div class="upload_file_input_add_remove">
							    	<span class="btn_upload"><input type="file" id="imag" title="JPSR Services" name="adimage" class="input-img"/><span class="flaticon-upload"></span></span>
							    	<img id="ImgPreview" src="images/resource/upload-img.png" class="preview1" alt="" />
							    	<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
							  	</div>
								<small>Maximum Image file size: 1mb.</small>
							</div>
							</div>
							</div>
											<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-9" align="right"><br>
						<div class="g-recaptcha wpcf7-form-control" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu"></div>
					</div>
							<div class="col-lg-3">
							<button type="submit" class="btn btn-thm listing_save_btn mt30" name="submitad"><i class="fa fa-sign-in"></i> Submit</button>
						</div>
						</div>
						</div>
						<?php
						if($username == '')
						{
						?>
					</a>
					<?php
					}
				?>
				</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include("footer.php");?>