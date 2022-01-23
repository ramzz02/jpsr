<?php
	include("header.php");
	$query = mysqli_query($con, "select * from jpsroffer;");
	$count=mysqli_num_rows($query);
?>

	<!-- Listing Grid View -->
	<section class="our-listing bgc-f4 pb30-991">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="listing_sidebar dn db-lg">
						<div class="sidebar_content_details style3">
							<!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
							<div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
								<div class="sidebar_advanced_search_widget">
									<br><h4 class="title">Offer Category</h4><hr>
									<ul class="list_details order_list list-style-type-bullet">
										<li><a href="#">Bakery & Sweet Stalls</a></li>
										<li><a href="#">Department Stores</a></li>
										<li><a href="#">Hotels & Restaurents</a></li>
										<li><a href="#">Jewellery</a></li>
										<li><a href="#">Real Estates</a></li>
										<li><a href="#">Textiles</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb_content style2 mb0-991">
						<h2 class="breadcrumb_title">Offer Section</h2>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Offers List</li>
						</ol>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="dn db-lg mt30 mb0 tac-767">
						<div id="main2">
							<span id="open2" class="fa fa-filter filter_open_btn style2"> Offer Category</span>
						</div>
					</div>
				</div>
			</div>
			<img src="images/background/inner-pagebg3.jpg" width="100%">
			<div class="row">
				<div class="col-xl-4">
					<div class="sidebar_listing_grid1 dn-lg">
						<div class="sidebar_listing_list style3">
							<div class="sidebar_advanced_search_widget">
								<br><h4 class="title">Offer Category</h4><hr>
							<ul class="list_details order_list list-style-type-bullet">
								<li><a href="#">Bakery & Sweet Stalls</a></li>
										<li><a href="#">Department Stores</a></li>
										<li><a href="#">Hotels & Restaurents</a></li>
										<li><a href="#">Jewellery</a></li>
										<li><a href="#">Real Estates</a></li>
										<li><a href="#">Textiles</a></li>
							</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8"><br>
				<!--div class="row">
						<div class="listing_filter_row dif db-767">
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-5">
								<div class="left_area tac-xsd mb30-767">
									<p class="mb0">Showing <span class="heading-color">1 - <?php echo $count; ?> of <?php echo $count; ?> results</span></p>
								</div>
							</div>
							<div class="col-sm-12 col-md-8 col-lg-8 col-xl-7">
								<div class="listing_list_style tac-767">
									<ul class="mb0">
										<li class="list-inline-item dropdown text-left"><span class="stts">Sort by: </span>
											<select class="selectpicker">
												<option>Default</option>
												<option>Newest</option>
												<option>Featured</option>
												<option>Most Views</option>
											</select>
										</li>
										<li class="list-inline-item gird bgc-white"><a href="#"><span class="fa fa-th-large"></span></a></li>
										<li class="list-inline-item list bgc-white"><a class="text-thm" href="#"><span class="fa fa-th-list"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div-->
					<p align="right"><a href="registeroffer.php" class="btn btn-thm btn-lg rounded"><i class="fa fa-percent"></i> Add your Business Offer</a></p>
					<div class="row">
						<?php
					while($row=mysqli_fetch_array($query))
					{
					?>
						<a href="#"><div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<img class="img-whp" src="uploads/<?php echo $row["offerimage"]; ?>" alt="ll1.jpg">
								</div>
								<div class="details">
									<div class="tc_content">
										<h4><?php echo $row["name"]; ?></h4>
										<p><span class="fa fa-address-card pr5"></span> <?php echo $row["offertitle"]; ?></p>
										<ul class="prop_details mb0 mt15">
											<li class="list-inline-item"><a href="#"><span class="flaticon-phone pr5"></span> <?php echo $row["contact"]; ?></a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-pin pr5"></span> <?php echo $row["area"]; ?></a></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><span class="fa fa-edit pr5"></span> <?php echo $row["offerdescription"]; ?></a></li>
										</ul>
										<ul class="fp_meta float-right mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-zoom"></span></a></li>
											<li class="list-inline-item"><a class="icon" href="#"><span class="flaticon-love"></span></a></li>
										</ul>
									</div>
								</div>
							
						</div>
						</div></a>
						<?php
					}
					?>
						<img src="images/background/inner-pagebg3.jpg" width="100%">
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include("footer.php");?>