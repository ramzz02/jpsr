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

    if(isset($_POST['trustSubmit'])){

        $data = array();
        $data[] = $_POST['category'];
        $data[] = $_POST['content'];
        if($_FILES['image_path']['name']){
        $Image = 'photos/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
        $data[] = $Image;
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$Image);
        } else {
        $data[] = ""; 
        }
        if($_FILES['video_path']['name']){
        $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
        $data[] = $Videos;
        move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);
        } else {
        $data[] = "";   
        }

        $addform = new Trust();
        $addform = $addform->addTrust($data);
        $addformID = $addform->lastInsertID();

        if($addformID){
          $_SESSION['content_added'] = true;
       } else {
          $_SESSION['content_added'] = false;
       }
       header("Location: addtrust.php");


    }


    if(isset($_POST['trustUpdate'])){

   $data = array();
   $data[] = $_POST['category'];
   $data[] = $_POST['content'];
   if($_FILES['image_path']['error'] == 0) {
    $Image = 'photos/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
    $data[] = $Image;
    move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$Image);
    } else {
    $editfiles = new Trust();
    $editfiles = $editfiles->fetchTrust("WHERE id ='{$_POST['trust_id']}'")->resultSet();
    $editfile = $editfiles[0];
    $data[] = $editfile['image_path'];
    }
    if($_FILES['video_path']['error'] == 0) {
    $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
    $data[] = $Videos;
    move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);
    } else {
    $editfiles = new Trust();
    $editfiles = $editfiles->fetchTrust("WHERE id ='{$_POST['trust_id']}'")->resultSet();
    $editfile = $editfiles[0];
    $data[] = $editfile['video_path'];
    }
    $data[] = $_POST['trust_id'];


   $updatenew = new Trust();
   $updatenew = $updatenew->updateTrust($data);
   $updatenew_id = $updatenew->rowCount();

   if($updatenew_id){
       $_SESSION['content_updated'] = true;
    } else {
       $_SESSION['content_updated'] = false;
    }
    header("Location: trustList.php");


  }

  if(isset($_POST['submit_id'])){

    $getcontents = new Trust();
    $getcontents = $getcontents->fetchTrust("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


    }


$getcategorys = new Trust();
$getcategorys = $getcategorys->fetchCategory("ORDER BY id ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">New Trust</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active"><?php if($getcontent){ ?>Update<?php } else { ?>Add<?php } ?> Trust</li>
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
                                <form method="post" <?php if($getcontent){ ?> id="TrustEditForm" <?php } else { ?> id="TrustForm" <?php } ?> enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="trust_id" value="<?php echo $getcontent['id']; ?>">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Select Category <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                            <select class="m-b-10 form-control" name="category" id="category" >
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($getcategorys as $getcategory){ ?>
                                                <option value="<?php echo $getcategory['id']; ?>" <?php if($getcontent['category'] == $getcategory['id']){ echo 'selected'; } ?> ><?php echo $getcategory['category_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Content <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                            <textarea rows="6" name="content" class="form-control mb-0"><?php echo $getcontent['content']; ?></textarea>
                                            <input type="text" name="content_id" id="content_id" style="height: 0px;border: none;" <?php if($getcontent){ ?> value="1" <?php } ?> >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Image <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                          <?php if($getcontent['image_path']){ ?>
                                            <img src="../<?php echo $getcontent['image_path']; ?>" style="width: 150px;"><br><br>
                                          <?php } ?>
                                            <input type="file" name="image_path" id="image_path">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Product Video <br>(Optional)</label>
                                        <div class="col-sm-6">
                                          <?php if($getcontent['video_path']){ ?>
                                            <video width="150"  controls><source src="../<?php echo $getcontent['video_path']; ?>" type="video/mp4"></video>
                                            <br><br>
                                          <?php } ?>
                                            <input type="file" name="video_path" id="video_path">
                                        </div>
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-9 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="trustUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="trustSubmit">Submit</button>
                                        <button class="btn btn-default" onclick="window.location.href = 'addtrust.php';" type="reset">Reset</button>
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
  $(document).on('keyup', '.nicEdit-main', function() {                  
        var data = $('#TrustForm').find('.nicEdit-main').text();
        var data1 = $('#TrustEditForm').find('.nicEdit-main').text();
        if(data != ''){
          var content_id =  1;
          $('#content_id').val(content_id);
          // alert(content_id);
          $('#content_id-error').hide();
        } else if(data1 != ''){
          // alert();
          var content_id =  1;
          $('#content_id').val(content_id);
          $('#content_id-error').hide();
        } 
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