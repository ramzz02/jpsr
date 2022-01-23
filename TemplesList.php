<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');


  $getTemplesdetails = new Temple();
  $getTemplesdetails = $getTemplesdetails->fetchTemple("WHERE status = 'active' ORDER BY id DESC")->resultSet();


  if($_POST['profileViewId'] != ''){

	$viewprofiledetails = new Temple();
	$viewprofiledetails = $viewprofiledetails->fetchTemple("WHERE id = '{$_POST['profileViewId']}' ")->resultSet();
	$viewprofiledetail = $viewprofiledetails[0];

	$busineeN = str_replace(" ", "-", $viewprofiledetail['temple_name']);

	$randumNo = mt_rand(291123,987892);


	$UrlLink = "ViewTemple?temple_view=".$_POST['profileViewId']."/Temples/".$randumNo."/TempleName=".$busineeN;

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
	<section class="inner_page_breadcrumb temple">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content style2 mb0-991">
						<h1 class="breadcrumb_title text-thm">Temples</h1>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item active" aria-current="page">Know your Neighbors</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<p class="text-align-right Add_Btn_text" ><a href="RegisterTemples" class="btn btn-thm btn-lg rounded"><i class="fa fa-briefcase"></i> Add Your Temple</a></p>
	<!-- Listing Grid View -->
	<section class="our-listing bgc-f4">
		<div class="container">

			<?php include("includes/directory-Responsive-leftBar.php"); ?>

			<div class="row">

				<?php include("includes/directory-web-leftBar.php"); ?>


				<div class="col-xl-8">
					<form method="post" id="ListOfCatgeoryProfileItems" >
					<input type="hidden" name="profileViewId" id="profileViewId">
						<div class="row">

							<?php
							if(!empty($getTemplesdetails)){
								foreach($getTemplesdetails as $getTemplesdetail){


								$getstates = new Location();
								$getstates = $getstates->fetchState("WHERE id = '{$getTemplesdetail['state']}' ORDER BY state_name ASC")->resultSet();
								$getstate = $getstates[0];

								$getdistricts = new Location();
								$getdistricts = $getdistricts->fetchDistrict("WHERE id = '{$getTemplesdetail['district']}' ORDER BY district_name ASC")->resultSet();
								$getdistrict = $getdistricts[0];

								if($getTemplesdetail['temple_image'] != ''){
									$logo_img_file1 = $getTemplesdetail['temple_image'];
								} else {
									$logo_img_file1 = 'images/nologo.jpg';
								}
								
								$logo_type = pathinfo($logo_img_file1, PATHINFO_EXTENSION);
								$logo_data = file_get_contents($logo_img_file1);
								$logo_base64_IMg = 'data:image/' . $logo_type . ';base64,' . base64_encode($logo_data);

							?>
							<div class="feat_property list col-lg-12">
								<div class="thumb col-lg-3 p0 view_profData" id="<?php echo $getTemplesdetail['id']; ?>">
									<img class="img-whp" src="<?php echo $logo_base64_IMg; ?>" alt="Temple Logo">
								</div>
								<div class="details col-lg-9">
									<div class="tc_content content_NQi_">

										<a class="view_profData" id="<?php echo $getTemplesdetail['id']; ?>">

										<h4><?php echo $getTemplesdetail['temple_name']; ?></h4>
										<!-- <i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i> -->
										<p><span class="fa fa-address-card pr5"></span> <?php echo $getTemplesdetail['person_name']; ?></p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span class="flaticon-pin pr5"></span>  <?php echo $getTemplesdetail['area']; ?>, <?php echo $getdistrict['district_name']; ?>, </li>
											<li class="list-inline-item">
												<!-- <span class="flaticon-pin pr5"></span>   -->
												 <?php echo $getstate['state_name']; ?> - <?php echo $getTemplesdetail['pincode']; ?></li>
										</ul>

										</a>
									</div>
									<div class="fp_footer categVf">
										<ul class="fp_meta mb0">
											<li class="list-inline-item"><a class="icon view_profData" id="<?php echo $getTemplesdetail['id']; ?>"><span class="flaticon-zoom"> View Profile</span></a></li>
											<!-- <li class="list-inline-item"><a class="icon" ><span class="flaticon-love"> Wishlist</span></a></li> -->
										</ul>
										<ul class="fp_meta mb0">
											<li class="list-inline-item"><a class="icon view_profData" id="<?php echo $getTemplesdetail['id']; ?>" ><span class="flaticon-zoom">View Profile</span></a></li>
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
        $('#ListOfCatgeoryProfileItems').attr('action', 'TemplesList.php');
        $('#ListOfCatgeoryProfileItems').submit();
    });
</script>

</body>
</html>