<?php
	include("header.php");
?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord bgc-f4 ovh">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mb10">
				<div class="breadcrumb_content style2 mb25">
					<h2 class="breadcrumb_title"><i class="fa fa-user-plus"></i> Update Password</h2>
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-sm-12 col-lg-6 offset-lg-3">
					<div class="login_form inner_page">
												<form action="edit.php" method="post">
													<div class="input-group mb-2 mr-sm-2">
														<input type="text" class="form-control" required name="username" placeholder="Mobile Number">
													</div>
													<div class="input-group mb-2 mr-sm-2">
														<input type="text" class="form-control" required name="username" placeholder="OTP">
													</div>
													<div class="input-group form-group mb5">
														<input type="password" class="form-control" required name="password" placeholder="Password">
													</div>
													<div class="input-group form-group mb5">
														<input type="password" class="form-control" required name="password" placeholder="Confirm Password">
													</div>
													<button type="submit" class="btn btn-log btn-block btn-thm">Update</button>
													<p class="text-center mb30 mt20">Don't have an account? <a class="text-thm" href="signin.php">Sign up</a></p>
												</form>
											</div>
				</div>
			</div>
	</div>
</section>
<?php include("footer.php");?>