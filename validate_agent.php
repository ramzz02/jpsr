<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  date_default_timezone_set('Asia/Kolkata');

    $refered_by_code = $_POST['refered_by_code'];


    $getagentss = new Agent();
    $getagentss = $getagentss->fetchAgent("WHERE agent_code = '{$refered_by_code}' ORDER BY id DESC")->resultSet();
    $getagnt = $getagentss[0];


    if (isset($getagnt)) {
      echo 'true';
    } else {
      echo  'false';
    }


?>