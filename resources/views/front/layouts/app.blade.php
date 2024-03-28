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
    <style>
        #login-link,
#signup-link {
    background-color: #000000;
    color: #ffffff; /* Text color */
    padding: 8px 12px; /* Adjust padding as needed */
    margin-left:6px;
    border-radius: 6px; /* Add rounded corners */
}

    </style>

    <body data-spy="scroll" data-target=".navbar" data-offset="51">
        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="container-fluid">
                <a href="index.html" class="navbar-brand">SJLV</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#service" class="nav-item nav-link">Service</a>
                        <a href="#experience" class="nav-item nav-link">Resume</a>
                        <a href="#portfolio" class="nav-item nav-link">Portfolio</a>
                        <!-- <a href="#price" class="nav-item nav-link">Price</a> -->
                        <a href="#review" class="nav-item nav-link">Review</a>
                        <a href="#team" class="nav-item nav-link">Team</a>
                        <a href="#blog" class="nav-item nav-link">Blog</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                        <a href="#" class="nav-item nav-link" id="login-link">Login</a>
                        <a href="#" class="nav-item nav-link" id="signup-link">Signup</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->


        <!-- Hero Start -->
        <div class="hero" id="home">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-6">
                        <div class="hero-content">
                            <div class="hero-text">
                                <p>I'm</p>
                                <h1>Sofronio Jr. L. Valmera</h1>
                                <h2></h2>
                                <!-- <div class="typed-text">Web Designer, Web Developer, Front End Developer, Apps Designer, Apps Developer</div> -->
                                <div class="typed-text">Web Developer </div>
                            </div>
                            <div class="hero-btn">
                                <!-- <a class="btn" href="">Hire Me</a> -->
                                <a class="btn"  href="#contact">Contact Me</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-sm-12 col-md-6 d-none d-md-block">
                        <div class="hero-image">
                            <img src="{{asset('front-assets/img/sof.png')}}" alt="Hero Image">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Hero End -->
        @yield('content')

      

        

        <!-- Footer Start -->
        <div class="footer wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                <div class="container">
                    <div class="footer-info">
                        <h2>Sofronio Jr. L. Valmera</h2>
                        <h3>Proteccion,Hilongos,Leyte 6524</h3>
                        <div class="footer-menu">
                            <p>+639123445555</p>
                            <p>sofroniolvalmera@gmail.com</p>
                        </div>
                        <div class="footer-social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="container copyright">
                    <p>&copy; <a href="#">SJLV</a>, All Right Reserved | Designed By <a href="https://htmlcodex.com">SofValmera</a></p>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        
        <!-- Back to top button -->
        <a href="#" class="btn back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        
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
    </body>
</html>
