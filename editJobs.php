<?php include("header.php");
	$id=$_GET['id'];
	
	$sql="select * from jobs where id='$id' ";
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
						<h2 class="breadcrumb_title text-thm"><i class="fa fa-bank"></i>Edit Jobs</h2>
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
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Type</label>
							    	<select name="type" id="type" class="selectpicker">
													<option value="<?php echo $row['type'];?>"><?php echo $row['type'];?></option>
														<option value="Full Time">Full Time</option>
														<option value="Part Time">Part Time</option>
														<option value="Work From Home">Work From Home</option>
														<option value="Others">Others</option>
											    	</select>
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
							    	<label for="listingPlace">Position <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="position" required placeholder="Enter the details here" value="<?php echo $row['position'];?>">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Designation</label>
									<select class="selectpicker" name="role" id="role">
														<option value="<?php echo $row['designation'];?>"><?php echo $row['designation'];?></option>
														<option value="Sales Executive">Sales Executive</option>
														<option value="Driver">Driver</option>
														<option value="Telecaller">Telecaller</option>
														<option value="Marketing">Marketing</option>
													</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Vaccancies</label>
									<input type="text" class="form-control" name="vaccancies" required placeholder="Enter the details here" value="<?php echo $row['vaccancies'];?>">
								</div>
							</div>
						
								<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Qualification</label>
									<input type="text" class="form-control" name="qualification" required placeholder="Enter the details here" value="<?php echo $row['qualification'];?>">
								</div>
							</div>
								<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Experience</label>
									<input type="text" class="form-control" name="experience" required placeholder="Enter the details here" value="<?php echo $row['experience'];?>">
								</div>
							</div>
								<div class="col-lg-4">
								<div class="my_profile_setting_input ui_kit_select_search form-group">
							    	<label>Company</label>
									<input type="text" class="form-control" name="company" required placeholder="Enter the details here" value="<?php echo $row['company'];?>">
								</div>
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
					<button type="submit" name="updateJobs" class="btn btn-thm listing_save_btn mt30" href="#"><i class="fa fa-sign-in"></i> Submit</button>
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