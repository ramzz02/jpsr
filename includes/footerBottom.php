<!-- Wrapper End -->
<script src="js/jquery-3.4.1.min.js"></script> 
<script src="js/jquery-3.6.0.js"></script>
<script src="js/jquery-migrate-3.0.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mmenu.all.js"></script>
<script src="js/ace-responsive-menu.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/isotop.js"></script>
<script src="js/snackbar.min.js"></script>
<script src="js/simplebar.js"></script>
<script src="js/parallax.js"></script>
<script src="js/scrollto.js"></script>
<script src="js/jquery-scrolltofixed-min.js"></script>
<script src="js/jquery.counterup.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/progressbar.js"></script>
<script src="js/slider.js"></script>
<script src="js/timepicker.js"></script>
<!-- Custom script for all pages --> 
<script src="js/jquery.smartuploader.js"></script>
<script src="js/dashboard-script.js"></script>
<script src="js/google-map-api.js"></script>
<script src="js/googlemaps1.js"></script>
<!-- Custom script for all pages --> 
<script src="js/script.js"></script>
<script src="js/jquery_custom.js?v=0.1"></script>
<!-- <script src="js/states.js"></script> -->
<!-- nicEdit -->
<script src="js/nicEdit-latest.js?v=0.2"></script>
<!-- Toastr -->
<script src="js/toastr.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="js/jpsr_validation.js?v=0.61"></script>
<script src="js/function.js?v=0.13"></script>
<script src="js/edit_function.js?v=0.2"></script>
<script type="text/javascript" src="js/element.js?cb=googleTranslateElementInit"></script>
<script src="js/jquery.popup.lightbox.js"></script>
<script>
         $(document).ready(function(){

         $(".img-container").popupLightbox({
          width: 600,
      height: 450
         });


         });
      </script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    // pageLanguage: 'en',
    includedLanguages: 'en,ta,te,kn,hi',
}, 'google_translate_element');
  
}
</script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
new nicEditor().panelInstance('editor21');
});
bkLib.onDomLoaded(function() {
new nicEditor().panelInstance('editor22');
});
</script>

<script type="text/javascript">
$(function () {
    $("#terms").click(function () {
        if ($(this).is(":checked")) {
            $("#term_id").val('1');
            $("#term_id").hide();
        } else {
            $("#term_id").val('');
            $("#term_id").show();
        }
    });
});
</script>
<script type="text/javascript">

$(document).ready(function(){

  // $('#business_display_city').on('change',function(){

  // var loca_id = $(this).val();

  // if(loca_id){

  // $.ajax({

  // type:'POST',

  // url:'listOfDatas.php',

  // data:'location_id='+loca_id+'&name=wardNo',

  // success:function(response){
  //    var parsedData = jQuery.parseJSON(response);
  // // alert(parsedData.data);
  // if(parsedData.status == 'success'){
  //    $('#ward_no').html(parsedData.data);
  // } else {
  //    $('#ward_no').html(parsedData.data);
  // }

  // }

  // });

  // }else{

  // $('#ward_no').html('<option value="">Select business city first</option>');

  // }

  // });


  $('#signup_area').on('change',function(){

  var area_id = $(this).val();

  if(area_id){

  $.ajax({

  type:'POST',

  url:'listOfDatas.php',

  data:'area_id='+area_id+'&name=signup_wardNo',

  success:function(response){
     var parsedData = jQuery.parseJSON(response);
  alert(parsedData.ward_no);
  if(parsedData.status == 'success'){
    // alert(parsedData.data);
     $('#ward_no').val(parsedData.ward_no);
  } else {
     $('#ward_no').val(parsedData.ward_no);
  }

  }

  });

  }else{

  $('#signup_area').val('');

  }

  });

  $('#ward_no').on('change',function(){

  var ward_id = $(this).val();

  if(ward_id){

  $.ajax({

  type:'POST',

  url:'listOfDatas.php',

  data:'ward_id='+ward_id+'&name=areaName',

  success:function(response){
     var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.data);
  if(parsedData.status == 'success'){
     $('#area').html(parsedData.data);
  } else {
     $('#area').html(parsedData.data);
  }

  }

  });

  }else{

  $('#area').html('<option value="">Select ward no first</option>');

  }

  });

  $('#phone').on('keyup',function(){

  var phoneNo = $('#phone').val();
  // alert($("#phone").val().length);
  if($("#phone").val().length == 10){
    // alert();
  $.ajax({

  type:'POST',

  url:'sendSMS.php',

  data:'mobileNo='+phoneNo,

  success:function(response){
    var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.status);
  if(parsedData.status == 'exists'){
     $('#showOTP').hide();
  } else if(parsedData.status == 'OK'){
     $('#showOTP').show();
     $('#phone').attr("readonly","true");
  } else {
     $('#showOTP').hide();
     // $('#showOTP').show();
     // $('#phone').attr("readonly","true");
  }

  }

  });

  }

});


