<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['offer_added'])){
    if($_SESSION['offer_added']){
      $output = "Successfully uploaded";
    } else {
      $output = "Failed to upload";
    }
    unset($_SESSION['offer_added']);
    }

   if(isset($_POST['OfferSubmit'])){

    $data = array();
    $data[] = "";
    $data[] = 0;
    $data[] = $_POST['business_id'];
    $data[] = $_POST['category'];
    $data[] = $_POST['title'];
    if($_FILES['image_path']['name']){
    $N_Imgs = 'offer_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
    $data[] = $N_Imgs;
    move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$N_Imgs);
    } else {
    $data[] = "";   
    }
    $data[] = $_POST['offer_description'];
    $data[] = $_POST['offer_amount'];
    $exp_start = explode("/", $_POST['offer_period_start_date']);
    $data[] = $exp_start[2].'-'.$exp_start[1].'-'.$exp_start[0];
    $exp_end = explode("/", $_POST['offer_period_end_date']);
    $data[] = $exp_end[2].'-'.$exp_end[1].'-'.$exp_end[0];
    $data[] = $_POST['payment_type'];
    $data[] = date("Y-m-d");
    $data[] = date("h:i A");

    $addform = new Offer();
    $addform = $addform->addOffer($data);
    $addformID = $addform->lastInsertID();

    if($addformID){
      $_SESSION['offer_added'] = true;
    } else {
      $_SESSION['offer_added'] = false;
    }

    header("Location: AddOffer");

  }


    if(isset($_POST['OfferUpdate'])){

        $data = array();
        $data[] = $_POST['business_id'];
        $data[] = $_POST['category'];
        $data[] = $_POST['title'];
        
        $editfiles = new Offer();
        $editfiles = $editfiles->fetchOffer("WHERE id ='{$_POST['submit_id']}'")->resultSet();
        $editfile = $editfiles[0];

        if($_FILES['image_path']['error'] == 0){
        $OffImgs = 'offer_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
        $data[] = $OffImgs;
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$OffImgs);
        } else {
        $data[] = $editfile['image_path'];   
        }
        $data[] = $_POST['offer_description'];
        $data[] = $_POST['offer_amount'];
        $exp_start = explode("/", $_POST['offer_period_start_date']);
        $data[] = $exp_start[2].'-'.$exp_start[1].'-'.$exp_start[0];
        $exp_end = explode("/", $_POST['offer_period_end_date']);
        $data[] = $exp_end[2].'-'.$exp_end[1].'-'.$exp_end[0];
        $data[] = $_POST['payment_type'];
        $data[] = $_POST['submit_id'];

        $updateform = new Offer();
        $updateform = $updateform->updateOffer($data);
        $updateformID = $updateform->rowCount();


        if($updateformID){
          $_SESSION['offer_updated'] = true;
       } else {
          $_SESSION['offer_updated'] = false;
       }
       header("Location: OfferList");


    }


    if(isset($_POST['submit_id'])){


    $getcontents = new Offer();
    $getcontents = $getcontents->fetchOffer("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];

    $geteditbusiness = new Business();
    $geteditbusiness = $geteditbusiness->fetchBusiness("WHERE id = '{$getcontent['business_id']}' ORDER BY id DESC")->resultSet();
    $geteditbusz = $geteditbusiness[0];

    $start_exp = explode("-", $getcontent['period_start_date']);
    $period_start_date = $start_exp[2].'/'.$start_exp[1].'/'.$start_exp[0];

    $end_exp = explode("-", $getcontent['period_end_date']);
    $period_end_date = $end_exp[2].'/'.$end_exp[1].'/'.$end_exp[0];


    }


$getlocations = new Location();
$getlocations = $getlocations->fetchLocation("WHERE status = '1' ORDER BY location_name ASC")->resultSet();

$offerscategorys = new Offer();
$offerscategorys = $offerscategorys->fetchCategory("WHERE status = '1' ORDER BY id ASC")->resultSet();

$getbusinesss = new Business();
$getbusinesss = $getbusinesss->fetchBusiness("WHERE type != 'admin' ORDER BY business_name ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Offers</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Offer</li>
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
                                <form method="post" <?php if($getcontent){ ?> id="OfferEditForm" <?php } else { ?> id="OfferForm" <?php } ?> enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">

                                    <!-- <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Location <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="location" name="location" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php foreach($getlocations as $getlocation){ ?>
                                                <option value="<?php echo $getlocation['id']; ?>" <?php if($getcontent['location'] == $getlocation['id']){ echo 'selected'; } ?> ><?php echo $getlocation['location_name']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div> -->

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control mb-0" name="business_name" id="business_name">
                                                <option value="" Selected Disabled> -- Select -- </option>
                                                <?php foreach($getbusinesss as $getbusiness){ ?>
                                                <option value="<?php echo $getbusiness['business_name']; ?>" <?php if($geteditbusz['business_name'] == $getbusiness['business_name']){ echo 'selected'; } ?> ><?php echo $getbusiness['business_name']; ?></option>
                                                <?php } ?>
                                              </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="business_id" id="business_id" value="<?php echo $getcontent['business_id']; ?>">

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Proprietor (or) Authorized name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="person_name" name="person_name" class="form-control mb-0" value="<?php echo $geteditbusz['person_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Mobile no <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="mobile_no" name="mobile_no" class="form-control mb-0" value="<?php echo $geteditbusz['mobile_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Email ID <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="email" name="email" class="form-control mb-0" value="<?php echo $geteditbusz['email']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Full Address <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="address" name="address" class="form-control mb-0" value="<?php echo $geteditbusz['address']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Category <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="category" name="category" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <?php foreach($offerscategorys as $offerscategory){ ?>
                                              <option value="<?php echo $offerscategory['id']; ?>" <?php if($getcontent['category'] == $offerscategory['id']){ echo 'selected'; } ?> ><?php echo $offerscategory['category_name']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Title <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="title" name="title" class="form-control mb-0" value="<?php echo $getcontent['title']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Office Image <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" id="logo_image" name="image_path" onchange="validateLogo()" class="form-control mb-0" >
                                            <span class="note">* Upload only image file </span>
                                            <span class="note">Upload size: width:475px, height:315px </span>
                                            <div id="preview_logo"></div>
                                            <?php if($getcontent){ ?>
                                            <img src="../<?php echo $getcontent['image_path']; ?>" style="width: 50px;">
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Offer Amount <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="offer_amount" name="offer_amount" class="form-control mb-0" <?php if($getcontent){ ?> value="<?php echo $getcontent['amount']; ?>" <?php } else { ?> value="50" <?php } ?> readonly >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Offer Description <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="4" id="offer_description" name="offer_description" class="form-control mb-0" ><?php echo $getcontent['offer_description']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Offer Period Start Date <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="offer_period_start_date" name="offer_period_start_date" class="form-control mb-0" value="<?php echo $period_start_date; ?>" placeholder="DD/MM/YYYY" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Offer Period End Date <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="offer_period_end_date" name="offer_period_end_date" class="form-control mb-0" value="<?php echo $period_end_date; ?>" placeholder="DD/MM/YYYY" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Payment Type <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="payment_type" id="payment_type" <?php if($ads_not_expiry == 1){ ?> disabled <?php } ?> >
                                                <option value="" Selected Disabled>Choose</option>
                                                <option value="gpay" <?php if($getcontent['payment_type'] == 'gpay'){ echo 'selected'; } ?> >Gpay</option>
                                                <option value="online" <?php if($getcontent['payment_type'] == 'online'){ echo 'selected'; } ?> >Online</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-3 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="OfferUpdate">Update</button>
                                        <button class="btn btn-default" onclick="window.location.href = 'OfferList';" type="button">Cancel</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="OfferSubmit">Submit</button>
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
<script type="text/javascript">
    $(document).ready(function(){

    $('#business_name').on('change',function(){
    var BuzName = $(this).val();

    if(BuzName){

    $.ajax({

    type:'POST',
    url:'businessData.php',
    data:'buzz_name='+BuzName,

    success:function(response){
    var parsedData = jQuery.parseJSON(response);

    if(parsedData.status == 'success'){
       $('#business_id').val(parsedData.business_id);
       $('#person_name').val(parsedData.person_name);
       $('#mobile_no').val(parsedData.mobile_no);
       $('#email').val(parsedData.email);
       $('#address').val(parsedData.address);
    } else {
       $('#business_id').val('');
       $('#person_name').val('');
       $('#mobile_no').val('');
       $('#email').val('');
       $('#address').val('');
    }

    }

    });

    }

    });

});
</script>
 <script type="text/javascript">
   $("#offer_period_start_date").datepicker({
            dateFormat: "dd/mm/yy",
            minDate: 0,
            onSelect: function (date) {
                var dt2 = $('#offer_period_end_date');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                dt2.datepicker('setDate', minDate);
                startDate.setDate(startDate.getDate() + 30);
                //sets dt2 maxDate to the last day of 30 days window
                dt2.datepicker('option', 'maxDate', startDate);
                dt2.datepicker('option', 'minDate', minDate);
                $(this).datepicker('option', 'minDate', minDate);
            }
        });
        $('#offer_period_end_date').datepicker({
            dateFormat: "dd/mm/yy"
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