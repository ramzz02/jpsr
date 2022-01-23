<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['product_added'])){
    if($_SESSION['product_added']){
      $output = "Successfully added";
    } else {
      $output = "Failed to add";
    }
    unset($_SESSION['product_added']);
    }

    if(isset($_POST['productSubmit'])){

        $data = array();
        $data[] = $_POST['category'];
        $data[] = $_POST['product_name'];
        $data[] = $_POST['product_desc'];
        $data[] = $_POST['mrp_price'];
        $data[] = $_POST['sell_price'];
        $data[] = $_POST['available_qty'];
        if($_FILES['video_path']['name']){
        $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
        $data[] = $Videos;
        move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);
        } else {
        $data[] = "";   
        }

        $addform = new Product();
        $addform = $addform->addProduct($data);
        $addformID = $addform->lastInsertID();


        if(count($_FILES['product_images']['error']) >= 1) {
            for($i = 0; $i < count($_FILES['product_images']['error']); $i++) {
                if($_FILES['product_images']['error'][$i] == 0) {
                    $filePath = 'product_images/'.date('YmdHis').'_'.$_FILES['product_images']['name'][$i];
                    $type = $_FILES['product_images']['type'][$i];
                    $size = $_FILES['product_images']['size'][$i];
                    move_uploaded_file($_FILES['product_images']['tmp_name'][$i], '../'.$filePath); 
                    $data = array();
                    $data[] = $addformID;
                    $data[] = $filePath;
                    $data[] = $type;
                    $data[] = $size;

                    $addimage = new Product();
                    $addimage = $addimage->addProductImage($data); 
                    $addimage_id = $addimage->lastInsertID();
                } 
            }     
        }

        if($addformID){
          $_SESSION['product_added'] = true;
       } else {
          $_SESSION['product_added'] = false;
       }
       header("Location: addproduct.php");


    }


    if(isset($_POST['productUpdate'])){

        $data = array();
        $data[] = $_POST['category'];
        $data[] = $_POST['product_name'];
        $data[] = $_POST['product_desc'];
        $data[] = $_POST['mrp_price'];
        $data[] = $_POST['sell_price'];
        $data[] = $_POST['available_qty'];
        if($_FILES['video_path']['error'] == 0) {
        $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
        $data[] = $Videos;
        move_uploaded_file($_FILES['video_path']['tmp_name'], '../'.$Videos);
        } else {
        $editfiles = new Product();
        $editfiles = $editfiles->fetchProduct("WHERE id ='{$_POST['submit_id']}'")->resultSet();
        $editfile = $editfiles[0];
        $data[] = $editfile['video_path'];   
        }
        $data[] = $_POST['submit_id'];

        $updateform = new Product();
        $updateform = $updateform->updateProduct($data);
        $updateformID = $updateform->rowCount();


        if(count($_FILES['product_images']['error']) >= 1) {
            for($i = 0; $i < count($_FILES['product_images']['error']); $i++) {
                if($_FILES['product_images']['error'][$i] == 0) {
                    $filePath = 'product_images/'.date('YmdHis').'_'.$_FILES['product_images']['name'][$i];
                    $type = $_FILES['product_images']['type'][$i];
                    $size = $_FILES['product_images']['size'][$i];
                    move_uploaded_file($_FILES['product_images']['tmp_name'][$i], '../'.$filePath); 
                    $data = array();
                    $data[] = $_POST['submit_id'];
                    $data[] = $filePath;
                    $data[] = $type;
                    $data[] = $size;

                    $addimage = new Product();
                    $addimage = $addimage->addProductImage($data); 
                    $addimage_id = $addimage->lastInsertID();
                } 
            }     
        }

        if($updateformID || $addimage_id){
          $_SESSION['product_updated'] = true;
       } else {
          $_SESSION['product_updated'] = false;
       }
       header("Location: productList.php");


    }


    if(isset($_POST['submit_id'])){


    if(!empty($_POST['delete_image_id'])){


      $data = array();
      $data[] = $_POST['delete_image_id'];

      //print_r($data);
      //exit();

      $getimages = new Product();
      $getimages = $getimages->fetchProductImage("WHERE id = '{$_POST['delete_image_id']}' ORDER BY id DESC")->resultSet();
      $getimage = $getimages[0];

      $img_path = $getimage['image_path'];
      if($img_path){
       unlink('../'.$img_path); 
      }
      
      $deleteimagefile = new Product();
      $deleteimagefile = $deleteimagefile->removeProductImage($data);
      $deleteimagefile_id = $deleteimagefile->rowCount();

    }

    $getcontents = new Product();
    $getcontents = $getcontents->fetchProduct("WHERE id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();
    $getcontent = $getcontents[0];

    $getimages = new Product();
    $getimages = $getimages->fetchProductImage("WHERE product_id = '{$_POST['submit_id']}' ORDER BY id DESC")->resultSet();


    }


$getcategorys = new Product();
$getcategorys = $getcategorys->fetchCategory("ORDER BY id ASC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">New Product</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add product</li>
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
                                <form method="post" id="ProductForm" enctype="multipart/form-data" autocomplete="off">
                                  <input type="hidden" name="submit_id" id="submit_id" value="<?php echo $getcontent['id']; ?>">
                                  <input type="hidden" name="delete_image_id" id="delete_image_id">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Select Category <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                            <select class="m-b-10 form-control" name="category" id="category" >
                                                <option value="" Selected Disabled>Choose</option>
                                                <?php foreach($getcategorys as $getcategory){ ?>
                                                <option value="<?php echo $getcategory['id']; ?>" <?php if($getcontent['category'] == $getcategory['id']){ echo 'selected'; } ?> ><?php echo $getcategory['category_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Product Name <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" id="product_name" name="product_name" class="form-control mb-0" value="<?php echo $getcontent['product_name']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Product Description <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                            <textarea rows="6" id="product_desc" name="product_desc" class="form-control mb-0"><?php echo $getcontent['product_desc']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Product Images <span class="required">*</span><br>(Maximum 5 images)</label>
                                        <div class="col-sm-6">

                                          <?php 
                                          if(!empty($getimages)){
                                            foreach($getimages as $getimage){
                                          ?>

                                            <img src="../<?php echo $getimage['image_path']; ?>" style="width: 150px;height: 150px;">&nbsp;&nbsp;&nbsp;
                                            <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $getimage['id'];?>" src="assets/img/delete_icon.png"  class="delete"></a>&nbsp;&nbsp;<br><br>

                                          <?php } ?>
                                          
                                          <?php } ?>

                                            <input type="file" name="product_images[]" id="product_images" multiple="multiple" onchange="validateImage()"><br>
                                            <span>Size: Width:600px, Height:600px</span>
                                            <input type="text" name="content_id" id="content_id" style="height: 0px;border: none;color: #fff;"  <?php if(!empty($getimages)){ ?> value="1" <?php } ?> >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">M.R.P Price <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" id="mrp_price" name="mrp_price" class="form-control mb-0" value="<?php echo $getcontent['mrp_price']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Sell Price <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" id="sell_price" name="sell_price" class="form-control mb-0" value="<?php echo $getcontent['sell_price']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Available Stock <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" id="available_qty" name="available_qty" class="form-control mb-0" value="<?php echo $getcontent['available_qty']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Product Video <br>(Optional)</label>
                                        <div class="col-sm-6">
                                          <?php if($getcontent['video_path']){ ?>
                                          <video width="150"  controls><source src="../<?php echo $getcontent['video_path']; ?>" type="video/mp4"></video><br>
                                          <?php } ?>
                                          <input type="file" name="video_path" id="video_path">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 mb-0 text-left text-sm-center" for="samplePhone">Product Type <span class="required">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="radio" id="type" name="type" class="form-control mb-0" value="1">&nbsp;&nbsp;Featured Product
                                            <input type="radio" id="type" name="type" class="form-control mb-0" value="2">&nbsp;&nbsp;New Arrivals
                                            <input type="radio" id="type" name="type" class="form-control mb-0" value="">&nbsp;&nbsp;None
                                        </div>
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="ml-auto col-sm-9 no-padding">
                                        <?php if($getcontent){ ?>
                                        <button class="btn btn-primary" type="submit" name="productUpdate">Update</button>
                                        <?php } else { ?>
                                        <button class="btn btn-primary" type="submit" name="productSubmit">Submit</button>
                                        <button class="btn btn-default" onclick="window.location.href = 'addproduct.php';" type="reset">Reset</button>
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
      function validateImage() {
      var formData = new FormData();
      var file = document.getElementById("product_images").files[0];
      var file2 = document.getElementById("product_images").files[1];
      var file3 = document.getElementById("product_images").files[2];
      var file4 = document.getElementById("product_images").files[3];
      var file5 = document.getElementById("product_images").files[4];
      var file6 = document.getElementById("product_images").files[5];
      formData.append("Filedata", file);

      $(".ImgError").remove();
      var t = file.type.split('/').pop().toLowerCase();
      if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
          $('#product_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          document.getElementById("product_images").value = '';
          $('#content_id').val('');
          document.getElementById("product_images").focus();
          return false;
      } else {
        $('#content_id').val('1');
        $('#content_id-error').hide();
      }
      formData.append("Filedata", file2);
      var t2 = file2.type.split('/').pop().toLowerCase();
      if (t2 != "jpeg" && t2 != "jpg" && t2 != "png" && t2 != "gif") {
          $('#product_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          document.getElementById("product_images").value = '';
          $('#content_id').val('');
          document.getElementById("product_images").focus();
          return false;
      } else {
        $('#content_id').val('1');
        $('#content_id-error').hide();
      }
      formData.append("Filedata", file3);
      var t3 = file3.type.split('/').pop().toLowerCase();
      if (t3 != "jpeg" && t3 != "jpg" && t3 != "png" && t3 != "gif") {
          $('#product_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          document.getElementById("product_images").value = '';
          $('#content_id').val('');
          document.getElementById("product_images").focus();
          return false;
      } else {
        $('#content_id').val('1');
        $('#content_id-error').hide();
      }
      formData.append("Filedata", file4);
      var t4 = file4.type.split('/').pop().toLowerCase();
      if (t4 != "jpeg" && t4 != "jpg" && t4 != "png" && t4 != "gif") {
          $('#product_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          document.getElementById("product_images").value = '';
          $('#content_id').val('');
          document.getElementById("product_images").focus();
          return false;
      } else {
        $('#content_id').val('1');
        $('#content_id-error').hide();
      }
      formData.append("Filedata", file5);
      var t5 = file5.type.split('/').pop().toLowerCase();
      if (t5 != "jpeg" && t5 != "jpg" && t5 != "png" && t5 != "gif") {
          $('#product_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          document.getElementById("product_images").value = '';
          $('#content_id').val('');
          document.getElementById("product_images").focus();
          return false;
      } else {
        $('#content_id').val('1');
        $('#content_id-error').hide();
      }
      formData.append("Filedata", file6);
      var t6 = file6.type.split('/').pop().toLowerCase();
      if (t6) {
          $('#product_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Maximum 5 images only allowed</label>');
          document.getElementById("product_images").value = '';
          document.getElementById("product_images").focus();
          return false;
      } 
  }
</script>
<script type="text/javascript">
  $(document).on('click', '.delete', function() {   
      var confirm_msg = confirm("Are you sure to delete?");
      if (confirm_msg == true) {
          var profile_id =  $(this).attr('id');
          $('#delete_image_id').val(profile_id);
          alert(profile_id);           
          $('#ProductForm').attr('method', 'post');
          $('#ProductForm').attr('action', 'addproduct.php');
          $('#ProductForm').submit();
      }            
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