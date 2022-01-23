<?php include("header.php");?>
	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f4 ovh">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="dashboard_navigationbar dn db-992">
						<div class="dropdown">
							<button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
							<ul id="myDropdown" class="dropdown-content">
								<li><a href="page-my-dashboard.html"><span class="flaticon-web-page"></span> Dashboard</a></li>
								<li><a href="page-profile.html"><span class="flaticon-avatar"></span> My Profile</a></li>
								<li><a href="page-my-listing.html"><span class="flaticon-list"></span> My Listings</a></li>
								<li><a href="page-my-bookmark.html"><span class="flaticon-love"></span> Bookmarks</a></li>
								<li><a href="page-message.html"><span class="flaticon-chat"></span> Message</a></li>
								<li><a href="page-my-review.html"><span class="flaticon-note"></span> Reviews</a></li>
								<li class="active"><a href="page-add-new-listing.html"><span class="flaticon-web-page"></span> Add New Listing</a></li>
								<li><a href="page-my-logout.html"><span class="flaticon-logout"></span> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-12 mb10">
					<div class="breadcrumb_content style2 mb25">
						<h2 class="breadcrumb_title text-thm"><i class="fa fa-briefcase"></i> Refer & Earn Money</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
				<form action="add.php" method="post" enctype="multipart/form-data" autocomplete="off">
					<?php
											if($username == '')
											{
											?>
											<a data-toggle="modal" data-target=".bd-example-modal-lg">
											<?php
											}
											else
											{
											    ?>
					<div class="my_dashboard_review mt30">
						<div class="row">
							<div class="col-lg-12">
								<h4 class="mb30 text-thm">Reference Details</h4><hr>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Reference Person Contact Number <span class="text-danger">*</span></label>
							    	<input type="number" maxlength="10" value="<?php if(isset($username)){ echo $username; }?>" readonly class="form-control" id="listingPlace" placeholder="Enter the details here">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_setting_input form-group">
							    	<label for="listingPlace">Referred By <span class="text-danger">*</span></label>
							    	<input type="text" class="form-control" id="listingPlace" value="<?php if(isset($username)){ echo $names; }?>" readonly placeholder="Enter the details here">
								</div>
							</div>
						</div>
					</div>
					<div class="my_dashboard_review mt30">
						<div class="row">
							<div class="col-lg-12">
								<h4 class="mb30 text-thm">Referal Bonus</h4><hr>
							</div>
							<style>
	table, th, td {
  border: 1px solid black;
  padding:20px 40px;
}
	</style>
							<div class="col-lg-12">
							<table class="table" align="center">
										<tr class="thead-light">
											<th><i class="fa fa-sort-numeric-asc"></i> S NO</th>
											<th><i class="fa fa-sort-briefcase"></i> Business Name</th>
											<th><i class="fa fa-calendar"></i> Refer Date</th>
											<th><i class="fa fa-rupee"></i>  Cash</th>
											<th><i class="fa fa-edit"></i> Status</th></tr>
											<tbody>
										<tr><th colspan="4" style="text-align:right">Total: </th><td colspan="2">₹ 0.00</td></tr></tbody>
										</table>
							</div>
						</div>
					</div><br>
											    <?php
											}
											?>
					<div class="my_dashboard_review">
							<div class="row">
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" required name="name" placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Proprietor (or) Authorized person name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" required name="proprietor" placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Contact Number <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="contact" required maxlength="10" required parrern="\d*" placeholder="Enter the details here">
									</div>
								</div>
																<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Category <span class="text-danger">*</span></label>
										<select class="selectpicker" required data-live-search="true" name="category" data-width="100%">
											<option selected disabled>Select Categories</option>
