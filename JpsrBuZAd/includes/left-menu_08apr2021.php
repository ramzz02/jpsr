<?php
$_SERVER['PHP_SELF'];
$PageNameArr=explode("/",$_SERVER['PHP_SELF']);
$CrPage=$PageNameArr[count($PageNameArr)-1];

$Class1=($CrPage=='dashboard.php')?'active':'';

$Class2=($CrPage=='addbusiness.php')?'active':'';
$Class3=($CrPage=='businessList.php')?'active':'';

$Class4=($CrPage=='addbusinesscategory.php')?'active':'';
$Class5=($CrPage=='businesscategoryList.php')?'active':'';

$Class6=($CrPage=='aboutus.php')?'active':'';

$Class7=($CrPage=='addadvertisement.php')?'active':'';
$Class8=($CrPage=='advertisementList.php')?'active':'';

$Class9=($CrPage=='addphotos.php')?'active':'';
$Class10=($CrPage=='photoList.php')?'active':'';

$Class11=($CrPage=='addvideos.php')?'active':'';
$Class12=($CrPage=='videoList.php')?'active':'';

$Class13=($CrPage=='trustcategory.php')?'active':'';
$Class14=($CrPage=='trustcategoryList.php')?'active':'';

$Class15=($CrPage=='Addlocation.php')?'active':'';
$Class16=($CrPage=='LocationList.php')?'active':'';

$Class17=($CrPage=='contactus.php')?'active':'';

$Class18=($CrPage=='AddLogoSubscription.php')?'active':'';
$Class19=($CrPage=='LogoSubscriptionList.php')?'active':'';

$Class20=($CrPage=='AddAdSubscription.php')?'active':'';
$Class21=($CrPage=='AdSubscriptionList.php')?'active':'';

$Class22=($CrPage=='Emergency-Services.php')?'active':'';
$Class23=($CrPage=='Emergency-Services-List.php')?'active':'';

$Class24=($CrPage=='Train-Timings.php')?'active':'';
$Class25=($CrPage=='Train-Timings-List.php')?'active':'';

$Class26=($CrPage=='Bus-Timings.php')?'active':'';
$Class27=($CrPage=='Bus-Timings-List.php')?'active':'';

$Class28=($CrPage=='Home-Services-List.php')?'active':'';
$Class29=($CrPage=='Business-Services-List.php')?'active':'';
$Class30=($CrPage=='Property-Management-Services-List.php')?'active':'';
$Class31=($CrPage=='Other-Services-List.php')?'active':'';
$Class32=($CrPage=='Renting-List.php')?'active':'';
$Class33=($CrPage=='Reselling-List.php')?'active':'';
$Class34=($CrPage=='Doctor-Appointment.php')?'active':'';

$Class35=($CrPage=='AddWardNo.php')?'active':'';
$Class36=($CrPage=='WardnoList.php')?'active':'';

$Class37=($CrPage=='AddArea.php')?'active':'';
$Class38=($CrPage=='AreaList.php')?'active':'';

$Class39=($CrPage=='HomeAds.php')?'active':'';

$Class40=($CrPage=='AddOffice.php')?'active':'';
$Class41=($CrPage=='OfficeList.php')?'active':'';

$Class42=($CrPage=='AddTemple.php')?'active':'';
$Class43=($CrPage=='TempleList.php')?'active':'';

$Class44=($CrPage=='UserList.php')?'active':'';

$Class45=($CrPage=='Upload-Train-Timings.php')?'active':'';
$Class46=($CrPage=='Upload-Bus-Timings.php')?'active':'';
$Class47=($CrPage=='Upload-Services.php')?'active':'';

$Class48=($CrPage=='Testimonial-List.php')?'active':'';
$Class49=($CrPage=='Payment-Gateway-List.php')?'active':'';

$Class50=($CrPage=='JPSR-Service-Category.php')?'active':'';
$Class51=($CrPage=='JPSR-Service-Category-List.php')?'active':'';


$Class52=($CrPage=='OfferBanner.php')?'active':'';
$Class53=($CrPage=='OfferBannerList.php')?'active':'';

