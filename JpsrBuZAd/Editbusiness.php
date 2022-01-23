<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');


  if(isset($_SESSION['business_added'])){
    if($_SESSION['business_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['business_added']);
    }


    if(isset($_POST['productUpdate'])){

        $data = array();
        $data[] = $_POST['business_name'];
        $data[] = $_POST['person_name'];
        $data[] = $_POST['mobile_no'];
        $data[] = $_POST['email'];
        $data[] = $_POST['address'];
        $data[] = $_POST['area'];
        $data[] = $_POST['ward_no'];
        $data[] = $_POST['city'];
        $data[] = $_POST['location'];
        $data[] = $_POST['district'];

        $data[] = $_POST['country'];
        $data[] = $_POST['alternative_mobile_no'];
        $data[] = $_POST['landline_no'];
        $data[] = $_POST['website'];
        $data[] = $_POST['working_hour'];
        $data[] = $_POST['category'];
        $data[] = $_POST['business_description'];
        $data[] = $_POST['special_offer'];
        $data[] = $_POST['payment_type'];
        $data[] = $_POST['subscription_order'];
        $data[] = $_POST['submit_id'];

        $updateform = new Business();
        $updateform = $updateform->updateBusiness($data);
        $updateformID = $updateform->rowCount();

        if($updateformID){
          $_SESSION['business_updated'] = true;
       } else {
          $_SESSION['business_updated'] = false;
       }
       header("Location: businessList");


    }


    if(isset($_POST['submit_id'])){


    if(!empty($_POST['delete_image_id'])){


      $data = array();
      $data[] = $_POST['delete_image_id'];

      $getimages = new Business();
      $getimages = $getimages->fetchBusinessImage("WHERE id = '{$_POST['delete_image_id']}' ORDER BY id DESC")->resultSet();
      $getimage = $getimages[0];

      $img_path = $getimage['image_path'];
      if($img_path){
       unlink('../'.$img_path); 
      }
      
      $deleteimagefile = new Business();
      $deleteimagefile = $deleteimagefile->removeBusinessImage($data);
      $deleteimagefile_id = $deleteimagefile->rowCount();

    }

    $getcontents = new Business();
    $getcontents = $getcontents->fetchBusiness("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];

    $getlogos = new Business();
    $getlogos = $getlogos->fetchBusinessImageActive("WHERE business_id = '{$_POST['submit_id']}' AND type = '1' ORDER BY id DESC")->resultSet();
    $getlogo = $getlogos[0];

    $getgallerys = new Business();
    $getgallerys = $getgallerys->fetchBusinessImageActive("WHERE business_id = '{$_POST['submit_id']}' AND type = '2' ORDER BY id DESC")->resultSet();
    $getgallery = $getgallerys[0];

    $getvideos = new Business();
    $getvideos = $getvideos->fetchBusinessImageActive("WHERE business_id = '{$_POST['submit_id']}' AND type = '3' ORDER BY id DESC")->resultSet();
    $getvideo = $getvideos[0];

    $getimages = new Business();
    $getimages = $getimages->fetchBusinessImage("WHERE business_id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();

    $getlogoimages = new Business();
    $getlogoimages = $getlogoimages->fetchBusinessPayment("WHERE business_id = '{$_POST['submit_id']}' AND subscription_no = '1' ORDER BY id ASC")->resultSet();
    $getlogoimage = $getlogoimages[0];

    $ls_date = explode("/", $getlogoimage['start_date']);
    $logo_startDate = $ls_date[2].'/'.$ls_date[1].'/'.$ls_date[0];
    $le_date = explode("/", $getlogoimage['end_date']);
    $logo_endDate = $le_date[2].'/'.$le_date[1].'/'.$le_date[0];

    $getgalleryimages = new Business();
    $getgalleryimages = $getgalleryimages->fetchBusinessPayment("WHERE business_id = '{$_POST['submit_id']}' AND subscription_no = '2' ORDER BY id ASC")->resultSet();
    $getgalleryimage = $getgalleryimages[0];

    $gs_date = explode("/", $getgalleryimage['start_date']);
    $gallery_startDate = $gs_date[2].'/'.$gs_date[1].'/'.$gs_date[0];
    $ge_date = explode("/", $getgalleryimage['end_date']);
    $gallery_endDate = $ge_date[2].'/'.$ge_date[1].'/'.$ge_date[0];

    $getvideoimages = new Business();
    $getvideoimages = $getvideoimages->fetchBusinessPayment("WHERE business_id = '{$_POST['submit_id']}' AND subscription_no = '3' ORDER BY id ASC")->resultSet();
    $getvideoimage = $getvideoimages[0];

    $vs_date = explode("/", $getvideoimage['start_date']);
    $video_startDate = $vs_date[2].'/'.$vs_date[1].'/'.$vs_date[0];
    $ve_date = explode("/", $getvideoimage['end_date']);
    $video_endDate = $ve_date[2].'/'.$ve_date[1].'/'.$ve_date[0];

    
    $r_date = explode("/", $getcontent['reg_date']);
    $regDate = $r_date[2].'/'.$r_date[1].'/'.$r_date[0];


    }


$getcategorys = new Business();
$getcategorys = $getcategorys->fetchCategory("WHERE status = '1' ORDER BY category_name ASC")->resultSet();

$getlocations = new Location();
$getlocations = $getlocations->fetchLocation("ORDER BY location_name ASC")->resultSet();

$getperiods = new Business();
$getperiods = $getperiods->fetchPeriod("WHERE status = '1' ORDER BY id ASC")->resultSet();


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
        <main class="main-wrapper clearfix" style="min-height: 673px;">
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5">Register your business</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Business</li>
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
                                <form method="post" id="BusinessForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">
                                  <input type="hidden" name="payment_type" id="payment_type" value="<?php echo $getcontent['payment_type']; ?>">
                                  <input type="hidden" name="subscription_order" id="subscription_order" value="<?php echo $getcontent['subscription_order']; ?>">
                                  <input type="hidden" name="delete_image_id" id="delete_image_id">

                                  <input type="hidden" name="logo_exists" id="logo_exists" value="<?php echo $getlogoimage['id']; ?>">
                                  <input type="hidden" name="logo_exists_image" id="logo_exists_image" value="<?php echo $getlogoimage['file_path']; ?>">
                                  <input type="hidden" name="gallery_exists" id="gallery_exists" value="<?php echo $getgalleryimage['id']; ?>">
                                  <input type="hidden" name="video_exists" id="video_exists" value="<?php echo $getvideoimage['id']; ?>">
                                  <input type="hidden" name="video_exists_image" id="video_exists_image" value="<?php echo $getvideoimage['file_path']; ?>">



                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="business_name" name="business_name" class="form-control mb-0" value="<?php echo $getcontent['business_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Proprietor (or) Authorized name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="person_name" name="person_name" class="form-control mb-0" value="<?php echo $getcontent['person_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Mobile no <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="mobile_no" name="mobile_no" class="form-control mb-0" value="<?php echo $getcontent['mobile_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Email ID <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="email" name="email" class="form-control mb-0" value="<?php echo $getcontent['email']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Full Address <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="address" name="address" class="form-control mb-0" value="<?php echo $getcontent['address']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Area <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="area" name="area" class="form-control mb-0" value="<?php echo $getcontent['area']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Area Ward No <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="ward_no" name="ward_no" class="form-control mb-0" value="<?php echo $getcontent['ward_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">City <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="city" name="city" class="form-control mb-0" value="<?php echo $getcontent['city']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Display City <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="location" id="location" >
                                                <option value="" Selected Disabled> -- Select -- </option>
                                                <?php foreach($getlocations as $getlocation){ ?>
                                                <option value="<?php echo $getlocation['id']; ?>" <?php if($getcontent['location'] == $getlocation['id']){ echo 'selected'; } ?> ><?php echo $getlocation['location_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">District <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="district" name="district" class="form-control mb-0" value="<?php echo $getcontent['district']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Country <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="country" name="country" class="form-control mb-0" value="<?php echo $getcontent['country']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Alternative Mobile No <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="alternative_mobile_no" name="alternative_mobile_no" class="form-control mb-0" value="<?php echo $getcontent['alternative_mobile_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Landline No (Optional)</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="landline_no" name="landline_no" class="form-control mb-0" value="<?php echo $getcontent['landline_no']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Website <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="website" name="website" class="form-control mb-0" value="<?php echo $getcontent['website']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Working Hour <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="working_hour" name="working_hour" class="form-control mb-0" value="<?php echo $getcontent['working_hour']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Category <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="m-b-10 form-control" name="category" id="category" >
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($getcategorys as $getcategory){ ?>
                                                <option value="<?php echo $getcategory['id']; ?>" <?php if($getcontent['category'] == $getcategory['id']){ echo 'selected'; } ?> ><?php echo $getcategory['category_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Business Description <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="8" id="editor" name="business_description" class="form-control mb-0" value="" ><?php echo $getcontent['business_description']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Special Offer <span class="notrequired">(Optional)</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="8" id="editor40" name="special_offer" class="form-control mb-0" value="" ><?php echo $getcontent['special_offer']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Company Logo</label>
                                        <div class="col-sm-10">
                                            <?php if($getlogoimage['file_path']){ ?>
                                            <img src="../<?php echo $getlogoimage['file_path']; ?>" style="width: 50px;"><br>

                                            <label class="switch">
                                            <input class="switch-input" type="checkbox" name="checkbox" <?php if($getlogo['status'] == 'active'){ echo 'checked'; } ?> />
                                            <span class="switch-label image_active_update" id="<?php echo $getlogo['id'];?>" data-on="Active" data-off="Deactive"></span>
                                            <span class="switch-handle "></span> 
                                           </label>

                                            <?php } else { ?>

                                            <h4>Logo not available</h4>

                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Gallery Images (Maximum 5)</label>
                                        <div class="col-sm-10">
                                            <?php
                                            if(count($getimages)){
                                            foreach($getimages as $getimage){
                                            ?>
                                            <img src="../<?php echo $getimage['image_path']; ?>" style="width: 50px;">&nbsp;&nbsp;<a href="JavaScript:Void(0);"><img style="width: 20px;height: 20px;" id="<?php echo $getimage['id'];?>" src="assets/img/delete_icon.png"  class="delete_gallery"></a><br>
                                            <?php }  ?>

                                            <label class="switch">
                                            <input class="switch-input" type="checkbox" name="checkbox" <?php if($getgallery['status'] == 'active'){ echo 'checked'; } ?> />
                                            <span class="switch-label image_active_update" id="<?php echo $getgallery['id'];?>" data-on="Active" data-off="Deactive"></span>
                                            <span class="switch-handle "></span> 
                                           </label>

                                            <?php } else { ?>

                                            <h4>Gallery not available</h4>

                                            <?php } ?>

                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Videos</label>
                                        <div class="col-sm-10">
                                            <?php if($getvideoimage['file_path'] != ''){ ?>
                                            <video width="200" controls><source src="../<?php echo $getvideoimage['file_path']; ?>" type="video/mp4"></video><br>

                                            <label class="switch">
                                            <input class="switch-input" type="checkbox" name="checkbox" <?php if($getvideo['status'] == 'active'){ echo 'checked'; } ?> />
                                            <span class="switch-label image_active_update" id="<?php echo $getvideo['id'];?>" data-on="Active" data-off="Deactive"></span>
                                            <span class="switch-handle "></span> 
                                           </label>

                                            <?php } else { ?>

                                            <h4>Video not available</h4>

                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-3 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="productUpdate">Update</button>
                                        <button class="btn btn-default" onclick="window.location.href = 'businessList';" type="reset">Cancel</button>
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
  $(document).on('click', '.delete_gallery', function() {   
      var confirm_msg = confirm("Are you sure to delete?");
      if (confirm_msg == true) {
          var profile_id =  $(this).attr('id');
          $('#delete_image_id').val(profile_id);
          // alert(profile_id);           
          $('#BusinessForm').attr('method', 'post');
          $('#BusinessForm').attr('action', 'Editbusiness');
          $('#BusinessForm').submit();
      }            
  });
  $(document).on('click', '.image_active_update', function() {   
      var profile_id =  $(this).attr('id');
      // alert(profile_id);
      $.ajax({
        type: "POST",
        url: "status_update.php",
        data: "update_id="+profile_id+"&name=business_image_active",
        success: function(data){
        }
    });          
  });

  $('#logo_subscription_type').change(function(){
    var logoType = $("#logo_subscription_type").val();
    // alert(logoType);
    $.ajax({
            type: "POST",
            url: "subscription_validation.php",
            data: "subs_type="+logoType+"&type=1",
            success: function(response){
                var parsedData = jQuery.parseJSON(response);
                // alert(parsedData.status);
                if(parsedData.status == '1'){
                    $('#logo_subs_amt').show();
                    $('#logo_subscription_amount').val(parsedData.amount);
                } else {
                    $('#logo_subscription_amount').val('');
                    $('#logo_subs_amt').hide();
                }
            }
        });
    });


    $('#gallery_subscription_type').change(function(){
    var galleryType = $("#gallery_subscription_type").val();
    // alert(logoType);
    $.ajax({
            type: "POST",
            url: "subscription_validation.php",
            data: "subs_type="+galleryType+"&type=2",
            success: function(response){
                var parsedData = jQuery.parseJSON(response);
                // alert(parsedData.status);
                if(parsedData.status == '1'){
                    $('#gallery_subs_amt').show();
                    $('#gallery_subscription_amount').val(parsedData.amount);
                } else {
                    $('#gallery_subscription_amount').val('');
                    $('#gallery_subs_amt').hide();
                }
            }
        });
    });

    $('#video_subscription_type').change(function(){
    var videoType = $("#video_subscription_type").val();
    // alert(logoType);
    $.ajax({
            type: "POST",
            url: "subscription_validation.php",
            data: "subs_type="+videoType+"&type=3",
            success: function(response){
                var parsedData = jQuery.parseJSON(response);
                // alert(parsedData.status);
                if(parsedData.status == '1'){
                    $('#video_subs_amt').show();
                    $('#video_subscription_amount').val(parsedData.amount);
                } else {
                    $('#video_subscription_amount').val('');
                    $('#video_subs_amt').hide();
                }
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