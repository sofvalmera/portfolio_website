<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spectator Panel - Register</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('login/admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('login/admin-assets/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('login/admin-assets/css/custom.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->

   
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h3">Create an Account</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register to start your session</p>
            @if (Session::has('success'))
                <div class="alert alert-success">
                        {{Session::get('success')}}
                </div>  
            @endif
            <form action="{{ route('spectator.processRegister') }}" name="registerf" id="registerf" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" id="name" required placeholder="Full Name">
                    <p></p>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
              
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" id="email"   required placeholder="Email">
                    <p></p>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="phone" id="phone"   placeholder="Phone">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
               
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" required  placeholder="Password">
                    <p></p>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
               
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required  placeholder="Confirm Password">
                    <p></p>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form>
            <p class="mt-3 mb-1">
                Already have an account? <a href="{{route('spectator.login')}}">Sign in</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<script>

$("#registerf").submit(function(event){
		event.preventDefault();
		// var element =$(this);
        // $("button[type=submit]").prop('disable',true);

		$("button[type=submit]").prop('disable',true);
		$.ajax({
			url: '{{ route("spectator.processRegister") }}',
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

                        window.location.href="{{route('spectator.login')}}";

                       

                }
				

			}, error: function(JQXHR, exception){
				console.log("Something Went Wrong");
			}
		});
	});

</script>

<script>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{asset('login/admin-assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('login/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('login/admin-assets/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('login/admin-assets/js/demo.js')}}"></script>
</script>
</body>
</html>
