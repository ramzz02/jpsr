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
  if($content['ward_no'] != ''){

    $getAreas = new Location();
    $getAreas = $getAreas->fetchArea("WHERE status = '1' AND ward_no = '{$content['ward_no']}' ORDER BY area_name ASC")->resultSet();

    $postdata = array();

    if($getAreas){

      foreach($getAreas as $getArea){

      $postdata["id"] = $getArea['id'];
      $postdata["area_name"] = $getArea['area_name'];

      $postd[] = $postdata;

      }

    $result = array("code"=>1,"response"=>"Success","data"=>$postd);

    } else {

        $result = array("code"=>0,"response"=>"No data");
    }


  } else {

    $result = array("code"=>0,"response"=>"Ward no is required");

  }


  echo json_encode($result);

?>