$Class54=($CrPage=='addoffercategory.php')?'active':'';
$Class55=($CrPage=='offercategoryList.php')?'active':'';

$Class56=($CrPage=='OfferRealestates.php')?'active':'';
$Class57=($CrPage=='OfferRealestatesList.php')?'active':'';

$Class58=($CrPage=='AddOffer.php')?'active':'';
$Class59=($CrPage=='OfferList.php')?'active':'';

$Class60=($CrPage=='addnewscategory.php')?'active':'';
$Class61=($CrPage=='newscategoryList.php')?'active':'';

$Class62=($CrPage=='AddGold.php')?'active':'';
$Class63=($CrPage=='AddPetrol.php')?'active':'';
$Class64=($CrPage=='AddVegetables.php')?'active':'';
$Class65=($CrPage=='AddGroceries.php')?'active':'';

$Class66=($CrPage=='AddNews.php')?'active':'';
$Class67=($CrPage=='NewsList.php')?'active':'';

$Class68=($CrPage=='businessperiodList.php')?'active':'';

$Class69=($CrPage=='JPSR-videos.php')?'active':'';
$Class70=($CrPage=='JPSR-videos-list.php')?'active':'';

$Class71=($CrPage=='Groceries-List.php')?'active':'';

$Class72=($CrPage=='adsperiodList.php')?'active':'';

$Class73=($CrPage=='addhelpvideo.php')?'active':'';
$Class74=($CrPage=='helpvideoList.php')?'active':'';

$Class75=($CrPage=='referral-income-list.php')?'active':'';

$Class76=($CrPage=='TransformationList.php')?'active':'';

$Class77=($CrPage=='AddArticles.php')?'active':'';
$Class78=($CrPage=='ArticlesList.php')?'active':'';

$Class79=($CrPage=='AddWishes.php')?'active':'';
$Class80=($CrPage=='WishesList.php')?'active':'';

$Class81=($CrPage=='OfferAmount.php')?'active':'';

$Class82=($CrPage=='AddGallerySubscription.php')?'active':'';
$Class83=($CrPage=='GallerySubscriptionList.php')?'active':'';

$Class84=($CrPage=='AddVideoSubscription.php')?'active':'';
$Class85=($CrPage=='VideoSubscriptionList.php')?'active':'';

$Class86=($CrPage=='QueryList.php')?'active':'';


$Class87=($CrPage=='terms-and-conditions.php')?'active':'';
$Class88=($CrPage=='privacy-policy.php')?'active':'';

$requestFileInfo = pathinfo($_SERVER['REQUEST_URI']);


