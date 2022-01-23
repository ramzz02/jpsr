<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

    if(isset($_SESSION['payment_updated'])){
    if($_SESSION['payment_updated']){
      $output = "Successfully updated";
    } else {
      $output = "Not yet updated";
    }
    unset($_SESSION['payment_updated']);
    }

  if(isset($_SESSION['payment_deleted'])) {
    if($_SESSION['payment_deleted']) {
        $output = "Successfully deleted";
    } else {
        $output = "Failed to delete";
    }
    unset($_SESSION['payment_deleted']);
  }

  if(isset($_POST['delete_id'])){

    $data = array();
    $data[] = $_POST['delete_id'];

    $deletefile = new Payment();
    $deletefile = $deletefile->removePayment($data);
    $deletefile_id = $deletefile->rowCount();
  
    if($deletefile_id){ 
        $_SESSION['payment_deleted'] = true;
    } else {
        $_SESSION['payment_deleted'] = false;
    }

    header('Location: Payment-Gateway-List');

  }

$getpaymentlists = new Payment();
$getpaymentlists = $getpaymentlists->fetchPayment("ORDER BY id DESC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Payment Gateway List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Payment Gateway</li>
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
                                            <th>Name</th>
                                            <th>Mobile No</th>
                                            <th>Email</th>
                                            <th>Purpose</th>
                                            <th>Amount (₹)</th>
                                            <th>Description</th>
                                            <th>Payment date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($getpaymentlists)){
                                            $count = 1;
                                        foreach($getpaymentlists as $getpaymentlist){
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>

                                            <?php
                                            $getusers = new Register();
                                            $getusers = $getusers->fetchRegister("WHERE id = '{$getpaymentlist['user_id']}' ORDER BY id DESC")->resultSet();
                                            $getuser = $getusers[0];
                                            ?>
                                            <td><?php echo $getuser['name']; ?></td>
                                            <td><?php echo $getuser['phone']; ?></td>
                                            <td><?php echo $getuser['email']; ?></td>
                                            <?php
                                            if($getpaymentlist['purpose'] == 1){
                                            ?>
                                            <td>Register Your Business</td>
                                            <?php } else if($getpaymentlist['purpose'] == 2){ ?>
                                            <td>Register Your Ad</td>
                                            <?php } else if($getpaymentlist['purpose'] == 3){ ?>
                                            <td>Offers</td>
                                            <?php } ?>
                                            <td><?php echo $getpaymentlist['amount']; ?></td>
                                            <td><?php echo $getpaymentlist['description']; ?></td>
                                              <?php 
                                              $r_d = explode("-", $getpaymentlist['reg_date']);
                                              $reg_date = $r_d[2].'/'.$r_d[1].'/'.$r_d[0];
                                              ?> 
                                            <td><?php echo $reg_date; ?></td>
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