<?php
	include("header.php");
	include("menu.php");
	include("dbConnection.php");
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$sql="select * from business where id='$id'";
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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Business Services</a></li>
								<li class="breadcrumb-item active">Registered Business</li>
							</ol>
						</div>
						<?php if(isset($_GET['id'])) {?>
							<h4 class="page-title"><a href="viewbusiness.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a> Update Registered Business</h4>
							<?php } else { ?>
							<h4 class="page-title"><a href="viewbusiness.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a> Add Registered Business</h4>
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
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="name" placeholder="Business Name" value="<?php if(isset($_GET['id'])){echo $row['name'];}?>">
														<label for="">Business Name</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="proprietor" placeholder="Proprietor / Authorized Person" value="<?php if(isset($_GET['id'])){echo $row['proprietor'];}?>">
														<label for="">Proprietor / Authorized Person</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="contact" placeholder="Contact" value="<?php if(isset($_GET['id'])){echo $row['contact'];}?>">
														<label for="">Contact</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="email" placeholder="eMail ID" value="<?php if(isset($_GET['id'])){echo $row['email'];}?>">
														<label for="">eMail ID</label>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="addr" placeholder="Address Line" value="<?php if(isset($_GET['id'])){echo $row['address'];}?>">
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
														<input type="text" class="form-control" name="ward" placeholder="Ward" value="<?php if(isset($_GET['id'])){echo $row['ward'];}?>">
														<label for="">Ward</label>
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
														<select class="form-select" id="displaycity" name="displaycity" aria-label="Floating label select example">
															<?php
																if(isset($_GET['id']))
																{
																?>
																<option value="<?php echo $row['displaycity'];?>"><?php echo $row['displaycity'];?></option>
																<?php
																}
																else
																{
																?>
																<option selected>Select City</option>
																<option value="gosur">Hosur</option>
																<option value="krishnagiri">Krishnagiri</option>
																<?php
																}
															?>
														</select>
														<label for="">Display City</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="altcontact" placeholder="Alternate Contact" value="<?php if(isset($_GET['id'])){echo $row['altcontact'];}?>">
														<label for="">Alternate Contact</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="landline" placeholder="Landline with STD Code" value="<?php if(isset($_GET['id'])){echo $row['landline'];}?>">
														<label for="">Landline with STD Code</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="website" placeholder="Website" value="<?php if(isset($_GET['id'])){echo $row['website'];}?>">
														<label for="">Website</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="form-floating mb-3">
														<input type="time" class="form-control" name="workingfrom" placeholder="Working From" value="<?php if(isset($_GET['id'])){echo $row['workingfrom'];}?>">
														<label for="">Working From</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="form-floating mb-3">
														<input type="time" class="form-control" name="workingto" placeholder="Working To" value="<?php if(isset($_GET['id'])){echo $row['workingto'];}?>">
														<label for="">Working To</label>
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
																<option value="gosur">Garments</option>
																<option value="krishnagiri">Others</option>
																<?php
																}
															?>
														</select>
														<label for="">Category</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="form-floating mb-2">
														<input type="text" class="form-control" name="reference" placeholder="Reference Code" value="<?php if(isset($_GET['id'])){echo $row['reference'];}?>">
														<label for="">Reference Code</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" placeholder="Referred By" readonly>
														<label for="">Referred By</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-floating mb-3">
														<textarea class="form-control" placeholder="Description" rows="8" name="description"><?php if(isset($_GET['id'])){echo $row['description'];}?></textarea>
														<label for="">Description</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-floating mb-3">
														<textarea class="form-control" placeholder="Offer" rows="8" name="offer"><?php if(isset($_GET['id'])){echo $row['offer'];}?></textarea>
														<label for="">Offer</label>
													</div>
												</div>
												<div class="col-lg-4">
													<?php
														if(isset($_GET['id']))
														{
														?>
														<input type="file" data-plugins="dropify" name="logo" data-default-file="../uploads/<?php echo $row['logo']; ?>"  />
														<?php
														}
														else
														{
														?>
														<input type="file" data-plugins="dropify" name="logo" data-default-file="images/preview.jpg"  />
														<?php
														}
													?>
                                                    <p class="text-muted text-center mt-2 mb-0">Logo</>
												</div>
												<div class="col-lg-2">
													<?php
														if(isset($_GET['id']))
														{
														?>
														<button class="btn btn-primary" id="updateBusiness" name="updateBusiness" type="submit"><span class="fa fa-check"></span> Update Business</button>
														<?php
														}
														else
														{
															?>
														<button class="btn btn-primary" id="registeryourbusiness" name="registeryourbusiness" type="submit"><span class="fa fa-check"></span> Add Business</button>
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