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
								<a href="addad.php" class="btn btn-primary text-white"><i class="fa fa-plus-circle"></i> Add New News Report</a>
                            </div>
                            <h4 class="page-title"> &nbsp; <i style="color:#6658dd" class="fa fa-briefcase"></i> Add News Report</h4>
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
                                                    <th>Language</th>
                                                    <th>Category</th>
                                                    <th>Contact</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Photo</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
										$query = mysqli_query($con, "select * from newsreport;");
										$count=mysqli_num_rows($query);
										for($i=1;$i<=$count;$i++)
										{
											if($count>0)
											{
												$row=mysqli_fetch_array($query);
												echo "<tr ><td>" . $i.  "</td>";
												echo "<td><a class='btn btn-primary' href='addnewsreport.php?id=".$row['id']."'><span class='fa fa-pen-nib'></span></a> | <a class='btn btn-danger' href='delete.php?userid=".$row['id']."' onClick=\"javascript: return confirm('Are you sure you want to delete ".$row['title']."');\"><span class='fas fa-trash-alt'></span></a></td>";
												echo "<td>". $row['language'] . "</td>";
												echo "<td>". $row['category'] . "</td>";
												echo "<td>". $row['contact'] . "</td>";
												echo "<td>". $row['title'] . "</td>";
												echo "<td>". $row['newsdescription'] . "</td>";
												echo "<td><img src='../uploads/". $row['newsimage'] . "' width='80px'></td>";
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