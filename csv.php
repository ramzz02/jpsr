<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jpsr_hosur_services";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['upload_submit'])) {


  if(isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != "") {


        $file = $_FILES['uploadFile']['tmp_name'];
        $handle = fopen($file, "r");
        $c = 0;
        while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
            
//         if($c > 0){
// echo 1;
// exit();
        $steels1 = $filesop[0];

        $querytrans="INSERT into business_category_list(category_name,status) VALUES ('$steels1','1')";
        $resulttrans= mysqli_query($conn,$querytrans);
        $Transid= mysqli_insert_id($conn);


        $c = $c + 1;
        
        // }

        }

        if($Transid) {
        header('Location: csv.php');
        } else {
        header("Location: csv.php");
        }

  }
}


?>


        <form method="post" id="ImportFor" autocomplete="none" enctype="multipart/form-data" >

        <div class="alert alert-danger" id="message_container" role="alert" style="display: none;">
           <span class="message" id="message"></span>
        </div>
        
        <div class="row">
      <div class="col">
          <div class="col-md-3"></div>
    <div class="col-md-8 head">
        <div class="form-group" style="margin-bottom: 20px;">
            <label class="col-sm-6 col-form-label" for="poid" style="text-align: right;">Customer No</label>
            <div class="col-sm-6">
            <input type="file" class="form-control" id="uploadFile" name="uploadFile"  required autocomplete="off" >
            <p><span class="tx-danger">*</span> CSV only upload</p>
            </div>
        </div>
        <div style="clear: both;"></div>

        <br>

  
    <div class="form-group">
        <label class="col-sm-7" for="capture"></label>
        <div class="col-sm-5">
      <button type="submit" name="upload_submit" id="csvBtn" class="btn btn-success suc"><i class="fa fa-search"></i> Upload </button>
      <button type="button"  id="csvBtn2" style="display:none;background-color:#939d93;border-color:#939d93;cursor:no-drop;" class="btn btn-success suc" > Loading ... <img src="images/loading.gif" style="width:24px;"> </button>
      </div>
    </div>

    <div style="clear: both;"></div>

        <br>
  
    </div>
    <div class="col-md-3"></div>
        </div>
    </div>

    </form>