?> 
<aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
    <!-- Sidebar Menu -->
    <nav class="sidebar-nav">
        <ul class="nav in side-menu">
            <li class="current-page <?php echo $Class1; ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-home"></i> <span class="hide-menu">Dashboard</span></a>
            </li>
            <li class="current-page <?php echo $Class6; ?>"><a href="aboutus"><i class="list-icon feather feather-user"></i> <span class="hide-menu">About us</span></a>
            </li>
            <li class="menu-item-has-children <?php if($Class39 == 'active' || $Class44 == 'active' || $Class86 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-home"></i> <span class="hide-menu">Home Page</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class44; ?>" href="UserList">Registered Users List</a>
                    </li>
                    <li ><a class="<?php echo $Class39; ?>" href="HomeAds">Home Premium Ads</a>
                    </li>
                    <li ><a class="<?php echo $Class86; ?>" href="QueryList">JPSR Query List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class73 == 'active' || $Class74 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-info"></i> <span class="hide-menu">Help</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class73; ?>" href="addhelpvideo">Add Video</a>
                    </li>
                    <li ><a class="<?php echo $Class74; ?>" href="helpvideoList">Video List</a>
                    </li>
                </ul>
            </li>
            <li class="current-page <?php echo $Class75; ?>"><a href="referral-income-list"><i class="list-icon feather feather-list"></i> <span class="hide-menu">Referral Income List</span></a>
            </li>
            <li class="menu-item-has-children <?php if($Class48 == 'active' || $Class49 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-list"></i> <span class="hide-menu">Footer</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class48; ?>" href="Testimonial-List">Testimonial List</a>
                    </li>
                    <li ><a class="<?php echo $Class49; ?>" href="Payment-Gateway-List">Payment Gateway List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class15 == 'active' || $Class16 == 'active' || $Class35 == 'active' || $Class36 == 'active' || $Class37 == 'active' || $Class38 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-feather"></i> <span class="hide-menu">We are available</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class16; ?>" href="LocationList">Location List</a>
                    </li>
                    <li ><a class="<?php echo $Class36; ?>" href="WardnoList">Ward No List</a>
                    </li>
                    <li ><a class="<?php echo $Class38; ?>" href="AreaList">Area List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class2 == 'active' || $Class3 == 'active' || $Class4 == 'active' || $Class5 == 'active' || $Class18 == 'active' || $Class19 == 'active' || $Class68 == 'active' || $Class82 == 'active' || $Class83 == 'active' || $Class84 == 'active' || $Class85 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-layout"></i> <span class="hide-menu">Business Directory</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class4; ?>" href="addbusinesscategory">Add Business Category</a>
                    </li>
                    <li ><a class="<?php echo $Class5; ?>" href="businesscategoryList">Business Category List</a>
                    </li>
                    <li ><a class="<?php echo $Class68; ?>" href="businessperiodList">Business Period List</a>
                    </li>
                    <li ><a class="<?php echo $Class18; ?>" href="AddLogoSubscription">Add Logo Subscription</a>
                    </li>
                    <li ><a class="<?php echo $Class19; ?>" href="LogoSubscriptionList">Logo Subscription List</a>
                    </li>
                    <li ><a class="<?php echo $Class82; ?>" href="AddGallerySubscription">Add Gallery Subscription</a>
                    </li>
                    <li ><a class="<?php echo $Class83; ?>" href="GallerySubscriptionList">Gallery Subscription List</a>
                    </li>
                    <li ><a class="<?php echo $Class84; ?>" href="AddVideoSubscription">Add Video Subscription</a>
                    </li>
                    <li ><a class="<?php echo $Class85; ?>" href="VideoSubscriptionList">Video Subscription List</a>
                    </li>
                    <li ><a class="<?php echo $Class2; ?>" href="addbusiness">Add New Business</a>
                    </li>
                    <li ><a class="<?php echo $Class3; ?>" href="businessList">Business List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class22 == 'active' || $Class23 == 'active' || $Class47 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-layout"></i> <span class="hide-menu">Emergency Services</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class47; ?>" href="Upload-Services">Upload Excel</a>
                    </li>
                    <li ><a class="<?php echo $Class22; ?>" href="Emergency-Services">Add Services</a>
                    </li>
                    <li ><a class="<?php echo $Class23; ?>" href="Emergency-Services-List">Services List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class24 == 'active' || $Class25 == 'active' || $Class45 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-layout"></i> <span class="hide-menu">Train Timings</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class45; ?>" href="Upload-Train-Timings">Upload Excel</a>
                    </li>
                    <li ><a class="<?php echo $Class24; ?>" href="Train-Timings">Add Timings</a>
                    </li>
                    <li ><a class="<?php echo $Class25; ?>" href="Train-Timings-List">Train Timings List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class26 == 'active' || $Class27 == 'active' || $Class46 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-layout"></i> <span class="hide-menu">Bus Timings</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class46; ?>" href="Upload-Bus-Timings">Upload Excel</a>
                    </li>
                    <li ><a class="<?php echo $Class26; ?>" href="Bus-Timings">Add Timings</a>
                    </li>
                    <li ><a class="<?php echo $Class27; ?>" href="Bus-Timings-List">Bus Timings List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class40 == 'active' || $Class41 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-layout"></i> <span class="hide-menu">Government Offices</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class40; ?>" href="AddOffice">Add Office</a>
                    </li>
                    <li ><a class="<?php echo $Class41; ?>" href="OfficeList">Offices List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class42 == 'active' || $Class43 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-layout"></i> <span class="hide-menu">Temples</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class42; ?>" href="AddTemple">Add Temple</a>
                    </li>
                    <li ><a class="<?php echo $Class43; ?>" href="TempleList">Temples List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class28 == 'active' || $Class29 == 'active' || $Class30 == 'active' || $Class31 == 'active' || $Class32 == 'active' || $Class33 == 'active' || $Class34 == 'active' || $Class50 == 'active' || $Class51 == 'active' || $Class69 == 'active' || $Class70 == 'active' || $Class71 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-feather"></i> <span class="hide-menu">JPSR Services</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class69; ?>" href="JPSR-videos">Add  JPSR Videos</a>
                    </li>
                    <li ><a class="<?php echo $Class70; ?>" href="JPSR-videos-list">JPSR Videos List</a>
                    </li>
                    <li ><a class="<?php echo $Class50; ?>" href="JPSR-Service-Category">Add  Service category</a>
                    </li>
                    <li ><a class="<?php echo $Class51; ?>" href="JPSR-Service-Category-List">Category List</a>
                    </li>
                    <li ><a class="<?php echo $Class28; ?>" href="Home-Services-List">Home Services</a>
                    </li>
                    <li ><a class="<?php echo $Class29; ?>" href="Business-Services-List">Business Services</a>
                    </li>
                    <li ><a class="<?php echo $Class30; ?>" href="Property-Management-Services-List">Property Management Services</a>
                    </li>
                    <li ><a class="<?php echo $Class32; ?>" href="Renting-List">Renting</a>
                    <li ><a class="<?php echo $Class33; ?>" href="Reselling-List">Reselling</a>
                    <li ><a class="<?php echo $Class34; ?>" href="Doctor-Appointment">Doctor Appointment</a>
                    <li ><a class="<?php echo $Class31; ?>" href="Other-Services-List">Other Services</a>
                    </li>
                    <li ><a class="<?php echo $Class71; ?>" href="Groceries-List">Groceries List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class7 == 'active' || $Class8 == 'active' || $Class20 == 'active' || $Class21 == 'active' || $Class72 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-image"></i> <span class="hide-menu">Register Your Ad</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class72; ?>" href="adsperiodList">Ads Period List</a>
                    </li>
                    <li ><a class="<?php echo $Class20; ?>" href="AddAdSubscription">Add Subscription</a>
                    </li>
                    <li ><a class="<?php echo $Class21; ?>" href="AdSubscriptionList">Subscription List</a>
                    </li>
                    <li ><a class="<?php echo $Class7; ?>" href="addadvertisement">Add Ads</a>
                    </li>
                    <li ><a class="<?php echo $Class8; ?>" href="advertisementList">Ads List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class52 == 'active' || $Class53 == 'active' || $Class54 == 'active' || $Class55 == 'active' || $Class56 == 'active' || $Class57 == 'active' || $Class58 == 'active' || $Class59 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-image"></i> <span class="hide-menu">Offers</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class52; ?>" href="OfferBanner">Add Offers Banner</a>
                    </li>
                    <li ><a class="<?php echo $Class53; ?>" href="OfferBannerList">Banner List</a>
                    </li>
                    <li ><a class="<?php echo $Class56; ?>" href="OfferRealestates">Add Realestates</a>
                    </li>
                    <li ><a class="<?php echo $Class57; ?>" href="OfferRealestatesList">Realestates List</a>
                    </li>
                    <li ><a class="<?php echo $Class54; ?>" href="addoffercategory">Add Offers Category</a>
                    </li>
                    <li ><a class="<?php echo $Class55; ?>" href="offercategoryList">Offers Category List</a>
                    </li>
                    <li ><a class="<?php echo $Class81; ?>" href="OfferAmount">Offers Amount</a>
                    </li>
                    <li ><a class="<?php echo $Class58; ?>" href="AddOffer">Add Offers</a>
                    </li>
                    <li ><a class="<?php echo $Class59; ?>" href="OfferList">Offers List</a>
                    </li>

                </ul>
            </li>

            <li class="menu-item-has-children <?php if($Class60 == 'active' || $Class61 == 'active' || $Class66 == 'active' || $Class67 == 'active' || $Class76 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-sidebar"></i> <span class="hide-menu">News</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class60; ?>" href="addnewscategory">Add Category</a>
                    </li>
                    <li ><a class="<?php echo $Class61; ?>" href="newscategoryList">Category List</a>
                    </li>
                    <li ><a class="<?php echo $Class66; ?>" href="AddNews">Add News</a>
                    </li>
                    <li ><a class="<?php echo $Class67; ?>" href="NewsList">News List</a>
                    </li>
                    <li ><a class="<?php echo $Class76; ?>" href="TransformationList">Transformation List</a>
                    </li>
                </ul>
            </li>
            
            <li class="menu-item-has-children <?php if($Class79 == 'active' || $Class80 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-sidebar"></i> <span class="hide-menu">Birthday Wishes</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class79; ?>" href="AddWishes">Add Wishes</a>
                    </li>
                    <li ><a class="<?php echo $Class80; ?>" href="WishesList">Wishes List</a>
                    </li>
                </ul>
            </li>


            <li class="menu-item-has-children <?php if($Class77 == 'active' || $Class78 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-sidebar"></i> <span class="hide-menu">Articles</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class77; ?>" href="AddArticles">Add Articles</a>
                    </li>
                    <li ><a class="<?php echo $Class78; ?>" href="ArticlesList">Articles List</a>
                    </li>
                </ul>
            </li>


            <li class="menu-item-has-children <?php if($Class62 == 'active' || $Class63 == 'active' || $Class64 == 'active' || $Class65 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-list"></i> <span class="hide-menu">Price List</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class62; ?>" href="AddGold">Gold Price List</a>
                    </li>
                    <li ><a class="<?php echo $Class63; ?>" href="AddPetrol">Petrol Price List</a>
                    </li>
                    <li ><a class="<?php echo $Class64; ?>" href="AddVegetables">Vegetables Price List</a>
                    </li>
                    <li ><a class="<?php echo $Class65; ?>" href="AddGroceries">Groceries Price List</a>
                    </li>
                </ul>
            </li>

            <li class="menu-item-has-children <?php if($Class87 == 'active' || $Class88 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-list"></i> <span class="hide-menu">Policies</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class87; ?>" href="terms-and-conditions">Terms & Conditions</a>
                    </li>
                    <li ><a class="<?php echo $Class88; ?>" href="privacy-policy">Privacy Policy</a>
                    </li>
                </ul>
            </li>

            <!-- <li class="menu-item-has-children <?php if($Class9 == 'active' || $Class10 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-image"></i> <span class="hide-menu">Photos</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class9; ?>" href="addphotos.php">Add Photos</a>
                    </li>
                    <li ><a class="<?php echo $Class10; ?>" href="photoList.php">Photos List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class11 == 'active' || $Class12 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-video"></i> <span class="hide-menu">Videos</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class11; ?>" href="addvideos.php">Add Videos</a>
                    </li>
                    <li ><a class="<?php echo $Class12; ?>" href="videoList.php">Videos List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class13 == 'active' || $Class14 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-feather"></i> <span class="hide-menu">Trust Category</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class13; ?>" href="trustcategory.php">New Category</a>
                    </li>
                    <li ><a class="<?php echo $Class14; ?>" href="trustcategoryList.php">Category List</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children <?php if($Class15 == 'active' || $Class16 == 'active'){ echo 'active'; }  ?>"><a href="javascript:void(0);"><i class="list-icon feather feather-layout"></i> <span class="hide-menu">Trust</span></a>
                <ul class="list-unstyled sub-menu">
                    <li ><a class="<?php echo $Class15; ?>" href="addtrust.php">Add Trust</a>
                    </li>
                    <li ><a class="<?php echo $Class16; ?>" href="trustList.php">Trust List</a>
                    </li>
                </ul>
            </li> -->
            <li class="current-page <?php echo $Class17; ?>"><a href="contactus.php"><i class="list-icon feather feather-phone"></i> <span class="hide-menu">Contact Info</span></a>
            </li>
        </ul>
        <!-- /.side-menu -->
    </nav>
</aside>