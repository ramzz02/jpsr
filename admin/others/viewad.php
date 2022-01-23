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
								<a href="addad.php" class="btn btn-primary text-white"><i class="fa fa-plus-circle"></i> Add New Ad</a>
                            </div>
                            <h4 class="page-title"> &nbsp; <i style="color:#6658dd" class="fa fa-briefcase"></i> Add ad</h4>
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
                                                    <th>Business</th>
                                                    <th>Contact</th>
                                                    <th>eMail</th>
                                                    <th>Address</th>
                                                    <th>AdPage</th>
                                                    <th>AdPosition</th>
                                                    <th>AdCategory</th>
                                                    <th>Adimage</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
										$query = mysqli_query($con, "select * from jpsrad;");
										$count=mysqli_num_rows($query);
										for($i=1;$i<=$count;$i++)
										{
											if($count>0)
											{
												$row=mysqli_fetch_array($query);
												echo "<tr ><td>" . $i.  "</td>";
												echo "<td><a class='btn btn-primary' href='addad.php?id=".$row['id']."'><span class='fa fa-pen-nib'></span></a> | <a class='btn btn-danger' href='delete.php?userid=".$row['id']."' onClick=\"javascript: return confirm('Are you sure you want to delete ".$row['name']."');\"><span class='fa fa-times'></span></a></td>";
												echo "<td>". $row['name'] . "<br>(". $row['proprietor'] . ")</td>";
												echo "<td>". $row['contact'] . "</td>";
												echo "<td>". $row['email'] . "</td>";
												echo "<td>". $row['address'] . ", ". $row['area'] . ", ". $row['city'] . ", ". $row['state'] . ", ". $row['pincode'] . ", ". $row['landmark'] . "</td>";
												echo "<td>". $row['adpage'] . "</td>";
												echo "<td>". $row['adposition'] . "</td>";
												echo "<td>". $row['adcategory'] . "</td>";
												echo "<td><img src='../uploads/". $row['adimage'] . "' width='80px'></td>";
												echo "<td>". $row['date'] . "<br>(". $row['time'] . ")</td></tr>";
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