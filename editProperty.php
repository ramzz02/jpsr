<?php include("header.php");
	$id=$_GET['id'];
	
	$sql="select * from property where id='$id' ";
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
				<div class="col-lg-12">
					<div class="breadcrumb_content style2">
						<h2 class="breadcrumb_title text-thm"><i class="fa fa-bank"></i>Edit Property</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
				<form action="edit.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data" autocomplete="off">
				
					<div class="my_dashboard_review">
						<div class="row">
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace"> Name <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="name" required placeholder="Enter the details here" value="<?php echo $row['name'];?>">
								</div>
							</div>
							
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Contact Number <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="contact" value="<?php	if(isset($username)){ echo $username; }?>" readonly required placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">HouseType <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="type" required placeholder="Enter the details here" value="<?php echo $row['houseType'];?>">
								</div>
							</div>
							
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>BHK</label>
									<input type="text" class="form-control" name="bhk" required placeholder="Enter the details here" value="<?php echo $row['bhk'];?>">
								</div>
							</div>
						
								<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Rent</label>
									<input type="text" class="form-control" name="rent" required placeholder="Enter the details here" value="<?php echo $row['rent'];?>">
								</div>
							</div>
							
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Info</label>
									<input type="text" class="form-control" name="info" required placeholder="Enter the details here" value="<?php echo $row['info'];?>">
								</div>
							</div>	
								
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Location</label>
									<input type="text" class="form-control" name="loc" required placeholder="Enter the details here" value="<?php echo $row['location'];?>">
								</div>
							</div>	
								<div class="col-lg-4">
								<h5>Property Image <span class="text-danger">(*)</span></h5>
							  	<div class="upload_file_input_add_remove">
							    	<img src="uploads/<?php echo $row['images']; ?>" width="100"  />
														<input type="hidden"  name="file" value="<?php echo $row['images']; ?>"  />
														
														<span class="btn_upload"><input class="form-control" type="file" id="file" name="file"  ><span class="flaticon-upload"></span></span>
							    	<img id="ImgPreview" src="images/resource/upload-img.png" class="preview1" alt="" />
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
					<button type="submit" name="updateProperty" class="btn btn-thm listing_save_btn mt30" href="#"><i class="fa fa-sign-in"></i> Submit</button>
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