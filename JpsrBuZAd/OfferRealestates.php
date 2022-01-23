<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['banner_added'])){
    if($_SESSION['banner_added']){
      $output = "Successfully uploaded";
    } else {
      $output = "Failed to upload";
    }
    unset($_SESSION['banner_added']);
    }

  if(isset($_POST['add_submit'])){

   $data = array();
   if($_FILES['image_path']['name']){
    $Image = 'offer_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
    $data[] = $Image;
    move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$Image);
    } else {
    $data[] = ""; 
    }

   $addnew = new Offer();
   $addnew = $addnew->addIndustry($data);
   $addnew_id = $addnew->lastInsertID();

   if($addnew_id){
       $_SESSION['banner_added'] = true;
    } else {
       $_SESSION['banner_added'] = false;
    }

    header("Location: OfferRealestates.php");

  }


  if(isset($_POST['update_submit'])){

   $data = array();

   $editfiles = new Offer();
   $editfiles = $editfiles->fetchIndustry("WHERE id ='{$_POST['banner_id']}'")->resultSet();
   $editfile = $editfiles[0];

   if($_FILES['image_path']['error'] == 0) {
    $Image = 'offer_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
    $data[] = $Image;
    move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$Image);
    } else {
    $data[] = $editfile['image_path'];
    }


   $data[] = $_POST['banner_id'];

   $updatenew = new Offer();
   $updatenew = $updatenew->updateIndustry($data);
   $updatenew_id = $updatenew->rowCount();

   if($updatenew_id){
       $_SESSION['banner_updated'] = true;
    } else {
       $_SESSION['banner_updated'] = false;
    }
    header("Location: OfferRealestatesList.php");


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Realestates Offers</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Offers</li>
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
                                <form method="post" id="OfferBannerForm"  enctype="multipart/form-data">
                                  <input type="hidden" name="banner_id" value="<?php echo $getcontent['id']; ?>">

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Upload Banner</label>
                                        <div class="col-sm-4">
                                            <input type="file" name="image_path" id="image_path"><br>
                                            <span class="note">Size: Width:475px, Height:315px</span>
                                        </div>
                                        <div class="col-sm-4">
                                        <?php if($getcontent['image_path']){ ?>
                                            <img src="../<?php echo $getcontent['image_path']; ?>" style="width: 700px;"><br>
                                          <?php } ?>
                                        </div>
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-9 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="update_submit">Submit</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="add_submit">Submit</button>
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