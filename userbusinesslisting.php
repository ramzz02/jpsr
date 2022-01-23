<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  require_once 'includes/sessionout.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['business_profile_updated'])){
    if($_SESSION['business_profile_updated']){
      $output_business = "Successfully updated. Profile reflected in after admin approval";
    } else {
      $output_business = "Failed to update";
    }
    unset($_SESSION['business_profile_updated']);
  }

  if(isset($_SESSION['business_plan_updated'])){
    if($_SESSION['business_plan_updated']){
      $output_business = "Media files successfully updated. Profile reflected in after admin approval";
    } else {
      $output_business = "Failed to update";
    }
    unset($_SESSION['business_plan_updated']);
  }

  if(isset($_SESSION['business_Media_plan_updated'])){
    if($_SESSION['business_Media_plan_updated']){
      $output_business = "Plan updated successfully. Profile reflected in after admin approval";
    } else {
      $output_business = "Failed to update";
    }
    unset($_SESSION['business_Media_plan_updated']);
  }





$getuserbusinessLists = new Business();
$getuserbusinessLists = $getuserbusinessLists->fetchBusiness("WHERE enter_by = '{$_SESSION['Marketing_User_login']['id']}' ORDER BY id DESC")->resultSet();



?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
		<?php include("includes/headerTop.php"); ?>
	</head>
		
	<body>

		<?php include("includes/Header.php"); ?>

		<!-- <section class="extra-dashboard-menu dn-992" style="padding:0px">
				<div class="row" align="center">
					<div class="col-lg-12">
						<div class="ed_menu_list mt5">
							<ul>
								<?php include("dashboardmenu.php");?>
							</ul>
						</div>
					</div>
				</div>
		</section> -->

