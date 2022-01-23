<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  date_default_timezone_set('Asia/Kolkata');

    if($_POST['phone'] != '' && $_POST['otp_no'] != ''){

    $mobile_no = $_POST['phone'];
    $otp_no = $_POST['otp_no'];

    $getregisters = new OTP();
    $getregisters = $getregisters->fetchOTP("WHERE mobile_no = '{$mobile_no}' AND otp = '{$otp_no}' ORDER BY id DESC")->resultSet();

    if (empty($getregisters)) {
      echo 'false';
    } else {
      echo 'true';
    }

  }


  // if($_POST['phone'] != '' && $_POST['otp_no'] != ''){

  //   $mobile_no = $_POST['phone'];
  //   $otp_no = $_POST['otp_no'];

  //   $getregisters = new OTP();
  //   $getregisters = $getregisters->fetchOTP("WHERE mobile_no = '{$mobile_no}' AND otp = '{$otp_no}' ORDER BY id DESC")->resultSet();

  //   if (empty($getregisters)) {
  //     echo 'false';
  //   } else {
  //     echo 'true';
  //   }

  // }


?>