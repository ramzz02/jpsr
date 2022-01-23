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
  if($content['agent_id'] != ''){

    $getAgentDetails = new Agent();
    $getAgentDetails = $getAgentDetails->fetchAgent("WHERE enter_by = '{$content['agent_id']}' ORDER BY id DESC LIMIT 1")->resultSet();
    $getAgentDetail = $getAgentDetails[0];

    
    if(!empty($getAgentDetail)){

      $postdata = array();
      $postdata["id"] = $getAgentDetail['id'];
      $postdata["agent_code"] = $getAgentDetail['agent_code'];
      $postdata["person_name"] = $getAgentDetail['person_name'];
      $postdata["mobile_no"] = $getAgentDetail['mobile_no'];
      $postdata["email"] = $getAgentDetail['email'];
      $postdata["address"] = $getAgentDetail['address'];
      $postdata["landmark"] = $getAgentDetail['landmark'];
      $postdata["area"] = $getAgentDetail['area'];
      $postdata["city"] = $getAgentDetail['city'];
      $postdata["state_id"] = $getAgentDetail['state'];

      $getstates = new Location();
      $getstates = $getstates->fetchState("WHERE id = '{$getAgentDetail['state']}' ORDER BY state_name ASC")->resultSet();
      $getstate = $getstates[0];

      $getdistricts = new Location();
      $getdistricts = $getdistricts->fetchDistrict("WHERE id = '{$getAgentDetail['district']}' ORDER BY district_name ASC")->resultSet();
      $getdistrict = $getdistricts[0];


      $postdata["state_name"] = $getstate['state_name'];
      $postdata["district_id"] = $getAgentDetail['district'];
      $postdata["district_name"] = $getdistrict['district_name'];
      $postdata["pincode"] = $getAgentDetail['pincode'];
      $postdata["alternative_mobile_no"] = $getAgentDetail['alternative_mobile_no'];
      $postdata["aadhaar_no"] = $getAgentDetail['aadhaar_no'];
      $postdata["aadhaar_front_image"] = 'https://jpsr.in/'.$getAgentDetail['aadhaar_image_front'];
      $postdata["aadhaar_back_image"] = 'https://jpsr.in/'.$getAgentDetail['aadhaar_image_back'];
      if($getAgentDetail['profile_pic'] != ''){
      $postdata["profile_picture"] = 'https://jpsr.in/'.$getAgentDetail['profile_pic'];
      } else {
      $postdata["profile_picture"] = '';
      }
      $postdata["account_no"] = $getAgentDetail['account_no'];
      $postdata["ifsc_code"] = $getAgentDetail['ifsc_code'];
      $postdata["account_holder_name"] = $getAgentDetail['holder_name'];
      $postdata["branch_name"] = $getAgentDetail['branch_name'];
      $postdata["status"] = ucwords($getAgentDetail['status']);

      if($getAgentDetail['status'] == 'pending'){
       $res_status = 'Submitted successfully. Your profile is under review for admin approval'; 
      } else if($getAgentDetail['status'] == 'blocked'){
       $res_status  = 'Your profile blocked. Contact your admin'; 
      } else {
       $res_status  = '';  
      }

      $postdata["response_data"] = $res_status;

      // $postd[] = $postdata;


    $result = array("code"=>1,"response"=>"success","data"=>$postdata);

    } else {

        $result = array("code"=>0,"response"=>"Invalid agent id");
    }


  } else {

    $result = array("code"=>0,"response"=>"Agent id is required");

  }


  echo json_encode($result);

?>