<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['article_added'])){
    if($_SESSION['article_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['article_added']);
    }

   if(isset($_POST['ArticleSubmit'])){

    $data = array();
    $data[] = "";
    $data[] = 0;
    $data[] = $_POST['student_name'];
    $data[] = $_POST['student_age'];
    $data[] = $_POST['school_name'];
    if($_FILES['photo_path']['name']){
    $s_Imgs = 'article_images/'.mt_rand().str_replace(' ', '_', $_FILES['photo_path']['name']);
    $data[] = $s_Imgs;
    move_uploaded_file($_FILES['photo_path']['tmp_name'], '../'.$s_Imgs);
    } else {
    $data[] = "";   
    }
    $data[] = $_POST['city'];
    $data[] = $_POST['area'];
    $data[] = $_POST['article_title'];
    if($_FILES['article_photo']['name']){
    $N_Imgs = 'article_images/'.mt_rand().str_replace(' ', '_', $_FILES['article_photo']['name']);
    $data[] = $N_Imgs;
    move_uploaded_file($_FILES['article_photo']['tmp_name'], '../'.$N_Imgs);
    } else {
    $data[] = "";   
    }
    $data[] = $_POST['article_description'];
    $data[] = date("Y-m-d");
    $data[] = date("h:i A");

    $addform = new News();
    $addform = $addform->addArticle($data);
    $addformID = $addform->lastInsertID();

    if($addformID){
      $_SESSION['article_added'] = true;
    } else {
      $_SESSION['article_added'] = false;
    }

    header("Location: AddArticles");

  }


    if(isset($_POST['ArticleUpdate'])){

        $data = array();
        $data[] = "";
        $data[] = 0;
        $data[] = $_POST['student_name'];
        $data[] = $_POST['student_age'];
        $data[] = $_POST['school_name'];
        
        $editfiles = new News();
        $editfiles = $editfiles->fetchArticle("WHERE id ='{$_POST['submit_id']}'")->resultSet();
        $editfile = $editfiles[0];

        if($_FILES['photo_path']['error'] == 0){
        $s_Imgs = 'article_images/'.mt_rand().str_replace(' ', '_', $_FILES['photo_path']['name']);
        $data[] = $s_Imgs;
        move_uploaded_file($_FILES['photo_path']['tmp_name'], '../'.$s_Imgs);
        } else {
        $data[] = $editfile['photo_path'];   
        }
        $data[] = $_POST['city'];
        $data[] = $_POST['area'];
        $data[] = $_POST['article_title'];
        if($_FILES['article_photo']['error'] == 0){
        $N_Imgs = 'article_images/'.mt_rand().str_replace(' ', '_', $_FILES['article_photo']['name']);
        $data[] = $N_Imgs;
        move_uploaded_file($_FILES['article_photo']['tmp_name'], '../'.$N_Imgs);
        } else {
        $data[] = $editfile['article_photo'];   
        }
        $data[] = $_POST['article_description'];
        $data[] = $_POST['submit_id'];

        $updateform = new News();
        $updateform = $updateform->updateArticle($data);
        $updateformID = $updateform->rowCount();


        if($updateformID){
          $_SESSION['article_updated'] = true;
       } else {
          $_SESSION['article_updated'] = false;
       }
       header("Location: ArticlesList");


    }


    if(isset($_POST['submit_id'])){


    $getcontents = new News();
    $getcontents = $getcontents->fetchArticle("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Articles</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Articles</li>
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
                                <form method="post" <?php if($getcontent){ ?> id="ArticleEditForm" <?php } else { ?> id="ArticleForm" <?php } ?> enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Student name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="student_name" name="student_name" class="form-control mb-0" value="<?php echo $getcontent['student_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Student age <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="student_age" name="student_age" class="form-control mb-0" value="<?php echo $getcontent['student_age']; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">School name <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="school_name" name="school_name" class="form-control mb-0" value="<?php echo $getcontent['school_name']; ?>" >
                                        </div>
                                    </div>

                                    <div class="clearboth"></div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Student Photo <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" id="photo_path" name="photo_path" onchange="validateLogo()" class="form-control mb-0" >
                                            <span class="note">* Upload only image file </span>
                                            <span class="note">Upload size: width:150px, height:150px </span>
                                            <?php if($getcontent){ ?><br>
                                            <img src="../<?php echo $getcontent['photo_path']; ?>" style="width: 50px;">
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">City <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="city" name="city" class="form-control mb-0" value="<?php echo $getcontent['city']; ?>" >
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
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Article Title <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="article_title" name="article_title" class="form-control mb-0" value="<?php echo $getcontent['article_title']; ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Article Image <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" id="logo_image" name="article_photo" onchange="validateLogo()" class="form-control mb-0" >
                                            <span class="note">* Upload only image file </span>
                                            <span class="note">Upload size: width:310px, height:210px </span>
                                            <div id="preview_logo"></div>
                                            <?php if($getcontent){ ?>
                                            <img src="../<?php echo $getcontent['article_photo']; ?>" style="width: 50px;">
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group row col-sm-4 float-left">
                                        <label class="col-form-label col-sm-12 mb-0 text-left" for="samplePhone">Description <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea rows="6" id="article_description" name="article_description" class="form-control mb-0"  ><?php echo $getcontent['article_description']; ?></textarea>
                                        </div>
                                    </div>


                                    <div class="clearboth"></div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-2 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="ArticleUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="ArticleSubmit">Submit</button>
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