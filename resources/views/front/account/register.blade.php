<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SJLV-Sofronio Jr. L. Valmera</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset('front-assets/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('front-assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('front-assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('front-assets/css/style.css')}}" rel="stylesheet">
    </head>
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                     <li class="breadcrumb-item"><a class="white-text" href="{{route('front.home')}}">Home</a></li>
                    <li class="breadcrumb-item">Register</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-10">
        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success">
                        {{Session::get('success')}}
                </div>  
            @endif
            <div class="login-form">    
                <form action="" method="" name="registerf" id="registerf">
                    <h4 class="modal-title">Register</h4><br>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                        <p></p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                        <p></p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone">
                        <p></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        <p></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation">
                        <p></p>
                    </div>
                    <div class="form-group small">
                        <a href="#" class="forgot-link">Forgot Password?</a>
                    </div> 
                    <button type="submit" class="btn btn-dark btn-block btn-lg" value="Register">Sign Up</button>
                </form>			
                <div class="text-center small">Already have an account? <a href="#">Login Now</a></div>
            </div>
        </div>
    </section>
    <script>

$("#registerf").submit(function(event){
		event.preventDefault();
		// var element =$(this);
        // $("button[type=submit]").prop('disable',true);

		$("button[type=submit]").prop('disable',true);
		$.ajax({
			url: '{{ route("account.processRegister") }}',
			type: 'post',
			data: $(this).serializeArray(),
			dataType:'json',
			success:function(response){
			

					var errors = response.errors;
                            if(response["status"] == false){
                    if(errors.name){
                        $("#name").siblings("p").addClass('invalid-feedback').html(errors.name);
                        $("#name").addClass('is-invalid');
                    }else {
                        $("#name").siblings("p").removeClass('invalid-feedback').html('');
                        $("#name").removeClass('is-invalid');
                    }
                    if(errors.email){
                        $("#email").siblings("p").addClass('invalid-feedback').html(errors.email);
                        $("#email").addClass('is-invalid');
                    }else {
                        $("#email").siblings("p").removeClass('invalid-feedback').html('');
                        $("#email").removeClass('is-invalid');
                    }
                    if(errors.password){
                        $("#password").siblings("p").addClass('invalid-feedback').html(errors.password);
                        $("#password").addClass('is-invalid');
                    }else {
                        $("#password").siblings("p").removeClass('invalid-feedback').html('');
                        $("#password").removeClass('is-invalid');
                    }
                    


			

				}else{
                    $("#name").siblings("p").removeClass('invalid-feedback').html('');
                    $("#name").removeClass('is-invalid');
                    $("#email").siblings("p").removeClass('invalid-feedback').html('');
                    $("#email").removeClass('is-invalid');

                   
                        
                        $("#password").siblings("p").removeClass('invalid-feedback').html('');
                        $("#password").removeClass('is-invalid');

                        window.location.href="{{route('account.login')}}";

                       

                }
				

			}, error: function(JQXHR, exception){
				console.log("Something Went Wrong");
			}
		});
	});

</script>

 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('front-assets/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('front-assets/lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('front-assets/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('front-assets/lib/typed/typed.min.js')}}"></script>
        <script src="{{asset('front-assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('front-assets/lib/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('front-assets/lib/lightbox/js/lightbox.min.js')}}"></script>
        
        <!-- Contact Javascript File -->
        <script src="{{asset('front-assets/mail/jqBootstrapValidation.min.js')}}"></script>
        <script src="{{asset('front-assets/mail/contact.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{asset('front-assets/js/main.js')}}"></script>
    
</html>



