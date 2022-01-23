<?php 
	include("dashboardtopheader.php");
?>
<div class="col-lg-12 mb15">
	<div class="breadcrumb_content style2">
		<h2 class="breadcrumb_title float-left">JPSR Services</h2>
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
						<li class="nav-item"><a class="nav-link active" style="width:100%" data-toggle="tab" href="#menus"><i class="fa fa-home"></i> Home Services</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" style="width:100%" href="#menu1"><i class="fa fa-suitcase"></i> Business Services</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" style="width:100%" href="#menu2"><i class="fa fa-bank"></i> Property Services</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" style="width:100%" href="#menu3"><i class="fa fa-users"></i> Other Personal Services</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="menus" class="container tab-pane active">
							<div class="listing_table">
								<?php
									$query = mysqli_query($con, "select * from jpsrservices where contact = '$username' and category = 'home';");
									$count=mysqli_num_rows($query);
									
									if($count>0)
									{
									?>
									<table class="table table-responsive">
										<thead>
											<tr class="carttable_row">
												<th class="cartm_title">Service</th>
												<th class="dn-lg">Name</th>
												<th class="dn-lg">Contact</th>
												<th class="cartm_title">Address</th>
												<th class="cartm_title">Status</th>
												<th class="cartm_title">Action</th>
											</tr>
										</thead>
										<tbody class="table_body">
										<?php
										while($row=mysqli_fetch_array($query))
										{
										?>
											<tr>
												<th scope="row">
													<ul class="cart_list">
														<li class="list-inline-item pr10">
															<a href="#"><img src="uploads/<?php echo $row['serviceimage']; ?>" alt="s1.png"></a>
														</li>
														<li class="list-inline-item">
															<a class="cart_title" href="#"><?php echo $row['service']; ?></a><br>
															<a class="cart_title" href="#"><audio controls><source src="audio/"<?php echo $row['serviceaudio']; ?>" type="audio/mpeg"></audio></a><br>
														</li>
													</ul>
												</th>
												<td><?php echo $row['name']; ?></td>
												<td class="dn-lg"><?php echo $row['contact'].'<br>('.$row['email'].')'; ?></td>
												<td><?php echo $row['address'].', '.$row['ward'].', '.$row['area'].', '.$row['city'].', '.$row['state'].' - '.$row['pincode'].', '.$row['landmark']; ?></td>
												<?php
												if($row['status'] == 'approved')
												{
												?>
												<td class="color-success">Approved</td>
												<?php
												}
												else if($row['status'] == 'rejected')
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
												<td class="editing_list">
													<ul>
														<li class="list-inline-item bg-success"><a href="editHome.php?id=<?php echo $row['id'];?>&category=<?php echo $row['category'];?>" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit color-white"></span></a></li>
													
														<li class="list-inline-item bg-danger"><a href="deleteHome.php?id=<?php echo $row['id'];?>&category=<?php echo $row['category'];?>"" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete color-white"></span></a></li>
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
									<p align="right"><a href="jpsr-services.php" class="btn btn-thm"><i class="fa fa-user-plus"></i> Register JPSR Services</a></p>
									<?php
									}
								?>
							</div>
						</div>
						<div id="menu1" class="container tab-pane fade">
							<div class="listing_table">
								<?php
									$query1 = mysqli_query($con, "select * from jpsrservices where contact = '$username' and category = 'business';");
									$count1=mysqli_num_rows($query1);
									
									if($count1>0)
									{
									?>
									<table class="table table-responsive">
										<thead>
											<tr class="carttable_row">
												<th class="cartm_title">Service</th>
												<th class="dn-lg">Name</th>
												<th class="dn-lg">Contact</th>
												<th class="cartm_title">Address</th>
												<th class="cartm_title">Status</th>
												<th class="cartm_title">Action</th>
											</tr>
										</thead>
										<tbody class="table_body">
										<?php
										while($row1=mysqli_fetch_array($query))
										{
										?>
											<tr>
												<th scope="row">
													<ul class="cart_list">
														<li class="list-inline-item pr10">
															<a href="#"><img src="uploads/<?php echo $row2['serviceimage']; ?>" alt="s1.png"></a>
														</li>
														<li class="list-inline-item">
															<a class="cart_title" href="#"><?php echo $row1['service']; ?></a><br>
															<a class="cart_title" href="#"><audio controls><source src="audio/"<?php echo $row1['serviceaudio']; ?>" type="audio/mpeg"></audio></a><br>
														</li>
													</ul>
												</th>
												<td><?php echo $row['name']; ?></td>
												<td class="dn-lg"><?php echo $row1['contact'].'<br>('.$row1['email'].')'; ?></td>
												<td><?php echo $row1['address'].', '.$row1['ward'].', '.$row1['area'].', '.$row1['city'].', '.$row1['state'].' - '.$row1['pincode'].', '.$row1['landmark']; ?></td>
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
														<li class="list-inline-item bg-success"><a href="editHome.php?id=<?php echo $row1['id'];?>&category=<?php echo $row1['category'];?>"" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit color-white"></span></a></li>
														
														<li class="list-inline-item bg-danger"><a href="deleteHome.php?id=<?php echo $row1['id'];?>&category=<?php echo $row1['category'];?>"" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete color-white"></span></a></li>
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
									<p align="right"><a href="jpsr-services.php" class="btn btn-thm"><i class="fa fa-user-plus"></i> Register JPSR Services</a></p>
									<?php
									}
								?>
								</div>
							</div>
							<div id="menu2" class="container tab-pane fade">
								<div class="listing_table">
									<?php
									$query2 = mysqli_query($con, "select * from jpsrservices where contact = '$username' and category = 'property';");
									$count2=mysqli_num_rows($query2);
									
									if($count2>0)
									{
									?>
									<table class="table table-responsive">
										<thead>
											<tr class="carttable_row">
												<th class="cartm_title">Service</th>
												<th class="dn-lg">Name</th>
												<th class="dn-lg">Contact</th>
												<th class="cartm_title">Address</th>
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
												<th scope="row">
													<ul class="cart_list">
														<li class="list-inline-item pr10">
															<a href="#"><img src="uploads/<?php echo $row2['serviceimage']; ?>" alt="s1.png"></a>
														</li>
														<li class="list-inline-item">
															<a class="cart_title" href="#"><?php echo $row2['service']; ?></a><br>
															<a class="cart_title" href="#"><audio controls><source src="audio/"<?php echo $row2['serviceaudio']; ?>" type="audio/mpeg"></audio></a><br>
														</li>
													</ul>
												</th>
												<td><?php echo $row2['name']; ?></td>
												<td class="dn-lg"><?php echo $row2['contact'].'<br>('.$row2['email'].')'; ?></td>
												<td><?php echo $row2['address'].', '.$row2['ward'].', '.$row2['area'].', '.$row2['city'].', '.$row2['state'].' - '.$row2['pincode'].', '.$row2['landmark']; ?></td>
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
														<li class="list-inline-item bg-success"><a href="editHome.php?id=<?php echo $row2['id'];?>&category=<?php echo $row2['category'];?>"" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit color-white"></span></a></li>
														
														<li class="list-inline-item bg-danger"><a href="deleteHome.php?id=<?php echo $row2['id'];?>&category=<?php echo $row2['category'];?>"" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete color-white"></span></a></li>
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
									<p align="right"><a href="jpsr-services.php" class="btn btn-thm"><i class="fa fa-user-plus"></i> Register JPSR Services</a></p>
									<?php
									}
								?>
								</div>
							</div>
							<div id="menu3" class="container tab-pane fade">
								<div class="listing_table">
									<?php
									$query3 = mysqli_query($con, "select * from jpsrservices where contact = '$username' and category = 'personal';");
									$count3=mysqli_num_rows($query3);
									
									if($count3>0)
									{
									?>
									<table class="table table-responsive">
										<thead>
											<tr class="carttable_row">
												<th class="cartm_title">Service</th>
												<th class="dn-lg">Name</th>
												<th class="dn-lg">Contact</th>
												<th class="cartm_title">Address</th>
												<th class="cartm_title">Status</th>
												<th class="cartm_title">Action</th>
											</tr>
										</thead>
										<tbody class="table_body">
											<tr>
											<?php
											while($row3=mysqli_fetch_array($query3))
												
												{?>
												<th scope="row">
													<ul class="cart_list">
														<li class="list-inline-item pr10">
															<a href="#"><img src="uploads/<?php echo $row3['serviceimage']; ?>" alt="s1.png"></a>
														</li>
														<li class="list-inline-item">
															<a class="cart_title" href="#"><?php echo $row3['service']; ?></a><br>
															<a class="cart_title" href="#"><audio controls><source src="audio/"<?php echo $row3['serviceaudio']; ?>" type="audio/mpeg"></audio></a><br>
														</li>
													</ul>
												</th>
												<td><?php echo $row3['name']; ?></td>
												<td class="dn-lg"><?php echo $row3['contact'].'<br>('.$row3['email'].')'; ?></td>
												<td><?php echo $row3['address'].', '.$row3['ward'].', '.$row3['area'].', '.$row3['city'].', '.$row3['state'].' - '.$row3['pincode'].', '.$row3['landmark']; ?></td>
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
														<li class="list-inline-item bg-success"><a href="editHome.php?id=<?php echo $row3['id'];?>&category=<?php echo $row3['category'];?>"" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit color-white"></span></a></li>
														
														<li class="list-inline-item bg-danger"><a href="deleteHome.php?id=<?php echo $row3['id'];?>&category=<?php echo $row3['category'];?>"" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete color-white"></span></a></li>
													</ul>
												</td>
												<?php }?>
											</tr>
										</tbody>
									</table>
									<?php
									}
									else
									{
									?>
									<p align="right"><a href="jpsr-services.php" class="btn btn-thm"><i class="fa fa-user-plus"></i> Register JPSR Services</a></p>
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