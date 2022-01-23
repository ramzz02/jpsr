<?php 
	include("dashboardtopheader.php");
?>
<div class="col-lg-12 mb15">
	<div class="breadcrumb_content style2">
		<h2 class="breadcrumb_title float-left">Classifieds</h2>
		<p class="float-right">JPSR Enterprises</p>
	</div>
</div>
</div>
<div class="my_listings">
	<div class="row">
		<div class="col-lg-12">
			<div class="shortcode_widget_tab">
				<div class="ui_kit_tab">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"><a class="nav-link active" style="width:100%" data-toggle="tab" href="#menus"><i class="fa fa-home"></i>Jobs</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" style="width:100%" href="#menu1"><i class="fa fa-suitcase"></i> Employees</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" style="width:100%" href="#menu2"><i class="fa fa-bank"></i>Property</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" style="width:100%" href="#menu3"><i class="fa fa-users"></i> Events</a></li>
						
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="menus" class="container tab-pane active">
					<div class="my_listings">
				<div class="row">
					<div class="col-lg-12">
						<div class="listing_table">
								<?php
									$query = mysqli_query($con, "select * from jobs where contact = '$username';");
	$count=mysqli_num_rows($query);
	
									if($count>0)
									{
								?>							
								<table class="table table-responsive">
								  	<thead>
									    <tr class="carttable_row">
									    	<th class="cartm_title">Type</th>
											<th class="cartm_title">Name</th>
									    	<th class="dn-lg">Contact</th>
									    	<th class="cartm_title">Designation</th>
											<th class="cartm_title">Company</th>
											<th class="cartm_title">Location</th>
											<th class="cartm_title">Vaccancies</th>
											<th class="cartm_title">Qualification</th>
											<th class="cartm_title">Experience</th>
									    	<th class="cartm_title">Position</th>
									    	<th class="cartm_title">Action</th>
									    </tr>
								  	</thead>
								  	<tbody class="table_body">
								
																	    <tr>
																			<?php
								while($row=mysqli_fetch_array($query))
									{
								?>
									    <td class="dn-lg"><?php echo $row['type'];?></td>
										<td class="dn-lg"><?php echo $row['name'];?></td>
									    	<td class="dn-lg"><?php echo $row['contact']; ?></td>
									    	<td><?php echo $row['designation']; ?></td>
									    	<td><?php echo $row['company']; ?></td>
											<td><?php echo $row['location']; ?></td>
											<td><?php echo $row['vaccancies']; ?></td>
											<td><?php echo $row['qualification']; ?></td>
											<td><?php echo $row['experience']; ?></td>
											<td><?php echo $row['position']; ?></td>
									    	
												<td class="editing_list">
													<ul>
														<li class="list-inline-item bg-success"><a href="editJobs.php?id=<?php echo $row['id'];?>" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit color-white"></span></a></li>
														
														<li class="list-inline-item bg-danger"><a href="deleteJobs.php?id=<?php echo $row['id'];?>" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete color-white"></span></a></li>
									    		</ul>
									    	</td>
									    </tr>

																<?php
									}
									
									?>
								  	</tbody>
								</table>
								<?php
									
									}
									else
									{
									?>
									<a href="register.php" class="btn btn-thm"><i class="fa fa-user-plus"></i> Register Your Business</a>
									<?php
									}
								?>
						</div>
					</div>
				</div>
			</div>
						</div>
						<div id="menu1" class="container tab-pane fade">
							<div class="my_listings">
				<div class="row">
					<div class="col-lg-12">
						<div class="listing_table">
								<?php
									$query1 = mysqli_query($con, "select * from resource where contact = '$username';");
	$count1=mysqli_num_rows($query1);
	
									if($count1>0)
									{
								?>							
								<table class="table table-responsive">
								  	<thead>
									    <tr class="carttable_row">
									    	
											<th class="cartm_title">Name</th>
									    	<th class="dn-lg">Contact</th>
				
											<th class="cartm_title">Qualification</th>
											<th class="cartm_title">Experience</th>
									    	<th class="cartm_title">Info</th>
									    	<th class="cartm_title">Action</th>
									    </tr>
								  	</thead>
								  	<tbody class="table_body">
								
																	    <tr>
																			<?php
								while($row1=mysqli_fetch_array($query1))
									{
								?>
									    
										<td class="dn-lg"><?php echo $row1['name'];?></td>
									    	<td class="dn-lg"><?php echo $row1['contact']; ?></td>
									    	
											<td><?php echo $row1['qualification']; ?></td>
											<td><?php echo $row1['experience']; ?></td>
											<td><?php echo $row1['info']; ?></td>
									    	
												<td class="editing_list">
													<ul>
														<li class="list-inline-item bg-success"><a href="editResources.php?id=<?php echo $row1['id'];?>" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit color-white"></span></a></li>
														
														<li class="list-inline-item bg-danger"><a href="deleteResources.php?id=<?php echo $row1['id'];?>" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete color-white"></span></a></li>
									    		</ul>
									    	</td>
									    </tr>

																<?php
									}
									
									?>
								  	</tbody>
								</table>
								<?php
									
									}
									else
									{
									?>
									<a href="register.php" class="btn btn-thm"><i class="fa fa-user-plus"></i> Register Your Business</a>
									<?php
									}
								?>
						</div>
					</div>
				</div>
			</div>
						</div>
							<div id="menu2" class="container tab-pane fade">
							<div class="my_listings">
				<div class="row">
					<div class="col-lg-12">
						<div class="listing_table">
								<?php
									$query2 = mysqli_query($con, "select * from property where contact = '$username';");
	$count2=mysqli_num_rows($query2);
	
									if($count2>0)
									{
								?>							
								<table class="table table-responsive">
								  	<thead>
									    <tr class="carttable_row">
									    	
											<th class="cartm_title">Name</th>
									    	<th class="dn-lg">Contact</th>
									    	<th class="cartm_title">HouseType</th>
											<th class="cartm_title">BHK</th>
											<th class="cartm_title">Rent</th>
											<th class="cartm_title">Location</th>
												<th class="cartm_title">Info</th>
									    	<th class="cartm_title">Action</th>
									    </tr>
								  	</thead>
								  	<tbody class="table_body">
								
																	    <tr>
																			<?php
								while($row2=mysqli_fetch_array($query2))
									{
								?>
									   
										<td class="dn-lg"><?php echo $row2['name'];?></td>
									    	<td class="dn-lg"><?php echo $row2['contact']; ?></td>
									    	<td><?php echo $row2['houseType']; ?></td>
									    	<td><?php echo $row2['bhk']; ?></td>
											<td><?php echo $row2['rent']; ?></td>
											<td><?php echo $row2['location']; ?></td>
											<td><?php echo $row2['info']; ?></td>
											
									    	
												<td class="editing_list">
													<ul>
														<li class="list-inline-item bg-success"><a href="editProperty.php?id=<?php echo $row2['id'];?>" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit color-white"></span></a></li>
														
														<li class="list-inline-item bg-danger"><a href="deleteProperty.php?id=<?php echo $row2['id'];?>" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete color-white"></span></a></li>
									    		</ul>
									    	</td>
									    </tr>

																<?php
									}
									
									?>
								  	</tbody>
								</table>
								<?php
									
									}
									else
									{
									?>
									<a href="register.php" class="btn btn-thm"><i class="fa fa-user-plus"></i> Register Your Business</a>
									<?php
									}
								?>
						</div>
					</div>
				</div>
			</div>
						</div>
							<div id="menu3" class="container tab-pane fade">
							<div class="my_listings">
				<div class="row">
					<div class="col-lg-12">
						<div class="listing_table">
								<?php
									$query3 = mysqli_query($con, "select * from events where contact = '$username';");
	$count3=mysqli_num_rows($query3);
	
									if($count3>0)
									{
								?>							
								<table class="table table-responsive">
								  	<thead>
									    <tr class="carttable_row">
									    	
											<th class="cartm_title">Name</th>
									    	<th class="dn-lg">Contact</th>
									    	<th class="cartm_title">EventTitle</th>
											<th class="cartm_title">Date</th>
											<th class="cartm_title">Images</th>
											<th class="cartm_title">Description</th>
									    	<th class="cartm_title">Action</th>
									    </tr>
								  	</thead>
								  	<tbody class="table_body">
								
																	    <tr>
																			<?php
								while($row3=mysqli_fetch_array($query3))
									{
								?>
									   
										<td class="dn-lg"><?php echo $row3['name'];?></td>
									    	<td class="dn-lg"><?php echo $row3['contact']; ?></td>
									    	<td><?php echo $row3['eventTitle']; ?></td>
									    	<td><?php echo $row3['eventDate']; ?></td>
											 <td class="dn-lg"><img  src="uploads/<?php echo $row3["images"]; ?>" alt="1.jpg" width="40"></td>
											<td><?php echo $row3['des']; ?></td>
											
									    	
												<td class="editing_list">
													<ul>
														<li class="list-inline-item bg-success"><a href="editEvents.php?id=<?php echo $row3['id'];?>" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit color-white"></span></a></li>
														
														<li class="list-inline-item bg-danger"><a href="deleteEvents.php?id=<?php echo $row3['id'];?>" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete color-white"></span></a></li>
									    		</ul>
									    	</td>
									    </tr>

																<?php
									}
									
									?>
								  	</tbody>
								</table>
								<?php
									
									}
									else
									{
									?>
									<a href="register.php" class="btn btn-thm"><i class="fa fa-user-plus"></i> Register Your Business</a>
									<?php
									}
								?>
						</div>
					</div>
				</div>
			</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
							</div>
</div>
</section>

<?php include("footer.php");?>