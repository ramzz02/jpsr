<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  $_SERVER['PHP_SELF'];
 
  $web_link = "https://www.$_SERVER[HTTP_HOST]";
  $actual_link = "https://www.$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  if(isset($_SESSION['temples_added'])){
    if($_SESSION['temples_added']){
      $output = 4101;
    } else {
      $output = 4102;
    }
    unset($_SESSION['temples_added']);
  }


  if(isset($_POST['registeryourtempless'])){

  	$data = array();
  	$data[] = $_POST['location'];
  	$data[] = $_POST['ward_no'];
  	$data[] = $_POST['area'];
    $data[] = $_POST['temple_name'];
    $data[] = $_POST['person_name'];
    $data[] = $_POST['mobile_no'];
    $data[] = $_POST['email'];
    $data[] = $_POST['address'];
    $data[] = $_POST['landmark'];
    $data[] = $_POST['city'];
    
    
    $data[] = $_POST['district'];
    $data[] = $_POST['state'];
    $data[] = $_POST['pincode'];
    $data[] = $_POST['alternative_mobile_no'];
    $data[] = $_POST['landline_no'];
    $data[] = $_POST['website'];
    $data[] = $_POST['workingfrom'].'-'.$_POST['workingto'];
    $data[] = $_POST['temple_description'];
    $data[] = $_POST['special_offer'];


    if($_FILES['logo_image']['name']){

    $Logos = 'temples/'.mt_rand().str_replace(' ', '_', $_FILES['logo_image']['name']);
    $data[] = $Logos;

    $max_size = 800; //max image size in Pixels
	$destination_folder = 'temples';
	$watermark_png_file = 'images/opacity-logo.png'; //watermark png file

	$image_name = $_FILES['logo_image']['name']; //file name
	$image_size = $_FILES['logo_image']['size']; //file size
	$image_temp = $_FILES['logo_image']['tmp_name']; //file temp
	$image_type = $_FILES['logo_image']['type']; //file type

	switch(strtolower($image_type)){ //determine uploaded image type 
		//Create new image from file
		case 'image/png': 
			$image_resource =  imagecreatefrompng($image_temp);
			break;
		case 'image/gif':
			$image_resource =  imagecreatefromgif($image_temp);
			break;          
		case 'image/jpeg': case 'image/pjpeg':
			$image_resource = imagecreatefromjpeg($image_temp);
			break;
		default:
			$image_resource = false;
	}

	if($image_resource){
		//Copy and resize part of an image with resampling
		list($img_width, $img_height) = getimagesize($image_temp);
		
	    //Construct a proportional size of new image
		$image_scale        = min($max_size / $img_width, $max_size / $img_height); 
		$new_image_width    = ceil($image_scale * $img_width);
		$new_image_height   = ceil($image_scale * $img_height);
		$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);

		if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
		{
			
			//center watermark
			$watermark_left = ($new_image_width/2)-(300/2); //watermark left
			$watermark_bottom = ($new_image_height/2)-(100/2); //watermark bottom

			$watermark = imagecreatefrompng($watermark_png_file); //watermark image
			imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 300, 100); //merge image
			
			// //output image direcly on the browser.
			// header('Content-Type: image/jpeg');
			// imagejpeg($new_canvas, NULL , 90);
			
			//Or Save image to the folder
			imagejpeg($new_canvas, $Logos , 90);
			
			//free up memory
			imagedestroy($new_canvas); 
			imagedestroy($image_resource);
		}
	}

    // move_uploaded_file($_FILES['logo_image']['tmp_name'], $Logos);
    } else {
      $data[] = "";
    } 


    if($_FILES['video_path']['name']){

    $Videos = 'temples/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
    $data[] = $Videos;
    move_uploaded_file($_FILES['video_path']['tmp_name'], $Videos);

    } else {
    $data[] = "";   
    }


    $data[] = date("Y/m/d");
    $data[] = $_SESSION['Marketing_User_login']['id'];

    $addform = new Temple();
    $addform = $addform->addTemple($data);
    $addformID = $addform->lastInsertID();


    if(count($_FILES['gallery_images']['error']) >= 1) {
        for($i = 0; $i < count($_FILES['gallery_images']['error']); $i++) {
            if($_FILES['gallery_images']['error'][$i] == 0) {

                $filePath = 'temple_gallery_images/'.date('YmdHis').'_'.$_FILES['gallery_images']['name'][$i];
                $type = $_FILES['gallery_images']['type'][$i];
                $size = $_FILES['gallery_images']['size'][$i];

                $max_size = 800; //max image size in Pixels
				$destination_folder = 'temple_gallery_images';
				$watermark_png_file = 'images/opacity-logo.png'; //watermark png file

				$image_name = $_FILES['gallery_images']['name'][$i]; //file name
				$image_size = $_FILES['gallery_images']['size'][$i]; //file size
				$image_temp = $_FILES['gallery_images']['tmp_name'][$i]; //file temp
				$image_type = $_FILES['gallery_images']['type'][$i]; //file type

				switch(strtolower($image_type)){ //determine uploaded image type 
					//Create new image from file
					case 'image/png': 
						$image_resource =  imagecreatefrompng($image_temp);
						break;
					case 'image/gif':
						$image_resource =  imagecreatefromgif($image_temp);
						break;          
					case 'image/jpeg': case 'image/pjpeg':
						$image_resource = imagecreatefromjpeg($image_temp);
						break;
					default:
						$image_resource = false;
				}

				if($image_resource){
					//Copy and resize part of an image with resampling
					list($img_width, $img_height) = getimagesize($image_temp);
					
				    //Construct a proportional size of new image
					$image_scale        = min($max_size / $img_width, $max_size / $img_height); 
					$new_image_width    = ceil($image_scale * $img_width);
					$new_image_height   = ceil($image_scale * $img_height);
					$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);

					if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
					{
						
						//center watermark
						$watermark_left = ($new_image_width/2)-(300/2); //watermark left
						$watermark_bottom = ($new_image_height/2)-(100/2); //watermark bottom

						$watermark = imagecreatefrompng($watermark_png_file); //watermark image
						imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 300, 100); //merge image
						
						// //output image direcly on the browser.
						// header('Content-Type: image/jpeg');
						// imagejpeg($new_canvas, NULL , 90);
						
						//Or Save image to the folder
						imagejpeg($new_canvas, $filePath , 90);
						
						//free up memory
						imagedestroy($new_canvas); 
						imagedestroy($image_resource);
					}
				}

                // move_uploaded_file($_FILES['gallery_images']['tmp_name'][$i], $filePath); 
                $data_img = array();
                $data_img[] = $addformID;
                $data_img[] = $filePath;
                $data_img[] = $type;
                $data_img[] = $size;

                $addimage = new Temple();
                $addimage = $addimage->addTempleImage($data_img); 
                $addimage_id = $addimage->lastInsertID();
            } 
        }     
    }


	 if($addformID){
        $_SESSION['temples_added'] = true;
     } else {
        $_SESSION['temples_added'] = false;
     }

     header("Location: RegisterTemples");

  }


  $getlocations = new Location();
  $getlocations = $getlocations->fetchLocation("ORDER BY location_name ASC")->resultSet();

  $getstates = new Location();
  $getstates = $getstates->fetchState("ORDER BY state_name ASC")->resultSet();

  $getdistricts = new Location();
  $getdistricts = $getdistricts->fetchDistrict("WHERE state_id = '31' ORDER BY district_name ASC")->resultSet();


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>

		<meta property="og:title" content="JPSR - Know Your Neighbors" />
		<meta property="og:description" content="JPSR is a local guide for all your needs." />
		<meta property="og:url" content="<?php echo $actual_link; ?>" />
		<meta property="og:site_name" content="JPSR - Know Your Neighbors">
		<meta property="og:image" content="<?php echo $web_link; ?>/images/jpsrlogo.png" />
		<meta property="og:image:secure_url" content="<?php echo $web_link; ?>/images/jpsrlogo.png" />
		<meta property="og:image:width" content="400">
		<meta property="og:image:height" content="300">

		<?php include("includes/headerTop.php"); ?>
	</head>
		
	<body>

		<?php include("includes/Header.php"); ?>

