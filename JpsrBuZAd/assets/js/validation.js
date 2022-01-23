$(function () {
  $.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0}');
  ////////// register form ////////////
   $("#RegisterForm").validate({
     rules: {
       name: {
         required: true,
       },
       phone: {
         required: true,
         number: true,
         minlength: 10,
         maxlength:10,
         remote: {
            url: '../validate_phone.php',
            type: "post",
            data: 
              {
                phone: function() {
                return $("#phone").val();
              }
             }
         }
       },
       email: {
         email: true,
       },
       password: {
         required: true,
         minlength:4,
         maxlength:10,
       },
       business_city: {
         required: true,
       },
       business_display_city: {
         required: true,
       },
       aadhaar_no: {
         number: true,
         minlength:12,
         maxlength:12,
       }
     },
     messages: {
       name: {
         required: "* Name is required",
       },
       phone: {
         required: "* Mobile no is required",
         minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         remote: "* Mobile no already registered",
       },
       password: {
         required: "* Password is required",
         minlength: jQuery.validator.format("* Password must between 4 - 10 characters"),
         maxlength: jQuery.validator.format("* Password must between 4 - 10 characters"),
       },
       business_city: {
         required: "* Business location city is required",
       },
       business_display_city: {
         required: "* Business display city is required",
       },
       aadhaar_no: {
           minlength: jQuery.validator.format("* Please enter 12 digit aadhaar no"),
           maxlength: jQuery.validator.format("* Please enter 12 digit aadhaar no"),
         }
     },
     submitHandler: function(form) { // <- pass 'form' argument in
              $(".register_user_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".register_user_submit").html('<img src="../images/loading_spinner.gif" style="width:20px;height:20px;">   Loading...');
              form.submit(); // <- use 'form' argument here.
          }
   });



  ////////// Edit register form ////////////
   $("#EditRegisterForm").validate({
     rules: {
       name: {
         required: true,
       },
       phone: {
         required: true,
         number: true,
         minlength: 10,
         maxlength:10,
         remote: {
            url: 'validate_edit_phone.php',
            type: "post",
            data: 
              {
                phone: function() {
                return $("#phone").val();
                },
                user_id: function() {
                return $("#user_id").val();
                }
             }
         }
       },
       email: {
         email: true,
       },
       password: {
         required: true,
         minlength:4,
         maxlength:10,
       },
       business_city: {
         required: true,
       },
       business_display_city: {
         required: true,
       },
       aadhaar_no: {
         number: true,
         minlength:12,
         maxlength:12,
       }
     },
     messages: {
       name: {
         required: "* Name is required",
       },
       phone: {
         required: "* Mobile no is required",
         minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         remote: "* Mobile no already registered",
       },
       password: {
         required: "* Password is required",
         minlength: jQuery.validator.format("* Password must between 4 - 10 characters"),
         maxlength: jQuery.validator.format("* Password must between 4 - 10 characters"),
       },
       business_city: {
         required: "* Business location city is required",
       },
       business_display_city: {
         required: "* Business display city is required",
       },
       aadhaar_no: {
           minlength: jQuery.validator.format("* Please enter 12 digit aadhaar no"),
           maxlength: jQuery.validator.format("* Please enter 12 digit aadhaar no"),
         }
     },
     submitHandler: function(form) { // <- pass 'form' argument in
              $(".register_edit_user_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".register_edit_user_submit").html('<img src="../images/loading_spinner.gif" style="width:20px;height:20px;">   Loading...');
              form.submit(); // <- use 'form' argument here.
          }
   });

  ////////// login form ////////////
   $("#myform").validate({
     rules: {
       username: {
         required: true,
       },
       password: {
         required: true,
         minlength:4,
         maxlength:10,
       }
     },
     messages: {
       username: {
         required: "* Username is required",
       },
       password: {
         required: "* Password is required",
         minlength: jQuery.validator.format("* Password must between 4 - 10 characters"),
         maxlength: jQuery.validator.format("* Password must between 4 - 10 characters"),
       }
     }
   });



   ////////// help form ////////////
   $("#HelpForm").validate({
     rules: {
       language: {
         required: true,
       },
       page: {
         required: true,
       },
       video_code: {
         required: true,
       }
     },
     messages: {
       language: {
         required: "* Language is required",
       },
       page: {
         required: "* Page is required",
       },
       video_code: {
         required: "* Video code is required",
       }
     }
   });


   ////////// articles form ////////////
   $("#ArticleForm").validate({
     rules: {
       student_name: {
         required: true,
       },
       student_age: {
         required: true,
         number: true,
       },
       school_name: {
         required: true,
       },
       photo_path: {
         required: true,
         extension:"jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       city: {
         required: true,
       },
       area: {
         required: true,
       },
       article_title: {
         required: true,
       },
       article_photo: {
         required: true,
         extension:"jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       article_description: {
         required: true,
       }
     },
     messages: {
       student_name: {
         required: "* Student name is required",
       },
       student_age: {
         required: "* Student age is required",
       },
       school_name: {
         required: "* School name is required",
       },
       photo_path: {
         required: "* Student image is required",
         extension: "* Upload jpg, jpeg, png, gif file only",
         filesize:" Image size must be less than 2 MB.",
       },
       city: {
         required: "* City is required",
       },
       area: {
         required: "* Area is required",
       },
       article_title: {
         required: "* Article title is required",
       },
       article_photo: {
         required: "* Article photo is required",
         extension: "* Upload jpg, jpeg, png, gif file only",
         filesize:" Image size must be less than 2 MB.",
       },
       article_description: {
         required: "* Article description is required",
       }
     }
   });


   ////////// articles form ////////////
   $("#ArticleEditForm").validate({
     rules: {
       student_name: {
         required: true,
       },
       student_age: {
         required: true,
         number: true,
       },
       school_name: {
         required: true,
       },
       photo_path: {
         extension:"jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       city: {
         required: true,
       },
       area: {
         required: true,
       },
       article_title: {
         required: true,
       },
       article_photo: {
         extension:"jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       article_description: {
         required: true,
       }
     },
     messages: {
       student_name: {
         required: "* Student name is required",
       },
       student_age: {
         required: "* Student age is required",
       },
       school_name: {
         required: "* School name is required",
       },
       photo_path: {
         extension: "* Upload jpg, jpeg, png, gif file only",
         filesize:" Image size must be less than 2 MB.",
       },
       city: {
         required: "* City is required",
       },
       area: {
         required: "* Area is required",
       },
       article_title: {
         required: "* Article title is required",
       },
       article_photo: {
         extension: "* Upload jpg, jpeg, png, gif file only",
         filesize:" Image size must be less than 2 MB.",
       },
       article_description: {
         required: "* Article description is required",
       }
     }
   });


   ////////// add offer form ////////////
   $("#OfferForm").validate({
     rules: {
       business_name: {
         required: true,
       },
       person_name: {
         required: true,
       },
       mobile_no: {
         required: true,
         number: true,
         minlength: 10,
         maxlength: 10,
       },
       email: {
         email: true,
       },
       address: {
         required: true,
       },
       category: {
         required: true,
       },
       title: {
         required: true,
       },
       image_path: {
         required: true,
         extension:"jpg|jpeg|png|gif",
       },
       offer_amount: {
         required: true,
       },
       offer_description: {
         required: true,
       },
       offer_period_start_date: {
         required: true,
       },
       offer_period_end_date: {
         required: true,
       },
       payment_type: {
         required: true,
       }
     },
     messages: {
       business_name: {
         required: "* Business name is required",
       },
       person_name: {
         required: "* Name is required",
       },
       mobile_no: {
         required: "* Mobile no is required",
         minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
       },
       address: {
         required: "* Address is required",
       },
       category: {
         required: "* Category is required",
       },
       title: {
         required: "* Title is required",
       },
       image_path: {
         required: "* Image is required",
         extension: "* Upload jpg, jpeg, png, gif file only",
       },
       offer_amount: {
         required: "* Amount is required",
       },
       offer_description: {
         required: "* Description is required",
       },
       offer_period_start_date: {
         required: "* Start date is required",
       },
       offer_period_end_date: {
         required: "* End date is required",
       },
       payment_type: {
         required: "* Payment type is required",
       }
     }
   });



   ////////// add gold form ////////////
   $("#GoldPriceList").validate({
     rules: {
       gold_price_18: {
         required: true,
       },
       gold_price_22: {
         required: true,
       },
       gold_price_24: {
         required: true,
       },
       silver_price: {
         required: true,
       },
       platinum_price: {
         required: true,
       },
       image_path: {
         extension:"jpg|jpeg|png|gif",
       }
     },
     messages: {
       gold_price_18: {
         required: "* Gold 18K is required",
       },
       gold_price_22: {
         required: "* Gold 22K is required",
       },
       gold_price_24: {
         required: "* Gold 24K is required",
       },
       silver_price: {
         required: "* Silver price is required",
       },
       platinum_price: {
         required: "* Platinum price is required",
       },
       image_path: {
         extension: "* Upload jpg, jpeg, png, gif file only",
       }
     }
   });


   ////////// add gold form ////////////
   $("#PetrolPriceList").validate({
     rules: {
       petrol_price: {
         required: true,
       },
       diesel_price: {
         required: true,
       },
       image_path: {
         extension:"jpg|jpeg|png|gif",
       }
     },
     messages: {
       petrol_price: {
         required: "* Petrol price is required",
       },
       diesel_price: {
         required: "* Diesel price is required",
       },
       image_path: {
         extension: "* Upload jpg, jpeg, png, gif file only",
       }
     }
   });


   ////////// add gold form ////////////
   $("#StorePriceList").validate({
     rules: {
       file_path: {
         required: true,
         extension:"pdf|doc|xlsx|xls",
       },
       image_path: {
         extension:"jpg|jpeg|png|gif",
       }
     },
     messages: {
       file_path: {
         required: "* Price List is required",
         extension: "* Upload jpg, jpeg, png, gif, doc, pdf file only",
       },
       image_path: {
         extension: "* Upload jpg, jpeg, png, gif file only",
       }
     }
   });


   ////////// edit offer form ////////////
   $("#OfferEditForm").validate({
     rules: {
       business_name: {
         required: true,
       },
       person_name: {
         required: true,
       },
       mobile_no: {
         required: true,
         number: true,
         minlength: 10,
         maxlength: 10,
       },
       email: {
         email: true,
       },
       address: {
         required: true,
       },
       category: {
         required: true,
       },
       title: {
         required: true,
       },
       image_path: {
         extension:"jpg|jpeg|png|gif",
       },
       offer_amount: {
         required: true,
       },
       offer_description: {
         required: true,
       },
       offer_period_start_date: {
         required: true,
       },
       offer_period_end_date: {
         required: true,
       },
       payment_type: {
         required: true,
       }
     },
     messages: {
       business_name: {
         required: "* Business name is required",
       },
       person_name: {
         required: "* Name is required",
       },
       mobile_no: {
         required: "* Mobile no is required",
         minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
       },
       address: {
         required: "* Address is required",
       },
       category: {
         required: "* Category is required",
       },
       title: {
         required: "* Title is required",
       },
       image_path: {
         extension: "* Upload jpg, jpeg, png, gif file only",
       },
       offer_amount: {
         required: "* Amount is required",
       },
       offer_description: {
         required: "* Description is required",
       },
       offer_period_start_date: {
         required: "* Start date is required",
       },
       offer_period_end_date: {
         required: "* End date is required",
       },
       payment_type: {
         required: "* Payment type is required",
       }
     }
   });


    ////////// add news form ////////////
   $("#NewsForm").validate({
     rules: {
       language: {
         required: true,
       },
       category: {
         required: true,
       },
       title: {
         required: true,
       },
       image_path: {
         required: true,
         extension:"jpg|jpeg|png|gif",
       },
       description: {
         required: true,
       }
     },
     messages: {
       language: {
         required: "* Language is required",
       },
       category: {
         required: "* Category is required",
       },
       title: {
         required: "* Title is required",
       },
       image_path: {
         required: "* Image is required",
         extension: "* Upload jpg, jpeg, png, gif file only",
       },
       description: {
         required: "* Description is required",
       }
     }
   });



    ////////// add news edit form ////////////
   $("#NewsEditForm").validate({
     rules: {
       language: {
         required: true,
       },
       category: {
         required: true,
       },
       title: {
         required: true,
       },
       image_path: {
         extension:"jpg|jpeg|png|gif",
       },
       descripton: {
         required: true,
       }
     },
     messages: {
       language: {
         required: "* Language is required",
       },
       category: {
         required: "* Category is required",
       },
       title: {
         required: "* Title is required",
       },
       image_path: {
         extension: "* Upload jpg, jpeg, png, gif file only",
       },
       descripton: {
         required: "* Description is required",
       }
     }
   });


   ////////// about form ////////////
   $("#AboutForm").validate({
     rules: {
       image_path: {
         extension: "jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       image_path2: {
         extension: "jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       image_path3: {
         extension: "jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       video_path: {
         extension: "mp4",
         filesize: 2000000,
       }
     },
     messages: {
       image_path: {
         extension: "* Upload only jpg, jpeg, png, gif file",
         filesize:" Image size must be less than 2 MB.",
       },
       image_path2: {
         extension: "* Upload only jpg, jpeg, png, gif file",
         filesize:" Image size must be less than 2 MB.",
       },
       image_path3: {
         extension: "* Upload only jpg, jpeg, png, gif file",
         filesize:" Image size must be less than 2 MB.",
       },
       video_path: {
         extension: "* Upload only mp4 file",
         filesize:" Video size must be less than 2 MB.",
       }
     }
   });



   ////////// jpsr video form ////////////
   $("#JPSRVideoForm").validate({
     rules: {
       video_path: {
         extension: "mp4",
         filesize: 2000000,
       }
     },
     messages: {
       video_path: {
         extension: "* Upload only mp4 file",
         filesize:" Video size must be less than 2 MB.",
       }
     }
   });


   ////////// offer banner form ////////////
   $("#OfferBannerForm").validate({
     rules: {
       image_path: {
         required: true,
         extension: "jpg|jpeg|png|gif",
       }
     },
     messages: {
       image_path: {
         required: "* Image is required",
         extension: "* Upload only jpg, jpeg, png, gif file",
       }
     }
   });


   ////////// excel form ////////////
   $("#UploadExcel").validate({
     rules: {
      location: {
         required: true,
       },
       uploadFile: {
         required: true,
         extension: "csv",
       }
     },
     messages: {
       location: {
         required: "* Location is required",
       },
       uploadFile: {
         required: "* File is required",
         extension: "Upload only CSV file",
       }
     }
   });

   ////////// excel form ////////////
   $("#EmergencyExcel").validate({
     rules: {
       uploadFile: {
         required: true,
         extension: "csv",
       }
     },
     messages: {
       uploadFile: {
         required: "* File is required",
         extension: "Upload only CSV file",
       }
     }
   });


   ////////// Office form ////////////
   $("#OfficeForm").validate({
     rules: {
      location: {
         required: true,
       },
       ward_no: {
         required: true,
       },
       area: {
         required: true,
       },
       office_name: {
         required: true,
       },
       person_name: {
         required: true,
       },
       mobile_no: {
         required: true,
       },
       email: {
         email: true,
       },
       address: {
         required: true,
       },
       timing: {
         required: true,
       },
       days: {
         required: true,
       },
       office_image: {
         required: true,
         extension: "jpg|jpeg|png|gif",
       },
       status: {
         required: true,
       }
     },
     messages: {
       location: {
         required: "* Location is required",
       },
       ward_no: {
         required: "* Ward No is required",
       },
       area: {
         required: "* Area is required",
       },
       office_name: {
         required: "* Office name is required",
       },
       person_name: {
         required: "* Name is required",
       },
       mobile_no: {
         required: "* Mobile no is required",
       },
       address: {
         required: "* Address is required",
       },
       timing: {
         required: "* Office timing is required",
       },
       days: {
         required: "* Office days is required",
       },
       office_image: {
         required: "* Image is required",
         extension: "* Jpg, Jpeg, png, gif image only allowed",
       },
       status: {
         required: "* Status is required",
       }
     }
   });


      ////////// Office edit form ////////////
   $("#OfficeEditForm").validate({
     rules: {
      location: {
         required: true,
       },
       ward_no: {
         required: true,
       },
       area: {
         required: true,
       },
       office_name: {
         required: true,
       },
       person_name: {
         required: true,
       },
       mobile_no: {
         required: true,
       },
       email: {
         email: true,
       },
       address: {
         required: true,
       },
       timing: {
         required: true,
       },
       days: {
         required: true,
       },
       office_image: {
         extension: "jpg|jpeg|png|gif",
       },
       status: {
         required: true,
       }
     },
     messages: {
       location: {
         required: "* Location is required",
       },
       ward_no: {
         required: "* Ward No is required",
       },
       area: {
         required: "* Area is required",
       },
       office_name: {
         required: "* Office name is required",
       },
       person_name: {
         required: "* Name is required",
       },
       mobile_no: {
         required: "* Mobile no is required",
       },
       address: {
         required: "* Address is required",
       },
       timing: {
         required: "* Office timing is required",
       },
       days: {
         required: "* Office days is required",
       },
       office_image: {
         extension: "* Jpg, Jpeg, png, gif image only allowed",
       },
       status: {
         required: "* Status is required",
       }
     }
   });


   ////////// Temple form ////////////
     $("#TempleForm").validate({
       rules: {
         location: {
           required: true,
         },
         temple_name: {
           required: true,
         },
         person_name: {
           required: true,
         },
         mobile_no: {
           required: true,
           number: true,
           minlength: 10,
           maxlength: 10,
         },
         address: {
           required: true,
         },
         city: {
           required: true,
         },
         district: {
           required: true,
         },
         state: {
           required: true,
         },
         pincode: {
           required: true,
           number: true,
           minlength: 6,
           maxlength: 6,
         },
         temple_image: {
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         video: {
           extension: "mp4",
           filesize: 2000000,
         }
       },
       messages: {
         location: {
           required: "* Location is required",
         },
         temple_name: {
           required: "* Temple name is required",
         },
         person_name: {
           required: "* Person name is required",
         },
         mobile_no: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         address: {
           required: "* Address is required",
         },
         city: {
           required: "* City is required",
         },
         district: {
           required: "* District is required",
         },
         state: {
           required: "* State is required",
         },
         pincode: {
           required: "* Pincode is required",
           minlength: jQuery.validator.format("* Please enter 6 digit pincode"),
           maxlength: jQuery.validator.format("* Please enter 6 digit pincode"),
         },
         temple_image: {
           extension: "* Jpg, Jpeg, png, gif image only allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         video: {
           extension: "* MP4 video only allowed",
           filesize:" Video size must be less than 2 MB.",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".temples_update_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".temples_update_submit").html('<img src="../images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });




   ////////// Temple edit form ////////////
   $("#TempleEditForm").validate({
     rules: {
       location: {
         required: true,
       },
       ward_no: {
         required: true,
       },
       area: {
         required: true,
       },
       temple_name: {
         required: true,
       },
       person_name: {
         required: true,
       },
       mobile_no: {
         required: true,
         number: true,
         minlength: 10,
         maxlength: 10,
       },
       address: {
         required: true,
       },
       city: {
         required: true,
       },
       district: {
         required: true,
       },
       country: {
         required: true,
       },
       temple_image: {
         extension: "jpg|jpeg|png|gif",
       }
     },
     messages: {
       location: {
         required: "* Location is required",
       },
       ward_no: {
         required: "* Ward no is required",
       },
       area: {
         required: "* Area is required",
       },
       temple_name: {
         required: "* Temple name is required",
       },
       person_name: {
         required: "* Person name is required",
       },
       mobile_no: {
         required: "* Mobile no is required",
         minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
       },
       address: {
         required: "* Address is required",
       },
       city: {
         required: "* City is required",
       },
       district: {
         required: "* District is required",
       },
       country: {
         required: "* Country is required",
       },
       temple_image: {
         extension: "* Jpg, Jpeg, png, gif image only allowed",
       }
     }
   });


   ////////// category form ////////////
   $("#CategoryForm").validate({
     rules: {
       category_name: {
         required: true,
       }
     },
     messages: {
       category_name: {
         required: "* Category name is required",
       }
     }
   });
   
   
   ////////// amount form ////////////
   $("#AmountForm").validate({
     rules: {
       amount: {
         required: true,
         number: true,
       }
     },
     messages: {
       amount: {
         required: "* Amount is required",
       }
     }
   });

   ////////// emergency form ////////////
   $("#EmergencyForm").validate({
     rules: {
       service_name: {
         required: true,
       },
       contact_number: {
         required: true,
       }
     },
     messages: {
       service_name: {
         required: "* Service name is required",
       },
       contact_number: {
         required: "* Contact number is required",
       }
     }
   });


   ////////// ward no form ////////////
   $("#WardNoForm").validate({
     rules: {
       location: {
         required: true,
       },
       ward_no: {
         required: true,
       }
     },
     messages: {
       location: {
         required: "* Location is required",
       },
       ward_no: {
         required: "* Ward no is required",
       }
     }
   });


   ////////// area form ////////////
   $("#AreaForm").validate({
     rules: {
       location: {
         required: true,
       },
       ward_no: {
         required: true,
       },
       area: {
         required: true,
       }
     },
     messages: {
       location: {
         required: "* Location is required",
       },
       ward_no: {
         required: "* Ward no is required",
       },
       area: {
         required: "*Area is required",
       }
     }
   });

   ////////// train form ////////////
   $("#TrainForm").validate({
     rules: {
       location: {
         required: true,
       },
       train_name: {
         required: true,
       },
       train_no: {
         required: true,
         number: true,
       },
       days: {
         required: true,
       },
       departure_place: {
         required: true,
       },
       departure_time: {
         required: true,
       },
       arrival_place: {
         required: true,
       },
       arrival_time: {
         required: true,
       }
     },
     messages: {
       location: {
         required: "* Location is required",
       },
       train_name: {
         required: "* Train name is required",
       },
       train_no: {
         required: "* Train no is required",
       },
       days: {
         required: "* Days is required",
       },
       departure_place: {
         required: "* Departure place is required",
       },
       departure_time: {
         required: "* Departure time is required",
       },
       arrival_place: {
         required: "* Arrival place is required",
       },
       arrival_time: {
         required: "* Arrival time is required",
       }
     }
   });


   ////////// bus form ////////////
   $("#BusForm").validate({
     rules: {
       location: {
         required: true,
       },
       bus_type: {
         required: true,
       },
       days: {
         required: true,
       },
       departure_place: {
         required: true,
       },
       departure_time: {
         required: true,
       },
       arrival_place: {
         required: true,
       },
       arrival_time: {
         required: true,
       }
     },
     messages: {
       location: {
         required: "* Location is required",
       },
       bus_type: {
         required: "* Type is required",
       },
       days: {
         required: "* Days is required",
       },
       departure_place: {
         required: "* Departure place is required",
       },
       departure_time: {
         required: "* Departure time is required",
       },
       arrival_place: {
         required: "* Arrival place is required",
       },
       arrival_time: {
         required: "* Arrival time is required",
       }
     }
   });

   ////////// location form ////////////
   $("#LocationForm").validate({
     rules: {
       location_name: {
         required: true,
       }
     },
     messages: {
       location_name: {
         required: "* Location name is required",
       }
     }
   });

   ////////// state form ////////////
   $("#StateForm").validate({
     rules: {
       state_name: {
         required: true,
       }
     },
     messages: {
       state_name: {
         required: "* State name is required",
       }
     }
   });

   ////////// district form ////////////
   $("#DistrictForm").validate({
     rules: {
       state_id: {
         required: true,
       },
       district_name: {
         required: true,
       }
     },
     messages: {
       state_id: {
         required: "* State is required",
       },
       district_name: {
         required: "* District name is required",
       }
     }
   });

   ////////// location form ////////////
   $("#BusinessSubscriptionForm").validate({
     rules: {
       period: {
         required: true,
       },
       plan: {
         required: true,
       },
       amount: {
         required: true,
         number: true,
       }
     },
     messages: {
       period: {
         required: "* Subscription period is required",
       },
       plan: {
         required: "* Plan is required",
       },
       amount: {
         required: "* Amount is required",
       }
     }
   });

   ////////// service category form ////////////
   $("#ServiceCategoryForm").validate({
     rules: {
       service_id: {
         required: true,
       },
       category_name: {
         required: true,
       }
     },
     messages: {
       service_id: {
         required: "* Service is required",
       },
       category_name: {
         required: "* Category name is required",
       }
     }
   });

   ////////// banner form ////////////
   $("#BannerForm").validate({
     rules: {
       image_path: {
         required: true,
         extension: "jpg|jpeg|png|gif"
       }
     },
     messages: {
       image_path: {
         required: "* Image is required",
         extension: "Image file only upload",
       }
     }
   });

   ////////// home ads form ////////////
   $("#HomeAds").validate({
     rules: {
       image_path1: {
         extension: "jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       image_path2: {
         extension: "jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       image_path3: {
         extension: "jpg|jpeg|png|gif",
         filesize: 2000000,
       }
     },
     messages: {
       image_path1: {
         extension: "Jpg, Jpeg, png, gif file only upload",
         filesize:" Image size must be less than 2 MB.",
       },
       image_path2: {
         extension: "Jpg, Jpeg, png, gif file only upload",
         filesize:" Image size must be less than 2 MB.",
       },
       image_path3: {
         extension: "Jpg, Jpeg, png, gif file only upload",
         filesize:" Image size must be less than 2 MB.",
       }
     }
   });

   ////////// popup ads form ////////////
   $("#PopupAds").validate({
     rules: {
       image_path1: {
         extension: "jpg|jpeg|png|gif"
       },
       image_path2: {
         extension: "jpg|jpeg|png|gif"
       },
       image_path3: {
         extension: "jpg|jpeg|png|gif"
       },
       image_path4: {
         extension: "jpg|jpeg|png|gif"
       },
       image_path5: {
         extension: "jpg|jpeg|png|gif"
       }
     },
     messages: {
       image_path1: {
         extension: "Jpg, Jpeg, png, gif file only upload",
       },
       image_path2: {
         extension: "Jpg, Jpeg, png, gif file only upload",
       },
       image_path3: {
         extension: "Jpg, Jpeg, png, gif file only upload",
       },
       image_path4: {
         extension: "Jpg, Jpeg, png, gif file only upload",
       },
       image_path5: {
         extension: "Jpg, Jpeg, png, gif file only upload",
       }
     }
   });

   ////////// banner eidt form ////////////
   $("#BannerEditForm").validate({
     rules: {
       image_path: {
         extension: "jpg|jpeg|png|gif"
       }
     },
     messages: {
       image_path: {
         extension: "Image file only upload",
       }
     }
   });

   ////////// banner form ////////////
   $("#VideoForm").validate({
     rules: {
       video_path: {
         required: true,
         extension: "mp4"
       }
     },
     messages: {
       video_path: {
         required: "* Video is required",
         extension: "mp4 file only upload",
       }
     }
   });
   
   
   ////////// JPSR Agent form ////////////
     $("#JpsrAgentForm").validate({
       rules: {
         person_name: {
           required: true,
         },
         mobile_no: {
           required: true,
           number: true,
           minlength: 10,
           maxlength: 10,
         },
         email: {
           email: true,
         },
         address: {
           required: true,
         },
         area: {
           required: true,
         },
         city: {
           required: true,
         },
         district: {
           required: true,
         },
         state: {
           required: true,
         },
         pincode: {
           required: true,
           number: true,
           minlength: 6,
           maxlength: 6,
         },
         alternative_mobile_no: {
           number: true,
           minlength: 10,
           maxlength: 10,
         },
         aadhaar_no: {
           required: true,
           number: true,
           minlength:12,
           maxlength:12,
         },
         profile_pic: {
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         aadhaar_image_front: {
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         aadhaar_image_back: {
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         account_no: {
           required: true,
         },
         ifsc_code: {
           required: true,
         },
         holder_name: {
           required: true,
         },
         branch_name: {
           required: true,
         }
       },
       messages: {
         person_name: {
           required: "* Person name is required",
         },
         mobile_no: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         address: {
           required: "* Address is required",
         },
         area: {
           required: "* Area is required",
         },
         city: {
           required: "* City is required",
         },
         district: {
           required: "* District is required",
         },
         state: {
           required: "* State is required",
         },
         pincode: {
           required: "* Pincode is required",
           minlength: jQuery.validator.format("* Please enter 6 digit pincode"),
           maxlength: jQuery.validator.format("* Please enter 6 digit pincode"),
           remote: "Mobile no already exists!",
         },
         alternative_mobile_no: {
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         aadhaar_no: {
           required: "* Aadhaar no is required",
           minlength: jQuery.validator.format("* Please enter 12 digit aadhaar no"),
           maxlength: jQuery.validator.format("* Please enter 12 digit aadhaar no"),
         },
         profile_pic: {
           extension: "* only Image files allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         aadhaar_image_front: {
           extension: "* only Image files allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         aadhaar_image_back: {
           extension: "* only Image files allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         account_no: {
           required: "* Account no is required",
         },
         ifsc_code: {
           required: "* IFSC code is required",
         },
         holder_name: {
           required: "* Account holder name is required",
         },
         branch_name: {
           required: "* Branch name is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".agent_update").attr("disabled", true).css("cursor", "not-allowed");
              $(".agent_update").html('<img src="../images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });

   ////////// Register ur business form ////////////
   $("#BusinessForm").validate({
     rules: {
       business_name: {
         required: true,
       },
       person_name: {
         required: true,
       },
       mobile_no: {
         required: true,
         number: true,
         minlength: 10,
         maxlength: 10,
       },
       email: {
         email: true,
       },
       address: {
         required: true,
       },
       area: {
         required: true,
       },
       city: {
         required: true,
       },
       location: {
         required: true,
       },
       district: {
         required: true,
       },
       country: {
         required: true,
       },
       category: {
         required: true,
       },
       status: {
         required: true,
       }
     },
     messages: {
       business_name: {
         required: "* Business name is required",
       },
       person_name: {
         required: "* Name is required",
       },
       mobile_no: {
         required: "* Mobile no is required",
         minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
       },
       address: {
         required: "* Address is required",
       },
       area: {
         required: "* Area is required",
       },
       city: {
         required: "* City is required",
       },
       location: {
         required: "* Business city is required",
       },
       district: {
         required: "* District is required",
       },
       country: {
         required: "* Country is required",
       },
       category: {
         required: "* Category is required",
       },
       status: {
         required: "* Status is required",
       }
     }
   });



   ////////// new Register ur business form ////////////
   $("#NewBusinessForm").validate({
     rules: {
       business_name: {
         required: true,
         remote: {
            url: 'validate_business.php',
            type: "post",
            data: 
              {
                business_name: function() {
                return $("#business_name").val();
              },
              type: function() {
                return $("#type").val();
              },
              business_edit_id: function() {
                return $("#business_edit_id").val();
              }
             }
            }
       },
       person_name: {
         required: true,
       },
       login_user_mobile_no: {
         required: true,
         number: true,
         minlength: 10,
         maxlength: 10,
       },
       mobile_no: {
         required: true,
         number: true,
         minlength: 10,
         maxlength: 10,
         // remote: {
         //    url: 'validate_phone.php',
         //    type: "post",
         //    data: 
         //      {
         //        mobile_no: function() {
         //        return $("#mobile_no").val();
         //      },
         //      type: function() {
         //        return $("#type").val();
         //      },
         //      business_edit_id: function() {
         //        return $("#business_edit_id").val();
         //      }
         //     }
         //    }
       },
       email: {
         email: true,
       },
       category: {
         required: true,
       },
       ward_no: {
         number: true,
       },
       pincode: {
         number: true,
         minlength: 6,
         maxlength: 6,
       },
       alternative_mobile_no: {
         number: true,
         minlength: 10,
         maxlength: 10,
       },
       total_pay_amount: {
         required: true,
       }
     },
     messages: {
       business_name: {
         required: "* Business name is required",
         remote: "Business name already exists!",
       },
       person_name: {
         required: "* Name is required",
       },
       login_user_mobile_no: {
         required: "* Mobile no is required",
         minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
       },
       mobile_no: {
         required: "* Mobile no is required",
         minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         remote: "Mobile no already registered!",
       },
       category: {
         required: "* Category is required",
       },
       pincode: {
         minlength: jQuery.validator.format("* Please enter 6 digit pincode"),
         maxlength: jQuery.validator.format("* Please enter 6 digit pincode"),
       },
       alternative_mobile_no: {
         minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
       },
       total_pay_amount: {
         required: "* Amount is required",
       },
     }
   });


    ////////// Register ur ad form ////////////
   $("#AdvertisementForm").validate({
     rules: {
       business_name: {
         required: true,
       },
       person_name: {
         required: true,
       },
       mobile_no: {
         required: true,
         number: true,
         minlength: 10,
         maxlength: 10,
       },
       email: {
         email: true,
       },
       address: {
         required: true,
       },
       page_details: {
         required: true,
       },
       image_position: {
         required: true,
       },
       advertisement_image: {
         required: true,
         extension: "jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       subscription_type: {
         required: true,
       },
       payment_type: {
         required: true,
       }
     },
     messages: {
       business_name: {
         required: "* Business name is required",
       },
       person_name: {
         required: "* Name is required",
       },
       mobile_no: {
         required: "* Mobile no is required",
         minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
       },
       address: {
         required: "* Address is required",
       },
       page_details: {
         required: "* Page is required",
       },
       image_position: {
         required: "* Position is required",
       },
       advertisement_image: {
         required: "* Image is required",
         extension: "* only Image files allowed",
         filesize:" Image size must be less than 2 MB.",
       },
       subscription_type: {
         required: "* Subscribe Ads is required",
       },
       payment_type: {
         required: "* Payment type is required",
       }
     }
   });




   ////////// edit Register ur ad form ////////////
   $("#AdvertisementEditForm").validate({
     rules: {
       business_name: {
         required: true,
       },
       person_name: {
         required: true,
       },
       mobile_no: {
         required: true,
         number: true,
         minlength: 10,
         maxlength: 10,
       },
       email: {
         email: true,
       },
       address: {
         required: true,
       },
       page_details: {
         required: true,
       },
       image_position: {
         required: true,
       },
       advertisement_image: {
         extension: "jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       subscription_type: {
         required: true,
       },
       payment_type: {
         required: true,
       }
     },
     messages: {
       business_name: {
         required: "* Business name is required",
       },
       person_name: {
         required: "* Name is required",
       },
       mobile_no: {
         required: "* Mobile no is required",
         minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
       },
       address: {
         required: "* Address is required",
       },
       page_details: {
         required: "* Page is required",
       },
       image_position: {
         required: "* Position is required",
       },
       advertisement_image: {
         extension: "* only Image files allowed",
         filesize:" Image size must be less than 2 MB.",
       },
       subscription_type: {
         required: "* Subscribe Ads is required",
       },
       payment_type: {
         required: "* Payment type is required",
       }
     }
   });



   ////////// birthday wishes form ////////////
   $("#BirthdayForm").validate({
     rules: {
       person_name: {
         required: true,
       },
       birthday_date: {
         required: true,
       },
       sender_name: {
         required: true,
       },
       sender_image_path: {
         required: true,
         extension:"jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       image_path: {
         required: true,
         extension:"jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       wishes_detail: {
         required: true,
       }
     },
     messages: {
       person_name: {
         required: "* Person name is required",
       },
       birthday_date: {
         required: "* Birthday date is required",
       },
       sender_name: {
         required: "* Sender name is required",
       },
       sender_image_path: {
         required: "* Sender Image is required",
         extension: "* Upload jpg, jpeg, png, gif file only",
         filesize:" Image size must be less than 2 MB.",
       },
       image_path: {
         required: "* Birthday Image is required",
         extension: "* Upload jpg, jpeg, png, gif file only",
         filesize:" Image size must be less than 2 MB.",
       },
       wishes_detail: {
         required: "* Wishes detail is required",
       }
     }
   });



   ////////// birthday wishes edit form ////////////
   $("#BirthdayEditForm").validate({
     rules: {
       person_name: {
         required: true,
       },
       birthday_date: {
         required: true,
       },
       sender_name: {
         required: true,
       },
       sender_image_path: {
         extension:"jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       image_path: {
         extension:"jpg|jpeg|png|gif",
         filesize: 2000000,
       },
       wishes_detail: {
         required: true,
       }
     },
     messages: {
       person_name: {
         required: "* Person name is required",
       },
       birthday_date: {
         required: "* Birthday date is required",
       },
       sender_name: {
         required: "* Sender name is required",
       },
       sender_image_path: {
         extension: "* Upload jpg, jpeg, png, gif file only",
         filesize:" Image size must be less than 2 MB.",
       },
       image_path: {
         extension: "* Upload jpg, jpeg, png, gif file only",
         filesize:" Image size must be less than 2 MB.",
       },
       wishes_detail: {
         required: "* Wishes detail is required",
       }
     }
   });


   ////////// trust form ////////////
   $("#TrustForm").validate({
     rules: {
      category: {
         required: true,
       },
       content_id: {
         required: true,
       },
       image_path: {
         required: true,
         extension: "jpg|jpeg|png|gif"
       },
       video_path: {
         extension: "mp4"
       }
     },
     messages: {
       category: {
         required: "* Category is required",
       },
       content_id: {
         required: "* Content is required",
       },
       image_path: {
         required: "* Image is required",
         extension: "* Image file only allowed",
       },
       video_path: {
         extension: "* MP4 video only allowed",
       }
     }
   });


   ////////// trust edit form ////////////
   $("#TrustEditForm").validate({
     rules: {
      category: {
         required: true,
       },
       content_id: {
         required: true,
       },
       image_path: {
         extension: "jpg|jpeg|png|gif"
       },
       video_path: {
         extension: "mp4"
       }
     },
     messages: {
       category: {
         required: "* Category is required",
       },
       content_id: {
         required: "* Content is required",
       },
       image_path: {
         extension: "* Image file only allowed",
       },
       video_path: {
         extension: "* MP4 video only allowed",
       }
     }
   });


   ////////// contact info form ////////////
   $("#ContactForm").validate({
     rules: {
       content_id: {
         required: true,
       },
       mobile_no: {
         required: true,
         number: true,
         minlength:10,
         maxlength:10,
       },
       email: {
         required: true,
         email: true,
       }
     },
     messages: {
       content_id: {
         required: "* Address is required",
       },
       mobile_no: {
         required: "* Mobile No is required",
         minlength: jQuery.validator.format("* Please enter 10 digits mobile no"),
         maxlength: jQuery.validator.format("* Please enter 10 digits mobile no"),
       },
       video_path: {
         required: "* Email ID is required",
       }
     }
   });

  


});