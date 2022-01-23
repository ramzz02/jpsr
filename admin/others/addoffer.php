<?php
	include("header.php");
	include("menu.php");
	include("dbConnection.php");
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$sql="select * from jpsroffer where id='$id'";
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
								<li class="breadcrumb-item active">Business Offer</li>
							</ol>
						</div>
						<?php if(isset($_GET['id'])) {?>
							<h4 class="page-title"><a href="viewoffer.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a> Update Offer Details</h4>
							<?php } else { ?>
							<h4 class="page-title"><a href="viewoffer.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a> Add New Offer</h4>
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
														<select class="form-select" id="offcategory" name="offcategory" aria-label="Floating label select example">
															<?php
																if(isset($_GET['id']))
																{
																?>
																<option value="<?php echo $row['offercategory'];?>"><?php echo $row['offercategory'];?></option>
																<?php
																}
																else
																{
																?>
																<option selected>Select Ad Category</option>
																<?php
																}
															?>
														</select>
														<label for="">Category</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="offtitle" placeholder="offtitle" value="<?php if(isset($_GET['id'])){echo $row['offertitle'];}?>">
														<label for="">Title</label>
													</div>
												</div>
												<div class="col-lg-3">
													<?php
														if(isset($_GET['id']))
														{
														?>
														<input type="file" data-plugins="dropify" name="offimage" data-default-file="../uploads/<?php echo $row['offerimage']; ?>"  />
														<?php
														}
														else
														{
														?>
														<input type="file" data-plugins="dropify" name="offimage" data-default-file="images/preview.jpg"  />
														<?php
														}
													?>
                                                    <p class="text-muted text-center mt-2 mb-0">Offer Image</>
												</div>
												<div class="col-lg-6">
													<div class="form-floating mb-3">
														<textarea class="form-control" placeholder="Description" rows="8" name="offdescription"><?php if(isset($_GET['id'])){echo $row['offerdescription'];}?></textarea>
														<label for="">Description</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="offamount" placeholder="offer Amount" value="<?php if(isset($_GET['id'])){echo $row['offeramount'];}?>">
														<label for="">Amount</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="date" class="form-control" name="offfrom" placeholder="Offer From" value="<?php if(isset($_GET['id'])){echo $row['offerfrom'];}?>">
														<label for="">From</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-floating mb-3">
														<input type="text" class="form-control" name="offto" placeholder="off To" value="<?php if(isset($_GET['id'])){echo $row['offerto'];}?>">
														<label for="">Offer to</label>
													</div>
												</div>
												<div class="col-lg-2">
													<?php
														if(isset($_GET['id']))
														{
														?>
														<button class="btn btn-primary" id="updateoffer" name="updateoffer" type="submit"><span class="fa fa-check"></span> Update Offer</button>
														<?php
														}
														else
														{
															?>
														<button class="btn btn-primary" id="submitoffer" name="submitoffer" type="submit"><span class="fa fa-check"></span> Add Offer</button>
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