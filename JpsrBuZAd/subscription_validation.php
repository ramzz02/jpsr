<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  date_default_timezone_set('Asia/Kolkata');

  if($_POST['type'] != '') {


        if($_POST['type'] == 'ads'){

        $type = $_POST['type'];
        $subs_type = $_POST['subs_type'];

        $getperiods = new Advertisement();
        $getperiods = $getperiods->fetchPeriod("WHERE period = '{$subs_type}' AND status = '1' ORDER BY id ASC")->resultSet();
        $getperiod = $getperiods[0];

        $getamounts = new Advertisement();
        $getamounts = $getamounts->fetchSubscription("WHERE period = '{$getperiod['id']}' AND status = '1' ORDER BY id DESC")->resultSet();
        $getamount = $getamounts[0];

        $res = array();

        if($getamount){

        $res["status"] = 1;
        $res["amount"] = $getamount['amount'];

        } else {

        $res["status"] = 0;

        }

        echo json_encode($res);


        } else {

        $type = $_POST['type'];
        $subs_type = $_POST['subs_type'];

        $getperiods = new Business();
        $getperiods = $getperiods->fetchPeriod("WHERE period = '{$subs_type}' AND status = '1' ORDER BY id ASC")->resultSet();
        $getperiod = $getperiods[0];

        $getamounts = new Business();
        $getamounts = $getamounts->fetchSubscription("WHERE type = '{$_POST['type']}' AND period = '{$getperiod['id']}' AND status = '1' ORDER BY id DESC")->resultSet();
        $getamount = $getamounts[0];

        $res = array();

        if($getamount){

        $res["status"] = 1;
        $res["amount"] = $getamount['amount'];

        } else {

        $res["status"] = 0;

        }

        echo json_encode($res);


      }

  }

 
?>