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


$getcitieslists = new Location();
$getcitieslists = $getcitieslists->fetchLocation("ORDER BY location_name ASC")->resultSet();

$getsignupAreas = new Location();
$getsignupAreas = $getsignupAreas->fetchArea("WHERE status = '1' AND location = '1' ORDER BY area_name ASC")->resultSet();

$getsocialmedias = new Media();
$getsocialmedias = $getsocialmedias->fetchMedia("WHERE location = '1' ORDER BY id ASC")->resultSet();
$getsocialmedia = $getsocialmedias[0];

?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="JPSR Services">
<meta name="description" content="JPSR is a local guide for all your needs.">
<!-- css file -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fileuploader.css">
<link rel="stylesheet" href="css/style.css?v=0.134">
<link rel="stylesheet" href="css/dashbord_navitaion.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="css/responsive.css?v=0.23">
<!-- Toastr -->
<link href="css/toastr.min.css?0.2" rel="stylesheet">
<!-- Title -->
<title>JPSR - Know your Neighbors</title>
<!-- Favicon -->
<link href="images/favicon.png" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="images/favicon.png" sizes="128x128" rel="shortcut icon" />
<!--Animate CSS-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet" />
<!--Popup Lightbox Js-->
<!--Popup Lightbox CSS-->
<link href="css/popup-lightbox.css?v=0.3" rel="stylesheet" />
		