  
@extends('front.layouts.app')
@section('content')
  <!-- About Start -->
  <div class="about wow fadeInUp" data-wow-delay="0.1s" id="about">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                    @if (getProfiles()->isNotEmpty())
                    @foreach (getProfiles() as $profile)
                        <div class="about-img">
                        @if ($profile->image != "")
                            <img width="20" height="20" src="{{asset('uploads/profile/thumb/'.$profile->image)}}" alt="" class="img-fluid">
                            
                           
                           
                            
                            <!-- <img src="{{asset('front-assets/img/soo.jpg')}}" alt="Image"> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-header text-left">
                                <p>About Me</p>
                                <!-- <h2>3 Years Experience</h2> -->
                                <!-- 123 -->
                            </div>
                            
                            <div class="about-text">
                            @if (getProfiles()->isNotEmpty())
                          @foreach (getProfiles() as $profile)
                                <p> I'm <b>{{$profile->fullname}}</b>, a third-year BSIT student at MLG College of Learning, 
                                with a passion for web development. I'm dedicated to mastering the art of web development, 
                                fueled by curiosity, creativity, and a commitment to continuous learning.<br><br>
                                
                                <B>Birthday:</b>&nbsp&nbsp{{$profile->birthday}}  <br>
                                <B>Phone:</b>&nbsp&nbsp +63{{$profile->phonenumber}} <br>
                                <B>Address:</b>&nbsp&nbspBrgy.&nbsp{{$profile->barangay}}&nbsp{{$profile->municipality}},{{$profile->province}}&nbsp{{$profile->zipcode}} <br>
                                <B>Age:</b> &nbsp&nbsp{{$profile->age}} <br>
                                <B>Degree:</b> &nbsp&nbsp{{$profile->degree}} <br>
                                <B>Personal Email:</b>&nbsp&nbsp{{$profile->email}}  <br>
                                </p>  
                            
                                    
                            </div>
                           
                            
                            <div class="skills">
                                <div class="skill-name">
                                    <p>PHP</p><p>42%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="skill-name">
                                    <p>HTML</p><p>40%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="skill-name">
                                    <p>CSS</p><p>24%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="skill-name">
                                    <p>JAVASCRIPT</p><p>14%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            @endif
                            <!-- <a class="btn" href="#service">Read More</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

         <!-- Blog Start -->
         <div class="blog" id="blog">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>Blog</p>
                    <!-- <h2>Latest Articles</h2> -->
                </div>
                <div class="row">
                @if (getBlogs()->isNotEmpty())
                    @foreach (getBlogs() as $blog)
               
                    <div class="col-lg-6">
                        <div class="blog-item wow fadeInUp" data-wow-delay="0.3s">
                            <div class="blog-img">
                            @if ($blog->image != "")
                            <img width="20" height="20" src="{{asset('uploads/blog/thumb/'.$blog->image)}}" alt="" class="img-fluid">
                            @endif
                               
                            </div>
                            <div class="blog-text">
                                <h2>{{$blog->title}}</h2>
                                <div class="blog-meta">
                                    <p><i class="far fa-user"></i>{{$blog->name}}</p>
                                    <p><i class="far fa-list-alt"></i>{{$blog->project}}</p>
                                    <p><i class="far fa-calendar-alt"></i>{{$blog->date}}</p>
                                    <!-- <p><i class="far fa-heart"></i>10</p> -->
                                </div>
                                <p>
                                {{$blog->description}}
                                </p>
                               
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- Blog End -->

        
        
        <!-- Service Start -->
        <div class="service" id="service">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>Services</p>
                    <h2></h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.0s">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="fa fa-laptop"></i>
                            </div>
                            <div class="service-text">
                                <h3>Web Design</h3>
                                <p>
                                I am devoted to creating visually stunning and user-friendly websites.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="fa fa-laptop-code"></i>
                            </div>
                            <div class="service-text">
                                <h3>Web Development</h3>
                                <p>
                                    
                                </p>I'm a modest web developer with a genuine passion for crafting dynamic and innovative online solutions.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="fas fa-images"></i>
                            </div>
                            <div class="service-text">
                                <h3>Graphic Design</h3>
                                <p>
                                I am committed to crafting dynamic visual experiences that captivate and engage audiences.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="fas fa-chalkboard"></i>
                            </div>
                            <div class="service-text">
                                <h3>Freelancer</h3>
                                <p>
                                I am dedicated to creating robust and efficient solutions that power the functionality of websites and applications.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        
        
         <!-- Experience Start -->
        <div class="experience" id="experience">
            <div class="container">
                <header class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>My Resume</p>
                    <h2>Education</h2>
                </header>
                <div class="timeline">
                    <div class="timeline-item left wow slideInLeft" data-wow-delay="0.1s">
                        <div class="timeline-text">
                            <div class="timeline-date">2021 - 2024</div>
                            <h2>MLG COLLEGE OF LEARNING INC. - (MLG INC.)</h2>
                            <h4>Brgy. Atabay Hilongos, Leyte 6524 Philippines</h4>
                            <p>
                            Bachelor of Science in Information Technology (BSIT)<br>
                            Major in Web Developing
                            </p>
                        </div>
                    </div>
                    <div class="timeline-item right wow slideInRight" data-wow-delay="0.1s">
                        <div class="timeline-text">
                            <div class="timeline-date">2019 - 2021</div>
                            <h2>BUNG-AW NATIONAL HIGH SCHOOL - (BNHS-Senior High)</h2>
                            <h4>Brgy. Bung-aw Hilongos, Leyte 6524 Philippines</h4>
                            <p>
                                Information and Communication Technology (ICT)<br>
                                Major in Web Developing
                            </p>
                        </div>
                    </div>
                    <div class="timeline-item left wow slideInLeft" data-wow-delay="0.1s">
                        <div class="timeline-text">
                        <div class="timeline-date">2015 - 2019</div>
                            <h2>BUNG-AW NATIONAL HIGH SCHOOL - (BNHS-Junior High)</h2>
                            <h4>Brgy. Bung-aw Hilongos, Leyte 6524 Philippines</h4>
                            <p>
                                Most Resourceful<br>
                                Most Resourceful
                            </p>
                        </div>
                    </div>
                    <div class="timeline-item right wow slideInRight" data-wow-delay="0.1s">
                        <div class="timeline-text">
                            <div class="timeline-date">2009 - 2015</div>
                            <h2>BUNG-AW ELEMENTARY SCHOOL - (BES)</h2>
                            <h4>Brgy. Bung-aw Hilongos, Leyte 6524 Philippines</h4>
                            <p>
                                Most Resourceful<br>
                                Most Resourceful
                            </p>
                        </div>
                    </div>

            </div>
        </div>
        <div class="container">
                <header class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <h2>Experience</h2>
                </header>
                <div class="timeline">
                    <div class="timeline-item left wow slideInLeft" data-wow-delay="0.1s">
                        <div class="timeline-text">
                             <div class="timeline-date">2021 - 2024</div>
                            <h2>Web Developer</h2>
                            <h4>Hilongos, Leyte 6524 Philippines</h4>
                            <p>
                            Frontend Development<br>
                            Backend Development<br>
                            Responsive Web Design
                                
                            </p>
                        </div>
                           
                    </div>
                    <div class="timeline-item right wow slideInRight" data-wow-delay="0.1s">
                        <div class="timeline-text">
                        <div class="timeline-date">2019 - 2020</div>
                            <h2>Graphic Designer</h2>
                            <h4>Hilongos, Leyte 6524 Philippines</h4>
                            <p>
                            Video Editing<br>
                            Photo Editing
                           
                            </p>
                        </div>
                           
                    </div>
                   
                   

            </div>
        </div>
        <!-- Job Experience End -->
        
        
        <!-- Banner Start -->
       <!--<div class="banner wow zoomIn" data-wow-delay="0.1s">
              <div class="container">
                <div class="section-header text-center">
                    <p>Reasonable Price</p>
                    <h2>Get A <span>Special</span> Price</h2>
                </div>
                <div class="container banner-text">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. 
                    </p>
                    <a class="btn">Pricing Plan</a>
                </div>
            </div> 
        </div>-->
        <!-- Banner End -->


        <!-- Portfolio Start -->
        <div class="portfolio" id="portfolio">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>Portfolio</p>
                    <h2>My Works</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul id="portfolio-filter">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-1">Web Design</li>
                            <li data-filter=".filter-2">Mobile Apps</li>
                            <li data-filter=".filter-3">Game Dev</li>
                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container">
                    <div  class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-1 wow fadeInUp" data-wow-delay="0.0s">
                        <div class="portfolio-wrap">
                            <div class="portfolio-img">
                                <img src="{{asset('front-assets/img/sales.png')}}"  alt="Image">
                            </div>
                            <div class="portfolio-text">
                                <h3>Sales System</h3>
                                <a class="btn" href="{{asset('front-assets/img/sales.png')}}" data-lightbox="portfolio">+</a>
                                <!-- <a class="btn"  href="http://salesystem.webactivities.online/" >&#128279;</a> -->
                                <a class="btn"  href="http://salesystem.webactivities.online/">~</a>
                                
                            </div>
                        </div>
                    </div>
                   <!-- <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-2 wow fadeInUp" data-wow-delay="0.2s"> -->
                         <!-- <div class="portfolio-wrap">
                            <div class="portfolio-img">
                                <img src="img/portfolio-2.jpg" alt="Image">
                            </div>
                            <div class="portfolio-text">
                                <h3>Product Landing Page</h3>
                                <a class="btn" href="img/portfolio-2.jpg" data-lightbox="portfolio">+</a>
                            </div>
                        </div>-->
                    <!-- </div>  -->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-3 wow fadeInUp" data-wow-delay="0.4s"> -->
                        <!-- <div class="portfolio-wrap">
                            <div class="portfolio-img">
                                <img src="img/portfolio-3.jpg" alt="Image">
                            </div>
                            <div class="portfolio-text">
                                <h3>JavaScript quiz game</h3>
                                <a class="btn" href="img/portfolio-3.jpg" data-lightbox="portfolio">+</a>
                            </div>
                        </div> -->
                    <!-- </div> -->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-1 wow fadeInUp" data-wow-delay="0.6s"> -->
                        <!-- <div class="portfolio-wrap">
                            <div class="portfolio-img">
                                <img src="img/portfolio-4.jpg" alt="Image">
                            </div>
                            <div class="portfolio-text">
                                <h3>JavaScript drawing</h3>
                                <a class="btn" href="img/portfolio-4.jpg" data-lightbox="portfolio">+</a>
                            </div>
                        </div> -->
                    <!-- </div> -->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-2 wow fadeInUp" data-wow-delay="0.8s"> -->
                        <!-- <div class="portfolio-wrap">
                            <div class="portfolio-img">
                                <img src="img/portfolio-5.jpg" alt="Image">
                            </div>
                            <div class="portfolio-text">
                                <h3>Social Mobile Apps</h3>
                                <a class="btn" href="img/portfolio-5.jpg" data-lightbox="portfolio">+</a>
                            </div>
                        </div> -->
                    <!-- </div> -->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-3 wow fadeInUp" data-wow-delay="1s"> -->
                        <!-- <div class="portfolio-wrap">
                            <div class="portfolio-img">
                                <img src="img/portfolio-6.jpg" alt="Image">
                            </div>
                            <div class="portfolio-text">
                                <h3>Company Website</h3>
                                <a class="btn" href="img/portfolio-6.jpg" data-lightbox="portfolio">+</a>
                            </div>
                        </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- <div></div> -->
        <!-- Portfolio End -->
        
        
        <!-- Banner Start -->
        <!-- <div class="banner wow zoomIn" data-wow-delay="0.1s"> -->
             <!-- <div class="container">
                <div class="section-header text-center">
                    <p>Awesome Discount</p>
                    <h2>Get <span>30%</span> Discount</h2>
                </div>
                <div class="container banner-text">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. 
                    </p>
                    <a class="btn">Order Now</a>
                </div>
            </div> -->
        <!-- </div>  -->
        <!-- Banner End -->
        
        
        <!-- Price Start -->
         <div class="price" id="price">
            
        </div> 
        <!-- Price End -->
        
        
        <!-- Testimonial Start -->
        <div class="testimonial wow fadeInUp" data-wow-delay="0.2s" id="review">
        <!-- <p>Testimonial</p> -->
            <div class="container">
                <div class="testimonial-icon">
                    <i class="fa fa-quote-left"></i>
                </div>
                <div class="owl-carousel testimonials-carousel">
                    <!-- <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="img/testimonial-1.jpg" alt="Image">
                        </div>
                        <div class="testimonial-text">
                            <p>
                                Lorem ipsum dolor sit amet consec adipis elit. Etiam accums lacus eget velit tincid, quis suscip justo dictum. Lorem ipsum dolor sit amet consec adipis elit.
                            </p>
                            <h3>Customer Name</h3>
                            <h4>Profession</h4>
                        </div>
                    </div> -->
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="{{asset('front-assets/img/lina.jpg')}}" alt="Image">
                        </div>
                        <div class="testimonial-text">
                            <p>
                                Kuhaon ka naho sof. tigbunot
                            </p>
                            <h3>Melchard Lina</h3>
                            <h4>Game Developer</h4>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="{{asset('front-assets/img/dexter.jpg')}}" alt="Image">
                        </div>
                        <div class="testimonial-text">
                        <p>
                                tagpila lubi sof.
                            </p>
                            <h3>Dexter Mano</h3>
                            <h4>Web Designer</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        <!-- Team Start -->
        <div class="team" id="team">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>My Team</p>
                    <h2>Team Members</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.0s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{asset('front-assets/img/riz.jpg')}}" alt="Image">
                            </div>
                            <div class="team-text">
                                <h2>Rizaldo Inghug</h2>
                                <h4>Front-End Designer</h4>
                                <p>
                                    A Great Front-End Designer.
                                </p>
                                <!-- <div class="team-social">
                                    <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{asset('front-assets/img/fred.png')}}" alt="Image">
                            </div>
                            <div class="team-text">
                                <h2>Fred Fritz Agustin</h2>
                                <h4>Back-End Designer</h4>
                                <p>
                                    A Great Back-End Designer.
                                </p>
                               
                           </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Team End -->

       
        
        
        <!-- Contact Start -->
        <div class="contact wow fadeInUp" data-wow-delay="0.1s" id="contact">
            <div class="container-fluid">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <div class="contact-form">
                                <div id="success"></div>
                                <form name="sentMessage" id="contactForm" novalidate="novalidate">
                                    <div class="control-group">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="control-group">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="control-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="control-group">
                                        <textarea class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                        <p class="help-block"></p>
                                    </div>
                                    <div>
                                        <button class="btn" type="submit" id="sendMessageButton">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        @endsection