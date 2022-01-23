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
<div class="content-page">
	<div class="content">
		
		<!-- Start Content-->
		<div class="container-fluid">
			
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
								<li class="breadcrumb-item active">JPSR Services</li>
							</ol>
						</div>
						<?php if(isset($_GET['id'])) {?>
							<h4 class="page-title">Update JPSR Services</h4>
							<?php } else { ?>
							<h4 class="page-title">Add JPSR Services</h4>
						<?php } ?>
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
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="name" placeholder="Name" value="<?php if(isset($_GET['id'])){echo $row['name'];}?>">
														<label for="">Name</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="contact" placeholder="Contact" value="<?php if(isset($_GET['id'])){echo $row['contact'];}?>">
														<label for="">Contact</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="email" placeholder="eMail ID" value="<?php if(isset($_GET['id'])){echo $row['email'];}?>">
														<label for="">eMail ID</label>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="address" placeholder="Address Line" value="<?php if(isset($_GET['id'])){echo $row['address'];}?>">
														<label for="">Address Line</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="area" placeholder="Area" value="<?php if(isset($_GET['id'])){echo $row['area'];}?>">
														<label for="">Area</label>
													</div>
												</div>
												<div class="col-lg-3">									
													<div class="form-floating mb-3">
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
													<div class="form-floating mb-3">
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
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="pincode" placeholder="Pin Code" value="<?php if(isset($_GET['id'])){echo $row['pincode'];}?>">
														<label for="">Pin Code</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="landmark" placeholder="Landmark" value="<?php if(isset($_GET['id'])){echo $row['landmark'];}?>">
														<label for="">Landmark</label>
													</div>
												</div>
												<div class="col-lg-3">									
													<div class="form-floating mb-3">
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
													<div class="form-floating mb-3">
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
													<div class="form-floating mb-3">
														<textarea class="form-control" placeholder="Details" rows="8" name="details"><?php if(isset($_GET['id'])){echo $row['details'];}?></textarea>
														<label for="">Details</label>
													</div>
												</div>
												<div class="col-lg-3">
													<?php
														if(isset($_GET['id']))
														{
														?>
														<input type="file" data-plugins="dropify" name="serviceimage" data-default-file="../uploads/<?php echo $row['serviceimage']; ?>"  />
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
														<audio controls><source src="../audio/<?php echo $row['serviceaudio']; ?>" type="audio/mpeg"></audio>
														<input type="file" class="form-control" name="serviceaudio" accept="audio/*">
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