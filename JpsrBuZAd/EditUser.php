<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');


    if(isset($_POST['userUpdate'])){

        $userprofdatas = new Register();
        $userprofdatas = $userprofdatas->fetchRegister("WHERE id = '{$_POST['user_id']}' ORDER BY id DESC")->resultSet();
        $userprofdata = $userprofdatas[0];

        $data = array();
        $data[] = $_POST['name'];
        $data[] = $_POST['phone'];
        $data[] = $_POST['email'];
        
        $us_Pass = $_POST['password'];
        define ("SECRETKEY", "Newmarket$&AppJpsR001@1CustomEr&UserReg@1");
        $confm_Pass = openssl_encrypt($us_Pass, "AES-128-ECB", SECRETKEY);

        $data[] = $confm_Pass;

        $data[] = $_POST['business_city'];
        $data[] = $_POST['business_display_city'];
        $data[] = $_POST['area'];
        $data[] = $_POST['ward_no'];
        $data[] = $_POST['aadhaar_no'];
        $data[] = $_POST['occupation_type'];

        if($_POST['occupation_type'] == 'salaried') {
        if(!empty($_POST['company_name'])){
        $data[] = $_POST['company_name'];  
        } else {
        $data[] = ""; 
        }
        $data[] = "";
        if(!empty($_POST['salary_income'])){
        $data[] = $_POST['salary_income'];  
        } else {
        $data[] = ""; 
        }
        $data[] = "";
        } else if($_POST['occupation_type'] == 'self employee') {
        $data[] = "";
        if(!empty($_POST['business_name'])){
        $data[] = $_POST['business_name'];  
        } else {
        $data[] = ""; 
        }
        $data[] = "";
        if(!empty($_POST['business_income'])){
        $data[] = $_POST['business_income'];  
        } else {
        $data[] = ""; 
        }
            
        } else {
        $data[] = "";
        $data[] = "";
        $data[] = "";
        $data[] = "";
        }

        if($_FILES['profile_picture']['name']){

        $profPics = 'profile_pictures/'.mt_rand().str_replace(' ', '_', $_FILES['profile_picture']['name']);
        $data[] = $profPics;

        $max_size = 800; //max image size in Pixels
        $destination_folder = '../profile_pictures';
        $watermark_png_file = '../images/opacity-logo.png'; //watermark png file

        $image_name = $_FILES['profile_picture']['name']; //file name
        $image_size = $_FILES['profile_picture']['size']; //file size
        $image_temp = $_FILES['profile_picture']['tmp_name']; //file temp
        $image_type = $_FILES['profile_picture']['type']; //file type

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
                imagejpeg($new_canvas, '../'.$profPics , 90);
                
                //free up memory
                imagedestroy($new_canvas); 
                imagedestroy($image_resource);
            }
        }

        // move_uploaded_file($_FILES['logo_image']['tmp_name'], $Logos);
        } else {
          $data[] = $userprofdata['profile_pic'];
        } 

        $data[] = $_POST['user_id'];

        $updateform = new Register();
        $updateform = $updateform->updateAdminRegister($data);
        $updateformID = $updateform->rowCount();

        $ttl_count = count($_POST['member_name']);

        if($ttl_count != 0) {


            $dataMember = array();
            $dataMember[] = $_POST['user_id'];

            $deletefile = new Register();
            $deletefile = $deletefile->removeUserMember($dataMember);
            $deletefile_id = $deletefile->rowCount();


            for($i=0;$i<$ttl_count;$i++){

              if(!empty($_POST['member_name'][$i])){

              $list_m = array();
              $list_m[] = $_POST['user_id'];
              $list_m[] = $_POST['member_name'][$i];
              $list_m[] = $_POST['member_dob'][$i];
              $list_m[] = $_POST['member_relationship'][$i];
              $list_m[] = $_POST['member_wedding_day'][$i];


              $addmember = new Register();
              $addmember = $addmember->addMember($list_m);
              $addmemberID = $addmember->lastInsertID();

              }

            }

        }

        if($updateformID || $addmemberID){
          $_SESSION['user_updated'] = true;
       } else {
          $_SESSION['user_updated'] = false;
       }

       header("Location: UserList");

    }


    if(isset($_POST['submit_id'])){

    $getcontents = new Register();
    $getcontents = $getcontents->fetchRegister("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];

    $getuserswards = new Location();
    $getuserswards = $getuserswards->fetchWard("WHERE status = '1' AND location = '{$getcontent["business_display_city"]}' ORDER BY ward_no ASC")->resultSet();

    $getuserAreas = new Location();
    $getuserAreas = $getuserAreas->fetchArea("WHERE status = '1' AND ward_no = '{$getcontent["ward_no"]}' ORDER BY area_name ASC")->resultSet();

    $edit_Pass = $getcontent['password'];
    define ("SECRETKEY", "Newmarket$&AppJpsR001@1CustomEr&UserReg@1");
    $view_Pass = openssl_decrypt($edit_Pass, "AES-128-ECB", SECRETKEY);

    $getmembers = new Register();
    $getmembers = $getmembers->fetchMember("WHERE user_id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();

    }

$getcitieslists = new Location();
$getcitieslists = $getcitieslists->fetchLocation("ORDER BY location_name ASC")->resultSet();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/headertop.php"); ?>
<style type="text/css">
    .select2-results__group {
        display: none!important;
    }
</style>
</head>

<body class="header-dark sidebar-light sidebar-expand">
    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <?php include("includes/header.php"); ?>
        <!-- /.navbar -->
    <div class="content-wrapper">
        <!-- SIDEBAR -->
        <?php include("includes/left-menu.php"); ?>
        <!-- /.site-sidebar -->
        <main class="main-wrapper clearfix" style="min-height: 673px;">
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5">User Details</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div>
                <!-- /.page-title-right -->
            </div>
            <!-- /.page-title -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="alert alert-danger" id="message_container" role="alert" style="display: none;">
                           <span class="message" id="message"></span>
                        </div>
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <form method="post" id="EditRegisterForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="user_id" id="user_id" value="<?php echo $getcontent['id']; ?>">

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="name" name="name" class="form-control mb-0" value="<?php echo $getcontent['name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Mobile No <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="phone" name="phone" class="form-control mb-0" value="<?php echo $getcontent['phone']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Email ID <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="email" name="email" class="form-control mb-0" value="<?php echo $getcontent['email']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePassword">Password <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control mb-0" value="<?php echo $view_Pass; ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Location City <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="business_city" name="business_city" class="form-control mb-0" value="<?php echo $getcontent['city']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Display City <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="business_display_city" name="business_display_city" class="form-control mb-0" >
                                            <option selected disabled value="">Select City</option>
                                            <?php foreach($getcitieslists as $getcitieslist){ ?>
                                            <option value="<?php echo $getcitieslist['id']; ?>" <?php if($getcontent['business_display_city'] == $getcitieslist['id']){ echo 'selected'; } ?> ><?php echo $getcitieslist['location_name']; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Ward No <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <select id="ward_no" name="ward_no" class="form-control mb-0" >
                                            <option selected disabled value="">Select Ward No</option>
                                            <?php 
                                            if(!empty($getuserswards)){
                                            foreach($getuserswards as $getusersward){
                                            ?>
                                            <option value="<?php echo $getusersward['id']; ?>" <?php if($userdata['ward_no'] == $getusersward['id']){ echo 'selected'; } ?> ><?php echo $getusersward['ward_no']; ?></option>
                                            <?php } } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Area <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <select id="area" name="area" class="form-control mb-0" >
                                            <option selected disabled value="">Select Area</option>
                                            <?php 
                                            if(!empty($getuserAreas)){
                                            foreach($getuserAreas as $getuserArea){
                                            ?>
                                            <option value="<?php echo $getuserArea['id']; ?>" <?php if($userdata['area'] == $getuserArea['id']){ echo 'selected'; } ?> ><?php echo $getuserArea['area_name']; ?></option>
                                            <?php } } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Aadhaar No <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="aadhaar_no" name="aadhaar_no" class="form-control mb-0" value="<?php echo $getcontent['aadhaar_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Occupation Type <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <select id="occupation_type" name="occupation_type" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                                <option value="student" <?php if($getcontent['occupation_type'] == 'student'){ echo 'selected'; } ?> >Student</option>
                                                <option value="home maker" <?php if($getcontent['occupation_type'] == 'home maker'){ echo 'selected'; } ?> >Home Maker</option>
                                                <option value="salaried" <?php if($getcontent['occupation_type'] == 'salaried'){ echo 'selected'; } ?> >Salaried</option>
                                                <option value="self employee" <?php if($getcontent['occupation_type'] == 'self employee'){ echo 'selected'; } ?> >Self Employee</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left" id="CompanyN" <?php if($getcontent['occupation_type'] == 'salaried'){ ?> style="display: block" <?php } else { ?> style="display: none;" <?php } ?>  >
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Company Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="company_name" name="company_name" class="form-control mb-0" value="<?php echo $getcontent['company_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left" id="BusinessN" <?php if($getcontent['occupation_type'] == 'self employee'){ ?> style="display: block" <?php } else { ?> style="display: none;" <?php } ?> >
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="business_name" name="business_name" class="form-control mb-0" value="<?php echo $getcontent['business_name']; ?>" >
                                        </div>
                                    </div>

                                     <div class="form-group row col-sm-4 float-left" id="CompanyI" <?php if($getcontent['occupation_type'] == 'salaried'){ ?> style="display: block" <?php } else { ?> style="display: none;" <?php } ?> >
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Salary Income <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <select id="salary_income" name="salary_income" class="form-control mb-0" >
                                            <option value="" Selected Disabled>Select Income</option>
                                            <option value="Below 10,000" <?php if($getcontent['salary_income'] == 'Below 10,000'){ echo 'selected'; } ?> >Below 10,000</option>
                                            <option value="Below 25,000" <?php if($getcontent['salary_income'] == 'Below 25,000'){ echo 'selected'; } ?> >Below 25,000</option>
                                            <option value="Below 50,000" <?php if($getcontent['salary_income'] == 'Below 50,000'){ echo 'selected'; } ?> >Below 50,000</option>
                                            <option value="Above 50,000" <?php if($getcontent['salary_income'] == 'Above 50,000'){ echo 'selected'; } ?> >Above 50,000</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left" id="BusinessI" <?php if($getcontent['occupation_type'] == 'self employee'){ ?> style="display: block" <?php } else { ?> style="display: none;" <?php } ?> >
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Income <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <select id="business_income" name="business_income" class="form-control mb-0" >
                                            <option value="" Selected Disabled>Select Income</option>
                                            <option value="Below 10,000" <?php if($getcontent['business_income'] == 'Below 10,000'){ echo 'selected'; } ?> >Below 10,000</option>
                                            <option value="Below 25,000" <?php if($getcontent['business_income'] == 'Below 25,000'){ echo 'selected'; } ?> >Below 25,000</option>
                                            <option value="Below 50,000" <?php if($getcontent['business_income'] == 'Below 50,000'){ echo 'selected'; } ?> >Below 50,000</option>
                                            <option value="Above 50,000" <?php if($getcontent['business_income'] == 'Above 50,000'){ echo 'selected'; } ?> >Above 50,000</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4" >
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Profile Picture <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <?php if($getcontent['profile_pic'] != ''){ ?>
                                                <img src="../<?php echo $getcontent['profile_pic']; ?>" style="width: 20%;">
                                            <?php } ?>
                                            <input type="file" id="logo_image" name="profile_picture" onchange="validateLogo()" class="form-control mb-0" >
                                            <span>* Upload only image file </span>
                                            <div id="preview_logo"></div>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <span class="note" style="font-size: 20px;">Family Members</span>
                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member name 1 </label>
                                        <div class="col-sm-10">
                                            <input type="text" id="member_name" name="member_name[]" class="form-control mb-0" value="<?php echo $getmembers[0]['member_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member DOB </label>
                                        <div class="col-sm-10">
                                            <input type="date" id="member_dob" name="member_dob[]" class="form-control mb-0" value="<?php echo $getmembers[0]['member_dob']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member Relationship </label>
                                        <div class="col-sm-10">
                                            <input type="text" id="member_relationship" name="member_relationship[]" class="form-control mb-0" value="<?php echo $getmembers[0]['member_relationship']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member wedding day </label>
                                        <div class="col-sm-10">
                                            <input type="date" id="member_wedding_day" name="member_wedding_day[]" class="form-control mb-0" value="<?php echo $getmembers[0]['member_wedding_day']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member name 2 </label>
                                        <div class="col-sm-10">
                                            <input type="text" id="member_name" name="member_name[]" class="form-control mb-0" value="<?php echo $getmembers[1]['member_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member DOB </label>
                                        <div class="col-sm-10">
                                            <input type="date" id="member_dob" name="member_dob[]" class="form-control mb-0" value="<?php echo $getmembers[1]['member_dob']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member Relationship </label>
                                        <div class="col-sm-10">
                                            <input type="text" id="member_relationship" name="member_relationship[]" class="form-control mb-0" value="<?php echo $getmembers[1]['member_relationship']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member wedding day </label>
                                        <div class="col-sm-10">
                                            <input type="date" id="member_wedding_day" name="member_wedding_day[]" class="form-control mb-0" value="<?php echo $getmembers[1]['member_wedding_day']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member name 3 </label>
                                        <div class="col-sm-10">
                                            <input type="text" id="member_name" name="member_name[]" class="form-control mb-0" value="<?php echo $getmembers[2]['member_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member DOB </label>
                                        <div class="col-sm-10">
                                            <input type="date" id="member_dob" name="member_dob[]" class="form-control mb-0" value="<?php echo $getmembers[2]['member_dob']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member Relationship </label>
                                        <div class="col-sm-10">
                                            <input type="text" id="member_relationship" name="member_relationship[]" class="form-control mb-0" value="<?php echo $getmembers[2]['member_relationship']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member wedding day </label>
                                        <div class="col-sm-10">
                                            <input type="date" id="member_wedding_day" name="member_wedding_day[]" class="form-control mb-0" value="<?php echo $getmembers[2]['member_wedding_day']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member name 4 </label>
                                        <div class="col-sm-10">
                                            <input type="text" id="member_name" name="member_name[]" class="form-control mb-0" value="<?php echo $getmembers[3]['member_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member DOB </label>
                                        <div class="col-sm-10">
                                            <input type="date" id="member_dob" name="member_dob[]" class="form-control mb-0" value="<?php echo $getmembers[3]['member_dob']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member Relationship </label>
                                        <div class="col-sm-10">
                                            <input type="text" id="member_relationship" name="member_relationship[]" class="form-control mb-0" value="<?php echo $getmembers[3]['member_relationship']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-3 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Member wedding day </label>
                                        <div class="col-sm-10">
                                            <input type="date" id="member_wedding_day" name="member_wedding_day[]" class="form-control mb-0" value="<?php echo $getmembers[3]['member_wedding_day']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-4 no-padding" align="right">
                                        <button class="btn btn-default" onclick="window.location.href = 'UserList';" type="reset">Cancel</button>
                                        <button class="btn btn-primary register_edit_user_submit" type="submit" name="userUpdate">Update</button>
                                        
                                    </div>
                                </form>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.widget-list -->
        </main>
        <!-- /.main-wrappper -->
    </div>
    <!-- /.content-wrapper -->
    <!-- FOOTER -->
    <?php include("includes/footer.php"); ?>
    </div>
    <!--/ #wrapper -->
    <?php include("includes/footerbottom.php"); ?>

<script type="text/javascript">
  $('#occupation_type').on('change', function() {
  if(this.value == 'salaried'){
    $('#CompanyN').show();
    $('#CompanyI').show();
    $('#BusinessN').hide();
    $('#BusinessI').hide();
  } else if(this.value == 'self employee'){
    $('#BusinessN').show();
    $('#BusinessI').show();
    $('#CompanyN').hide();
    $('#CompanyI').hide();
  } else {
    $('#BusinessN').hide();
    $('#BusinessI').hide();
    $('#CompanyN').hide();
    $('#CompanyI').hide();
  }
});
</script>
<script type="text/javascript">

$(document).ready(function(){

  $('#business_display_city').on('change',function(){

  var loca_id = $(this).val();

  if(loca_id){

  $.ajax({

  type:'POST',

  url:'../listOfDatas.php',

  data:'location_id='+loca_id+'&name=wardNo',

  success:function(response){
     var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.data);
  if(parsedData.status == 'success'){
     $('#ward_no').html(parsedData.data);
  } else {
     $('#ward_no').html(parsedData.data);
  }

  }

  });

  }else{

  $('#ward_no').html('<option value="">Select business city first</option>');

  }

  });


  $('#ward_no').on('change',function(){

  var ward_id = $(this).val();

  if(ward_id){

  $.ajax({

  type:'POST',

  url:'../listOfDatas.php',

  data:'ward_id='+ward_id+'&name=areaName',

  success:function(response){
     var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.data);
  if(parsedData.status == 'success'){
     $('#area').html(parsedData.data);
  } else {
     $('#area').html(parsedData.data);
  }

  }

  });

  }else{

  $('#area').html('<option value="">Select ward no first</option>');

  }

  });

});
</script>

<?php
  if(isset($output)) {
  ?>
  <script>
      $('#message_container').fadeIn(10);
      $('#message').text("<?php echo $output; ?>");
      setTimeout(function() {
          $('#message_container').fadeOut(400, function() {
              $('#message').text("");
          });
      }, 1000);
  </script>
  <?php
      }
  ?>
</body>
</html>