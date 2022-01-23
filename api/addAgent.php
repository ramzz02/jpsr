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
  if($content['person_name'] != '' && $content['mobile_no'] != '' && $content['address'] != '' && $content['area'] != '' && $content['city'] != '' && $content['district'] != '' && $content['state'] != '' && $content['pincode'] != '' && $content['aadhaar_no'] != '' && $content['aadhaar_front_image'] != '' && $content['aadhaar_back_image'] != '' && $content['account_no'] != '' && $content['ifsc_code'] != '' && $content['holder_name'] != '' && $content['branch_name'] != '' && $content['user_id'] != ''){

        $registerexists = new Register();
        $registerexists = $registerexists->fetchRegister("WHERE id = '{$content['user_id']}' ORDER BY id DESC")->resultSet();

        if(!empty($registerexists)){

            $currentYear = date("Y");
            $singleYear = date("y");

            $regagents = new Agent();
            $regagents = $regagents->fetchAgent("WHERE year = '{$currentYear}' ORDER BY id DESC")->resultSet();
            $totalAgentsCount = count($regagents);

            $data_count = $totalAgentsCount + 1;

            $ThisMonth = date("m");
            $currentMon = str_replace("0", "", $ThisMonth);

             $AgentNewCode = 'JPSR'.$currentMon.$singleYear.$data_count;


            $data = array();
            $data[] = $AgentNewCode;
            $data[] = $content['person_name'];
            $data[] = $content['mobile_no'];
            $data[] = $content['email'];
            $data[] = $content['address'];
            $data[] = $content['landmark'];
            $data[] = $content['area'];
            $data[] = $content['city'];
            $data[] = $content['district'];
            $data[] = $content['state'];

            $data[] = $content['pincode'];
            $data[] = $content['alternative_mobile_no'];
            $data[] = $content['aadhaar_no'];

            $random1 = mt_rand(11111,55555);
            $random2 = mt_rand(66666,99999);
            $random3 = mt_rand(434556,987999);

            if($content['aadhaar_front_image'] != ''){

            $FrontImage = 'agent_details/aadhaar_front_'.$random1.'.jpg';
            $data[] = $FrontImage;
            file_put_contents('../'.$FrontImage, base64_decode($content['aadhaar_front_image']));

            } else {
            $data[] = "";   

            }

            if($content['aadhaar_back_image'] != ''){

            $BackImage = 'agent_details/aadhaar_back_'.$random2.'.jpg';
            $data[] = $BackImage;
            file_put_contents('../'.$BackImage, base64_decode($content['aadhaar_back_image']));

            } else {
            $data[] = "";   

            }

            $data[] = $content['account_no'];
            $data[] = $content['ifsc_code'];
            $data[] = $content['holder_name'];
            $data[] = $content['branch_name'];
            $data[] = $currentYear;

            $data[] = date("Y-m-d");
            $data[] = date("h:i A");
            $data[] = $content['user_id'];

            if($content['profile_pic'] != ''){

            $ProfilePic = 'agent_details/profile_picture_'.$random3.'.jpg';
            $data[] = $ProfilePic;
            file_put_contents('../'.$ProfilePic, base64_decode($content['profile_pic']));

            } else {
            $data[] = "";   

            }

            $addform = new Agent();
            $addform = $addform->addAgent($data);
            $addformID = $addform->lastInsertID();


            if($addformID){

              $result = array("code"=>1,"response"=>"Successfully registered");

            } else {

              $result = array("code"=>0,"response"=>"Failed to register");

            }

      } else {

        $result = array("code"=>0,"response"=>"Invalid user id");

      }


  } else {

    $result = array("code"=>0,"response"=>"All fields are required");

  }


  echo json_encode($result);

?>