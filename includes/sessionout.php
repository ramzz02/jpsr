<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  session_start();
  if(!isset($_SESSION['Marketing_User_login'])) {
    header('Location: index.php');
  }
?>