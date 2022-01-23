<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['ads_added'])){
    if($_SESSION['ads_added']){
      $output = "Successfully uploaded";
    } else {
      $output = "Failed to upload";
    }
    unset($_SESSION['ads_added']);
    }

  if(isset($_POST['add_submit'])){

   $data = array();
   if($_FILES['image_path1']['name']){
    $Image = 'home_ads_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path1']['name']);
    $data[] = $Image;
    move_uploaded_file($_FILES['image_path1']['tmp_name'], '../'.$Image);
    } else {
    $data[] = ""; 
    }
   if($_FILES['image_path2']['name']){
    $Image2 = 'home_ads_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path2']['name']);
    $data[] = $Image2;
    move_uploaded_file($_FILES['image_path2']['tmp_name'], '../'.$Image2);
    } else {
    $data[] = ""; 
    }
   if($_FILES['image_path3']['name']){
    $Image3 = 'home_ads_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path3']['name']);
    $data[] = $Image3;
    move_uploaded_file($_FILES['image_path3']['tmp_name'], '../'.$Image3);
    } else {
    $data[] = ""; 
    }

   $addnew = new Home();
   $addnew = $addnew->addHomeAd($data);
   $addnew_id = $addnew->lastInsertID();

   if($addnew_id){
       $_SESSION['ads_added'] = true;
    } else {
       $_SESSION['ads_added'] = false;
    }
    header("Location: HomeAds.php");


  }


  if(isset($_POST['update_submit'])){

   $data = array();

   $editfiles = new Home();
   $editfiles = $editfiles->fetchHomeAd("WHERE id ='{$_POST['home_id']}'")->resultSet();
   $editfile = $editfiles[0];

   if($_FILES['image_path1']['error'] == 0) {
    $Image = 'home_ads_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path1']['name']);
    $data[] = $Image;
    move_uploaded_file($_FILES['image_path1']['tmp_name'], '../'.$Image);
    } else {
    $data[] = $editfile['ad_1'];
    }

    if($_FILES['image_path2']['error'] == 0) {
    $Image2 = 'home_ads_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path2']['name']);
    $data[] = $Image2;
    move_uploaded_file($_FILES['image_path2']['tmp_name'], '../'.$Image2);
    } else {
    $data[] = $editfile['ad_2'];
    }

    if($_FILES['image_path3']['error'] == 0) {
    $Image3 = 'home_ads_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path3']['name']);
    $data[] = $Image3;
    move_uploaded_file($_FILES['image_path3']['tmp_name'], '../'.$Image3);
    } else {
    $data[] = $editfile['ad_3'];
    }

   $data[] = $_POST['home_id'];

   $updatenew = new Home();
   $updatenew = $updatenew->updateHomeAd($data);
   $updatenew_id = $updatenew->rowCount();

   if($updatenew_id){
       $_SESSION['ads_updated'] = true;
    } else {
       $_SESSION['ads_updated'] = false;
    }
    header("Location: HomeAds.php");


  }

    $getcontents = new Home();
    $getcontents = $getcontents->fetchHomeAd("ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Home Advertisement</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Ads</li>
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
                                <form method="post" id="HomeAds"  enctype="multipart/form-data">
                                  <input type="hidden" name="home_id" value="<?php echo $getcontent['id']; ?>">

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Ads 1</label>
                                        <div class="col-sm-4">
                                            <input type="file" name="image_path1" id="image_path1"><br>
                                            <span class="note">Size: Width:405px, Height:270px</span>
                                        </div>
                                        <div class="col-sm-4">
                                        <?php if($getcontent['ad_1']){ ?>
                                            <img src="../<?php echo $getcontent['ad_1']; ?>" style="width: 200px;"><br>
                                          <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Ads 2</label>
                                        <div class="col-sm-4">
                                            <input type="file" name="image_path2" id="image_path2"><br>
                                            <span class="note">Size: Width:405px, Height:270px</span>
                                        </div>
                                        <div class="col-sm-4">
                                        <?php if($getcontent['ad_2']){ ?>
                                            <img src="../<?php echo $getcontent['ad_2']; ?>" style="width: 200px;"><br>
                                          <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Ads 3</label>
                                        <div class="col-sm-4">
                                            <input type="file" name="image_path3" id="image_path3"><br>
                                            <span class="note">Size: Width:405px, Height:270px</span>
                                        </div>
                                        <div class="col-sm-4">
                                        <?php if($getcontent['ad_3']){ ?>
                                            <img src="../<?php echo $getcontent['ad_3']; ?>" style="width: 200px;"><br>
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