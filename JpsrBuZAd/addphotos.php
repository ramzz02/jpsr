<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['photos_added'])){
    if($_SESSION['photos_added']){
      $output = "Successfully uploaded";
    } else {
      $output = "Failed to upload";
    }
    unset($_SESSION['photos_added']);
    }

  if(isset($_SESSION['photo_error'])){
    if($_SESSION['photo_error']){
      $output = "Photos doesn't upload. Try again";
    }
    unset($_SESSION['photo_error']);
    }

    if(isset($_POST['photoSubmit'])){

        if(count($_FILES['photos']['error']) >= 1) {
            for($i = 0; $i < count($_FILES['photos']['error']); $i++) {
                if($_FILES['photos']['error'][$i] == 0) {
                    $filePath = 'photos/'.date('YmdHis').'_'.$_FILES['photos']['name'][$i];
                    $type = $_FILES['photos']['type'][$i];
                    $size = $_FILES['photos']['size'][$i];
                    move_uploaded_file($_FILES['photos']['tmp_name'][$i], '../'.$filePath); 
                    $data = array();
                    $data[] = $filePath;
                    $data[] = $type;
                    $data[] = $size;

                    $addimage = new Upload();
                    $addimage = $addimage->addPhoto($data); 
                    $addimage_id = $addimage->lastInsertID();
                } 
            }

            if($addimage_id){
              $_SESSION['photos_added'] = true;
           } else {
              $_SESSION['photos_added'] = false;
           }

        } else {
            $_SESSION['photo_error'] = true;
        }

        
       header("Location: addphotos.php");


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
                    <h6 class="page-title-heading mr-0 mr-r-5">New Photos</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add Photos</li>
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
                                <form method="post" id="ProductForm" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Upload Photos <span class="required">*</span><br>(Maximum 5 images upload in single time)</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="photos[]" id="photos" multiple="multiple" onchange="validateImage()">
                                        </div>
                                    </div>
                                    

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-9 no-padding">
                                        <button class="btn btn-primary" type="submit" name="photoSubmit">Submit</button>
                                        <button class="btn btn-default" onclick="window.location.href = 'addphotos.php';" type="reset">Reset</button>
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
      function validateImage() {
      var formData = new FormData();
      var file = document.getElementById("photos").files[0];
      var file2 = document.getElementById("photos").files[1];
      var file3 = document.getElementById("photos").files[2];
      var file4 = document.getElementById("photos").files[3];
      var file5 = document.getElementById("photos").files[4];
      var file6 = document.getElementById("photos").files[5];
      formData.append("Filedata", file);

      $(".ImgError").remove();
      var t = file.type.split('/').pop().toLowerCase();
      if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
          $('#photos').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          document.getElementById("photos").value = '';
          document.getElementById("photos").focus();
          return false;
      }
      formData.append("Filedata", file2);
      var t2 = file2.type.split('/').pop().toLowerCase();
      if (t2 != "jpeg" && t2 != "jpg" && t2 != "png" && t2 != "gif") {
          $('#photos').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          document.getElementById("photos").value = '';
          document.getElementById("photos").focus();
          return false;
      }
      formData.append("Filedata", file3);
      var t3 = file3.type.split('/').pop().toLowerCase();
      if (t3 != "jpeg" && t3 != "jpg" && t3 != "png" && t3 != "gif") {
          $('#photos').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          document.getElementById("photos").value = '';
          document.getElementById("photos").focus();
          return false;
      }
      formData.append("Filedata", file4);
      var t4 = file4.type.split('/').pop().toLowerCase();
      if (t4 != "jpeg" && t4 != "jpg" && t4 != "png" && t4 != "gif") {
          $('#photos').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          document.getElementById("photos").value = '';
          document.getElementById("photos").focus();
          return false;
      }
      formData.append("Filedata", file5);
      var t5 = file5.type.split('/').pop().toLowerCase();
      if (t5 != "jpeg" && t5 != "jpg" && t5 != "png" && t5 != "gif") {
          $('#photos').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          document.getElementById("photos").value = '';
          document.getElementById("photos").focus();
          return false;
      }
      formData.append("Filedata", file6);
      var t6 = file6.type.split('/').pop().toLowerCase();
      if (t6) {
          $('#photos').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Maximum 5 images only allowed</label>');
          document.getElementById("photos").value = '';
          document.getElementById("photos").focus();
          return false;
      }
  }
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