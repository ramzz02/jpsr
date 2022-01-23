<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');


    if(isset($_POST['agentProfUpdate'])){

        $data = array();
        $data[] = $_POST['person_name'];
        $data[] = $_POST['mobile_no'];
        $data[] = $_POST['email'];
        $data[] = $_POST['address'];
        $data[] = $_POST['landmark'];
        $data[] = $_POST['area'];
        $data[] = $_POST['city'];
        $data[] = $_POST['district'];
        $data[] = $_POST['state'];
        $data[] = $_POST['pincode'];

        $data[] = $_POST['alternative_mobile_no'];
        $data[] = $_POST['aadhaar_no'];

        $updatedagentdatas = new Agent();
        $updatedagentdatas = $updatedagentdatas->fetchAgent("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
        $updatedagentdata = $updatedagentdatas[0];

        if($_FILES['aadhaar_image_front']['error'] == 0){

        $FrontImages = 'agent_details/'.mt_rand().str_replace(' ', '_', $_FILES['aadhaar_image_front']['name']);
        $data[] = $FrontImages;
        move_uploaded_file($_FILES['aadhaar_image_front']['tmp_name'], '../'.$FrontImages);

        } else {
        $data[] = $updatedagentdata['aadhaar_image_front'];
        }

        if($_FILES['aadhaar_image_back']['error'] == 0){

        $BackImages = 'agent_details/'.mt_rand().str_replace(' ', '_', $_FILES['aadhaar_image_back']['name']);
        $data[] = $BackImages;
        move_uploaded_file($_FILES['aadhaar_image_back']['tmp_name'], '../'.$BackImages);

        } else {
        $data[] = $updatedagentdata['aadhaar_image_back'];
        }

        $data[] = $_POST['account_no'];
        $data[] = $_POST['ifsc_code'];
        $data[] = $_POST['holder_name'];
        $data[] = $_POST['branch_name'];

        if($_FILES['profile_pic']['error'] == 0){

        $PicImages = 'agent_details/'.mt_rand().str_replace(' ', '_', $_FILES['profile_pic']['name']);
        $data[] = $PicImages;
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], '../'.$PicImages);

        } else {
        $data[] = $updatedagentdata['profile_pic'];
        }

        $data[] = $_POST['status'];

        $data[] = $_POST['submit_id'];

        $updateform = new Agent();
        $updateform = $updateform->updateAgentAdmin($data);
        $updateformID = $updateform->rowCount();

        if($updateformID){

            if($_POST['status'] == 'approved'){

                if($updatedagentdata['status_view'] == 0){

                    $stav = array();
                    $stav[] = 1;
                    $stav[] = $_POST['submit_id'];

                    $updatestatusview = new Agent();
                    $updatestatusview = $updatestatusview->updateAgentStatusVstavew($stav);
                    $updatestatusviewID = $updatestatusview->rowCount();
                    
                    $curl = curl_init();

                    $text_msg = "Hi ".$_POST['person_name']." Thanks for registering with https://jpsr.in. Your Profile is approved and Agent code is".$updatedagentdata['agent_code'];
                    
                    $mobile_no = $updatedagentdata['mobile_no'];
                    
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "http://sms1.qadir.co.in/api/v4/?api_key=Acdb4d8dbebb912c768e74be4a981a577&method=sms&message=$text_msg&to=$mobile_no&sender=JPSRDN",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                      ));
                      
                    $response = curl_exec($curl);
                      $err = curl_error($curl);
                      curl_close($curl);
        
                      if ($err) {
                        echo "cURL Error #:" . $err;
                      } else {
        
                      $a = json_decode($response, true);
        
                      $sta_name = $a['status'];
        
                      }

                }

            }

            $updd = array();
            $updd[] = 'Admin';
            $updd[] = date("Y/m/d");
            $updd[] = $_POST['submit_id'];

            $updatebydatess = new Agent();
            $updatebydatess = $updatebydatess->updateAgentUpdated($updd);
            $updatebydatessID = $updatebydatess->rowCount();


          $_SESSION['agent_updated'] = true;
       } else {
          $_SESSION['agent_updated'] = false;
       }
       header("Location: agentList");


    }


    if(isset($_POST['submit_id'])){


        $getcontents = new Agent();
        $getcontents = $getcontents->fetchAgent("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
        $getcontent = $getcontents[0];

        $r_date = explode("-", $getcontent['reg_date']);
        $regDate = $r_date[2].'/'.$r_date[1].'/'.$r_date[0];


    }


$getstates = new Location();
$getstates = $getstates->fetchState("ORDER BY state_name ASC")->resultSet();

$getdistricts = new Location();
$getdistricts = $getdistricts->fetchDistrict("WHERE state_id = '31' ORDER BY district_name ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">JPSR Agent Information</h6>
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
                            <div class="widget-body clearfix">
                                <form method="post" id="JpsrAgentForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Agent Code <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="agent_code" name="agent_code" class="form-control mb-0" value="<?php echo $getcontent['agent_code']; ?>" readonly >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Person name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="person_name" name="person_name" class="form-control mb-0" value="<?php echo $getcontent['person_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Mobile no <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="mobile_no" name="mobile_no" class="form-control mb-0" value="<?php echo $getcontent['mobile_no']; ?>" readonly >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Email ID <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="email" name="email" class="form-control mb-0" value="<?php echo $getcontent['email']; ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-8 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Your Address (Door No & Street) <span class="required">*</span></label>
                                        <div class="col-sm-11">
                                            <input type="text" id="address" name="address" class="form-control mb-0" value="<?php echo $getcontent['address']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Landmark <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="landmark" name="landmark" class="form-control mb-0" value="<?php echo $getcontent['landmark']; ?>" >
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Area <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="area" name="area" class="form-control mb-0" value="<?php echo $getcontent['area']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">City <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="city" name="city" class="form-control mb-0" value="<?php echo $getcontent['city']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">State <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="state" id="state" >
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($getstates as $getstate){ ?>
                                                <option value="<?php echo $getstate['id']; ?>" <?php if($getcontent['state'] == $getstate['id']){ echo 'selected'; } ?> ><?php echo $getstate['state_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">District <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="district" id="district" >
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($getdistricts as $getdistrict){ ?>
                                                <option value="<?php echo $getdistrict['id']; ?>" <?php if($getcontent['district'] == $getdistrict['id']){ echo 'selected'; } ?> ><?php echo $getdistrict['district_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Pincode <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="pincode" name="pincode" class="form-control mb-0" value="<?php echo $getcontent['pincode']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Alternative Mobile No <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="alternative_mobile_no" name="alternative_mobile_no" class="form-control mb-0" value="<?php echo $getcontent['alternative_mobile_no']; ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Aadhaar No <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="aadhaar_no" name="aadhaar_no" class="form-control mb-0" value="<?php echo $getcontent['aadhaar_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Status </label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="status" id="status" >
                                                <option value="" Selected>-- Select --</option>
                                                <option value="pending" <?php if($getcontent['status'] == 'pending'){ echo 'selected'; } ?> >Pending</option>
                                                <option value="approved" <?php if($getcontent['status'] == 'approved'){ echo 'selected'; } ?> >Approved</option>
                                                <option value="blocked" <?php if($getcontent['status'] == 'blocked'){ echo 'selected'; } ?> >Blocked</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Aadhaar Image Front</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="aadhaar_image_front" name="aadhaar_image_front" onchange="validateFrontLogo()" class="form-control mb-0" >
                                            <span>* Upload only image file </span>
                                            <div id="preview_image_one"></div>
                                            <?php if($getcontent['aadhaar_image_front']){ ?>
                                            <img src="../<?php echo $getcontent['aadhaar_image_front']; ?>" style="width: 150px;"><br>

                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Aadhaar Image Back</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="aadhaar_image_back" name="aadhaar_image_back" onchange="validateSecondLogo()" class="form-control mb-0" >
                                            <span>* Upload only image file </span>
                                            <div id="preview_image_two"></div>
                                            <?php if($getcontent['aadhaar_image_back']){ ?>
                                            <img src="../<?php echo $getcontent['aadhaar_image_back']; ?>" style="width: 50px;"><br>

                                            <?php } ?>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Profile Picture</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="logo_image" name="profile_pic" onchange="validateLogo()" class="form-control mb-0" >
                                            <span>* Upload only image file </span>
                                            <div id="preview_logo"></div>
                                            <input type="hidden" name="logo_code" id="logo_code">
                                            <?php if($getcontent['profile_pic']){ ?>
                                            <img src="../<?php echo $getcontent['profile_pic']; ?>" style="width: 50px;"><br>

                                            <?php } ?>
                                        </div>
                                    </div>

                                    
                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Account No <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="account_no" name="account_no" class="form-control mb-0" value="<?php echo $getcontent['account_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Ifsc Code <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="ifsc_code" name="ifsc_code" class="form-control mb-0" value="<?php echo $getcontent['ifsc_code']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Account Holder Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="holder_name" name="holder_name" class="form-control mb-0" value="<?php echo $getcontent['holder_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Branch Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="branch_name" name="branch_name" class="form-control mb-0" value="<?php echo $getcontent['branch_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-2 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary agent_update" type="submit" name="agentProfUpdate">Update</button>
                                        <button class="btn btn-default" onclick="window.location.href = 'agentList';" type="reset">Cancel</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="productSubmit">Submit</button>
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

      $('#state').on('change',function(){

      var stateId = $(this).val();
      // alert(stateId);

      if(stateId){

      $.ajax({

      type:'POST',

      url:'../listOfDatas.php',

      data:'state_id='+stateId+'&name=districtName',

      success:function(response){
         var parsedData = jQuery.parseJSON(response);
      // alert(parsedData.data);
      if(parsedData.status == 'success'){
         $('#district').html(parsedData.data);
      } else {
         $('#district').html(parsedData.data);
      }

      }

      });

      }else{

      $('#area').html('<option value="">Select state first</option>');

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