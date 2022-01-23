<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  date_default_timezone_set('Asia/Kolkata');


    $getlists = new Location();
    $getlists = $getlists->fetchLocation("WHERE status = '1' ORDER BY location_name ASC")->resultSet();

    $postdata = array();

    if($getlists){

      foreach($getlists as $getlist){

      $postdata["id"] = $getlist['id'];
      $postdata["location_name"] = $getlist['location_name'];

      $postd[] = $postdata;

      }

    $result = array("code"=>1,"response"=>"success","data"=>$postd);
  } else {

      $result = array("code"=>0);
  }


  echo json_encode($result);

?>