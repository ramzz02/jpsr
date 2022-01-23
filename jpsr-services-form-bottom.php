<div class="col-lg-12">
	<div class="my_profile_setting_input form-group">
		<label for="listingPlace">Address Line <span class="text-danger">*</span></label>
		<input type="text" class="form-control" required name="address" placeholder="Enter the details here">
	</div>
</div>
								<div class="col-lg-6">
									<div class="my_profile_setting_input form-group">
										<label>Area Ward No<span class="text-danger">*</span></label>
										<input type="number" class="form-control" required name="ward" placeholder="Enter the details here">
									</div>
								</div>
<div class="col-lg-6">
	<div class="my_profile_setting_input form-group">
		<label for="listingPlace">Area <span class="text-danger">*</span></label>
		<input type="text" class="form-control" required name="area" placeholder="Enter the details here">
	</div>
</div>
<div class="col-lg-6">
	<div class="my_profile_setting_input ui_kit_select_search form-group">
		<label>State  (optional)</label>
		<select class="selectpicker" id="state" name="state" data-live-search="true" data-width="100%">
			<option selected="true" disabled="disabled">Select State</option>
		</select>
	</div>
</div>
<div class="col-lg-6">
	<div class="my_profile_setting_input ui_kit_select_search form-group">
		<label>City  (optional)</label>
		<select class="form-control" id="city" name="city">
			<option selected="true" disabled="disabled">Select city</option>
		</select>
	</div>
</div>
<div class="col-lg-6">
	<div class="my_profile_setting_input form-group">
		<label for="listingPlace">Pincode  (optional)</label>
		<input type="text" class="form-control" name="pincode" placeholder="Enter the details here">
	</div>
</div>
<div class="col-lg-6">
	<div class="my_profile_setting_input form-group">
		<label for="listingPlace">Landmark <span class="text-danger">*</span></label>
		<input type="text" class="form-control" required name="landmark" placeholder="Enter the details here">
	</div>
</div>
<div class="col-lg-8">
	<div class="my_profile_setting_textarea">
		<label for="propertyDescription">Details (optional)</label>
		<textarea class="form-control" id="propertyDescription" name="details" rows="5"></textarea>
	</div>
</div>
<div class="col-lg-4">
	<h5>Service Image  (optional)</h5>
	<div class="upload_file_input_add_remove">
		<span class="btn_upload"><input type="file" id="imag" title="JPSR Services" name="serviceimage" class="input-img"/><span class="flaticon-upload"></span></span>
		<img id="ImgPreview" src="images/resource/upload-img.png" class="preview1" alt="" />
		<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
	</div>
	<small>Maximum file size: 1000kb.</small>
</div>
<div class="col-lg-6">
	<div class="my_profile_setting_input form-group">
		<label for="listingPlace">Service Audio  (optional)</label>
		<input type="file" class="form-control" name="serviceaudio" accept="audio/*">
	</div>
</div>
<div class="col-lg-6" align="right"><br>
	<div class="g-recaptcha wpcf7-form-control" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu"></div>
</div>