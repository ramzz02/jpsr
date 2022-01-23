<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['news_added'])){
    if($_SESSION['news_added']){
      $output = "Successfully uploaded";
    } else {
      $output = "Failed to upload";
    }
    unset($_SESSION['news_added']);
    }

   if(isset($_POST['NewsSubmit'])){

    $data = array();
    $data[] = "";
    $data[] = 0;
    $data[] = $_POST['language'];
    $data[] = $_POST['category'];
    $data[] = $_POST['title'];
    if($_FILES['image_path']['name']){
    $N_Imgs = 'news_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
    $data[] = $N_Imgs;
    move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$N_Imgs);
    } else {
    $data[] = "";   
    }
    $data[] = $_POST['description'];
    $data[] = date("Y-m-d");
    $data[] = date("h:i A");

    $addform = new News();
    $addform = $addform->addNews($data);
    $addformID = $addform->lastInsertID();

    if($addformID){
      $_SESSION['news_added'] = true;
    } else {
      $_SESSION['news_added'] = false;
    }

    header("Location: AddNews");

  }


    if(isset($_POST['NewsUpdate'])){

        $data = array();
        $data[] = $_POST['language'];
        $data[] = $_POST['category'];
        $data[] = $_POST['title'];
        
        $editfiles = new News();
        $editfiles = $editfiles->fetchNews("WHERE id ='{$_POST['submit_id']}'")->resultSet();
        $editfile = $editfiles[0];

        if($_FILES['image_path']['error'] == 0){
        $OffImgs = 'news_images/'.mt_rand().str_replace(' ', '_', $_FILES['image_path']['name']);
        $data[] = $OffImgs;
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../'.$OffImgs);
        } else {
        $data[] = $editfile['image_path'];   
        }
        $data[] = $_POST['description'];
        $data[] = $_POST['submit_id'];

        $updateform = new News();
        $updateform = $updateform->updateNews($data);
        $updateformID = $updateform->rowCount();


        if($updateformID){
          $_SESSION['news_updated'] = true;
       } else {
          $_SESSION['news_updated'] = false;
       }
       header("Location: NewsList");


    }


    if(isset($_POST['submit_id'])){


    $getcontents = new News();
    $getcontents = $getcontents->fetchNews("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


    }


$getlocations = new Location();
$getlocations = $getlocations->fetchLocation("WHERE status = '1' ORDER BY location_name ASC")->resultSet();

$newscategorys = new News();
$newscategorys = $newscategorys->fetchCategory("WHERE status = '1' ORDER BY id ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">News</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">News</li>
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
                                <form method="post" <?php if($getcontent){ ?> id="NewsEditForm" <?php } else { ?> id="NewsForm" <?php } ?> enctype="multipart/form-data" autocomplete="off">
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
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Language <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="language" name="language" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <option value="1" <?php if($getcontent['language'] == '1'){ echo 'selected'; } ?> >English</option>
                                              <option value="2" <?php if($getcontent['language'] == '2'){ echo 'selected'; } ?> >Tamil</option>
                                              <option value="3" <?php if($getcontent['language'] == '3'){ echo 'selected'; } ?> >Telugu</option>
                                              <option value="4" <?php if($getcontent['language'] == '4'){ echo 'selected'; } ?> >Kannada</option>
                                              <option value="5" <?php if($getcontent['language'] == '5'){ echo 'selected'; } ?> >Malayalam</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Select Category <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <select id="category" name="category" class="form-control mb-0" >
                                              <option value="" Selected Disabled>-- Select --</option>
                                              <option value="type1" <?php if($getcontent['category'] == 'type1'){ echo 'selected'; } ?> >International News</option>
                                              <option value="type2" <?php if($getcontent['category'] == 'type2'){ echo 'selected'; } ?> >National News</option>
                                              <option value="type3" <?php if($getcontent['category'] == 'type3'){ echo 'selected'; } ?> >State News</option>
                                              <option value="type4" <?php if($getcontent['category'] == 'type4'){ echo 'selected'; } ?> >Astrology</option>
                                              <?php foreach($newscategorys as $newscategory){ ?>
                                              <option value="<?php echo $newscategory['id']; ?>" <?php if($getcontent['category'] == $newscategory['id']){ echo 'selected'; } ?> ><?php echo $newscategory['category_name']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Title <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="title" name="title" class="form-control mb-0" value="<?php echo $getcontent['title']; ?>" >
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row col-sm-6 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">News Image <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" id="logo_image" name="image_path" onchange="validateLogo()" class="form-control mb-0" >
                                            <span class="note">* Upload only image file </span><br>
                                            <span class="note">Upload size: width:475px, height:315px </span>
                                            <div id="preview_logo"></div>
                                            <?php if($getcontent){ ?>
                                            <img src="../<?php echo $getcontent['image_path']; ?>" style="width: 50px;">
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-12 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Description <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="6" id="description" name="description" class="form-control mb-0"  ><?php echo $getcontent['description']; ?></textarea>
                                        </div>
                                    </div>


                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-2 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="NewsUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="NewsSubmit">Submit</button>
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