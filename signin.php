<?php
	include("header.php");
?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord bgc-f4 ovh">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mb10">
				<div class="breadcrumb_content style2 mb25">
					<h2 class="breadcrumb_title text-thm"><i class="fa fa-user-plus"></i> New Registeration</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<form action="add.php" method="post" autocomplete="off">
					<div class="my_dashboard_review">
						<div class="row">
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Name <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" required name="name" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Contact Number <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" required name="contact" id="contact" placeholder="Enter the details here" onBlur="checkAvailability()">
									<span id="contact-availability-status"></span>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Aadhar Number <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" required name="aadhar" id="aadhar" maxlength="12" pattern="[0-9]{12}" placeholder="Enter the details here" onBlur="checkAvailability()">
									<span id="contact-availability-status"></span>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Email ID (Optional)</label>
							    	<input type="text" class="form-control" name="email" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Ward No <span class="text-danger">*</span></label>
									<select class="form-control" id="ward" name="ward" required>
										<option selected="true" disabled="disabled">Select Ward</option>
										<option value="1">1</option>
									</select>
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
							    	<label>City <span class="text-danger">*</span></label>
									<select class="form-control" id="city" name="city" required>
										<option selected="true" disabled="disabled">Select city</option>
										<option value="Hosur">Hosur</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Occupation <span class="text-danger">*</span></label>
									<select class="selectpicker" data-live-search="true" name="occupation" required data-width="100%">
										<option data-tokens="">Select Occupation</option>
										<option>Student</option>
										<option>Home Maker</option>
										<option>Salaried</option>
										<option>Self Employed</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
												<div class="col-lg-5"><br>
										<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="customCheck1">
						<label class="custom-control-label" for="customCheck1"> I have read and accept the terms and conditions</label>
					</div>
					</div>
							<div class="col-lg-4" align="right">
								<br>
								<div class="g-recaptcha wpcf7-form-control" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu"></div>
							</div>
							<div class="col-lg-3">
								<button class="btn btn-thm listing_save_btn mt30" type="submit" name="submituser"><i class="fa fa-sign-in"></i> Submit</button>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php include("footer.php");?>