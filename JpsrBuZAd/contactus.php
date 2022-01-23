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
      $output = "Not yet updated";
    }
    unset($_SESSION['content_updated']);
    }

    if(isset($_POST['contactSubmit'])){

        $data = array();
        $data[] = $_POST['address'];
        $data[] = $_POST['mobile_no'];
        $data[] = $_POST['email'];

        $addform = new Contact();
        $addform = $addform->add($data);
        $addformID = $addform->lastInsertID();

        if($addformID){
          $_SESSION['content_added'] = true;
       } else {
          $_SESSION['content_added'] = false;
       }
       header("Location: contactus.php");

    }


    if(isset($_POST['contactUpdate'])){

    $data = array();
    $data[] = $_POST['address'];
    $data[] = $_POST['mobile_no'];
    $data[] = $_POST['email'];
    $data[] = $_POST['contact_id'];


   $updatenew = new Contact();
   $updatenew = $updatenew->update($data);
   $updatenew_id = $updatenew->rowCount();

   if($updatenew_id){
       $_SESSION['content_updated'] = true;
    } else {
       $_SESSION['content_updated'] = false;
    }
    header("Location: contactus.php");


  }


    $getcontents = new Contact();
    $getcontents = $getcontents->fetch("ORDER BY id DESC")->resultSet();
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
                    <h6 class="page-title-heading mr-0 mr-r-5">Contact Information</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Contact Details</li>
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
                                <form method="post" id="ContactForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="contact_id" value="<?php echo $getcontent['id']; ?>">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Address <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                            <textarea rows="8" id="editor" name="address" class="form-control mb-0"><?php echo $getcontent['address']; ?></textarea>
                                            <input type="text" name="content_id" id="content_id" style="height: 0px;border: none;" <?php if($getcontent){ ?> value="1" <?php } ?> >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Mobile No <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" id="mobile_no" name="mobile_no" class="form-control mb-0" value="<?php echo $getcontent['mobile_no']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Email ID <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" id="email" name="email" class="form-control mb-0" value="<?php echo $getcontent['email']; ?>">
                                        </div>
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-9 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="contactUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="contactSubmit">Submit</button>
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
        var data = $('#ContactForm').find('.nicEdit-main').text();
        if(data != ''){
          var content_id =  1;
          $('#content_id').val(content_id);
          // alert(content_id);
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