<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['content_added'])){
    if($_SESSION['content_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['content_added']);
    }

   if(isset($_SESSION['content_updated'])){
    if($_SESSION['content_updated']){
      $output = "Successfully updated";
    } else {
      $output = "Failed to update";
    }
    unset($_SESSION['content_updated']);
    }

    if(isset($_SESSION['content_empty'])){
    if($_SESSION['content_empty']){
      $output = "Content is required";
    }
    unset($_SESSION['content_empty']);
    }

    if(isset($_POST['addaboutSubmit'])){

        if($_POST['content'] != '' || $_POST['content'] != '<br>'){

       $data = array();
       $data[] = $_POST['content'];
       if($_FILES['image_path']['name']){
        $Image = 'about_file/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
        $data[] = $Image;
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$Image);
        } else {
        $data[] = ""; 
       }
       if($_FILES['image_path2']['name']){
        $Image2 = 'about_file/'.mt_rand().str_replace(' ', '_', $_FILES['image_path2']['name']);
        $data[] = $Image2;
        move_uploaded_file($_FILES['image_path2']['tmp_name'], '../'.$Image2);
        } else {
        $data[] = ""; 
       }
       if($_FILES['image_path3']['name']){
        $Image3 = 'about_file/'.mt_rand().str_replace(' ', '_', $_FILES['image_path3']['name']);
        $data[] = $Image3;
        move_uploaded_file($_FILES['image_path3']['tmp_name'], '../'.$Image3);
        } else {
        $data[] = ""; 
       }
       if($_FILES['video_path']['name']){
        $Videos = 'about_file/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
        $data[] = $Videos;
        move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);
        } else {
        $data[] = ""; 
       }
       $data[] = $_POST['video_code'];

       $addnew = new About();
       $addnew = $addnew->add($data);
       $addnew_id = $addnew->lastInsertID();

       if($addnew_id){
           $_SESSION['content_added'] = true;
        } else {
           $_SESSION['content_added'] = false;
        }

      } else {
          $_SESSION['content_empty'] = true;
      }

        header("Location: aboutus");


    }


      if(isset($_POST['updateaboutSubmit'])){

       if($_POST['content'] != ''){

       $data = array();
       $data[] = $_POST['content'];
       if($_FILES['image_path']['error'] == 0) {
       $Image = 'about_file/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
        $data[] = $Image;
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$Image);
        } else {
        $data[] = $_POST['old_image'];
       }
       if($_FILES['image_path2']['error'] == 0) {
       $Image2 = 'about_file/'.mt_rand().str_replace(' ', '_', $_FILES['image_path2']['name']);
        $data[] = $Image2;
        move_uploaded_file($_FILES['image_path2']['tmp_name'], '../'.$Image2);
        } else {
        $data[] = $_POST['old_image2'];
       }
       if($_FILES['image_path3']['error'] == 0) {
       $Image3 = 'about_file/'.mt_rand().str_replace(' ', '_', $_FILES['image_path3']['name']);
        $data[] = $Image3;
        move_uploaded_file($_FILES['image_path3']['tmp_name'], '../'.$Image3);
        } else {
        $data[] = $_POST['old_image3'];
       }
       if($_FILES['video_path']['error'] == 0) {
        $Videos = 'about_file/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
        $data[] = $Videos;
        move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);
        } else {
        $data[] = $_POST['old_video'];
       }
       $data[] = $_POST['video_code'];
       $data[] = $_POST['edit_id'];

       $updatenew = new About();
       $updatenew = $updatenew->update($data);
       $updatenew_id = $updatenew->rowCount();

       if($updatenew_id){
           $_SESSION['content_updated'] = true;
        } else {
           $_SESSION['content_updated'] = false;
        }

        } else {
          $_SESSION['content_empty'] = true;
      }

        header("Location: aboutus");


      }



    $getfiles = new About();
    $getfiles = $getfiles->fetch("ORDER BY id DESC")->resultSet();
    $getfile = $getfiles[0];


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
                    <h6 class="page-title-heading mr-0 mr-r-5">About us</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add Content</li>
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
                                <form method="post" id="AboutForm" enctype="multipart/form-data">
                                    <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $getfile['id']; ?>">
                                    <input type="hidden" name="old_video" id="old_video" value="<?php echo $getfile['video_path']; ?>">
                                    <input type="hidden" name="old_image" id="old_image" value="<?php echo $getfile['image_path']; ?>">
                                    <input type="hidden" name="old_image2" id="old_image2" value="<?php echo $getfile['image_path2']; ?>">
                                    <input type="hidden" name="old_image3" id="old_image3" value="<?php echo $getfile['image_path3']; ?>">

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Image 1</label>
                                        <div class="col-sm-6">
                                          <?php if($getfile['image_path']){ ?>
                                            <img src="../<?php echo $getfile['image_path']; ?>" style="width: 150px;"><br>
                                          <?php } ?>
                                            <input type="file" name="image_path" id="image_path"><br>
                                            <span class="note">Size: Width:400px, Height:270px</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Image 2</label>
                                        <div class="col-sm-6">
                                          <?php if($getfile['image_path2']){ ?>
                                            <img src="../<?php echo $getfile['image_path2']; ?>" style="width: 150px;"><br>
                                          <?php } ?>
                                            <input type="file" name="image_path2" id="image_path2"><br>
                                            <span class="note">Size: Width:400px, Height:270px</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Image 3</label>
                                        <div class="col-sm-6">
                                          <?php if($getfile['image_path3']){ ?>
                                            <img src="../<?php echo $getfile['image_path3']; ?>" style="width: 150px;"><br>
                                          <?php } ?>
                                            <input type="file" name="image_path3" id="image_path3"><br>
                                            <span class="note">Size: Width:400px, Height:270px</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Content</label>
                                        <div class="col-sm-6">
                                            <textarea rows="10" id="editor" name="content" class="form-control mb-0"><?php if(!empty($getfile['content'])){ echo $getfile['content']; } ?></textarea>
                                        </div>
                                    </div>

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
                                        <button class="btn btn-primary" type="submit" id="update_submit" name="updateaboutSubmit">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" id="add_submit" name="addaboutSubmit">Submit</button>
                                        <?php } ?>
                                        <button class="btn btn-default" onclick="window.location.href = 'about.php';" type="reset">Reset</button>
                                    
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
<script>  
 $(document).ready(function(){  
      $('#add_submit').click(function(){ 
           var nicInstance = nicEditors.findEditor('editor');
           var notes = nicInstance.getContent();
           $(".error").remove();
           // alert(notes.length);
           if(notes.length == '4')  
           {  
           $('#editor').after('<label id="content-error" class="error" for="content">* Content is required</label>');
           document.getElementById("editor").focus();
            return false;
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