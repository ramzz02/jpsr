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
  if($content['state_id'] != ''){

    $getDistricts = new Location();
    $getDistricts = $getDistricts->fetchDistrict("WHERE status = '1' AND state_id = '{$content['state_id']}' ORDER BY district_name ASC")->resultSet();

    $postdata = array();

    if($getDistricts){

      foreach($getDistricts as $getDistrict){

      $postdata["id"] = $getDistrict['id'];
      $postdata["district_name"] = $getDistrict['district_name'];

      $postd[] = $postdata;

      }

    $result = array("code"=>1,"response"=>"Success","data"=>$postd);

    } else {

        $result = array("code"=>0,"response"=>"No data");
    }


  } else {

    $result = array("code"=>0,"response"=>"state id is required");

  }


  echo json_encode($result);

?>