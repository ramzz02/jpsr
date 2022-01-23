<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['offer_updated'])){
    if($_SESSION['offer_updated']){
      $output = "Successfully updated";
    } else {
      $output = "Not yet updated";
    }
    unset($_SESSION['offer_updated']);
    }

    if(isset($_SESSION['offer_deleted'])){
    if($_SESSION['offer_deleted']){
      $output = "Successfully deleted";
    } else {
      $output = "Failed to delete";
    }
    unset($_SESSION['offer_deleted']);
    }

    if(isset($_POST['delete_id'])){

    $data = array();
    $data[] = $_POST['delete_id'];

    $getimages = new Offer();
    $getimages = $getimages->fetchOffer("WHERE id = '{$_POST['delete_id']}' ORDER BY id DESC")->resultSet();
    $getimage = $getimages[0];

     $img_path = $getimage['image_path'];
     unlink('../'.$img_path);

    $deletefile = new Offer();
    $deletefile = $deletefile->removeOffer($data);
    $deletefile_id = $deletefile->rowCount();
  
    if($deletefile_id){ 
      
        $_SESSION['offer_deleted'] = true;
    } else {
        $_SESSION['offer_deleted'] = false;
    }

    header('Location: OfferList');

  }

$getofferLists = new Offer();
$getofferLists = $getofferLists->fetchOffer("ORDER BY id DESC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Offer List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Offer List</li>
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
                                            <th>Business Name</th>
                                            <th>Person Name</th>
                                            <th>Mobile No</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Offer Amount</th>
                                            <th>Period Start Date</th>
                                            <th>Period End Date</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th style="width: 10%;text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($getofferLists)){
                                            $count = 1;
                                        foreach($getofferLists as $getofferList){
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>

                                            <?php

                                            $getbusiness = new Business();
                                            $getbusiness = $getbusiness->fetchBusiness("WHERE id = '{$getofferList['business_id']}' ORDER BY id DESC")->resultSet();
                                            $getbusz = $getbusiness[0];

                                            $getcategorys = new Offer();
                                            $getcategorys = $getcategorys->fetchCategory("WHERE id = '{$getofferList['category']}' ORDER BY id ASC")->resultSet();
                                            $getcategory = $getcategorys[0];

                                            $start_d = explode("-", $getofferList['period_start_date']);
                                            $startDate = $start_d[2].'/'.$start_d[1].'/'.$start_d[0];

                                            $end_d = explode("-", $getofferList['period_end_date']);
                                            $endDate = $end_d[2].'/'.$end_d[1].'/'.$end_d[0];

                                            ?>
                                            <td><?php echo $getbusz['business_name']; ?></td>
                                            <td><?php echo $getbusz['person_name']; ?></td>
                                            <td><?php echo $getbusz['mobile_no']; ?></td>
                                            <td><?php echo $getcategory['category_name']; ?></td>
                                            <td><?php echo $getofferList['title']; ?></td>
                                            <td><?php echo $getofferList['amount']; ?></td>
                                            <td><?php echo $startDate; ?></td>
                                            <td><?php echo $endDate; ?></td>
                                            <td>
                                            <label class="switch">
                                            <input class="switch-input" type="checkbox" name="checkbox" <?php if($getofferList['status'] == 'active'){ echo 'checked'; } ?> />
                                            <span class="switch-label active_update" id="<?php echo $getofferList['id'];?>" data-on="Active" data-off="Deactive"></span>
                                            <span class="switch-handle "></span> 
                                           </label>
                                            </td>
                                            <td>
                                            <?php if($getofferList['image_path']){ ?>
                                              <img src="../<?php echo $getofferList['image_path']; ?>" style="width: 50px;">
                                            <?php }  else { ?>
                                              No Image
                                            <?php } ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $getofferList['id'];?>" src="assets/img/edit_icon.png"  class="edit"></a>&nbsp;&nbsp;
                                                <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $getofferList['id'];?>" src="assets/img/delete_icon.png"  class="delete"></a>&nbsp;&nbsp;
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
        $('#tableForm').attr('action', 'AddOffer');
        $('#tableForm').submit();
    });
  $(document).on('click', '.delete', function() {   
      var confirm_msg = confirm("Are you sure to delete?");
      if (confirm_msg == true) {
          var profile_id =  $(this).attr('id');
          $('#delete_id').val(profile_id);             
          $('#tableForm').attr('method', 'post');
          $('#tableForm').attr('action', 'OfferList');
          $('#tableForm').submit();
      }            
  });
  $(document).on('click', '.active_update', function() {   
          var profile_id =  $(this).attr('id');
          // alert(profile_id);
          $.ajax({
            type: "POST",
            url: "status_update.php",
            data: "update_id="+profile_id+"&name=offer",
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