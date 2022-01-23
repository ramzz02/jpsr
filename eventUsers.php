<?php 
	include("dashboardtopheader.php");
	
	
?>
<div class="col-lg-12 mb15">
					<div class="breadcrumb_content style2">
						<h2 class="breadcrumb_title float-left">Event Lists</h2>
						<p class="float-right"></p>
					</div>
				</div>
			</div>
			<div class="my_listings">
				<div class="row">
					<div class="col-lg-12">
						<div class="listing_table">
								<?php
									$query = mysqli_query($con, "select * from events where contact = '$username';");
	$count=mysqli_num_rows($query);
	
									if($count>0)
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
								while($row=mysqli_fetch_array($query))
									{
								?>
									   
										<td class="dn-lg"><?php echo $row['name'];?></td>
									    	<td class="dn-lg"><?php echo $row['contact']; ?></td>
									    	<td><?php echo $row['eventTitle']; ?></td>
									    	<td><?php echo $row['eventDate']; ?></td>
											 <td class="dn-lg"><img  src="uploads/<?php echo $row["images"]; ?>" alt="1.jpg" width="40"></td>
											<td><?php echo $row['des']; ?></td>
											
									    	
												<td class="editing_list">
													<ul>
														<li class="list-inline-item bg-success"><a href="editEvents.php?id=<?php echo $row['id'];?>" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit color-white"></span></a></li>
														
														<li class="list-inline-item bg-danger"><a href="deleteEvents.php?id=<?php echo $row['id'];?>" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-delete color-white"></span></a></li>
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