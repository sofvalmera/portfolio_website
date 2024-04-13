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
<section class=" section-10">
    <div class="container">
    @if (Session::has('success'))
                <div class="alert alert-success">
                        {{Session::get('success')}}
                </div>  
            @endif
        <div class="login-form">    
            <form action="{{ route('login') }}" method="post" name="loginForm" id="loginForm">
                @csrf
                <h4 class="modal-title">Login</h4>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                    <p></p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                    <p></p>
                </div>
                <div class="form-group small">
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div> 
                <button type="submit" class="btn btn-dark btn-block btn-lg" value="Login">Login</button>
            </form>			
            <div class="text-center small">Don't have an account? <a href="{{ route('account.register') }}">Sign Up Now</a></div>
        </div>
    </div>
</section>
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





