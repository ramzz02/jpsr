<div class="col-lg-6">
	<div class="my_profile_setting_input form-group">
		<label>Name <span class="text-danger">*</span></label>
		<input type="text" class="form-control" name="name"value="<?php	if(isset($username)){ echo $names; }?>" readonly placeholder="Enter the details here">
	</div>
</div>
<div class="col-lg-6">
	<div class="my_profile_setting_input form-group">
		<label>Contact Number <span class="text-danger">*</span></label>
		<input type="text" class="form-control" name="contact" value="<?php	if(isset($username)){ echo $username; }?>" readonly placeholder="Enter the details here">
	</div>
</div>
<div class="col-lg-6">
	<div class="my_profile_setting_input form-group">
		<label>Email ID  (optional)</label>
		<input type="text" class="form-control" name="email" placeholder="Enter the details here">
	</div>
</div>