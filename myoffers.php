<?php 
	include("dashboardtopheader.php");
	$query = mysqli_query($con, "select * from jpsroffer where contact = '$username';");
	$count=mysqli_num_rows($query);
	
?>
<div class="col-lg-12 mb15">
					<div class="breadcrumb_content style2">
						<h2 class="breadcrumb_title float-left">My Offers</h2>
						<p class="float-right">JPSR Services</p>
					</div>
				</div>
			</div>
			<div class="my_listings">
				<div class="row">
					<div class="col-lg-12">
						<div class="listing_table">
															
								<table class="table table-responsive">
								  	<thead>
									    <tr class="carttable_row">
									    	<th class="dn-lg">OfferImage</th>
											<th class="dn-lg">OfferTitle</th>
									    	<th class="cartm_title">Category</th>
									    	<th class="cartm_title">Period</th>
									    	<th class="cartm_title">Amount</th>
									    	<th class="cartm_title">Description</th>
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
																		
																		
									    	<td class="dn-lg"><img  src="uploads/<?php echo $row["offerimage"]; ?>" alt="1.jpg" width="40"></td>
									    	<td><?php echo $row['offertitle']; ?></td>
									    	<td class="dn-lg"><?php echo $row['offercategory']; ?></td>
									    	<td><?php echo $row['offerfrom']." - ".$row['offerto']; ?></td>
									    	<td class="dn-lg"><?php echo $row['offeramount']; ?></td>
											<td class="dn-lg"><?php echo $row['offerdescription']; ?></td>
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
														<li class="list-inline-item bg-success"><a href="editOffers.php?id=<?php echo $row['id'];?>" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit color-white"></span></a></li>
														
														<li class="list-inline-item bg-danger"><a href="deleteOffers.php?id=<?php echo $row['id'];?>" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete color-white"></span></a></li>
									    		</ul>
									    	</td>
									    </tr>
<?php
									}
									
									?>
								  	</tbody>
								</table>
																
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include("footer.php");?>