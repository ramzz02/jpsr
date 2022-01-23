<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');


  if(isset($_SESSION['business_added'])){
    if($_SESSION['business_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['business_added']);
    }

    if(isset($_POST['productSubmit'])){

        $data = array();
        $data[] = $_POST['business_name'];
        $data[] = $_POST['person_name'];
        $data[] = "";
        // $data[] = $_POST['login_user_mobile_no'];
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
        $data[] = $_POST['category'];


        if($_POST['plan_id'] == 1 || $_POST['plan_id'] == 2 || $_POST['plan_id'] == 3){

            if($_FILES['logo_image']['name']){

            $Logos = 'logo/'.mt_rand().str_replace(' ', '_', $_FILES['logo_image']['name']);
            $data[] = $Logos;

            $max_size = 800; //max image size in Pixels
            $destination_folder = '../logo';
            $watermark_png_file = '../images/opacity-logo.png'; //watermark png file

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
                    imagejpeg($new_canvas, '../'.$Logos , 90);
                    
                    //free up memory
                    imagedestroy($new_canvas); 
                    imagedestroy($image_resource);
                }
            }

            // move_uploaded_file($_FILES['logo_image']['tmp_name'], $Logos);
            } else {
              $data[] = "";
            } 

        }
        else {
        $data[] = "";   
        }

        if($_POST['plan_id'] == 3){

        if($_FILES['video_path']['name']){

        $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
        $data[] = $Videos;
        move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);

        } else {
        $data[] = "";   
        }

        } else {
        $data[] = "";   
        }

        $data[] = $_POST['refered_by'];


        $data[] = $_POST['refered_by_code'];
        $data[] = $_POST['business_description'];
        // $data[] = $_POST['special_offer'];
        $data[] = "";
        $data[] = $_POST['payment_type'];

        if($_POST['plan_id'] == 'free'){
        $subsOrder = 1;
        } else {
        $subsOrder = $_POST['subscription_order'];    
        }

        $data[] = $subsOrder;
        
        $data[] = $_POST['plan_id'];
        $data[] = $_POST['total_pay_amount'];

        if($subsOrder == 2){

            $totalDays = '30 day';
            $started_date = date("Y/m/d");
            $started_date = strtotime($started_date);
            $started_date = strtotime($totalDays, $started_date);
            $ended_date = date('Y/m/d', $started_date);
            $started_date = date("Y/m/d");
        } else if($subsOrder == 3){
            $totalDays = '365 day';
            $started_date = date("Y/m/d");
            $started_date = strtotime($started_date);
            $started_date = strtotime($totalDays, $started_date);
            $ended_date = date('Y/m/d', $started_date);
            $started_date = date("Y/m/d");
        } else {
            $ended_date = '';
            $started_date = '';
        }
        

        $data[] = $started_date;


        $data[] = $ended_date;
        $data[] = date("Y/m/d");
        $data[] = 'Admin';

        $addform = new Business();
        $addform = $addform->addBusiness($data);
        $addformID = $addform->lastInsertID();

        if($_POST['plan_id'] == 2 || $_POST['plan_id'] == 3){

            if(count($_FILES['gallery_images']['error']) >= 1) {
                for($i = 0; $i < count($_FILES['gallery_images']['error']); $i++) {
                    if($_FILES['gallery_images']['error'][$i] == 0) {

                        $filePath = 'business_gallery_images/'.date('YmdHis').'_'.$_FILES['gallery_images']['name'][$i];
                        $type = $_FILES['gallery_images']['type'][$i];
                        $size = $_FILES['gallery_images']['size'][$i];

                        $max_size = 800; //max image size in Pixels
                        $destination_folder = '../business_gallery_images';
                        $watermark_png_file = '../images/opacity-logo.png'; //watermark png file

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
                                imagejpeg($new_canvas, '../'.$filePath , 90);
                                
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

                        $addimage = new Business();
                        $addimage = $addimage->addBusinessImage($data_img); 
                        $addimage_id = $addimage->lastInsertID();
                    } 
                }     
            }

        }


        if($addformID){
          $_SESSION['business_added'] = true;
       } else {
          $_SESSION['business_added'] = false;
       }
       header("Location: addbusiness");


    }


    if(!empty($_POST['delete_image_id'])){

            // alert();
          $data = array();
          $data[] = $_POST['delete_image_id'];

          $getdeletedimages = new Business();
          $getdeletedimages = $getdeletedimages->fetchBusinessImage("WHERE id = '{$_POST['delete_image_id']}' ORDER BY id DESC")->resultSet();
          $getdeleteimage = $getdeletedimages[0];

          $img_path = $getdeleteimage['image_path'];
          if($img_path){
           unlink('../'.$img_path); 
          }
          
          $deleteimagefile = new Business();
          $deleteimagefile = $deleteimagefile->removeBusinessImage($data);
          $deleteimagefile_id = $deleteimagefile->rowCount();

    } else if($_POST['business_edit_id'] != ''){

        $data = array();
        $data[] = $_POST['business_name'];
        $data[] = $_POST['person_name'];
        $data[] = "";
        // $data[] = $_POST['login_user_mobile_no'];
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
        $data[] = $_POST['category'];

        $updatedbusinesss = new Business();
        $updatedbusinesss = $updatedbusinesss->fetchBusiness("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
        $updatedbusiness = $updatedbusinesss[0];


        if($_POST['plan_id'] == 1 || $_POST['plan_id'] == 2 || $_POST['plan_id'] == 3){

            if($_FILES['logo_image']['error'] == 0){

            $Logos = 'logo/'.mt_rand().str_replace(' ', '_', $_FILES['logo_image']['name']);
            $data[] = $Logos;

            $max_size = 800; //max image size in Pixels
            $destination_folder = '../logo';
            $watermark_png_file = '../images/opacity-logo.png'; //watermark png file

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
                    imagejpeg($new_canvas, '../'.$Logos , 90);
                    
                    //free up memory
                    imagedestroy($new_canvas); 
                    imagedestroy($image_resource);
                }
            }

            // move_uploaded_file($_FILES['logo_image']['tmp_name'], $Logos);
            } else {
              $data[] = $updatedbusiness['logo'];
            } 

        }
        else {
        $data[] = "";   
        }

        if($_POST['plan_id'] == 3){

        if($_FILES['video_path']['error'] == 0){

        $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
        $data[] = $Videos;
        move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);

        } else {
        $data[] = $updatedbusiness['video'];   
        }

        } else {
        $data[] = "";   
        }

        $data[] = $_POST['refered_by'];


        $data[] = $_POST['refered_by_code'];
        $data[] = $_POST['business_description'];
        // $data[] = $_POST['special_offer'];
        $data[] = "";
        $data[] = $_POST['payment_type'];

        if($_POST['plan_id'] == 'free'){
        $subsOrder = 1;
        } else {
        $subsOrder = $_POST['subscription_order'];    
        }

        $data[] = $subsOrder;
        
        $data[] = $_POST['plan_id'];
        $data[] = $_POST['total_pay_amount'];

        if($subsOrder == 2){

            $totalDays = '30 day';
            $started_date = date("Y/m/d");
            $started_date = strtotime($started_date);
            $started_date = strtotime($totalDays, $started_date);
            $ended_date = date('Y/m/d', $started_date);
            $started_date = date("Y/m/d");
        } else if($subsOrder == 3){
            $totalDays = '365 day';
            $started_date = date("Y/m/d");
            $started_date = strtotime($started_date);
            $started_date = strtotime($totalDays, $started_date);
            $ended_date = date('Y/m/d', $started_date);
            $started_date = date("Y/m/d");
        } else {
            $ended_date = '';
            $started_date = '';
        }
        

        $data[] = $started_date;


        $data[] = $ended_date;


        $data[] = $_POST['payment_status'];

        $data[] = 'Admin';
        $data[] = $_POST['business_edit_id'];

        $updateform = new Business();
        $updateform = $updateform->updateBusinessAdmin($data);
        $updateformID = $updateform->rowCount();

        // alert();

        if($_POST['plan_id'] == 2 || $_POST['plan_id'] == 3){

            if(count($_FILES['gallery_images']['error']) >= 1) {
                for($i = 0; $i < count($_FILES['gallery_images']['error']); $i++) {
                    if($_FILES['gallery_images']['error'][$i] == 0) {

                        $filePath = 'business_gallery_images/'.date('YmdHis').'_'.$_FILES['gallery_images']['name'][$i];
                        $type = $_FILES['gallery_images']['type'][$i];
                        $size = $_FILES['gallery_images']['size'][$i];

                        $max_size = 800; //max image size in Pixels
                        $destination_folder = '../business_gallery_images';
                        $watermark_png_file = '../images/opacity-logo.png'; //watermark png file

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
                                imagejpeg($new_canvas, '../'.$filePath , 90);
                                
                                //free up memory
                                imagedestroy($new_canvas); 
                                imagedestroy($image_resource);
                            }
                        }

                        // move_uploaded_file($_FILES['gallery_images']['tmp_name'][$i], $filePath); 
                        $data_img = array();
                        $data_img[] = $_POST['business_edit_id'];
                        $data_img[] = $filePath;
                        $data_img[] = $type;
                        $data_img[] = $size;

                        $addimage = new Business();
                        $addimage = $addimage->addBusinessImage($data_img); 
                        $addimage_id = $addimage->lastInsertID();
                    } 
                }     
            }

        }


        if($updateformID){
          $_SESSION['business_updated'] = true;
       } else {
          $_SESSION['business_updated'] = false;
       }
       header("Location: businessList");


    }


    if(isset($_POST['submit_id'])){


        

        $getcontents = new Business();
        $getcontents = $getcontents->fetchBusiness("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
        $getcontent = $getcontents[0];

        $timeSet = explode("-", $getcontent['working_hour']);

        if($getcontent['plan'] == 'free'){

            $newplan_name = "Basic Regsitration";
        } else {

            $getupdatedplans = new Business();
            $getupdatedplans = $getupdatedplans->fetchPlan("WHERE id = '{$getcontent['plan']}' ORDER BY id DESC")->resultSet();
            $getupdatedplan = $getupdatedplans[0];

            $newplan_name = $getupdatedplan['plan_name'];

        }

        if($getcontent['subscription_order'] == 1){

            $newperiod_name = "Life Time";

        } else {

        $getupdatedperiods = new Business();
        $getupdatedperiods = $getupdatedperiods->fetchPeriod("WHERE premium_order = '{$getcontent['subscription_order']}' ORDER BY id DESC")->resultSet();
        $getupdatedperiod = $getupdatedperiods[0];

        $newperiod_name = $getupdatedperiod['period'];

        }

        $getimages = new Business();
        $getimages = $getimages->fetchBusinessImage("WHERE business_id = '{$_POST['submit_id']}' ORDER BY id DESC LIMIT 5")->resultSet();

        
        $r_date = explode("/", $getcontent['reg_date']);
        $regDate = $r_date[2].'/'.$r_date[1].'/'.$r_date[0];


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

$getperiods = new Business();
$getperiods = $getperiods->fetchPeriod("ORDER BY id ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Register your business</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add Business</li>
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
                                <form method="post" id="NewBusinessForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">
                                  <input type="hidden" name="business_edit_id" id="business_edit_id" value="<?php echo $getcontent['id']; ?>">

                                  <!-- <input type="hidden" name="plan_id" id="plan_id" value="<?php echo $getcontent['plan']; ?>">

                                  <input type="hidden" name="subscription_order" id="subscription_order" value="<?php echo $getcontent['subscription_order']; ?>"> -->

                                  <input type="hidden" name="type" id="type" value="register-ur-business">

                                  <input type="hidden" name="delete_image_id" id="delete_image_id">

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="business_name" name="business_name" class="form-control mb-0" value="<?php echo $getcontent['business_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Proprietor (or) Authorized name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="person_name" name="person_name" class="form-control mb-0" value="<?php echo $getcontent['person_name']; ?>" >
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Login User Mobile no <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="login_user_mobile_no" name="login_user_mobile_no" class="form-control mb-0" value="<?php echo $getcontent['login_user_mobile_no']; ?>" >
                                        </div>
                                    </div> -->

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Mobile no <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="mobile_no" name="mobile_no" class="form-control mb-0" value="<?php echo $getcontent['mobile_no']; ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Email ID <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="email" name="email" class="form-control mb-0" value="<?php echo $getcontent['email']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Category <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="category" id="category" >
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($getcategorys as $getcategory){ ?>
                                                <option value="<?php echo $getcategory['id']; ?>" <?php if($getcontent['category'] == $getcategory['id']){ echo 'selected'; } ?> ><?php echo $getcategory['category_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-8 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Full Address <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-11">
                                            <input type="text" id="address" name="address" class="form-control mb-0" value="<?php echo $getcontent['address']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Landmark <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="landmark" name="landmark" class="form-control mb-0" value="<?php echo $getcontent['landmark']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Area <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="area" name="area" class="form-control mb-0" value="<?php echo $getcontent['area']; ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Area Ward No <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="ward_no" name="ward_no" class="form-control mb-0" value="<?php echo $getcontent['ward_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">City <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="city" name="city" class="form-control mb-0" value="<?php echo $getcontent['city']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">State <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="state" id="state" >
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($getstates as $getstate){ ?>
                                                <option value="<?php echo $getstate['id']; ?>" <?php if($getcontent['state'] == $getstate['id']){ echo 'selected'; } ?> ><?php echo $getstate['state_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">District <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="district" id="district" >
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($getdistricts as $getdistrict){ ?>
                                                <option value="<?php echo $getdistrict['id']; ?>" <?php if($getcontent['district'] == $getdistrict['id']){ echo 'selected'; } ?> ><?php echo $getdistrict['district_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Pincode <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="pincode" name="pincode" class="form-control mb-0" value="<?php echo $getcontent['pincode']; ?>" >
                                        </div>
                                    </div>


                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Display City <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="location" id="location" >
                                                <option value="" Selected Disabled> -- Select -- </option>
                                                <?php foreach($getlocations as $getlocation){ ?>
                                                <option value="<?php echo $getlocation['id']; ?>" <?php if($getcontent['location'] == $getlocation['id']){ echo 'selected'; } ?> ><?php echo $getlocation['location_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Alternative Mobile No <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="alternative_mobile_no" name="alternative_mobile_no" class="form-control mb-0" value="<?php echo $getcontent['alternative_mobile_no']; ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Landline No (Optional)</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="landline_no" name="landline_no" class="form-control mb-0" value="<?php echo $getcontent['landline_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Website <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="website" name="website" class="form-control mb-0" value="<?php echo $getcontent['website']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Working Hour <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-5">
                                            <input type="time" id="workingfrom" name="workingfrom" class="form-control mb-0" value="<?php if(isset($timeSet[0])){ echo $timeSet[0]; } ?>" >
                                            <label>From</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="time" id="workingto" name="workingto" class="form-control mb-0" value="<?php if(isset($timeSet[1])){ echo $timeSet[1]; } ?>" >
                                            <label>To</label>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Refered By <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="refered_by" name="refered_by" class="form-control mb-0" value="<?php echo $getcontent['refered_by']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Reference By <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="refered_by_code" name="refered_by_code" class="form-control mb-0" value="<?php echo $getcontent['refered_by_code']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <div class="form-group row col-sm-12 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Description <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="8" id="editor" name="business_description" class="form-control mb-0" value="" ><?php echo $getcontent['business_description']; ?></textarea>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Special Offer <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="8" id="editor40" name="special_offer" class="form-control mb-0" value="" ><?php echo $getcontent['special_offer']; ?></textarea>
                                        </div>
                                    </div> -->

                                    <div class="clearboth"></div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Subscription Plan <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="plan_id" id="plan_id" >
                                                <option value=""  Disabled> -- Select -- </option>
                                                <option value="free" <?php if(isset($getcontent['plan'])){ if($getcontent['plan'] == 'free'){ echo 'selected'; } } else { echo 'selected'; } ?> >Free</option>
                                                <?php foreach($getplans as $getplan){ ?>
                                                <option value="<?php echo $getplan['id']; ?>" <?php if($getcontent['plan'] == $getplan['id']){ echo 'selected'; } ?> ><?php echo $getplan['plan_code']; ?> + <?php echo $getplan['plan_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Subscription Period <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="subscription_order" id="subscription_order" >
                                                <option value="" Selected Disabled> -- Select -- </option>
                                                <?php foreach($getperiods as $getperiod){ ?>
                                                <option value="<?php echo $getperiod['premium_order']; ?>" <?php if($getcontent['subscription_order'] == $getperiod['premium_order']){ echo 'selected'; } ?> ><?php echo $getperiod['period']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Plan Amount <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="total_pay_amount" name="total_pay_amount" class="form-control mb-0" value="<?php if($getcontent['amount'] != ''){ echo $getcontent['amount']; } else { echo '270'; } ?>" readonly >
                                        </div>
                                    </div>


                                    <div class="clearboth"></div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Company Logo</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="logo_image" name="logo_image" onchange="validateLogo()" class="form-control mb-0" >
                                            <span>* Upload only image file </span>
                                            <div id="preview_logo"></div>
                                            <input type="hidden" name="logo_code" id="logo_code">
                                            <?php if($getcontent['logo']){ ?>
                                            <img src="../<?php echo $getcontent['logo']; ?>" style="width: 50px;"><br>

                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Gallery Images (Maximum 5)</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="gallery_images" name="gallery_images[]" class="form-control mb-0" onchange="validateImage()" multiple >
                                            <span>* Upload only image file </span>
                                            <div id="preview_gallery"></div>
                                            <input type="hidden" name="gallery_code" id="gallery_code">

                                            <?php
                                            if(isset($getimages)){
                                            foreach($getimages as $getimage){
                                            ?>
                                            <img src="../<?php echo $getimage['image_path']; ?>" style="width: 50px;">&nbsp;&nbsp;<a href="JavaScript:Void(0);"><img style="width: 20px;height: 20px;" id="<?php echo $getimage['id'];?>" src="assets/img/delete_icon.png"  class="delete_gallery"></a><br>
                                            <?php } } ?>

                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Videos</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="video_path" name="video_path" class="form-control mb-0" onchange="validateVideo()">
                                            <span class="note">* Upload only video file (MP4 format)</span><br>
                                            <span class="note">* Video duration must upload 30secs only </span>
                                            <div id="preview_video"></div>
                                            <input type="hidden" name="video_code" id="video_code">
                                            <?php if($getcontent['video'] != ''){ ?>
                                            <video width="200" controls><source src="../<?php echo $getcontent['video']; ?>" type="video/mp4"></video><br>

                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Payment Type </label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="payment_type" id="payment_type" >
                                                <option value="" Selected>None</option>
                                                <option value="upi" <?php if($getcontent['payment_type'] == 'upi'){ echo 'selected'; } ?> >Gpay / PhonePe</option>
                                                <option value="online" <?php if($getcontent['payment_type'] == 'online'){ echo 'selected'; } ?> >Online</option>
                                            </select>
                                        </div>
                                    </div>

                                    

                                    <?php if($getcontent){ ?>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Payment Status </label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="payment_status" id="payment_status" >
                                                <option value="" Selected>-- Select --</option>
                                                <option value="failure" <?php if($getcontent['payment_status'] == 'failure'){ echo 'selected'; } ?> >Failure</option>
                                                <option value="success" <?php if($getcontent['payment_status'] == 'success'){ echo 'selected'; } ?> >Success</option>
                                            </select>
                                        </div>
                                    </div>

                                    <?php } ?>

                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-2 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="productUpdate">Update</button>
                                        <button class="btn btn-default" onclick="window.location.href = 'businessList';" type="reset">Cancel</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="productSubmit">Submit</button>
                                        <button class="btn btn-default" onclick="window.location.href = '';" type="reset">Reset</button>
                                        <?php } ?>
                                        
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
    $(document).ready(function(){
          $('#plan_id').on('change', function() {
            // alert(this.value);
          if(this.value == 'free'){
            $('#total_pay_amount').val('270');
            $('#subscription_order').val('');
          } else {
            $('#total_pay_amount').val('');
            $('#subscription_order').val('');
          }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){

      $('#state').on('change',function(){

      var stateId = $(this).val();
      // alert(stateId);

      if(stateId){

      $.ajax({

      type:'POST',

      url:'../listOfDatas.php',

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


      $('#subscription_order').on('change',function(){

      var SubsOrder = $(this).val();
      var planId = $('#plan_id').val();
      // alert(SubsOrder);
      // alert(planId);
      if(SubsOrder && planId){

      $.ajax({

      type:'POST',

      url:'../listOfDatas.php',

      data:'subscription_order='+SubsOrder+'&plan_id='+planId+'&name=businessSubscription',

      success:function(response){
         var parsedData = jQuery.parseJSON(response);
      // alert(parsedData.amount);
      if(parsedData.status == 'success'){
         $('#total_pay_amount').val(parsedData.amount);
      } else {
         $('#total_pay_amount').val(parsedData.amount);
      }

      }

      });

      }

      });


    });
</script>
<script type="text/javascript">
  $(document).on('click', '.delete_gallery', function() {   
      var confirm_msg = confirm("Are you sure to delete?");
      if (confirm_msg == true) {
          var profile_id =  $(this).attr('id');
          $('#delete_image_id').val(profile_id);
          // alert(profile_id);           
          $('#NewBusinessForm').attr('method', 'post');
          $('#NewBusinessForm').attr('action', 'addbusiness');
          $('#NewBusinessForm').submit();
      }            
  });


</script>
<?php
  if(isset($output)) {
  ?>
  <script>
      $('#message_container').fadeIn(10);
      $('#message').text("<?php echo $output; ?>");
      setTimeout(function() {
          $('#message_container').fadeOut(2000, function() {
              $('#message').text("");
          });
      }, 5000);
  </script>
  <?php
      }
  ?>
</body>
</html>