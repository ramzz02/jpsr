<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  date_default_timezone_set('Asia/Kolkata');


    if($_POST['phone'] != ''){

      $mobile_no = $_POST['phone'];

      $getregisters = new Register();
      $getregisters = $getregisters->fetchRegister("WHERE phone = '{$mobile_no}' ORDER BY id DESC")->resultSet();

      if (!empty($getregisters)) {
        echo 'false';
      } else {
        echo  'true';
      }


    } else if($_POST['new_mobile_no'] != ''){

      $mobile_no = $_POST['new_mobile_no'];

      $getregisters = new Register();
      $getregisters = $getregisters->fetchRegister("WHERE phone = '{$mobile_no}' ORDER BY id DESC")->resultSet();

      if (!empty($getregisters)) {
        echo 'false';
      } else {
        echo  'true';
      }


    }


?>