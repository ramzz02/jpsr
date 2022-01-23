<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['news_updated'])){
    if($_SESSION['news_updated']){
      $output = "Successfully updated";
    } else {
      $output = "Not yet updated";
    }
    unset($_SESSION['news_updated']);
    }

    if(isset($_SESSION['news_deleted'])){
    if($_SESSION['news_deleted']){
      $output = "Successfully deleted";
    } else {
      $output = "Failed to delete";
    }
    unset($_SESSION['news_deleted']);
    }

    if(isset($_POST['delete_id'])){

    $data = array();
    $data[] = $_POST['delete_id'];

    $getimages = new News();
    $getimages = $getimages->fetchTransformation("WHERE id = '{$_POST['delete_id']}' ORDER BY id DESC")->resultSet();
    $getimage = $getimages[0];

     $img_path = $getimage['image_path'];
     unlink('../'.$img_path);

    $deletefile = new News();
    $deletefile = $deletefile->removeTransformation($data);
    $deletefile_id = $deletefile->rowCount();
  
    if($deletefile_id){ 
        $_SESSION['news_deleted'] = true;
    } else {
        $_SESSION['news_deleted'] = false;
    }

    header('Location: TransformationList');

  }

$getnewsLists = new News();
$getnewsLists = $getnewsLists->fetchTransformation("ORDER BY id DESC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Transformation List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Transformation List</li>
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
                            <div class="widget-body clearfix table-list" style="width: 100%;overflow-y: auto;">
                                <form method="post" id='tableForm' action="">
                                <input type="hidden" id="submit_id" name="submit_id" value="<?php echo $_POST['submit_id'];?>" />
                                <input type="hidden" id="delete_id" name="delete_id" value="<?php echo $_POST['delete_id'];?>" />
                                <table class="table table-editable table-responsive display compact responsive nowrap" data-toggle="datatables" >
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;text-align: center;">S.No</th>
                                            <th>Location</th>
                                            <th style="width: 20%;">Title</th>
                                            <th>Description</th>
                                            <th>Reg Date</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th style="width: 10%;text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($getnewsLists)){
                                            $count = 1;
                                        foreach($getnewsLists as $getnewsList){
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>

                                            <?php

                                            $getlocations = new Location();
                                            $getlocations = $getlocations->fetchLocation("WHERE id = '{$getnewsList['location']}' ORDER BY id ASC")->resultSet();
                                            $getlocation = $getlocations[0];

                                            $reg_d = explode("-", $getnewsList['reg_date']);
                                            $regDate = $reg_d[2].'/'.$reg_d[1].'/'.$reg_d[0];

                                            ?>
                                            <td><?php echo $getlocation['location_name']; ?></td>
                                            <td><?php echo $getnewsList['title']; ?></td>
                                            <td><?php echo $getnewsList['description']; ?></td>
                                            <td><?php echo $regDate; ?></td>
                                            <td>
                                            <label class="switch">
                                            <input class="switch-input" type="checkbox" name="checkbox" <?php if($getnewsList['status'] == 'active'){ echo 'checked'; } ?> />
                                            <span class="switch-label active_update" id="<?php echo $getnewsList['id'];?>" data-on="Active" data-off="Deactive"></span>
                                            <span class="switch-handle "></span> 
                                           </label>
                                            </td>
                                            <td>
                                            <?php if($getnewsList['image_path']){ ?>
                                              <img src="../<?php echo $getnewsList['image_path']; ?>" style="width: 50px;">
                                            <?php }  else { ?>
                                              No Image
                                            <?php } ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <!-- <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $getnewsList['id'];?>" src="assets/img/edit_icon.png"  class="edit"></a>&nbsp;&nbsp; -->
                                                <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $getnewsList['id'];?>" src="assets/img/delete_icon.png"  class="delete"></a>&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                        <?php $count++; } } ?>
                                    </tbody>
                                </table>
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

<script type="text/javascript">
  $(document).on('click', '.edit', function() {                  
        var profile_id =  $(this).attr('id');
        $('#submit_id').val(profile_id);             
        $('#tableForm').attr('method', 'post');
        $('#tableForm').attr('action', 'AddNews');
        $('#tableForm').submit();
    });
  $(document).on('click', '.delete', function() {   
      var confirm_msg = confirm("Are you sure to delete?");
      if (confirm_msg == true) {
          var profile_id =  $(this).attr('id');
          $('#delete_id').val(profile_id);             
          $('#tableForm').attr('method', 'post');
          $('#tableForm').attr('action', 'TransformationList');
          $('#tableForm').submit();
      }            
  });
  $(document).on('click', '.active_update', function() {   
          var profile_id =  $(this).attr('id');
          // alert(profile_id);
          $.ajax({
            type: "POST",
            url: "status_update.php",
            data: "update_id="+profile_id+"&name=transformation_news",
            success: function(data){
                // $('#success_message').fadeIn().html(data);
                // setTimeout(function() {
                //     $('#success_message').fadeOut("slow");
                // }, 3000 );
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
</body>
</html>