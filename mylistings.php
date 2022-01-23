<?php 
	include("dashboardtopheader.php");
?>
<div class="col-lg-12 mb15">
	<div class="breadcrumb_content style2">
		<h2 class="breadcrumb_title float-left">My Listings</h2>
		<p class="float-right">JPSR Services</p>
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
						<li class="nav-item"><a class="nav-link active" style="width:100%" data-toggle="tab" href="#menus"><i class="fa fa-heart"></i> Birthday Wishes</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" style="width:100%" href="#menu1"><i class="fa fa-users"></i> Kids Article</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" style="width:100%" href="#menu2"><i class="fa fa-newspaper-o"></i> News Report</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" style="width:100%" href="#menu3"><i class="fa fa-institution"></i> Temples</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="menus" class="container tab-pane active">
							<div class="listing_table">
								<?php
									$query = mysqli_query($con, "select * from birthday where contact = '$username';");
	$count=mysqli_num_rows($query);
	if($count>0)
	{
	?>
									<table class="table table-responsive">
										<thead>
											<tr class="carttable_row">
												<th class="cartm_title">Birthday Person</th>
												<th class="cartm_title">DOB</th>
												<th class="cartm_title">Sender Image</th>
												<th class="cartm_title">Birthday Image</th>
												<th class="cartm_title">Wishes</th>
												<th class="cartm_title">Status</th>
												<th colspan="4" class="cartm_title">Action</th>
											</tr>
										</thead>
										<tbody>
									
											<tr>
									<?php			
								
								while($row=mysqli_fetch_array($query))
								{
								
									?>
													<td class="dn-lg"><?php echo $row['birthdayperson']; ?></td>
													<td class="dn-lg"><?php echo $row['dob']; ?></td>
												<td class="dn-lg"><img  src="uploads/<?php echo $row["senderimage"]; ?>" alt="1.jpg" width="80"></td>
												<td class="dn-lg"><img src="uploads/<?php echo $row['birthdayimage']; ?>" alt="s1.png" width="80"></td>
												<td class="dn-lg"><?php echo $row['wishes']; ?></td>
												<?php
												if($row['status'] == 'Approved')
												{
												?>
												<td class="color-success">Approved</td>
												<?php
												}
												else if($row['status'] == 'Rejected')
												{
												?>
												<td class="color-danger">Rejected</td>
												<?php
												}
												else if($row['status'] == 'Pending')
												{
												?>
												<td class="color-primary">Pending</td>
												<?php
												}
												?>
												<td class="dn-lg">
													<ul>
														<li class="list-inline-item"><a href="editWishes.php?id=<?php echo $row['id'];?>" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
														<li class="list-inline-item"><a href="deleteWishes.php?id=<?php echo $row['id'];?>" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete"></span></a></li>
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
						<div id="menu1" class="container tab-pane fade">
							<div class="listing_table">
								<?php
									$query1 = mysqli_query($con,"select * from kidsarticle where contact = '$username';");
	$count1=mysqli_num_rows($query1);
	
									if($count1>0)
									{
								
									?>
									<table class="table table-responsive">
										<thead>
											<tr class="carttable_row">
												<th class="cartm_title">Student Name</th>
												<th class="dn-lg">Age</th>
												<th class="cartm_title">School</th>
												<th class="cartm_title">Contact</th>
												<th class="cartm_title">Article</th>
												<th class="cartm_title">Article Image</th>
												<th class="cartm_title">Status</th>
												<th class="cartm_title">Action</th>
											</tr>
										</thead>
										<tbody class="table_body">
										<?php
										while($row1=mysqli_fetch_array($query1))
									{
								?>
											<tr >
												<td class="dn-lg"><?php echo $row1['name']; ?></td>
												<td class="dn-lg"><?php echo $row1['age']; ?></td>
												<td class="dn-lg"><?php echo $row1['school'].", ".$row1['area'].', '.$row1['city']; ?></td>
												<td class="dn-lg"><?php echo $row1['contact']; ?></td>
												<td><?php echo $row1['articletitle']."<br>(".$row1['articledescription'].")"; ?></td>
												<td class="color-success"><a href="#"><img src="uploads/<?php echo $row1['articleimage']; ?>" alt="s1.png"></a></td>
												<?php
												if($row1['status'] == 'approved')
												{
												?>
												<td class="color-success">Approved</td>
												<?php
												}
												else if($row1['status'] == 'rejected')
												{
												?>
												<td class="color-danger">Rejected</td>
												<?php
												}
												else if($row1['status'] == 'Pending')
												{
												?>
												<td class="color-primary">Pending</td>
												<?php
												}
												?>
												<td class="editing_list">
													<ul>
														<li class="list-inline-item"><a href="editArticles.php?id=<?php echo $row1['id'];?>" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>

														<li class="list-inline-item"><a href="deleteArticles.php?id=<?php echo $row1['id'];?>"" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete"></span></a></li>
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
						<div id="menu2" class="container tab-pane fade">
							<div class="listing_table">
							<?php
								$query2 = mysqli_query($con, "select * from newsreport where contact = '$username';");
	$count2=mysqli_num_rows($query2);
	
									if($count2>0)
									{
								?>
									<table class="table table-responsive">
										<thead>
											<tr class="carttable_row">
												<th class="cartm_title">Language</th>
												<th class="dn-lg">Category</th>
												<th class="dn-lg">Contact</th>
												<th class="cartm_title">Title</th>
												<th class="cartm_title">News</th>
												<th class="cartm_title">Status</th>
												<th class="cartm_title">Action</th>
											</tr>
										</thead>
										<tbody class="table_body">
										
											<tr>
											<?php
									
								while($row2=mysqli_fetch_array($query2))
									{
									?>
												<td class="dn-lg"><?php echo $row2['language']; ?></td>
												<td><?php echo $row2['category']; ?></td>
												<td class="dn-lg"><?php echo $row2['contact']; ?></td>
												<td><?php echo $row2['title'].'<br>'.$row2['newsdescription']; ?></td>
												<td><a href="#"><img src="uploads/<?php echo $row2['newsimage']; ?>" alt="s1.png"></a></td>
												<?php
												if($row2['status'] == 'approved')
												{
												?>
												<td class="color-success">Approved</td>
												<?php
												}
												else if($row2['status'] == 'rejected')
												{
												?>
												<td class="color-danger">Rejected</td>
												<?php
												}
												else if($row2['status'] == 'Pending')
												{
												?>
												<td class="color-primary">Pending</td>
												<?php
												}
												?>
												<td class="editing_list">
													<ul>
														<li class="list-inline-item"><a href="editNews.php?id=<?php echo $row2['id'];?>" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
													
														<li class="list-inline-item"><a href="deleteNews.php?id=<?php echo $row2['id'];?>" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete"></span></a></li>
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
						<div id="menu3" class="container tab-pane fade">
							<div class="listing_table">
								<?php
									$query3 = mysqli_query($con, "select * from temple where contact = '$username';");
	$count3=mysqli_num_rows($query3);
	
									if($count3>0)
									{
								?>
									<table class="table table-responsive">
										<thead>
											<tr class="carttable_row">
												<th class="cartm_title">Temple</th>
												<th class="dn-lg">Contact</th>
												<th class="cartm_title">Address</th>
												<th class="cartm_title">Working Hours</th>
												<th class="cartm_title">Status</th>
												<th class="cartm_title">Action</th>
											</tr>
										</thead>
										<tbody class="table_body">
										<?php
								while($row3=mysqli_fetch_array($query3))
									{
									?>
											<tr>
												<th scope="row">
													<ul class="cart_list">
														<li class="list-inline-item pr10">
															<a href="#"><img src="uploads/<?php echo $row3['templeimage']; ?>" alt="s1.png"></a>
														</li>
														<li class="list-inline-item">
															<a class="cart_title" href="#"><?php echo $row3['name']; ?></a><br>
															<a class="cart_title" href="#"><?php echo $row3['incharge']; ?></a><br>
														</li>
													</ul>
												</th>
												<td class="dn-lg"><?php echo $row3['contact'].'<br>('.$row3['email'].')'; ?></td>
												<td><?php echo $row3['address'].', '.$row3['ward'].', '.$row3['area'].', '.$row3['city'].', '.$row3['state'].' - '.$row3['pincode'].', '.$row3['Landmark']; ?></td>
												<td><?php echo $row3['workingfrom']." to ".$row3['workingto']; ?></td>
												<?php
												if($row3['status'] == 'approved')
												{
												?>
												<td class="color-success">Approved</td>
												<?php
												}
												else if($row3['status'] == 'rejected')
												{
												?>
												<td class="color-danger">Rejected</td>
												<?php
												}
												else if($row3['status'] == 'Pending')
												{
												?>
												<td class="color-primary">Pending</td>
												<?php
												}
												?>
												<td class="editing_list">
													<ul>
														<li class="list-inline-item bg-success"><a href="editTemple.php?id=<?php echo $row3['id'];?>" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit color-white"></span></a></li>
													
														<li class="list-inline-item bg-danger"><a href="deleteTemple.php?id=<?php echo $row3['id'];?>" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete color-white"></span></a></li>
													</ul>
												</td>
											</tr>
											<?php
									}?>
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
</section>

<?php include("footer.php");?>