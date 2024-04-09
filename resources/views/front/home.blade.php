  
@extends('front.layouts.app')
@section('content')
  <!-- About Start -->
  @if (getProfiles()->isNotEmpty())
  <div class="about wow fadeInUp" data-wow-delay="0.1s" id="about">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                   
                        <div class="about-img">
                       
                    @foreach (getProfiles() as $profile)
                        @if ($profile->image != "")
                            <img width="20" height="20" src="{{asset('uploads/profile/thumb/'.$profile->image)}}" alt="" class="img-fluid">
                            @endif
                            @endforeach
                         
                           
                            
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
                                <p> I'm <b>{{$profile->fullname}}</b>, {{$profile->description}}  <br><br>
                                <!-- a third-year BSIT student at MLG College of Learning, 
                                with a passion for web development. I'm dedicated to mastering the art of web development, 
                                fueled by curiosity, creativity, and a commitment to continuous learning. -->
                                
                                <B>Birthday:</b>&nbsp&nbsp{{$profile->birthday}}  <br>
                                <B>Phone:</b>&nbsp&nbsp +63{{$profile->phonenumber}} <br>
                                <B>Address:</b>&nbsp&nbspBrgy.&nbsp{{$profile->barangay}}&nbsp{{$profile->municipality}},{{$profile->province}}&nbsp{{$profile->zipcode}} <br>
                                <B>Age:</b> &nbsp&nbsp{{$profile->age}} <br>
                                <B>Degree:</b> &nbsp&nbsp{{$profile->degree}} <br>
                                <B>Personal Email:</b>&nbsp&nbsp{{$profile->email}}  <br>
                                </p>  
                            
                                    
                            </div>
                            @if (getSkills()->isNotEmpty())
                          @foreach (getSkills() as $skill)
                            <div class="about-text">
                          
                            <div class="skills">
                                <div class="skill-name">
                                    <p>{{$skill->skillname}}</p><p>{{$skill->rate}}%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->rate}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <!-- <div class="skill-name">
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
                            </div> -->
                           
                            <!-- <a class="btn" href="#service">Read More</a> -->
                        </div>
                    </div>
                    @endforeach
                            @endif
                    
                    @endforeach
                          
                </div>
            </div>
        </div>
        @endif
        <!-- About End -->
         
         <!-- Experience Start -->
         @if (getEducations()->isNotEmpty())
        <div class="experience" id="experience">
            <div class="container">

                <header class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>My Resume</p>
                    <h2>Education</h2>
                </header>

                <div class="timeline">
    @foreach (getEducations() as $key => $education)
        <div class="timeline-item {{ $key % 2 == 0 ? 'left' : 'right' }} wow slideIn{{ $key % 2 == 0 ? 'Left' : 'Right' }}" data-wow-delay="0.1s">
            <div class="timeline-text">
                <div class="timeline-date">{{ $education->schoolyear }} </div>
                <h2>{{ $education->schoolname }}</h2>
                <h4>{{ $education->schooladdress }}</h4>
                <p>{{ $education->description }}</p>
               
            </div>
        </div>
    @endforeach
</div>
              

               

            </div>
        </div>
        @endif
        @if (getExperiences()->isNotEmpty())
        <div class="experience" id="experience">
        <div class="container">
                <header class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <h2>Experience</h2>
                </header>
                <div class="timeline">
    @foreach (getExperiences() as $key => $experience)
        <div class="timeline-item {{ $key % 2 == 0 ? 'left' : 'right' }} wow slideIn{{ $key % 2 == 0 ? 'Left' : 'Right' }}" data-wow-delay="0.1s">
            <div class="timeline-text">
                <div class="timeline-date">{{ $experience->experienceyear }} </div>
                <h2>{{ $experience->experiencename }}</h2>
                <h4>{{ $experience->experienceaddress }}</h4>
                <p>{{ $experience->experiencedescription }}</p>
               
            </div>
        </div>
    @endforeach
