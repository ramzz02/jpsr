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
						<h2 class="breadcrumb_title text-thm"><i class="fa fa-newspaper-o"></i> News</h2>
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
							<div class="col-lg-#">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>News Language <span class="text-danger">*</span></label>
									<select class="selectpicker" required name="language" data-live-search="true" data-width="100%">
									<option selected="true" disabled="disabled">Select Language</option>
									<option>Tamil</option>
									<option>English</option>
									</select>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>News Category <span class="text-danger">*</span></label>
									<select class="selectpicker" data-live-search="true" name="category" required data-width="100%">
										<option data-tokens="">Select Categories</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Title <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="title" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Contact Number <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="contact" value="<?php	if(isset($username)){ echo $username; }?>" readonly required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-2">
								<h5>News Image <span class="text-danger">(*)</span></h5>
							  	<div class="upload_file_input_add_remove">
							    	<span class="btn_upload"><input type="file" id="imag" name="newsimage" required class="input-img"/><span class="flaticon-upload"></span></span>
							    	<img id="ImgPreview" src="images/resource/upload-img.png" class="preview1" alt="" />
							    	<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
							  	</div>
								<small>Maximum file size: 1000kb.</small>
							</div>
							<div class="col-lg-10">
								<div class="my_profile_setting_textarea">
								    <label for="propertyDescription">Description <span class="text-danger">*</span></label>
								    <textarea class="form-control" name="newsdescription" required rows="5"></textarea>
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
								<button class="btn btn-thm listing_save_btn mt30" type="submit" name="submitnewsreport"><i class="fa fa-sign-in"></i> Submit</button>
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