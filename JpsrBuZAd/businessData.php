<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  date_default_timezone_set('Asia/Kolkata');

if(isset($_POST["buzz_name"]) && !empty($_POST["buzz_name"])){
//Get all state data

$getbusiness = new Business();
$getbusiness = $getbusiness->fetchBusiness("WHERE business_name = '{$_POST['buzz_name']}' ORDER BY id DESC")->resultSet();
$getbusz = $getbusiness[0];

//Display states list
$res = array();

if(isset($getbusz)){

$res["status"]= "success";
$res["business_id"]= $getbusz['id'];
$res["person_name"]= $getbusz['person_name'];
$res["mobile_no"]= $getbusz['mobile_no'];
$res["email"]= $getbusz['email'];
$res["address"]= $getbusz['address'];

} else {
$res["status"] = "failed";
$res["business_id"]= "";
$res["person_name"]= "";
$res["mobile_no"]= "";
$res["email"]= "";
$res["address"]= "";

}
echo json_encode($res);
}


?>

