<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['district_added'])){
    if($_SESSION['district_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['district_added']);
    }

  if(isset($_SESSION['district_exists'])){
    if($_SESSION['district_exists']){
      $output = "Failed to add. District already added for particular state";
    }
    unset($_SESSION['district_exists']);
    }

    if(isset($_POST['DistrictSubmit'])){

        $data = array();
        $data[] = $_POST['state_id'];
        $data[] = $_POST['district_name'];

        $existsdatas = new Location();
        $existsdatas = $existsdatas->fetchDistrict("WHERE state_id = '{$_POST['state_id']}' AND district_name = '{$_POST['district_name']}' ORDER BY id DESC")->resultSet();
        $existsdata = $existsdatas[0];

        if($existsdata){
          $_SESSION['district_exists'] = true;
        } else {

          $addform = new Location();
          $addform = $addform->addDistrict($data);
          $addformID = $addform->lastInsertID();

          if($addformID){
            $_SESSION['district_added'] = true;
         } else {
            $_SESSION['district_added'] = false;
         }

        }
       header("Location: AddDistrict");

    }


    if(isset($_POST['DistrictUpdate'])){

        $data = array();
        $data[] = $_POST['state_id'];
        $data[] = $_POST['district_name'];
        $data[] = $_POST['district_id'];

        $existsdatas = new Location();
        $existsdatas = $existsdatas->fetchDistrict("WHERE id != '{$_POST['district_id']}' AND state_id = '{$_POST['state_id']}' AND district_name = '{$_POST['district_name']}' ORDER BY id DESC")->resultSet();
        $existsdata = $existsdatas[0];

        if($existsdata){
          $_SESSION['district_exists'] = true;
        } else {

            $updateform = new Location();
            $updateform = $updateform->updateDistrict($data);
            $updateformID = $updateform->rowCount();

            if($updateformID){
              $_SESSION['district_updated'] = true;
           } else {
              $_SESSION['district_updated'] = false;
           }

        }
       header("Location: DistrictList");


    }


    if(isset($_POST['submit_id'])){

    $getcontents = new Location();
    $getcontents = $getcontents->fetchDistrict("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


    }

    $getlocations = new Location();
    $getlocations = $getlocations->fetchState("WHERE status = '1' ORDER BY state_name ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">District</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active"><?php if(isset($getcontent)){ ?>Update<?php } else { ?>Add<?php } ?> District</li>
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
                                <a href="DistrictList">District List</a>
                            </div>
                            <div class="clearboth"></div>
                            <div class="widget-body clearfix">
                                <form method="post" id="DistrictForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="district_id" id="district_id" value="<?php echo $getcontent['id']; ?>">

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Select State</label>
                                        <div class="col-sm-4">
                                            <select id="state_id" name="state_id" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php foreach($getlocations as $getlocation){ ?>
                                                <option value="<?php echo $getlocation['id']; ?>" <?php if(isset($getcontent['state_id'])){ if($getcontent['state_id'] == $getlocation['id']){ echo 'selected'; } } ?> ><?php echo $getlocation['state_name']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">District Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="district_name" name="district_name" class="form-control mb-0" value="<?php if(isset($getcontent['district_name'])){ echo $getcontent['district_name']; } ?>" >
                                        </div>
                                    </div>


                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-10 no-padding">
                                        <?php if(isset($getcontent)){ ?>
                                        <button class="btn btn-primary" type="submit" name="DistrictUpdate">Update</button>
                                        <button class="btn btn-default" onclick="window.location.href = 'DistrictList';" type="reset">Reset</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="DistrictSubmit">Submit</button>
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