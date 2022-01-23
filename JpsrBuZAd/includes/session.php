<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  session_start();
  if(!isset($_SESSION['JPSR_Ad_login'])) {
    header('Location: index.php');
  }
?>