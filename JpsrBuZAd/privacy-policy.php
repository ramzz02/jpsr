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
      $output = "Failed to update. Content is required";
    }
    unset($_SESSION['content_empty']);
    }

    if(isset($_POST['AddContentSubmit'])){

      if($_POST['content'] != '' || $_POST['content'] != '<br>'){

       $data = array();
       $data[] = 2;
       $data[] = $_POST['content'];
       
       $addnew = new Policy();
       $addnew = $addnew->addPolicy($data);
       $addnew_id = $addnew->lastInsertID();

       if($addnew_id){
           $_SESSION['content_added'] = true;
        } else {
           $_SESSION['content_added'] = false;
        }

      } else {
          $_SESSION['content_empty'] = true;
      }

      header("Location: privacy-policy");

    }


      if(isset($_POST['UpdateContentSubmit'])){

       if($_POST['content'] != ''){

       $data = array();
       $data[] = $_POST['content'];
       $data[] = $_POST['edit_id'];

       $updatenew = new Policy();
       $updatenew = $updatenew->updatePolicy($data);
       $updatenew_id = $updatenew->rowCount();

       if($updatenew_id){
           $_SESSION['content_updated'] = true;
        } else {
           $_SESSION['content_updated'] = false;
        }

        } else {
          $_SESSION['content_empty'] = true;
        }

      header("Location: privacy-policy");


      }



    $getfiles = new Policy();
    $getfiles = $getfiles->fetchPolicy("WHERE type = '2' ORDER BY id DESC")->resultSet();
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
                    <h6 class="page-title-heading mr-0 mr-r-5">Privacy Policy</h6>
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

                          
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Content</label>
                                        <div class="col-sm-10">
                                            <textarea rows="10" id="editor" name="content" class="form-control mb-0"><?php if(!empty($getfile['content'])){ echo $getfile['content']; } ?></textarea>
                                        </div>
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-9 no-padding">
                                        <?php if($getfile){ ?>
                                        <button class="btn btn-primary" type="submit" id="update_submit" name="UpdateContentSubmit">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" id="add_submit" name="AddContentSubmit">Submit</button>
                                        <?php } ?>
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