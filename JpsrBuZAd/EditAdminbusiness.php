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
        $data[] = $_POST['mobile_no'];
        $data[] = $_POST['email'];
        $data[] = $_POST['address'];
        $data[] = $_POST['area'];
        $data[] = $_POST['ward_no'];
        $data[] = $_POST['city'];
        $data[] = $_POST['location'];
        $data[] = $_POST['district'];

        $data[] = $_POST['country'];
        $data[] = $_POST['alternative_mobile_no'];
        $data[] = $_POST['landline_no'];
        $data[] = $_POST['website'];
        $data[] = $_POST['working_hour'];
        $data[] = $_POST['category'];
        $data[] = $_POST['refered_by'];
        $data[] = $_POST['refered_by_code'];
        $data[] = $_POST['business_description'];
        $data[] = $_POST['special_offer'];
        
        if($_FILES['logo_image']['name']){
        $Logos = 'logo/'.mt_rand().str_replace(' ', '_', $_FILES['logo_image']['name']);
        $data[] = $Logos;
        move_uploaded_file($_FILES['logo_image']['tmp_name'], '../'.$Logos);
        } else {
        $data[] = "";   
        }
        if($_FILES['video_path']['name']){
        $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
        $data[] = $Videos;
        move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);
        } else {
        $data[] = "";   
        }
        if($_POST['logo_code'] == '' && $_POST['gallery_code'] == '' && $_POST['video_code'] == ''){
        $data[] = "Free";
        $data[] = 1;
        $data[] = "";
        $data[] = "";
        $data[] = "";
        $data[] = "";
        } else {
        $data[] = $_POST['subscription_type'];
        $getperiods = new Business();
        $getperiods = $getperiods->fetchPeriod("WHERE period = '{$_POST['subscription_type']}' ORDER BY id ASC")->resultSet();
        $getpes = $getperiods[0];
        $data[] = $getpes['premium_order'];

        $getdefaulsubs = new Business();
        $getdefaulsubs = $getdefaulsubs->fetchSubscription("WHERE period = '{$getpes['id']}' ORDER BY id ASC")->resultSet();
        $getdefaulsub = $getdefaulsubs[0];
        $data[] = $getdefaulsub['amount'];
        $data[] = $_POST['payment_type'];

        if($getpes['premium_order'] == 2){
        $started_date = date("Y/m/d");
        $started_date = strtotime($started_date);
        $started_date = strtotime("90 day", $started_date);
        $ended_date = date('Y/m/d', $started_date);
        } else if($getpes['premium_order'] == 3){
        $started_date = date("Y/m/d");
        $started_date = strtotime($started_date);
        $started_date = strtotime("180 day", $started_date);
        $ended_date = date('Y/m/d', $started_date);
        } else if($getpes['premium_order'] == 4){
        $started_date = date("Y/m/d");
        $started_date = strtotime($started_date);
        $started_date = strtotime("365 day", $started_date);
        $ended_date = date('Y/m/d', $started_date);
        } else if($_POST['subs_order'] == 1){
        $started_date = "";
        $ended_date = "";
        }
        $data[] = date("Y/m/d");
        $data[] = $ended_date;

        }
        $data[] = date("Y/m/d");
        $data[] = $_POST['status'];
        $data[] = "admin";

        $addform = new Business();
        $addform = $addform->addBusiness($data);
        $addformID = $addform->lastInsertID();


        if(count($_FILES['gallery_images']['error']) >= 1) {
            for($i = 0; $i < count($_FILES['gallery_images']['error']); $i++) {
                if($_FILES['gallery_images']['error'][$i] == 0) {
                    $filePath = 'business_gallery_images/'.date('YmdHis').'_'.$_FILES['gallery_images']['name'][$i];
                    $type = $_FILES['gallery_images']['type'][$i];
                    $size = $_FILES['gallery_images']['size'][$i];
                    move_uploaded_file($_FILES['gallery_images']['tmp_name'][$i], '../'.$filePath); 
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

        if($addformID){
          $_SESSION['business_added'] = true;
       } else {
          $_SESSION['business_added'] = false;
       }
       header("Location: addbusiness");


    }


    if(isset($_POST['productUpdate'])){

        $data = array();
        $data[] = $_POST['business_name'];
        $data[] = $_POST['person_name'];
        $data[] = $_POST['mobile_no'];
        $data[] = $_POST['email'];
        $data[] = $_POST['address'];
        $data[] = $_POST['area'];
        $data[] = $_POST['ward_no'];
        $data[] = $_POST['city'];
        $data[] = $_POST['location'];
        $data[] = $_POST['district'];

        $data[] = $_POST['country'];
        $data[] = $_POST['alternative_mobile_no'];
        $data[] = $_POST['landline_no'];
        $data[] = $_POST['website'];
        $data[] = $_POST['working_hour'];
        $data[] = $_POST['category'];
        $data[] = $_POST['refered_by'];
        $data[] = $_POST['refered_by_code'];
        $data[] = $_POST['business_description'];
        $data[] = $_POST['special_offer'];

        $editfiles = new Business();
        $editfiles = $editfiles->fetchBusiness("WHERE id ='{$_POST['submit_id']}'")->resultSet();
        $editfile = $editfiles[0];

        if($_FILES['logo_image']['error'] == 0){
        $Logos = 'logo/'.mt_rand().str_replace(' ', '_', $_FILES['logo_image']['name']);
        $data[] = $Logos;
        move_uploaded_file($_FILES['logo_image']['tmp_name'], '../'.$Logos);
        } else {
        $data[] = $editfile['logo_image'];   
        }
        if($_FILES['video_path']['error'] == 0) {
        $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
        $data[] = $Videos;
        move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);
        } else {
        $data[] = $editfile['video_path'];   
        }

        if($_POST['subscription_type'] != $_POST['old_subscription_type']){

            if($_POST['subscription_type'] == ''){
            $data[] = "Free";
            $data[] = 1;
            $data[] = "";
            $data[] = "";
            $data[] = "";
            $data[] = "";
            } else {
            $data[] = $_POST['subscription_type'];
            $getperiods = new Business();
            $getperiods = $getperiods->fetchPeriod("WHERE period = '{$_POST['subscription_type']}' ORDER BY id ASC")->resultSet();
            $getpes = $getperiods[0];
            $data[] = $getpes['premium_order'];

            $getdefaulsubs = new Business();
            $getdefaulsubs = $getdefaulsubs->fetchSubscription("WHERE period = '{$getpes['id']}' ORDER BY id ASC")->resultSet();
            $getdefaulsub = $getdefaulsubs[0];
            $data[] = $getdefaulsub['amount'];
            $data[] = $_POST['payment_type'];

            if($getpes['premium_order'] == 2){
            $started_date = date("Y/m/d");
            $started_date = strtotime($started_date);
            $started_date = strtotime("90 day", $started_date);
            $ended_date = date('Y/m/d', $started_date);
            } else if($getpes['premium_order'] == 3){
            $started_date = date("Y/m/d");
            $started_date = strtotime($started_date);
            $started_date = strtotime("180 day", $started_date);
            $ended_date = date('Y/m/d', $started_date);
            } else if($getpes['premium_order'] == 4){
            $started_date = date("Y/m/d");
            $started_date = strtotime($started_date);
            $started_date = strtotime("365 day", $started_date);
            $ended_date = date('Y/m/d', $started_date);
            } else if($_POST['subs_order'] == 1){
            $started_date = "";
            $ended_date = "";
            }
            $data[] = date("Y/m/d");
            $data[] = $ended_date;

            }
        } else {
            $data[] = $_POST['old_subscription_type'];
            $data[] = $_POST['old_subscription_order'];
            $data[] = $_POST['old_amount'];
            $data[] = $_POST['old_payment_type'];
            $data[] = $_POST['old_start_date'];
            $data[] = $_POST['old_end_date'];

        }




        $data[] = $_POST['submit_id'];

        $updateform = new Business();
        $updateform = $updateform->updateBusiness($data);
        $updateformID = $updateform->rowCount();


        if(count($_FILES['gallery_images']['error']) >= 1) {
            for($i = 0; $i < count($_FILES['gallery_images']['error']); $i++) {
                if($_FILES['gallery_images']['error'][$i] == 0) {
                    $filePath = 'business_gallery_images/'.date('YmdHis').'_'.$_FILES['gallery_images']['name'][$i];
                    $type = $_FILES['gallery_images']['type'][$i];
                    $size = $_FILES['gallery_images']['size'][$i];
                    move_uploaded_file($_FILES['gallery_images']['tmp_name'][$i], '../'.$filePath); 
                    $data = array();
                    $data[] = $_POST['submit_id'];
                    $data[] = $filePath;
                    $data[] = $type;
                    $data[] = $size;

                    $addimage = new Business();
                    $addimage = $addimage->addBusinessImage($data); 
                    $addimage_id = $addimage->lastInsertID();
                } 
            }     
        }

        if($updateformID || $addimage_id){
          $_SESSION['business_updated'] = true;
       } else {
          $_SESSION['business_updated'] = false;
       }
       header("Location: businessList");


    }


    if(isset($_POST['submit_id'])){


    if(!empty($_POST['delete_image_id'])){


      $data = array();
      $data[] = $_POST['delete_image_id'];

      $getimages = new Business();
      $getimages = $getimages->fetchBusinessImage("WHERE id = '{$_POST['delete_image_id']}' ORDER BY id DESC")->resultSet();
      $getimage = $getimages[0];

      $img_path = $getimage['image_path'];
      if($img_path){
       unlink('../'.$img_path); 
      }
      
      $deleteimagefile = new Business();
      $deleteimagefile = $deleteimagefile->removeBusinessImage($data);
      $deleteimagefile_id = $deleteimagefile->rowCount();

    }

    $getcontents = new Business();
    $getcontents = $getcontents->fetchBusiness("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];

    $getimages = new Business();
    $getimages = $getimages->fetchBusinessImage("WHERE business_id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();


    }


$getcategorys = new Business();
$getcategorys = $getcategorys->fetchCategory("WHERE status = '1' ORDER BY category_name ASC")->resultSet();

$getlocations = new Location();
$getlocations = $getlocations->fetchLocation("ORDER BY location_name ASC")->resultSet();

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
                                <form method="post" id="BusinessForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">
                                  <input type="hidden" name="old_subscription_type" id="old_subscription_type" value="<?php echo $getcontent['subscription_type']; ?>">
                                  <input type="hidden" name="old_subscription_order" id="old_subscription_order" value="<?php echo $getcontent['subscription_order']; ?>">
                                  <input type="hidden" name="old_amount" id="old_amount" value="<?php echo $getcontent['amount']; ?>">
                                  <input type="hidden" name="old_payment_type" id="old_payment_type" value="<?php echo $getcontent['payment_type']; ?>">
                                  <input type="hidden" name="old_start_date" id="old_start_date" value="<?php echo $getcontent['start_date']; ?>">
                                  <input type="hidden" name="old_end_date" id="old_end_date" value="<?php echo $getcontent['end_date']; ?>">
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

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Mobile no <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="mobile_no" name="mobile_no" class="form-control mb-0" value="<?php echo $getcontent['mobile_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Email ID <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="email" name="email" class="form-control mb-0" value="<?php echo $getcontent['email']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Full Address <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="address" name="address" class="form-control mb-0" value="<?php echo $getcontent['address']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Area <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="area" name="area" class="form-control mb-0" value="<?php echo $getcontent['area']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Area Ward No <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="ward_no" name="ward_no" class="form-control mb-0" value="<?php echo $getcontent['ward_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">City <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="city" name="city" class="form-control mb-0" value="<?php echo $getcontent['city']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Display City <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="location" id="location" >
                                                <option value="" Selected Disabled> -- Select -- </option>
                                                <?php foreach($getlocations as $getlocation){ ?>
                                                <option value="<?php echo $getlocation['id']; ?>" <?php if($getcontent['location'] == $getlocation['id']){ echo 'selected'; } ?> ><?php echo $getlocation['location_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">District <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="district" name="district" class="form-control mb-0" value="<?php echo $getcontent['district']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Country <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="country" name="country" class="form-control mb-0" value="<?php echo $getcontent['country']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Alternative Mobile No <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="alternative_mobile_no" name="alternative_mobile_no" class="form-control mb-0" value="<?php echo $getcontent['alternative_mobile_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Landline No (Optional)</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="landline_no" name="landline_no" class="form-control mb-0" value="<?php echo $getcontent['landline_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Website <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="website" name="website" class="form-control mb-0" value="<?php echo $getcontent['website']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Working Hour <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="working_hour" name="working_hour" class="form-control mb-0" value="<?php echo $getcontent['working_hour']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Refered By <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="refered_by" name="refered_by" class="form-control mb-0" value="<?php echo $getcontent['refered_by']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Reference By <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="refered_by_code" name="refered_by_code" class="form-control mb-0" value="<?php echo $getcontent['refered_by_code']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Description <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="8" id="editor" name="business_description" class="form-control mb-0" value="" ><?php echo $getcontent['business_description']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Special Offer <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="8" id="editor40" name="special_offer" class="form-control mb-0" value="" ><?php echo $getcontent['special_offer']; ?></textarea>
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
                                            <?php if($getcontent){ ?>
                                            <img src="../<?php echo $getcontent['logo_image']; ?>" style="width: 50px;">
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Gallery Images (Maximum 5)</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="gallery_images" name="gallery_images[]" class="form-control mb-0" onchange="validateImage()" multiple >
                                            <span>* Upload only image file </span>
                                            <div id="preview_gallery"></div>
                                            <input type="hidden" name="gallery_code" id="gallery_code">

                                            <?php
                                            if(count($getimages)){
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
                                            <?php if($getcontent['video_path'] != ''){ ?>
                                            <video width="200" controls><source src="../<?php echo $getcontent['video_path']; ?>" type="video/mp4"></video>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <!--<div class="form-group row col-sm-4 float-left">-->
                                    <!--    <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Status <span class="required">*</span></label>-->
                                    <!--    <div class="col-sm-10">-->
                                    <!--        <select class="m-b-10 form-control" name="status" id="status" >-->
                                    <!--            <option value="" Selected Disabled>Choose</option>-->
                                    <!--            <option value="active" <?php if($getcontent['status'] == 'active'){ echo 'selected'; } ?> >Active</option>-->
                                    <!--            <option value="deactive" <?php if($getcontent['status'] == 'deactive'){ echo 'selected'; } ?> >Deactive</option>-->
                                    <!--        </select>-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-2 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="productUpdate">Update</button>
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
  $(document).on('click', '.delete_gallery', function() {   
      var confirm_msg = confirm("Are you sure to delete?");
      if (confirm_msg == true) {
          var profile_id =  $(this).attr('id');
          $('#delete_image_id').val(profile_id);
          // alert(profile_id);           
          $('#BusinessForm').attr('method', 'post');
          $('#BusinessForm').attr('action', 'EditAdminbusiness');
          $('#BusinessForm').submit();
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