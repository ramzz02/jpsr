<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['temple_updated'])){
    if($_SESSION['temple_updated']){
      $output = "Successfully updated";
    } else {
      $output = "Not yet updated";
    }
    unset($_SESSION['temple_updated']);
    }

    if(isset($_SESSION['temple_deleted'])){
    if($_SESSION['temple_deleted']){
      $output = "Successfully deleted";
    } else {
      $output = "Failed to delete";
    }
    unset($_SESSION['temple_deleted']);
    }

    if(isset($_POST['delete_id'])){

    $data = array();
    $data[] = $_POST['delete_id'];

    $getimages = new Temple();
    $getimages = $getimages->fetchTempleImage("WHERE temple_id = '{$_POST['delete_id']}' ORDER BY id DESC")->resultSet();

    foreach($getimages as $getimage){
     $img_path = $getimage['image_path'];
     unlink('../'.$img_path);
    }

    $gettempimages = new Temple();
    $gettempimages = $gettempimages->fetchTemple("WHERE id = '{$_POST['delete_id']}' ORDER BY id DESC")->resultSet();
    $gettempimage = $gettempimages[0];

     $tempimg_path = $gettempimage['temple_image'];
     unlink('../'.$tempimg_path);
     unlink('../'.$gettempimage['video']);

    $deletefile = new Temple();
    $deletefile = $deletefile->removeTemple($data);
    $deletefile_id = $deletefile->rowCount();

    $deleteimagefile = new Temple();
    $deleteimagefile = $deleteimagefile->removeTempleListImage($data);
    $deleteimagefile_id = $deleteimagefile->rowCount();
  
    if($deletefile_id){ 
      
        $_SESSION['temple_deleted'] = true;
    } else {
        $_SESSION['temple_deleted'] = false;
    }

    header('Location: TempleList');

  }