<!-- Our Dashbord -->
<section class="our-dashbord dashbord bgc-f4 ovh" style="padding-bottom:0px">
	<div class="container">

		<div class="row">
			<!-- <div class="col-lg-12">
				<div class="dashboard_navigationbar dn db-992">
					<div class="dropdown">
						<button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
						<ul id="myDropdown" class="dropdown-content">
							<li><a href="page-my-dashboard.html"><span class="flaticon-web-page"></span> Dashboard</a></li>
							<li><a href="page-profile.html"><span class="flaticon-avatar"></span> My Profile</a></li>
							<li><a href="page-my-listing.html"><span class="flaticon-list"></span> My Listings</a></li>
							<li><a href="page-my-bookmark.html"><span class="flaticon-love"></span> Bookmarks</a></li>
							<li><a href="page-message.html"><span class="flaticon-chat"></span> Message</a></li>
							<li><a href="page-my-review.html"><span class="flaticon-note"></span> Reviews</a></li>
							<li class="active"><a href="page-add-new-listing.html"><span class="flaticon-web-page"></span> Add New Listing</a></li>
							<li><a href="page-my-logout.html"><span class="flaticon-logout"></span> Logout</a></li>
						</ul>
					</div>
				</div>
			</div> -->
			<div class="col-lg-12">
				<div class="breadcrumb_content style2">
					<h2 class="breadcrumb_title text-thm text-deco-underline"><i class="fa fa-briefcase"></i> Register your Temple</h2>
				</div>
			</div>
		</div>
		
		<div class="row justify-content-center">
			<div class="col-lg-12">

				<?php if(!isset($_SESSION['Marketing_User_login'])){ ?>
					<a data-toggle="modal" data-target=".bd-example-modal-lg">
				<?php } ?>
					<form method="post" enctype="multipart/form-data" id="TempleForm" autocomplete="off">

						<input type="hidden" name="temple_edit_id" id="temple_edit_id">
              			<input type="hidden" name="type" id="type" value="register-ur-temple">
              			<div class="utf_add_listing_part_headline_part">
		                  <h3 class="mb0"><i class="fa fa-tag"></i> Temple Basic Information</h3>
		                </div>
						<div class="my_dashboard_review">
							<div class="row">
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Temple Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="temple_name" id="temple_name" placeholder="Your Temple name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Proprietor (or) Authorized person name <span class="text-danger">*</span></label>
										<input type="text" value="<?php if(isset($_SESSION['Marketing_User_login'])){ echo $_SESSION['Marketing_User_login']['name']; }?>" class="form-control" name="person_name" id="person_name" placeholder="Person name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Mobile No <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="mobile_no" id="mobile_no" value="<?php if(isset($_SESSION['Marketing_User_login'])){ echo $_SESSION['Marketing_User_login']['phone']; }?>" placeholder="Your mobile no">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Email ID <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="email" id="email" placeholder="Your email address">
									</div>
								</div>
								
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Select Location <span class="text-danger">*</span></label>
										<select class="form-control" required id="temple_location" name="location" >
											<option selected="true" disabled="disabled">Select city</option>
											<?php foreach($getlocations as $getlocation){ ?>
											<option value="<?php echo $getlocation['id']; ?>" ><?php echo $getlocation['location_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Temple Ward No <span class="text-optional">(Optional)</span></label>
										<select class="form-control" id="temple_ward_no" name="ward_no">
											<option selected disabled="disabled">Select Ward No</option>
										</select>
									</div>
								</div>

								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Temple Area <span class="text-optional">(Optional)</span></label>
										<select class="form-control" id="temple_area" name="area" >
											<option selected disabled="disabled" >Select Area</option>
										</select>
									</div>
								</div>


								<div class="col-lg-8">
									<div class="my_profile_setting_input form-group">
										<label>Temple Full Address (Door No, Street Name and Area)<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="address" placeholder="Temple Location Address">
									</div>
								</div>
								
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Temple City <span class="text-danger">*</span></label>
										<input type="text" required class="form-control" name="city" id="city" placeholder="City">
									</div>
								</div>

								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Temple State <span class="text-danger">*</span></label>
										<select class="selectpicker" id="state" required name="state" data-live-search="true" data-width="100%">
											<option disabled="disabled">Select State</option>
											<?php foreach($getstates as $getstate){ ?>
											<option value="<?php echo $getstate['id']; ?>" <?php if($getstate['state_name'] == 'Tamil Nadu'){ echo 'selected'; } ?> ><?php echo $getstate['state_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Temple District <span class="text-danger">*</span></label>
										<select class="form-control" id="district" required name="district">
											<option selected disabled="disabled">Select District</option>
											<?php foreach($getdistricts as $getdistrict){ ?>
											<option value="<?php echo $getdistrict['id']; ?>" ><?php echo $getdistrict['district_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Temple Pincode <span class="text-danger">*</span></label>
										<input type="text" required class="form-control" name="pincode" id="pincode" placeholder="Pincode">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Landmark <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="landmark" placeholder="Landmark">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Alternate Contact <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="alternative_mobile_no" id="alternative_mobile_no" placeholder="Mobile no">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Landline with STD Code <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="landline_no" id="landline_no" placeholder="Landline no">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Website <span class="text-optional">(Optional)</span></label>
										<input type="url" class="form-control" name="website" placeholder="Website URL">
										<span class="font-s-14">Ex: http://example.com (or) http://www.example.com</span>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="my_profile_setting_input form-group">
										<label>Working Hours </label>
										<input type="time" class="form-control" name="workingfrom" id="workingfrom" placeholder="Working hours" >
										<label>from</label>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="my_profile_setting_input form-group">
										<label><span class="text-optional">(24 Hours format)</span></label>
										<input type="time" class="form-control" name="workingto" id="workingto" placeholder="Working hours">
										<label>to</label>
									</div>
								</div>
								
								<div class="col-lg-4"></div><div class="col-lg-4"></div>
								<div class="col-lg-12">
									<div class="my_profile_setting_textarea">
										<label for="propertyDescription">Temple Description <span class="text-optional">(Optional)</span></label>
										<textarea class="form-control" name="temple_description" id="editor21" rows="6" ></textarea>
									</div>
								</div>

								<div class="col-lg-12 mt20">
									<div class="my_profile_setting_textarea">
										<label for="propertyDescription">Any Special for this Temple <span class="text-optional">(Optional)</span></label>
										<textarea class="form-control" name="special_offer" id="editor22" rows="6" ></textarea>
									</div>
								</div>
							</div>
						</div>

						<div class="utf_add_listing_part_headline_part mt30">
		                  <h3 class="mb0"><i class="fa fa-credit-card"></i> Upload Media Files</h3>
		                </div>
						<div class="my_dashboard_review">
							<div class="row">

								<div class="col-lg-5">
									<div class="my_profile_setting_input form-group">
										<label>Company Logo </label>
										<input type="file" id="logo_image" name="logo_image" onchange="validateLogo()" class="form-control">
										<span class="note">* Upload only image file </span>
										<div id="preview_logo"></div>
					                	<input type="hidden" name="logo_code" id="logo_code">
									</div>
								</div>

								<div class="col-lg-5" >
									<div class="my_profile_setting_input form-group">
										<label>Gallery Images </label>
										<input type="file"  class="form-control" name="gallery_images[]" id="gallery_images" multiple="multiple" onchange="validateImage()">
										<span class="note">Maximum 5 Images only upload in single time</span><br>
										<span class="note">* Upload only image file </span>
										<div id="preview_gallery"></div>
                    					<input type="hidden" name="gallery_code" id="gallery_code">
									</div>
								</div>

								<div class="col-lg-5">
									<div class="my_profile_setting_input form-group mt10">
										<label>Video </label>
										<input type="file" class="form-control" name="video_path" id="video_path" onchange="validateVideo()" >
										<span class="note">* Upload only video file (MP4 format)</span><br>
					                    <span class="note">* Video duration must upload 30secs only </span>
					                    <div id="preview_video"></div>
					                    <input type="hidden" name="video_code" id="video_code">
									</div>
								</div>

							</div>
						</div>

						<div class="row mb80">
							<div class="col-lg-9 pl0 pr0 pl15-767 pr15-767 text-align-left"><br>

								<div class="weblink_share">

									<span><a id="whatsapp" class="frontend_whatsapp" href="https://api.whatsapp.com/send?text=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp</a></span>

									<span><a id="facebook" class="frontend_facebook " href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-facebook-f" aria-hidden="true"></i> Facebook</a></span>
					
									<span><a id="twitter" class="frontend_twitter" href="https://twitter.com/intent/tweet?url=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></span>

									<span><a id="linkedin" class="frontend_linkedIn" href="http://www.linkedin.com/shareArticle?url=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i> Linked In</a></span>

								</div>

								<br>

							</div>

							<div class="col-lg-3" align="right">
								<button class="btn btn-thm listing_save_btn mt30 temples_add_submit" type="submit" name="registeryourtempless"><i class="fa fa-sign-in"></i> Submit</button>
							</div>
						</div>
					</form>
					<?php if(!isset($_SESSION['Marketing_User_login'])){ ?>
					</a>
					<?php } ?>
			</div>
		</div>
	</div>
	<p><img src="images/background/inner-pagebg3.jpg" width="100%"></p>
</section>

	<?php include("includes/Footer.php"); ?>

	<?php include("includes/footerBottom.php"); ?>
<script type="text/javascript">
	$(document).ready(function(){

	  $('#state').on('change',function(){

	  var stateId = $(this).val();
	  // alert(stateId);

	  if(stateId){

	  $.ajax({

	  type:'POST',

	  url:'listOfDatas.php',

	  data:'state_id='+stateId+'&name=districtName',

	  success:function(response){
	     var parsedData = jQuery.parseJSON(response);
	  // alert(parsedData.data);
	  if(parsedData.status == 'success'){
	     $('#district').html(parsedData.data);
	  } else {
	     $('#district').html(parsedData.data);
	  }

	  }

	  });

	  }else{

	  $('#area').html('<option value="">Select state first</option>');

	  }

	  });


	$('#temple_location').on('change',function(){

	  var loca_id = $(this).val();

	  if(loca_id){

	  $.ajax({

	  type:'POST',

	  url:'listOfDatas.php',

	  data:'location_id='+loca_id+'&name=wardNo',

	  success:function(response){
	     var parsedData = jQuery.parseJSON(response);
	  if(parsedData.status == 'success'){
	     $('#temple_ward_no').html(parsedData.data);
	  } else {
	     $('#temple_ward_no').html(parsedData.data);
	  }

	  }

	  });

	  }else{

	  $('#temple_ward_no').html('<option value="">Select temple city first</option>');

	  }

	 });


	  $('#temple_ward_no').on('change',function(){

	  var ward_id = $(this).val();

	  if(ward_id){

	  $.ajax({

	  type:'POST',

	  url:'listOfDatas.php',

	  data:'ward_id='+ward_id+'&name=areaName',

	  success:function(response){
	     var parsedData = jQuery.parseJSON(response);
	  // alert(parsedData.data);
	  if(parsedData.status == 'success'){
	     $('#temple_area').html(parsedData.data);
	  } else {
	     $('#temple_area').html(parsedData.data);
	  }

	  }

	  });

	  }else{

	  $('#temple_area').html('<option value="">Select ward no first</option>');

	  }

	  });


	});
</script>

<?php
  if(isset($output)) {
  ?>
  <script>
    <?php if($output == 4101){ ?>
      toastr.success("Temple registered successfully","",{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 4102){ ?>
     toastr.error("Failed to register","",{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } ?>
          
  </script>
<?php } ?>
</body>
</html>