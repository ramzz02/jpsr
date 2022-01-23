<?php
	include("dashboardtopheader.php");
	include("dbConnection.php");
	$query = mysqli_query($con, "select * from user where contact = '$username';");
	$row=mysqli_fetch_array($query);
	$id=$row['contact'];
?>
<div class="col-lg-12 mb10">
	<div class="breadcrumb_content style2">
		<h2 class="breadcrumb_title float-left">Profile</h2>
		<p class="float-right">JPSR Enterprises</p>
	</div>
</div>
<div class="col-lg-12">
	<div class="row">
		<div class="col-xl-8">
			<div class="my_dashboard_profile mb30-lg">
				<h4 class="mb30">Profile Details</h4>
				<div class="row">
				<form method="post" action="add.php?id=<?php echo $id;?>" autocomplete="off" enctype="multipart/form-data">
					<div class="col-lg-12">
						<div class="col-lg-6">
						 <p class="text-muted text-center mt-2 mb-0">Profile Image</>
													<?php
														if($username != " ")
														{
														?>
														<img src="uploads/<?php echo $row['profilePic']; ?>"/>
														<input type="file" data-plugins="dropify" name="pic" data-default-file="uploads/<?php echo $row['profilePic']; ?>"  />
														<input type="hidden"  name="pic" value="<?php echo $row['profilePic']; ?>"  />
														<?php
														}
														else
														{
														?>
														<input type="file" data-plugins="dropify" name="pic" data-default-file="images/preview.jpg"  />
														<?php
														}
													?>
                                                    
												</div>
					</div>
					<div class="col-lg-12">
						<div class="my_profile_setting_input form-group mt100-500">
							<label for="formGroupExampleInput1">Your Name</label>
							<input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="my_profile_setting_input form-group">
							<label for="formGroupExampleInput8">Phone</label>
							<input type="text" class="form-control" name="mobile" id="mobile" readonly value="<?php echo $username; ?>">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="my_profile_setting_input form-group">
							<label for="formGroupExampleEmail">Email</label>
							<input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>">
						</div>
					</div>
					<div class="col-xl-12">
						<div class="my_profile_setting_textarea">
							<label for="exampleFormControlTextarea1">Area</label>
							<input type="text" class="form-control" id="notes" name="notes" value="<?php echo $row['area']; ?>" >
							</div>
						</div>
						<div class=="col-xl-12">
							<div class="my_profile_setting_input form-group">
								<label for="formGroupExampleInput5">Facebook</label>
								<input type="text" class="form-control" id="formGroupExampleInput5">
							</div>
						</div>
						<div class=="col-xl-12">
							<div class="my_profile_setting_input form-group">
								<label for="formGroupExampleInput6">Twitter</label>
								<input type="text" class="form-control" id="formGroupExampleInput6">
							</div>
						</div>
						<div class="col-xl-12">
							<div class="my_profile_setting_input form-group">
								<label for="formGroupExampleInput7">Google+</label>
								<input type="text" class="form-control" id="formGroupExampleInput7">
							</div>
						</div>
						<div class=="col-xl-12">
							<div class="my_profile_setting_input form-group">
								<label for="formGroupExampleInput9">Instagram</label>
								<input type="text" class="form-control" id="formGroupExampleInput9">
							</div>
						</div>
						<div class="col-xl-12">
							<div class="my_profile_setting_input">
								<button class="btn update_btn" id="profile" name="profile">Save Changes</button>
							</div>
						</div>
						</form>
						</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="my_dashboard_profile">
							<h4 class="mb20">Change password</h4>
							<div class="row">
								<div class="col-md-12">
									<div class="my_profile_setting_input form-group">
										<label for="formGroupExampleOldPass">Current Password</label>
										<input type="text" class="form-control" id="formGroupExampleOldPass">
									</div>
								</div>
								<div class="col-md-12">
									<div class="my_profile_setting_input form-group">
										<label for="formGroupExampleNewPass">New Password</label>
										<input type="text" class="form-control" id="formGroupExampleNewPass">
									</div>
								</div>
								<div class="col-md-12">
									<div class="my_profile_setting_input form-group">
										<label for="formGroupExampleConfPass">Confirm New Password</label>
										<input type="text" class="form-control" id="formGroupExampleConfPass">
									</div>
								</div>
								<div class="col-xl-12">
									<div class="my_profile_setting_input">
										<button class="btn update_btn style2">Change Password</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include("footer.php");?>