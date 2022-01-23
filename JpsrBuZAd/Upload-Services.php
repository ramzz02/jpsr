<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['content_upload'])){
    if($_SESSION['content_upload']){
      $output = "Successfully uploaded";
    } else {
      $output = "Failed to upload";
    }
    unset($_SESSION['content_upload']);
    }

  if(isset($_POST['AddExcel'])){

      if(isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != "") {


        $da_up = array();
        $da_up[] = 'active';

        $deletefile = new Business();
        $deletefile = $deletefile->removeEmergencyList($da_up);
        $deletefile_id = $deletefile->rowCount();

        $file = $_FILES['uploadFile']['tmp_name'];
        $handle = fopen($file, "r");
        $c = 0;
        while(($filesop = fgetcsv($handle, 1000, ",")) !== false){

          $data = array();
          $data[] = $filesop[0];
          $data[] = $filesop[1];

          $addform = new Business();
          $addform = $addform->addEmergency($data);
          $addformID = $addform->lastInsertID();

        $c = $c + 1;

        }

        if($addformID){
          $_SESSION['content_upload'] = true;
       } else {
          $_SESSION['content_upload'] = false;
       }

       header("Location: Upload-Services");

        
      }

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
                    <h6 class="page-title-heading mr-0 mr-r-5">Upload Emergency Services</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Upload</li>
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
                                <form method="post" id="UploadExcel" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Upload File</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="uploadFile" id="uploadFile"><br>
                                            <span class="note">* Upload only CSV file</span><br>
                                            <span class="note"><a href="emergency-services-excel-format.xlsx">Click here</a> to download excel format</span>
                                        </div>
                                    </div>
                                    
                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-9 no-padding">
                                        
                                        <button class="btn btn-primary" type="submit" name="AddExcel">Submit</button>
                                        <button class="btn btn-default" onclick="window.location.href = '';" type="reset">Reset</button>
                                        
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