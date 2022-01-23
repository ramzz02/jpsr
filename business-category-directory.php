<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(empty($_SESSION['ViewCategID'])){
  	header('Location: index.php');
  }


  $getbusinessdetails = new Business();
  $getbusinessdetails = $getbusinessdetails->fetchBusiness("WHERE category = '{$_SESSION['ViewCategID']}' AND status = 'active' ORDER BY subscription_order DESC")->resultSet();

  $viewcategorydatas = new Business();
  $viewcategorydatas = $viewcategorydatas->fetchCategory("WHERE id = '{$_SESSION['ViewCategID']}' ORDER BY category_name ASC")->resultSet();
  $viewcategorydata = $viewcategorydatas[0];

  $getcategorys = new Business();
  $getcategorys = $getcategorys->fetchCategory("WHERE status = '1' ORDER BY category_name ASC")->resultSet();

  if($_POST['profileViewId'] != ''){

	$viewprofiledetails = new Business();
	$viewprofiledetails = $viewprofiledetails->fetchBusiness("WHERE id = '{$_POST['profileViewId']}' ")->resultSet();
	$viewprofiledetail = $viewprofiledetails[0];

	$busineeN = str_replace(" ", "-", $viewprofiledetail['business_name']);

	$randumNo = mt_rand(291123,987892);


	$UrlLink = "BusinessProfile?profID_view=".$_POST['profileViewId']."/profile/".$randumNo."/BusinessName=".$busineeN;

  	header('Location: '.$UrlLink.'');

  }


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
		<?php include("includes/headerTop.php"); ?>
	</head>
		
	<body>

		<?php include("includes/Header.php"); ?>

	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb style2">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content style2 mb0-991">
						<h1 class="breadcrumb_title text-thm">Business Directory</h1>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item active" aria-current="page">Know your Neighbors</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<p class="text-align-right Add_Btn_text" ><a href="RegisterBusiness" class="btn btn-thm btn-lg rounded"><i class="fa fa-briefcase"></i> Add your Business</a></p>
	<!-- Listing Grid View -->
	<section class="our-listing bgc-f4">
		<div class="container">

			<?php include("includes/directory-Responsive-leftBar.php"); ?>

			<div class="row">

				<?php include("includes/directory-web-leftBar.php"); ?>


				<div class="col-xl-8">
					<h3><?php echo $viewcategorydata['category_name']; ?></h3><hr>
					<form method="post" id="ListOfCatgeoryProfileItems" >
					<input type="hidden" name="profileViewId" id="profileViewId">
						<div class="row">

							<?php
							if(!empty($getbusinessdetails)){
								foreach($getbusinessdetails as $getbusinessdetail){


								$getstates = new Location();
								$getstates = $getstates->fetchState("WHERE id = '{$getbusinessdetail['state']}' ORDER BY state_name ASC")->resultSet();
								$getstate = $getstates[0];

								$getdistricts = new Location();
								$getdistricts = $getdistricts->fetchDistrict("WHERE id = '{$getbusinessdetail['district']}' ORDER BY district_name ASC")->resultSet();
								$getdistrict = $getdistricts[0];

								if($getbusinessdetail['logo'] != ''){
									$logo_img_file1 = $getbusinessdetail['logo'];
								} else {
									$logo_img_file1 = 'images/business_logo.jpg';
								}
								
								$logo_type = pathinfo($logo_img_file1, PATHINFO_EXTENSION);
								$logo_data = file_get_contents($logo_img_file1);
								$logo_base64_IMg = 'data:image/' . $logo_type . ';base64,' . base64_encode($logo_data);

							?>
							<div class="feat_property list col-lg-12">
								<div class="thumb col-lg-3 p0 view_profData" id="<?php echo $getbusinessdetail['id']; ?>">
									<img class="img-whp" src="<?php echo $logo_base64_IMg; ?>" alt="Business Logo">
								</div>
								<div class="details col-lg-9">
									<div class="tc_content content_NQi_">

										<a class="view_profData" id="<?php echo $getbusinessdetail['id']; ?>">

										<h4><?php echo $getbusinessdetail['business_name']; ?></h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<p><span class="fa fa-address-card pr5"></span> <?php echo $getbusinessdetail['person_name']; ?></p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span class="flaticon-pin pr5"></span>  <?php echo $getbusinessdetail['area']; ?>, <?php echo $getdistrict['district_name']; ?>, </li>
											<li class="list-inline-item">
												<!-- <span class="flaticon-pin pr5"></span>   -->
												 <?php echo $getstate['state_name']; ?> - <?php echo $getbusinessdetail['pincode']; ?></li>
										</ul>

										</a>
									</div>
									<div class="fp_footer categVf">
										<ul class="fp_meta mb0">
											<li class="list-inline-item"><a class="icon view_profData" id="<?php echo $getbusinessdetail['id']; ?>"><span class="flaticon-zoom"> View Profile</span></a></li>
											<!-- <li class="list-inline-item"><a class="icon" ><span class="flaticon-love"> Wishlist</span></a></li> -->
										</ul>
										<ul class="fp_meta mb0">
											<li class="list-inline-item"><a class="icon view_profData" id="<?php echo $getbusinessdetail['id']; ?>" ><span class="flaticon-zoom">View Profile</span></a></li>
										</ul>
									</div>
								</div>
							</div>

							<?php } } else { ?>

							<div class="col-lg-12 text-align-center"><h3>We Will Coming soon</h3></div>

							<?php } ?>

						</div>
						
					</form>
				</div>
			</div>
						
						<p><br><img src="images/background/inner-pagebg3.jpg" width="100%"></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include("includes/Footer.php"); ?>

	<?php include("includes/footerBottom.php"); ?>

<script type="text/javascript">
  $(document).on('click', '.view_profData', function() {                  
        var profile_id =  $(this).attr('id');
        // alert(profile_id);
        $('#profileViewId').val(profile_id);             
        $('#ListOfCatgeoryProfileItems').attr('method', 'post');
        $('#ListOfCatgeoryProfileItems').attr('action', 'business-category-directory.php');
        $('#ListOfCatgeoryProfileItems').submit();
    });
</script>

</body>
</html>