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
  if($content['city_id'] != ''){

    $getwards = new Location();
    $getwards = $getwards->fetchWard("WHERE status = '1' AND location = '{$content['city_id']}' ORDER BY ward_no ASC")->resultSet();

    $postdata = array();

    if($getwards){

      foreach($getwards as $getward){

      $postdata["id"] = $getward['id'];
      $postdata["ward_no"] = $getward['ward_no'];

      $postd[] = $postdata;

      }

    $result = array("code"=>1,"response"=>"Success","data"=>$postd);

    } else {

        $result = array("code"=>0,"response"=>"No data");
    }


  } else {

    $result = array("code"=>0,"response"=>"City is required");

  }


  echo json_encode($result);

?>