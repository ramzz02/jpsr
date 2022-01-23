<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');


if(isset($_POST["ward_id"]) && !empty($_POST["ward_id"])){
//Get all state data

$getareas = new Location();
$getareas = $getareas->fetchArea("WHERE status = '1' AND location = '{$_POST["location_id"]}' AND ward_no = '{$_POST["ward_id"]}' ORDER BY area ASC")->resultSet();


if(isset($getareas)){

echo '<option value="" Selected Disabled>Select area</option>';

foreach($getareas as $getarea){
echo '<option value="'.$getarea['id'].'">'.$getarea['area'].'</option>';
}

}
else
{

echo '<option value="" Selected Disabled>Location not available</option>';

}

}




?>
