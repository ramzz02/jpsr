<?php include("header.php");
		$id=$_GET['id'];
	
	$sql="select * from birthday where id='$id' ";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($res);
	
	?>
	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f4 ovh bg-img4">
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
						<h2 class="breadcrumb_title text-thm"><i class="fa fa-briefcase"></i> Edit Birthday Wishes</h2>
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
							    	<label for="listingPlace">Birthday Person Name <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" name="birthdayperson" required placeholder="Enter the details here" value="<?php echo $row['birthdayperson']; ?>">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Date of Birth <span class="text-danger">*</span></label>
							    	<input type="date" class="form-control" required name="dob" value="<?php echo $row['dob']; ?>">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Sender Name <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" required name="sendername" value="<?php echo $row['sendername']; ?>" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Sender Contact <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" readonly name="contact" value="<?php  echo $row['contact']; ?>" >
								</div>
							</div>
							<div class="col-lg-5">
								<h5>Sender Image <span class="text-danger">()</span></h5>
							  	<div class="upload_file_input_add_remove">
							
								
														<img src="uploads/<?php echo $row['senderimage']; ?>" width="100"  />
														<input type="hidden"  name="senderimage" value="<?php echo $row['senderimage']; ?>"  />
														
														<span class="btn_upload"><input class="form-control" type="file" id="senderimage" name="senderimage"  ><span class="flaticon-upload"></span></span>
														
							    	<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
							  	</div>
								<small>Maximum file size: 1000kb.</small>
							</div>
							<div class="col-lg-5">
								<h5>Birthday Image <span class="text-danger">(*)</span></h5>
							  	<div class="upload_file_input_add_remove">
							    	<img src="uploads/<?php echo $row['birthdayimage']; ?>" width="100"  />
														<input type="hidden"  name="birimage" value="<?php echo $row['birthdayimage']; ?>"  />
														
														<span class="btn_upload"><input class="form-control" type="file" id="birimage" name="birimage"  ><span class="flaticon-upload"></span></span>
							    	<button id="removeImage2" class="btn-rmv2" type="button"><span class="flaticon-delete"></span></button>
							  	</div>
								<small>Maximum file size: 1000kb.</small>
							</div>
							<div class="col-lg-2">
								<div class="my_profile_setting_textarea">
								    <label for="propertyDescription">Wishes <span class="text-danger">(*)</span></label>
								    <input class="form-control" type="text" id="wishes" name="wishes" value="<?php echo $row['wishes']; ?>" >
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
					<button id="editbirthday" name="editbirthday" type="submit" class="btn btn-thm listing_save_btn mt30" href="#"><i class="fa fa-check-circle"></i> Submit</button>
					</div>
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