$('.otp_verify').on('keyup',function(){

var otpNo = $('#otp_no').val();
var phoneNo = $('#phone').val();

if($("#otp_no").val().length == 6){
// alert(otpNo);
$.ajax({

type:'POST',

url:'SMSverify.php',

data:'phone='+phoneNo+'&otp_no='+otpNo,

success:function(response){
if(response == 'true'){
   $('#OTPsuccess').show();
   $('#otp_no').attr("readonly","true");
} else {
   $('#OTPsuccess').hide();
}

}

});

}

});



$('.reset_check_mobile').on('keyup',function(){

  var phoneNo = $('#verify_phone_no').val();
  // alert($("#phone").val().length);
  if($("#verify_phone_no").val().length == 10){
    // alert();
  $.ajax({

  type:'POST',

  url:'verifyRegister.php',

  data:'mobileNo='+phoneNo,

  success:function(response){
    var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.status);
  if(parsedData.status == 'exists'){
     $('#ForgotOTPDisplay').hide();
     $('.reset_password_submit').attr("disabled", true);
  } else if(parsedData.status == 'OK'){
     $('#ForgotOTPDisplay').show();
     $('#verify_phone_no').attr("readonly","true");
     $('.reset_password_submit').attr("disabled", false);
  } else {
     $('#ForgotOTPDisplay').hide();
     $('.reset_password_submit').attr("disabled", true);
     // $('#showOTP').show();
     // $('#phone').attr("readonly","true");
  }

  }

  });

  }

});


$('.otp_forgot_verify').on('keyup',function(){

var otpNo = $('#reset_otp_no').val();
var phoneNo = $('#verify_phone_no').val();

if($("#reset_otp_no").val().length == 6){
// alert(otpNo);
$.ajax({

type:'POST',

url:'SMSverify.php',

data:'phone='+phoneNo+'&otp_no='+otpNo,

success:function(response){
if(response == 'true'){
   $('#reset_otp_no').attr("readonly", true);
} else {
  $('#reset_otp_no').attr("readonly", false);
}

}

});

}

});



$('#business_refered_by_code').on('keyup',function(){

var BusRef_code = $('#business_refered_by_code').val();

if(BusRef_code){
  // alert(BusRef_code);

$.ajax({

type:'POST',

url:'listOfDatas.php',

data:'reference_code='+BusRef_code+'&name=agentverification',

success:function(response){
   var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.name);
  if(parsedData.status == 'success'){
     $('#refered_by').val(parsedData.name);
  } else {
     $('#refered_by').val(parsedData.name);
  }

}

});

}

});



});

</script>

<?php
  if(isset($output)) {
  ?>
  <script>
    <?php if($output == 1){ ?>
      toastr.success("Successfully registered","",{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 0){ ?>
     toastr.error("Failed to register","",{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 3){ ?>
    toastr.success("Login success","",{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 4){ ?>
        toastr.error("Invalid username or password","",{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 5){ ?>
        toastr.success("Logout successfully","",{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 601){ ?>
    toastr.success("Password changed. Login now","",{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 602){ ?>
        toastr.error("Failed to update","",{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 333){ ?>
        toastr.error("Your profile is blocked. Contact your administrator","",{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } ?>
          
  </script>
  <?php } ?>
