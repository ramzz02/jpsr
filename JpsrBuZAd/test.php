<?php 

$password = '123456';

define ("SECRETKEY", "Service$&986785JPSR@Webs&Hosur");
echo $confm_Pass = openssl_encrypt($password, "AES-128-ECB", SECRETKEY);

?>