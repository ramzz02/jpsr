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
								<a href="addtemple.php" class="btn btn-primary text-white"><i class="fa fa-plus-circle"></i> Add New Temple</a>
                            </div>
                            <h4 class="page-title"> &nbsp; <i style="color:#6658dd" class="fa fa-briefcase"></i> Add Temple</h4>
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
                                                    <th>Temple</th>
                                                    <th>Contact</th>
                                                    <th>eMail</th>
                                                    <th>Address</th>
                                                    <th>Landline</th>
                                                    <th>Image</th>
                                                    <th>Description</th>
                                                    <th>Offer</th>
                                                    <th>Working Hours</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
										$query = mysqli_query($con, "select * from temple;");
										$count=mysqli_num_rows($query);
										for($i=1;$i<=$count;$i++)
										{
											if($count>0)
											{
												$row=mysqli_fetch_array($query);
												echo "<tr ><td>" . $i.  "</td>";
												echo "<td><a class='btn btn-primary' href='addoffer.php?id=".$row['id']."'><span class='fa fa-pen-nib'></span></a> | <a class='btn btn-danger' href='delete.php?userid=".$row['id']."' onClick=\"javascript: return confirm('Are you sure you want to delete ".$row['name']."');\"><span class='fa fa-times'></span></a></td>";
												echo "<td>". $row['name'] . "<br>(". $row['incharge'] . ")</td>";
												echo "<td>". $row['contact'] . "<br>(". $row['altcontact'] . ")</td>";
												echo "<td>". $row['email'] . "<br>(". $row['website'] . ")</td>";
												echo "<td>". $row['address'] . ", ". $row['area'] . ", ". $row['ward'] . ", ". $row['city'] . ", ". $row['state'] . ", ". $row['pincode'] . ", ". $row['landmark'] . "</td>";
												echo "<td>". $row['landline'] . "</td>";
												echo "<td><img src='../uploads/". $row['templeimage'] . "' width='80px'></td>";
												echo "<td>". $row['templedescription'] . "</td>";
												echo "<td>". $row['templeoffer'] . "</td>";
												echo "<td>". $row['workingfrom'] . " to ". $row['workingto'] . "</td>";
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