$gettempleLists = new Temple();
$gettempleLists = $gettempleLists->fetchTemple("ORDER BY id DESC")->resultSet();


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
                    <h6 class="page-title-heading mr-0 mr-r-5">Temples List</h6>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Temple List</li>
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
                            <div class="widget-body clearfix table-list">
                                <form method="post" id='tableForm' action="">
                                <input type="hidden" id="submit_id" name="submit_id" value="<?php echo $_POST['submit_id'];?>" />
                                <input type="hidden" id="delete_id" name="delete_id" value="<?php echo $_POST['delete_id'];?>" />
                                <table class="table table-editable table-responsive" data-toggle="datatables" >
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;text-align: center;">S.No</th>
                                            <th>Location</th>
                                            <th>Temple name</th>
                                            <th>Person name</th>
                                            <th>Mobile No</th>
                                            <th>Status</th>
                                            <th>Reg Date</th>
                                            <th>Enter By</th>
                                            <th>Updated By</th>
                                            <th>Updated Date</th>
                                            <th>Image</th>
                                            <th style="width: 10%;text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($gettempleLists)){
                                            $count = 1;
                                        foreach($gettempleLists as $gettempleList){
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $count; ?></td>

                                            <?php

                                            $getlocations = new Location();
                                            $getlocations = $getlocations->fetchLocation("WHERE id = '{$gettempleList['location']}' ORDER BY location_name ASC")->resultSet();
                                            $getlocation = $getlocations[0];

                                            $getwards = new Location();
                                            $getwards = $getwards->fetchWard("WHERE id = '{$gettempleList['ward_no']}' ORDER BY ward_no ASC")->resultSet();
                                            $getward = $getwards[0];

                                            $getareas = new Location();
                                            $getareas = $getareas->fetchArea("WHERE id = '{$gettempleList['area']}' ORDER BY area_name ASC")->resultSet();
                                            $getarea = $getareas[0];

                                            $r_date = explode("/", $gettempleList['reg_date']);
                                            $regDate = $r_date[2].'/'.$r_date[1].'/'.$r_date[0];

                                            $up_date = explode("/", $gettempleList['updated_date']);
                                            $updatedDate = $up_date[2].'/'.$up_date[1].'/'.$up_date[0];

                                            if($gettempleList['enter_by'] == 'Admin'){

                                                $enterByName = 'Admin';
                                            } else {

                                                $getuserregs = new Register();
                                                $getuserregs = $getuserregs->fetchRegister("WHERE id = '{$gettempleList['enter_by']}' ORDER BY id ASC")->resultSet();
                                                $getuserreg = $getuserregs[0];

                                                $enterByName = $getuserreg['name'];

                                            }

                                            if($gettempleList['updated_by'] == 'Admin'){

                                                $enterUpdatedByName = 'Admin';

                                            } else {

                                                $getupdateduserregs = new Register();
                                                $getupdateduserregs = $getupdateduserregs->fetchRegister("WHERE id = '{$gettempleList['updated_by']}' ORDER BY id ASC")->resultSet();
                                                $getupdateduserreg = $getupdateduserregs[0];

                                                $enterUpdatedByName = $getupdateduserreg['name'];

                                            }


                                            ?>
                                            <td><?php echo $getlocation['location_name']; ?></td>
                                           <!--  <td><?php echo $getward['ward_no']; ?></td>
                                            <td><?php echo $getarea['area']; ?></td> -->
                                            <td><?php echo $gettempleList['temple_name']; ?></td>
                                            <td><?php echo $gettempleList['person_name']; ?></td>
                                            <td><?php echo $gettempleList['mobile_no']; ?></td>
                                            <td>
                                            <label class="switch">
                                            <input class="switch-input" type="checkbox" name="checkbox" <?php if($gettempleList['status'] == 'active'){ echo 'checked'; } ?> />
                                            <span class="switch-label active_update" id="<?php echo $gettempleList['id'];?>" data-on="Active" data-off="Deactive"></span>
                                            <span class="switch-handle "></span> 
                                           </label>
                                            </td>

                                            <td><?php echo $regDate; ?></td>
                                           
                                            <?php if($gettempleList['enter_by'] != ''){ ?>
                                              <td style="text-align: center;"><?php echo $enterByName; ?></td>
                                            <?php } else { ?>
                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <?php if($gettempleList['updated_by'] != ''){ ?>
                                              <td style="text-align: center;"><?php echo $enterUpdatedByName; ?></td>
                                            <?php } else { ?>
                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <?php if($gettempleList['updated_date'] != ''){ ?>
                                              <td style="text-align: center;"><?php echo $updatedDate; ?></td>
                                            <?php } else { ?>
                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
                                            <?php } ?>

                                            <td>
                                            <?php if($gettempleList['temple_image']){ ?>
                                              <img src="../<?php echo $gettempleList['temple_image']; ?>" style="width: 50px;">
                                            <?php }  else { ?>
                                              No Image
                                            <?php } ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $gettempleList['id'];?>" src="assets/img/edit_icon.png"  class="edit"></a>&nbsp;&nbsp;
                                                <!-- <a href="JavaScript:Void(0);"><img style="width: 30px;height: 30px;" id="<?php echo $gettempleList['id'];?>" src="assets/img/delete_icon.png"  class="delete"></a>&nbsp;&nbsp; -->
                                            </td>
                                        </tr>
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
        $('#tableForm').attr('action', 'AddTemple');
        $('#tableForm').submit();
    });
  // $(document).on('click', '.delete', function() {   
  //     var confirm_msg = confirm("Are you sure to delete?");
  //     if (confirm_msg == true) {
  //         var profile_id =  $(this).attr('id');
  //         $('#delete_id').val(profile_id);             
  //         $('#tableForm').attr('method', 'post');
  //         $('#tableForm').attr('action', 'TempleList');
  //         $('#tableForm').submit();
  //     }            
  // });
  $(document).on('click', '.active_update', function() {   
      var profile_id =  $(this).attr('id');
      // alert(profile_id);
      $.ajax({
        type: "POST",
        url: "status_update.php",
        data: "update_id="+profile_id+"&name=temple_list",
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