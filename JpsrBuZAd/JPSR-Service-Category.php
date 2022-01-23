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
      $output = "Category already added for particular services";
    }
    unset($_SESSION['category_exists']);
    }

    if(isset($_POST['categorySubmit'])){

        $data = array();
        $data[] = $_POST['service_id'];
        $data[] = $_POST['category_name'];

        $existcontents = new Service();
        $existcontents = $existcontents->fetchCategory("WHERE service_id = '{$_POST['service_id']}' AND category_name = '{$_POST['category_name']}' ORDER BY id DESC")->resultSet();
        $existcontent = $existcontents[0];

        if($existcontent){
          $_SESSION['category_exists'] = true;
        } else {

          $addform = new Service();
          $addform = $addform->addCategory($data);
          $addformID = $addform->lastInsertID();

          if($addformID){
            $_SESSION['category_added'] = true;
         } else {
            $_SESSION['category_added'] = false;
         }

        }
       header("Location: JPSR-Service-Category");


    }


    if(isset($_POST['categoryUpdate'])){

        $data = array();
        $data[] = $_POST['service_id'];
        $data[] = $_POST['category_name'];
        $data[] = $_POST['category_id'];

        $existcontents = new Service();
        $existcontents = $existcontents->fetchCategory("WHERE id != '{$_POST['category_id']}' AND service_id = '{$_POST['service_id']}' AND category_name = '{$_POST['category_name']}' ORDER BY id DESC")->resultSet();
        $existcontent = $existcontents[0];

        if($existcontent){
          $_SESSION['category_exists'] = true;
        } else {

            $updateform = new Service();
            $updateform = $updateform->updateCategory($data);
            $updateformID = $updateform->rowCount();

            if($updateformID){
              $_SESSION['category_updated'] = true;
           } else {
              $_SESSION['category_updated'] = false;
           }

         }
       header("Location: JPSR-Service-Category-List");


    }


    if(isset($_POST['submit_id'])){

    $getcontents = new Service();
    $getcontents = $getcontents->fetchCategory("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];

    }

    $getservicecategorys = new Service();
    $getservicecategorys = $getservicecategorys->fetchService("ORDER BY id ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">New JPSR Category</h6>
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
                                <form method="post" id="ServiceCategoryForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="category_id" id="category_id" value="<?php echo $getcontent['id']; ?>">

                                    <div class="form-group row col-sm-5 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Services <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="service_id" id="service_id" >
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($getservicecategorys as $getservicecategory){ ?>
                                                <option value="<?php echo $getservicecategory['id']; ?>" <?php if($getcontent['service_id'] == $getservicecategory['id']){ echo 'selected'; } ?> ><?php echo $getservicecategory['service_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-5 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Category Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="category_name" name="category_name" class="form-control mb-0" value="<?php echo $getcontent['category_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-5 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="categoryUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="categorySubmit">Submit</button>
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
          $('#message_container').fadeOut(5000, function() {
              $('#message').text("");
          });
      }, 200);
  </script>
  <?php
      }
  ?>
</body>
</html>