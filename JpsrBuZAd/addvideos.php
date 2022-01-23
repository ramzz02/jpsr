<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['video_added'])){
    if($_SESSION['video_added']){
      $output = "Successfully uploaded";
    } else {
      $output = "Failed to upload";
    }
    unset($_SESSION['video_added']);
    }

  if(isset($_POST['add_submit'])){

   $data = array();
   if($_FILES['video_path']['name']){
    $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
    $data[] = $Videos;
    move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);
    } else {
    $data[] = ""; 
    }

   $addnew = new Upload();
   $addnew = $addnew->addVideo($data);
   $addnew_id = $addnew->lastInsertID();

   if($addnew_id){
       $_SESSION['video_added'] = true;
    } else {
       $_SESSION['video_added'] = false;
    }
    header("Location: addvideos.php");


  }


  if(isset($_POST['update_submit'])){

   $data = array();
   if($_FILES['video_path']['error'] == 0) {
    $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
    $data[] = $Videos;
    move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);
    } else {
    $editfiles = new Upload();
    $editfiles = $editfiles->fetchVideo("WHERE id ='{$_POST['video_id']}'")->resultSet();
    $editfile = $editfiles[0];
    $data[] = $editfile['video_path'];
    }
   $data[] = $_POST['video_id'];

   $updatenew = new Upload();
   $updatenew = $updatenew->updateVideo($data);
   $updatenew_id = $updatenew->rowCount();

   if($updatenew_id){
       $_SESSION['video_updated'] = true;
    } else {
       $_SESSION['video_updated'] = false;
    }
    header("Location: videoList.php");


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
                    <h6 class="page-title-heading mr-0 mr-r-5">New Video</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add Video</li>
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
                                <form method="post" id="VideoForm" enctype="multipart/form-data">
                                  <input type="hidden" name="video_id" value="">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Upload Video</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="video_path" id="video_path">
                                        </div>
                                    </div>
                                    
                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-9 no-padding">
                                        <button class="btn btn-primary" type="submit" name="add_submit">Submit</button>
                                        <button class="btn btn-default" onclick="window.location.href = 'addvideos.php';" type="reset">Reset</button>
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
      }, 5000);
  </script>
  <?php
      }
  ?>
</body>
</html>