<option value="3d Theaters">3d Theaters</option>
<option value="4d Theaters">4d Theaters</option>
<option value="Abacus Classes">Abacus Classes</option>
<option value="Abrasive Dealers">Abrasive Dealers</option>
<option value="Abundant Life Churches">Abundant Life Churches</option>
<option value="AC Repairs &Services">AC Repairs &Services</option>
<option value="Accommodation">Accommodation</option>
<option value="Acupuncture">Acupuncture</option>
<option value="Adhesive">Adhesive</option>
<option value="Adoption Centres">Adoption Centres</option>
<option value="Adventure Clubs">Adventure Clubs</option>
<option value="Advertising">Advertising</option>
<option value="Advertising Agencies">Advertising Agencies</option>
<option value="Advocates">Advocates</option>
<option value="Aerobics">Aerobics</option>
<option value="Aeronautical Engineering Colleges">Aeronautical Engineering Colleges</option>
<option value="Air And Train Ambulance Services">Air And Train Ambulance Services</option>
<option value="Air Cargo Agents">Air Cargo Agents</option>
<option value="Air Conditioners">Air Conditioners</option>
<option value="Air Coolers">Air Coolers</option>
<option value="Air Hostess Training Institutes">Air Hostess Training Institutes</option>
<option value="Air Pollution Control Equipment Dealers">Air Pollution Control Equipment Dealers</option>
<option value="Alliance Churches">Alliance Churches</option>
<option value="Alloy, Iron & Steel Industries">Alloy, Iron & Steel Industries</option>
<option value="Alternative Fuels Stations">Alternative Fuels Stations</option>
<option value="Alternative Medicines">Alternative Medicines</option>
<option value="Aluminium Extrusion Industry">Aluminium Extrusion Industry</option>
<option value="Ambulance Services">Ambulance Services</option>
<option value="Ammonia Gas Dealers">Ammonia Gas Dealers</option>
<option value="Amusement Parks">Amusement Parks</option>
<option value="Anglican Churches">Anglican Churches</option>
<option value="Animation Training Institutes">Animation Training Institutes</option>
<option value="Apostolic Churches">Apostolic Churches</option>
<option value="Apparels & Accessories">Apparels & Accessories</option>
<option value="Apple Product Repair">Apple Product Repair</option>
<option value="Aquarium">Aquarium</option>
<option value="Architects">Architects</option>
<option value="Area Rugs & Mats">Area Rugs & Mats</option>
<option value="Armenian Churches">Armenian Churches</option>
<option value="Arms & Ammunition Dealer">Arms & Ammunition Dealer</option>
<option value="Arms And Ammunitions">Arms And Ammunitions</option>
<option value="Art Gallery">Art Gallery</option>
<option value="Art Paintings">Art Paintings</option>
<option value="Artificial Grass">Artificial Grass</option>
<option value="Artificial Turf">Artificial Turf</option>
<option value="Arts & Craft Classes">Arts & Craft Classes</option>
<option value="Astrologers">Astrologers</option>
<option value="ATM Centres">ATM Centres</option>
<option value="Audio Video Systems">Audio Video Systems</option>
<option value="Auditoriums">Auditoriums</option>
<option value="Auto Dealers">Auto Dealers</option>
<option value="Auto Service Centres">Auto Service Centres</option>
<option value="Automobile Engine Oil Dealers">Automobile Engine Oil Dealers</option>
<option value="Automobiles">Automobiles</option>
<option value="Aviation Academies">Aviation Academies</option>
<option value="Ayurvedic Food">Ayurvedic Food</option>
<option value="Ayurvedic Medicines">Ayurvedic Medicines</option>
<option value="Ayurvedic Treatment">Ayurvedic Treatment</option>
<option value="B 2 B">B 2 B</option>
<option value="B Pharmacy Colleges">B Pharmacy Colleges</option>
<option value="B.Ed. Colleges">B.Ed. Colleges</option>
<option value="Baby Foods">Baby Foods</option>
<option value="Baby Store">Baby Store</option>
<option value="Bakeries">Bakeries</option>
<option value="Bakery Equipments">Bakery Equipments</option>
<option value="Balloon Decorations">Balloon Decorations</option>
<option value="Bamboo Flooring">Bamboo Flooring</option>
<option value="Bangles">Bangles</option>
<option value="Banks">Banks</option>
<option value="Banquet Halls">Banquet Halls</option>
<option value="Baptist Churches">Baptist Churches</option>
<option value="Bar Coding Machine Dealer">Bar Coding Machine Dealer</option>
<option value="Bars">Bars</option>
<option value="Bathroom Linen">Bathroom Linen</option>
<option value="Battery Dealers">Battery Dealers</option>
<option value="BDS Colleges">BDS Colleges</option>
<option value="Bean Bags">Bean Bags</option>
<option value="Beautician Training Institutes">Beautician Training Institutes</option>
<option value="Beauty & Wellness">Beauty & Wellness</option>
<option value="Beauty And Cosmetic Products">Beauty And Cosmetic Products</option>
<option value="Beauty Parlours">Beauty Parlours</option>
<option value="Bed Linen">Bed Linen</option>
<option value="Bed Room Furniture">Bed Room Furniture</option>
<option value="Beef Shops">Beef Shops</option>
<option value="Belts & Wallets">Belts & Wallets</option>
<option value="Bicycle Stores">Bicycle Stores</option>
<option value="Bike Rentals">Bike Rentals</option>
<option value="Billing Machine Dealers">Billing Machine Dealers</option>
<option value="Binding">Binding</option>
<option value="Binoculars & Telescope">Binoculars & Telescope</option>
<option value="Birth Certificate Offices">Birth Certificate Offices</option>
<option value="Blocks Material">Blocks Material</option>
<option value="Blood Donation Centres">Blood Donation Centres</option>
<option value="Blow Moulding Machine Dealer">Blow Moulding Machine Dealer</option>
<option value="Body Massage Parlours">Body Massage Parlours</option>
<option value="Boilers">Boilers</option>
<option value="Book Publishers">Book Publishers</option>
<option value="Books Stores">Books Stores</option>
<option value="Bore Well Drilling">Bore Well Drilling</option>
<option value="Boutiques">Boutiques</option>
<option value="Bowling">Bowling</option>
<option value="Brick Materials">Brick Materials</option>
<option value="Bridal Makeup">Bridal Makeup</option>
<option value="Budget Hotels">Budget Hotels</option>
<option value="Building and Construction">Building and Construction</option>
<option value="Building Demolition">Building Demolition</option>
<option value="Building Materials">Building Materials</option>
<option value="Bulk SMS Modems">Bulk SMS Modems</option>
<option value="Bulk Sms Services">Bulk Sms Services</option>
<option value="Burqa Retailers">Burqa Retailers</option>
<option value="Business Cards">Business Cards</option>
<option value="Business Consultants">Business Consultants</option>
<option value="Business Hotels">Business Hotels</option>
<option value="CA & ICWA Training Institutes">CA & ICWA Training Institutes</option>
<option value="Cable Manufacturers">Cable Manufacturers</option>
<option value="Cable Tv Operators">Cable Tv Operators</option>
<option value="Cabs Services">Cabs Services</option>
<option value="Cafes">Cafes</option>
<option value="Cake Shops">Cake Shops</option>
<option value="Calvary Chapel Churches">Calvary Chapel Churches</option>
<option value="Camera Accessories">Camera Accessories</option>
<option value="Camera Lens">Camera Lens</option>
<option value="Cameras">Cameras</option>
<option value="Candles">Candles</option>
<option value="Caps & Hats">Caps & Hats</option>
<option value="Car Ac Repairs">Car Ac Repairs</option>
<option value="Car Accessories">Car Accessories</option>
<option value="Car Dealers">Car Dealers</option>
<option value="Car Rentals">Car Rentals</option>
<option value="Car Repairs & Services">Car Repairs & Services</option>
<option value="Carbon Dioxide Gas Dealers">Carbon Dioxide Gas Dealers</option>
<option value="Cargo & Logistics">Cargo & Logistics</option>
<option value="Cargo Agents">Cargo Agents</option>
<option value="Carpenters">Carpenters</option>
<option value="Carpet & Rugs">Carpet & Rugs</option>
<option value="Carpet And Carpet Tiles">Carpet And Carpet Tiles</option>
<option value="Casual Dining">Casual Dining</option>
<option value="Catering Services">Catering Services</option>
<option value="Catholic Churches">Catholic Churches</option>
<option value="CBSC Schools">CBSC Schools</option>
<option value="Cement Materials">Cement Materials</option>
<option value="Central Government Offices">Central Government Offices</option>
<option value="Centreing Materials">Centreing Materials</option>
<option value="Chairs">Chairs</option>
<option value="Chandeliers">Chandeliers</option>
<option value="Charitable Trusts">Charitable Trusts</option>
<option value="Chartered Accountants">Chartered Accountants</option>
<option value="Chartered Bus">Chartered Bus</option>
<option value="Chat & Snacks">Chat & Snacks</option>
<option value="Chicken Shops">Chicken Shops</option>
<option value="Children Wear">Children Wear</option>
<option value="Children's Hospitals">Children's Hospitals</option>
<option value="Chimneys">Chimneys</option>
<option value="Chips & Snacks Shops">Chips & Snacks Shops</option>
<option value="Chit Funds">Chit Funds</option>
<option value="Chocolate Shops">Chocolate Shops</option>
<option value="Churches">Churches</option>
<option value="Cinema Theaters">Cinema Theaters</option>
<option value="Citric Acid Dealers">Citric Acid Dealers</option>
<option value="City Clerk Offices">City Clerk Offices</option>
<option value="City Government Offices">City Government Offices</option>
<option value="Civil Contractors">Civil Contractors</option>
<option value="Cleaning Tools & Accessories">Cleaning Tools & Accessories</option>
<option value="Clinics">Clinics</option>
<option value="Clocks">Clocks</option>
<option value="Cloud Software">Cloud Software</option>
<option value="Clubs">Clubs</option>
<option value="CNG Pump Stations">CNG Pump Stations</option>
<option value="Coarse Aggregates">Coarse Aggregates</option>
<option value="Commercial Kitchen Equipment Dealers">Commercial Kitchen Equipment Dealers</option>
<option value="Communication">Communication</option>
<option value="Competitive Exams">Competitive Exams</option>
<option value="Computer Accessories & Peripherals">Computer Accessories & Peripherals</option>
<option value="Computers">Computers</option>
<option value="Computers, Tablets & Mobiles">Computers, Tablets & Mobiles</option>
<option value="Conference Hall">Conference Hall</option>
<option value="Construction & Renovation">Construction & Renovation</option>
<option value="Construction Companies">Construction Companies</option>
<option value="Consultants">Consultants</option>
<option value="Contact Lenses">Contact Lenses</option>
<option value="Content Writers">Content Writers</option>
<option value="Contractors">Contractors</option>
<option value="Convention Centres">Convention Centres</option>
<option value="Cooking Classes">Cooking Classes</option>
<option value="Cooks On Hire">Cooks On Hire</option>
<option value="Cooktops">Cooktops</option>
<option value="Cookware">Cookware</option>
<option value="Corporate Catering Services">Corporate Catering Services</option>
<option value="Corporate Gifts">Corporate Gifts</option>
<option value="Cosmetic Surgery">Cosmetic Surgery</option>
<option value="Couriers">Couriers</option>
<option value="Courts">Courts</option>
<option value="CPAP & BIPAP Systems">CPAP & BIPAP Systems</option>
<option value="Crackers">Crackers</option>
<option value="Crane Services">Crane Services</option>
<option value="Cremation Grounds">Cremation Grounds</option>
<option value="Cremation Services">Cremation Services</option>
<option value="Curtain Accessories">Curtain Accessories</option>
<option value="Cushion & Cushion Covers">Cushion & Cushion Covers</option>
<option value="Cutlery">Cutlery</option>
<option value="Dance Academies">Dance Academies</option>
<option value="Dead Body Freezer Box On Hire">Dead Body Freezer Box On Hire</option>
<option value="Decor & Lightings">Decor & Lightings</option>
<option value="Decor & Show Pieces">Decor & Show Pieces</option>
<option value="Decoration Materials">Decoration Materials</option>
<option value="Degree Colleges">Degree Colleges</option>
<option value="Dental Clinics">Dental Clinics</option>
<option value="Designing & Wood Carving">Designing & Wood Carving</option>
<option value="Detective Agencies">Detective Agencies</option>
<option value="Dhaba">Dhaba</option>
<option value="Diagnostic Centres">Diagnostic Centres</option>
<option value="Diesel Gas Stations">Diesel Gas Stations</option>
<option value="Dietician">Dietician</option>
<option value="Digital Cameras">Digital Cameras</option>
<option value="Digital Printers">Digital Printers</option>
<option value="Digital Weighing Scale Dealers">Digital Weighing Scale Dealers</option>
<option value="Dining">Dining</option>
<option value="Dining Room Furniture">Dining Room Furniture</option>
<option value="Dining Sets">Dining Sets</option>
<option value="Disc Jockey Training Institutes">Disc Jockey Training Institutes</option>
<option value="Dishwasher">Dishwasher</option>
<option value="Diwan Sets">Diwan Sets</option>
<option value="Doctors">Doctors</option>
<option value="Dog Training">Dog Training</option>
<option value="Doors, Windows & Partitions">Doors, Windows & Partitions</option>
<option value="Drama Theaters">Drama Theaters</option>
<option value="Dress Materials">Dress Materials</option>
<option value="Drilling Equipments">Drilling Equipments</option>
<option value="Driver Service Agents">Driver Service Agents</option>
<option value="Dry Fruits">Dry Fruits</option>
<option value="Dry Ice Dealer">Dry Ice Dealer</option>
<option value="DSLR Cameras">DSLR Cameras</option>
<option value="DTP Services">DTP Services</option>
<option value="Dvd & Vcd">Dvd & Vcd</option>
<option value="Eastern Orthodox Churches">Eastern Orthodox Churches</option>
<option value="Education">Education</option>
<option value="Education Colleges">Education Colleges</option>
<option value="Education Consultants">Education Consultants</option>
<option value="Education Councils & Board Offices">Education Councils & Board Offices</option>
<option value="Education Schools">Education Schools</option>
<option value="Egg Shops">Egg Shops</option>
<option value="Electrical Contractors">Electrical Contractors</option>
<option value="Electrical Sub-Stations">Electrical Sub-Stations</option>
<option value="Electrical Suppliers">Electrical Suppliers</option>
<option value="Electricians">Electricians</option>
<option value="Electronic Accessories">Electronic Accessories</option>
<option value="Electronic Display Boards Manufacturer">Electronic Display Boards Manufacturer</option>
<option value="Electronic Weighing Scale Dealers">Electronic Weighing Scale Dealers</option>
<option value="Electronics">Electronics</option>
<option value="Elevators">Elevators</option>
<option value="Email Marketing">Email Marketing</option>
<option value="Embroidery Works">Embroidery Works</option>
<option value="Emergency Services">Emergency Services</option>
<option value="Engineering Colleges">Engineering Colleges</option>
<option value="ENT Hospitals">ENT Hospitals</option>
<option value="Entrance Exams Coaching Centres">Entrance Exams Coaching Centres</option>
<option value="Establishments">Establishments</option>
<option value="Ethnic Wear">Ethnic Wear</option>
<option value="Evangelical Churches">Evangelical Churches</option>
<option value="Event Decorators">Event Decorators</option>
<option value="Event Management">Event Management</option>
<option value="Event Organizers">Event Organizers</option>
<option value="Event Venues">Event Venues</option>
<option value="Events Catering Services">Events Catering Services</option>
<option value="Excavation">Excavation</option>
<option value="Eye Hospitals">Eye Hospitals</option>
<option value="Eyeglasses">Eyeglasses</option>
<option value="Fabrication & Welding Works">Fabrication & Welding Works</option>
<option value="False Ceiling">False Ceiling</option>
<option value="Family Clubs">Family Clubs</option>
<option value="Fans">Fans</option>
<option value="Farm Houses">Farm Houses</option>
<option value="Fashion Designers">Fashion Designers</option>
<option value="Fashion Designing Training Institutes">Fashion Designing Training Institutes</option>
<option value="Fast Food Centre">Fast Food Centre</option>
<option value="Fertility & Infertility Clinics">Fertility & Infertility Clinics</option>
<option value="Fertilizer & Soil">Fertilizer & Soil</option>
<option value="Film And Television Institute Of India">Film And Television Institute Of India</option>
<option value="Film Studios">Film Studios</option>
<option value="Financial Planners">Financial Planners</option>
<option value="Financial Services">Financial Services</option>
<option value="Fine Dining">Fine Dining</option>
<option value="Fire Alarms">Fire Alarms</option>
<option value="Fire And Safety Course Training">Fire And Safety Course Training</option>
<option value="Fire Extinguishers">Fire Extinguishers</option>
<option value="Fire Protection Systems">Fire Protection Systems</option>
<option value="Fire Safety Equipments">Fire Safety Equipments</option>
<option value="Fire Stations">Fire Stations</option>
<option value="Fish & Sea Food Shops">Fish & Sea Food Shops</option>
<option value="Fitness Centres">Fitness Centres</option>
<option value="Flex Printing Services">Flex Printing Services</option>
<option value="Flooring">Flooring</option>
<option value="Flooring Installations">Flooring Installations</option>
<option value="Flooring Tools & Materials">Flooring Tools & Materials</option>
<option value="Florists">Florists</option>
<option value="Flower Decorations">Flower Decorations</option>
<option value="Food & Beverage Outlets">Food & Beverage Outlets</option>
<option value="Food & Beverages">Food & Beverages</option>
<option value="Food Courts">Food Courts</option>
<option value="Food Machinery Manufacturer">Food Machinery Manufacturer</option>
<option value="Food Processing Equipment Manufacturer">Food Processing Equipment Manufacturer</option>
<option value="Food Stores">Food Stores</option>
<option value="Footwear">Footwear</option>
<option value="Foreign Exchange">Foreign Exchange</option>
<option value="Foursquare Churches">Foursquare Churches</option>
<option value="Frames">Frames</option>
<option value="Fruit Juice Processing Machine Manufacture">Fruit Juice Processing Machine Manufacture</option>
<option value="Fruits">Fruits</option>
<option value="Full Gospel Churches">Full Gospel Churches</option>
<option value="Function Halls">Function Halls</option>
<option value="Funeral Band">Funeral Band</option>
<option value="Funeral Materials">Funeral Materials</option>
<option value="Furnishings">Furnishings</option>
<option value="Furniture">Furniture</option>
<option value="Furniture on Hire">Furniture on Hire</option>
<option value="Furniture Storage">Furniture Storage</option>
<option value="Gaming Centres">Gaming Centres</option>
<option value="Gardening Tools">Gardening Tools</option>
<option value="Garments">Garments</option>
<option value="Gas Dealers">Gas Dealers</option>
<option value="Gas Stations">Gas Stations</option>
<option value="Gemological Institute Of India">Gemological Institute Of India</option>
<option value="General Hospitals">General Hospitals</option>
<option value="General order suppliers">General order suppliers</option>
<option value="General Pharmacies">General Pharmacies</option>
<option value="GI Pipe Dealer">GI Pipe Dealer</option>
<option value="Gifts And Novelties">Gifts And Novelties</option>
<option value="Glass Fitting Hardware">Glass Fitting Hardware</option>
<option value="Glasswares">Glasswares</option>
<option value="Go Karting">Go Karting</option>
<option value="Goldsmiths">Goldsmiths</option>
<option value="Gospel Churches">Gospel Churches</option>
<option value="Government Hospitals">Government Hospitals</option>
<option value="Government Offices">Government Offices</option>
<option value="Graphic Designers">Graphic Designers</option>
<option value="GRE & TOEFL Coaching Centres">GRE & TOEFL Coaching Centres</option>
<option value="Greek Orthodox Churches">Greek Orthodox Churches</option>
<option value="Groceries">Groceries</option>
<option value="Groundwater Surveyors">Groundwater Surveyors</option>
<option value="Guest Houses">Guest Houses</option>
<option value="Gurudwaras">Gurudwaras</option>
<option value="Gyeser/Water Heater Repair">Gyeser/Water Heater Repair</option>
<option value="Gymnasium">Gymnasium</option>
<option value="Gymnasium Equipments">Gymnasium Equipments</option>
<option value="Hair Fall Treatments">Hair Fall Treatments</option>
<option value="Hair Stylists">Hair Stylists</option>
<option value="Hair Transplantation">Hair Transplantation</option>
<option value="Hair Treatments">Hair Treatments</option>
<option value="Hall Decorations">Hall Decorations</option>
<option value="Handicraft Items">Handicraft Items</option>
<option value="Handlooms">Handlooms</option>
<option value="Hardware And Network Training Institutes">Hardware And Network Training Institutes</option>
<option value="Hardware And Networking">Hardware And Networking</option>
<option value="Hardware Stores">Hardware Stores</option>
<option value="Hardware Tools">Hardware Tools</option>
<option value="Hardwood Flooring">Hardwood Flooring</option>
<option value="HD Cameras">HD Cameras</option>
<option value="Health">Health</option>
<option value="Health Clubs">Health Clubs</option>
<option value="Hearse Services">Hearse Services</option>
<option value="Heavy Vehicle Dealers">Heavy Vehicle Dealers</option>
<option value="Helmet Dealers">Helmet Dealers</option>
<option value="Hispanic Churches">Hispanic Churches</option>
<option value="Home Appliances">Home Appliances</option>
<option value="Home Builders">Home Builders</option>
<option value="Home Delivery Restaurants">Home Delivery Restaurants</option>
<option value="Home Furniture">Home Furniture</option>
<option value="Home Needs">Home Needs</option>
<option value="Home Theater Systems">Home Theater Systems</option>
<option value="Homeopathy Clinics">Homeopathy Clinics</option>
<option value="Homeopathy Medicines">Homeopathy Medicines</option>
<option value="Hosiery Store">Hosiery Store</option>
<option value="Hospitals">Hospitals</option>
<option value="Hotels">Hotels</option>
<option value="House Painters">House Painters</option>
<option value="Housekeeping Services">Housekeeping Services</option>
<option value="Hr Consultancies">Hr Consultancies</option>
<option value="Hydraulic & Pulley Equipment Dealers">Hydraulic & Pulley Equipment Dealers</option>
<option value="Hydrochloric Acid Dealers">Hydrochloric Acid Dealers</option>
<option value="Hypermarkets">Hypermarkets</option>
<option value="IB Schools">IB Schools</option>
<option value="Ice Cream & Dessert Parlors">Ice Cream & Dessert Parlors</option>
<option value="ICSE Schools">ICSE Schools</option>
<option value="IGCSE Schools">IGCSE Schools</option>
<option value="Immigration Consultants">Immigration Consultants</option>
<option value="Income Tax Offices">Income Tax Offices</option>
<option value="Industrial Bearing Dealers">Industrial Bearing Dealers</option>
<option value="Industrial Belt Dealers">Industrial Belt Dealers</option>
<option value="Industrial Burner Dealers">Industrial Burner Dealers</option>
<option value="Industrial Chemical Dealers">Industrial Chemical Dealers</option>
<option value="Industrial Electronic Components Dealers">Industrial Electronic Components Dealers</option>
<option value="Industrial Equipments">Industrial Equipments</option>
<option value="Industrial Fan Dealers">Industrial Fan Dealers</option>
<option value="Industrial Fire Extinguisher Dealers">Industrial Fire Extinguisher Dealers</option>
<option value="industrial machine dealers">industrial machine dealers</option>
<option value="Industrial Safety Equipment Dealers">Industrial Safety Equipment Dealers</option>
<option value="Industrial Spring Dealers">Industrial Spring Dealers</option>
<option value="Industrial Trolleys Manufacturer">Industrial Trolleys Manufacturer</option>
<option value="Innerwear And Loungewear">Innerwear And Loungewear</option>
<option value="Institute Of Hotel Management">Institute Of Hotel Management</option>
<option value="Insurance Agents">Insurance Agents</option>
<option value="Interior Design Courses">Interior Design Courses</option>
<option value="Interior Designers">Interior Designers</option>
<option value="Internet Service Providers">Internet Service Providers</option>
<option value="Inverters">Inverters</option>
<option value="Investment Advisors">Investment Advisors</option>
<option value="Irrigation Equipment Dealers">Irrigation Equipment Dealers</option>
<option value="ITI Training">ITI Training</option>
<option value="Jain Temples">Jain Temples</option>
<option value="Jeans">Jeans</option>
<option value="Jewellery">Jewellery</option>
<option value="Jewellery Box Manufacturers">Jewellery Box Manufacturers</option>
<option value="Journalism Training Institutes">Journalism Training Institutes</option>
<option value="Juice Centre">Juice Centre</option>
<option value="Junior Colleges">Junior Colleges</option>
<option value="Kalyana Mandapam">Kalyana Mandapam</option>
<option value="Kennels">Kennels</option>
<option value="Kitchen & Dining">Kitchen & Dining</option>
<option value="Kitchen Storage Containers">Kitchen Storage Containers</option>
<option value="Lab Equipment And Chemical Suppliers">Lab Equipment And Chemical Suppliers</option>
<option value="Labor Contractors">Labor Contractors</option>
<option value="Laboratories">Laboratories</option>
<option value="Ladies Bags & Purses">Ladies Bags & Purses</option>
<option value="Ladies Dresses">Ladies Dresses</option>
<option value="Laminate Flooring">Laminate Flooring</option>
<option value="Language Training Institutes">Language Training Institutes</option>
<option value="Laptop Repair">Laptop Repair</option>
<option value="Laptops">Laptops</option>
<option value="Lathe Machine Dealers">Lathe Machine Dealers</option>
<option value="Laundry Services">Laundry Services</option>
<option value="Law Colleges">Law Colleges</option>
<option value="Lawn & Garden">Lawn & Garden</option>
<option value="Leather Goods Manufacturer">Leather Goods Manufacturer</option>
<option value="Legal & Financial Services">Legal & Financial Services</option>
<option value="Legal Services">Legal Services</option>
<option value="Libraries">Libraries</option>
<option value="Lifestyle Accessories">Lifestyle Accessories</option>
<option value="Lightings">Lightings</option>
<option value="Living Room Furniture">Living Room Furniture</option>
<option value="Loan Agencies">Loan Agencies</option>
<option value="Loan Agents">Loan Agents</option>
<option value="Local Government Offices">Local Government Offices</option>
<option value="Locks">Locks</option>
<option value="Lodges">Lodges</option>
<option value="Logistic Companies">Logistic Companies</option>
<option value="Logistics Services">Logistics Services</option>
<option value="Lounges">Lounges</option>
<option value="Luxury Hotels">Luxury Hotels</option>
<option value="Maggam Job Works">Maggam Job Works</option>
<option value="Makeup Artists">Makeup Artists</option>
<option value="Manufacturer of Power Generators">Manufacturer of Power Generators</option>
<option value="Marriage Bureaus">Marriage Bureaus</option>
<option value="Marriage Halls">Marriage Halls</option>
<option value="Mass Communication & Journalism Colleges">Mass Communication & Journalism Colleges</option>
<option value="Matching Centres">Matching Centres</option>
<option value="Maternity Hospitals">Maternity Hospitals</option>
<option value="Mattresses">Mattresses</option>
<option value="Meat & Poultry Shops">Meat & Poultry Shops</option>
<option value="Media Advertising">Media Advertising</option>
<option value="Medical Coding Training Institutes">Medical Coding Training Institutes</option>
<option value="Medical Colleges">Medical Colleges</option>
<option value="Medical Equipments">Medical Equipments</option>
<option value="Medical Stockings">Medical Stockings</option>
<option value="Meditation Centres">Meditation Centres</option>
<option value="Mehandi Artists">Mehandi Artists</option>
<option value="Mennonite Churches">Mennonite Churches</option>
<option value="Mens Hostels">Mens Hostels</option>
<option value="Mesh Dealers">Mesh Dealers</option>
<option value="Metal Industries">Metal Industries</option>
<option value="Methodist Churches">Methodist Churches</option>
<option value="Metro Rail Stations">Metro Rail Stations</option>
<option value="Microbreweries">Microbreweries</option>
<option value="Microwave Repairs">Microwave Repairs</option>
<option value="Military Recruiting Offices">Military Recruiting Offices</option>
<option value="Milk & Milk Products">Milk & Milk Products</option>
<option value="Mineral Water Suppliers">Mineral Water Suppliers</option>
<option value="Mobile Phones">Mobile Phones</option>
<option value="Mobile Repairs">Mobile Repairs</option>
<option value="Modular Furniture">Modular Furniture</option>
<option value="Modular Kitchen Dealers">Modular Kitchen Dealers</option>
<option value="Money Transfer Agencies">Money Transfer Agencies</option>
<option value="Montessori Training Institutes">Montessori Training Institutes</option>
<option value="Moravian Churches">Moravian Churches</option>
<option value="Morgues Services">Morgues Services</option>
<option value="Mormon Churches">Mormon Churches</option>
<option value="Mosques">Mosques</option>
<option value="Motor Driving Schools">Motor Driving Schools</option>
<option value="Mould Dies Manufacturer">Mould Dies Manufacturer</option>
<option value="Moving Media Ads">Moving Media Ads</option>
<option value="Mp3 Players">Mp3 Players</option>
<option value="MS Pipe Dealer">MS Pipe Dealer</option>
<option value="Multispecialty Hospitals">Multispecialty Hospitals</option>
<option value="Museums">Museums</option>
<option value="Music Academies">Music Academies</option>
<option value="Musical Instruments">Musical Instruments</option>
<option value="Mutton Shops">Mutton Shops</option>
<option value="Natural Flooring">Natural Flooring</option>
<option value="Nature Cure Centers">Nature Cure Centers</option>
<option value="Naturopathy">Naturopathy</option>
<option value="Network Securities">Network Securities</option>
<option value="Networking Devices">Networking Devices</option>
<option value="New Age Churches">New Age Churches</option>
<option value="Newspaper Ads">Newspaper Ads</option>
<option value="NGO Clubs">NGO Clubs</option>
<option value="NGOs & Social Service Organisations">NGOs & Social Service Organisations</option>
<option value="Night Clubs">Night Clubs</option>
<option value="Night Life">Night Life</option>
<option value="Night Wears">Night Wears</option>
<option value="Nitric Acid Dealers">Nitric Acid Dealers</option>
<option value="Notary Services">Notary Services</option>
<option value="Number Plate Manufacturers">Number Plate Manufacturers</option>
<option value="Nursing Colleges">Nursing Colleges</option>
<option value="Nutritional Supplement Dealers">Nutritional Supplement Dealers</option>
<option value="Office Furniture">Office Furniture</option>
<option value="Offices">Offices</option>
<option value="Offset Printers">Offset Printers</option>
<option value="Old Age Homes">Old Age Homes</option>
<option value="Old Cut Notes Exchange Services">Old Cut Notes Exchange Services</option>
<option value="Online Classes">Online Classes</option>
<option value="Optics & Eyewear">Optics & Eyewear</option>
<option value="Organ Donation Centres">Organ Donation Centres</option>
<option value="Orphanages & Shelters">Orphanages & Shelters</option>
<option value="Orthodox Churches">Orthodox Churches</option>
<option value="Other Vehicles">Other Vehicles</option>
<option value="Outdoor Advertising">Outdoor Advertising</option>
<option value="Outdoor Catering Services">Outdoor Catering Services</option>
<option value="Outdoor Furniture">Outdoor Furniture</option>
<option value="Overseas Education Consultants">Overseas Education Consultants</option>
<option value="Oxygen Concentrators">Oxygen Concentrators</option>
<option value="Oxygen Gas Dealers">Oxygen Gas Dealers</option>
<option value="P R P Hair Treatments">P R P Hair Treatments</option>
<option value="Packers And Movers">Packers And Movers</option>
<option value="Packing Machine Manufacturers">Packing Machine Manufacturers</option>
<option value="Painters">Painters</option>
<option value="Painting Suppliers">Painting Suppliers</option>
<option value="Pan Shops">Pan Shops</option>
<option value="Pants">Pants</option>
<option value="Paper Rolls Manufacturers">Paper Rolls Manufacturers</option>
<option value="Paper Stores">Paper Stores</option>
<option value="Parks">Parks</option>
<option value="Part Time Jobs Consultancies">Part Time Jobs Consultancies</option>
<option value="Party Halls">Party Halls</option>
<option value="Passport Offices">Passport Offices</option>
<option value="Pawn Brokers">Pawn Brokers</option>
<option value="Pcs & Desktops">Pcs & Desktops</option>
<option value="Pedicure & Manicure">Pedicure & Manicure</option>
<option value="Pen Stores">Pen Stores</option>
<option value="Pentecostal Churches">Pentecostal Churches</option>
<option value="Perforated Sheet Manufacturers">Perforated Sheet Manufacturers</option>
<option value="Perfumes">Perfumes</option>
<option value="Personal Fitness Trainers">Personal Fitness Trainers</option>
<option value="Personality Development Training Institutes">Personality Development Training Institutes</option>
<option value="Pest Control Services">Pest Control Services</option>
<option value="Pet Shops">Pet Shops</option>
<option value="Pets">Pets</option>
<option value="PG Colleges">PG Colleges</option>
<option value="Pharmaceutical Companies">Pharmaceutical Companies</option>
<option value="Pharmaceutical Packaging Material Dealers">Pharmaceutical Packaging Material Dealers</option>
<option value="Pharmacies">Pharmacies</option>
<option value="Pharmacy Colleges">Pharmacy Colleges</option>
<option value="Photo Frames">Photo Frames</option>
<option value="Photo Studios">Photo Studios</option>
<option value="Photocopiers">Photocopiers</option>
<option value="Photographers">Photographers</option>
<option value="Photography Training Institutes">Photography Training Institutes</option>
<option value="physiotherapist">physiotherapist</option>
<option value="Physiotherapy Clinics">Physiotherapy Clinics</option>
<option value="Piercing">Piercing</option>
<option value="Pilot Training Institutes">Pilot Training Institutes</option>
<option value="Pipe Dealers">Pipe Dealers</option>
<option value="Pizza Restaurants">Pizza Restaurants</option>
<option value="Placement Consultants">Placement Consultants</option>
<option value="Plants">Plants</option>
<option value="Plastic & Disposable Items">Plastic & Disposable Items</option>
<option value="Plastic Injection Moulding Machine Dealer">Plastic Injection Moulding Machine Dealer</option>
<option value="Plastic Products Manufacturers">Plastic Products Manufacturers</option>
<option value="Play Schools">Play Schools</option>
<option value="Play Stations">Play Stations</option>
<option value="Playground Equipments">Playground Equipments</option>
<option value="Playgrounds">Playgrounds</option>
<option value="Plumbers">Plumbers</option>
<option value="Plumbing">Plumbing</option>
<option value="Plywood & Laminates">Plywood & Laminates</option>
<option value="Police Stations">Police Stations</option>
<option value="Political Party Offices">Political Party Offices</option>
<option value="Pollution Inspection Stations">Pollution Inspection Stations</option>
<option value="Polymers & Asbestos Products Dealer">Polymers & Asbestos Products Dealer</option>
<option value="Polytechnic Colleges">Polytechnic Colleges</option>
<option value="Pork Shops">Pork Shops</option>
<option value="Post Offices">Post Offices</option>
<option value="Power Generator Suppliers">Power Generator Suppliers</option>
<option value="Power Stations">Power Stations</option>
<option value="Power Tools Dealers">Power Tools Dealers</option>
<option value="Presbyterian Churches">Presbyterian Churches</option>
<option value="Printed Circuit Board Dealers">Printed Circuit Board Dealers</option>
<option value="Printers">Printers</option>
<option value="Printing & Stationaries">Printing & Stationaries</option>
<option value="Printing Machines">Printing Machines</option>
<option value="Printing Materials">Printing Materials</option>
<option value="Printing Press">Printing Press</option>
<option value="Professional Services">Professional Services</option>
<option value="Professionals">Professionals</option>
<option value="Project Management Training Institutes">Project Management Training Institutes</option>
<option value="Projectors">Projectors</option>
<option value="Promotional Products">Promotional Products</option>
<option value="Property Consultants">Property Consultants</option>
<option value="Property Dealers">Property Dealers</option>
<option value="Protestant Churches">Protestant Churches</option>
<option value="Public Safety Offices">Public Safety Offices</option>
<option value="Pubs">Pubs</option>
<option value="Pumps & Controllers">Pumps & Controllers</option>
<option value="Pundits">Pundits</option>
<option value="PVC Pipe Dealer">PVC Pipe Dealer</option>
<option value="Quaker Churches">Quaker Churches</option>
<option value="Quick Bites">Quick Bites</option>
<option value="Radio Jockey Training Institutes">Radio Jockey Training Institutes</option>
<option value="Radio Stations">Radio Stations</option>
<option value="Radium Works">Radium Works</option>
<option value="Railings">Railings</option>
<option value="Railway Cargo Agents">Railway Cargo Agents</option>
<option value="Railway Stations">Railway Stations</option>
<option value="Ready Made Garments">Ready Made Garments</option>
<option value="Ready Mix Concrete">Ready Mix Concrete</option>
<option value="Real Estate">Real Estate</option>
<option value="Real Estate Agents">Real Estate Agents</option>
<option value="Real Estate Developers">Real Estate Developers</option>
<option value="Real Estate Loans & Mortgages">Real Estate Loans & Mortgages</option>
<option value="Recording Studios">Recording Studios</option>
<option value="Reformed Churches">Reformed Churches</option>
<option value="Refrigerator Repair">Refrigerator Repair</option>
<option value="Refrigerators">Refrigerators</option>
<option value="Registry Offices">Registry Offices</option>
<option value="Rehabilitation Centres">Rehabilitation Centres</option>
<option value="Religion">Religion</option>
<option value="Research Institutes">Research Institutes</option>
<option value="Residential Designers">Residential Designers</option>
<option value="Resins & Chemicals Manufacturer">Resins & Chemicals Manufacturer</option>
<option value="Resorts">Resorts</option>
<option value="Restaurant Test">Restaurant Test</option>
<option value="Restaurants">Restaurants</option>
<option value="RO Water Purifier">RO Water Purifier</option>
<option value="Road Cargo Agents">Road Cargo Agents</option>
<option value="Robotics Engineering">Robotics Engineering</option>
<option value="Robotics Training Institutes">Robotics Training Institutes</option>
<option value="Roofing Sheets">Roofing Sheets</option>
<option value="RTA Offices">RTA Offices</option>
<option value="Rubber Oil Seals Dealer">Rubber Oil Seals Dealer</option>
<option value="Rubber Product Dealer">Rubber Product Dealer</option>
<option value="Rubber Product Manufacturers">Rubber Product Manufacturers</option>
<option value="Rubber Stamps">Rubber Stamps</option>
<option value="Rudraksha">Rudraksha</option>
<option value="Russian Orthodox Churches">Russian Orthodox Churches</option>
<option value="Sand Materials">Sand Materials</option>
<option value="Sandals & Floaters">Sandals & Floaters</option>
<option value="Sanitaryware & Bathroom Accessories">Sanitaryware & Bathroom Accessories</option>
<option value="Sarees & Blouses">Sarees & Blouses</option>
<option value="Scalp Treatments">Scalp Treatments</option>
<option value="School District Offices">School District Offices</option>
<option value="School For Mentally Challenged">School For Mentally Challenged</option>
<option value="Scrap Dealers">Scrap Dealers</option>
<option value="Screen Printers">Screen Printers</option>
<option value="Sea Cargo Agents">Sea Cargo Agents</option>
<option value="Seat Cover & Rexine Works">Seat Cover & Rexine Works</option>
<option value="Security Guard Services">Security Guard Services</option>
<option value="Security Services">Security Services</option>
<option value="Security Systems">Security Systems</option>
<option value="Seeds">Seeds</option>
<option value="SelfDefence Training Services">SelfDefence Training Services</option>
<option value="Servers">Servers</option>
<option value="Service Centres">Service Centres</option>
<option value="Serviced Apartments">Serviced Apartments</option>
<option value="Seventh-Day Adventist Churches">Seventh-Day Adventist Churches</option>
<option value="Sewing Machine Dealers">Sewing Machine Dealers</option>
<option value="Share Brokers">Share Brokers</option>
<option value="Shipping Companies">Shipping Companies</option>
<option value="Shirts">Shirts</option>
<option value="Shoes">Shoes</option>
<option value="Shopping Malls">Shopping Malls</option>
<option value="Shorts & Cargo">Shorts & Cargo</option>
<option value="Sign Boards">Sign Boards</option>
<option value="Signage">Signage</option>
<option value="Singing Classes">Singing Classes</option>
<option value="Skin Care Clinics">Skin Care Clinics</option>
<option value="Snooker Parlours">Snooker Parlours</option>
<option value="Socks">Socks</option>
<option value="Sofa Sets">Sofa Sets</option>
<option value="Software & IT Services">Software & IT Services</option>
<option value="Software Certifications">Software Certifications</option>
<option value="Software Dealers">Software Dealers</option>
<option value="Software Development">Software Development</option>
<option value="Software Training Institutes">Software Training Institutes</option>
<option value="Solar Products Manufacturers">Solar Products Manufacturers</option>
<option value="Sound And Lighting On Hire">Sound And Lighting On Hire</option>
<option value="Sound Systems">Sound Systems</option>
<option value="Spa & Saloon">Spa & Saloon</option>
<option value="Spare Part Dealers">Spare Part Dealers</option>
<option value="Spare Parts & Accessories">Spare Parts & Accessories</option>
<option value="Speakers">Speakers</option>
<option value="Spiritual And Pooja Accessories">Spiritual And Pooja Accessories</option>
<option value="Spiritual Centres">Spiritual Centres</option>
<option value="Spoken English Institutes">Spoken English Institutes</option>
<option value="Sports">Sports</option>
<option value="Sports Academies">Sports Academies</option>
<option value="Sports Clubs">Sports Clubs</option>
<option value="Sports Equipments">Sports Equipments</option>
<option value="Sports Stores">Sports Stores</option>
<option value="Sports Wear">Sports Wear</option>
<option value="Sports, Entertainment & Hobbies">Sports, Entertainment & Hobbies</option>
<option value="Stadiums">Stadiums</option>
<option value="Stage Decorations">Stage Decorations</option>
<option value="Stainless Steel Pipe Dealer">Stainless Steel Pipe Dealer</option>
<option value="Stamp Papers">Stamp Papers</option>
<option value="Standees & Demo Tents">Standees & Demo Tents</option>
<option value="State Board Schools">State Board Schools</option>
<option value="State Government Offices">State Government Offices</option>
<option value="Stationaries">Stationaries</option>
<option value="Stationary Stores">Stationary Stores</option>
<option value="Stations">Stations</option>
<option value="Steel Wires & Ropes Manufacturers">Steel Wires & Ropes Manufacturers</option>
<option value="Stem Cell Banking">Stem Cell Banking</option>
<option value="Stock Brokers">Stock Brokers</option>
<option value="Studios">Studios</option>
<option value="Study Hall Centre">Study Hall Centre</option>
<option value="Sub-Registrar Offices">Sub-Registrar Offices</option>
<option value="Suitings & Shirtings">Suitings & Shirtings</option>
<option value="Suits And Blazers">Suits And Blazers</option>
<option value="Sulphuric Acid Dealers">Sulphuric Acid Dealers</option>
<option value="Sunglasses">Sunglasses</option>
<option value="Super Specialty Hospitals">Super Specialty Hospitals</option>
<option value="Supermarkets">Supermarkets</option>
<option value="Surgical Instruments">Surgical Instruments</option>
<option value="Sweet Shops">Sweet Shops</option>
<option value="Swimming Pools">Swimming Pools</option>
<option value="Table Accessories">Table Accessories</option>
<option value="Tailoring Materials">Tailoring Materials</option>
<option value="Tailors">Tailors</option>
<option value="Tailors & Designers">Tailors & Designers</option>
<option value="Take Away Restaurants">Take Away Restaurants</option>
<option value="Tattoo Makers">Tattoo Makers</option>
<option value="Teflon Products Dealer">Teflon Products Dealer</option>
<option value="Telecommunications">Telecommunications</option>
<option value="Television Installation">Television Installation</option>
<option value="Televisions">Televisions</option>
<option value="Temples">Temples</option>
<option value="Tent Houses">Tent Houses</option>
<option value="Textiles">Textiles</option>
<option value="Theaters">Theaters</option>
<option value="Theme Parks">Theme Parks</option>
<option value="Thermocol Dealers">Thermocol Dealers</option>
<option value="Ticketing">Ticketing</option>
<option value="Tiles">Tiles</option>
<option value="Timber Depot">Timber Depot</option>
<option value="Tmt Iron & Steel Bars">Tmt Iron & Steel Bars</option>
<option value="Tours And Travels">Tours And Travels</option>
<option value="Toy Shops">Toy Shops</option>
<option value="Trading Consultants">Trading Consultants</option>
<option value="Training Institutes">Training Institutes</option>
<option value="Transportation">Transportation</option>
<option value="Travel Agencies">Travel Agencies</option>
<option value="Travel Goods">Travel Goods</option>
<option value="Travel Services">Travel Services</option>
<option value="Trophy & Momento Dealers">Trophy & Momento Dealers</option>
<option value="Trousers">Trousers</option>
<option value="T-Shirts">T-Shirts</option>
<option value="Tuitions">Tuitions</option>
<option value="Tv Accessories">Tv Accessories</option>
<option value="TV Studio">TV Studio</option>
<option value="Two Wheelers Dealers">Two Wheelers Dealers</option>
<option value="Two Wheelers Service Centres">Two Wheelers Service Centres</option>
<option value="Typing Institutes">Typing Institutes</option>
<option value="Tyre Dealers">Tyre Dealers</option>
<option value="Unani Treatment">Unani Treatment</option>
<option value="Underground Stations">Underground Stations</option>
<option value="Uniforms">Uniforms</option>
<option value="Unitarian Universalist Churches">Unitarian Universalist Churches</option>
<option value="United Churches Of Christ">United Churches Of Christ</option>
<option value="Unity Churches">Unity Churches</option>
<option value="Universities">Universities</option>
<option value="UPS">UPS</option>
<option value="UPSC & IAS Coaching Centres">UPSC & IAS Coaching Centres</option>
<option value="Used Auto Dealers">Used Auto Dealers</option>
<option value="Used Bike Dealers">Used Bike Dealers</option>
<option value="Used Cars Dealers">Used Cars Dealers</option>
<option value="Utensils">Utensils</option>
<option value="UV Water Purifier">UV Water Purifier</option>
<option value="Valve Dealer">Valve Dealer</option>
<option value="Vegetables">Vegetables</option>
<option value="Vehicle Glass Dealers">Vehicle Glass Dealers</option>
<option value="Vehicle On Hire">Vehicle On Hire</option>
<option value="Vending Machine Manufacturer">Vending Machine Manufacturer</option>
<option value="Veterinary Hospitals">Veterinary Hospitals</option>
<option value="Veterinary Medicines">Veterinary Medicines</option>
<option value="Video Editing Studios">Video Editing Studios</option>
<option value="Video Gaming Centres">Video Gaming Centres</option>
<option value="Videographers">Videographers</option>
<option value="Vineyard Churches">Vineyard Churches</option>
<option value="Vinyl Flooring">Vinyl Flooring</option>
<option value="Vocational Colleges">Vocational Colleges</option>
<option value="Wall Papers">Wall Papers</option>
<option value="Washing Machine Repair">Washing Machine Repair</option>
<option value="Washing Machines">Washing Machines</option>
<option value="Water Cooler Suppliers">Water Cooler Suppliers</option>
<option value="Water Parks">Water Parks</option>
<option value="Water Purifier Dealers">Water Purifier Dealers</option>
<option value="Water Purifier Repairs">Water Purifier Repairs</option>
<option value="Water Softeners">Water Softeners</option>
<option value="Water Suppliers">Water Suppliers</option>
<option value="Water Tank Suppliers">Water Tank Suppliers</option>
<option value="Waterproofing">Waterproofing</option>
<option value="Waterproofing Materials">Waterproofing Materials</option>
<option value="Weather Stations">Weather Stations</option>
<option value="Web Designing Companies">Web Designing Companies</option>
<option value="Web Hosting Companies">Web Hosting Companies</option>
<option value="Wedding & Events">Wedding & Events</option>
<option value="Wedding Bands">Wedding Bands</option>
<option value="Wedding Cards">Wedding Cards</option>
<option value="Wedding Catering Services">Wedding Catering Services</option>
<option value="Wedding Decorations">Wedding Decorations</option>
<option value="Wedding Planners">Wedding Planners</option>
<option value="Weight Loss & Gain Centres">Weight Loss & Gain Centres</option>
<option value="Welding Equipment">Welding Equipment</option>
<option value="Welfare Offices">Welfare Offices</option>
<option value="Wesleyan Churches">Wesleyan Churches</option>
<option value="Wet Grinder Dealers">Wet Grinder Dealers</option>
<option value="Wine Shops">Wine Shops</option>
<option value="Winter Wear">Winter Wear</option>
<option value="Wire Mesh Dealers">Wire Mesh Dealers</option>
<option value="Womens Hostels">Womens Hostels</option>
<option value="Wooden Flooring">Wooden Flooring</option>
<option value="Wrist Watch Repairs and Services">Wrist Watch Repairs and Services</option>
<option value="Wrist Watches">Wrist Watches</option>
<option value="Xerox Shops">Xerox Shops</option>
<option value="Yoga Centres">Yoga Centres</option>
<option value="Zoo Parks">Zoo Parks</option>
<option value="Zumba Fitness">Zumba Fitness</option>

										</select>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="my_profile_setting_input form-group">
										<label>Address Line <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="addr" placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Area <span class="text-danger">*</span></label>
										<input type="text" class="form-control" required name="area" placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Area Ward No<span class="text-danger">*</span></label>
										<input type="number" class="form-control" required name="ward" placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>State <span class="text-danger">*</span></label>
										<select class="selectpicker" id="state" required name="state" data-live-search="true" data-width="100%">
											<option disabled="disabled">Select State</option>
											<option selected="true" value="Tamil Nadu">Tamil Nadu</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>City <span class="text-danger">*</span></label>
										<select class="form-control" id="city" required name="city">
											<option disabled="disabled">Select city</option>
											<option selected="true">Krishnagiri</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Taluk <span class="text-danger">*</span></label>
										<select class="form-control" id="taluk" required name="taluk">
											<option disabled="disabled">Select Taluk</option>
											<option selected="true">Hosur</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Business Display City <span class="text-danger">*</span></label>
										<select class="selectpicker" id="displaycity" required name="displaycity" data-live-search="true" data-width="100%">
											<option selected="true" disabled="disabled">Select city</option>
											<option>Hosur</option>
											<option>Krishnagiri</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Pincode <span class="text-danger">*</span></label>
										<input type="number" maxlength="6" required class="form-control" name="pincode" placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Landmark <span class="text-danger">*</span></label>
										<input type="text" class="form-control" required name="landmark" placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Alternate Contact (optional)</label>
										<input type="number" maxlength="10" class="form-control" name="altcontact" placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Landline with STD Code (optional)</label>
										<input type="text" class="form-control" name="landline" placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Website (optional)</label>
										<input type="url" class="form-control" name="website" placeholder="Enter the details here">
									</div>
								</div>
								<!--div class="col-lg-8">
									<h4 class="mb30">Working Days (optional)</h4>
									<div class="my_profile_setting_input ui_kit_select_search form-group list_hightlights df">
									<ul class="add_listing selectable-list">
									<li>
									<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck1">
									<label class="custom-control-label" for="customCheck1">Sunday</label>
									</div>
									</li>
									</ul>
									<ul class="add_listing selectable-list">
									<li>
									<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck2">
									<label class="custom-control-label" for="customCheck2">Monday</label>
									</div>
									</li>
									</ul>
									<ul class="add_listing selectable-list">
									<li>
									<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck3">
									<label class="custom-control-label" for="customCheck3">Tuesday</label>
									</div>
									</li>
									</ul>
									<ul class="add_listing selectable-list">
									<li>
									<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck4">
									<label class="custom-control-label" for="customCheck4">Wedday</label>
									</div>
									</li>
									</ul>
									<ul class="add_listing selectable-list">
									<li>
									<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck5">
									<label class="custom-control-label" for="customCheck5">Thursday</label>
									</div>
									</li>
									</ul>
									<ul class="add_listing selectable-list">
									<li>
									<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck6">
									<label class="custom-control-label" for="customCheck6">Friday</label>
									</div>
									</li>
									</ul>
									<ul class="add_listing selectable-list">
									<li>
									<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck7">
									<label class="custom-control-label" for="customCheck7">Saturday</label>
									</div>
									</li>
									</ul>
									</div>
								</div-->
								<div class="col-lg-2">
									<div class="my_profile_setting_input form-group">
										<label>Working Hours</label>
										<input type="time" class="form-control" name="workingfrom" placeholder="Enter the details here">
										<label>from</label>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="my_profile_setting_input form-group">
										<label>  (optional)</label>
										<input type="time" class="form-control" name="workingto" placeholder="Enter the details here">
										<label>to</label>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Email ID <span class="text-danger">*</span></label>
										<input type="email" class="form-control"required name="email" placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Reference Code (optional)</label>
										<input type="text" class="form-control" name="reference" placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Referred By (optional)</label>
										<input type="text" class="form-control" readonly placeholder="Enter the details here">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="my_profile_setting_textarea">
										<label for="propertyDescription">Business Description (optional)</label>
										<textarea class="form-control" name="description" rows="3"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="my_dashboard_review mt30">
							<div class="row">
								<div class="col-lg-12">
									<h4 class="mb30">Media</h4>
								</div>
								<div class="col-lg-3">
									<h5>Logo <span class="text-danger">(Pay & Use)</span></h5>
									<div class="upload_file_input_add_remove">
										<span class="btn_upload"><input type="file" id="imag" required name="logo" class="input-img"/><span class="flaticon-upload"></span></span>
										<img id="ImgPreview" src="images/resource/upload-img.png" class="preview1" alt="" />
										<button id="removeImage1" class="btn-rmv1" type="button"><span class="flaticon-delete"></span></button>
									</div>
									<small>Maximum file size: 1000kb.</small>
								</div>
								<div class="col-lg-9">
									<h5>Gallery Images <span class="text-danger">(Pay & Use)</span></h5>
									<ul class="mb0">
										<li class="list-inline-item vat mb30-767">
											<div class="upload_file_input_add_remove">
												<span class="btn_upload">
													<input type="file" id="gallery-photo-add" multiple title="" class="input-img"/>
												<span class="flaticon-upload"></span></span>
											</div>
											<small>Maximum file size: 1000kb.</small>
										</li>
										<li class="list-inline-item">
											<div class="gallery"></div>
										</li>
									</ul>
								</div>
								<div class="col-lg-5">
									<div class="my_profile_setting_input form-group mt30">
										<label>Video <span class="text-danger">(Pay & Use)</span></label>
										<input type="file" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="row mb80">			
							<div class="col-lg-9" align="right">
								<br>
								<div class="g-recaptcha wpcf7-form-control" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu"></div>
							</div>
							<div class="col-lg-3" align="right">
								<button class="btn btn-thm listing_save_btn mt30" type="submit" name="registeryourbusiness"><i class="fa fa-sign-in"></i> Submit</button>
							</div>
						</div>
					</form>
					<?php
						if($username == '')
						{
						?>
					</a>
					<?php
					}
				?>
				</div>
			</div>
		</div>
	</section>
<?php include("footer.php");?>