<!-- Our Dashbord -->
<section class="our-dashbord dashbord bgc-f4 ovh" style="padding-bottom:0px">
	<div class="container">

		<!-- <div class="row justify-content-center">

			<div class="col-lg-12">
				<div class="dashboard_navigationbar dn db-992">
					<div class="dropdown">
						<button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
						<ul id="myDropdown" class="dropdown-content">
							<?php include("dashboardmenu.php");?>
						</ul>
					</div>
				</div>
			</div>
		</div> -->

		<div class="row justify-content-center">


			<div class="col-lg-12 mb10">
				<div class="breadcrumb_content style2">
					<h2 class="breadcrumb_title float-left color-default">Welcome To JPSR Enterprises</h2>
				</div>
			</div>


			<div class="col-xl-12">

				<div class="alert alert-danger" id="message_container" role="alert" style="display: none;">
                   <span class="message" id="message"></span>
                </div>

				<div class="my_listings">
				<div class="row">
					<div class="col-lg-12">
						<div class="listing_table">
								<form method="post" id='UserBusinessForm' action="">
	                                <input type="hidden" id="submit_business_id" name="submit_business_id" value="<?php echo $_POST['submit_business_id'];?>" />
	                                <input type="hidden" id="edit_plan_id" name="edit_plan_id" value="<?php echo $_POST['edit_plan_id'];?>" />
									<table class="table table-responsive">
									  	<thead>
	                                        <tr>
	                                            <th style="width: 10%;text-align: center;">S.No</th>
	                                            <th style="width: 20%;">B. Name</th>
	                                            <th>Mobile</th>
	                                            <th>Category</th>
	                                            <th>B. City</th>
	                                            <th style="width: 5%;">Plan</th>
	                                            <th>Period</th>
	                                            <th>Subs.Date</th>
	                                            <th>Amount</th>
	                                            <th>P.Type</th>
	                                            
	                                            
	                                            <th style="text-align: center;">P.Status</th>
	                                            <th style="text-align: center;">Txn ID</th>
	                                            
	                                            <th>Reg Date</th>
	                                            <th>Enter By</th>
	                                            <th style="text-align: center;">Status</th>
	                                            <th>Updated By</th>
	                                            <th>Updated Date</th>
	                                            <th style="width: 10%;text-align: center;">Action</th>
	                                            <th style="width: 10%;text-align: center;">Action</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody class="table_body">
	                                        <?php
	                                        if(!empty($getuserbusinessLists)){
	                                            $count = 1;
	                                        foreach($getuserbusinessLists as $getbusinessList){
	                                        ?>
	                                        <tr>
	                                            <td style="text-align: center;"><?php echo $count; ?></td>

	                                            <?php
	                                            $getcategorys = new Business();
	                                            $getcategorys = $getcategorys->fetchCategory("WHERE id = '{$getbusinessList['category']}' ORDER BY id ASC")->resultSet();
	                                            $getcategory = $getcategorys[0];

	                                            $getlocations = new Location();
	                                            $getlocations = $getlocations->fetchLocation("WHERE id = '{$getbusinessList['location']}' ORDER BY location_name ASC")->resultSet();
	                                            $getlocation = $getlocations[0];

	                                            $getplans = new Business();
	                                            $getplans = $getplans->fetchPlan("WHERE id = '{$getbusinessList['plan']}' ORDER BY id ASC")->resultSet();
	                                            $getplan = $getplans[0];

	                                            $getstates = new Location();
	                                            $getstates = $getstates->fetchState("WHERE id = '{$getbusinessList['state']}' ORDER BY id ASC")->resultSet();
	                                            $getstate = $getstates[0];

	                                            $getdistricts = new Location();
	                                            $getdistricts = $getdistricts->fetchDistrict("WHERE id = '{$getbusinessList['district']}' ORDER BY id ASC")->resultSet();
	                                            $getdistrict = $getdistricts[0];

	                                            $getperiods = new Business();
	                                            $getperiods = $getperiods->fetchPeriod("WHERE premium_order = '{$getbusinessList['subscription_order']}' ORDER BY id ASC")->resultSet();
	                                            $getperiod = $getperiods[0];

	                                            $getimages = new Business();
	                                            $getimages = $getimages->fetchBusinessImage("WHERE business_id = '{$getbusinessList['id']}' ORDER BY id DESC")->resultSet();

	                                            if($getbusinessList['plan'] == 'free'){

	                                                $startDate = '';
	                                                $endDate = '';
	                                            } else {

	                                                $ls_date = explode("/", $getbusinessList['subscription_start_date']);
	                                                $startDate = $ls_date[2].'/'.$ls_date[1].'/'.$ls_date[0];
	                                                $le_date = explode("/", $getbusinessList['subscription_end_date']);
	                                                $endDate = $le_date[2].'/'.$le_date[1].'/'.$le_date[0];

	                                            }

	                                            
	                                            $r_date = explode("/", $getbusinessList['reg_date']);
	                                            $regDate = $r_date[2].'/'.$r_date[1].'/'.$r_date[0];

	                                            if($getbusinessList['updated_by_date'] != ''){

	                                            	$upd_date = explode("/", $getbusinessList['updated_by_date']);
	                                            	$updatedDate = $upd_date[2].'/'.$upd_date[1].'/'.$upd_date[0];

	                                            } else {

	                                            	$updatedDate = " - ";

	                                            }

	                                            

	                                            if($getbusinessList['enter_by'] == 'Admin'){

	                                                $enterByName = 'Admin';
	                                            } else {

	                                                $getuserregs = new Register();
	                                                $getuserregs = $getuserregs->fetchRegister("WHERE id = '{$getbusinessList['enter_by']}' ORDER BY id ASC")->resultSet();
	                                                $getuserreg = $getuserregs[0];

	                                                $enterByName = $getuserreg['name'];

	                                            }

	                                            if($getbusinessList['updated_by'] != ''){

	                                            if($getbusinessList['updated_by'] == 'Admin'){

	                                                $enterUpdatedByName = 'Admin';

	                                            } else {

	                                                $getupdateduserregs = new Register();
	                                                $getupdateduserregs = $getupdateduserregs->fetchRegister("WHERE id = '{$getbusinessList['updated_by']}' ORDER BY id ASC")->resultSet();
	                                                $getupdateduserreg = $getupdateduserregs[0];

	                                                $enterUpdatedByName = $getupdateduserreg['name'];

	                                            }

	                                        	} else {
	                                        		$enterUpdatedByName = " - ";
	                                        	}

	                                            

	                                            ?>
	                                            <td><?php echo $getbusinessList['business_name']; ?></td>
	                                            <td><?php echo $getbusinessList['mobile_no']; ?></td>
	                                            <td><?php echo $getcategory['category_name']; ?></td>
	                                            <td><?php echo $getlocation['location_name']; ?></td>
	                                            <?php if($getplan){ ?>
	                                            <td>
	                                                <?php echo $getplan['plan_name']; ?>
	                                            </td>
	                                            <?php } else { ?>
	                                            <td> Basic Registration </td>
	                                            <?php } ?>
	                                            <?php if($getperiod){ ?>
	                                            <td>
	                                                <?php echo $getperiod['period']; ?>
	                                            </td>
	                                            <?php } else { ?>
	                                            <td style="text-align: center;"> Life Time </td>
	                                            <?php } ?>

	                                            <?php if($getbusinessList['plan'] == 'free' || $getbusinessList['plan'] == ''){ ?>
	                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
	                                            <?php } else { ?>
	                                            <td style="text-align: center;" ><?php echo $startDate; ?> - <?php echo $endDate; ?></td>
	                                            <?php } ?>

	                                            <?php if($getbusinessList['amount'] != ''){ ?>
	                                              <td style="text-align: center;"><?php echo $getbusinessList['amount']; ?></td>
	                                            <?php } else { ?>
	                                            <td>&nbsp;-&nbsp;</td>
	                                            <?php } ?>
	                                            <?php if($getbusinessList['payment_type'] != ''){ ?>
	                                              <td style="text-align: center;text-transform: uppercase;"><?php echo $getbusinessList['payment_type']; ?></td>
	                                            <?php } else { ?>
	                                            <td>&nbsp;-&nbsp;</td>
	                                            <?php } ?>

	                                            

	                                            

	                                            <?php if($getbusinessList['payment_status'] != ''){ ?>
	                                              <td style="text-align: center;text-transform:capitalize;"><?php echo ucwords($getbusinessList['payment_status']); ?></td>
	                                            <?php } else { ?>
	                                            <td>&nbsp;-&nbsp;</td>
	                                            <?php } ?>

	                                            <?php if($getbusinessList['txn_id'] != ''){ ?>
	                                              <td style="text-align: center;text-transform:capitalize;"><?php echo $getbusinessList['txn_id']; ?></td>
	                                            <?php } else { ?>
	                                            <td style="text-align: center;" >&nbsp;-&nbsp;</td>
	                                            <?php } ?>

	                                            
	                                            
	                                            <td><?php echo $regDate; ?></td>

	                                            <?php if($getbusinessList['enter_by'] != ''){ ?>
	                                              <td style="text-align: center;"><?php echo ucwords($enterByName); ?></td>
	                                            <?php } else { ?>
	                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
	                                            <?php } ?>

	                                            <?php if($getbusinessList['status'] == 'active'){ ?>
	                                            <td style="color: green;font-weight: bold;"><?php echo ucwords($getbusinessList['status']); ?></td>
	                                            <?php } else { ?>
	                                            <td style="color: red;font-weight: bold;"><?php echo ucwords($getbusinessList['status']); ?></td>
	                                            <?php } ?>

	                                            <?php if($getbusinessList['updated_by'] != ''){ ?>
	                                              <td style="text-align: center;"><?php echo ucwords($enterUpdatedByName); ?></td>
	                                            <?php } else { ?>
	                                            <td style="text-align: center;">&nbsp;-&nbsp;</td>
	                                            <?php } ?>

	                                            <td><?php echo $updatedDate; ?></td>

	                                            <td class="my_profile_setting_input" style="text-align: center;">
	                                                <button style="width: 100px;line-height: 25px;"  id="<?php echo $getbusinessList['id'];?>" class="btn update_btn edit_plan">Edit Plan</button>&nbsp;&nbsp;
	                                            </td>

	                                            <td class="my_profile_setting_input" style="text-align: center;">
	                                                <button style="width: 120px;line-height: 25px;"  id="<?php echo $getbusinessList['id'];?>" class="btn update_btn edit_details">Edit Business</button>&nbsp;&nbsp;
	                                            </td>
	                                        </tr>
	                                        <?php $count++; } } else { ?>

	                                        <tr>
	                                        	<td colspan="20" >No data available</td>
	                                        </tr>
	                                        <?php } ?>
	                                    </tbody>
									</table>
								</form>
								
						</div>
					</div>
				</div>
			</div>
				

			</div>
			



		</div>
	</div>

</section>

	<?php include("includes/Footer.php"); ?>

	<?php include("includes/footerBottom.php"); ?>

<script type="text/javascript">
  $(document).on('click', '.edit_details', function() {                  
        var profile_id =  $(this).attr('id');
        $('#submit_business_id').val(profile_id);             
        $('#UserBusinessForm').attr('method', 'post');
        $('#UserBusinessForm').attr('action', 'EditBusinessDetails');
        $('#UserBusinessForm').submit();
    });
  $(document).on('click', '.edit_plan', function() {                  
        var profile_id =  $(this).attr('id');
        $('#edit_plan_id').val(profile_id);             
        $('#UserBusinessForm').attr('method', 'post');
        $('#UserBusinessForm').attr('action', 'EditPlanDetails');
        $('#UserBusinessForm').submit();
    });
</script>
<?php
  if(isset($output_business)) {
  ?>
  <script>
      $('#message_container').fadeIn(10);
      $('#message').text("<?php echo $output_business; ?>");
      setTimeout(function() {
          $('#message_container').fadeOut(400, function() {
              $('#message').text("");
          });
      }, 7000);
  </script>
  <?php
      }
  ?>
</body>
</html>