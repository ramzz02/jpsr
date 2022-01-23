<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

    if(isset($_SESSION['user_updated'])){
    if($_SESSION['user_updated']){
      $output = "Successfully updated";
    } else {
      $output = "Not yet updated";
    }
    unset($_SESSION['user_updated']);
    }

  if(isset($_SESSION['user_deleted'])) {
    if($_SESSION['user_deleted']) {
        $output = "Successfully deleted";
    } else {
        $output = "Failed to delete";
    }
    unset($_SESSION['user_deleted']);
  }

  if(isset($_POST['delete_id'])){

    $data = array();
    $data[] = $_POST['delete_id'];

    $deletefile = new Register();
    $deletefile = $deletefile->removeRegister($data);
    $deletefile_id = $deletefile->rowCount();
  
    if($deletefile_id){ 
        $_SESSION['user_deleted'] = true;
    } else {
        $_SESSION['user_deleted'] = false;
    }

    header('Location: UserList');

  }



$getusers = new Register();
$getusers = $getusers->fetchRegister("ORDER BY id DESC")->resultSet();


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
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5">Users List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Users</li>
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
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix table-list">
                                <form method="post" id='tableForm' action="">
                                <input type="hidden" id="submit_id" name="submit_id" value="<?php echo $_POST['submit_id'];?>" />
                                <input type="hidden" id="delete_id" name="delete_id" value="<?php echo $_POST['delete_id'];?>" />
                                <table class="table table-editable table-responsive" data-toggle="datatables" >
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;width: 10%;">S.No</th>
                                            <th >User Code</th>
                                            <th >Name</th>
                                            <th >Mobile No</th>
                                            <!-- <th >Email</th> -->
                                            <th style="width: 10%;">Location City</th>
                                            <th style="width: 10%;">Business City</th>
                                            <th >Ward No</th>
                                            <th >Area</th>
                                            <th >Reg date</th>
                                            <!-- <th >Upload Business</th>
                                            <th >Upload Ads</th> -->
                                            <th style="text-align: center;width: 10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($getusers)){
                                            $count = 1;
                                        foreach($getusers as $getuser){
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>

                                            <?php

                                            $businesscounts = new Business();
                                            $businesscounts = $businesscounts->fetchBusiness("WHERE enter_by = '{$getuser['id']}' ORDER BY id DESC")->resultSet();
                                            $totalBusiness = count($businesscounts);

                                            $adscounts = new Advertisement();
                                            $adscounts = $adscounts->fetchAds("WHERE enter_by = '{$getuser['id']}' ORDER BY id DESC")->resultSet();
                                            $totalAds = count($adscounts);

                                            $getcitieslists = new Location();
                                            $getcitieslists = $getcitieslists->fetchLocation("WHERE id = '{$getuser['business_display_city']}' ORDER BY location_name ASC")->resultSet();
                                            $getcitieslist = $getcitieslists[0];

                                            $getuserswards = new Location();
                                            $getuserswards = $getuserswards->fetchWard("WHERE id = '{$getuser["ward_no"]}' ORDER BY ward_no ASC")->resultSet();
                                            $getusersward = $getuserswards[0];

                                            $getuserAreas = new Location();
                                            $getuserAreas = $getuserAreas->fetchArea("WHERE id = '{$getuser["area"]}' ORDER BY area_name ASC")->resultSet();
                                            $getuserArea = $getuserAreas[0];

                                            ?>
                                            <td><?php echo $getuser['user_code']; ?></td>
                                            <td><?php echo $getuser['name']; ?></td>
                                            <td><?php echo $getuser['phone']; ?></td>
                                            <!-- <td><?php echo $getuser['email']; ?></td> -->
                                            <td><?php echo $getuser['city']; ?></td>
                                            <td><?php echo $getcitieslist['location_name']; ?></td>
                                            <td><?php echo $getusersward['ward_no']; ?></td>
                                            <td><?php echo $getuserArea['area_name']; ?></td>
                                            <!-- <td><?php echo ucwords($getuser['occupation_type']); ?></td> -->
                                              <?php 
                                              $r_d = explode("-", $getuser['reg_date']);
                                              $reg_date = $r_d[2].'/'.$r_d[1].'/'.$r_d[0];
                                              ?> 
                                            <td><?php echo $reg_date; ?></td>
                                           <!--  <td style="text-align: center;"><?php echo $totalBusiness; ?></td>
                                            <td style="text-align: center;"><?php echo $totalAds; ?></td> -->
                                            <td style="text-align: center;">
                                                <a href="JavaScript:Void(0);" id="<?php echo $getuser['id'];?>" class="edit">
                                                  <i class="feather feather-edit fs-20" style="color: #3a7cdc;font-weight: 700;"></i>
                                                </a>&nbsp;
                                                <!-- <a href="JavaScript:Void(0);" id="<?php echo $getuser['id'];?>" class="delete">
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
        $('#tableForm').attr('action', 'EditUser');
        $('#tableForm').submit();
    });
  $(document).on('click', '.delete', function() {   
      var confirm_msg = confirm("Are you sure to delete?");
      if (confirm_msg == true) {
          var profile_id =  $(this).attr('id');
          $('#delete_id').val(profile_id);             
          $('#tableForm').attr('method', 'post');
          $('#tableForm').attr('action', 'UserList');
          $('#tableForm').submit();
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