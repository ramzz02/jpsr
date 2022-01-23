<?php include("header.php");
	$today=date('Y-m-d');
	$query1=mysqli_query($con,"SELECT * FROM events where date>='$today' ;");
			 $count1=mysqli_num_rows($query1);
	?>

	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb style2">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">Events</h2>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item active" aria-current="page">Events Near you</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<p align="right"><a href="events.php" class="btn btn-thm btn-lg rounded"><i class="fa fa-newspaper-o"></i> Post Event</a></p>
	<!-- Listing Grid View -->
	<section class="our-listing pb30-991">
		<div class="container">
			<div class="row">
			
				<div class="col-lg-12">
					<div class="row">
					<?php
					while($row=mysqli_fetch_array($query1))
					{
					?>
						<div class="col-md-6 col-lg-4">
							<div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="uploads/<?php echo $row['images'];?>" alt="lg3.jpg">
								</div>
								<div class="details">
									<div class="tc_content">
										<h4><?php echo $row['eventTitle'];?></h4>
										<p><?php echo $row['des'];?></p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-date pr5"></span> 05/10/2021</a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-pin pr5"></span> Hosur</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					</div>
					
				</div>
				<div class="col-lg-12">
					<div class="mbp_pagination mt10">
						<div class="new_line_pagination text-center">
							<p>Showing 36 of 497 Results</p>
							<div class="pagination_line"></div>
							<a class="pagi_btn text-thm" href="#">Show More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include("footer.php");?>