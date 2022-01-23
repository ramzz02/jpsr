<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['subs_added'])){
    if($_SESSION['subs_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['subs_added']);
    }

  if(isset($_SESSION['subs_exists'])){
    if($_SESSION['subs_exists']){
      $output = "Failed to add. Subscription already added for particular period";
    }
    unset($_SESSION['subs_exists']);
    }

    if(isset($_POST['SubscriptionSubmit'])){

        $data = array();
        $data[] = $_POST['period'];
        $data[] = $_POST['plan'];
        $data[] = $_POST['amount'];

        $existsdatas = new Business();
        $existsdatas = $existsdatas->fetchSubscription("WHERE period = '{$_POST['period']}' AND plan = '{$_POST['plan']}' ORDER BY id DESC")->resultSet();
        $existsdata = $existsdatas[0];

        if($existsdata){
          $_SESSION['subs_exists'] = true;
        } else {

          $addform = new Business();
          $addform = $addform->addSubscription($data);
          $addformID = $addform->lastInsertID();

          if($addformID){
            $_SESSION['subs_added'] = true;
         } else {
            $_SESSION['subs_added'] = false;
         }

        }
       header("Location: BusinessSubscription");

    }


    if(isset($_POST['SubscriptionUpdate'])){

        $data = array();
        $data[] = $_POST['period'];
        $data[] = $_POST['plan'];
        $data[] = $_POST['amount'];
        $data[] = $_POST['subscription_id'];

        $existsdatas = new Business();
        $existsdatas = $existsdatas->fetchSubscription("WHERE id != '{$_POST['subscription_id']}' AND period = '{$_POST['period']}' AND plan = '{$_POST['plan']}' ORDER BY id DESC")->resultSet();
        $existsdata = $existsdatas[0];

        if($existsdata){
          $_SESSION['subs_exists'] = true;
        } else {

            $updateform = new Business();
            $updateform = $updateform->updateSubscription($data);
            $updateformID = $updateform->rowCount();

            if($updateformID){
              $_SESSION['subs_updated'] = true;
           } else {
              $_SESSION['subs_updated'] = false;
           }

        }
       header("Location: BusinessSubscriptionList");


    }


    if(isset($_POST['submit_id'])){

    $getcontents = new Business();
    $getcontents = $getcontents->fetchSubscription("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


    }

    $getperiods = new Business();
    $getperiods = $getperiods->fetchPeriod("WHERE status = '1' ORDER BY id ASC")->resultSet();

    $getplans = new Business();
    $getplans = $getplans->fetchPlan("WHERE status = '1' ORDER BY id ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Business Subscription</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active"><?php if(isset($getcontent)){ ?>Update<?php } else { ?>Add<?php } ?> Subscription</li>
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
                                <a href="BusinessSubscriptionList">Business Subscription List</a>
                            </div>
                            <div class="clearboth"></div>
                            <div class="widget-body clearfix">
                                <form method="post" id="BusinessSubscriptionForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="subscription_id" id="subscription_id" value="<?php echo $getcontent['id']; ?>">

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Select Period</label>
                                        <div class="col-sm-4">
                                            <select id="period" name="period" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php foreach($getperiods as $getperiod){ ?>
                                                <option value="<?php echo $getperiod['id']; ?>" <?php if(isset($getcontent['period'])){ if($getcontent['period'] == $getperiod['id']){ echo 'selected'; } } ?> ><?php echo $getperiod['period']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Select Plan</label>
                                        <div class="col-sm-4">
                                            <select id="plan" name="plan" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php foreach($getplans as $getplan){ ?>
                                                <option value="<?php echo $getplan['id']; ?>" <?php if(isset($getcontent['plan'])){ if($getcontent['plan'] == $getplan['id']){ echo 'selected'; } } ?> ><?php echo $getplan['plan_code']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Plan Amount</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="amount" name="amount" class="form-control mb-0" value="<?php if(isset($getcontent['amount'])){ echo $getcontent['amount']; } ?>" >
                                        </div>
                                    </div>


                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-10 no-padding">
                                        <?php if(isset($getcontent)){ ?>
                                        <button class="btn btn-primary" type="submit" name="SubscriptionUpdate">Update</button>
                                        <button class="btn btn-default" onclick="window.location.href = 'BusinessSubscriptionList';" type="reset">Reset</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="SubscriptionSubmit">Submit</button>
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
      }, 2000);
  </script>
  <?php
      }
  ?>
</body>
</html>