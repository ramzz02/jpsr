<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['gold_added'])){
    if($_SESSION['gold_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['gold_added']);
    }

    if(isset($_SESSION['gold_updated'])){
    if($_SESSION['gold_updated']){
      $output = "Successfully updated";
    } else {
      $output = "Failed to update";
    }
    unset($_SESSION['gold_updated']);
    }

    if(isset($_POST['GoldSubmit'])){

        $data = array();
        $data[] = $_POST['gold_price_18'];
        $data[] = $_POST['gold_price_22'];
        $data[] = $_POST['gold_price_24'];
        $data[] = $_POST['silver_price'];
        $data[] = $_POST['platinum_price'];
        if($_FILES['image_path']['name']){
        $OffImgs = 'news_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
        $data[] = $OffImgs;
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$OffImgs);
        } else {
        $data[] = "";   
        }

        $addform = new News();
        $addform = $addform->addGold($data);
        $addformID = $addform->lastInsertID();

        if($addformID){
          $_SESSION['gold_added'] = true;
       } else {
          $_SESSION['gold_added'] = false;
       }
       header("Location: AddGold");


    }


    if(isset($_POST['GoldUpdate'])){

        $data = array();
        $data[] = $_POST['gold_price_18'];
        $data[] = $_POST['gold_price_22'];
        $data[] = $_POST['gold_price_24'];
        $data[] = $_POST['silver_price'];
        $data[] = $_POST['platinum_price'];

        $editfiles = new News();
        $editfiles = $editfiles->fetchGold("WHERE id ='{$_POST['submit_id']}'")->resultSet();
        $editfile = $editfiles[0];

        if($_FILES['image_path']['error'] == 0){
        $OffImgs = 'news_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
        $data[] = $OffImgs;
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$OffImgs);
        } else {
        $data[] = $editfile['image_path'];   
        }
        $data[] = $_POST['submit_id'];

        $updateform = new News();
        $updateform = $updateform->updateGold($data);
        $updateformID = $updateform->rowCount();


        if($updateformID){
          $_SESSION['gold_updated'] = true;
       } else {
          $_SESSION['gold_updated'] = false;
       }
       header("Location: AddGold");


    }



    $getcontents = new News();
    $getcontents = $getcontents->fetchGold("ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/headertop.php"); ?>
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
                    <h6 class="page-title-heading mr-0 mr-r-5">Gold Price List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add Price</li>
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
                                <form method="post" id="GoldPriceList" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">
                                  <input type="hidden" name="delete_image_id" id="delete_image_id">


                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Gold Price (18K) <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="gold_price_18" name="gold_price_18" class="form-control mb-0" value="<?php echo $getcontent['gold_price_18']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Gold Price (22K) <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="gold_price_22" name="gold_price_22" class="form-control mb-0" value="<?php echo $getcontent['gold_price_22']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Gold Price (24K) <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="gold_price_24" name="gold_price_24" class="form-control mb-0" value="<?php echo $getcontent['gold_price_24']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Silver Price <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="silver_price" name="silver_price" class="form-control mb-0" value="<?php echo $getcontent['silver_price']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Platinum Price <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="platinum_price" name="platinum_price" class="form-control mb-0" value="<?php echo $getcontent['platinum_price']; ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Ads Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="logo_image" name="image_path" onchange="validateLogo()" class="form-control mb-0" >
                                            <span class="note">* Upload only image file </span><br>
                                            <span class="note">Upload size: width:500px, height:200px </span>
                                            <div id="preview_logo"></div>
                                            <?php if($getcontent['image_path']){ ?>
                                            <img src="../<?php echo $getcontent['image_path']; ?>" style="width: 150px;">
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-2 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="GoldUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="GoldSubmit">Submit</button>
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