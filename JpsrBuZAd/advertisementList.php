<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['ads_updated'])){
    if($_SESSION['ads_updated']){
      $output = "Successfully updated";
    } else {
      $output = "Not yet updated";
    }
    unset($_SESSION['ads_updated']);
    }

    if(isset($_SESSION['ads_deleted'])){
    if($_SESSION['ads_deleted']){
      $output = "Successfully deleted";
    } else {
      $output = "Failed to delete";
    }
    unset($_SESSION['ads_deleted']);
    }

    if(isset($_POST['delete_id'])){

    $data = array();
    $data[] = $_POST['delete_id'];

    $getimages = new Advertisement();
    $getimages = $getimages->fetchAds("WHERE id = '{$_POST['delete_id']}' ORDER BY id DESC")->resultSet();
    $getimage = $getimages[0];

     $img_path = $getimage['advertisement_image'];
     unlink('../'.$img_path);

    $deletefile = new Advertisement();
    $deletefile = $deletefile->removeAds($data);
    $deletefile_id = $deletefile->rowCount();
  
    if($deletefile_id){ 
      
        $_SESSION['ads_deleted'] = true;
    } else {
        $_SESSION['ads_deleted'] = false;
    }

    header('Location: advertisementList');

  }

$getadvertisementLists = new Advertisement();
$getadvertisementLists = $getadvertisementLists->fetchAds("ORDER BY id DESC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Advertisement List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Ads List</li>
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
                                            <th>B. Name</th>
                                            <th>P. Name</th>
                                            <th>Mobile</th>
                                            <th>Page Details</th>
                                            <th>Image Position</th>
                                            <th>Subscription</th>
                                            <th>Amount</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Notification</th>
                                            <th>Status</th>
                                            <th>Reg Date</th>
                                            <th>Ads Image</th>
                                            <th style="width: 10%;text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($getadvertisementLists)){
                                            $count = 1;
                                        foreach($getadvertisementLists as $getadvertisementList){
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>

                                            <?php

                                            $getnewbusinesss = new Business();
                                            $getnewbusinesss = $getnewbusinesss->fetchBusiness("WHERE id = '{$getadvertisementList['business_id']}' ORDER BY id DESC")->resultSet();
                                            $getnewbusiness = $getnewbusinesss[0];
                                            
                                            if($getadvertisementList['page_details'] == 2){

                                            $getcategorys = new Business();
                                            $getcategorys = $getcategorys->fetchCategory("WHERE id = '{$getadvertisementList['image_position']}' ORDER BY category_name ASC")->resultSet();
                                            $getcategory = $getcategorys[0];

                                            $IMg_position = $getcategory['category_name'];

                                            $page_name = "Business category page";

                                            } else if($getadvertisementList['page_details'] == 1){


                                            $gethomeads = new Advertisement();
                                            $gethomeads = $gethomeads->fetchAdsTitle("WHERE page = 'Home' AND ads_value = '{$getadvertisementList['image_position']}' ORDER BY ads_title ASC")->resultSet();
                                            $gethomead = $gethomeads[0];

                                            $IMg_position = $gethomead['ads_title'];

                                            $page_name = "Home page";

                                            

                                            } else {

                                            $getserviceads = new Advertisement();
                                            $getserviceads = $getserviceads->fetchAdsTitle("WHERE page = 'Services' AND ads_value = '{$getadvertisementList['image_position']}' ORDER BY ads_title ASC")->resultSet();
                                            $getservicead = $getserviceads[0];

                                            $IMg_position = $getservicead['ads_title'];

                                            $page_name = "JPSR Services page";


                                            }

                                            

                                            


                                            $s_date = explode("/", $getadvertisementList['start_date']);
                                            $startDate = $s_date[2].'/'.$s_date[1].'/'.$s_date[0];
                                            $e_date = explode("/", $getadvertisementList['end_date']);
                                            $endDate = $e_date[2].'/'.$e_date[1].'/'.$e_date[0];

                                            $r_date = explode("/", $getadvertisementList['reg_date']);
                                            $regDate = $r_date[2].'/'.$r_date[1].'/'.$r_date[0];

                                            $totalDays = '7 day';
                                            $started_date = date("Y/m/d");
                                            $started_date = strtotime($started_date);
                                            $started_date = strtotime($totalDays, $started_date);
                                            $ended_date = date('Y/m/d', $started_date);

                                              if($getadvertisementList['end_date'] <= $ended_date){
                                                $expiryD = 'yes';
                                              } else {
                                                $expiryD = 'no';
                                              }
                                            

                                            ?>
                                            <td><?php echo $getnewbusiness['business_name']; ?></td>
                                            <td><?php echo $getadvertisementList['person_name']; ?></td>
                                            <td><?php echo $getadvertisementList['mobile_no']; ?></td>
                                            <td><?php echo $page_name; ?></td>
                                            <td><?php echo $IMg_position; ?></td>
                                            <td><?php echo $getadvertisementList['subscription_type']; ?></td>
                                            <?php if($getadvertisementList['payment_type'] == ''){ ?>
                                              <td><?php echo $getadvertisementList['amount']; ?></td>
                                            <?php } else { ?>
                                              <td><?php echo $getadvertisementList['amount']; ?>&nbsp;(<?php echo $getadvertisementList['payment_type']; ?>)</td>
                                            <?php } ?>
                                            <td>
                                              <?php if($getadvertisementList['subscription_type'] != 'Free'){ ?>
                                              <?php echo $startDate; ?>
                                            <?php } ?>
                                            </td>
                                            <td>
                                              <?php if($getadvertisementList['subscription_type'] != 'Free'){ ?>
                                              <?php echo $endDate; ?>
                                            <?php } ?>
                                            </td>
                                            
                                            <td style="text-align: center;">
                                              <?php if($expiryD == 'yes'){ ?>
                                                <img src="assets/img/exclamation_mark.png" style="width: 25px;">
                                              <?php } ?>
                                            </td>
                                            <td>
                                            <label class="switch">
                                            <input class="switch-input" type="checkbox" name="checkbox" <?php if($getadvertisementList['status'] == 'active'){ echo 'checked'; } ?> />
                                            <span class="switch-label active_update" id="<?php echo $getadvertisementList['id'];?>" data-on="Active" data-off="Deactive"></span>
                                            <span class="switch-handle "></span> 
                                           </label>
                                            </td>
                                            <td><?php echo $regDate; ?></td>
                                            <td style="text-align: center;">
                                            <?php if($getadvertisementList['advertisement_image']){ ?>
                                              <img src="../<?php echo $getadvertisementList['advertisement_image']; ?>" style="width: 50px;">
                                            <?php }  ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="JavaScript:Void(0);" data-toggle="modal" data-target="#m_modal_<?php echo $getadvertisementList["id"]; ?>" ><img style="width: 30px;height: 30px;" id="<?php echo $getadvertisementList['id'];?>" src="assets/img/view_icon.png"  ></a>&nbsp;&nbsp;
                                                <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $getadvertisementList['id'];?>" src="assets/img/edit_icon.png"  class="edit"></a>&nbsp;&nbsp;
                                                <!-- <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $getadvertisementList['id'];?>" src="assets/img/delete_icon.png"  class="delete"></a>&nbsp;&nbsp; -->
                                              
                                            </td>
                                        </tr>

<div class="modal" id="m_modal_<?php echo $getadvertisementList["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_1" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel_1">Ads List</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="cursor: pointer;">x</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Business name:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getnewbusiness["business_name"]; ?></label>
            </div>
            <!-- row -->
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Person name:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getadvertisementList["person_name"]; ?></label>
            </div>
            <div style="clear: both;"></div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Mobile no:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getadvertisementList['mobile_no']; ?></label>
            </div>
            <!-- row -->
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Email ID:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getadvertisementList['email']; ?></label>
            </div>
            <div style="clear: both;"></div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Address:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getadvertisementList['address']; ?></label>
            </div>
            <!-- row -->
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Page Details:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $page_name; ?></label>
            </div>
            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Image Position:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $IMg_position; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Logo:</label>
               <?php if($getadvertisementList['advertisement_image']){ ?>
              <img src="../<?php echo $getadvertisementList['advertisement_image']; ?>" style="width: 50px;">
              <?php } ?>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Subscription:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><b><?php echo $getadvertisementList['subscription_type']; ?></b></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Amount:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium">
                <?php if($getadvertisementList['subscription_type'] != 'Free'){ ?>
                  <b><?php echo $getadvertisementList['amount']; ?>&nbsp;(<?php echo $getadvertisementList['payment_type']; ?>)</b>
                <?php } else { ?>
                &nbsp;-&nbsp;
                <?php } ?>
                  </label>
    
            </div>

            <div style="clear: both;"></div>


            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Payment Start Date:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><b><?php echo $startDate; ?></b></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Payment End Date:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><b><?php echo $endDate; ?></b></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Reg Date:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $regDate; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Status:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><b><?php echo ucwords($getadvertisementList['status']); ?></b></label>
            </div>

            <div style="clear: both;"></div>
            

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
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
        $('#tableForm').attr('action', 'addadvertisement');
        $('#tableForm').submit();
    });
  $(document).on('click', '.active_update', function() {   
      var profile_id =  $(this).attr('id');
      // alert(profile_id);
      $.ajax({
        type: "POST",
        url: "status_update.php",
        data: "update_id="+profile_id+"&name=advertisement_list",
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
      }, 5000);
  </script>
  <?php
      }
  ?>
</body>
</html>