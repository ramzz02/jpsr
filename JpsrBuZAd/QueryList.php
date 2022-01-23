<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');


  if(isset($_SESSION['query_deleted'])) {
    if($_SESSION['query_deleted']) {
        $output = "Successfully deleted";
    } else {
        $output = "Failed to delete";
    }
    unset($_SESSION['query_deleted']);
  }

  if(isset($_POST['delete_id'])){

    $data = array();
    $data[] = $_POST['delete_id'];

    $deletefile = new Service();
    $deletefile = $deletefile->removeQuery($data);
    $deletefile_id = $deletefile->rowCount();
  
    if($deletefile_id){ 
        $_SESSION['query_deleted'] = true;
    } else {
        $_SESSION['query_deleted'] = false;
    }

    header('Location: QueryList');

  }



$getquerys = new Service();
$getquerys = $getquerys->fetchQuery("ORDER BY id DESC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">JPSR Query List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Query List</li>
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
                                            <th >Name</th>
                                            <th >Mobile No</th>
                                            <th >Service Category</th>
                                            <th >Feedback</th>
                                            <th >Reg Date</th>
                                            <th >Reg Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($getquerys)){
                                            $count = 1;
                                        foreach($getquerys as $getquery){

                                        $regexp = explode("-", $getquery['reg_date']);
                                        $regDate = $regexp[2].'-'.$regexp[1].'-'.$regexp[0];
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>

                                            <td><?php echo $getquery['name']; ?></td>
                                            <td><?php echo $getquery['mobile_no']; ?></td>
                                            <?php if($getquery['category'] == 'Others'){ ?>
                                            <td><?php echo $getquery['other_category']; ?></td>
                                            <?php } else { ?>
                                            <td><?php echo $getquery['category']; ?></td>
                                            <?php } ?>
                                            <td><?php echo $getquery['feedback']; ?></td>
                                            <td><?php echo $regDate; ?></td>
                                            <td><?php echo $getquery['reg_time']; ?></td>
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