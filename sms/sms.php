 <?php

$curl = curl_init();

$text_msg = "OTP is 767548 for User Verification at JPSR Enterprises. Do not share this OTP to anyone for security reasons.";

 

// $text_msg = "Your JPSR Login OTP 767548 your JPSR reference id JPSR0001";

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://sms1.qadir.co.in/api/v4/?api_key=Acdb4d8dbebb912c768e74be4a981a577&method=sms&message=$text_msg&to=8838272618&sender=JPSRDN",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
//   echo $response[0]['status'];
print_r($response);

// $a = json_decode($response, true);

// print_r($a['status']);
}

?>