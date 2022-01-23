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
  if($content['name'] != '' && $content['mobileNo'] != '' && $content['password'] != '' && $content['business_city'] != '' && $content['business_display_city'] != ''){

      $currentYear = date("Y");
      $singleYear = date("y");

      $regusers = new Register();
      $regusers = $regusers->fetchRegister("WHERE year = '{$currentYear}' ORDER BY id DESC")->resultSet();
      $totalUserCount = count($regusers);

      $data_count = $totalUserCount + 1;


       if(strlen($data_count) == 1){
          $insert_load = '00'.$data_count;
       } else if(strlen($data_count) == 2){
          $insert_load = '0'.$data_count;
       } else {
          $insert_load = $data_count;
       }

       $userCode = 'JPSR'.$singleYear.$insert_load;

        $data = array();
        $data[] = $userCode;
        $data[] = $content['name'];
        $data[] = $content['mobileNo'];
        $data[] = $content['email'];

        $us_Pass = $content['password'];
        define ("SECRETKEY", "Newmarket$&AppJpsR001@1CustomEr&UserReg@1");
        $confm_Pass = openssl_encrypt($us_Pass, "AES-128-ECB", SECRETKEY);

        $data[] = $confm_Pass;
        $data[] = $content['business_city'];
        $data[] = $content['business_display_city'];
        $data[] = $content['area'];
        $data[] = $content['ward_no'];
        $data[] = $content['aadhaar_no'];
        $data[] = $currentYear;
        $data[] = date("Y-m-d");
        $data[] = date("h:i A");

        $addregister = new Register();
        $addregister = $addregister->addRegister($data);
        $addregisterID = $addregister->lastInsertID();


        if($addregisterID){


          $moBNo = $content['mobileNo'];

          $curl = curl_init();

          $text_msg = "Hi ".$content['name']."! Thanks for registering with http://jpsr.in. Your JPSR member Reference ID is ".$userCode;

          curl_setopt_array($curl, array(
            CURLOPT_URL => "http://sms1.qadir.co.in/api/v4/?api_key=Acdb4d8dbebb912c768e74be4a981a577&method=sms&message=$text_msg&to=$moBNo&sender=JPSRDN",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
          ));


          $response = curl_exec($curl);
          $err = curl_error($curl);
          curl_close($curl);

          if ($err) {
            echo "cURL Error #:" . $err;
          } else {

          $a = json_decode($response, true);

          $sta_name = $a['status'];

          }

          $result = array("code"=>1,"response"=>"Successfully registered","user_code"=>$userCode);

        } else {

          $result = array("code"=>0,"response"=>"Failed to register");

        }


  } else {

    $result = array("code"=>0,"response"=>"All fields are required");

  }


  echo json_encode($result);

?>