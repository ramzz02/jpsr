<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');


    if(isset($_POST['incomeUpdate'])){

        $data = array();
        $data[] = $_POST['cash'];
        $data[] = $_POST['income_id'];

        $updateform = new Income();
        $updateform = $updateform->updateIncome($data);
        $updateformID = $updateform->rowCount();

        if($updateformID){
          $_SESSION['income_updated'] = true;
       } else {
          $_SESSION['income_updated'] = false;
       }

       header("Location: referral-income-list");


    }


    if(isset($_POST['submit_id'])){

    $getcontents = new Income();
    $getcontents = $getcontents->fetchIncome("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];

    $getbusinesss = new Business();
    $getbusinesss = $getbusinesss->fetchBusiness("WHERE id = '{$getcontent['business_id']}' ORDER BY id DESC")->resultSet();
    $getbusiness = $getbusinesss[0];

    $getregisters = new Register();
    $getregisters = $getregisters->fetchRegister("WHERE id = '{$getcontent['user_id']}' ORDER BY id DESC")->resultSet();
    $getregister = $getregisters[0];


    }


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
                    <h6 class="page-title-heading mr-0 mr-r-5">View Referral Income</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">View Details</li>
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
                                  <input type="hidden" name="income_id" id="income_id" value="<?php echo $getcontent['id']; ?>">

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplecode">Business name</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="business_name" name="business_name" class="form-control mb-0" value="<?php echo $getbusiness['business_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplecode">Person name</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="person_name" name="person_name" class="form-control mb-0" value="<?php echo $getbusiness['person_name']; ?>" >
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplecode">Mobile no</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="mobile_no" name="mobile_no" class="form-control mb-0" value="<?php echo $getbusiness['mobile_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplecode">Refered By</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="refered_by" name="refered_by" class="form-control mb-0" value="<?php echo $getregister['name']; ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplecode">Reference Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="ref_code" name="ref_code" class="form-control mb-0" value="<?php echo $getregister['user_code']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplecode">Cash</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="cash" name="cash" class="form-control mb-0" value="<?php echo $getcontent['cash']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-2 no-padding">
                                        <button class="btn btn-primary" type="submit" name="incomeUpdate">Update</button>
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