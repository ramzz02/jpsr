<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['temple_added'])){
    if($_SESSION['temple_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['temple_added']);
    }

    if(isset($_POST['TempleSubmit'])){

        $data = array();
        $data[] = $_POST['location'];
        $data[] = $_POST['ward_no'];
        $data[] = $_POST['area'];
        $data[] = $_POST['temple_name'];
        $data[] = $_POST['person_name'];
        $data[] = $_POST['mobile_no'];
        $data[] = $_POST['email'];
        $data[] = $_POST['address'];
        $data[] = $_POST['city'];
        $data[] = $_POST['district'];

        $data[] = $_POST['country'];
        $data[] = $_POST['alternative_mobile_no'];
        $data[] = $_POST['landline_no'];
        $data[] = $_POST['website'];
        $data[] = $_POST['working_hour'];
        if($_POST['business_description'] == '' || $_POST['business_description'] == '<br>'){
        $data[] = '';
        } else {
        $data[] = $_POST['business_description'];    
        }
        if($_POST['special_offer'] == '' || $_POST['special_offer'] == '<br>'){
        $data[] = '';
        } else {
        $data[] = $_POST['special_offer'];    
        }
        if($_FILES['temple_image']['name']){
        $TempImgs = 'temples/'.mt_rand().str_replace(' ', '_', $_FILES['temple_image']['name']);
        $data[] = $TempImgs;
        move_uploaded_file($_FILES['temple_image']['tmp_name'], '../'.$TempImgs);
        } else {
        $data[] = "";   
        }
        $data[] = date("Y/m/d");
        $data[] = "";

        $addform = new Business();
        $addform = $addform->addTemple($data);
        $addformID = $addform->lastInsertID();

        if(count($_FILES['gallery_images']['error']) >= 1) {
            for($i = 0; $i < count($_FILES['gallery_images']['error']); $i++) {
                if($_FILES['gallery_images']['error'][$i] == 0) {
                    $filePath = 'temple_gallery_images/'.date('YmdHis').'_'.$_FILES['gallery_images']['name'][$i];
                    $type = $_FILES['gallery_images']['type'][$i];
                    $size = $_FILES['gallery_images']['size'][$i];
                    move_uploaded_file($_FILES['gallery_images']['tmp_name'][$i], '../'.$filePath); 
                    $data_img = array();
                    $data_img[] = $addformID;
                    $data_img[] = $filePath;
                    $data_img[] = $type;
                    $data_img[] = $size;

                    $addimage = new Business();
                    $addimage = $addimage->addTempleImage($data_img); 
                    $addimage_id = $addimage->lastInsertID();
                } 
            }     
        }

        if($addformID){
          $_SESSION['temple_added'] = true;
       } else {
          $_SESSION['temple_added'] = false;
       }
       header("Location: AddTemple");


    }


    if(isset($_POST['TempleUpdate'])){

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

        if($_POST['temple_description'] == '' || $_POST['temple_description'] == '<br>'){
        $data[] = '';
        } else {
        $data[] = $_POST['temple_description'];    
        }
        if($_POST['special_offer'] == '' || $_POST['special_offer'] == '<br>'){
        $data[] = '';
        } else {
        $data[] = $_POST['special_offer'];    
        }

        $editfiles = new Temple();
        $editfiles = $editfiles->fetchTemple("WHERE id ='{$_POST['submit_id']}'")->resultSet();
        $editfile = $editfiles[0];

        if($_FILES['temple_image']['error'] == 0){
        $TempImgs = 'temples/'.mt_rand().str_replace(' ', '_', $_FILES['temple_image']['name']);
        $data[] = $TempImgs;
        move_uploaded_file($_FILES['temple_image']['tmp_name'], '../'.$TempImgs);
        } else {
        $data[] = $editfile['temple_image'];   
        }

        if($_FILES['video']['error'] == 0){
        $TempVids = 'temples/'.mt_rand().str_replace(' ', '_', $_FILES['video']['name']);
        $data[] = $TempVids;
        move_uploaded_file($_FILES['video']['tmp_name'], '../'.$TempVids);
        } else {
        $data[] = $editfile['video'];   
        }

        $data[] = $_POST['submit_id'];

        $updateform = new Temple();
        $updateform = $updateform->updateTemple($data);
        $updateformID = $updateform->rowCount();


        if(count($_FILES['gallery_images']['error']) >= 1) {
            for($i = 0; $i < count($_FILES['gallery_images']['error']); $i++) {
                if($_FILES['gallery_images']['error'][$i] == 0) {
                    $filePath = 'temple_gallery_images/'.date('YmdHis').'_'.$_FILES['gallery_images']['name'][$i];
                    $type = $_FILES['gallery_images']['type'][$i];
                    $size = $_FILES['gallery_images']['size'][$i];
                    move_uploaded_file($_FILES['gallery_images']['tmp_name'][$i], '../'.$filePath); 
                    $data = array();
                    $data[] = $_POST['submit_id'];
                    $data[] = $filePath;
                    $data[] = $type;
                    $data[] = $size;

                    $addimage = new Temple();
                    $addimage = $addimage->addTempleImage($data); 
                    $addimage_id = $addimage->lastInsertID();
                } 
            }     
        }


        if($updateformID || $addimage_id){

            $updd = array();
            $updd[] = 'Admin';
            $updd[] = date("Y/m/d");
            $updd[] = $_POST['submit_id'];

            $updatebydatess = new Temple();
            $updatebydatess = $updatebydatess->updateTempleUpdated($updd);
            $updatebydatessID = $updatebydatess->rowCount();

          $_SESSION['temple_updated'] = true;
       } else {
          $_SESSION['temple_updated'] = false;
       }
       header("Location: TempleList");


    }


    if(isset($_POST['submit_id'])){


    if(!empty($_POST['delete_image_id'])){


      $data = array();
      $data[] = $_POST['delete_image_id'];

      $getimages = new Temple();
      $getimages = $getimages->fetchTempleImage("WHERE id = '{$_POST['delete_image_id']}' ORDER BY id DESC")->resultSet();
      $getimage = $getimages[0];

      $img_path = $getimage['image_path'];
      if($img_path){
       unlink('../'.$img_path); 
      }
      
      $deleteimagefile = new Temple();
      $deleteimagefile = $deleteimagefile->removeTempleImage($data);
      $deleteimagefile_id = $deleteimagefile->rowCount();

    }


    $getcontents = new Temple();
    $getcontents = $getcontents->fetchTemple("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];

    $timeSet = explode("-", $getcontent['working_hour']);

    $getimages = new Temple();
    $getimages = $getimages->fetchTempleImage("WHERE temple_id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();

    $getwards = new Location();
    $getwards = $getwards->fetchWard("WHERE location = '{$getcontent['location']}' ORDER BY ward_no ASC")->resultSet();

    $getareas = new Location();
    $getareas = $getareas->fetchArea("WHERE location = '{$getcontent['location']}' AND ward_no = '{$getcontent['ward_no']}'ORDER BY area_name ASC")->resultSet();

    }


$getlocations = new Location();
$getlocations = $getlocations->fetchLocation("WHERE status = '1' ORDER BY location_name ASC")->resultSet();

$getstates = new Location();
$getstates = $getstates->fetchState("ORDER BY state_name ASC")->resultSet();

$getdistricts = new Location();
$getdistricts = $getdistricts->fetchDistrict("WHERE state_id = '31' ORDER BY district_name ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5"><?php if($getcontent){ ?>Edit Temple<?php } else { ?>New Temple<?php } ?></h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active"><?php if($getcontent){ ?>Temple List<?php } else { ?>Add New<?php } ?></li>
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
                                <form method="post" id="TempleImageForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">
                                  <input type="hidden" name="delete_image_id" id="delete_image_id">
                                </form>
                                <form method="post" <?php if($getcontent){ ?> id="TempleForm" <?php } else { ?> id="TempleForm" <?php } ?> enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Temple Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="temple_name" name="temple_name" class="form-control mb-0" value="<?php echo $getcontent['temple_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Incharge (or) Authorized Person Name <span class="required">*</span></label>
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
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Location <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="location" name="location" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php foreach($getlocations as $getlocation){ ?>
                                                <option value="<?php echo $getlocation['id']; ?>" <?php if($getcontent['location'] == $getlocation['id']){ echo 'selected'; } ?> ><?php echo $getlocation['location_name']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Ward No <span class="notrequired">(optional)</span></label>
                                        <div class="col-sm-10">
                                            <select id="ward_no" name="ward_no" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php if(isset($getcontent)){ foreach($getwards as $getward){ ?>
                                                <option value="<?php echo $getward['id']; ?>" <?php if($getcontent['ward_no'] == $getward['id']){ echo 'selected'; } ?> ><?php echo $getward['ward_no']; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Area <span class="notrequired">(optional)</span></label>
                                        <div class="col-sm-10">
                                            <select id="area" name="area" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php if(isset($getcontent)){ foreach($getareas as $getarea){ ?>
                                                <option value="<?php echo $getarea['id']; ?>" <?php if($getcontent['area'] == $getarea['id']){ echo 'selected'; } ?> ><?php echo $getarea['area_name']; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Email ID <span class="notrequired">(optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="email" name="email" class="form-control mb-0" value="<?php echo $getcontent['email']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-8 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Temple Full Address (Door No, Street Name and Area) <span class="required">*</span></label>
                                        <div class="col-sm-11">
                                            <input type="text" id="address" name="address" class="form-control mb-0" value="<?php echo $getcontent['address']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Temple City <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="city" name="city" class="form-control mb-0" value="<?php echo $getcontent['city']; ?>" >
                                        </div>
                                    </div>
                                    

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">State <span class="required">*</span></label>
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
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">District <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="district" id="district" >
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($getdistricts as $getdistrict){ ?>
                                                <option value="<?php echo $getdistrict['id']; ?>" <?php if($getcontent['district'] == $getdistrict['id']){ echo 'selected'; } ?> ><?php echo $getdistrict['district_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Temple Pincode <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="pincode" name="pincode" class="form-control mb-0" value="<?php echo $getcontent['pincode']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Landmark <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="landmark" name="landmark" class="form-control mb-0" value="<?php echo $getcontent['landmark']; ?>" >
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
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Landline No <span class="notrequired">(Optional)</span></label>
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
                                        <div class="col-sm-5">
                                            <input type="time" id="workingfrom" name="workingfrom" class="form-control mb-0" value="<?php if(isset($timeSet[0])){ echo $timeSet[0]; } ?>" >
                                            <label>From</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="time" id="workingto" name="workingto" class="form-control mb-0" value="<?php if(isset($timeSet[1])){ echo $timeSet[1]; } ?>" >
                                            <label>To</label>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Temple Image <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" id="logo_image" name="temple_image" onchange="validateLogo()" class="form-control mb-0" >
                                            <span class="note">* Upload only image file </span><br>
                                            <span class="note">Upload size: width:265px, height:200px </span>
                                            <div id="preview_logo"></div>
                                            <?php if($getcontent){ ?>
                                            <img src="../<?php echo $getcontent['temple_image']; ?>" style="width: 150px;">
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Gallery Images (Maximum 5) <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" id="gallery_images" name="gallery_images[]" class="form-control mb-0" onchange="validateImage()" multiple >
                                            <span class="note">* Upload only image file </span><br>
                                            <span class="note">Upload size: width:460px, height:250px </span>
                                            <div id="preview_gallery"></div>
                                            <input type="hidden" name="gallery_code" id="gallery_code">

                                            <?php
                                            if(!empty($getimages)){
                                            foreach($getimages as $getimage){
                                            ?>
                                            <img src="../<?php echo $getimage['image_path']; ?>" style="width: 75px;">&nbsp;&nbsp;<a href="JavaScript:Void(0);"><img style="width: 20px;height: 20px;" id="<?php echo $getimage['id'];?>" src="assets/img/delete_icon.png"  class="delete_gallery"></a><br>
                                            <?php } } ?>
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Videos <span class="notrequired">(Optional)</span></label>
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


                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Temple Description <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="8" id="editor" name="temple_description" class="form-control mb-0" value="" ><?php echo $getcontent['temple_description']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Any Special for this Temple <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="8" id="editor40" name="special_offer" class="form-control mb-0" value="" ><?php echo $getcontent['special_offer']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-3 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary temples_update_submit" type="submit" name="TempleUpdate">Update</button>
                                        <button class="btn btn-default temples_update_submit" onclick="window.location.href = 'TempleList';" type="reset">Cancel</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary temples_update_submit" type="submit" name="TempleSubmit">Submit</button>
                                        <button class="btn btn-default temples_update_submit" onclick="window.location.href = '';" type="reset">Reset</button>
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

$('#location').on('change',function(){

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
<script type="text/javascript">
  $(document).on('click', '.delete_gallery', function() {   
      var confirm_msg = confirm("Are you sure to delete?");
      if (confirm_msg == true) {
          var profile_id =  $(this).attr('id');
          $('#delete_image_id').val(profile_id);
          // alert(profile_id);           
          $('#TempleImageForm').attr('method', 'post');
          $('#TempleImageForm').attr('action', 'AddTemple');
          $('#TempleImageForm').submit();
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