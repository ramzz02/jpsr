<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['office_added'])){
    if($_SESSION['office_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['office_added']);
    }

    if(isset($_POST['OfficeSubmit'])){

        $data = array();
        $data[] = $_POST['location'];
        $data[] = $_POST['ward_no'];
        $data[] = $_POST['area'];
        $data[] = $_POST['office_name'];
        $data[] = $_POST['person_name'];
        $data[] = $_POST['mobile_no'];
        $data[] = $_POST['email'];
        $data[] = $_POST['address'];
        $data[] = $_POST['timing'];
        $data[] = $_POST['days'];
        if($_POST['description'] == '' || $_POST['description'] == '<br>'){
        $data[] = '';
        } else {
        $data[] = $_POST['description'];    
        }
        if($_FILES['office_image']['name']){
        $OffImgs = 'offices/'.mt_rand().str_replace(' ', '_', $_FILES['office_image']['name']);
        $data[] = $OffImgs;
        move_uploaded_file($_FILES['office_image']['tmp_name'], '../'.$OffImgs);
        } else {
        $data[] = "";   
        }
        $data[] = date("Y/m/d");
        $data[] = $_POST['status'];

        $addform = new Business();
        $addform = $addform->addOffice($data);
        $addformID = $addform->lastInsertID();

        if($addformID){
          $_SESSION['office_added'] = true;
       } else {
          $_SESSION['office_added'] = false;
       }
       header("Location: AddOffice");


    }


    if(isset($_POST['OfficeUpdate'])){

        $data = array();
        $data[] = $_POST['location'];
        $data[] = $_POST['ward_no'];
        $data[] = $_POST['area'];
        $data[] = $_POST['office_name'];
        $data[] = $_POST['person_name'];
        $data[] = $_POST['mobile_no'];
        $data[] = $_POST['email'];
        $data[] = $_POST['address'];
        $data[] = $_POST['timing'];
        $data[] = $_POST['days'];
        if($_POST['description'] == '' || $_POST['description'] == '<br>'){
        $data[] = '';
        } else {
        $data[] = $_POST['description'];    
        }

        $editfiles = new Business();
        $editfiles = $editfiles->fetchOffice("WHERE id ='{$_POST['submit_id']}'")->resultSet();
        $editfile = $editfiles[0];

        if($_FILES['office_image']['error'] == 0){
        $OffImgs = 'offices/'.mt_rand().str_replace(' ', '_', $_FILES['office_image']['name']);
        $data[] = $OffImgs;
        move_uploaded_file($_FILES['office_image']['tmp_name'], '../'.$OffImgs);
        } else {
        $data[] = $editfile['office_image'];   
        }
        $data[] = $_POST['status'];
        $data[] = $_POST['submit_id'];

        $updateform = new Business();
        $updateform = $updateform->updateOffice($data);
        $updateformID = $updateform->rowCount();


        if($updateformID){
          $_SESSION['office_updated'] = true;
       } else {
          $_SESSION['office_updated'] = false;
       }
       header("Location: OfficeList");


    }


    if(isset($_POST['submit_id'])){


    $getcontents = new Business();
    $getcontents = $getcontents->fetchOffice("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];

    $getwards = new Location();
    $getwards = $getwards->fetchWard("WHERE location = '{$getcontent['location']}' ORDER BY ward_no ASC")->resultSet();

    $getareas = new Location();
    $getareas = $getareas->fetchArea("WHERE location = '{$getcontent['location']}' AND ward_no = '{$getcontent['ward_no']}' ORDER BY area ASC")->resultSet();

    }


$getlocations = new Location();
$getlocations = $getlocations->fetchLocation("WHERE status = '1' ORDER BY location_name ASC")->resultSet();




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
                                <form method="post" <?php if($getcontent){ ?> id="OfficeEditForm" <?php } else { ?> id="OfficeForm" <?php } ?> enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">
                                  <input type="hidden" name="delete_image_id" id="delete_image_id">


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
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Ward No <span class="required">*</span></label>
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
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Area <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="area" name="area" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php if(isset($getcontent)){ foreach($getareas as $getarea){ ?>
                                                <option value="<?php echo $getarea['id']; ?>" <?php if($getcontent['area'] == $getarea['id']){ echo 'selected'; } ?> ><?php echo $getarea['area']; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Office Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="office_name" name="office_name" class="form-control mb-0" value="<?php echo $getcontent['office_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Contact Person name <span class="required">*</span></label>
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
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Office Full Address <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="address" name="address" class="form-control mb-0" value="<?php echo $getcontent['address']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Office Timings <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="timing" name="timing" class="form-control mb-0" value="<?php echo $getcontent['timing']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Office Days <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="days" name="days" class="form-control mb-0" value="<?php echo $getcontent['days']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Office Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="logo_image" name="office_image" onchange="validateLogo()" class="form-control mb-0" >
                                            <span class="note">* Upload only image file </span>
                                            <span class="note">Upload size: width:180px, height:110px </span>
                                            <div id="preview_logo"></div>
                                            <?php if($getcontent){ ?>
                                            <img src="../<?php echo $getcontent['office_image']; ?>" style="width: 50px;">
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Status <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="status" id="status" >
                                                <option value="active" <?php if($getcontent['status'] == 'active'){ echo 'selected'; } ?> >Active</option>
                                                <option value="deactive" <?php if($getcontent['status'] == 'deactive'){ echo 'selected'; } ?> >Deactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Description <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="8" id="editor" name="description" class="form-control mb-0" value="" ><?php echo $getcontent['description']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-2 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="OfficeUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="OfficeSubmit">Submit</button>
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

  $('#location').on('change',function(){

  var loca_id = $(this).val();

  if(loca_id){

  $.ajax({

  type:'POST',

  url:'WardData.php',

  data:'location_id='+loca_id,

  success:function(response){
     var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.data);
  if(parsedData.status == 'success'){
     $('#ward_no').html(parsedData.data);
     $('#area').html(parsedData.area);
  } else {
     $('#ward_no').html(parsedData.data);
     $('#area').html(parsedData.area);
  }

  }

  });

  }else{

  $('#ward_no').html('<option value="">Select location first</option>');
  $('#area').html('<option value="">Select Area</option>');

  }

  });



$('#ward_no').on('change',function(){

var ward_id = $(this).val();
var location_id = $('#location').val();

if(ward_id){

$.ajax({

type:'POST',

url:'AreaData.php',

data:'location_id='+location_id+'&ward_id='+ward_id,

success:function(html){

$('#area').html(html);

}

});

}else{

$('#area').html('<option value="">Select location first</option>');

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