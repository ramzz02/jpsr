<?php include("header.php");?>
	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f4 ovh">
		<div class="container mt80">
			<div class="row">
				<div class="col-lg-12 mb10">
					<div class="breadcrumb_content style2 mb25">
						<h2 class="breadcrumb_title text-thm"><i class="fa fa-street-view"></i> Hosur Transformation</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="my_dashboard_review">
						<div class="row">
							<div class="col-lg-6">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Title <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" id="listingPlace" required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Area (Optional)</label>
										<input type="text" class="form-control" name="area" placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-2">
									<div class="my_profile_setting_input form-group">
										<label>Ward No (Optional)</label>
										<input type="number" class="form-control" name="ward" placeholder="Enter here">
									</div>
								</div>
							<div class="col-lg-2">
								<h5>Image <span class="text-danger">(*)</span></h5>
							  	<div class="upload_file_input_add_remove">
							    	<span class="btn_upload"><input type="file" id="imag" title="" class="input-img"/><span class="flaticon-upload"></span></span>
							    	<img id="ImgPreview" src="images/resource/upload-img.png" class="preview1" alt="" />
							    	<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
							  	</div>
								<small>Maximum file size: 1000kb.</small>
							</div>
							<div class="col-lg-10">
								<div class="my_profile_setting_textarea">
								    <label for="propertyDescription">Description <span class="text-danger">*</span></label>
								    <textarea class="form-control" id="propertyDescription" required rows="5"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb80">			
							<div class="col-lg-9" align="right">
								<br>
								<div class="g-recaptcha wpcf7-form-control" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu"></div>
							</div>
							<div class="col-lg-3" align="right">
								<button class="btn btn-thm listing_save_btn mt30" type="submit" name=""><i class="fa fa-sign-in"></i> Submit</button>
							</div>
						</div>
				</div>
			</div>
		</div>
	</section>
<?php include("footer.php");?>