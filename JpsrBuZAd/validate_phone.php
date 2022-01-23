<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  date_default_timezone_set('Asia/Kolkata');

    if($_POST['type'] == 'register-ur-business') {

    $mobile_no = $_POST['mobile_no'];

    if($_POST['business_edit_id'] != ''){

      $getregisters = new Register();
      $getregisters = $getregisters->fetchRegister("WHERE phone = '{$mobile_no}' ORDER BY id DESC")->resultSet();
      $getregisz = $getregisters[0];

    } else {

      $getregisters = new Register();
      $getregisters = $getregisters->fetchRegister("WHERE phone = '{$mobile_no}' ORDER BY id DESC")->resultSet();
      $getregisz = $getregisters[0];

    }

    if (isset($getregisz)) {
      echo 'false';
    } else {
      echo  'true';
    }

  }

 
?>