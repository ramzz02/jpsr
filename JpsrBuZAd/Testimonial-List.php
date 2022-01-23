<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['content_deleted'])) {
    if($_SESSION['content_deleted']) {
        $output = "Successfully deleted";
    } else {
        $output = "Failed to delete";
    }
    unset($_SESSION['content_deleted']);
  }

  if(isset($_POST['delete_id'])){

    $data = array();
    $data[] = $_POST['delete_id'];

    $deletefile = new Testimonial();
    $deletefile = $deletefile->removeTestimonial($data);
    $deletefile_id = $deletefile->rowCount();
  
    if($deletefile_id){ 
        $_SESSION['content_deleted'] = true;
    } else {
        $_SESSION['content_deleted'] = false;
    }

    header('Location: Testimonial-List');

  }



$getcontents = new Testimonial();
$getcontents = $getcontents->fetchTestimonial("ORDER BY id DESC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Testimonial List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Testimonials</li>
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
                                            <th>Cus. Name</th>
                                            <th>Mobile No</th>
                                            <th>Services</th>
                                            <th>Comments</th>
                                            <th>Comm. date</th>
                                            <th >Status</th>
                                            <th style="text-align: center;width: 10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($getcontents)){
                                            $count = 1;
                                        foreach($getcontents as $getcontent){
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>

                                            <?php
                                            $getregisters = new Register();
                                            $getregisters = $getregisters->fetchRegister("WHERE id = '{$getcontent['user_id']}' ORDER BY id DESC")->resultSet();
                                            $getregister = $getregisters[0];

                                            $getservices = new Service();
                                            $getservices = $getservices->fetchCategory("WHERE id = '{$getcontent['services']}' ORDER BY id DESC")->resultSet();
                                            $getservice = $getservices[0];
                                            ?>
                                            <td><?php echo $getregister['name']; ?></td>
                                            <td><?php echo $getregister['phone']; ?></td>
                                            <?php 
                                            if($getcontent['services'] == 'Others'){ ?>
                                            <td>Others</td>
                                            <?php } else { ?>
                                            <td><?php echo $getservice['category_name']; ?></td>
                                            <?php } ?>
                                            <td><?php echo $getcontent['feedback']; ?></td>
                                            <?php
                                            $reg_d = explode("-", $getcontent['reg_date']);
                                            $regD = $reg_d[2].'/'.$reg_d[1].'/'.$reg_d[0];
                                            ?>
                                            <td><?php echo $regD; ?></td>
                                            <td>
                                            <label class="switch">
                                            <input class="switch-input" type="checkbox" name="checkbox" <?php if($getcontent['status'] == 'active'){ echo 'checked'; } ?> />
                                            <span class="switch-label active_update" id="<?php echo $getcontent['id'];?>" data-on="Active" data-off="Deactive"></span>
                                            <span class="switch-handle "></span> 
                                           </label>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="JavaScript:Void(0);" id="<?php echo $getcontent['id'];?>" class="delete">
                                                  <i class="feather feather-delete fs-20" style="color: #fb040f;font-weight: 700;"></i>
                                                </a>&nbsp;&nbsp;
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
  $(document).on('click', '.delete', function() {   
      var confirm_msg = confirm("Are you sure to delete?");
      if (confirm_msg == true) {
          var profile_id =  $(this).attr('id');
          $('#delete_id').val(profile_id);             
          $('#tableForm').attr('method', 'post');
          $('#tableForm').attr('action', 'Testimonial-List');
          $('#tableForm').submit();
      }            
  });
  $(document).on('click', '.active_update', function() {   
          var profile_id =  $(this).attr('id');
          // alert(profile_id);
          $.ajax({
            type: "POST",
            url: "status_update.php",
            data: "update_id="+profile_id+"&name=testimonial",
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