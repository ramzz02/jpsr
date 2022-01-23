<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');


  if(isset($_SESSION['video_deleted'])) {
    if($_SESSION['video_deleted']) {
        $output = "Successfully deleted";
    } else {
        $output = "Failed to delete";
    }
    unset($_SESSION['video_deleted']);
  }

  if(isset($_POST['updateBtn'])){

    foreach($_POST['delete'] as $value){

    $data = array();
    $data[] = $value;

    $photogallerys = new Upload();
    $photogallerys = $photogallerys->fetchVideo("WHERE id = '{$value}' ORDER BY id DESC")->resultSet();
    $photogallery = $photogallerys[0];

    $video_path = $photogallery['video_path'];

    $deletefile = new Upload();
    $deletefile = $deletefile->removeVideo($data);
    $deletefile_id = $deletefile->rowCount();

    unlink('../'.$video_path);

    }

    if($deletefile_id){ 
        $_SESSION['video_deleted'] = true;
    }else{
        $_SESSION['video_deleted'] = false;
    }
    header('Location: videoList.php');

  }


$getvideos = new Upload();
$getvideos = $getvideos->fetchVideo("ORDER BY id DESC")->resultSet();


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
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5">Video List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Video List</li>
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
                            <div class="widget-heading clearfix">
                                
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <form method="post" id="tableForm">
                                    <?php if($getvideos){ ?>
                                    <?php foreach($getvideos as $getvideo){ ?>
                                    <div class="form-group col-md-3 gallery_list" style="float: left;">
                                        <input type="checkbox" id="delete_gallery" name="delete[]" value="<?php echo $getvideo['id']; ?>" style="vertical-align: top;">
                                        <video width="250"  controls><source src="../<?php echo $getvideo['video_path']; ?>" type="video/mp4"></video>
                                    </div><!-- end form-group -->
                                    <?php } ?>
                                    <div style="clear: both;" id="display_error"></div>
                                    <div class="text-right">
                                        <button type="submit" name="updateBtn" id="delete_submit" class="btn btn-primary">Delete</button>
                                    </div>
                                  <?php }  else { ?>

                                  <h3>Video not available</h3>
                                  <?php }  ?>
                                </form>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
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
</body>
 <script>  
 $(document).ready(function(){  
      $('#delete_submit').click(function(){ 

        $(".error").remove();

        var chks = document.getElementsByName('delete[]');
        var hasChecked = false;
        for (var i = 0; i < chks.length; i++)
        {
          if (chks[i].checked)
          {
          hasChecked = true;
          break;
          }
        }

        if (hasChecked == false)
          {
          $('#display_error').after('<label class="mt-2 text-danger error">* Please select any one video</label>');
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
</html>