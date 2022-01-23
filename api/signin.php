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
  if($content['mobileNo'] != '' && $content['password'] != ''){

    $mobile_no = $content['mobileNo'];

    $MobNolength = strlen((string)$mobile_no);

    $password = $content['password'];

    define ("SECRETKEY", "Newmarket$&AppJpsR001@1CustomEr&UserReg@1");
    $confm_Pass = openssl_encrypt($password, "AES-128-ECB", SECRETKEY);


    if($MobNolength == 10){


      $registerexists = new Register();
      $registerexists = $registerexists->fetchRegister("WHERE phone = '{$mobile_no}' AND password = '{$confm_Pass}' ORDER BY id DESC")->resultSet();

      if(empty($registerexists)){

        $result = array("code"=>0,"response"=>"Invalid username or password");

      } else {

        $result = array("code"=>1,"response"=>"Login success","user_id"=>$registerexists[0]['id']);
      } 


    } else {
        $result = array("code"=>0,"response"=>"please enter 10 digit mobile no");
    }


  } else {

    $result = array("code"=>0,"response"=>"All fields are required");

  }


  echo json_encode($result);

?>