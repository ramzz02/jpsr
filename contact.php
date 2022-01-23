<?php include("header.php");?>
	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">Contact Us</h2>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Contact -->
	<section class="our-contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="contact_info_widget mb30-smd">
						<img src="images/logo.png" width="200px">
						<!--h3 class="m_title">JPSR</h3-->
						<hr>
						<div class="ciw_box mb50">
							<h4 class="title">Hosur</h4>
							<ul class="list-unstyled">
								<li class="df"><span class="flaticon-pin mr15"></span><a href="#">Hosur, Tamilnadu</a></li>
								<li><span class="flaticon-email mr15"></span><a href="#">info@jpsr.in</a></li>
							</ul>
							<a class="tdu text-thm direction" href="#">Get Direction</a>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="form_grid">
						<h3 class="title mb5">Get in touch with us</h3>
			            <form class="contact_form" id="contact_form" name="contact_form" action="#" method="post" novalidate="novalidate">
							<div class="row">
				                <div class="col-md-12">
				                    <div class="form-group">
										<input id="form_name" name="form_name" class="form-control" required="required" type="text" placeholder="Name">
									</div>
				                </div>
				                <div class="col-md-12">
				                    <div class="form-group">
				                    	<input id="form_email" name="form_email" class="form-control required email" required="required" type="email" placeholder="Email">
				                    </div>
				                </div>
				                <div class="col-md-12">
				                    <div class="form-group">
				                    	<input id="form_phone" name="form_phone" class="form-control required phone" required="required" type="text" placeholder="Phone">
				                    </div>
				                </div>
				                <div class="col-sm-12">
		                            <div class="form-group">
		                                <textarea id="form_message" name="form_message" class="form-control required" rows="8" required="required" placeholder="Your Message"></textarea>
		                            </div>
				                    <div class="form-group mb0">
					                    <button type="button" class="btn btn-lg btn-thm">Send Message</button>
				                    </div>
				                </div>
			                </div>
			            </form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="our-map p0">
		<div class="container-fluid p0">
			<div class="row">
				<div class="col-lg-12">
					<div class="h600"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15567.113305921956!2d77.8243036!3d12.7278794!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8e15fc482952572!2sJpsr%20enterprises!5e0!3m2!1sen!2sin!4v1624812673225!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
				</div>
			</div>
		</div>
	</section>
<?php include("footer.php");?>