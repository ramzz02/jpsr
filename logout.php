<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  session_start();

  $_SERVER['PHP_SELF'];

  // $web_link = "http://$_SERVER[HTTP_HOST]";
  $web_link = "index.php";
  // $web_link = "http://jpsr.in";
  $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  
  if(isset($_SESSION['Marketing_User_login'])) {
  	unset($_SESSION['Marketing_User_login']);
  	$_SESSION['user_logout'] = true;
  	$_SESSION['logout_success'] = 1;
    header('Location: '.$web_link.'');
  }
?>