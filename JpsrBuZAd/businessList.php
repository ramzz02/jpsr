<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['business_updated'])){
    if($_SESSION['business_updated']){
      $output = "Successfully updated";
    } else {
      $output = "Not yet updated";
    }
    unset($_SESSION['business_updated']);
    }

    if(isset($_SESSION['business_deleted'])){
    if($_SESSION['business_deleted']){
      $output = "Successfully deleted";
    } else {
      $output = "Failed to delete";
    }
    unset($_SESSION['business_deleted']);
    }

    if(isset($_POST['delete_id'])){

    $data = array();
    $data[] = $_POST['delete_id'];

    $getbusinessImages = new Business();
    $getbusinessImages = $getbusinessImages->fetchBusiness("WHERE id = '{$_POST['delete_id']}' ORDER BY id DESC")->resultSet();
    $getbusinessImage = $getbusinessImages[0];

    $getimages = new Business();
    $getimages = $getimages->fetchBusinessImage("WHERE business_id = '{$_POST['delete_id']}' ORDER BY id DESC")->resultSet();

    foreach($getimages as $getimage){
     $img_path = $getimage['image_path'];
     unlink('../'.$img_path);
    }

    $logoImage = $getbusinessImage['logo'];
    $videoPath = $getbusinessImage['video'];

    $deletefile = new Business();
    $deletefile = $deletefile->removeBusiness($data);
    $deletefile_id = $deletefile->rowCount();

    $deleteimagefile = new Business();
    $deleteimagefile = $deleteimagefile->removeBusinessListImage($data);
    $deleteimagefile_id = $deleteimagefile->rowCount();
  
    if($deletefile_id){ 
      unlink('../'.$logoImage);
      unlink('../'.$videoPath);
        $_SESSION['business_deleted'] = true;
    } else {
        $_SESSION['business_deleted'] = false;
    }

    header('Location: businessList');

  }

