<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['JPSR_Ad_login'])){
    unset($_SESSION['JPSR_Ad_login']);
    $output = "Logout successfully";
  }

  if(isset($_SESSION['loginerror'])) {
      $output = "Invalid username or password";
      unset($_SESSION['loginerror']);
  }

  if(isset($_POST['submit_login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    define ("SECRETKEY", "Service$&986785JPSR@Webs&Hosur");
    $confm_Pass = openssl_encrypt($password, "AES-128-ECB", SECRETKEY);

    $user = new User();
    $user = $user->login($username, $confm_Pass);

    if($user) {
        header('Location: addbusiness');
    } else {
        header('Location: ../JpsrBuZAd');
    }

  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/headertop.php"); ?>
</head>

<body class="body-bg-full profile-page">
    <div id="wrapper" class="row wrapper">
        <div class="container-min-full-height d-flex justify-content-center align-items-center">
            <div class="login-center">
                <!-- /.navbar-header -->
                <!-- <h2 class="mb-4 text-center">Welcome back!</h2> -->
                <center><img src="../images/logo.png"></center>
                <div class="alert alert-danger" id="message_container" role="alert" style="display: none;">
                   <span class="message" id="message"></span>
                </div>
                <form method="post" id="myform" autocomplete="off">
                    <div class="form-group">
                        <label for="example-email">Username</label>
                        <input type="text" placeholder="Username" class="form-control form-control-line" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="example-password">Password</label>
                        <span toggle="#password" class="login-toggle feather feather-eye-off field-icon toggle-password"></span>
                        <input type="password" placeholder="Password" class="form-control form-control-line" name="password" id="password">
                    </div>
                    <div class="">
                        <button class="btn btn-block btn-lg btn-color-scheme text-uppercase fs-12 fw-600" name="submit_login" type="submit">Login</button>
                    </div>
                    <div class="form-group no-gutters mb-0">
                        <div class="col-md-12 d-flex">
                            <div class="checkbox checkbox-primary mr-auto mr-0-rtl ml-auto-rtl">
                                <label class="d-flex">
                                    <input id="rememberme" type="checkbox" value="rememberme" name="check"> <span class="label-text">Remember me</span>

                                </label>
                            </div>
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                    <!-- /.form-group -->
                </form>
                <!-- /.form-material -->
            </div>
            <!-- /.login-center -->
        </div>
        <!-- /.d-flex -->
    </div>
    <!-- /.body-container -->
    <!-- Scripts -->
    <?php include("includes/footerbottom.php"); ?>
<?php
  if(isset($output)) {
  ?>
  <script>
      $('#message_container').fadeIn(10);
      $('#message').text("<?php echo $output; ?>");
      setTimeout(function() {
          $('#message_container').fadeOut(2000, function() {
              $('#message').text("");
          });
      }, 5000);
  </script>
  <?php
      }
  ?>
</body>
</html>