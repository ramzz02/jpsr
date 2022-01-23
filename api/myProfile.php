<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  date_default_timezone_set('Asia/Kolkata');

  // get the contents of the JSON file 
  $jsonCont = file_get_contents('php://input'); 

  //decode JSON data to PHP array 
  $content = json_decode($jsonCont, true);

  //Fetch the details of Register
  if($content['user_id'] != ''){

    $registerexists = new Register();
    $registerexists = $registerexists->fetchRegister("WHERE id = '{$content['user_id']}' ORDER BY id DESC")->resultSet();
    $registerexist = $registerexists[0];


    if(!empty($registerexist)){

      $postdata = array();
      $postdata["id"] = $registerexist['id'];
      $postdata["user_code"] = $registerexist['user_code'];
      $postdata["name"] = $registerexist['name'];
      $postdata["mobile_no"] = $registerexist['phone'];
      $postdata["email"] = $registerexist['email'];
      $postdata["city"] = $registerexist['city'];
      $postdata["business_display_city"] = $registerexist['business_display_city'];
      $postdata["area"] = $registerexist['area'];
      $postdata["ward_no"] = $registerexist['ward_no'];
      $postdata["aadhaar_no"] = $registerexist['aadhaar_no'];
      $postdata["occupation_type"] = $registerexist['occupation_type'];
      $postdata["company_name"] = $registerexist['company_name'];
      $postdata["business_name"] = $registerexist['business_name'];
      $postdata["salary_income"] = $registerexist['salary_income'];
      $postdata["business_income"] = $registerexist['business_income'];
      if($registerexist['profile_pic'] != ''){
      $postdata["profile_picture"] = 'https://jpsr.in/'.$registerexist['profile_pic'];
      } else {
      $postdata["profile_picture"] = '';
      }

      // $postd[] = $postdata;


    $result = array("code"=>1,"response"=>"success","data"=>$postdata);

    } else {

        $result = array("code"=>0,"response"=>"Invalid user id");
    }


  } else {

    $result = array("code"=>0,"response"=>"User id is required");

  }


  echo json_encode($result);

?>