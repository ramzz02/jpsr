
      function edit_validateImage() {

        var fi = document.getElementById('edit_gallery_images');
  
        if(fi.files.length == 0){
          $('#edit_gallery_code').val('');
  
          var LImg = $('#edit_logo_code').val();
          var GImg = $('#edit_gallery_code').val();
          var VImg = $('#edit_video_code').val();
  
          if(LImg == 1 || GImg == 1 || VImg == 1){
              $('#updateRequirePath').show();
            } else {
              $('#updateRequirePath').hide();
            }
  
        } else {
  
            var LImg = $('#edit_logo_code').val();
            var GImg = $('#edit_gallery_code').val();
            var VImg = $('#edit_video_code').val();
  
            if(LImg == 1 || GImg == 1 || VImg == 1){
                $('#updateRequirePath').show();
              } else {
                $('#updateRequirePath').hide();
              }
              
            var formData = new FormData();
            var file = document.getElementById("edit_gallery_images").files[0];
            var file2 = document.getElementById("edit_gallery_images").files[1];
            var file3 = document.getElementById("edit_gallery_images").files[2];
            var file4 = document.getElementById("edit_gallery_images").files[3];
            var file5 = document.getElementById("edit_gallery_images").files[4];
            var file6 = document.getElementById("edit_gallery_images").files[5];
            formData.append("Filedata", file);
  
            $(".ImgError").remove();
            var t = file.type.split('/').pop().toLowerCase();
            if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
                $('#edit_gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
                $('#edit_gallery_code').val('');
                var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
  
                $('#edit_preview_gallery').empty();
                document.getElementById("edit_gallery_images").value = '';
                document.getElementById("edit_gallery_images").focus();
                return false;
            } else if(file.size > 2000000){
                  $('#edit_gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please select image size less than 2 MB</label>');
                  $('#edit_gallery_code').val('');
                  var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
                  $('#edit_preview_gallery').empty();
                  document.getElementById("edit_gallery_images").value = '';
                  document.getElementById("edit_gallery_images").focus();
              } else {
                  $('#edit_gallery_code').val('1');
                  var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
            }
            formData.append("Filedata", file2);
            var t2 = file2.type.split('/').pop().toLowerCase();
            if (t2 != "jpeg" && t2 != "jpg" && t2 != "png" && t2 != "gif") {
                $('#edit_gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
                $('#edit_gallery_code').val('');
                var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
                $('#edit_preview_gallery').empty();
                document.getElementById("edit_gallery_images").value = '';
                document.getElementById("edit_gallery_images").focus();
                return false;
            } else if(file2.size > 2000000){
                  $('#edit_gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please select image size less than 2 MB</label>');
                  $('#edit_gallery_code').val('');
                  var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
                  $('#edit_preview_gallery').empty();
                  document.getElementById("edit_gallery_images").value = '';
                  document.getElementById("edit_gallery_images").focus();
              } else {
                  $('#edit_gallery_code').val('1');
                  var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
            }
            formData.append("Filedata", file3);
            var t3 = file3.type.split('/').pop().toLowerCase();
            if (t3 != "jpeg" && t3 != "jpg" && t3 != "png" && t3 != "gif") {
                $('#edit_gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
                $('#edit_gallery_code').val('');
                var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
                $('#edit_preview_gallery').empty();
                document.getElementById("edit_gallery_images").value = '';
                document.getElementById("edit_gallery_images").focus();
                return false;
            } else if(file3.size > 2000000){
                  $('#edit_gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please select image size less than 2 MB</label>');
                  $('#edit_gallery_code').val('');
                  var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
                  $('#edit_preview_gallery').empty();
                  document.getElementById("edit_gallery_images").value = '';
                  document.getElementById("edit_gallery_images").focus();
              } else {
                  $('#edit_gallery_code').val('1');
                  var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
            }
            formData.append("Filedata", file4);
            var t4 = file4.type.split('/').pop().toLowerCase();
            if (t4 != "jpeg" && t4 != "jpg" && t4 != "png" && t4 != "gif") {
                $('#edit_gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
                $('#edit_gallery_code').val('');
                var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
                $('#edit_preview_gallery').empty();
                document.getElementById("edit_gallery_images").value = '';
                document.getElementById("edit_gallery_images").focus();
                return false;
            } else if(file4.size > 2000000){
                  $('#edit_gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please select image size less than 2 MB</label>');
                  $('#edit_gallery_code').val('');
                  var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
                  $('#edit_preview_gallery').empty();
                  document.getElementById("edit_gallery_images").value = '';
                  document.getElementById("edit_gallery_images").focus();
              } else {
                  $('#edit_gallery_code').val('1');
                  var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
            }
            formData.append("Filedata", file5);
            var t5 = file5.type.split('/').pop().toLowerCase();
            if (t5 != "jpeg" && t5 != "jpg" && t5 != "png" && t5 != "gif") {
                $('#edit_gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please upload jpg,jpeg,png,gif file exactly</label>');
                $('#edit_gallery_code').val('');
                var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
                $('#edit_preview_gallery').empty();
                document.getElementById("edit_gallery_images").value = '';
                document.getElementById("edit_gallery_images").focus();
                return false;
            } else if(file5.size > 2000000){
                  $('#edit_gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Please select image size less than 2 MB</label>');
                  $('#edit_gallery_code').val('');
                  var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
                  $('#edit_preview_gallery').empty();
                  document.getElementById("edit_gallery_images").value = '';
                  document.getElementById("edit_gallery_images").focus();
              } else {
                  $('#edit_gallery_code').val('1');
                  var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
            }
            formData.append("Filedata", file6);
            var t6 = file6.type.split('/').pop().toLowerCase();
            if (t6) {
                $('#edit_gallery_images').after('<label class="col-md-12 mt-2 text-danger error ImgError">* Maximum 5 images only allowed</label>');
                $('#edit_gallery_code').val('');
                var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
                $('#edit_preview_gallery').empty();
                document.getElementById("edit_gallery_images").value = '';
                document.getElementById("edit_gallery_images").focus();
                return false;
            } else {
                $('#edit_gallery_code').val('1');
                var LImg = $('#edit_logo_code').val();
                var GImg = $('#edit_gallery_code').val();
                var VImg = $('#edit_video_code').val();
  
                if(LImg == 1 || GImg == 1 || VImg == 1){
                    $('#updateRequirePath').show();
                  } else {
                    $('#updateRequirePath').hide();
                  }
            }
  
            
  
  
        }
  
    }
  
  
        function edit_validateLogo() {
  
          var fii = document.getElementById('edit_logo_image');
  
          if(fii.files.length == 0){
            $('#edit_logo_code').val('');
  
            var LImg = $('#edit_logo_code').val();
            var GImg = $('#edit_gallery_code').val();
            var VImg = $('#edit_video_code').val();
  
            if(LImg == 1 || GImg == 1 || VImg == 1){
                $('#updateRequirePath').show();
              } else {
                $('#updateRequirePath').hide();
              }
            
  
          } else {
  
              var file = document.getElementById("edit_logo_image").files[0];
  
              $(".LogoError").remove();
              var t = file.type.split('/').pop().toLowerCase();
              if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
                  $('#edit_logo_image').after('<label class="col-md-12 mt-2 text-danger error LogoError">* Please upload jpg,jpeg,png,gif file exactly</label>');
                  $('#edit_logo_code').val('');
                  $('#edit_preview_logo').empty();
                  document.getElementById("edit_logo_image").value = '';
                  document.getElementById("edit_logo_image").focus();
                  return false;
              } else if(file.size > 2000000){
                  $('#edit_logo_image').after('<label class="col-md-12 mt-2 text-danger error LogoError">* Please select image size less than 2 MB</label>');
                  $('#edit_logo_code').val('');
                  $('#edit_preview_logo').empty();
                  document.getElementById("edit_logo_image").value = '';
                  document.getElementById("edit_logo_image").focus();
              } else {
                  $('#edit_logo_code').val('1');
              }
  
              var LImg = $('#edit_logo_code').val();
              var GImg = $('#edit_gallery_code').val();
              var VImg = $('#edit_video_code').val();
  
              if(LImg == 1 || GImg == 1 || VImg == 1){
                  $('#updateRequirePath').show();
                } else {
                  $('#updateRequirePath').hide();
                }
  
            }
  
        }
  
  
  
        function edit_validateVideo() {
  
          var fiii = document.getElementById('edit_video_path');
  
          if(fiii.files.length == 0){
            $('#edit_video_code').val('');
            
            var LImg = $('#edit_logo_code').val();
            var GImg = $('#edit_gallery_code').val();
            var VImg = $('#edit_video_code').val();
  
            if(LImg == 1 || GImg == 1 || VImg == 1){
                $('#updateRequirePath').show();
              } else {
                $('#updateRequirePath').hide();
              }
  
  
          } else {
  
              var file = document.getElementById("edit_video_path").files[0];
              $(".VideoError").remove();
              var t = file.type.split('/').pop().toLowerCase();
              if (t != "mp4") {
                  $('#edit_video_path').after('<label class="col-md-12 mt-2 text-danger error VideoError">* Please upload MP4 file exactly</label>');
                  $('#edit_video_code').val('');
                  $('#edit_preview_video').empty();
                  document.getElementById("edit_video_path").value = '';
                  document.getElementById("edit_video_path").focus();
                  return false;
              }  else if(file.size > 2000000){
                  $('#edit_video_path').after('<label class="col-md-12 mt-2 text-danger error VideoError">* Please select video size less than 2 MB</label>');
                  $('#edit_video_code').val('');
                  $('#edit_preview_video').empty();
                  document.getElementById("edit_video_path").value = '';
                  document.getElementById("edit_video_path").focus();
              } else {
                  $('#edit_video_code').val('1');
                
              }
  
              var LImg = $('#edit_logo_code').val();
              var GImg = $('#edit_gallery_code').val();
              var VImg = $('#edit_video_code').val();
  
              if(LImg == 1 || GImg == 1 || VImg == 1){
                  $('#updateRequirePath').show();
                } else {
                  $('#updateRequirePath').hide();
                }
  
              
          }
  
  
  
        }
  
  
    function previewImages() {
  
    var $preview = $('#edit_preview_gallery').empty();
  
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
  
  $('#edit_gallery_images').on("change", previewImages);
  
  
    function previewLogoImages() {
  
    var $preview = $('#edit_preview_logo').empty();
  
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
  
  $('#edit_logo_image').on("change", previewLogoImages);
  
  
    function previewVideoImages() {
  
    var $preview = $('#edit_preview_video').empty();
  
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
  
  $('#edit_video_path').on("change", previewVideoImages);
  