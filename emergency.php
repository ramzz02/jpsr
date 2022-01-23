<?php 
	include("header.php");
	$query = mysqli_query($con,"select * from emergency");
	?>
<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb style2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-6">
				<div class="breadcrumb_content">
					<h2 class="breadcrumb_title">Emergency Contacts</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Emergency Helpline Contacts</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Main Blog Post Content -->
<section class="blog_post_container pb80">
	<div class="container">
	    				<div class="row">
			<div class="col-lg-4" style="border-right:1px solid #ccc">
						<h2 align="center" class="text-thm">General Helpline</h2><hr><br>
				<div class="row">
					<?php
						while($row=mysqli_fetch_array($query))
						{
								if($row["type"] == 'public')
								{
								?>
						<div class="col-md-6 col-lg-6 col-xl-6">
						<h3 class="text-thm" align="center"><?php echo $row['title']; ?></h3>
							<div class="for_blog feat_property">
								<div class="thumb">
									<div class="tag bgc-thm"><a class="text-white" href="#"><?php echo $row['title']; ?></a></div>
									<img class="img-whp" src="uploads/<?php echo $row['image']; ?>" alt="1.jpg">
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="bp_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-avatar mr10"></span>Call: <?php echo $row['contact']; ?></a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-date mr10"></span>Location: <?php echo $row['location']; ?></a></li>
											</ul>
										</div>
										<h4><?php echo $row['description']; ?></h4>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
						}
					?>
				</div>
			</div>
			<div class="col-lg-4" style="border-right:1px solid #ccc">
									<h2 align="center" class="text-thm">Local Helpline</h2><hr><br>
				<div class="row">
					<?php
						$count=mysqli_num_rows($query);
						for($i=1;$i<=$count;$i++)
						{
							if($count>0)
							{
								$row=mysqli_fetch_array($query);
								if($row["type"] == 'private')
								{
								?>
						<div class="col-md-6 col-lg-4 col-xl-4">
							<div class="for_blog feat_property">
								<div class="thumb">
									<div class="tag bgc-thm"><a class="text-white" href="#"><?php echo $row['title']; ?></a></div>
									<img class="img-whp" src="uploads/<?php echo $row['image']; ?>" alt="1.jpg">
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="bp_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-avatar mr10"></span> <?php echo $row['contact']; ?></a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-date mr10"></span> <?php echo $row['location']; ?></a></li>
											</ul>
										</div>
										<h4><?php echo $row['description']; ?></h4>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
							}
						}
					?>
				</div>
			</div>
			<div class="col-lg-4">
									<h2 align="center" class="text-thm">Private Helpline</h2><hr><br>
				<div class="row">
					<?php
						$count=mysqli_num_rows($query);
						for($i=1;$i<=$count;$i++)
						{
							if($count>0)
							{
								$row=mysqli_fetch_array($query);
								if($row["type"] == 'private')
								{
								?>
						<div class="col-md-6 col-lg-4 col-xl-4">
							<div class="for_blog feat_property">
								<div class="thumb">
									<div class="tag bgc-thm"><a class="text-white" href="#"><?php echo $row['title']; ?></a></div>
									<img class="img-whp" src="uploads/<?php echo $row['image']; ?>" alt="1.jpg">
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="bp_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-avatar mr10"></span> <?php echo $row['contact']; ?></a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-date mr10"></span> <?php echo $row['location']; ?></a></li>
											</ul>
										</div>
										<h4><?php echo $row['description']; ?></h4>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<?php include("footer.php");?>