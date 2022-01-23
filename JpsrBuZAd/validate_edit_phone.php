<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  date_default_timezone_set('Asia/Kolkata');


    if($_POST['phone'] != '' && $_POST['user_id'] != ''){

      $mobile_no = $_POST['phone'];

      $getregisters = new Register();
      $getregisters = $getregisters->fetchRegister("WHERE id != '{$_POST['user_id']}' AND phone = '{$mobile_no}' ORDER BY id DESC")->resultSet();

      if (!empty($getregisters)) {
        echo 'false';
      } else {
        echo  'true';
      }


    }


?>