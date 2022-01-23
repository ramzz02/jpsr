<?php
	include("header.php");
	include("menu.php");
	include("dbConnection.php");
?>
<div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
								<a href="addVeg.php" class="btn btn-primary text-white"><i class="fa fa-plus-circle"></i> Add Vegtables</a>
                            </div>
                            <h4 class="page-title"> &nbsp; <i style="color:#6658dd" class="fa fa-briefcase"></i> Add Vegtables</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>SNo</th>
													<th>Action</th>
                                                    <th>file</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
										$query = mysqli_query($con, "select * from vegetables;");
										$count=mysqli_num_rows($query);
										for($i=1;$i<=$count;$i++)
										{
											if($count>0)
											{
												$row=mysqli_fetch_array($query);
												echo "<tr ><td>" . $i.  "</td>";
												echo "<td><a class='btn btn-danger' href='deleteVeg.php?userid=".$row['id']."' onClick=\"javascript: return confirm('Are you sure you want to delete ".$row['id']."');\"><span class='fa fa-times'></span></a></td>";
												echo "<td>". $row['file'] . "</td>";
												echo "<td>". $row['status'] . "</td>";
												echo "<td>". $row['date'] . "</td>";
												
												echo "<td>". $row['time'] . "</td>";
												echo "</tr>";
											}
										}
									?>
                                            </tbody>
                                        </table>
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
				</div>
				</div>
				<?php include("footer.php"); ?>