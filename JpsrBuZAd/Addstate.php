<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['state_added'])){
    if($_SESSION['state_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['state_added']);
    }

    if(isset($_SESSION['state_exists'])){
    if($_SESSION['state_exists']){
      $output = "State already added";
    }
    unset($_SESSION['state_exists']);
    }

    if(isset($_POST['stateSubmit'])){

        $data = array();
        $data[] = $_POST['state_name'];

        $existslocations = new Location();
        $existslocations = $existslocations->fetchState("WHERE state_name = '{$_POST['state_name']}' ORDER BY id DESC")->resultSet();
        $existslocation = $existslocations[0];

        if($existslocation){
          $_SESSION['state_exists'] = true;
        } else {

          $addform = new Location();
          $addform = $addform->addState($data);
          $addformID = $addform->lastInsertID();

          if($addformID){
            $_SESSION['state_added'] = true;
         } else {
            $_SESSION['state_added'] = false;
         }
       }

       header("Location: Addstate");


    }


    if(isset($_POST['stateUpdate'])){

        $data = array();
        $data[] = $_POST['state_name'];
        $data[] = $_POST['state_id'];

        $existslocations = new Location();
        $existslocations = $existslocations->fetchState("WHERE id != '{$_POST['state_id']}' AND state_name = '{$_POST['state_name']}' ORDER BY id DESC")->resultSet();
        $existslocation = $existslocations[0];

        if($existslocation){
          $_SESSION['state_exists'] = true;
        } else {

          $updateform = new Location();
          $updateform = $updateform->updateState($data);
          $updateformID = $updateform->rowCount();

          if($updateformID){
            $_SESSION['state_updated'] = true;
         } else {
            $_SESSION['state_updated'] = false;
         }
       }
       header("Location: StateList");


    }


    if(isset($_POST['submit_id'])){

    $getcontents = new Location();
    $getcontents = $getcontents->fetchState("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


    }


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
                    <h6 class="page-title-heading mr-0 mr-r-5">State</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active"><?php if(isset($getcontent)){ ?>Update<?php } else { ?>Add<?php } ?> State</li>
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
                                <a href="StateList">State list</a>
                            </div>
                            <div class="clearboth"></div>
                            <div class="widget-body clearfix">
                                <form method="post" id="StateForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="state_id" id="state_id" value="<?php echo $getcontent['id']; ?>">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">State Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="state_name" name="state_name" class="form-control mb-0" value="<?php if(isset($getcontent['state_name'])){ echo $getcontent['state_name']; } ?>" >
                                        </div>
                                    </div>


                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-10 no-padding">
                                        <?php if(isset($getcontent)){ ?>
                                        <button class="btn btn-primary" type="submit" name="stateUpdate">Update</button>
                                        <button class="btn btn-default" onclick="window.location.href = 'StateList';" type="reset">Reset</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="stateSubmit">Submit</button>
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
          $('#message_container').fadeOut(2000, function() {
              $('#message').text("");
          });
      }, 1000);
  </script>
  <?php
      }
  ?>
</body>
</html>