<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  date_default_timezone_set('Asia/Kolkata');

    $mobile_no = $_POST['verify_phone_no'];

    $getregisters = new Register();
    $getregisters = $getregisters->fetchRegister("WHERE phone = '{$mobile_no}' ORDER BY id DESC")->resultSet();

    if (!empty($getregisters)) {
      echo 'true';
    } else {
      echo  'false';
    }


?>