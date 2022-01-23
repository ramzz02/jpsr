<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  $todayDate = date("Y/m/d");

  if(isset($_SESSION['ads_added'])){
    if($_SESSION['ads_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['ads_added']);
  }


  if(isset($_POST['Register_user_ads'])){

    $data = array();
    $data[] = $_POST['business_name'];
    $data[] = $_POST['person_name'];
    $data[] = $_POST['mobile_no'];
    $data[] = $_POST['email'];
    $data[] = $_POST['address'];
    $data[] = $_POST['page_details'];
    $data[] = $_POST['image_position'];
    if($_FILES['advertisement_image']['name']){
    $ad_Imgs = 'ad_images/'.mt_rand().str_replace(' ', '_', $_FILES['advertisement_image']['name']);
    $data[] = $ad_Imgs;
    move_uploaded_file($_FILES['advertisement_image']['tmp_name'], '../'.$ad_Imgs);
    } else {
    $data[] = "";   
    }

    $data[] = $_POST['subscription_type'];
    $getperiods = new Advertisement();
    $getperiods = $getperiods->fetchPeriod("WHERE period = '{$_POST['subscription_type']}' ORDER BY id ASC")->resultSet();
    $getpes = $getperiods[0];

    $getdefaulsubs = new Advertisement();
    $getdefaulsubs = $getdefaulsubs->fetchSubscription("WHERE period = '{$getpes['id']}' ORDER BY id ASC")->resultSet();
    $getdefaulsub = $getdefaulsubs[0];
    $data[] = $getdefaulsub['amount'];

    $data[] = $_POST['payment_type'];

    if($_POST['subscription_type'] == ''){

    $started_date = "";
    $ended_date = "";

    } else {

    $totalDays = $getpes['period_days'].' day';
    $started_date = date("Y/m/d");
    $started_date = strtotime($started_date);
    $started_date = strtotime($totalDays, $started_date);
    $ended_date = date('Y/m/d', $started_date);

    }
    
    $data[] = date("Y/m/d");
    $data[] = $ended_date;


    $data[] = date("Y/m/d");
    $data[] = "admin";

    $addform = new Advertisement();
    $addform = $addform->addAds($data);
    $addformID = $addform->lastInsertID();

    if($addformID){
        $_SESSION['ads_added'] = true;
     } else {
        $_SESSION['ads_added'] = false;
     }
     header("Location: addadvertisement");
    

  }



    if(isset($_POST['Register_user_update'])){

    $data = array();
    $data[] = $_POST['business_name'];
    $data[] = $_POST['person_name'];
    $data[] = $_POST['mobile_no'];
    $data[] = $_POST['email'];
    $data[] = $_POST['address'];
    $data[] = $_POST['page_details'];
    $data[] = $_POST['image_position'];

    // echo $_POST['image_position'];
    // exit();

    $editfiles = new Advertisement();
    $editfiles = $editfiles->fetchAds("WHERE id ='{$_POST['submit_id']}'")->resultSet();
    $editfile = $editfiles[0];

    if($_FILES['advertisement_image']['error'] == 0){
        $ad_Imgs = 'logo/'.mt_rand().str_replace(' ', '_', $_FILES['advertisement_image']['name']);
        $data[] = $ad_Imgs;
        move_uploaded_file($_FILES['advertisement_image']['tmp_name'], '../'.$ad_Imgs);
    } else {
        $data[] = $editfile['advertisement_image'];   
    }


    if($_POST['expiry_value'] == 0){


    $data[] = $_POST['subscription_type'];
    $getperiods = new Advertisement();
    $getperiods = $getperiods->fetchPeriod("WHERE period = '{$_POST['subscription_type']}' ORDER BY id ASC")->resultSet();
    $getpes = $getperiods[0];

    $getdefaulsubs = new Advertisement();
    $getdefaulsubs = $getdefaulsubs->fetchSubscription("WHERE period = '{$getpes['id']}' ORDER BY id ASC")->resultSet();
    $getdefaulsub = $getdefaulsubs[0];
    $data[] = $getdefaulsub['amount'];

    $data[] = $_POST['payment_type'];

    if($_POST['subscription_type'] == ''){

    $started_date = "";
    $ended_date = "";

    } else {

    $totalDays = $getpes['period_days'].' day';
    $started_date = date("Y/m/d");
    $started_date = strtotime($started_date);
    $started_date = strtotime($totalDays, $started_date);
    $ended_date = date('Y/m/d', $started_date);

    }
    
    $data[] = date("Y/m/d");
    $data[] = $ended_date;



    } else {


    $data[] = $_POST['old_subscription_type'];
    $data[] = $_POST['old_amount'];
    $data[] = $_POST['old_payment_type'];
    $data[] = $_POST['old_start_date'];
    $data[] = $_POST['old_end_date'];


    }

    $data[] = $_POST['submit_id'];

    $updateform = new Advertisement();
    $updateform = $updateform->updateAds($data);
    $updateformID = $updateform->rowCount();

    if($updateformID){
        $_SESSION['ads_updated'] = true;
     } else {
        $_SESSION['ads_updated'] = false;
     }
     header("Location: advertisementList");
    

  }


  if(isset($_POST['submit_id'])){

    $getcontents = new Advertisement();
    $getcontents = $getcontents->fetchAds("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];

    $getexistsadsvalues = new Advertisement();
    $getexistsadsvalues = $getexistsadsvalues->fetchAds("WHERE id = '{$getcontent['id']}' AND end_date > '{$todayDate}' ORDER BY id ASC")->resultSet();
    $getexistsadsvalue = $getexistsadsvalues[0];

    if($getexistsadsvalue){
      $ads_not_expiry = 1; 
    } else {
      $ads_not_expiry = 0; 
    }


  }

  $getcategorys = new Business();
  $getcategorys = $getcategorys->fetchCategory("WHERE status = '1' ORDER BY category_name ASC")->resultSet();

  $gethomeads = new Advertisement();
  $gethomeads = $gethomeads->fetchAdsTitle("WHERE page = 'Home' ORDER BY ads_title ASC")->resultSet();

  $getserviceads = new Advertisement();
  $getserviceads = $getserviceads->fetchAdsTitle("WHERE page = 'Services' ORDER BY ads_title ASC")->resultSet();

  $getperiods = new Advertisement();
  $getperiods = $getperiods->fetchPeriod("WHERE status = '1' ORDER BY id ASC")->resultSet();
  $getpes = $getperiods[0];

  $getdefaulsubs = new Advertisement();
  $getdefaulsubs = $getdefaulsubs->fetchSubscription("WHERE period = '{$getpes['id']}' ORDER BY id ASC")->resultSet();
  $getdefaulsub = $getdefaulsubs[0];

  $getbusinesss = new Business();
  $getbusinesss = $getbusinesss->fetchBusiness("WHERE type != 'admin' ORDER BY business_name ASC")->resultSet();

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
                    <h6 class="page-title-heading mr-0 mr-r-5">Register Your Ad</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">New Ad</li>
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
                                <form method="post" <?php if(!empty($getcontent)){ ?> id="AdvertisementEditForm" <?php } else { ?> id="AdvertisementForm" <?php } ?> enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">
                                  <input type="hidden" name="old_subscription_type" id="old_subscription_type" value="<?php echo $getcontent['subscription_type']; ?>">
                                  <input type="hidden" name="old_amount" id="old_amount" value="<?php echo $getcontent['amount']; ?>">
                                  <input type="hidden" name="old_payment_type" id="old_payment_type" value="<?php echo $getcontent['payment_type']; ?>">
                                  <input type="hidden" name="old_start_date" id="old_start_date" value="<?php echo $getcontent['start_date']; ?>">
                                  <input type="hidden" name="old_end_date" id="old_end_date" value="<?php echo $getcontent['end_date']; ?>">
                                  <input type="hidden" name="expiry_value" id="expiry_value" value="<?php echo $ads_not_expiry; ?>">

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control mb-0" name="business_name" id="business_name">
                                                <option value="" Selected Disabled> -- Select -- </option>
                                                <?php foreach($getbusinesss as $getbusiness){ ?>
                                                <option value="<?php echo $getbusiness['id']; ?>" <?php if($getcontent['business_id'] == $getbusiness['id']){ echo 'selected'; } ?> ><?php echo $getbusiness['business_name']; ?></option>
                                                <?php } ?>
                                              </select>
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
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Page Details <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control mb-0" name="page_details" id="page_details" >
                                                <option value="" Selected Disabled>Choose</option>
                                                <option value="1" <?php if($getcontent['page_details'] == 1){ echo 'selected'; } ?> >Home Page</option>
                                                <option value="2" <?php if($getcontent['page_details'] == 2){ echo 'selected'; } ?> >Business Directory Page</option>
                                                <option value="3" <?php if($getcontent['page_details'] == 3){ echo 'selected'; } ?> >JPSR Services Page</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left default_ads_position" <?php if(!empty($getcontent)){ ?> style="display: none;" <?php } ?> >
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Advertisement Position <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="image_position" id="image_position" class="form-control mb-0">
                                                <option value="" Selected Disabled>Choose</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left Business_ads_position" <?php if($getcontent['page_details'] == 2){ ?> style="display: block;" <?php } ?> >
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Advertisement Position <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="image_position" id="business_position" class="form-control mb-0">
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($getcategorys as $getcategory){ ?>

                                                <?php
                                                if(!empty($getcontent)){
                                                    $getexistsads = new Advertisement();
                                                    $getexistsads = $getexistsads->fetchAds("WHERE id != '{$getcontent['id']}' AND image_position = '{$getcategory['id']}' AND end_date > '{$todayDate}' ORDER BY id ASC")->resultSet();
                                                    $getexistsad = $getexistsads[0];
                                                } else {
                                                    $getexistsads = new Advertisement();
                                                    $getexistsads = $getexistsads->fetchAds("WHERE image_position = '{$getcategory['id']}' AND end_date > '{$todayDate}' ORDER BY id ASC")->resultSet();
                                                    $getexistsad = $getexistsads[0];
                                                }
                                                

                                                if($getexistsad){ 
                                                if($getexistsad['end_date'] > $todayDate){ } else {
                                                ?>
                                                <option value="<?php echo $getcategory['id']; ?>" <?php if($getcontent['image_position'] == $getcategory['id']){ echo 'selected'; } ?> ><?php echo $getcategory['category_name']; ?></option>
                                                <?php } } else { ?>
                                                <option value="<?php echo $getcategory['id']; ?>" <?php if($getcontent['image_position'] == $getcategory['id']){ echo 'selected'; } ?>><?php echo $getcategory['category_name']; ?></option>
                                                <?php } } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left Home_ads_position" <?php if($getcontent['page_details'] == 1){ ?> style="display: block;" <?php } ?> >
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Advertisement Position <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="image_position" id="home_position" class="form-control mb-0">
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($gethomeads as $gethomead){ ?>

                                                <?php
                                                if(!empty($getcontent)){
                                                    $getexistsads = new Advertisement();
                                                    $getexistsads = $getexistsads->fetchAds("WHERE id != '{$getcontent['id']}' AND image_position = '{$gethomead['ads_value']}' AND end_date > '{$todayDate}' ORDER BY id ASC")->resultSet();
                                                    $getexistsad = $getexistsads[0];
                                                } else {
                                                    $getexistsads = new Advertisement();
                                                    $getexistsads = $getexistsads->fetchAds("WHERE image_position = '{$gethomead['ads_value']}' AND end_date > '{$todayDate}' ORDER BY id ASC")->resultSet();
                                                    $getexistsad = $getexistsads[0];
                                                }
                                                

                                                if($getexistsad){ 
                                                if($getexistsad['end_date'] > $todayDate){ } else {
                                                ?>
                                                <option value="<?php echo $gethomead['ads_value']; ?>" <?php if($getcontent['image_position'] == $gethomead['ads_value']){ echo 'selected'; } ?> ><?php echo $gethomead['ads_title']; ?></option>
                                                <?php } } else { ?>
                                                <option value="<?php echo $gethomead['ads_value']; ?>" <?php if($getcontent['image_position'] == $gethomead['ads_value']){ echo 'selected'; } ?>><?php echo $gethomead['ads_title']; ?></option>
                                                <?php } } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left Service_ads_position" <?php if($getcontent['page_details'] == 3){ ?> style="display: block;" <?php } ?> >
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Advertisement Position <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="image_position" id="service_position" class="form-control mb-0">
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($getserviceads as $getservicead){ ?>

                                                <?php
                                                if(!empty($getcontent)){
                                                    $getexistsads = new Advertisement();
                                                    $getexistsads = $getexistsads->fetchAds("WHERE id != '{$getcontent['id']}' AND image_position = '{$getservicead['ads_value']}' AND end_date > '{$todayDate}' ORDER BY id ASC")->resultSet();
                                                    $getexistsad = $getexistsads[0];

                                                } else {
                                                    $getexistsads = new Advertisement();
                                                    $getexistsads = $getexistsads->fetchAds("WHERE image_position = '{$getservicead['ads_value']}' AND end_date > '{$todayDate}' ORDER BY id ASC")->resultSet();
                                                    $getexistsad = $getexistsads[0];
                                                }
                                                

                                                if($getexistsad){ 
                                                if($getexistsad['end_date'] > $todayDate){ } else {
                                                ?>
                                                <option value="<?php echo $getservicead['ads_value']; ?>" <?php if($getcontent['image_position'] == $getservicead['ads_value']){ echo 'selected'; } ?> ><?php echo $getservicead['ads_title']; ?></option>
                                                <?php } } else { ?>
                                                <option value="<?php echo $getservicead['ads_value']; ?>" <?php if($getcontent['image_position'] == $getservicead['ads_value']){ echo 'selected'; } ?> ><?php echo $getservicead['ads_title']; ?></option>
                                                <?php } } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Advertisement Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="logo_image" name="advertisement_image" class="form-control mb-0" onchange="validateLogo()" >
                                            <span class="note">* Upload only image file </span><br>
                                            <span class="note size_display"></span> 
                                            <div id="preview_logo"></div>
                                            <?php if($getcontent['advertisement_image']){ ?>
                                            <img src="../<?php echo $getcontent['advertisement_image']; ?>" style="width: 50px;">
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Subscribe Ads <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="subscription_type" id="subscription_type" <?php if($ads_not_expiry == 1){ ?> disabled <?php } ?> >
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php 
                                                foreach($getperiods as $getperiod){ 

                                                $getamounts = new Advertisement();
                                                $getamounts = $getamounts->fetchSubscription("WHERE period = '{$getperiod['id']}' AND status = '1' ORDER BY id ASC")->resultSet();
                                                $getamount = $getamounts[0];

                                                if($getamount){

                                                ?>
                                                <option value="<?php echo $getperiod['period']; ?>" <?php if($getcontent['subscription_type'] == $getperiod['period']){ echo 'selected'; } ?> ><?php echo $getperiod['period']; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="ads_amount" class="form-group row col-sm-4 float-left" <?php if(isset($getcontent)){ } else { ?> style="display: none;" <?php } ?> >
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Amount <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="amount" id="amount" class="form-control mb-0" value="<?php echo $getcontent['amount']; ?>" <?php if($ads_not_expiry == 1){ ?> disabled <?php } else { ?> readonly style="background-color: #fff;" <?php } ?> >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Payment Type <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="payment_type" id="payment_type" <?php if($ads_not_expiry == 1){ ?> disabled <?php } ?> >
                                                <option value="" Selected Disabled>Choose</option>
                                                <option value="gpay" <?php if($getcontent['payment_type'] == 'gpay'){ echo 'selected'; } ?> >Gpay</option>
                                                <option value="online" <?php if($getcontent['payment_type'] == 'online'){ echo 'selected'; } ?> >Online</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <?php if(isset($getcontent)){

                                    $s_date = explode("/", $getcontent['start_date']);
                                    $startDate = $s_date[2].'/'.$s_date[1].'/'.$s_date[0];
                                    $e_date = explode("/", $getcontent['end_date']);
                                    $endDate = $e_date[2].'/'.$e_date[1].'/'.$e_date[0];
                                    ?>
                                    

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Subscription Start date <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="start_date" class="form-control mb-0" value="<?php echo $startDate; ?>"  <?php if($ads_not_expiry == 1){ ?> disabled <?php } ?> >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Subscription End date <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="end_date" class="form-control mb-0" value="<?php echo $endDate; ?>"  <?php if($ads_not_expiry == 1){ ?> disabled <?php } ?> >
                                        </div>
                                    </div>

                                    <?php } ?>

                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-2 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="Register_user_update">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="Register_user_ads">Submit</button>
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

    $('#business_name').on('change',function(){
    var BuzName = $(this).val();

    if(BuzName){

    $.ajax({

    type:'POST',
    url:'businessData.php',
    data:'buzz_name='+BuzName,

    success:function(response){
    var parsedData = jQuery.parseJSON(response);

    if(parsedData.status == 'success'){
       $('#person_name').val(parsedData.person_name);
       $('#mobile_no').val(parsedData.mobile_no);
       $('#email').val(parsedData.email);
       $('#address').val(parsedData.address);
    } else {
       $('#person_name').val('');
       $('#mobile_no').val('');
       $('#email').val('');
       $('#address').val('');
    }

    }

    });

    }

    });

});


$('#subscription_type').change(function(){
    var adsType = $("#subscription_type").val();
    // alert(logoType);
    $.ajax({
            type: "POST",
            url: "subscription_validation.php",
            data: "subs_type="+adsType+"&type=ads",
            success: function(response){
                var parsedData = jQuery.parseJSON(response);
                // alert(parsedData.status);
                if(parsedData.status == '1'){
                    $('#ads_amount').show();
                    $('#amount').val(parsedData.amount);
                } else {
                    $('#amount').val('');
                    $('#ads_amount').hide();
                }
            }
        });
    });

</script>
<script type="text/javascript">
  $('#page_details').on('change', function() {
    if(this.value == '2'){
      $('.Business_ads_position').show();
      $('.default_ads_position').hide();
      $('.Home_ads_position').hide();
      $('.Service_ads_position').hide();
      $('.size_display').text('');
    } else if(this.value == '1'){
      $('.Business_ads_position').hide();
      $('.default_ads_position').hide();
      $('.Home_ads_position').show();
      $('.Service_ads_position').hide();
      $('.size_display').text('');
    } else if(this.value == '3'){
      $('.Business_ads_position').hide();
      $('.default_ads_position').hide();
      $('.Home_ads_position').hide();
      $('.Service_ads_position').show();
      $('.size_display').text('');
    }
});
</script>
<script type="text/javascript">
  $('#home_position').on('change', function() {
    if(this.value == 'banner1' || this.value == 'banner2' || this.value == 'banner3' || this.value == 'banner4' || this.value == 'banner5'){
      $('.size_display').text('Width: 1350px, Height: 250px');
    } else {
      $('.size_display').text('Width: 200px, Height: 80px');
    }
  });

  $('#business_position').on('change', function() {
      $('.size_display').text('Width: 950px, Height: 250px');
  });

  $('#service_position').on('change', function() {
      $('.size_display').text('Width: 950px, Height: 250px');
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