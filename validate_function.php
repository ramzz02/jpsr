<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  date_default_timezone_set('Asia/Kolkata');


    if($_POST['mobile_no'] != ''){

      $mobile_no = $_POST['mobile_no'];

      $getagentdatas = new Agent();
      $getagentdatas = $getagentdatas->fetchAgent("WHERE mobile_no = '{$mobile_no}' ORDER BY id DESC")->resultSet();

      if (!empty($getagentdatas)) {
        echo 'false';
      } else {
        echo  'true';
      }


    }


?>