</div>
                <!-- <div class="timeline">
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
                    -->
                   

            </div>
        </div>
        @endif
        <!-- Job Experience End -->
         <!-- Blog Start -->
         @if (getBlogs()->isNotEmpty())
         <div class="blog" id="blog">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>Blog</p>
                    <!-- <h2>Latest Articles</h2> -->
                </div>
                <div class="row">
             
                    @foreach (getBlogs() as $blog)
               
                    <div class="col-lg-6">
                        <div class="blog-item wow fadeInUp" data-wow-delay="0.3s">
                            <div class="blog-img">
                            @if ($blog->image != "")
                            <img src="{{asset('uploads/blog/thumb/'.$blog->image)}}" alt="Image" >
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
                   
                </div>
            </div>
        </div>
        @endif
        @endif
        <!-- Blog End -->

        
        
        <!-- Service Start -->
        @if (getServices()->isNotEmpty())
        <div class="service" id="service">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>Services</p>
                    <h2></h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.0s">
                        <div class="service-item">
                       
                    @foreach (getServices() as $service)
                            <div class="service-icon">
                          

                                <i class=" {{$service->icon}}"></i>
                                <!-- <i class="fa fa-laptop"></i> -->
                            </div>
                            <div class="service-text">
                          
                                <h3> {{$service->servicename}}</h3>
                                <p>
                                {{$service->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                    <!-- <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
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
                    </div> -->
                </div>
            </div>
        </div>
        @endif
        <!-- Service End -->
        
       
        
          <!-- <img src="{{asset('front-assets/img/sales.png')}}"  alt="Image"> -->
           <!-- <a class="btn"  href="http://salesystem.webactivities.online/" >&#128279;</a> -->


        <!-- Portfolio Start -->
        @if (getPortfolios()->isNotEmpty())
        <div class="portfolio" id="portfolio">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>Portfolio</p>
                    <h2>My Works</h2>
                </div>
              
                
                <div class="row portfolio-container">
               
                        @foreach (getPortfolios() as $portfolio)
                    <div  class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-1 wow fadeInUp" data-wow-delay="0.0s">
                  
                        <div class="portfolio-wrap">
                       
                            <div class="portfolio-img">
                           
                            @if ($portfolio->image != "")
                            <img width="20" height="20" src="{{asset('uploads/portfolio/thumb/'.$portfolio->image)}}" alt="" class="img-fluid">
                            @endif
                              
                            </div>
                            <div class="portfolio-text">
                                <h3>{{$portfolio->projectname}}</h3>
                                <a class="btn" href="{{asset('uploads/portfolio/thumb/'.$portfolio->image)}}" data-lightbox="portfolio">+</a>
                               
                                <a class="btn"  href="{{$portfolio->projectlink}}">~</a>

                                
                                
                            </div>
                        </div>
                     
                       
                    </div>
                    @endforeach
                          
                </div>
            </div>
           
        </div>
      
        <!-- <div></div> -->
        <!-- Portfolio End -->
        
        
       
        
        
        <!-- Price Start -->
         <div class="price" id="price">
            
        </div> 
        @endif
        <!-- Price End -->
        
        
        <!-- Testimonial Start -->
        @if (getTestimonials()->isNotEmpty())
        <div class="testimonial wow fadeInUp" data-wow-delay="0.2s" id="review">
        <!-- <p>Testimonial</p> -->
            <div class="container">
                <div class="testimonial-icon">
              
                    <i class="fa fa-quote-left"></i>
                </div>
                <div class="owl-carousel testimonials-carousel">
                
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                       
                        @foreach (getTestimonials() as $testimonial)
                        @if ($testimonial->image != "")
                            <img src="{{asset('uploads/testimonial/thumb/'.$testimonial->image)}}"  alt="Image"> 
                            @endif
                            <!-- <img src="{{asset('front-assets/img/lina.jpg')}}" alt="Image"> -->
                        </div>
                        <div class="testimonial-text">
                            <p>
                            {{$testimonial->description}}
                            </p>
                            <h3> {{$testimonial->name}}</h3>
                            <h4> {{$testimonial->profession}}</h4>
                        </div>
                    </div>
                    <!-- <div class="testimonial-item">
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
                    </div> -->
                    @endforeach
                          
                </div>
            </div>
        </div>
        @endif
        <!-- Testimonial End -->


        <!-- Team Start -->
        @if (getMembers()->isNotEmpty())
        <div class="team" id="team">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                
                    <p>My Team</p>
                  
                        @foreach (getMembers() as $member)
                    <h2>Team Members</h2>
                </div>
                <div class="row">
             
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.0s">
                        <div class="team-item">
                            <div class="team-img">
                            @if ($member->image != "")
                            <img width="20" height="20" src="{{asset('uploads/member/thumb/'.$member->image)}}" alt="" class="img-fluid">
                            @endif
                                <!-- <img src="{{asset('front-assets/img/riz.jpg')}}" alt="Image"> -->
                            </div>
                            <div class="team-text">
                                <h2>{{$member->name}}</h2>
                                <h4>{{$member->role}}</h4>
                                <p>
                                {{$member->description}}
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
                    @endforeach
                          
                    <!-- <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
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
                    </div> -->
                   
                </div>
            </div>
        </div>
        @endif
        <!-- Team End -->

       
        
        
        <!-- Contact Start -->
        @if (getContacts()->isNotEmpty())
        <div class="contact wow fadeInUp" data-wow-delay="0.1s" id="contact">
            <div class="container-fluid">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                     
                            <div class="contact-form">
                                <div id="success"></div>
                               
                        @foreach (getContacts() as $contact)
                                
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
                                @endforeach
                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Contact End -->
        @endsection