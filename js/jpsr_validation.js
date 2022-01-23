$(function () {
    $.validator.addMethod('filesize', function (value, element, param) {
      return this.optional(element) || (element.files[0].size <= param)
  }, 'File size must be less than {0}');
    $.validator.addMethod("lettersonlys", function(value, element) {
    return this.optional(element) || /^[a-zA-Z\s ]*$/.test(value);
  }, "Please enter only alphabetical letters");
    $.validator.addMethod("emailvalid", function(value, element) {
    return this.optional(element) || /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})*$/.test(value);
  }, "Please enter valid email address");
    ////////// login form ////////////
     $("#LoginForm").validate({
       rules: {
         login_username: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         login_password: {
           required: true,
           minlength:4,
           // maxlength:10,
         }
       },
       messages: {
         login_username: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         login_password: {
           required: "* Password is required",
           minlength: jQuery.validator.format("* Password enter minimum 4 characters"),
           // maxlength: jQuery.validator.format("* Password must between 4 - 10 characters"),
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".login_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".login_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
     
     
          $("#UpdatePasswordForm").validate({
       rules: {
         old_password: {
           required: true,
           minlength: 4,
           // maxlength:10,
         },
         new_pswd: {
           required: true,
           minlength:4,
           // maxlength:10,
         },
         cnfm_pswd: {
           equalTo: "#new_pswd"
         }
       },
       messages: {
         old_password: {
           required: "* Old password is required",
           minlength: jQuery.validator.format("* Old password enter minimum 4 characters"),
           // maxlength: jQuery.validator.format("* Old password must between 4 - 10 characters"),
         },
         new_pswd: {
           required: "* New password is required",
           minlength: jQuery.validator.format("* New password enter minimum 4 characters"),
           // maxlength: jQuery.validator.format("* New password must between 4 - 10 characters"),
         },
         cnfm_pswd: {
           required: "* Enter confirm password Same as new password",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".change_pswd_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".change_pswd_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     $("#businessSearchData").validate({
       rules: {
         search_name_data: {
           required: true,
         }
       },
       messages: {
         search_name_data: {
           required: "* Field is required",
         }
       }
     });
  
  
     ////////// transformation form ////////////
     $("#TransformationForm").validate({
       rules: {
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
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".transformation_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".transformation_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
  
     ////////// grocery form ////////////
     $("#UploadGroceryForm").validate({
       rules: {
         user_name: {
           required: true,
         },
         user_mobile: {
           required: true,
           minlength: 10,
           maxlength: 10,
         },
         file_path: {
           required: true,
           extension:"xlsx|xls",
         },
         description: {
           required: true,
         }
       },
       messages: {
         user_name: {
           required: "* Name is required",
         },
         user_mobile: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         file_path: {
           required: "* File is required",
           extension: "* Upload excel file only",
         },
         description: {
           required: "* Description is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".grocery_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".grocery_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// birthday wishes form ////////////
     $("#WishesForm").validate({
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
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".wishes-values-submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".wishes-values-submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
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
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".article-values-submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".article-values-submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
     ////////// news form ////////////
     $("#AddNewsForm").validate({
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
           filesize: 2000000,
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
           filesize:" Image size must be less than 2 MB.",
         },
         description: {
           required: "* Description is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".news-values-submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".news-values-submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// news form ////////////
     $("#EditNewsForm").validate({
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
           filesize: 2000000,
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
           extension: "* Upload jpg, jpeg, png, gif file only",
           filesize:" Image size must be less than 2 MB.",
         },
         description: {
           required: "* Description is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".edit-news-values-submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".edit-news-values-submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// Register ur ad form ////////////
     $("#EditOfferForm").validate({
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
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         offer_description: {
           required: true,
         },
         offer_amount: {
           required: true,
         },
         offer_period_start_date: {
           required: true,
         },
         offer_period_end_date: {
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
           required: "* Offer title is required",
         },
         image_path: {
           extension: "* Only image files allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         offer_description: {
           required: "* Offer Description is required",
         },
         offer_amount: {
           required: "* Amount is required",
         },
         offer_period_start_date: {
           required: "* Period start is required",
         },
         offer_period_end_date: {
           required: "* Period end is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".edit-offer-values-submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".edit-offer-values-submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// Testimonial form ////////////
     $("#TestimonialForm").validate({
       rules: {
         name: {
           required: true,
         },
         phone: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         services: {
           required: true,
         },
         feedback: {
           required: true,
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
         },
         services: {
           required: "* Services is required",
         },
         feedback: {
           required: "* Comments is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".testi_submit").attr("disabled", true).css("cursor", "default").fadeTo(500,0.2);
              $(".testi_submit").html('Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// Testimonial form ////////////
     $("#QueryForm").validate({
       rules: {
         name: {
           required: true,
         },
         phone: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         category_services: {
           required: true,
         },
         other_category: {
           required: true,
         },
         feedback: {
           required: true,
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
         },
         category_services: {
           required: "* Services is required",
         },
         other_category: {
           required: "* Service category is required",
         },
         feedback: {
           required: "* Comments is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".query_submit").attr("disabled", true).css("cursor", "default").fadeTo(500,0.2);
              $(".query_submit").html('Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
  
     ////////// payment gateway form ////////////
     $("#PaymentGatewayForm").validate({
       rules: {
         user_name: {
           required: true,
         },
         user_mobile: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         purpose: {
           required: true,
         },
         amount: {
           required: true,
           number: true,
         },
         description: {
           required: true,
         }
       },
       messages: {
         user_name: {
           required: "* Name is required",
         },
         user_mobile: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         purpose: {
           required: "* Payment for is required",
         },
         amount: {
           required: "* Amount is required",
         },
         description: {
           required: "* Description is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".paynow-submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".paynow-submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// register form ////////////
     $("#RegisterForm").validate({
       rules: {
         name: {
           required: true,
           lettersonlys: true,
         },
         phone: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
           remote: {
              url: 'validate_phone.php',
              type: "post",
              data: 
                {
                  phone: function() {
                  return $("#phone").val();
                }
               }
           }
         },
         otp_no: {
         required: true,
         number: true,
         minlength: 6,
         maxlength:6,
         remote: {
            url: 'SMSverify.php',
            type: "post",
            data: 
              {
                phone: function() {
                return $("#phone").val();
                },
                otp_no: function() {
                return $("#otp_no").val();
                }
             }
            }
         },
         email: {
           emailvalid: true,
         },
         password: {
           required: true,
           minlength:4,
           // maxlength:10,
         },
         business_city: {
           required: true,
           lettersonlys: true,
         },
         business_display_city: {
           required: true,
         },
         ward_no: {
           number: true,
         },
         aadhaar_no: {
           number: true,
           minlength:12,
           maxlength:12,
         },
         terms: {
           required: true,
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
         otp_no: {
         required: "* OTP is required",
         minlength: jQuery.validator.format("* Please enter 6 digit number"),
         maxlength: jQuery.validator.format("* Please enter 6 digit number"),
         remote: "* Invaild OTP",
         },
         password: {
           required: "* Password is required",
           minlength: jQuery.validator.format("* Password enter minimum 4 characters"),
           // maxlength: jQuery.validator.format("* Password must between 4 - 10 characters"),
         },
         business_city: {
           required: "* Business location city is required",
         },
         business_display_city: {
           required: "* Business Display City is required",
         },
         aadhaar_no: {
           minlength: jQuery.validator.format("* Please enter 12 digit aadhaar no"),
           maxlength: jQuery.validator.format("* Please enter 12 digit aadhaar no"),
         },
         terms: {
           required: "* Accept the terms and conditions ",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".register_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".register_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });



    ////////// Edit profile form ////////////
     $("#EditProfileForm").validate({
       rules: {
         name: {
           required: true,
           lettersonlys: true,
         },
         phone: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         email: {
           emailvalid: true,
         },
         business_city: {
           required: true,
           lettersonlys: true,
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
         },
         business_city: {
           required: "* Business location city is required",
         },
         business_display_city: {
           required: "* Business Display City is required",
         },
         aadhaar_no: {
           minlength: jQuery.validator.format("* Please enter 12 digit aadhaar no"),
           maxlength: jQuery.validator.format("* Please enter 12 digit aadhaar no"),
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".profile_update_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".profile_update_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });




     ////////// Change Register Mobile No form ////////////
     $("#ChangeNumberForm").validate({
       rules: {
         new_mobile_no: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
           remote: {
              url: 'validate_phone.php',
              type: "post",
              data: 
                {
                  new_mobile_no: function() {
                  return $("#new_mobile_no").val();
                }
               }
           }
         },
         new_mobile_otp: {
         required: true,
         number: true,
         minlength: 6,
         maxlength:6,
         remote: {
            url: 'SMSverify.php',
            type: "post",
            data: 
              {
                phone: function() {
                return $("#new_mobile_no").val();
                },
                otp_no: function() {
                return $("#new_mobile_otp").val();
                }
             }
            }
         }
       },
       messages: {
         new_mobile_no: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           remote: "* This Mobile no already registered",
         },
         new_mobile_otp: {
         required: "* OTP is required",
         minlength: jQuery.validator.format("* Please enter 6 digit number"),
         maxlength: jQuery.validator.format("* Please enter 6 digit number"),
         remote: "* Invaild OTP",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".update-mobileno-submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".update-mobileno-submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  

     ////////// reset password form ////////////
     $("#ForgotpasswordForm").validate({
       rules: {
         verify_phone_no: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
           remote: {
              url: 'check_validate_phone.php',
              type: "post",
              data: 
                {
                  phone: function() {
                  return $("#verify_phone_no").val();
                }
               }
              }
         },
         reset_otp_no: {
           required: true,
           number: true,
           minlength: 6,
           maxlength:6,
           remote: {
              url: 'Resetverify.php',
              type: "post",
              data: 
                {
                  verify_phone_no: function() {
                  return $("#verify_phone_no").val();
                  },
                  reset_otp_no: function() {
                  return $("#reset_otp_no").val();
                  }
               }
              }
         },
         your_new_password: {
           required: true,
           minlength:4,
           // maxlength:10,
         },
         your_confirm_password: {
           equalTo: "#your_new_password"
         }
       },
       messages: {
         verify_phone_no: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           remote: "* Please enter registered mobile no",
         },
         reset_otp_no: {
           required: "* OTP is required",
           minlength: jQuery.validator.format("* Please enter 6 digit number"),
           maxlength: jQuery.validator.format("* Please enter 6 digit number"),
           remote: "* Invaild OTP",
         },
         your_new_password: {
           required: "* Password is required",
           minlength: jQuery.validator.format("* Password enter minimum 4 characters"),
           // maxlength: jQuery.validator.format("* Password must between 4 - 10 characters"),
         },
         your_confirm_password: {
           required: "* Enter confirm password same as new password",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".reset_password_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".reset_password_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
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
              $(".temples_add_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".temples_add_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
    
    
     ////////// JPSR Agent form ////////////
     $("#JpsrAgentForm").validate({
       rules: {
         person_name: {
           required: true,
           lettersonlys: true,
         },
         mobile_no: {
           required: true,
           number: true,
           minlength: 10,
           maxlength: 10,
           remote: {
              url: 'validate_function.php',
              type: "post",
              data: 
                {
                  mobile_no: function() {
                  return $("#mobile_no").val();
                }
               }
              }
         },
         email: {
           emailvalid: true,
         },
         address: {
           required: true,
         },
         area: {
           required: true,
           lettersonlys: true,
         },
         city: {
           required: true,
           lettersonlys: true,
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
           filesize: 5000000,
         },
         aadhaar_image_front: {
           required: true,
           extension: "jpg|jpeg|png|gif",
           filesize: 5000000,
         },
         aadhaar_image_back: {
           required: true,
           extension: "jpg|jpeg|png|gif",
           filesize: 5000000,
         },
         account_no: {
           required: true,
           number: true,
         },
         ifsc_code: {
           required: true,
         },
         holder_name: {
           required: true,
           lettersonlys: true,
         },
         branch_name: {
           required: true,
           lettersonlys: true,
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
           remote: "Mobile no already exists!",
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
           filesize:" Image size must be less than 5 MB.",
         },
         aadhaar_image_front: {
           required: "* Aadhaar front image is required",
           extension: "* only Image files allowed",
           filesize:" Image size must be less than 5 MB.",
         },
         aadhaar_image_back: {
           required: "* Aadhaar back image is required",
           extension: "* only Image files allowed",
           filesize:" Image size must be less than 5 MB.",
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
              $(".agent_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".agent_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });


    
    ////////// JPSR Edit Agent form ////////////
     $("#JpsrEditAgentForm").validate({
       rules: {
         person_name: {
           required: true,
           lettersonlys: true,
         },
         mobile_no: {
           required: true,
           number: true,
           minlength: 10,
           maxlength: 10,
         },
         email: {
           emailvalid: true,
         },
         address: {
           required: true,
         },
         area: {
           required: true,
           lettersonlys: true,
         },
         city: {
           required: true,
           lettersonlys: true,
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
           filesize: 5000000,
         },
         aadhaar_image_front: {
           extension: "jpg|jpeg|png|gif",
           filesize: 5000000,
         },
         aadhaar_image_back: {
           extension: "jpg|jpeg|png|gif",
           filesize: 5000000,
         },
         account_no: {
           required: true,
           number: true,
         },
         ifsc_code: {
           required: true,
         },
         holder_name: {
           required: true,
           lettersonlys: true,
         },
         branch_name: {
           required: true,
           lettersonlys: true,
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
           filesize:" Image size must be less than 5 MB.",
         },
         aadhaar_image_front: {
           extension: "* only Image files allowed",
           filesize:" Image size must be less than 5 MB.",
         },
         aadhaar_image_back: {
           extension: "* only Image files allowed",
           filesize:" Image size must be less than 5 MB.",
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
              $(".agent_update_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".agent_update_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });



    ////////// JPSR Edit Agent form ////////////
     $("#JpsrEditBankAgentForm").validate({
       rules: {
         account_no: {
           required: true,
           number: true,
         },
         ifsc_code: {
           required: true,
         },
         holder_name: {
           required: true,
           lettersonlys: true,
         },
         branch_name: {
           required: true,
           lettersonlys: true,
         }
       },
       messages: {
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
              $(".agent_update_bank_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".agent_update_bank_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
     
     
     
     ////////// Register ur business form ////////////
     $("#RegisterBusinessForm").validate({
       rules: {
         business_name: {
           required: true,
           lettersonlys: true,
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
           lettersonlys: true,
         },
         mobile_no: {
           required: true,
           number: true,
           minlength: 10,
           maxlength: 10,
         },
         business_mobile_no: {
           required: true,
           number: true,
           minlength: 10,
           maxlength: 10,
           // remote: {
           //    url: 'validate_function.php',
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
           emailvalid: true,
         },
         address: {
           required: true,
         },
         area: {
           required: true,
           lettersonlys: true,
         },
         ward_no: {
           number: true,
         },
         city: {
           required: true,
           lettersonlys: true,
         },
         location: {
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
         category: {
           required: true,
         },
         other_category: {
           required: true,
         },
         refered_by_code: {
           remote: {
              url: 'validate_agent.php',
              type: "post",
              data: 
                {
                  refered_by_code: function() {
                  return $("#business_refered_by_code").val();
                }
               }
              }
         },
         payment_image: {
           required: true,
           extension: "jpg|jpeg|png|gif",
           filesize: 5000000,
         },
       },
       messages: {
         business_name: {
           required: "* Business name is required",
           remote: "Business name already exists!",
         },
         person_name: {
           required: "* Person name is required",
         },
         mobile_no: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         business_mobile_no: {
           required: "* Business Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           remote: "Mobile no already exists!",
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
         category: {
           required: "* Category is required",
         },
         other_category: {
           required: "* Category name is required",
         },
         refered_by_code: {
           remote: "Please enter valid agent code",
         },
         payment_image: {
           required: "Payment screenshot image is required",
           extension: "* only Image files allowed",
           filesize:" Image size must be less than 5 MB.",
         },
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".business_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".business_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
      ////////// Register ur business form ////////////
     $("#RegisterBusinessUpdateForm").validate({
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
           remote: {
              url: 'validate_function.php',
              type: "post",
              data: 
                {
                  mobile_no: function() {
                  return $("#mobile_no").val();
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
         alternative_mobile_no: {
           number: true,
           minlength: 10,
           maxlength: 10,
         },
         category: {
           required: true,
         },
         other_category: {
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
           remote: "Mobile no already exists!",
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
         alternative_mobile_no: {
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         category: {
           required: "* Category is required",
         },
         other_category: {
           required: "* Category name is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".update_business_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".update_business_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
      ////////// Referral income form ////////////
     $("#ReferralForm").validate({
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
         alternative_mobile_no: {
           number: true,
           minlength: 10,
           maxlength: 10,
         },
         category: {
           required: true,
         },
         other_category: {
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
         alternative_mobile_no: {
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         category: {
           required: "* Category is required",
         },
         other_category: {
           required: "* Category name is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".referral_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".referral_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
      ////////// Register ur ad form ////////////
     $("#RegisterAdForm").validate({
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
         amount: {
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
         amount: {
           required: "* Amount is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".regAd_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".regAd_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// Register ur ad form ////////////
     $("#RegisterAdEditForm").validate({
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
         amount: {
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
         amount: {
           required: "* Amount is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".regAd_Edit_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".regAd_Edit_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
      ////////// Register ur ad form ////////////
     $("#RegisterOfferForm").validate({
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
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         offer_description: {
           required: true,
         },
         offer_amount: {
           required: true,
         },
         offer_period_start_date: {
           required: true,
         },
         offer_period_end_date: {
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
           required: "* Offer title is required",
         },
         image_path: {
           required: "* Offer image is required",
           extension: "* Only image files allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         offer_description: {
           required: "* Offer Description is required",
         },
         offer_amount: {
           required: "* Amount is required",
         },
         offer_period_start_date: {
           required: "* Period start is required",
         },
         offer_period_end_date: {
           required: "* Period end is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".regOffers_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".regOffers_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// home services form ////////////
     $("#HomeServicesForm").validate({
       rules: {
         user_name: {
           required: true,
         },
         user_mobile: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         user_email: {
           email: true,
         },
         services: {
           required: true,
         },
         address: {
           required: true,
         },
         description: {
           required: true,
         },
         image_path: {
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         audio_path: {
           extension: "mp3",
           filesize: 2000000,
         }
       },
       messages: {
         user_name: {
           required: "* Name is required",
         },
         user_mobile: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         services: {
           required: "* Services is required",
         },
         address: {
           required: "* Address is required",
         },
         description: {
           required: "* Description is required",
         },
         image_path: {
           extension: "* Only image files allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         audio_path: {
           extension: "* Only audio files allowed",
           filesize:" Audio size must be less than 2 MB.",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".home_service_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".home_service_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// business services form ////////////
     $("#BusinessServicesForm").validate({
       rules: {
         user_name: {
           required: true,
         },
         user_mobile: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         user_email: {
           email: true,
         },
         services: {
           required: true,
         },
         address: {
           required: true,
         },
         description: {
           required: true,
         },
         image_path: {
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         audio_path: {
           extension: "mp3",
           filesize: 2000000,
         }
       },
       messages: {
         user_name: {
           required: "* Name is required",
         },
         user_mobile: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         services: {
           required: "* Services is required",
         },
         address: {
           required: "* Address is required",
         },
         description: {
           required: "* Description is required",
         },
         image_path: {
           extension: "* Only image files allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         audio_path: {
           extension: "* Only audio files allowed",
           filesize:" Audio size must be less than 2 MB.",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".business_service_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".business_service_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// property services form ////////////
     $("#PropertyServicesForm").validate({
       rules: {
         user_name: {
           required: true,
         },
         user_mobile: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         user_email: {
           email: true,
         },
         services: {
           required: true,
         },
         address: {
           required: true,
         },
         description: {
           required: true,
         },
         image_path: {
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         audio_path: {
           extension: "mp3",
           filesize: 2000000,
         }
       },
       messages: {
         user_name: {
           required: "* Name is required",
         },
         user_mobile: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         services: {
           required: "* Services is required",
         },
         address: {
           required: "* Address is required",
         },
         description: {
           required: "* Description is required",
         },
         image_path: {
           extension: "* Only image files allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         audio_path: {
           extension: "* Only audio files allowed",
           filesize:" Audio size must be less than 2 MB.",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".property_service_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".property_service_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// personal services form ////////////
     $("#PersonalServicesForm").validate({
       rules: {
         user_name: {
           required: true,
         },
         user_mobile: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         user_email: {
           email: true,
         },
         services: {
           required: true,
         },
         address: {
           required: true,
         },
         description: {
           required: true,
         },
         image_path: {
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         audio_path: {
           extension: "mp3",
           filesize: 2000000,
         }
       },
       messages: {
         user_name: {
           required: "* Name is required",
         },
         user_mobile: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         services: {
           required: "* Services is required",
         },
         address: {
           required: "* Address is required",
         },
         description: {
           required: "* Description is required",
         },
         image_path: {
           extension: "* only Image files allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         audio_path: {
           extension: "* Only audio files allowed",
           filesize:" Audio size must be less than 2 MB.",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".personal_service_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".personal_service_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// doctor appointment form ////////////
     $("#OtherServicesAppointmentForm").validate({
       rules: {
         user_name: {
           required: true,
         },
         user_mobile: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         user_email: {
           email: true,
         },
         services: {
           required: true,
         },
         specialist: {
           required: true,
         },
         doctor_name: {
           required: true,
         },
         appointment_date: {
           required: true,
         },
         timings: {
           required: true,
         },
         address: {
           required: true,
         },
         description: {
           required: true,
         },
         image_path: {
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         audio_path: {
           extension: "mp3",
           filesize: 2000000,
         }
       },
       messages: {
         user_name: {
           required: "* Name is required",
         },
         user_mobile: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         services: {
           required: "* Services is required",
         },
         specialist: {
           required: "* Specialist is required",
         },
         doctor_name: {
           required: "* Doctor name is required",
         },
         appointment_date: {
           required: "* Appointment date is required",
         },
         timings: {
           required: "* Timings is required",
         },
         address: {
           required: "* Address is required",
         },
         description: {
           required: "* Description is required",
         },
         image_path: {
           extension: "* Only image files allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         audio_path: {
           extension: "* Only audio files allowed",
           filesize:" Audio size must be less than 2 MB.",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".doctor_service_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".doctor_service_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
     ////////// renting services form ////////////
     $("#PropertyServicesRentingForm").validate({
       rules: {
         user_name: {
           required: true,
         },
         user_mobile: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         user_email: {
           email: true,
         },
         services: {
           required: true,
         },
         property_address: {
           required: true,
         },
         address: {
           required: true,
         },
         description: {
           required: true,
         },
         image_path: {
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         audio_path: {
           extension: "mp3",
           filesize: 2000000,
         }
       },
       messages: {
         user_name: {
           required: "* Name is required",
         },
         user_mobile: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         services: {
           required: "* Services is required",
         },
         property_address: {
           required: "* Property address is required",
         },
         address: {
           required: "* Address is required",
         },
         description: {
           required: "* Description is required",
         },
         image_path: {
           extension: "* only Image files allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         audio_path: {
           extension: "* Only audio files allowed",
           filesize:" Audio size must be less than 2 MB.",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".renting_service_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".renting_service_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
        ////////// reselling services form ////////////
     $("#PropertyServicesResellingForm").validate({
       rules: {
         user_name: {
           required: true,
         },
         user_mobile: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         user_email: {
           email: true,
         },
         services: {
           required: true,
         },
         property_address: {
           required: true,
         },
         address: {
           required: true,
         },
         description: {
           required: true,
         },
         image_path: {
           extension: "jpg|jpeg|png|gif",
           filesize: 2000000,
         },
         audio_path: {
           extension: "mp3",
           filesize: 2000000,
         }
       },
       messages: {
         user_name: {
           required: "* Name is required",
         },
         user_mobile: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         services: {
           required: "* Services is required",
         },
         property_address: {
           required: "* Property address is required",
         },
         address: {
           required: "* Address is required",
         },
         description: {
           required: "* Description is required",
         },
         image_path: {
           extension: "* only Image files allowed",
           filesize:" Image size must be less than 2 MB.",
         },
         audio_path: {
           extension: "* Only audio files allowed",
           filesize:" Audio size must be less than 2 MB.",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".reselling_service_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".reselling_service_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
     
     
       ////////// contact form ////////////
     $("#ContactForm").validate({
       rules: {
         f_name: {
           required: true,
         },
         l_name: {
           required: true,
         },
         phone: {
           required: true,
           number: true,
           minlength: 10,
           maxlength:10,
         },
         email: {
           email: true,
         },
         comments: {
           required: true,
         }
       },
       messages: {
         f_name: {
           required: "* First Name is required",
         },
         l_name: {
           required: "* Last Name is required",
         },
         phone: {
           required: "* Mobile no is required",
           minlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
           maxlength: jQuery.validator.format("* Please enter 10 digit Mobile no"),
         },
         comments: {
           required: "* Comments is required",
         }
       },
       submitHandler: function(form) { // <- pass 'form' argument in
              $(".contact_submit").attr("disabled", true).css("cursor", "not-allowed");
              $(".contact_submit").html('<img src="images/loading_spinner.gif" style="width:20px;height:20px;"> Loading...');
              form.submit(); // <- use 'form' argument here.
          }
     });
  
  
  
  
  });