<?php
	include("header.php");
	include("menu.php");
	include("dbConnection.php");
	
		$sql="select * from groceries where id='$id'";
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($res);
	
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
						
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								
										<form method="post" action="add.php" autocomplete="off" enctype="multipart/form-data">
										
										<div class="col-lg-12">
											<div class="row">
										
												<div class="col-lg-3">
													
														
														<input type="file" data-plugins="dropify" name="image" data-default-file="images/preview.jpg"  />
														
                                                    <p class="text-muted text-center mt-2 mb-0">File Upload</>
												</div>
												
												
															
														<button class="btn btn-primary" id="submitGroceries" name="submitGroceries" type="submit"><span class="fa fa-check"></span> Add Groceries</button>
													
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