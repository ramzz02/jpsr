<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['category_added'])){
    if($_SESSION['category_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['category_added']);
    }

  if(isset($_SESSION['category_exists'])){
    if($_SESSION['category_exists']){
      $output = "Category already added";
    }
    unset($_SESSION['category_exists']);
    }

    if(isset($_POST['categorySubmit'])){

        $data = array();
        $data[] = $_POST['category_name'];
        $categImage = 'category_images/'.mt_rand().str_replace(' ', '_', $_FILES['category_image']['name']);
        $data[] = $categImage;
        move_uploaded_file($_FILES['category_image']['tmp_name'], '../'.$categImage);

        $existscategorys = new Business();
        $existscategorys = $existscategorys->fetchCategory("WHERE category_name = '{$_POST['category_name']}' ORDER BY id DESC")->resultSet();
        $existscategory = $existscategorys[0];

        if($existscategory){
          $_SESSION['category_exists'] = true;
        } else {

          $addform = new Business();
          $addform = $addform->addCategory($data);
          $addformID = $addform->lastInsertID();

          if($addformID){
            $_SESSION['category_added'] = true;
         } else {
            $_SESSION['category_added'] = false;
         }

        }
       header("Location: addbusinesscategory");

    }


    if(isset($_POST['categoryUpdate'])){

        $data = array();
        $data[] = $_POST['category_name'];
        if($_FILES['category_image']['error'] == 0) {
        $categImage = 'category_images/'.mt_rand().str_replace(' ', '_', $_FILES['category_image']['name']);
        $data[] = $categImage;
        move_uploaded_file($_FILES['category_image']['tmp_name'], '../'.$categImage);
        } else {
        $editfiles = new Business();
        $editfiles = $editfiles->fetchCategory("WHERE id ='{$_POST['category_id']}'")->resultSet();
        $editfile = $editfiles[0];
        $data[] = $editfile['category_image'];
        }

        $data[] = $_POST['category_id'];

        $existscategorys = new Business();
        $existscategorys = $existscategorys->fetchCategory("WHERE id != '{$_POST['category_id']}' AND category_name = '{$_POST['category_name']}' ORDER BY id DESC")->resultSet();
        $existscategory = $existscategorys[0];

        if($existscategory){
          $_SESSION['category_exists'] = true;
        } else {

            $updateform = new Business();
            $updateform = $updateform->updateCategory($data);
            $updateformID = $updateform->rowCount();

            if($updateformID){
              $_SESSION['category_updated'] = true;
           } else {
              $_SESSION['category_updated'] = false;
           }

        }
       header("Location: businesscategoryList");


    }


    if(isset($_POST['submit_id'])){

    $getcontents = new Business();
    $getcontents = $getcontents->fetchCategory("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


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
                    <h6 class="page-title-heading mr-0 mr-r-5">New Business Category</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active"><?php if($getcontent){ ?>Update<?php } else { ?>Add<?php } ?> Category</li>
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
                                <form method="post" id="CategoryForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="category_id" id="category_id" value="<?php echo $getcontent['id']; ?>">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Category Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="category_name" name="category_name" class="form-control mb-0" value="<?php echo $getcontent['category_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="categImage">Category Image</label>
                                        <div class="col-sm-4">
                                            <?php if($getcontent['category_image']){ ?>
                                              <img src="../<?php echo $getcontent['category_image']; ?>" style="width: 20%;">
                                            <?php } ?>
                                            <input type="file" id="logo_image" name="category_image" onchange="validateLogo()" class="form-control mb-0" >
                                            <span>* Upload only image file </span>
                                            <div id="preview_logo"></div>
                                        </div>
                                    </div>


                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-10 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="categoryUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="categorySubmit">Submit</button>
                                        <button class="btn btn-default" onclick="window.location.href = 'addbusinesscategory';" type="reset">Reset</button>
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
      }, 1000);
  </script>
  <?php
      }
  ?>
</body>
</html>