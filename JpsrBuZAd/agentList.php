<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['agent_updated'])){
    if($_SESSION['agent_updated']){
      $output = "Successfully updated";
    } else {
      $output = "Not yet updated";
    }
    unset($_SESSION['agent_updated']);
    }

    if(isset($_SESSION['agent_deleted'])){
    if($_SESSION['agent_deleted']){
      $output = "Successfully deleted";
    } else {
      $output = "Failed to delete";
    }
    unset($_SESSION['agent_deleted']);
    }

    if(isset($_POST['delete_id'])){

    $data = array();
    $data[] = $_POST['delete_id'];

    $getagentImages = new Agent();
    $getagentImages = $getagentImages->fetchAgent("WHERE id = '{$_POST['delete_id']}' ORDER BY id DESC")->resultSet();
    $getagentImage = $getagentImages[0];

    
    $deletefile = new Agent();
    $deletefile = $deletefile->remove($data);
    $deletefile_id = $deletefile->rowCount();
  
    if($deletefile_id){ 
    unlink('../'.$getagentImage['aadhaar_image_front']);
    unlink('../'.$getagentImage['aadhaar_image_back']);
    unlink('../'.$getagentImage['profile_pic']);
        $_SESSION['agent_deleted'] = true;
    } else {
        $_SESSION['agent_deleted'] = false;
    }

    header('Location: agentList');

  }