$getbusinessLists = new Business();
$getbusinessLists = $getbusinessLists->fetchBusiness("ORDER BY id DESC")->resultSet();


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
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5">Business Directory List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Business List</li>
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
                            <div class="widget-heading clearfix">
                                
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix table-list" style="width: 100%;overflow-y: auto;">
                                <form method="post" id='tableForm' action="">
                                <input type="hidden" id="submit_id" name="submit_id" value="<?php echo $_POST['submit_id'];?>" />
                                <input type="hidden" id="delete_id" name="delete_id" value="<?php echo $_POST['delete_id'];?>" />
                                <table class="table table-editable table-responsive display compact responsive nowrap" data-toggle="datatables" >
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;text-align: center;">S.No</th>
                                            <th>B. Name</th>
                                            <th>Mobile</th>
                                            <th>Category</th>
                                            <th>B. City</th>
                                            <th style="width: 5%;">Plan</th>
                                            <th>Period</th>
                                            <th>Subs.Date</th>
                                            <th>Amount</th>
                                            <th>Payment Type</th>
                                            <th>Enter By</th>
                                            <th>Updated By</th>
                                            <th>Share Link</th>
                                            <th style="text-align: center;">Payment Status</th>
                                            <th style="text-align: center;">Txn ID</th>
                                            <th style="text-align: center;">Status</th>
                                            <th>Reg Date</th>
                                            <th style="width: 10%;text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($getbusinessLists)){
                                            $count = 1;
                                        foreach($getbusinessLists as $getbusinessList){
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>

                                            <?php
                                            $getcategorys = new Business();
                                            $getcategorys = $getcategorys->fetchCategory("WHERE id = '{$getbusinessList['category']}' ORDER BY id ASC")->resultSet();
                                            $getcategory = $getcategorys[0];

                                            $getlocations = new Location();
                                            $getlocations = $getlocations->fetchLocation("WHERE id = '{$getbusinessList['location']}' ORDER BY location_name ASC")->resultSet();
                                            $getlocation = $getlocations[0];

                                            $getplans = new Business();
                                            $getplans = $getplans->fetchPlan("WHERE id = '{$getbusinessList['plan']}' ORDER BY id ASC")->resultSet();
                                            $getplan = $getplans[0];

                                            $getstates = new Location();
                                            $getstates = $getstates->fetchState("WHERE id = '{$getbusinessList['state']}' ORDER BY id ASC")->resultSet();
                                            $getstate = $getstates[0];

                                            $getdistricts = new Location();
                                            $getdistricts = $getdistricts->fetchDistrict("WHERE id = '{$getbusinessList['district']}' ORDER BY id ASC")->resultSet();
                                            $getdistrict = $getdistricts[0];

                                            $getperiods = new Business();
                                            $getperiods = $getperiods->fetchPeriod("WHERE premium_order = '{$getbusinessList['subscription_order']}' ORDER BY id ASC")->resultSet();
                                            $getperiod = $getperiods[0];

                                            $getimages = new Business();
                                            $getimages = $getimages->fetchBusinessImage("WHERE business_id = '{$getbusinessList['id']}' ORDER BY id DESC")->resultSet();

                                            if($getbusinessList['plan'] == 'free'){

                                                $startDate = '';
                                                $endDate = '';
                                            } else {

                                                $ls_date = explode("/", $getbusinessList['subscription_start_date']);
                                                $startDate = $ls_date[2].'/'.$ls_date[1].'/'.$ls_date[0];
                                                $le_date = explode("/", $getbusinessList['subscription_end_date']);
                                                $endDate = $le_date[2].'/'.$le_date[1].'/'.$le_date[0];

                                            }

                                            
                                            $r_date = explode("/", $getbusinessList['reg_date']);
                                            $regDate = $r_date[2].'/'.$r_date[1].'/'.$r_date[0];

                                            if($getbusinessList['enter_by'] == 'Admin'){

                                                $enterByName = 'Admin';
                                            } else {

                                                $getuserregs = new Register();
                                                $getuserregs = $getuserregs->fetchRegister("WHERE id = '{$getbusinessList['enter_by']}' ORDER BY id ASC")->resultSet();
                                                $getuserreg = $getuserregs[0];

                                                $enterByName = $getuserreg['name'];

                                            }

                                            if($getbusinessList['updated_by'] == 'Admin'){

                                                $enterUpdatedByName = 'Admin';

                                            } else {

                                                $getupdateduserregs = new Register();
                                                $getupdateduserregs = $getupdateduserregs->fetchRegister("WHERE id = '{$getbusinessList['updated_by']}' ORDER BY id ASC")->resultSet();
                                                $getupdateduserreg = $getupdateduserregs[0];

                                                $enterUpdatedByName = $getupdateduserreg['name'];

                                            }

                                            
                                            $link_path = "https://www.jpsr.in/submit-your-business?buzid=".$getbusinessList['id'];

                                            ?>
                                            <td><?php echo $getbusinessList['business_name']; ?></td>
                                            <td><?php echo $getbusinessList['mobile_no']; ?></td>
                                            <td><?php echo $getcategory['category_name']; ?></td>
                                            <td><?php echo $getlocation['location_name']; ?></td>
                                            <?php if($getplan){ ?>
                                            <td>
                                                <?php echo $getplan['plan_name']; ?>
                                            </td>
                                            <?php } else { ?>
                                            <td> Basic Registration </td>
                                            <?php } ?>
                                            <?php if($getperiod){ ?>
                                            <td>
                                                <?php echo $getperiod['period']; ?>
                                            </td>
                                            <?php } else { ?>
                                            <td style="text-align: center;"> Life Time </td>
                                            <?php } ?>

                                            <?php if($getbusinessList['plan'] == 'free' || $getbusinessList['plan'] == ''){ ?>
                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
                                            <?php } else { ?>
                                            <td style="text-align: center;" ><?php echo $startDate; ?> - <?php echo $endDate; ?></td>
                                            <?php } ?>


                                            <?php if($getbusinessList['amount'] != ''){ ?>
                                              <td style="text-align: center;"><?php echo $getbusinessList['amount']; ?></td>
                                            <?php } else { ?>
                                            <td>&nbsp;-&nbsp;</td>
                                            <?php } ?>
                                            <?php if($getbusinessList['payment_type'] != ''){ ?>
                                              <td style="text-align: center;text-transform: uppercase;"><?php echo $getbusinessList['payment_type']; ?></td>
                                            <?php } else { ?>
                                            <td>&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <?php if($getbusinessList['enter_by'] != ''){ ?>
                                              <td style="text-align: center;"><?php echo $enterByName; ?></td>
                                            <?php } else { ?>
                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <?php if($getbusinessList['updated_by'] != ''){ ?>
                                              <td style="text-align: center;"><?php echo $enterUpdatedByName; ?></td>
                                            <?php } else { ?>
                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <?php if($enterByName == 'Admin'){ ?>

                                            <td style="text-align: center;">
                                                <a class="button preview share_whatsapp_button" target="_blank" href="https://api.whatsapp.com/send/?phone&text=<?php echo $link_path; ?>&app_absent=0"><img src="assets/img/whatsapp.png" style="width: 50px;"></a>
                                            </td>

                                            <?php } else { ?>
                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <?php if($getbusinessList['payment_status'] != ''){ ?>
                                              <td style="text-align: center;text-transform:capitalize;"><?php echo ucwords($getbusinessList['payment_status']); ?></td>
                                            <?php } else { ?>
                                            <td>&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <?php if($getbusinessList['txn_id'] != ''){ ?>
                                              <td style="text-align: center;text-transform:capitalize;"><?php echo $getbusinessList['txn_id']; ?></td>
                                            <?php } else { ?>
                                            <td style="text-align: center;" >&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <td>
                                            <label class="switch">
                                            <input class="switch-input" type="checkbox" name="checkbox" <?php if($getbusinessList['status'] == 'active'){ echo 'checked'; } ?> />
                                            <span class="switch-label active_update" id="<?php echo $getbusinessList['id'];?>" data-on="Active" data-off="Deactive"></span>
                                            <span class="switch-handle "></span> 
                                           </label>
                                            </td>
                                            <td><?php echo $regDate; ?></td>

                                            <td style="text-align: center;">
                                                <a href="JavaScript:Void(0);" data-toggle="modal" data-target="#m_modal_<?php echo $getbusinessList["id"]; ?>" ><img style="width: 30px;height: 30px;" id="<?php echo $getbusinessList['id'];?>" src="assets/img/view_icon.png"  ></a>&nbsp;&nbsp;
                                                <?php if($getbusinessList['type'] == 1){ ?>
                                                <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $getbusinessList['id'];?>" src="assets/img/edit_icon.png"  class="edit"></a>&nbsp;&nbsp;
                                                <?php } else { ?>
                                                <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $getbusinessList['id'];?>" src="assets/img/edit_icon.png"  class="admin_edit"></a>&nbsp;&nbsp;
                                                <?php } ?>
                                                <!-- <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $getproduct['id'];?>" src="assets/img/delete_icon.png"  class="delete"></a>&nbsp;&nbsp; -->
                                              
                                            </td>
                                        </tr>

<div class="modal" id="m_modal_<?php echo $getbusinessList["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_1" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel_1">Business List</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="cursor: pointer;">x</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Business name:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList["business_name"]; ?></label>
            </div>
            <!-- row -->
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Person name:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList["person_name"]; ?></label>
            </div>
            <div style="clear: both;"></div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Login User Mobile No:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['login_user_mobile_no']; ?></label>
            </div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Mobile no:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['mobile_no']; ?></label>
            </div>
            <!-- row -->
            <div style="clear: both;"></div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Email ID:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['email']; ?></label>
            </div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Category:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getcategory['category_name']; ?></label>
            </div>
            <div style="clear: both;"></div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Address:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['address']; ?></label>
            </div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Landmark:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['landmark']; ?></label>
            </div>
            <div style="clear: both;"></div>
            <!-- row -->
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Area:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['area']; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Ward no:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['ward_no']; ?></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">City:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['city']; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">State:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getstate['state_name']; ?></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">District:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getdistrict['district_name']; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Pincode:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['pincode']; ?></label>
            </div>
            <!-- row -->
            
            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Business city:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getlocation['location_name']; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Alternative Mobile no:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['alternative_mobile_no']; ?></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Landline No:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['landline_no']; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Website:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['website']; ?></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Working Hour:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['working_hour']; ?></label>
            </div>


            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Refered By:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['refered_by']; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Reference Code:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getbusinessList['refered_by_code']; ?></label>
            </div>

            <div style="clear: both;"></div>


            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Logo:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium">
                  <?php if($getbusinessList['logo']){ ?>
                  <img src="../<?php echo $getbusinessList['logo']; ?>" style="width: 50px;">
                  <?php } else { ?>
                    -
                  <?php } ?>
                </label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Video:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium">
                  <?php if($getbusinessList['video']){ ?>
                  <video width="200" controls><source src="../<?php echo $getbusinessList['video']; ?>" type="video/mp4"></video>
                  <?php } else { ?>
                    -
                  <?php } ?>
                </label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Gallery Images:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium">
                  <?php
                  if(count($getimages)){
                  foreach($getimages as $getimage){
                  ?>
                  <img src="../<?php echo $getimage['image_path']; ?>" style="width: 50px;">&nbsp;&nbsp;
                  <?php } } else { ?>
                    -
                  <?php } ?>
                </label>
            </div>

            <div style="clear: both;"></div><br>


            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Payment Status:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><b><?php if($getbusinessList['payment_status']){ echo ucwords($getbusinessList['payment_status']); } else { echo '-'; } ?></b></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Txn ID:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><b><?php if($getbusinessList['txn_id']){ echo $getbusinessList['txn_id']; } else { echo '-'; } ?></b></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Status:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><b><?php echo ucwords($getbusinessList['status']); ?></b></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Enter By:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $enterByName; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Reg Date:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $regDate; ?></label>
            </div>

            <div style="clear: both;"></div>


            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-12 form-control-label tx-xs-semibold">Business Desc:</label><br>
               <p class="col-sm-12 form-control-label tx-xs-medium" style="color: #000;"><?php echo $getbusinessList['business_description']; ?></p>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-12 form-control-label tx-xs-semibold">Special Offer:</label><br>
               <p class="col-sm-12 form-control-label tx-xs-medium" style="color: #000;"><?php $getbusinessList['special_offer']; ?></p>
            </div>

            <div style="clear: both;"></div>

            
            

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
                                        <?php $count++; } } ?>
                                    </tbody>
                                </table>
                                </form>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
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
  $(document).on('click', '.edit', function() {                  
        var profile_id =  $(this).attr('id');
        $('#submit_id').val(profile_id);             
        $('#tableForm').attr('method', 'post');
        $('#tableForm').attr('action', 'addbusiness');
        $('#tableForm').submit();
    });
  $(document).on('click', '.admin_edit', function() {                  
        var profile_id =  $(this).attr('id');
        $('#submit_id').val(profile_id);             
        $('#tableForm').attr('method', 'post');
        $('#tableForm').attr('action', 'EditAdminbusiness');
        $('#tableForm').submit();
    });
  $(document).on('click', '.active_update', function() {   
      var profile_id =  $(this).attr('id');
      // alert(profile_id);
      $.ajax({
        type: "POST",
        url: "status_update.php",
        data: "update_id="+profile_id+"&name=business_list",
        success: function(data){
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