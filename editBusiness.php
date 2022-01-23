<?php include("header.php");
	$id=$_GET['id'];
	
	$sql="select * from business where id='$id' ";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($res);
	
	?>
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
						<h2 class="breadcrumb_title text-thm"><i class="fa fa-image"></i>Edit Business</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
				
				<form action="edit.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data" autocomplete="off">
					<div class="my_dashboard_review">
						<div class="row">
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Name <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="name" required placeholder="Enter the details here" value="<?php echo $row['name']; ?>">
								</div>
							</div>
							<div class="col-lg-2">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Email <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="email" required placeholder="Enter the Email" value="<?php echo $row['email']; ?>">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Contact <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="contact" value="<?php echo $row['contact']; ?>" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Address <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="address" required placeholder="Enter the details here" value="<?php echo $row['address']; ?>">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Area Locality<span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="area" required placeholder="Enter the details here" value="<?php echo $row['area']; ?>">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>City <span class="text-danger">*</span></label>
									<select class="form-control" id="city" required name="city" >
									<option selected="true" value="<?php echo $row['city']; ?>"><?php echo $row['city']; ?></option>
									
									<option value="hosur">Hosur</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">AltContact <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="altcontact" required placeholder="Enter the details here" value="<?php echo $row['altcontact']; ?>">
								</div>
							</div>
							<div class="col-lg-5">
								<h5>Logo <span class="text-danger">()</span></h5>
							  	<div class="upload_file_input_add_remove">
							
								
														<img src="uploads/<?php echo $row['logo']; ?>" width="100"  />
														<input type="hidden"  name="logo" value="<?php echo $row['logo']; ?>"  />
														
														<span class="btn_upload"><input class="form-control" type="file" id="logo" name="logo"  ><span class="flaticon-upload"></span></span>
														
							    	<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
							  	</div>
								<small>Maximum file size: 1000kb.</small>
							</div>
							<div class="col-lg-10">
								<div class="my_profile_setting_textarea">
								    <label for="propertyDescription">workingFrom <span class="text-danger">*</span></label>
								     <input class="form-control" type="text" id="workingfrom" name="workingfrom" value="<?php echo $row['workingfrom']; ?>" >
								</div>
							</div>
							<div class="col-lg-10">
								<div class="my_profile_setting_textarea">
								    <label for="propertyDescription">workingTo <span class="text-danger">*</span></label>
								     <input class="form-control" type="text" id="workingto" name="workingto" value="<?php echo $row['workingto']; ?>" >
								</div>
							</div>
							<div class="col-lg-10">
								<div class="my_profile_setting_textarea">
								    <label for="propertyDescription">Description <span class="text-danger">*</span></label>
								     <input class="form-control" type="text" id="description" name="description" value="<?php echo $row['description']; ?>" >
								</div>
							</div>
							<div class="col-lg-10">
								<div class="my_profile_setting_textarea">
								    <label for="propertyDescription">Offers <span class="text-danger">*</span></label>
								     <input class="form-control" type="text" id="offer" name="offer" value="<?php echo $row['offer']; ?>" >
								</div>
							</div>
							<div class="col-lg-10">
								<div class="my_profile_setting_textarea">
								    <label for="propertyDescription">Category <span class="text-danger">*</span></label>
								     <input class="form-control" type="text" id="category" name="category" value="<?php echo $row['category']; ?>" >
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
								<button class="btn btn-thm listing_save_btn mt30" type="submit" name="updateBusiness"><i class="fa fa-sign-in"></i> Submit</button>
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