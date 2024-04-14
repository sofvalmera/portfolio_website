<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spectator Panel - Register</title>
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
            <form action="" name="registerf" id="registerf" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" id="name"  placeholder="Full Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <p class="text-danger error-message" id="name-error"></p>
              
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" id="email"    placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <p class="text-danger error-message" id="email-error"></p>
                
                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="phone" id="phone"   placeholder="Phone">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <p class="text-danger error-message" id="phone-error"></p>
               
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password"  placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <p class="text-danger error-message" id="password-error"></p>
               
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"   placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <p class="text-danger error-message" id="password_confirmation-error"></p>
               
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
    document.getElementById("registerf").addEventListener("submit", function(event) {
        event.preventDefault();
        document.querySelector("button[type=submit]").disabled = true;
        document.querySelectorAll(".error-message").forEach(function(element) {
            element.textContent = "";
        });
        
        fetch('{{ route("spectator.processRegister") }}', {
            method: 'POST',
            body: new FormData(document.getElementById("registerf")),
        })
        .then(response => response.json())
        .then(data => {
            if(data.status == false){
                Object.keys(data.errors).forEach(function(key) {
                    document.getElementById(key + "-error").textContent = data.errors[key][0];
                });
            } else {
                window.location.href = "{{ route('spectator.login') }}";
            }
            document.querySelector("button[type=submit]").disabled = false;
        })
        .catch((error) => {
            console.error('Error:', error);
            document.querySelector("button[type=submit]").disabled = false;
        });
    });
</script>

<script>
    $("#").submit(function(event){
        event.preventDefault();
        $("button[type=submit]").prop('disabled', true);
        $(".error-message").text(''); // Clear previous error messages
        $.ajax({
            url: '{{ route("spectator.processRegister") }}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response){
                if(response.status == false){
                    $.each(response.errors, function(key, value){
                        $("#" + key + "-error").text(value);
                    });
                } else {
                    window.location.href = "{{ route('spectator.login') }}";
                }
                $("button[type=submit]").prop('disabled', false);
            },
            error: function(jqXHR, exception){
                console.log("Something Went Wrong");
                $("button[type=submit]").prop('disabled', false);
            }
        });
    });
</script>
</body>
</html>
