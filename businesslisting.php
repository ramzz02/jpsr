<?php 
	include("dashboardtopheader.php");
	
	
?>
<div class="col-lg-12 mb15">
					<div class="breadcrumb_content style2">
						<h2 class="breadcrumb_title float-left">Business Listings</h2>
						<p class="float-right">JPSR Services</p>
					</div>
				</div>
			</div>
			<div class="my_listings">
				<div class="row">
					<div class="col-lg-12">
						<div class="listing_table">
								<?php
									$query = mysqli_query($con, "select * from business where contact = '$username';");
	$count=mysqli_num_rows($query);
	
									if($count>0)
									{
								?>							
								<table class="table table-responsive">
								  	<thead>
									    <tr class="carttable_row">
									    	<th class="cartm_title">Business Image</th>
											<th class="cartm_title">Name</th>
									    	<th class="dn-lg">Contact</th>
									    	<th class="cartm_title">Address</th>
									    	<th class="cartm_title">Category</th>
									    	<th class="cartm_title">Status</th>
									    	<th class="cartm_title">Action</th>
									    </tr>
								  	</thead>
								  	<tbody class="table_body">
								
																	    <tr>
																			<?php
								while($row=mysqli_fetch_array($query))
									{
								?>
									    <td class="dn-lg"><img  src="uploads/<?php echo $row["logo"]; ?>" alt="1.jpg" width="40"></td>
										<td class="dn-lg"><?php echo $row['name'].'<br>('.$row['proprietor'].')'; ?></td>
									    	<td class="dn-lg"><?php echo $row['contact'].'<br>('.$row['email'].')'; ?></td>
									    	<td><?php echo $row['address'].', '.$row['ward'].', '.$row['area'].', '.$row['city'].', '.$row['state'].' - '.$row['pincode'].', '.$row['Landmark']; ?></td>
									    	<td><?php echo $row['category']; ?></td>
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
												<td class="editing_list">
													<ul>
														<li class="list-inline-item bg-success"><a href="editBusiness.php?id=<?php echo $row['id'];?>" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit color-white"></span></a></li>
														
														<li class="list-inline-item bg-danger"><a href="deleteBusiness.php?id=<?php echo $row['id'];?>" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete color-white"></span></a></li>
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
	</section>

<?php include("footer.php");?>