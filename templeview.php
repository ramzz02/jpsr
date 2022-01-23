<?php
	include("header.php");
	$query = mysqli_query($con, "select * from temple;");
	$count=mysqli_num_rows($query);
	
	if(isset($_POST['searchTemple'])){
	$search=$_POST['name'];
	$search1=$_POST['loc'];
	
	$query1=mysqli_query($con,"SELECT * FROM temple where city='$search1' OR name='$search';");
			 $count1=mysqli_num_rows($query1);
	}
?>
	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb style2">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">Hosur Temples</h2>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Temples Near you</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
<section class="bgc-f4 pt0-767">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="home_adv_srch_opt text-center">
						<div class="wrapper">
							<div class="home_adv_srch_form listing_page_v3">
								<form class="bgc-white bgct-767 pl30 pt10 pl0-767" method="POST" action="">
									<div class="form-row align-items-center">
									    <div class="col-auto home_form_input mb20-xsd mr15 mr0-lg">
									      	<div class="input-group style1 mb-2 mb0-767 pl10 pl0-lg">
									        	<div class="input-group-prepend">
									        		<div class="input-group-text pl0 pb0-767">Name</div>
									        	</div>
												<div class="select-wrap style1-dropdown">
											
											    	<select name="name" id="name" class="form-control js-searchBox">
													<option value="">Select Name</option>
														<?php 
												$query = mysqli_query($con, "select name from temple;");
	
												while($row1=mysqli_fetch_array($query))
												{
	echo "<option value=".$row1['name'].">".$row1['name']."</option>";
												}
	?>
													
												
											    	</select>
													
											    </div>
									      	</div>
									    </div>
									    <div class="col-auto home_form_input mr15 mr0-lg mb20-767">
									      	<div class="input-group style2 mb-2 mb0-767 pl10 pl0-lg">
									        	<div class="input-group-prepend">
									        		<div class="input-group-text pb0-767">Location</div>
									        	</div>
												<div class="select-wrap style2-dropdown">
													<select class="selectpicker" name="loc" id="loc">
														<option value="">Select Location</option>
	<?php 
												$query = mysqli_query($con, "select city from temple;");
	
												while($row1=mysqli_fetch_array($query))
												{
	echo "<option value=".$row1['city'].">".$row1['city']."</option>";
												}
	?>
													</select>
											    </div>
									      	</div>
									    </div>
									   
									    <div class="col-auto home_form_input2 pl10 pl0-lg">
									    	<button type="submit" class="btn search-btn mb-2" id="searchTemple" name="searchTemple"><span class="flaticon-loupe"></span></button>
									    </div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Main Blog Post Content -->
	<section class="blog_post_container pb80">
	
		<div class="container">
					<p align="right"><a href="temples.php" class="btn btn-thm btn-lg rounded"><i class="fa fa-institution"></i> Add New Temple</a></p>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
										<?php
					while($row=mysqli_fetch_array($query1))
					{
					?>
						<div class="col-lg-4">
							<div class="for_blog feat_property">
								<div class="thumb">
									<img class="img-whp" src="uploads/<?php echo $row["templeimage"]; ?>" alt="1.jpg">
									<div class="tag bgc-thm"><a class="text-white" href="#"><?php echo $row['name']; ?></a></div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="bp_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-avatar mr10"></span> <?php echo $row['area']; ?></a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-date mr10"></span> <?php echo $row["altcontact"]; ?></a></li>
											</ul>
										</div>
										<h4><?php echo $row["templedescription"]; ?></h4>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<img src="images/background/inner-pagebg3.jpg" width="100%">
<?php include("footer.php");?>