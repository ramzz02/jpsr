<?php

$_SERVER['PHP_SELF'];
 
$web_link = "https://$_SERVER[HTTP_HOST]";
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  
//echo '<br>';
$PageNameArr=explode("/",$_SERVER['PHP_SELF']);
//print_r($PageNameArr);
//echo '<br>';
$CrPage=$PageNameArr[count($PageNameArr)-1];

if($CrPage == 'index.php'){
  $pageN = $CrPage;
} else {
  $pageN = $CrPage;
}

$Class1 =($CrPage=='index.php')?'active':'';

if(empty($_SESSION['cityNAME'])){

  $getnamelocations = new Location();
  $getnamelocations = $getnamelocations->fetchLocation("WHERE location_name = 'Hosur' ORDER BY id DESC")->resultSet();
  $getnamelocation = $getnamelocations[0];

  $_SESSION['cityID'] = $getnamelocation['id'];
  $_SESSION['cityNAME'] = $getnamelocation['location_name'];

  header('Location: '.$pageN.'');

}

$getcitieslists = new Location();
$getcitieslists = $getcitieslists->fetchLocation("ORDER BY location_name ASC")->resultSet();


?>
<!-- css file -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fileuploader.css">
<link rel="stylesheet" href="css/style.css?v=0.109">
<link rel="stylesheet" href="css/dashbord_navitaion.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="css/responsive.css?v=0.14">
<!-- Toastr -->
<link href="css/toastr.min.css?0.2" rel="stylesheet">
<!-- Favicon -->
<link href="images/favicon.png" sizes="128x128" rel="shortcut icon" />
		