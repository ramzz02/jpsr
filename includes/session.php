<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();

  if(isset($_SESSION['Marketing_User_login'])){

  	$member_name = $_SESSION['Marketing_User_login']['name'];
  	$member_phone = $_SESSION['Marketing_User_login']['phone'];
  	$member_email = $_SESSION['Marketing_User_login']['email'];
    $member_code = $_SESSION['Marketing_User_login']['user_code'];

  } else {

  	$member_name = '';
  	$member_phone = '';
  	$member_email = '';

  }



?>