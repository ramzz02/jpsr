<?php
	include("header.php");
	$query = mysqli_query($con, "select * from birthday;");
	$count=mysqli_num_rows($query);
?>
	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb style2">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">Today's Birthday Wishes</h2>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Birthday People</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Main Blog Post Content -->
	<section class="blog_post_container pb80">
		<div class="container">
					<p align="right"><a href="birthday.php" class="btn btn-thm btn-lg rounded"><i class="fa fa-newspaper-o"></i> Submit your Birthday Wish</a></p>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
										<?php
					while($row=mysqli_fetch_array($query))
					{
					?>
						<div class="col-lg-4">
							<div class="for_blog feat_property">
								<div class="thumb">
									<img class="img-whp" src="uploads/<?php echo $row["birthdayimage"]; ?>" alt="1.jpg">
									<div class="tag bgc-thm"><a class="text-white" href="#"><?php echo "Happy Birthday ".$row['birthdayperson']; ?></a></div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="bp_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-avatar mr10"></span> <?php echo $row['sendername']; ?></a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-date mr10"></span> <?php echo $row["date"]; ?></a></li>
											</ul>
										</div>
										<h4><?php echo $row["wishes"]; ?></h4>
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