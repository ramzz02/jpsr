<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

if(isset($_POST["location_id"]) && !empty($_POST["location_id"])){
//Get all state data

$getwards = new Location();
$getwards = $getwards->fetchWard("WHERE status = '1' AND location = '{$_POST["location_id"]}' ORDER BY ward_no ASC")->resultSet();


//Display states list
$res = array();

if(isset($getwards)){

$res["status"]= "success";

$res["data"]= '<option value="" Selected Disabled>Select ward no</option>';

foreach($getwards as $getward){
$partner_id = $getward['id'];
$res["data"] .= '<option value="'.$getward['id'].'">'.$getward['ward_no'].'</option>';
}

}
else
{
$res["status"] = "failed";

$res["data"] = '<option value="" Selected Disabled>Ward no not available</option>';

}
echo json_encode($res);
}


?>
