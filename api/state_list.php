<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  date_default_timezone_set('Asia/Kolkata');

    $getstates = new Location();
    $getstates = $getstates->fetchState("WHERE status = '1' ORDER BY state_name ASC")->resultSet();

    $postdata = array();

    if($getstates){

      foreach($getstates as $getstate){

      $postdata["id"] = $getstate['id'];
      $postdata["state_name"] = $getstate['state_name'];

      $postd[] = $postdata;

      }

    $result = array("code"=>1,"response"=>"success","data"=>$postd);
  } else {

      $result = array("code"=>0);
  }


  echo json_encode($result);

?>