<?php include("header.php");
if($username != '')
{
?>
    <section class="extra-dashboard-menu dn-992" style="padding:0px">
			<div class="row" align="center">
				<div class="col-lg-12">
					<div class="ed_menu_list mt5">
						<ul>
							<?php include("dashboardmenu.php");?>
						</ul>
					</div>
				</div>
		</div>
	</section>

<?php
}
?>

	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f4">
		<div class="container">
			<div class="row">
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