<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['area_added'])){
    if($_SESSION['area_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['area_added']);
    }

  if(isset($_SESSION['area_exists'])){
    if($_SESSION['area_exists']){
      $output = "Failed to add. Area already added for particular ward";
    }
    unset($_SESSION['area_exists']);
    }

    if(isset($_POST['AreaSubmit'])){

        $data = array();
        $data[] = $_POST['location'];
        $data[] = $_POST['ward_no'];
        $data[] = $_POST['area'];

        $existsdatas = new Location();
        $existsdatas = $existsdatas->fetchArea("WHERE location = '{$_POST['location']}' AND ward_no = '{$_POST['ward_no']}' AND area_name = '{$_POST['area']}' ORDER BY id DESC")->resultSet();
        $existsdata = $existsdatas[0];

        if($existsdata){
          $_SESSION['area_exists'] = true;
        } else {

          $addform = new Location();
          $addform = $addform->addArea($data);
          $addformID = $addform->lastInsertID();

          if($addformID){
            $_SESSION['area_added'] = true;
         } else {
            $_SESSION['area_added'] = false;
         }

        }
       header("Location: AddArea");

    }


    if(isset($_POST['AreaUpdate'])){

        $data = array();
        $data[] = $_POST['location'];
        $data[] = $_POST['ward_no'];
        $data[] = $_POST['area'];
        $data[] = $_POST['area_id'];

        $existsdatas = new Location();
        $existsdatas = $existsdatas->fetchArea("WHERE id != '{$_POST['area_id']}' AND location = '{$_POST['location']}' AND ward_no = '{$_POST['ward_no']}' AND area_name = '{$_POST['area']}' ORDER BY id DESC")->resultSet();
        $existsdata = $existsdatas[0];

        if($existsdata){
          $_SESSION['area_exists'] = true;
        } else {

            $updateform = new Location();
            $updateform = $updateform->updateArea($data);
            $updateformID = $updateform->rowCount();

            if($updateformID){
              $_SESSION['area_updated'] = true;
           } else {
              $_SESSION['area_updated'] = false;
           }

        }
       header("Location: AreaList");


    }


    if(isset($_POST['submit_id'])){

    $getcontents = new Location();
    $getcontents = $getcontents->fetchArea("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];

    $getwards = new Location();
    $getwards = $getwards->fetchWard("WHERE location = '{$getcontent['location']}' ORDER BY ward_no ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Add Area</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active"><?php if(isset($getcontent)){ ?>Update<?php } else { ?>Add<?php } ?> Area</li>
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
                                <a href="AreaList">Area List</a>
                            </div>
                            <div class="clearboth"></div>
                            <div class="widget-body clearfix">
                                <form method="post" id="AreaForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="area_id" id="area_id" value="<?php echo $getcontent['id']; ?>">

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Select Location</label>
                                        <div class="col-sm-4">
                                            <select id="location" name="location" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php foreach($getlocations as $getlocation){ ?>
                                                <option value="<?php echo $getlocation['id']; ?>" <?php if(isset($getcontent['location'])){ if($getcontent['location'] == $getlocation['id']){ echo 'selected'; } } ?> ><?php echo $getlocation['location_name']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Select Ward No</label>
                                        <div class="col-sm-4">
                                            <select id="ward_no" name="ward_no" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php if(isset($getcontent)){ foreach($getwards as $getward){ ?>
                                                <option value="<?php echo $getward['id']; ?>" <?php if(isset($getcontent['ward_no'])){ if($getcontent['ward_no'] == $getward['id']){ echo 'selected'; } } ?> ><?php echo $getward['ward_no']; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Area</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="area" name="area" class="form-control mb-0" value="<?php if(isset($getcontent['area'])){ echo $getcontent['area']; } ?>" >
                                        </div>
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-10 no-padding">
                                        <?php if(isset($getcontent)){ ?>
                                        <button class="btn btn-primary" type="submit" name="AreaUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="AreaSubmit">Submit</button>
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
  } else {
     $('#ward_no').html(parsedData.data);
  }

  }

  });

  }else{

  $('#ward_no').html('<option value="">Select location first</option>');

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