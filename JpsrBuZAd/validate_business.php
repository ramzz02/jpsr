<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  date_default_timezone_set('Asia/Kolkata');

    if($_POST['type'] == 'register-ur-business') {

    $business_name = $_POST['business_name'];

    if($_POST['business_edit_id'] != ''){

      $getbusiness = new Business();
      $getbusiness = $getbusiness->fetchBusiness("WHERE business_name = '{$business_name}' AND id !='{$_POST['business_edit_id']}' ORDER BY id DESC")->resultSet();
      $getbusz = $getbusiness[0];

    } else {

      $getbusiness = new Business();
      $getbusiness = $getbusiness->fetchBusiness("WHERE business_name = '{$business_name}' ORDER BY id DESC")->resultSet();
      $getbusz = $getbusiness[0];

    }

    if (isset($getbusz)) {
      echo 'false';
    } else {
      echo  'true';
    }

  }

 
?>