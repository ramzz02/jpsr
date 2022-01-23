<?php include("header.php");?>
	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f4 ovh">
		<div class="container mt80">
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
						<h2 class="breadcrumb_title"><i class="fa fa-key"></i> Forgot Password</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="my_dashboard_review">
						<div class="row">
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Mobile Number <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" id="listingPlace" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Old Password<span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" id="listingPlace" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">New Password <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" id="listingPlace" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Confirm Password <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" id="listingPlace" placeholder="Enter the details here">
								</div>
							</div>
						</div>
					</div>
					<a class="btn btn-thm listing_save_btn mt30" href="#"><i class="fa fa-key"></i> Update Password</a>
				</div>
			</div>
		</div>
	</section>
<?php include("footer.php");?>