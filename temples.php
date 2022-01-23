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
						<h2 class="breadcrumb_title text-thm"><i class="fa fa-bank"></i> Temples</h2>
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
							    	<label for="listingPlace">Temple Name <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="temple" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Incharge (or) Authorized person name <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" value="<?php if(isset($username)){ echo $names; }?>" name="incharge" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Contact Number <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="contact" value="<?php	if(isset($username)){ echo $username; }?>" readonly required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-8">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Address Line <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="address" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Ward No (optional)</label>
									<select class="form-control" id="ward" required name="ward">
									<option selected="true" disabled="disabled">Select Ward</option>
									<option value="1">1</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Area (optional)</label>
									<select class="form-control" id="area" required name="area">
									<option selected="true" disabled="disabled">Select area</option>
									<option value="MG Road">MG Road</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Taluk <span class="text-danger">*</span></label>
									<select class="form-control" id="taluk" required name="taluk">
									<option selected="true" disabled="disabled">Select Location</option>
									<option value="Hosur">Hosur</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>City <span class="text-danger">*</span></label>
									<select class="form-control" id="city" required name="city">
									<option selected="true" disabled="disabled">Select Location</option>
									<option value="Hosur">Hosur</option>
									<option value="Krishnagiri">Krishnagiri</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>State (optional)</label>
									<select class="selectpicker" id="state" name="state" data-live-search="true" required data-width="100%">
									<option disabled="disabled">Select State</option>
									<option selected="true" value="Tamil Nadu">Tamil Nadu</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Pincode (optional)</label>
							    	<input type="number" maxlength="6" class="form-control" name="pincode" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Landmark  (optional)</label>
							    	<input type="text" class="form-control" name="landmark" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Alternate Contact (optional)</label>
							    	<input type="number" maxlength="10" class="form-control" name="altcontact" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Landline with STD Code (optional)</label>
							    	<input type="number" maxlength="11" class="form-control" name="landline" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Email ID (optional)</label>
							    	<input type="text" class="form-control" name="email" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Website (optional)</label>
							    	<input type="text" class="form-control" name="website" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-2">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Working Hours</label>
							    	<input type="time" class="form-control" name="workingfrom" required placeholder="Enter the details here">
									<label>from</label>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace"> <span class="text-danger">Morning (*)</span></label>
							    	<input type="time" class="form-control" name="workingto" required placeholder="Enter the details here">
									<label>to</label>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Working Hours</label>
							    	<input type="time" class="form-control" name="workingfrom" required placeholder="Enter the details here">
									<label>from</label>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace"> <span class="text-danger">Evening (*)</span></label>
							    	<input type="time" class="form-control" name="workingto" required placeholder="Enter the details here">
									<label>to</label>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="my_profile_setting_textarea">
								    <label for="propertyDescription">Temple Description <span class="text-danger">(*)</span></label>
								    <textarea class="form-control" name="templedescription" required rows="3"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="my_dashboard_review mt30">
						<div class="row">
							<div class="col-lg-12">
								<h4 class="mb30 text-thm">Media</h4>
							</div>
							<div class="col-lg-3">
								<h5>Temple Image <span class="text-danger">(*)</span></h5>
							  	<div class="upload_file_input_add_remove">
							    	<span class="btn_upload"><input type="file" id="imag" name="templeimage" required class="input-img"/><span class="flaticon-upload"></span></span>
							    	<img id="ImgPreview" src="images/resource/upload-img.png" class="preview1" alt="" />
							    	<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
							  	</div>
								<small>Maximum file size: 1000kb.</small>
							</div>
							<div class="col-lg-6">
									<h5>Gallery Images <span class="text-danger">(Pay & Use)</span></h5>
									<div class="upload_file_input_add_remove">
										<span class="btn_upload"><input type="file" id="imag1" required name="logo1" class="input-img"/><span class="flaticon-upload"></span></span>
										<img id="ImgPreview1" src="images/resource/upload-img.png" class="preview1" alt="" />
										<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
									</div>
									<div class="upload_file_input_add_remove">
										<span class="btn_upload"><input type="file" id="imag2" required name="logo2" class="input-img"/><span class="flaticon-upload"></span></span>
										<img id="ImgPreview2" src="images/resource/upload-img.png" class="preview1" alt="" />
										<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
									</div>
									<div class="upload_file_input_add_remove">
										<span class="btn_upload"><input type="file" id="imag3" required name="logo3" class="input-img"/><span class="flaticon-upload"></span></span>
										<img id="ImgPreview3" src="images/resource/upload-img.png" class="preview1" alt="" />
										<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
									</div>
									<div class="upload_file_input_add_remove">
										<span class="btn_upload"><input type="file" id="imag4" required name="logo4" class="input-img"/><span class="flaticon-upload"></span></span>
										<img id="ImgPreview4" src="images/resource/upload-img.png" class="preview1" alt="" />
										<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
									</div>
									<div class="upload_file_input_add_remove">
										<span class="btn_upload"><input type="file" id="imag5" required name="logo5" class="input-img"/><span class="flaticon-upload"></span></span>
										<img id="ImgPreview5" src="images/resource/upload-img.png" class="preview1" alt="" />
										<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
									</div>
									<small>Maximum file size: 1000kb.</small>
								</div>
							</div>
					</div>
				<div class="col-lg-12">
					<div class="row">
					<div class="col-lg-9" align="right">
								<br>
								<div class="g-recaptcha wpcf7-form-control" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu"></div>
							</div>
							<div class="col-lg-3">
					<button type="submit" name="submittemple" class="btn btn-thm listing_save_btn mt30" href="#"><i class="fa fa-sign-in"></i> Submit</button>
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