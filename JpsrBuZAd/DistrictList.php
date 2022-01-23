<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

    if(isset($_SESSION['district_updated'])){
    if($_SESSION['district_updated']){
      $output = "Successfully updated";
    } else {
      $output = "Not yet updated";
    }
    unset($_SESSION['district_updated']);
    }

    if(isset($_SESSION['district_exists'])){
    if($_SESSION['district_exists']){
      $output = "Update failed. District already added for particular state";
    }
    unset($_SESSION['district_exists']);
    }

  if(isset($_SESSION['district_deleted'])) {
    if($_SESSION['district_deleted']) {
        $output = "Successfully deleted";
    } else {
        $output = "Failed to delete";
    }
    unset($_SESSION['district_deleted']);
  }

  if(isset($_POST['delete_id'])){

    $data = array();
    $data[] = $_POST['delete_id'];

    $deletefile = new Location();
    $deletefile = $deletefile->removeDistrict($data);
    $deletefile_id = $deletefile->rowCount();
  
    if($deletefile_id){ 
        $_SESSION['district_deleted'] = true;
    } else {
        $_SESSION['district_deleted'] = false;
    }

    header('Location: DistrictList');

  }



$getdistricts = new Location();
$getdistricts = $getdistricts->fetchDistrict("ORDER BY id DESC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">District List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">District List</li>
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
                                <a href="AddDistrict">Add new district</a>
                            </div>
                            <div class="clearboth"></div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix table-list">
                                <form method="post" id='tableForm' action="" autocomplete="off">
                                <input type="hidden" id="submit_id" name="submit_id" value="<?php if(isset($_POST['submit_id'])){ echo $_POST['submit_id']; } ?>" />
                                <input type="hidden" id="delete_id" name="delete_id" value="<?php if(isset($_POST['delete_id'])){ echo $_POST['delete_id']; } ?>" />
                                <table class="table table-editable table-responsive" data-toggle="datatables" >
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;width: 10%;">S.No</th>
                                            <th>State</th>
                                            <th>District Name</th>
                                            <th>Status</th>
                                            <th style="text-align: center;width: 10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($getdistricts)){
                                            $count = 1;
                                        foreach($getdistricts as $getdistrict){
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>

                                            <?php
                                            $getlocations = new Location();
                                            $getlocations = $getlocations->fetchState("WHERE id = '{$getdistrict['state_id']}' ORDER BY id DESC")->resultSet();
                                            $getlocation = $getlocations[0];
                                            ?>
                                            <td><?php echo $getlocation['state_name']; ?></td>
                                            <td><?php echo $getdistrict['district_name']; ?></td>
                                            <td>
                                            <label class="switch">
                                            <input class="switch-input" type="checkbox" name="checkbox" <?php if(isset($getdistrict['status'])){ if($getdistrict['status'] == '1'){ echo 'checked'; } } ?> />
                                            <span class="switch-label active_update" id="<?php echo $getdistrict['id'];?>" data-on="Active" data-off="Deactive"></span>
                                            <span class="switch-handle "></span> 
                                           </label>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="JavaScript:Void(0);" id="<?php echo $getdistrict['id'];?>" class="edit">
                                                  <i class="feather feather-edit fs-20" style="color: #3a7cdc;font-weight: 700;"></i>
                                                </a>&nbsp;
                                                <!-- <a href="JavaScript:Void(0);" id="<?php echo $getward['id'];?>" class="delete">
                                                  <i class="feather feather-delete fs-20" style="color: #fb040f;font-weight: 700;"></i>
                                                </a>&nbsp;&nbsp; -->
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
        $('#tableForm').attr('action', 'AddDistrict');
        $('#tableForm').submit();
    });
  $(document).on('click', '.delete', function() {   
      var confirm_msg = confirm("Are you sure to delete?");
      if (confirm_msg == true) {
          var profile_id =  $(this).attr('id');
          $('#delete_id').val(profile_id);             
          $('#tableForm').attr('method', 'post');
          $('#tableForm').attr('action', 'DistrictList');
          $('#tableForm').submit();
      }            
  });
  $(document).on('click', '.active_update', function() {   
          var profile_id =  $(this).attr('id');
          // alert(profile_id);
          $.ajax({
            type: "POST",
            url: "status_update.php",
            data: "update_id="+profile_id+"&name=district_name",
            success: function(data){
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
      }, 1000);
  </script>
  <?php
      }
  ?>
</body>
</html>