<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['wishes_added'])){
    if($_SESSION['wishes_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['wishes_added']);
  }


  if(isset($_POST['WishesSubmit'])){

    $data = array();
    $data[] = "";
    $data[] = 0;
    $data[] = $_POST['person_name'];
    $data[] = $_POST['birthday_date'];
    $data[] = $_POST['sender_name'];
    if($_FILES['sender_image_path']['name']){
    $s_Imgs = 'birthday_images/'.mt_rand().str_replace(' ', '_', $_FILES['sender_image_path']['name']);
    $data[] = $s_Imgs;
    move_uploaded_file($_FILES['sender_image_path']['tmp_name'], '../'.$s_Imgs);
    } else {
    $data[] = "";   
    }
    if($_FILES['image_path']['name']){
    $N_Imgs = 'birthday_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
    $data[] = $N_Imgs;
    move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$N_Imgs);
    } else {
    $data[] = "";   
    }
    $data[] = $_POST['wishes_detail'];
    $data[] = date("Y-m-d");
    $data[] = date("h:i A");

    $addform = new News();
    $addform = $addform->addWishes($data);
    $addformID = $addform->lastInsertID();

    if($addformID){
      $_SESSION['wishes_added'] = true;
    } else {
      $_SESSION['wishes_added'] = false;
    }

    header("Location: AddWishes");

  }


    if(isset($_POST['WishesUpdate'])){

        $data = array();
        $data[] = "";
        $data[] = 0;
        $data[] = $_POST['person_name'];
        $data[] = $_POST['birthday_date'];
        $data[] = $_POST['sender_name'];
        
        $editfiles = new News();
        $editfiles = $editfiles->fetchWishes("WHERE id ='{$_POST['submit_id']}'")->resultSet();
        $editfile = $editfiles[0];

        if($_FILES['sender_image_path']['error'] == 0){
        $s_Imgs = 'birthday_images/'.mt_rand().str_replace(' ', '_', $_FILES['sender_image_path']['name']);
        $data[] = $s_Imgs;
        move_uploaded_file($_FILES['sender_image_path']['tmp_name'], '../'.$s_Imgs);
        } else {
        $data[] = $editfile['sender_image_path'];   
        }
        if($_FILES['image_path']['error'] == 0){
        $N_Imgs = 'birthday_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
        $data[] = $N_Imgs;
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$N_Imgs);
        } else {
        $data[] = $editfile['image_path'];    
        }
        $data[] = $_POST['wishes_detail'];
        $data[] = $_POST['submit_id'];

        $updateform = new News();
        $updateform = $updateform->updateWishes($data);
        $updateformID = $updateform->rowCount();


        if($updateformID){
          $_SESSION['wishes_updated'] = true;
       } else {
          $_SESSION['wishes_updated'] = false;
       }
       header("Location: WishesList");


    }


    if(isset($_POST['submit_id'])){


    $getcontents = new News();
    $getcontents = $getcontents->fetchWishes("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


    }


$getlocations = new Location();
$getlocations = $getlocations->fetchLocation("WHERE status = '1' ORDER BY location_name ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Birthday Wishes</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add Wishes</li>
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
                                <form method="post" <?php if($getcontent){ ?> id="BirthdayEditForm" <?php } else { ?> id="BirthdayForm" <?php } ?> enctype="multipart/form-data" autocomplete="off">
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

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Person Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="person_name" name="person_name" class="form-control mb-0" value="<?php echo $getcontent['person_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Date of telecast <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" id="birthday_date" name="birthday_date" class="form-control mb-0" placeholder="dd-mm-yyyy" value="<?php echo $getcontent['birthday_date']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Sender Name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="sender_name" name="sender_name" class="form-control mb-0" value="<?php echo $getcontent['sender_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Sender Image <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" id="sender_image_path" name="sender_image_path" class="form-control mb-0" >
                                            <span class="note">* Upload only image file </span><br>
                                            <span class="note">Upload size: width:150px, height:150px </span>
                                            <?php if($getcontent){ ?>
                                              <br>
                                            <img src="../<?php echo $getcontent['sender_image_path']; ?>" style="width: 150px;">
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Birthday Image <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" id="image_path" name="image_path" class="form-control mb-0" >
                                            <span class="note">* Upload only image file </span><br>
                                            <span class="note">Upload size: width:410px, height:280px </span>
                                            <?php if($getcontent){ ?>
                                              <br>
                                            <img src="../<?php echo $getcontent['image_path']; ?>" style="width: 150px;">
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Wishes Details <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="6" id="wishes_detail" name="wishes_detail" class="form-control mb-0"  ><?php echo $getcontent['wishes_detail']; ?></textarea>
                                        </div>
                                    </div>


                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-2 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="WishesUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="WishesSubmit">Submit</button>
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