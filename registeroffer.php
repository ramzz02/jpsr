<?php include("header.php");?>
	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f4 ovh bg-img5">
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
						<h2 class="breadcrumb_title text-thm"><i class="fa fa-briefcase"></i> Register your Offer</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
				<form action="add.php" method="post" enctype="multipart/form-data" autocomplete="off">
				<?php
											if($username == '')
											{
											?>
											<a data-toggle="modal" data-target=".bd-example-modal-lg">
											<?php
											}
											?>
					<div class="my_dashboard_review">
						<div class="row">
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Business Name <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="name" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Proprietor (or) Authorized person name <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" value="<?php if(isset($username)){ echo $names; }?>" name="proprietor" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Contact Number <span class="text-danger">*</span></label>
							    	<input type="number" maxlength="6" class="form-control" value="<?php if(isset($username)){ echo $username; }?>" readonly name="contact" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Email ID (Optional)</label>
							    	<input type="text" class="form-control" name="email" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-8">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Address Line <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="address" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Area <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="area" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>State <span class="text-danger">*</span></label>
									<select class="selectpicker" id="state" name="state" required data-live-search="true" data-width="100%">
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
							    	<label for="listingPlace">Pincode <span class="text-danger">*</span></label>
							    	<input type="number" maxlength="6" class="form-control" required name="pincode" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Landmark <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" required name="landmark" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Offer Category <span class="text-danger">*</span></label>
									<select class="selectpicker" data-live-search="true" name="offcategory" required data-width="100%">
										<option data-tokens="">Select Categories</option>
										<option>Textiles</option>
										<option>Jewellery</option>
										<option>Hotels & Restaurent</option>
										<option>Dept. Stores</option>
										<option>Bakery & Sweet Stalls</option>
										<option>Real Estates</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Offer Title <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="offtitle" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-3" align="center">
								<h5>Offer Image <span class="text-danger">*</span></h5>
							  	<div class="upload_file_input_add_remove">
							    	<span class="btn_upload"><input type="file" id="imag" title="Offer Image" name="offimage" required class="input-img"/><span class="flaticon-upload"></span></span>
							    	<img id="ImgPreview" src="images/resource/upload-img.png" class="preview1" alt="" />
							    	<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
							  	</div>
								<small>Maximum file size: 1000kb.</small>
							</div>
							<div class="col-lg-5">
								<div class="my_profile_setting_textarea">
								    <label for="propertyDescription">Offer Description <span class="text-danger">*</span></label>
								    <textarea class="form-control" id="propertyDescription" name="offdescription" rows="5"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="my_dashboard_review mt30">
						<div class="row">
							<div class="col-lg-12">
								<h4 class="mb30 text-primary">Offer Details</h4><hr>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Offer Amount(₹) <span class="text-danger">*</span></label>
							    	<input type="number" required class="form-control" name="offamount" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Offer Starts From <span class="text-danger">*</span></label>
							    	<input type="date" required class="form-control" name="offfrom">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Offer Ends on <span class="text-danger">*</span></label>
							    	<input type="date" required class="form-control" name="offto">
								</div>
							</div>
						</div>
					</div>
												<div class="col-lg-12">
					<div class="row">
					<div class="col-lg-9" align="right"><br>
						<div class="g-recaptcha wpcf7-form-control" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu"></div>
					</div>
					<div class="col-lg-3">
					<button type="submit" name="submitoffer" class="btn btn-thm listing_save_btn mt30"><i class="fa fa-sign-in"></i> Submit</button>
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
	</section>
<?php include("footer.php");?>