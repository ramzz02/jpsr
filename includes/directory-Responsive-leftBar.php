<div class="row">
    <div class="col-lg-12">
		<div class="dn db-lg mt10 mb0 tac-767">
			<div id="main2">
				<span id="open2" class="fa filter_open_btn style2"><i class="fa fa-filter"></i> Service Category</span>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="listing_sidebar dn db-lg">
			<div class="sidebar_content_details style3">
				<div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
					<div class="sidebar_advanced_search_widget">
						<h4 class="mb25">Advanced Search <a class="filter_closed_btn float-right" href="#"><small>Hide Filter</small> <span class="flaticon-close"></span></a></h4>
						<form class="bgc-white bgct-767 pl30 pt10 pl0-767" method="post" autocomplete="off" >
							<ul class="sasw_list style2 mb0">
								<li class="search_area">
								    <div class="form-group">
								    	<input type="text" class="form-control" name="keyw" id="keyw_text" placeholder="What are you looking for">
								    </div>
								</li>

								<li>
									<div class="search_option_two">
										<div class="sidebar_select_options">
											<select class="selectpicker w100 show-tick" name="business_category" id="business_category">
												<option value="" > Select Categories</option>
												<?php foreach($getcategorys as $getcategory){ ?>
												<option value="<?php echo $getcategory['id']; ?>"><?php echo $getcategory['category_name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</li>
								<li>
									<div class="search_option_button text-center mt25">
									    <button type="submit" name="directory_searchlist" class="btn btn-block btn-thm mb15">Search</button>
									</div>
								</li>
							</ul>
						</form>
						<br>
						<h4 class="title">Business Directory</h4><hr>
						<ul class="list_details order_list list-style-type-bullet">
							<li><a href="business-directory.php">Business Directory</a></li>
							<li><a href="#">Bus Timings</a></li>
							<li><a href="http://www.tneb.in/">Electricity Board (TNEB)</a></li>
							<li><a href="#">Essential & Emergency Services</a></li>
							<li><a href="#">Government Office & Officers Number</a></li>
							<li><a href="https://www.tnurbantree.tn.gov.in/hosur/">Municipal Corporation</a></li>
							<li><a href="TemplesList">Temples</a></li>
							<li><a href="#">Train Timings</a></li>
							<li><a href="#">Govt Links</a>
								<ul>
									<li><a href="https://uidai.gov.in/my-aadhaar/get-aadhaar.html" target="_blank">Aadhaar</a></li>
									<li><a href="https://applypanindia.com/" target="_blank">Pancard</a></li>
									<li><a href="https://org2.passportindia.gov.in/" target="_blank">Passport</a></li>
									<li><a href="https://www.incometaxindiaefiling.gov.in/" target="_blank">Income Tax</a></li>
									<li><a href="https://www.tnpds.gov.in/" target="_blank">Ration Card</a></li>
									<li><a href="https://www.nvsp.in/" target="_blank">Voters ID</a></li>
									<li><a href="https://tnsta.gov.in/" target="_blank">RTO</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>