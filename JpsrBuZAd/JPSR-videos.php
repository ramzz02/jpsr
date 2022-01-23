<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['content_added'])){
    if($_SESSION['content_added']){
      $output = "Successfully uploaded";
    } else {
      $output = "Failed to upload";
    }
    unset($_SESSION['content_added']);
    }

    if(isset($_SESSION['content_empty'])){
    if($_SESSION['content_empty']){
      $output = "Failed to upload";
    }
    unset($_SESSION['content_empty']);
    }

    if(isset($_POST['addSubmit'])){

        if($_FILES['video_path']['name'] != '' || $_POST['video_code'] != ''){

       $data = array();
       if($_FILES['video_path']['name']){
        $VideoP = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
        $data[] = $VideoP;
        move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$VideoP);
        } else {
        $data[] = ""; 
       }
       $data[] = $_POST['video_code'];

       $addnew = new Service();
       $addnew = $addnew->addVideo($data);
       $addnew_id = $addnew->lastInsertID();

       if($addnew_id){
           $_SESSION['content_added'] = true;
        } else {
           $_SESSION['content_added'] = false;
        }

      } else {
          $_SESSION['content_empty'] = true;
      }

        header("Location: JPSR-videos");


    }


      if(isset($_POST['updateSubmit'])){

       if($_FILES['video_path']['name'] != '' || $_POST['video_code'] != ''){

       $data = array();
       if($_FILES['video_path']['error'] == 0) {
        $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
        $data[] = $Videos;
        move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);
        } else {
        $data[] = $_POST['old_video'];
       }
       $data[] = $_POST['video_code'];
       $data[] = $_POST['edit_id'];

       $updatenew = new Service();
       $updatenew = $updatenew->updateVideo($data);
       $updatenew_id = $updatenew->rowCount();

       if($updatenew_id){
           $_SESSION['content_updated'] = true;
        } else {
           $_SESSION['content_updated'] = false;
        }

        } else {
          $_SESSION['content_exists'] = true;
      }

        header("Location: JPSR-videos-list");


      }

    if(isset($_POST['submit_id'])){

    $getfiles = new Service();
    $getfiles = $getfiles->fetchVideo("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getfile = $getfiles[0];


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
                    <h6 class="page-title-heading mr-0 mr-r-5">JPSR Video</h6>
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
                                <form method="post" id="JPSRVideoForm" enctype="multipart/form-data">
                                    <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $getfile['id']; ?>">
                                    <input type="hidden" name="old_video" id="old_video" value="<?php echo $getfile['video_path']; ?>">

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Video</label>
                                        <div class="col-sm-6">
                                          <?php if($getfile['video_path']){ ?>
                                            <video width="400" controls><source style="width: 300px;height: 300px;" src="../<?php echo $getfile['video_path']; ?>" type="video/mp4"></video>
                                          <?php } ?>
                                            <input type="file" name="video_path" id="video_path"><br>
                                            <span class="note">Upload only below 2MB file</span>
                                            <br>
                                            <span class="note">(OR)</span>
                                            <br>
                                            <input type="text" id="video_code" name="video_code" class="form-control mb-0" value="<?php if(!empty($getfile['video_code'])){ echo $getfile['video_code']; } ?>">
                                            <span class="note">Ex: https://www.youtube.com/embed/HIC3Z6QDv1s</span>
                                        </div>
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-9 no-padding">
                                        <?php if($getfile){ ?>
                                        <button class="btn btn-primary" type="submit" id="update_submit" name="updateSubmit">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" id="add_submit" name="addSubmit">Upload</button>
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
      }, 5000);
  </script>
  <?php
      }
  ?>
</body>
</html>