<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['amount_added'])){
    if($_SESSION['amount_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['amount_added']);
    }

  if(isset($_SESSION['amount_updated'])){
    if($_SESSION['amount_updated']){
      $output = "Successfully updated";
    } else {
      $output = "Failed to update";
    }
    unset($_SESSION['amount_updated']);
    }


    if(isset($_POST['amountSubmit'])){

        $data = array();
        $data[] = $_POST['amount'];


          $addform = new Offer();
          $addform = $addform->addAmount($data);
          $addformID = $addform->lastInsertID();

          if($addformID){
            $_SESSION['amount_added'] = true;
         } else {
            $_SESSION['amount_added'] = false;
         }

       header("Location: OfferAmount");

    }


    if(isset($_POST['amountUpdate'])){

        $data = array();
        $data[] = $_POST['amount'];
        $data[] = $_POST['submit_id'];

        $updateform = new Offer();
        $updateform = $updateform->updateAmount($data);
        $updateformID = $updateform->rowCount();

        if($updateformID){
          $_SESSION['amount_updated'] = true;
       } else {
          $_SESSION['amount_updated'] = false;
       }

       header("Location: OfferAmount");


    }


    $getcontents = new Offer();
    $getcontents = $getcontents->fetchAmount("ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Offer Amount</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active"><?php if($getcontent){ ?>Update<?php } else { ?>Add<?php } ?> Amount</li>
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
                                <form method="post" id="AmountForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Amount</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="amount" name="amount" class="form-control mb-0" value="<?php echo $getcontent['amount']; ?>" >
                                        </div>
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-10 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="amountUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="amountSubmit">Submit</button>
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