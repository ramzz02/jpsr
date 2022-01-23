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

    if(isset($_POST['StoreSubmit'])){

        $data = array();
        if($_FILES['file_path']['name']){
        $OffFiles = 'news_images/'.mt_rand().str_replace(' ', '_', $_FILES['file_path']['name']);
        $data[] = $OffFiles;
        move_uploaded_file($_FILES['file_path']['tmp_name'], '../'.$OffFiles);
        } else {
        $data[] = "";   
        }
        if($_FILES['image_path']['name']){
        $OffImgs = 'news_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
        $data[] = $OffImgs;
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$OffImgs);
        } else {
        $data[] = "";   
        }
        $data[] = 2;

        $addform = new News();
        $addform = $addform->addStore($data);
        $addformID = $addform->lastInsertID();

        if($addformID){
          $_SESSION['content_added'] = true;
       } else {
          $_SESSION['content_added'] = false;
       }
       header("Location: AddGroceries");


    }


    if(isset($_POST['StoreUpdate'])){

        $data = array();

        $editfiles = new News();
        $editfiles = $editfiles->fetchStore("WHERE id ='{$_POST['submit_id']}'")->resultSet();
        $editfile = $editfiles[0];

        if($_FILES['file_path']['error'] == 0){
        $OffFile = 'news_images/'.mt_rand().str_replace(' ', '_', $_FILES['file_path']['name']);
        $data[] = $OffFile;
        move_uploaded_file($_FILES['file_path']['tmp_name'], '../'.$OffFile);
        } else {
        $data[] = $editfile['file_path'];   
        }

        if($_FILES['image_path']['error'] == 0){
        $OffImgs = 'news_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
        $data[] = $OffImgs;
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$OffImgs);
        } else {
        $data[] = $editfile['image_path'];   
        }
        $data[] = $_POST['submit_id'];

        $updateform = new News();
        $updateform = $updateform->updateStore($data);
        $updateformID = $updateform->rowCount();


        if($updateformID){
          $_SESSION['content_updated'] = true;
       } else {
          $_SESSION['content_updated'] = false;
       }
       header("Location: AddGroceries");


    }


    $getcontents = new News();
    $getcontents = $getcontents->fetchStore("WHERE type = '2' ORDER BY id DESC")->resultSet();
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
                    <h6 class="page-title-heading mr-0 mr-r-5">Groceries Price List</h6>
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
                                <form method="post" id="StorePriceList" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">
                                  <input type="hidden" name="delete_image_id" id="delete_image_id">


                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Price List <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" id="file_path" name="file_path" class="form-control mb-0" >
                                            <span class="note">* Upload only document, excel or pdf file </span><br>
                                            <?php if($getcontent['file_path']){ ?>
                                            <a target="_blank" href="../<?php echo $getcontent['file_path']; ?>" >View List</a>
                                            <?php } ?>
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
                                        <button class="btn btn-primary" type="submit" name="StoreUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="StoreSubmit">Submit</button>
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