$getagentLists = new Agent();
$getagentLists = $getagentLists->fetchAgent("ORDER BY id DESC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">JPSR Agent List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Agent List</li>
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
                                            <th>Agent Code</th>
                                            <th>Person Name</th>
                                            <th>Mobile No</th>
                                            <!-- <th>Area</th>
                                            <th>City</th>
                                            <th>District</th> -->
                                            <th>Aadhaar No</th>
                                            <!-- <th>Profile Pic</th> -->
                                            <th>Reg Date</th>
                                            <th>Enter By</th>
                                            <th>Updated By</th>
                                            <th>Updated Date</th>
                                            <th style="text-align: center;">Status</th>
                                            <th style="width: 10%;text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($getagentLists)){
                                            $count = 1;
                                        foreach($getagentLists as $getagentList){
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>

                                            <?php

                                            $getstates = new Location();
                                            $getstates = $getstates->fetchState("WHERE id = '{$getagentList['state']}' ORDER BY id ASC")->resultSet();
                                            $getstate = $getstates[0];

                                            $getdistricts = new Location();
                                            $getdistricts = $getdistricts->fetchDistrict("WHERE id = '{$getagentList['district']}' ORDER BY id ASC")->resultSet();
                                            $getdistrict = $getdistricts[0];

                                            
                                            $r_date = explode("-", $getagentList['reg_date']);
                                            $regDate = $r_date[2].'/'.$r_date[1].'/'.$r_date[0];

                                            $up_date = explode("/", $getagentList['updated_date']);
                                            $updatedDate = $up_date[2].'/'.$up_date[1].'/'.$up_date[0];

                                            if($getagentList['enter_by'] == 'Admin'){

                                                $enterByName = 'Admin';
                                            } else {

                                                $getuserregs = new Register();
                                                $getuserregs = $getuserregs->fetchRegister("WHERE id = '{$getagentList['enter_by']}' ORDER BY id ASC")->resultSet();
                                                $getuserreg = $getuserregs[0];

                                                $enterByName = $getuserreg['name'];

                                            }

                                            if($getagentList['updated_by'] == 'Admin'){

                                                $enterUpdatedByName = 'Admin';

                                            } else {

                                                $getupdateduserregs = new Register();
                                                $getupdateduserregs = $getupdateduserregs->fetchRegister("WHERE id = '{$getagentList['updated_by']}' ORDER BY id ASC")->resultSet();
                                                $getupdateduserreg = $getupdateduserregs[0];

                                                $enterUpdatedByName = $getupdateduserreg['name'];

                                            }


                                            ?>
                                            <td><?php echo $getagentList['agent_code']; ?></td>
                                            <td><?php echo $getagentList['person_name']; ?></td>
                                            <td><?php echo $getagentList['mobile_no']; ?></td>
                                            <!-- <td><?php echo $getagentList['area']; ?></td>
                                            <td><?php echo $getagentList['city']; ?></td>
                                            <td><?php echo $getdistrict['district_name']; ?></td> -->
                                            <td><?php echo $getagentList['aadhaar_no']; ?></td>
                                            <!-- <?php if($getagentList['profile_pic'] != ''){ ?>
                                            <td>
                                                <img src="../<?php echo $getagentList['profile_pic']; ?>" style="width: 50px;height: 50px;">
                                            </td>
                                            <?php } else { ?>
                                            <td style="text-align: center;"> - </td>
                                            <?php } ?> -->
                                            <td><?php echo $regDate; ?></td>
                                           
                                            <?php if($getagentList['enter_by'] != ''){ ?>
                                              <td style="text-align: center;"><?php echo $enterByName; ?></td>
                                            <?php } else { ?>
                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <?php if($getagentList['updated_by'] != ''){ ?>
                                              <td style="text-align: center;"><?php echo $enterUpdatedByName; ?></td>
                                            <?php } else { ?>
                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <?php if($getagentList['updated_date'] != ''){ ?>
                                              <td style="text-align: center;"><?php echo $updatedDate; ?></td>
                                            <?php } else { ?>
                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <?php if($getagentList['status'] == 'pending'){ ?>
                                              <td style="text-align: center;text-transform:capitalize;background-color: #3a7cdc;color: #fff;"><?php echo ucwords($getagentList['status']); ?></td>
                                            <?php } else if($getagentList['status'] == 'blocked'){ ?>
                                              <td style="text-align: center;text-transform:capitalize;background-color: red;color: #fff;"><?php echo ucwords($getagentList['status']); ?></td>
                                            <?php } else if($getagentList['status'] == 'approved'){ ?>
                                              <td style="text-align: center;text-transform:capitalize;background-color: green;color: #fff;"><?php echo ucwords($getagentList['status']); ?></td>
                                            <?php } else { ?>
                                            <td>&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <td style="text-align: center;">
                                                <a href="JavaScript:Void(0);" data-toggle="modal" data-target="#m_modal_<?php echo $getagentList["id"]; ?>" ><img style="width: 30px;height: 30px;" id="<?php echo $getagentList['id'];?>" src="assets/img/view_icon.png"  ></a>&nbsp;&nbsp;
                                                <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $getagentList['id'];?>" src="assets/img/edit_icon.png"  class="edit"></a>&nbsp;&nbsp;
                                            </td>
                                        </tr>

<div class="modal" id="m_modal_<?php echo $getagentList["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_1" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel_1">Agent Profile Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="cursor: pointer;">x</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Agent Code:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getagentList["agent_code"]; ?></label>
            </div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Person name:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getagentList["person_name"]; ?></label>
            </div>
            <!-- row -->
            <div style="clear: both;"></div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Mobile No:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getagentList["mobile_no"]; ?></label>
            </div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Email ID:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php if($getagentList['email'] != ''){ echo $getagentList['email']; } else { echo '-'; } ?></label>
            </div>
            <!-- row -->
            <div style="clear: both;"></div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Address:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getagentList['address']; ?></label>
            </div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Landmark:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php if($getagentList['landmark'] != ''){ echo $getagentList['landmark']; } else { echo '-'; } ?></label>
            </div>
            <div style="clear: both;"></div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Area:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getagentList['area']; ?></label>
            </div>
            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">City:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getagentList['city']; ?></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">State:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getstate['state_name']; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">District:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getdistrict['district_name']; ?></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Pincode:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getagentList['pincode']; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Alternative Mobile no:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php if($getagentList['alternative_mobile_no'] != ''){ echo $getagentList['alternative_mobile_no']; } else { echo '-'; } ?></label>
            </div>
            <!-- row -->
            
            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Aadhaar No:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getagentList['aadhaar_no']; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Account No:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getagentList['account_no']; ?></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">IFSC Code:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getagentList['ifsc_code']; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Account Holder Name:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getagentList['holder_name']; ?></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Branch Name:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $getagentList['branch_name']; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Status:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo ucwords($getagentList['status']); ?></label>
            </div>

            <div style="clear: both;"></div>


            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Enter By:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $enterByName; ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Reg Date:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php echo $regDate; ?></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Updated By:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php if($enterUpdatedByName != ''){ echo $enterUpdatedByName; } else { echo '-'; } ?></label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-5 form-control-label tx-xs-semibold">Updated Date:</label>
               <label class="col-sm-7 form-control-label tx-xs-medium"><?php if($getagentList['updated_date'] != ''){ echo $updatedDate; } else { echo '-'; } ?></label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-12 form-control-label tx-xs-semibold">Profile Picture:</label>
               <label class="col-sm-12 form-control-label tx-xs-medium">
                  <?php if($getagentList['profile_pic']){ ?>
                  <img src="../<?php echo $getagentList['profile_pic']; ?>" style="width: 150px;">
                  <?php } else { ?>
                    -
                  <?php } ?>
                </label>
            </div>

            <div style="clear: both;"></div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-12 form-control-label tx-xs-semibold">Aadhaar Image Front:</label>
               <label class="col-sm-12 form-control-label tx-xs-medium">
                  <?php if($getagentList['aadhaar_image_front']){ ?>
                  <img src="../<?php echo $getagentList['aadhaar_image_front']; ?>" style="width: 150px;">
                  <?php } else { ?>
                    -
                  <?php } ?>
                </label>
            </div>

            <div class="row col-sm-6 mg-b-10 newClient tx-15-force tx-black float-left popup-font">
               <label class="col-sm-12 form-control-label tx-xs-semibold">Aadhaar Image Back:</label>
               <label class="col-sm-12 form-control-label tx-xs-medium">
                  <?php if($getagentList['aadhaar_image_back']){ ?>
                  <img src="../<?php echo $getagentList['aadhaar_image_back']; ?>" style="width: 150px;">
                  <?php } else { ?>
                    -
                  <?php } ?>
                </label>
            </div>

            <div style="clear: both;"></div><br>
            

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
        $('#tableForm').attr('action', 'EditAgentProfile');
        $('#tableForm').submit();
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