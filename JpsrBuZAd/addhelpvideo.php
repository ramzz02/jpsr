<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['video_added'])){
    if($_SESSION['video_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['video_added']);
    }

  if(isset($_SESSION['video_exists'])){
    if($_SESSION['video_exists']){
      $output = "video already added for particular language and page";
    }
    unset($_SESSION['video_exists']);
    }

    if(isset($_POST['videoSubmit'])){

        $data = array();
        $data[] = $_POST['language'];
        $data[] = $_POST['page'];
        $data[] = $_POST['video_code'];

        $existssubs = new Help();
        $existssubs = $existssubs->fetchVideo("WHERE language = '{$_POST['language']}' AND page = '{$_POST['page']}' ORDER BY id DESC")->resultSet();
        $existssub = $existssubs[0];

        if($existssub){
          $_SESSION['page'] = true;
        } else {

          $addform = new Help();
          $addform = $addform->addVideo($data);
          $addformID = $addform->lastInsertID();

          if($addformID){
            $_SESSION['video_added'] = true;
         } else {
            $_SESSION['video_added'] = false;
         }

        }
       header("Location: addhelpvideo");

    }


    if(isset($_POST['videoUpdate'])){

        $data = array();
        $data[] = $_POST['language'];
        $data[] = $_POST['page'];
        $data[] = $_POST['video_code'];
        $data[] = $_POST['help_video_id'];

        $existssubs = new Help();
        $existssubs = $existssubs->fetchVideo("WHERE id != '{$_POST['help_video_id']}' AND language = '{$_POST['language']}' AND page = '{$_POST['page']}' ORDER BY id DESC")->resultSet();
        $existssub = $existssubs[0];

        if($existssub){
          $_SESSION['video_exists'] = true;
        } else {

            $updateform = new Help();
            $updateform = $updateform->updateVideo($data);
            $updateformID = $updateform->rowCount();

            if($updateformID){
              $_SESSION['video_updated'] = true;
           } else {
              $_SESSION['video_updated'] = false;
           }

        }
       header("Location: helpvideoList");


    }


    if(isset($_POST['submit_id'])){

    $getcontents = new Help();
    $getcontents = $getcontents->fetchVideo("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


    }

    $getlanguages = new Help();
    $getlanguages = $getlanguages->fetchLanguage("WHERE status = 'active' ORDER BY id ASC")->resultSet();

    $getpages = new Help();
    $getpages = $getpages->fetchPage("WHERE status = 'active' ORDER BY id ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Add Help Videos</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active"><?php if($getcontent){ ?>Update<?php } else { ?>Add<?php } ?> Video</li>
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
                                <form method="post" id="HelpForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="help_video_id" id="help_video_id" value="<?php echo $getcontent['id']; ?>">

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplelan">Select Language</label>
                                        <div class="col-sm-4">
                                            <select id="language" name="language" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php foreach($getlanguages as $getlanguage){ ?>
                                                <option value="<?php echo $getlanguage['id']; ?>" <?php if($getcontent['language'] == $getlanguage['id']){ echo 'selected'; } ?> ><?php echo $getlanguage['language']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePage">Select Page</label>
                                        <div class="col-sm-4">
                                            <select id="page" name="page" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php foreach($getpages as $getpage){ ?>
                                                <option value="<?php echo $getpage['page_url']; ?>" <?php if($getcontent['page'] == $getpage['page_url']){ echo 'selected'; } ?> ><?php echo $getpage['page_name']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplecode">Video code</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="video_code" name="video_code" class="form-control mb-0" value="<?php echo $getcontent['video_code']; ?>" >
                                            <span class="note">Ex: https://www.youtube.com/embed/HIC3Z6QDv1s</span>
                                        </div>
                                    </div>

                                    <!-- <?php if(isset($getcontent)){ ?>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Status</label>
                                        <div class="col-sm-4">
                                            <select id="status" name="status" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                                <option value="1" <?php if($getcontent['status'] == 1){ echo 'selected'; } ?> >Active</option>
                                                <option value="2" <?php if($getcontent['status'] == 2){ echo 'selected'; } ?> >Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?> -->


                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-10 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="videoUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="videoSubmit">Submit</button>
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
          $('#message_container').fadeOut(400, function() {
              $('#message').text("");
          });
      }, 1000);
  </script>
  <?php
      }
  ?>
</body>
</html>