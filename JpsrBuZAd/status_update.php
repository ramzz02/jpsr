<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  date_default_timezone_set('Asia/Kolkata');

  if( !empty($_POST["update_id"]) && !empty($_POST["name"]) ) {

  
  $name = $_POST["name"];

  if($name == 'testimonial'){

  $update_id = $_POST["update_id"];

  $getstatus = new Testimonial();
  $getstatus = $getstatus->fetchTestimonial("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'active'){
    $status = "deactive";
  } else {
    $status = "active";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Testimonial();
  $updateform = $updateform->updateTestimonialStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'offer'){

  $update_id = $_POST["update_id"];

  $getstatus = new Offer();
  $getstatus = $getstatus->fetchOffer("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'active'){
    $status = "deactive";
  } else {
    $status = "active";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Offer();
  $updateform = $updateform->updateOfferStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'news'){

  $update_id = $_POST["update_id"];

  $getstatus = new News();
  $getstatus = $getstatus->fetchNews("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'active'){
    $status = "deactive";
  } else {
    $status = "active";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new News();
  $updateform = $updateform->updateNewsStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'service_category'){

  $update_id = $_POST["update_id"];

  $getstatus = new Service();
  $getstatus = $getstatus->fetchCategory("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'active'){
    $status = "deactive";
  } else {
    $status = "active";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Service();
  $updateform = $updateform->updateCategoryStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'city_name'){

  $update_id = $_POST["update_id"];

  $getstatus = new Location();
  $getstatus = $getstatus->fetchLocation("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == '1'){
    $status = "2";
  } else {
    $status = "1";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Location();
  $updateform = $updateform->updateLocationStatus($data);
  $updateform_id = $updateform->rowCount();


  }

  if($name == 'state_name'){

  $update_id = $_POST["update_id"];

  $getstatus = new Location();
  $getstatus = $getstatus->fetchState("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == '1'){
    $status = "2";
  } else {
    $status = "1";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Location();
  $updateform = $updateform->updateStateStatus($data);
  $updateform_id = $updateform->rowCount();


  }

  if($name == 'district_name'){

  $update_id = $_POST["update_id"];

  $getstatus = new Location();
  $getstatus = $getstatus->fetchDistrict("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == '1'){
    $status = "2";
  } else {
    $status = "1";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Location();
  $updateform = $updateform->updateDistrictStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'ward_no'){

  $update_id = $_POST["update_id"];

  $getstatus = new Location();
  $getstatus = $getstatus->fetchWard("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == '1'){
    $status = "2";
  } else {
    $status = "1";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Location();
  $updateform = $updateform->updateWardStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'area'){

  $update_id = $_POST["update_id"];

  $getstatus = new Location();
  $getstatus = $getstatus->fetchArea("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == '1'){
    $status = "2";
  } else {
    $status = "1";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Location();
  $updateform = $updateform->updateAreaStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'business_category'){

  $update_id = $_POST["update_id"];

  $getstatus = new Business();
  $getstatus = $getstatus->fetchCategory("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == '1'){
    $status = "2";
  } else {
    $status = "1";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Business();
  $updateform = $updateform->updateCategoryStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'business_subscription'){

  $update_id = $_POST["update_id"];

  $getstatus = new Business();
  $getstatus = $getstatus->fetchSubscription("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == '1'){
    $status = "2";
  } else {
    $status = "1";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Business();
  $updateform = $updateform->updateSubscriptionStatus($data);
  $updateform_id = $updateform->rowCount();


  }

  if($name == 'ads_subscription'){

  $update_id = $_POST["update_id"];

  $getstatus = new Advertisement();
  $getstatus = $getstatus->fetchSubscription("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == '1'){
    $status = "2";
  } else {
    $status = "1";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Advertisement();
  $updateform = $updateform->updateSubscriptionStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'business_period'){

  $update_id = $_POST["update_id"];

  $getstatus = new Business();
  $getstatus = $getstatus->fetchPeriod("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == '1'){
    $status = "2";
  } else {
    $status = "1";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Business();
  $updateform = $updateform->updatePeriodStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'ads_period'){

  $update_id = $_POST["update_id"];

  $getstatus = new Advertisement();
  $getstatus = $getstatus->fetchPeriod("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == '1'){
    $status = "2";
  } else {
    $status = "1";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Advertisement();
  $updateform = $updateform->updatePeriodStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'business_list'){

  $update_id = $_POST["update_id"];

  $getstatus = new Business();
  $getstatus = $getstatus->fetchBusiness("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  $gettingcategorys = new Business();
  $gettingcategorys = $gettingcategorys->fetchCategory("WHERE id = '{$getstatu['category']}' ORDER BY id DESC")->resultSet();
  $gettingcateg = $gettingcategorys[0];


  if($getstatu['status'] == 'active'){
    
    $status = "deactive";

  $categCount = $gettingcateg['count'] - 1;

  $datacount = array();
  $datacount[] = $categCount;
  $datacount[] = $gettingcateg['id'];

  $updateform = new Business();
  $updateform = $updateform->updateCategoryCount($datacount);
  $updateformID = $updateform->rowCount();


  } else {

    $status = "active";

  $categCount = $gettingcateg['count'] + 1;

  $datacount = array();
  $datacount[] = $categCount;
  $datacount[] = $gettingcateg['id'];

  $updateform = new Business();
  $updateform = $updateform->updateCategoryCount($datacount);
  $updateformID = $updateform->rowCount();


  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Business();
  $updateform = $updateform->updateBusinessStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'advertisement_list'){

  $update_id = $_POST["update_id"];

  $getstatus = new Advertisement();
  $getstatus = $getstatus->fetchAds("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'active'){
    $status = "deactive";
  } else {
    $status = "active";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Advertisement();
  $updateform = $updateform->updateAdsStatus($data);
  $updateform_id = $updateform->rowCount();


  }

  if($name == 'business_image_active'){

  $update_id = $_POST["update_id"];

  $getstatus = new Business();
  $getstatus = $getstatus->fetchBusinessImageActive("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'active'){
    $status = "deactive";
  } else {
    $status = "active";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Business();
  $updateform = $updateform->updateBusinessImageActiveStatus($data);
  $updateform_id = $updateform->rowCount();


  }

  if($name == 'jpsr_video'){

  $update_id = $_POST["update_id"];

  $getstatus = new Service();
  $getstatus = $getstatus->fetchVideo("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'active'){
    $status = "deactive";
  } else {
    $status = "active";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Service();
  $updateform = $updateform->updateVideoStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'birthday_wishes'){

  $update_id = $_POST["update_id"];

  $getstatus = new News();
  $getstatus = $getstatus->fetchWishes("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'active'){
    $status = "deactive";
  } else {
    $status = "active";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new News();
  $updateform = $updateform->updateWishesStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'referral-income'){

  $update_id = $_POST["update_id"];

  $getstatus = new Income();
  $getstatus = $getstatus->fetchIncome("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'approved'){
    $status = "pending";
  } else {
    $status = "approved";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Income();
  $updateform = $updateform->updateIncomeStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'transformation_news'){

  $update_id = $_POST["update_id"];

  $getstatus = new News();
  $getstatus = $getstatus->fetchTransformation("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'active'){
    $status = "deactive";
  } else {
    $status = "active";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new News();
  $updateform = $updateform->updateTransformationStatus($data);
  $updateform_id = $updateform->rowCount();


  }

  if($name == 'articles'){

  $update_id = $_POST["update_id"];

  $getstatus = new News();
  $getstatus = $getstatus->fetchArticle("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'active'){
    $status = "deactive";
  } else {
    $status = "active";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new News();
  $updateform = $updateform->updateArticleStatus($data);
  $updateform_id = $updateform->rowCount();


  }
  
  
  if($name == 'home_service'){

  $update_id = $_POST["update_id"];

  $getstatus = new Service();
  $getstatus = $getstatus->fetchHomeService("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'pending'){
    $status = "completed";
  } else {
    $status = "pending";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Service();
  $updateform = $updateform->updateHomeServiceStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'business_service'){

  $update_id = $_POST["update_id"];

  $getstatus = new Service();
  $getstatus = $getstatus->fetchBusinessService("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'pending'){
    $status = "completed";
  } else {
    $status = "pending";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Service();
  $updateform = $updateform->updateBusinessServiceStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'property_service'){

  $update_id = $_POST["update_id"];

  $getstatus = new Service();
  $getstatus = $getstatus->fetchPropertyService("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'pending'){
    $status = "completed";
  } else {
    $status = "pending";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Service();
  $updateform = $updateform->updatePropertyServiceStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'other_service'){

  $update_id = $_POST["update_id"];

  $getstatus = new Service();
  $getstatus = $getstatus->fetchOtherService("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'pending'){
    $status = "completed";
  } else {
    $status = "pending";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Service();
  $updateform = $updateform->updateOtherServiceStatus($data);
  $updateform_id = $updateform->rowCount();


  }
  
  if($name == 'doctor_service'){

  $update_id = $_POST["update_id"];

  $getstatus = new Service();
  $getstatus = $getstatus->fetchDoctorService("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'pending'){
    $status = "completed";
  } else {
    $status = "pending";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Service();
  $updateform = $updateform->updateDoctorServiceStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'renting_service'){

  $update_id = $_POST["update_id"];

  $getstatus = new Service();
  $getstatus = $getstatus->fetchRentingService("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'pending'){
    $status = "completed";
  } else {
    $status = "pending";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Service();
  $updateform = $updateform->updateRentingServiceStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'reselling_service'){

  $update_id = $_POST["update_id"];

  $getstatus = new Service();
  $getstatus = $getstatus->fetchResellingService("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'pending'){
    $status = "completed";
  } else {
    $status = "pending";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Service();
  $updateform = $updateform->updateResellingServiceStatus($data);
  $updateform_id = $updateform->rowCount();


  }
  
  
  if($name == 'grocery_service'){

  $update_id = $_POST["update_id"];

  $getstatus = new Service();
  $getstatus = $getstatus->fetchGrocery("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'pending'){
    $status = "completed";
  } else {
    $status = "pending";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Service();
  $updateform = $updateform->updateGroceryStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($name == 'temple_list'){

  $update_id = $_POST["update_id"];

  $getstatus = new Business();
  $getstatus = $getstatus->fetchTemple("WHERE id = '{$update_id}' ORDER BY id DESC")->resultSet();
  $getstatu = $getstatus[0];

  if($getstatu['status'] == 'deactive'){
    $status = "active";
  } else {
    $status = "deactive";
  }

  $data = array();
  $data[] = $status;
  $data[] = $update_id;

  $updateform = new Business();
  $updateform = $updateform->updateTempleStatus($data);
  $updateform_id = $updateform->rowCount();


  }


  if($updateform_id){
  if($status == 'deactive'){
  print "Deactivated Successfully"; 
  } else if($status == 'active'){
  print "Activated Successfully";
  }
  
  } else {
  print "Failed to update"; 
  }

  }

 
?>