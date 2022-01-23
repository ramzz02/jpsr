<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  $getcategorys = new Business();
  $getcategorys = $getcategorys->fetchCategory("WHERE status = '1' ORDER BY category_name ASC")->resultSet();

  $businesscategs = new Business();
  $businesscategs = $businesscategs->fetchCategory("WHERE count != '0' ORDER BY cast(count as int) DESC LIMIT 12")->resultSet();

  $businesscategtotal = new Business();
  $businesscategtotal = $businesscategtotal->fetchCategory("WHERE count != '0' ORDER BY category_name ASC")->resultSet();
  $businesscategtotalcounts = count($businesscategtotal);

  if($_POST['categoryItemId'] != ''){

  	unset($_SESSION['ViewCategID']);
  	$_SESSION['ViewCategID'] = $_POST['categoryItemId'];

  	header('Location: business-category-directory.php');

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
					<form method="post" id="ListOfCatgeoryItems" >
					<input type="hidden" name="categoryItemId" id="categoryItemId">
						<div class="row">

							<?php 
							if(isset($businesscategs)){
							$count = 1;
							foreach($businesscategs as $businesscateg){ 

								if($businesscateg['category_image'] != ''){
									$categ_img_file1 = $businesscateg['category_image'];
								} else {
									$categ_img_file1 = 'images/service/services.jpg';
								}
								
								$categs_servtype = pathinfo($categ_img_file1, PATHINFO_EXTENSION);
								$categ_serv_data = file_get_contents($categ_img_file1);
								$categ_serv_base64_IMg = 'data:image/' . $categs_servtype . ';base64,' . base64_encode($categ_serv_data);

								$categ_icon_file1 = 'images/service/icon3.png';
								$categs_serv_icon_type = pathinfo($categ_icon_file1, PATHINFO_EXTENSION);
								$categ_serv_icon_data = file_get_contents($categ_icon_file1);
								$categ_serv_base64_Icon_IMg = 'data:svg/' . $categs_serv_icon_type . ';base64,' . base64_encode($categ_serv_icon_data);

							?>
							<div class="col-md-6 col-lg-4">
								<a class="view__category_menu_" id="<?php echo $businesscateg['id']; ?>">
									<div class="feat_property">
										<div class="thumb">
											<img class="img-whp categImg_serv" src="<?php echo $categ_serv_base64_IMg; ?>" alt="<?php echo $businesscateg['category_name']; ?>">
										</div>
										<div class="details">
											<div class="fp_footer">
												<ul class="fp_meta float-left mb0 w100">
													<li class="float-left list-inline-item mt5"><img src="<?php echo $categ_serv_base64_Icon_IMg; ?>" alt="Icon"></li>
													<li class="float-left list-inline-item display_name_catgeory mt5"><?php echo $businesscateg['category_name']; ?></li>
												</ul>
											</div>
										</div>
									</div>
								</a>
							</div>
							<?php } } else { ?>
							<?php } ?>

						</div>
						<?php if($businesscategtotalcounts > 12){ ?>
						<div class="col-lg-12">
							<div class="mbp_pagination mt10">
								<div class="new_line_pagination text-center">
									<p>Showing 1 to 12 of <?php echo $businesscategtotalcounts; ?> Results</p>
									<div class="pagination_line"></div>
									<a class="pagi_btn text-thm" href="#">Show More</a>
								</div>
							</div>
						</div>
						<?php } ?>
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
  $(document).on('click', '.view__category_menu_', function() {                  
        var profile_id =  $(this).attr('id');
        // alert(profile_id);
        $('#categoryItemId').val(profile_id);             
        $('#ListOfCatgeoryItems').attr('method', 'post');
        $('#ListOfCatgeoryItems').attr('action', 'business-directory.php');
        $('#ListOfCatgeoryItems').submit();
    });
</script>

</body>
</html>