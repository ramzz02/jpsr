$(".toggle-password").click(function() {
  $(this).toggleClass("feather-eye-off feather-eye");
  var input = $($(this).attr("toggle"));
  // alert(input.attr("type"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});



      function validateImage() {

      var fi = document.getElementById('gallery_images');

      if(fi.files.length == 0){
        $('#gallery_code').val('');

        var LImg = $('#logo_code').val();
        var GImg = $('#gallery_code').val();
        var VImg = $('#video_code').val();

        if(LImg == 1 || GImg == 1 || VImg == 1){
          $('#payRequirePath').show();
        } else {
          $('#payRequirePath').hide();
        }


      }
      var formData = new FormData();
      var file = document.getElementById("gallery_images").files[0];
      var file2 = document.getElementById("gallery_images").files[1];
      var file3 = document.getElementById("gallery_images").files[2];
      var file4 = document.getElementById("gallery_images").files[3];
      var file5 = document.getElementById("gallery_images").files[4];
      var file6 = document.getElementById("gallery_images").files[5];
      formData.append("Filedata", file);

      $(".ImgError").remove();
      var t = file.type.split('/').pop().toLowerCase();
      if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
          $('#gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          $('#gallery_code').val('');
          document.getElementById("gallery_images").value = '';
          document.getElementById("gallery_images").focus();
          return false;
      } else if(file.size > 2000000){
            $('#gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please select image size less than 2 MB</label>');
            $('#gallery_code').val('');
            $('#preview_gallery').empty();
            document.getElementById("gallery_images").value = '';
            document.getElementById("gallery_images").focus();
        } else {
          $('#gallery_code').val('1');
      }
      formData.append("Filedata", file2);
      var t2 = file2.type.split('/').pop().toLowerCase();
      if (t2 != "jpeg" && t2 != "jpg" && t2 != "png" && t2 != "gif") {
          $('#gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          $('#gallery_code').val('');
          document.getElementById("gallery_images").value = '';
          document.getElementById("gallery_images").focus();
          return false;
      } else if(file2.size > 2000000){
            $('#gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please select image size less than 2 MB</label>');
            $('#gallery_code').val('');
            $('#preview_gallery').empty();
            document.getElementById("gallery_images").value = '';
            document.getElementById("gallery_images").focus();
        } else {
          $('#gallery_code').val('1');
      }
      formData.append("Filedata", file3);
      var t3 = file3.type.split('/').pop().toLowerCase();
      if (t3 != "jpeg" && t3 != "jpg" && t3 != "png" && t3 != "gif") {
          $('#gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          $('#gallery_code').val('');
          document.getElementById("gallery_images").value = '';
          document.getElementById("gallery_images").focus();
          return false;
      } else if(file3.size > 2000000){
            $('#gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please select image size less than 2 MB</label>');
            $('#gallery_code').val('');
            $('#preview_gallery').empty();
            document.getElementById("gallery_images").value = '';
            document.getElementById("gallery_images").focus();
        } else {
          $('#gallery_code').val('1');
      }
      formData.append("Filedata", file4);
      var t4 = file4.type.split('/').pop().toLowerCase();
      if (t4 != "jpeg" && t4 != "jpg" && t4 != "png" && t4 != "gif") {
          $('#gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          $('#gallery_code').val('');
          document.getElementById("gallery_images").value = '';
          document.getElementById("gallery_images").focus();
          return false;
      } else if(file4.size > 2000000){
            $('#gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please select image size less than 2 MB</label>');
            $('#gallery_code').val('');
            $('#preview_gallery').empty();
            document.getElementById("gallery_images").value = '';
            document.getElementById("gallery_images").focus();
        } else {
          $('#gallery_code').val('1');
      }
      formData.append("Filedata", file5);
      var t5 = file5.type.split('/').pop().toLowerCase();
      if (t5 != "jpeg" && t5 != "jpg" && t5 != "png" && t5 != "gif") {
          $('#gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
          $('#gallery_code').val('');
          document.getElementById("gallery_images").value = '';
          document.getElementById("gallery_images").focus();
          return false;
      } else if(file5.size > 2000000){
            $('#gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please select image size less than 2 MB</label>');
            $('#gallery_code').val('');
            $('#preview_gallery').empty();
            document.getElementById("gallery_images").value = '';
            document.getElementById("gallery_images").focus();
        } else {
          $('#gallery_code').val('1');
      }
      formData.append("Filedata", file6);
      var t6 = file6.type.split('/').pop().toLowerCase();
      if (t6) {
          $('#gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Maximum 5 images only allowed</label>');
          $('#gallery_code').val('');
          document.getElementById("gallery_images").value = '';
          document.getElementById("gallery_images").focus();
          return false;
      } else {
          $('#gallery_code').val('1');
      }

      var LImg = $('#logo_code').val();
      var GImg = $('#gallery_code').val();
      var VImg = $('#video_code').val();

      if(LImg == 1 || GImg == 1 || VImg == 1){
        $('#payRequirePath').show();
      } else {
        $('#payRequirePath').hide();
      }
  }



      function validateLogo() {

        var fii = document.getElementById('logo_image');

        if(fii.files.length == 0){
          $('#logo_code').val('');

          $('#logo_subscription_type').empty();

          var LImg = $('#logo_code').val();
          var GImg = $('#gallery_code').val();
          var VImg = $('#video_code').val();

          if(LImg == 1 || GImg == 1 || VImg == 1){
            $('#payRequirePath').show();
          } else {
            $('#payRequirePath').hide();
          }


        }

        var file = document.getElementById("logo_image").files[0];

        $(".LogoError").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
            $('#logo_image').after('<label class="col-md-12 mt-2 text-danger error LogoError">* Please upload jpg,jpeg,png,gif file exactly</label>');
            $('#logo_code').val('');
            document.getElementById("logo_image").value = '';
            document.getElementById("logo_image").focus();
            return false;
        } else if(file.size > 2000000){
            $('#logo_image').after('<label class="col-md-12 mt-2 text-danger error LogoError">* Please select image size less than 2 MB</label>');
            $('#logo_code').val('');
            $('#preview_logo').empty();
            document.getElementById("logo_image").value = '';
            document.getElementById("logo_image").focus();
        } else {
          $('#logo_code').val('1');
        }

        var LImg = $('#logo_code').val();
        var GImg = $('#gallery_code').val();
        var VImg = $('#video_code').val();

        if(LImg == 1 || GImg == 1 || VImg == 1){
          $('#payRequirePath').show();
        } else {
          $('#payRequirePath').hide();
        }
      }
      
      
        function validateFrontLogo() {

    var fii = document.getElementById('new_image_path1');

    if(fii.files.length == 0){

    } else {

        var file = document.getElementById("new_image_path1").files[0];

        $(".LogoError").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
            $('#new_image_path1').after('<label class="col-md-12 mt-2 text-danger error LogoError">* Please upload jpg,jpeg,png,gif file exactly</label>');
            document.getElementById("new_image_path1").value = '';
            document.getElementById("new_image_path1").focus();
            return false;
        } else if(file.size > 2000000){
            $('#new_image_path1').after('<label class="col-md-12 mt-2 text-danger error LogoError">* Please select image size less than 2 MB</label>');
            $('#preview_image_one').empty();
            document.getElementById("new_image_path1").value = '';
            document.getElementById("new_image_path1").focus();
        } else {
        }

      }

  }

  function validateSecondLogo() {

    var fii = document.getElementById('new_image_path2');

    if(fii.files.length == 0){

    } else {

        var file = document.getElementById("new_image_path2").files[0];

        $(".LogoError").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
            $('#new_image_path2').after('<label class="col-md-12 mt-2 text-danger error LogoError">* Please upload jpg,jpeg,png,gif file exactly</label>');
            document.getElementById("new_image_path2").value = '';
            document.getElementById("new_image_path2").focus();
            return false;
        } else if(file.size > 2000000){
            $('#new_image_path2').after('<label class="col-md-12 mt-2 text-danger error LogoError">* Please select image size less than 2 MB</label>');
            $('#preview_image_two').empty();
            document.getElementById("new_image_path2").value = '';
            document.getElementById("new_image_path2").focus();
        } else {
        }

      }

  }


      function validateVideo() {

        var fiii = document.getElementById('video_path');

        if(fiii.files.length == 0){
          $('#video_code').val('');

          var LImg = $('#logo_code').val();
          var GImg = $('#gallery_code').val();
          var VImg = $('#video_code').val();

          if(LImg == 1 || GImg == 1 || VImg == 1){
            $('#payRequirePath').show();
          } else {
            $('#payRequirePath').hide();
          }


        }

        var file = document.getElementById("video_path").files[0];
        $(".VideoError").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "mp4") {
            $('#video_path').after('<label class="col-md-12 mt-2 text-danger error VideoError">* Please upload MP4 file exactly</label>');
            $('#video_code').val('');
            document.getElementById("video_path").value = '';
            document.getElementById("video_path").focus();
            return false;
        } else if(file.size > 2000000){
            $('#video_path').after('<label class="col-md-12 mt-2 text-danger error VideoError">* Please select video size less than 2 MB</label>');
            $('#video_code').val('');
            $('#preview_video').empty();
            document.getElementById("video_path").value = '';
            document.getElementById("video_path").focus();
        } else {
          $('#video_code').val('1');
        }

        var LImg = $('#logo_code').val();
        var GImg = $('#gallery_code').val();
        var VImg = $('#video_code').val();

        if(LImg == 1 || GImg == 1 || VImg == 1){
          $('#payRequirePath').show();
        } else {
          $('#payRequirePath').hide();
        }



      }


  function previewImages() {

  var $preview = $('#preview_gallery').empty();

  if (this.files) $.each(this.files, readAndPreview);

  function readAndPreview(i, file) {
    
    // if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
    //   return alert(file.name +" is not an image");
    // } // else...
    
    var reader = new FileReader();

    $(reader).on("load", function() {
      $preview.append($("<img/>", {src:this.result, height:100}));
    });

    reader.readAsDataURL(file);
    
  }

}

$('#gallery_images').on("change", previewImages);


  function previewLogoImages() {

  var $preview = $('#preview_logo').empty();

  if (this.files) $.each(this.files, readAndLogoPreview);

  function readAndLogoPreview(i, file) {
    
    // if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
    //   return alert(file.name +" is not an image");
    // } // else...
    
    var reader = new FileReader();

    $(reader).on("load", function() {
      $preview.append($("<img/>", {src:this.result, height:100}));
    });

    reader.readAsDataURL(file);
    
  }

}

$('#logo_image').on("change", previewLogoImages);




  function previewNewImagesfirst() {

  var $previewfirst = $('#preview_image_one').empty();

  if (this.files) $.each(this.files, readAndFirstPreview);

    function readAndFirstPreview(i, file) {
      
      var reader = new FileReader();
  
      $(reader).on("load", function() {
        $previewfirst.append($("<img/>", {src:this.result, height:100}));
      });
  
      reader.readAsDataURL(file);
      
    }

  }

  function previewNewImagessecond() {

  var $previewsecond = $('#preview_image_two').empty();

  if (this.files) $.each(this.files, readAndSecondPreview);

    function readAndSecondPreview(i, file) {
      
      var reader = new FileReader();
  
      $(reader).on("load", function() {
        $previewsecond.append($("<img/>", {src:this.result, height:100}));
      });
  
      reader.readAsDataURL(file);
      
    }

  }



  $('#new_image_path1').on("change", previewNewImagesfirst);
  $('#new_image_path2').on("change", previewNewImagessecond);


  function previewVideoImages() {

  var $preview = $('#preview_video').empty();

  if (this.files) $.each(this.files, readAndVideoPreview);

  function readAndVideoPreview(i, file) {
    
    // if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
    //   return alert(file.name +" is not an image");
    // } // else...
    
    var reader = new FileReader();

    $(reader).on("load", function() {
      $preview.append($("<video/>", {src:this.result, height:100}));
    });

    reader.readAsDataURL(file);
    
  }

}

$('#video_path').on("change", previewVideoImages);


$(function () {

   ////////// remember me ////////////
   if (localStorage.ad_market_chkbx && localStorage.ad_market_chkbx != '') {
        $('#rememberme').attr('checked', 'checked');
        $('#username').val(localStorage.JPSR_ad_usrname);
        $('#password').val(localStorage.JPSR_ad_pass);
    } else {
        $('#rememberme').removeAttr('checked');
        $('#username').val('');
        $('#password').val('');
    }

    $('#rememberme').click(function() {

        if ($('#rememberme').is(':checked')) {
            // save username and password
            localStorage.JPSR_ad_usrname = $('#username').val();
            localStorage.JPSR_ad_pass = $('#password').val();
            localStorage.ad_market_chkbx = $('#rememberme').val();
        } else {
            localStorage.JPSR_ad_usrname = '';
            localStorage.JPSR_ad_pass = '';
            localStorage.ad_market_chkbx = '';
        }
    });


});