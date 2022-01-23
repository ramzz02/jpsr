$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye-slash fa-eye");
    var input = $($(this).attr("toggle"));
    // alert(input.attr("type"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });

$(".toggle-signup-password").click(function() {
    $(this).toggleClass("fa-eye-slash fa-eye");
    var input = $($(this).attr("toggle"));
    // alert(input.attr("type"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });

$(".toggle-your-newpswd-password").click(function() {
    $(this).toggleClass("fa-eye-slash fa-eye");
    var input = $($(this).attr("toggle"));
    // alert(input.attr("type"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });

$(".toggle-your-cnfmpswd-password").click(function() {
    $(this).toggleClass("fa-eye-slash fa-eye");
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
      } else {

      var formData = new FormData();
      var file = document.getElementById("gallery_images").files[0];
      var file2 = document.getElementById("gallery_images").files[1];
      var file3 = document.getElementById("gallery_images").files[2];
      var file4 = document.getElementById("gallery_images").files[3];
      var file5 = document.getElementById("gallery_images").files[4];
      var file6 = document.getElementById("gallery_images").files[5];

      $(".ImgError").remove();

      formData.append("Filedata", file);
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

    }
  
  }
  
  
  function validateLogo() {

    var fii = document.getElementById('logo_image');

    if(fii.files.length == 0){
      $('#logo_code').val('');
    } else {

        var file = document.getElementById("logo_image").files[0];

        $(".LogoError").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
            $('#logo_image').after('<label class="col-md-12 mt-2 text-danger error LogoError">* Please upload jpg,jpeg,png,gif file exactly</label>');
            $('#logo_code').val('');
            document.getElementById("logo_image").value = '';
            document.getElementById("logo_image").focus();
            return false;
        } else if(file.size > 5000000){
            $('#logo_image').after('<label class="col-md-12 mt-2 text-danger error LogoError">* Please select image size less than 5 MB</label>');
            $('#logo_code').val('');
            $('#preview_logo').empty();
            document.getElementById("logo_image").value = '';
            document.getElementById("logo_image").focus();
        } else {
          $('#logo_code').val('1');
        }

      }

  }

  function validatePayemntImage() {

    var fii = document.getElementById('payment_image');

    if(fii.files.length == 0){
    } else {

        var file = document.getElementById("payment_image").files[0];

        $(".PayImageError").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
            $('#payment_image').after('<label class="col-md-12 mt-2 text-danger error PayImageError">* Please upload jpg,jpeg,png,gif file exactly</label>');

            document.getElementById("payment_image").value = '';
            document.getElementById("payment_image").focus();
            return false;
        } else if(file.size > 5000000){
            $('#payment_image').after('<label class="col-md-12 mt-2 text-danger error PayImageError">* Please select image size less than 5 MB</label>');

            $('#preview_payment_image').empty();
            document.getElementById("payment_image").value = '';
            document.getElementById("payment_image").focus();
        } else {

        }

      }

  }


  function galleryImage_1() {

    var fii = document.getElementById('gallery_images_1');

    if(fii.files.length == 0){
    } else {

        var file = document.getElementById("gallery_images_1").files[0];

        $(".GalImg1Error").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
            $('#gallery_images_1').after('<label class="col-md-12 mt-2 text-danger error GalImg1Error">* Please upload jpg,jpeg,png,gif file exactly</label>');

            document.getElementById("gallery_images_1").value = '';
            document.getElementById("gallery_images_1").focus();
            return false;
        } else if(file.size > 5000000){
            $('#gallery_images_1').after('<label class="col-md-12 mt-2 text-danger error GalImg1Error">* Please select image size less than 5 MB</label>');

            $('#preview_gallery_1').empty();
            document.getElementById("gallery_images_1").value = '';
            document.getElementById("gallery_images_1").focus();
        } else {

        }

      }

  }


  function galleryImage_2() {

    var fii = document.getElementById('gallery_images_2');

    if(fii.files.length == 0){
    } else {

        var file = document.getElementById("gallery_images_2").files[0];

        $(".GalImg2Error").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
            $('#gallery_images_2').after('<label class="col-md-12 mt-2 text-danger error GalImg2Error">* Please upload jpg,jpeg,png,gif file exactly</label>');

            document.getElementById("gallery_images_2").value = '';
            document.getElementById("gallery_images_2").focus();
            return false;
        } else if(file.size > 5000000){
            $('#gallery_images_2').after('<label class="col-md-12 mt-2 text-danger error GalImg2Error">* Please select image size less than 5 MB</label>');

            $('#preview_gallery_2').empty();
            document.getElementById("gallery_images_2").value = '';
            document.getElementById("gallery_images_2").focus();
        } else {

        }

      }

  }

  function galleryImage_3() {

    var fii = document.getElementById('gallery_images_3');

    if(fii.files.length == 0){
    } else {

        var file = document.getElementById("gallery_images_3").files[0];

        $(".GalImg3Error").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
            $('#gallery_images_3').after('<label class="col-md-12 mt-2 text-danger error GalImg3Error">* Please upload jpg,jpeg,png,gif file exactly</label>');

            document.getElementById("gallery_images_3").value = '';
            document.getElementById("gallery_images_3").focus();
            return false;
        } else if(file.size > 5000000){
            $('#gallery_images_3').after('<label class="col-md-12 mt-2 text-danger error GalImg3Error">* Please select image size less than 5 MB</label>');

            $('#preview_gallery_3').empty();
            document.getElementById("gallery_images_3").value = '';
            document.getElementById("gallery_images_3").focus();
        } else {

        }

      }

  }


  function galleryImage_4() {

    var fii = document.getElementById('gallery_images_4');

    if(fii.files.length == 0){
    } else {

        var file = document.getElementById("gallery_images_4").files[0];

        $(".GalImg4Error").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
            $('#gallery_images_4').after('<label class="col-md-12 mt-2 text-danger error GalImg4Error">* Please upload jpg,jpeg,png,gif file exactly</label>');

            document.getElementById("gallery_images_4").value = '';
            document.getElementById("gallery_images_4").focus();
            return false;
        } else if(file.size > 5000000){
            $('#gallery_images_4').after('<label class="col-md-12 mt-2 text-danger error GalImg4Error">* Please select image size less than 5 MB</label>');

            $('#preview_gallery_4').empty();
            document.getElementById("gallery_images_4").value = '';
            document.getElementById("gallery_images_4").focus();
        } else {

        }

      }

  }


  function galleryImage_5() {

    var fii = document.getElementById('gallery_images_5');

    if(fii.files.length == 0){
    } else {

        var file = document.getElementById("gallery_images_5").files[0];

        $(".GalImg5Error").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
            $('#gallery_images_5').after('<label class="col-md-12 mt-2 text-danger error GalImg5Error">* Please upload jpg,jpeg,png,gif file exactly</label>');

            document.getElementById("gallery_images_5").value = '';
            document.getElementById("gallery_images_5").focus();
            return false;
        } else if(file.size > 5000000){
            $('#gallery_images_5').after('<label class="col-md-12 mt-2 text-danger error GalImg5Error">* Please select image size less than 5 MB</label>');

            $('#preview_gallery_5').empty();
            document.getElementById("gallery_images_5").value = '';
            document.getElementById("gallery_images_5").focus();
        } else {

        }

      }

  }
  
  
    function validateFrontLogo() {

    var fii = document.getElementById('new_image_path1');

    if(fii.files.length == 0){

    } else {

        var file = document.getElementById("new_image_path1").files[0];

        $(".FrontImageError").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
            $('#new_image_path1').after('<label class="col-md-12 mt-2 text-danger error FrontImageError">* Please upload jpg,jpeg,png,gif file exactly</label>');
            document.getElementById("new_image_path1").value = '';
            document.getElementById("new_image_path1").focus();
            return false;
        } else if(file.size > 2000000){
            $('#new_image_path1').after('<label class="col-md-12 mt-2 text-danger error FrontImageError">* Please select image size less than 2 MB</label>');
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

        $(".BackImageError").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
            $('#new_image_path2').after('<label class="col-md-12 mt-2 text-danger error BackImageError">* Please upload jpg,jpeg,png,gif file exactly</label>');
            document.getElementById("new_image_path2").value = '';
            document.getElementById("new_image_path2").focus();
            return false;
        } else if(file.size > 2000000){
            $('#new_image_path2').after('<label class="col-md-12 mt-2 text-danger error BackImageError">* Please select image size less than 2 MB</label>');
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
    } else {

        var file = document.getElementById("video_path").files[0];
        $(".VideoError").remove();
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "mp4") {
            $('#video_path').after('<label class="col-md-12 mt-2 text-danger error VideoError">* Please upload MP4 file exactly</label>');
            $('#video_code').val('');
            document.getElementById("video_path").value = '';
            document.getElementById("video_path").focus();
            return false;
        }  else if(file.size > 2000000){
            $('#video_path').after('<label class="col-md-12 mt-2 text-danger error VideoError">* Please select video size less than 2 MB</label>');
            $('#video_code').val('');
            $('#preview_video').empty();
            document.getElementById("video_path").value = '';
            document.getElementById("video_path").focus();
        } else {
          $('#video_code').val('1');
        }

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
      
      var reader = new FileReader();
  
      $(reader).on("load", function() {
        $preview.append($("<img/>", {src:this.result, height:100}));
      });
  
      reader.readAsDataURL(file);
      
    }

  }

  function previewPaymentImages() {

  var $preview = $('#preview_payment_image').empty();

  if (this.files) $.each(this.files, readAndPaymentImagePreview);

    function readAndPaymentImagePreview(i, file) {
      
      var reader = new FileReader();
  
      $(reader).on("load", function() {
        $preview.append($("<img/>", {src:this.result, height:100}));
      });
  
      reader.readAsDataURL(file);
      
    }

  }



  function previewGalleryImages_1() {

  var $preview = $('#preview_gallery_1').empty();

  if (this.files) $.each(this.files, readAndGalImagePreview1);

    function readAndGalImagePreview1(i, file) {
      
      var reader = new FileReader();
  
      $(reader).on("load", function() {
        $preview.append($("<img/>", {src:this.result, height:100}));
      });
  
      reader.readAsDataURL(file);
      
    }

  }

  function previewGalleryImages_2() {

  var $preview = $('#preview_gallery_2').empty();

  if (this.files) $.each(this.files, readAndGalImagePreview2);

    function readAndGalImagePreview2(i, file) {
      
      var reader = new FileReader();
  
      $(reader).on("load", function() {
        $preview.append($("<img/>", {src:this.result, height:100}));
      });
  
      reader.readAsDataURL(file);
      
    }

  }

  function previewGalleryImages_3() {

  var $preview = $('#preview_gallery_3').empty();

  if (this.files) $.each(this.files, readAndGalImagePreview3);

    function readAndGalImagePreview3(i, file) {
      
      var reader = new FileReader();
  
      $(reader).on("load", function() {
        $preview.append($("<img/>", {src:this.result, height:100}));
      });
  
      reader.readAsDataURL(file);
      
    }

  }

  function previewGalleryImages_4() {

  var $preview = $('#preview_gallery_4').empty();

  if (this.files) $.each(this.files, readAndGalImagePreview4);

    function readAndGalImagePreview4(i, file) {
      
      var reader = new FileReader();
  
      $(reader).on("load", function() {
        $preview.append($("<img/>", {src:this.result, height:100}));
      });
  
      reader.readAsDataURL(file);
      
    }

  }

  function previewGalleryImages_5() {

  var $preview = $('#preview_gallery_5').empty();

  if (this.files) $.each(this.files, readAndGalImagePreview5);

    function readAndGalImagePreview5(i, file) {
      
      var reader = new FileReader();
  
      $(reader).on("load", function() {
        $preview.append($("<img/>", {src:this.result, height:100}));
      });
  
      reader.readAsDataURL(file);
      
    }

  }
  
  $('#logo_image').on("change", previewLogoImages);

  $('#payment_image').on("change", previewPaymentImages);


  $('#gallery_images_1').on("change", previewGalleryImages_1);
  $('#gallery_images_2').on("change", previewGalleryImages_2);
  $('#gallery_images_3').on("change", previewGalleryImages_3);
  $('#gallery_images_4').on("change", previewGalleryImages_4);
  $('#gallery_images_5').on("change", previewGalleryImages_5);
  
  
  
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
     if (localStorage.market_chkbx && localStorage.market_chkbx != '') {
          $('#remember-me').attr('checked', 'checked');
          $('#login_username').val(localStorage.JPSR_usrname);
          $('#login_password').val(localStorage.JPSR_pass);
      } else {
          $('#remember-me').removeAttr('checked');
          $('#login_username').val('');
          $('#login_password').val('');
      }
  
      $('#remember-me').click(function() {
  
          if ($('#remember-me').is(':checked')) {
            // alert();
              // save username and password
              localStorage.JPSR_usrname = $('#login_username').val();
              localStorage.JPSR_pass = $('#login_password').val();
              localStorage.market_chkbx = $('#remember-me').val();
          } else {
              localStorage.JPSR_usrname = '';
              localStorage.JPSR_pass = '';
              localStorage.market_chkbx = '';
          }
      });
  
  
  });