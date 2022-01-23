<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['bus_added'])){
    if($_SESSION['bus_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['bus_added']);
    }

    if(isset($_POST['busSubmit'])){

        $data = array();
        $data[] = $_POST['location'];
        $data[] = $_POST['bus_type'];
        $data[] = $_POST['bus_name'];
        $data[] = $_POST['days'];
        $data[] = $_POST['departure_place'];
        $data[] = $_POST['departure_time'];
        $data[] = $_POST['arrival_place'];
        $data[] = $_POST['arrival_time'];

        $addform = new Business();
        $addform = $addform->addBus($data);
        $addformID = $addform->lastInsertID();

        if($addformID){
          $_SESSION['bus_added'] = true;
       } else {
          $_SESSION['bus_added'] = false;
       }

       header("Location: Bus-Timings");

    }


    if(isset($_POST['busUpdate'])){

        $data = array();
        $data[] = $_POST['location'];
        $data[] = $_POST['bus_type'];
        $data[] = $_POST['bus_name'];
        $data[] = $_POST['days'];
        $data[] = $_POST['departure_place'];
        $data[] = $_POST['departure_time'];
        $data[] = $_POST['arrival_place'];
        $data[] = $_POST['arrival_time'];
        $data[] = $_POST['bus_id'];

        $updateform = new Business();
        $updateform = $updateform->updateBus($data);
        $updateformID = $updateform->rowCount();

        if($updateformID){
          $_SESSION['bus_updated'] = true;
       } else {
          $_SESSION['bus_updated'] = false;
       }

       header("Location: Bus-Timings-List");

    }


    if(isset($_POST['submit_id'])){

    $getcontents = new Business();
    $getcontents = $getcontents->fetchBus("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


    }

    $getlocations = new Location();
    $getlocations = $getlocations->fetchLocation("ORDER BY id DESC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">New Bus Timings</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active"><?php if($getcontent){ ?>Update<?php } else { ?>Add<?php } ?> Timings</li>
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
                                <form method="post" id="BusForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="bus_id" id="bus_id" value="<?php echo $getcontent['id']; ?>">

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Location <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                          <select class="m-b-10 form-control" name="location" id="location" >
                                            <option value="" Selected Disabled>Choose</option>
                                            <?php foreach($getlocations as $getlocation){ ?>
                                            <option value="<?php echo $getlocation['id']; ?>" <?php if($getcontent['location'] == $getlocation['id']){ echo 'selected'; } ?> ><?php echo $getlocation['location_name']; ?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Bus Type <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="bus_type" id="bus_type" >
                                            <option value="" Selected Disabled>Choose</option>
                                            <option value="Private Bus" <?php if($getcontent['bus_type'] == 'Private Bus'){ echo 'selected'; } ?> >Private Bus</option>
                                            <option value="Government Bus" <?php if($getcontent['bus_type'] == 'Government Bus'){ echo 'selected'; } ?> >Government Bus</option>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Bus Name <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="bus_name" name="bus_name" class="form-control mb-0" value="<?php echo $getcontent['bus_name']; ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Days <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="days" name="days" class="form-control mb-0" value="<?php echo $getcontent['days']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Departure Place <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="departure_place" name="departure_place" class="form-control mb-0" value="<?php echo $getcontent['departure_place']; ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Departure Time <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="departure_time" name="departure_time" class="form-control mb-0" value="<?php echo $getcontent['departure_time']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Arrival Place <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="arrival_place" name="arrival_place" class="form-control mb-0" value="<?php echo $getcontent['arrival_place']; ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Arrival Time <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="arrival_time" name="arrival_time" class="form-control mb-0" value="<?php echo $getcontent['arrival_time']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-10 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="busUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="busSubmit">Submit</button>
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