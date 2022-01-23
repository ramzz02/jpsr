<!-- Wrapper End -->
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
<script src="js/states.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img width="150px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>
<script>
			grecaptcha.ready(function() {
			grecaptcha.execute('6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu', {action: 'https://jpsr.in'}).then(function(token) {
			...
			});
			});
</script>
<script>
	$(document).ready(function()
{
	$("#two").hide();
    $("#category").change(function()
	{
	   
	
		var name=$('#category').val();

			if(name=='news')
		{
	$("#one").hide();   
	$("#two").show();   
	
			}
			if(name=='business')
		{
	$("#one").show();   
	$("#two").hide();   
	
			}
	
	});
});
</script>

</body>
</html>