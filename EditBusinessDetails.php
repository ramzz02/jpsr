<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');


  if(isset($_POST['updateyourbusiness_data'])){

  	$getupdatecontents = new Business();
    $getupdatecontents = $getupdatecontents->fetchBusiness("WHERE id = '{$_POST['business_edit_id']}' ORDER BY id DESC")->resultSet();
    $getupdatecontent = $getupdatecontents[0];

  	$data = array();
    $data[] = $_POST['business_name'];
    $data[] = $_POST['person_name'];
    $data[] = $_POST['mobile_no'];
    $data[] = $_POST['email'];
    $data[] = $_POST['address'];
    $data[] = $_POST['landmark'];
    $data[] = $_POST['area'];
    $data[] = $_POST['ward_no'];
    $data[] = $_POST['city'];
    $data[] = $_POST['location'];

    $data[] = $_POST['district'];
    $data[] = $_POST['state'];
    $data[] = $_POST['pincode'];
    $data[] = $_POST['alternative_mobile_no'];
    $data[] = $_POST['landline_no'];
    $data[] = $_POST['website'];
    $data[] = $_POST['workingfrom'].'-'.$_POST['workingto'];

    if($_POST['category'] != $getupdatecontent['category']){

    if($getupdatecontent['status'] == 'active'){

      $gettingcategorys = new Business();
	  $gettingcategorys = $gettingcategorys->fetchCategory("WHERE id = '{$getupdatecontent['category']}' ORDER BY id DESC")->resultSet();
	  $gettingcateg = $gettingcategorys[0];
    
	  $categCount = $gettingcateg['count'] - 1;

	  $datacount = array();
	  $datacount[] = $categCount;
	  $datacount[] = $gettingcateg['id'];

	  $updateform = new Business();
	  $updateform = $updateform->updateCategoryCount($datacount);
	  $updateformID = $updateform->rowCount();


	  }

    if($_POST['category'] == 'Others'){

    $dCateg = array();
    $dCateg[] = $_POST['other_category'];

    $addform = new Business();
    $addform = $addform->addCategory($dCateg);
    $addformID = $addform->lastInsertID();
    $data[] = $addformID;

    if($getupdatecontent['status'] == 'active'){

      $gettingcategorys = new Business();
	  $gettingcategorys = $gettingcategorys->fetchCategory("WHERE id = '{$addformID}' ORDER BY id DESC")->resultSet();
	  $gettingcateg = $gettingcategorys[0];
    
	  $categCount = $gettingcateg['count'] + 1;

	  $datacount = array();
	  $datacount[] = $categCount;
	  $datacount[] = $gettingcateg['id'];

	  $updateform = new Business();
	  $updateform = $updateform->updateCategoryCount($datacount);
	  $updateformID = $updateform->rowCount();


	  }


    } else {
    $data[] = $_POST['category'];  

    if($getupdatecontent['status'] == 'active'){

      $gettingcategorys = new Business();
	  $gettingcategorys = $gettingcategorys->fetchCategory("WHERE id = '{$_POST['category']}' ORDER BY id DESC")->resultSet();
	  $gettingcateg = $gettingcategorys[0];
    
	  $categCount = $gettingcateg['count'] + 1;

	  $datacount = array();
	  $datacount[] = $categCount;
	  $datacount[] = $gettingcateg['id'];

	  $updateform = new Business();
	  $updateform = $updateform->updateCategoryCount($datacount);
	  $updateformID = $updateform->rowCount();


	  }


    }

	} else {
	$data[] = $getupdatecontent['category'];	
	}

    $data[] = $_POST['refered_by'];


    $data[] = $_POST['refered_by_code'];

    $data[] = $_POST['business_description'];


    $data[] = $_POST['business_edit_id'];


    $updateformdata = new Business();
    $updateformdata = $updateformdata->updateSingleBusinessUser($data);
    $updateformdataID = $updateformdata->rowCount();


	if($updateformdataID){

		$getupdcontents = new Business();
        $getupdcontents = $getupdcontents->fetchBusiness("WHERE id = '{$_POST['business_edit_id']}' ORDER BY id DESC")->resultSet();
        $getupdcontent = $getupdcontents[0];

        if($getupdcontent['status'] == 'active'){

	        $gettingcategorys = new Business();
			$gettingcategorys = $gettingcategorys->fetchCategory("WHERE id = '{$getupdcontent['category']}' ORDER BY id DESC")->resultSet();
			$gettingcateg = $gettingcategorys[0];

			$categCount = $gettingcateg['count'] - 1;

		  $datacount = array();
		  $datacount[] = $categCount;
		  $datacount[] = $gettingcateg['id'];

		  $updateform = new Business();
		  $updateform = $updateform->updateCategoryCount($datacount);
		  $updateformID = $updateform->rowCount();

		}

		$dataBy = array();
		$dataBy[] = "deactive";
		$dataBy[] = $_SESSION['Marketing_User_login']['id'];
	    $dataBy[] = date("Y/m/d");
	    $dataBy[] = $_POST['business_edit_id'];

	    
	    $updateformdataBy = new Business();
	    $updateformdataBy = $updateformdataBy->updateSingleBusinessUserBy($dataBy);
	    $updateformdataByID = $updateformdataBy->rowCount();

        $_SESSION['business_profile_updated'] = true;
    } else {
        $_SESSION['business_profile_updated'] = false;
    }

     header("Location: userbusinesslisting");


  }

      if(isset($_POST['submit_business_id'])){


        $getcontents = new Business();
        $getcontents = $getcontents->fetchBusiness("WHERE id = '{$_POST['submit_business_id']}' ORDER BY id DESC")->resultSet();
        $getcontent = $getcontents[0];

        $timeSet = explode("-", $getcontent['working_hour']);

    }


  $getcategorys = new Business();
  $getcategorys = $getcategorys->fetchCategory("WHERE status = '1' ORDER BY category_name ASC")->resultSet();

  $getlocations = new Location();
  $getlocations = $getlocations->fetchLocation("ORDER BY location_name ASC")->resultSet();

  $getstates = new Location();
  $getstates = $getstates->fetchState("ORDER BY state_name ASC")->resultSet();

  $getdistricts = new Location();
  $getdistricts = $getdistricts->fetchDistrict("WHERE state_id = '31' ORDER BY district_name ASC")->resultSet();

  $getplans = new Business();
  $getplans = $getplans->fetchPlan("ORDER BY id ASC LIMIT 3")->resultSet();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
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
					<h2 class="breadcrumb_title text-thm text-deco-underline"><i class="fa fa-briefcase"></i> Your Business Profile</h2>
				</div>
			</div>
		</div>
		
		<div class="row justify-content-center">
			<div class="col-lg-12">

					<form method="post" enctype="multipart/form-data" id="RegisterBusinessForm" autocomplete="off">

						<input type="hidden" name="business_edit_id" id="business_edit_id" value="<?php echo $getcontent['id']; ?>">
              			<input type="hidden" name="type" id="type" value="register-ur-business">
              			<div class="utf_add_listing_part_headline_part">
		                  <h3 class="mb0"><i class="fa fa-tag"></i> Business Profile Details</h3>
		                </div>
						<div class="my_dashboard_review">
							<div class="row">
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="business_name" id="business_name" placeholder="Your business name" value="<?php echo $getcontent['business_name']; ?>">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Proprietor (or) Authorized person name <span class="text-danger">*</span></label>
										<input type="text" value="<?php echo $getcontent['person_name']; ?>" class="form-control" name="person_name" id="person_name" placeholder="Person name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Mobile No <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="mobile_no" id="mobile_no" value="<?php echo $getcontent['mobile_no']; ?>" placeholder="Your mobile no">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Email ID <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="email" id="email" placeholder="Your email address" value="<?php echo $getcontent['email']; ?>">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Category <span class="text-danger">*</span></label>
										<select class="form-control" required data-live-search="true" name="category" id="category" >
											<option selected disabled value="">Select Categories</option>
											<?php foreach($getcategorys as $getcategory){ ?>
											<option value="<?php echo $getcategory['id']; ?>" <?php if($getcontent['category'] == $getcategory['id']){ echo 'selected'; } ?> ><?php echo $getcategory['category_name']; ?></option>
											<?php } ?>
											<option value="Others" <?php if($getcontent['category'] == 'Others'){ echo 'selected'; } ?> >Others</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group" id="other_categ" >
										<label>If Not Select Others, Enter New Category </label>
										<input type="text" class="form-control" name="other_category1" id="other_category1" placeholder="Enter New Category name" value="">
									</div>
									<div class="my_profile_setting_input form-group" id="other_categ_new" style="display: none" >
										<label>If Not Select Others, Enter New Category <span class="text-danger">*</span></label>
										<input type="text" class="form-control"required name="other_category" id="other_category" placeholder="Enter New Category name" value="">
									</div>
								</div>
								
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Business Display City <span class="text-danger">*</span></label>
										<select class="form-control" id="location" name="location">
											<option selected="true" disabled="disabled">Select city</option>
											<?php foreach($getlocations as $getlocation){ ?>
											<option value="<?php echo $getlocation['id']; ?>" <?php if($getcontent['location'] == $getlocation['id']){ echo 'selected'; } ?>  ><?php echo $getlocation['location_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="my_profile_setting_input form-group">
										<label>Business Full Address (Door No & Street)<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="address" placeholder="Business Location Address" value="<?php echo $getcontent['address']; ?>">
									</div>
								</div>
								
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Area <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="area" placeholder="Area name" value="<?php echo $getcontent['area']; ?>" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Area Ward No <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="ward_no" placeholder="Ward no" value="<?php echo $getcontent['ward_no']; ?>" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business City <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="city" placeholder="City name" value="<?php echo $getcontent['city']; ?>" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Business State <span class="text-danger">*</span></label>
										<select class="selectpicker" id="state" required name="state" data-live-search="true" data-width="100%">
											<option disabled="disabled">Select State</option>
											<?php foreach($getstates as $getstate){ ?>
											<option value="<?php echo $getstate['id']; ?>" <?php if($getcontent['state'] == $getstate['id']){ echo 'selected'; } ?> ><?php echo $getstate['state_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Business District <span class="text-danger">*</span></label>
										<select class="form-control" id="district" required name="district">
											<option selected disabled="disabled">Select District</option>
											<?php foreach($getdistricts as $getdistrict){ ?>
											<option value="<?php echo $getdistrict['id']; ?>" <?php if($getcontent['district'] == $getdistrict['id']){ echo 'selected'; } ?> ><?php echo $getdistrict['district_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Pincode <span class="text-danger">*</span></label>
										<input type="text" required class="form-control" name="pincode" id="pincode" placeholder="Pincode" value="<?php echo $getcontent['pincode']; ?>" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Landmark <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="landmark" placeholder="Landmark" value="<?php echo $getcontent['landmark']; ?>" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Alternate Contact <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="alternative_mobile_no" id="alternative_mobile_no" placeholder="Mobile no" value="<?php echo $getcontent['alternative_mobile_no']; ?>" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Landline with STD Code <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="landline_no" id="landline_no" placeholder="Landline no" value="<?php echo $getcontent['landline_no']; ?>">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Website <span class="text-optional">(Optional)</span></label>
										<input type="url" class="form-control" name="website" placeholder="Website URL" value="<?php echo $getcontent['website']; ?>" >
										<span class="font-s-14">Ex: http://example.com (or) http://www.example.com</span>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="my_profile_setting_input form-group">
										<label>Working Hours</label>
										<input type="time" class="form-control" name="workingfrom" id="workingfrom" placeholder="Working hours" value="<?php echo $timeSet[0]; ?>" >
										<label>from</label>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="my_profile_setting_input form-group">
										<label><span class="text-optional">(24 Hours format)</span></label>
										<input type="time" class="form-control" name="workingto" id="workingto" placeholder="Working hours" value="<?php echo $timeSet[1]; ?>">
										<label>to</label>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>JPSR Agent Name <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" id="refered_by" name="refered_by" placeholder="Agent person name" value="<?php echo $getcontent['refered_by']; ?>" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Agent Reference Code <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="refered_by_code" id="refered_by_code" placeholder="Agent person code" value="<?php echo $getcontent['refered_by_code']; ?>" >
									</div>
								</div>
								<div class="col-lg-4"></div><div class="col-lg-4"></div>
								<div class="col-lg-12">
									<div class="my_profile_setting_textarea">
										<label for="propertyDescription">Business Description <span class="text-optional">(Optional)</span></label>
										<textarea class="form-control" name="business_description" id="editor21" rows="6" ><?php echo $getcontent['business_description']; ?></textarea>
									</div>
								</div>

							</div>
						</div>


						<div class="row mb80">

							<div class="col-lg-12" align="right">
								<a href="userbusinesslisting"><button class="btn btn-thm listing_cancel_btn mt30" type="button" ><i class="fa fa-sign-in"></i> Cancel</button></a>
								<button class="btn btn-thm listing_save_btn mt30" type="submit" name="updateyourbusiness_data"><i class="fa fa-sign-in"></i> Update Business</button>
							</div>
						</div>
					</form>

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


	});
</script>
<script type="text/javascript">
  $('#category').on('change', function() {
    if(this.value == 'Others'){
      $('#other_categ').hide();
      $('#other_categ_new').show();
      
    } else {
      $('#other_categ').show();
      $('#other_categ_new').hide();
    }
});
</script>

</body>
</html>