<?php
	include("header.php");
	include("menu.php");
	include("dbConnection.php");
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$sql="select * from jpsrservices where id='$id'";
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($res);
	}
?>
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
						<h2 class="breadcrumb_title text-thm"><i class="fa fa-image"></i>Edit JPSRServices</h2>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<?php if(isset($_GET['id'])) {?>
									<form method="post" action="edit.php?id=<?php echo $id;?>" autocomplete="off" enctype="multipart/form-data">
										<?php } else { ?>
										<form method="post" action="add.php" autocomplete="off" enctype="multipart/form-data">
										<?php } ?>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-4">
													<div class="my_profile_setting_input form-group">
														<input type="text" class="form-control" name="name" placeholder="Name" value="<?php if(isset($_GET['id'])){echo $row['name'];}?>">
														<label for="">Name</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="my_profile_setting_input form-group">
														<input type="text" class="form-control" name="contact" placeholder="Contact" value="<?php if(isset($_GET['id'])){echo $row['contact'];}?>">
														<label for="">Contact</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="my_profile_setting_input form-group">
														<input type="text" class="form-control" name="email" placeholder="eMail ID" value="<?php if(isset($_GET['id'])){echo $row['email'];}?>">
														<label for="">eMail ID</label>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="my_profile_setting_input form-group">
														<input type="text" class="form-control" name="address" placeholder="Address Line" value="<?php if(isset($_GET['id'])){echo $row['address'];}?>">
														<label for="">Address Line</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="my_profile_setting_input ui_kit_select_search form-group">
														<input type="text" class="form-control" name="area" placeholder="Area" value="<?php if(isset($_GET['id'])){echo $row['area'];}?>">
														<label for="">Area</label>
													</div>
												</div>
												<div class="col-lg-3">									
													<div class="my_profile_setting_input form-group">
														<select class="form-select" id="state" name="state" aria-label="Floating label select example">
															<?php
																if(isset($_GET['id']))
																{
																?>
																<option value="<?php echo $row['state'];?>"><?php echo $row['state'];?></option>
																<?php
																}
																else
																{
																?>
																<option selected>Select State</option>
																<?php
																}
															?>
														</select>
														<label for="">State</label>
													</div>
												</div>
												<div class="col-lg-3">									
												<div class="my_profile_setting_input ui_kit_select_search form-group">
														<select class="form-select" id="city" name="city" aria-label="Floating label select example">
															<?php
																if(isset($_GET['id']))
																{
																?>
																<option value="<?php echo $row['city'];?>"><?php echo $row['city'];?></option>
																<?php
																}
																else
																{
																?>
																<option selected>Select State</option>
																<?php
																}
															?>
														</select>
														<label for="">City</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="my_profile_setting_input form-group">
														<input type="text" class="form-control" name="pincode" placeholder="Pin Code" value="<?php if(isset($_GET['id'])){echo $row['pincode'];}?>">
														<label for="">Pin Code</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="my_profile_setting_input form-group">
														<input type="text" class="form-control" name="landmark" placeholder="Landmark" value="<?php if(isset($_GET['id'])){echo $row['landmark'];}?>">
														<label for="">Landmark</label>
													</div>
												</div>
												<div class="col-lg-3">									
													<div class="my_profile_setting_input ui_kit_select_search form-group">
														<select class="form-select" id="category" name="category" aria-label="Floating label select example">
															<?php
																if(isset($_GET['id']))
																{
																?>
																<option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
																<?php
																}
																else
																{
																?>
																<option selected>Select Category</option>
																<option value="home">Home Services</option>
																<option value="business">Business Services</option>
																<option value="personal">Other Personal Services</option>
																<option value="property">Property Services</option>
																<?php
																}
															?>
														</select>
														<label for="">Category</label>
													</div>
												</div>
												<div class="col-lg-3">									
													<div class="my_profile_setting_input ui_kit_select_search form-group">
														<select class="form-select" id="service" name="service" aria-label="Floating label select example">
															<?php
																if(isset($_GET['id']))
																{
																?>
																<option value="<?php echo $row['service'];?>"><?php echo $row['service'];?></option>
																<?php
																}
																else
																{
																?>
																<option selected>Select Services</option>
																<?php
																}
															?>
														</select>
														<label for="">Services</label>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="my_profile_setting_input form-group">
														<textarea class="form-control" placeholder="Details" rows="8" name="details"><?php if(isset($_GET['id'])){echo $row['details'];}?></textarea>
														<label for="">Details</label>
													</div>
												</div>
												<div class="col-lg-3">
													<?php
														if(isset($_GET['id']))
														{
														?>
														<input type="file" data-plugins="dropify" name="serviceimage" data-default-file="uploads/<?php echo $row['serviceimage']; ?>"  />
														<input type="hidden"  name="serviceimage" value="<?php echo $row['serviceimage']; ?>"  />
														<?php
														}
														else
														{
														?>
														<input type="file" data-plugins="dropify" name="serviceimage" data-default-file="images/preview.jpg"  />
														<?php
														}
													?>
                                                    <p class="text-muted text-center mt-2 mb-0">Service Image</>
												</div>
												<div class="col-lg-4">
	<div class="my_profile_setting_input form-group">
			<label for="listingPlace">Service Audio <span class="text-danger">*</span></label>
	<?php
														if(isset($_GET['id']))
														{
														?>
														<audio controls><source src="audio/<?php echo $row['serviceaudio']; ?>" type="audio/mpeg"></audio>
														<input type="file" class="form-control" name="serviceaudio" accept="audio/*">
														<input type="hidden"  name="serviceaudio" value="<?php echo $row['serviceaudio']; ?>"  />
														<?php
														}
														else
														{
														?>
														<input type="file" class="form-control" name="serviceaudio" accept="audio/*">
														<?php
														}
													?>
	</div>
</div>
												<div class="col-lg-2">
													<?php
														if(isset($_GET['id']))
														{
														?>
														<button class="btn btn-primary" id="updatejpsrservices" name="updatejpsrservices" type="submit"><span class="fa fa-check"></span> Update Business</button>
														<?php
														}
														else
														{
															?>
														<button class="btn btn-primary" id="submitjpsrservices" name="submitjpsrservices" type="submit"><span class="fa fa-check"></span> Add Business</button>
														<?php
														}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>										