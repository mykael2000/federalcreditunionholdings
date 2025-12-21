@extends('layouts.home.header')
@section('title','Welcome To TFC Bank')
@section('content')
<!-- ##### Welcome Area Start ##### -->
<section class="hero-section main-page section-padding" id="home">
       
       <!-- Hero Content -->
       <div class="hero-section-content">
           
           <div class="container ">
               <div class="row align-items-center">
                   <!-- Welcome Content -->
                   <div class="col-12 col-lg-6 col-md-12">
                       <div class="welcome-content">
                           <div class="promo-section">
                               <h3 class="special-head cyan">Make your Online Banking Easier & Comfortable</h3>
                           </div>
                           <h1 class="fadeInUp bold" data-wow-delay="0.2s">Access money anytime , anywhere in the world</h1>
                           <p class="w-text fadeInUp" data-wow-delay="0.3s">We have made it possible and easier for you to have access to your money anywhere and anytime in the world.</p>
                           <div class="info-btn-group fadeInUp" data-wow-delay="0.4s">
                               <a href="{{ route('user.register') }}" class="btn info-btn more-btn mr-3">get started</a>
                               <a href="/contact" class="btn info-btn green-btn more-btn mr-3">Contact Us</a>
                           </div>
                       </div>
                   </div>
                   <div class="col-12 col-lg-6 col-md-12 ">
                       <div class="welcome-meter about-sec-wrapper text-right mt-s fadeInUp" data-wow-delay="0.4s">
                           <img src="{{asset('img/core-img/about1.png')}}" class="about-i" alt="">
                           <div class="bonus-percent">
                               <h2 class="w-text bold">+35</h2>
                               <h4 class="w-text">Years of Experience</h4>

                           </div>
                       </div>
                   </div>
                   
               </div>
           </div>
       </div>
   </section>
   <!-- ##### Welcome Area End ##### -->

   <div class="clearfix"></div>


   <!-- ##### Our Services Area Start ##### -->
   <section class="our_services_area section-padding-100-0 relative hex-pat-1" id="services">
       <div class="container">
           
           <div class="section-heading text-center">
               <span>Our Services</span>
               <h2 class="d-blue bold fadeInUp" data-wow-delay="0.3s">Our Core Services</h2>
               <p class="fadeInUp" data-wow-delay="0.4s">Delivering of quality services to our customers is our main priority.</p>
           </div>
               

           <div class="row">
               
               <div class="col-12 col-md-6 col-lg-4">
                   <!-- Content -->
                   <div class="service_single_content v2 text-center wow fadeInUp" data-wow-delay="0.2s">
                      
                       <div class="serv_icon">
                           <img src="{{asset('img/icons/s2.png')}}" alt="">
                       </div>
                       <div class="service-content">
                           <h6 class="d-blue bold">Low Cost and Fast transfer</h6>
                       </div>
                   </div>
               </div>
               <div class="col-12 col-md-6 col-lg-4">
                   <!-- Content -->
                   <div class="service_single_content v2 text-center wow fadeInUp" data-wow-delay="0.2s">
                      
                       <div class="serv_icon">
                           <img src="{{asset('img/icons/s3.png')}}" alt="">
                       </div>
                       <div class="service-content">
                           <h6 class="d-blue bold">Secure Payment Service</h6>
                       </div>
                   </div>
               </div>
               
               <div class="col-12 col-md-6 col-lg-4">
                   <!-- Content -->
                   <div class="service_single_content v2 text-center wow fadeInUp" data-wow-delay="0.4s">
                      
                       <div class="serv_icon">
                           <img src="{{asset('img/icons/s5.png')}}" alt="">
                       </div>
                       <div class="service-content">
                           <h6 class="d-blue bold">Mobile Banking & Payment</h6>
                       </div>
                   </div>
               </div>

           </div>
       </div>
   </section>


   <section class="how section-padding-0-70 relative map-before">

       <div class="container">

           <div class="section-heading text-center">
               <h2 class=" fadeInUp d-blue bold" data-wow-delay="0.3s">Our core Features</h2>
               <p class=" fadeInUp" data-wow-delay="0.4s">To meet up with today's challenges, we've established a unique, more personal approach to Financial and Banking solutions.</p>
           </div>
           <div class="row">
               <div class="col-12 col-md-6 col-lg-3">
                  <div class="article special mts-50">
                       <img src="{{asset('img/icons/n3.png')}}" class="mb-10" alt="">
                       <h3 class="article__title">Business Consulting</h3> 
                   </div>
               </div>
               <div class="col-12 col-md-6 col-lg-3">
                   <div class="article special">
                       <img src="{{asset('img/icons/n5.png')}}" class="mb-10" alt="">
                       <h3 class="article__title">Customers Targeting</h3> 
                   </div>
               </div>
               <div class="col-12 col-md-6 col-lg-3">
                   <div class="article special mts-50">
                       <img src="{{asset('img/icons/s4.png')}}" class="mb-10" alt="">
                       <h3 class="article__title">Low Transaction Fee</h3> 
                   </div>
               </div>
               <div class="col-12 col-md-6 col-lg-3">
                    <div class="article special">
                       <img src="{{asset('img/icons/n7.png')}}" class="mb-10" alt="">
                       <h3 class="article__title">Dedicated Team</h3> 
                   </div>
               </div>
               
           </div>
       </div>
   </section>

   <!-- ##### About Us Area Start ##### -->
   <section class="about-us-area section-padding-0-100 relative" id="about">
       
       <div class="container">
           <div class="row align-items-center">
               <div class="col-12 col-lg-6 offset-lg-0 col-md-12 no-padding-left">
                   <div class="welcome-meter about-sec-wrapper fadeInUp" data-wow-delay="0.4s">
                       <img src="{{asset('img/core-img/about-sec2.jpg')}}" class="about-i" alt="">
                       <div class="article special box-shadow">
                           <img src="{{asset('img/icons/s55.png')}}" class="mb-10" alt="">
                           <h3 class="article__title w-text">Our Mission</h3> 
                           <p class="g-text">We thrive to make renowned business owners discover an approach to effective banking. </p>                
                       </div>
                   </div>
               </div>
               
               <div class="col-12 col-lg-6 offset-lg-0 col-md-10 offset-md-1">
                   <div class="who-we-contant mt-s">
                       <div class="promo-section">
                           <h3 class="special-head ">Welcome to Our E-Bank!</h3>
                       </div>
                       <h4 class="d-blue fadeInUp" data-wow-delay="0.3s">Transfer and Deposite your money anytime, anywhere in the world</h4>
                       <p class="fadeInUp" data-wow-delay="0.4s">Easily transfer and deposit money from and into your online bank account with us within minutes </p>
                       <div class="list-wrap align-items-center">
                           <div class="row">
                               
                               <div class="col-md-12">
                                   <div class="side-feature-list-item">
                                       <img src="{{asset('img/icons/check.png')}}" class="check-mark-icon" alt="">
                                       <div class="foot-c-info">Reliable Online Payment Platform</div>
                                   </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="side-feature-list-item">
                                       <img src="{{asset('img/icons/check.png')}}" class="check-mark-icon" alt="">
                                       <div class="foot-c-info">Best Networking &amp; Low Cost and Fast transfer</div>
                                   </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="side-feature-list-item">
                                       <img src="{{asset('img/icons/check.png')}}" class="check-mark-icon" alt="">
                                       <div class="foot-c-info">Affordable Security Packages &amp; Detailed Results</div>
                                   </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="side-feature-list-item">
                                       <img src="{{asset('img/icons/check.png')}}" class="check-mark-icon" alt="">
                                       <div class="foot-c-info">Instant Cash withdrawal</div>
                                   </div>
                               </div>
                               
                           </div>
                       </div>
                   </div>
               </div>

           </div>
       </div>
   </section>
   <!-- ##### About Us Area End ##### -->
   
   <section class="creative-facts section-padding-100">
       <div class="container">
           <div class="row">
               <div class="col-lg-6 offset-lg-6 col-sm-12">
                   <div class="c-facts-box">
                       <div class="who-we-contant">
                           <div class="promo-section">
                               <h3 class="special-head">Our Numbers Are Talking</h3>
                           </div>
                           <h4 class=" fadeInUp bold d-blue" data-wow-delay="0.3s">We Care Too Much About Our Customers Satisfication</h4>
                           <p class=" fadeInUp" data-wow-delay="0.4s">With several years of experience we have successfully left numbers of clients/customers happy and satisfied with our service. </p>
                           <div class="row">
                               <div class="col-12 col-sm-6 col-md-6">
                                   <!-- Single Cool Fact -->
                                   <div class="single_cool_fact text-center fadeInUp" data-wow-delay="0.2s">
                                       <div class="cool_fact_icon">
                                           <i class="ti-user"></i>
                                       </div>
                                       <!-- Single Cool Detail -->
                                       <div class="cool_fact_detail">
                                           <h3><span class="counter">6345</span>+</h3>
                                           <h2>Happy Clients</h2>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-12 col-sm-6 col-md-6">
                                   <!-- Single Cool Fact -->
                                   <div class="single_cool_fact text-center  fadeInUp" data-wow-delay="0.5s">
                                       <div class="cool_fact_icon">
                                           <i class="ti-cup"></i>
                                       </div>
                                       <!-- Single Cool Detail -->
                                       <div class="cool_fact_detail">
                                           <h3><span class="counter">440</span>+</h3>
                                           <h2>Awards Won</h2>
                                       </div>
                                   </div>
                               </div>

                           </div>
                       </div>
                   </div>
                   

               </div>
           </div>
           
       </div>
   </section>

   <section class="section-padding-100-70 relative map-before" >

       <div class="container">

           <div class="section-heading text-center">
               <span>How It Works</span>
               <h2 class=" fadeInUp d-blue bold" data-wow-delay="0.3s" >Manage Payments in 3 Easy Steps</h2>
               <p class=" fadeInUp" data-wow-delay="0.4s" >Get started running transactions in your online bank account in just 3 simple steps. It has never been this easy!</p>
           </div>
           <div class="row">
               <div class="col-12 col-md-6 col-lg-4">
                   <!-- Content -->
                   <div class="service_single_content transparent text-center  fadeInUp" data-wow-delay="0.2s">
                       <!-- Icon -->
                       <div class="how_icon">
                           <img src="{{asset('img/icons/h1.png')}}" class="colored-icon" alt="">
                       </div>
                       <h6>Register / Login To Our Platform</h6>
                       <p>Create a one time secured account with us</p>
                   </div>
               </div>
               <div class="col-12 col-md-6 col-lg-4">
                   <!-- Content -->
                   <div class="service_single_content transparent text-center  fadeInUp" data-wow-delay="0.3s">
                       <!-- Icon -->
                       <div class="how_icon">
                           <img src="{{asset('img/icons/h2.png')}}" class="colored-icon" alt="">
                       </div>
                       <h6>Enter Your Information Details </h6>
                       <p>Enter personal informations to enables us serve you better and faster</p>
                   </div>
               </div>
               <div class="col-12 col-md-6 col-lg-4">
                   <!-- Content -->
                   <div class="service_single_content transparent text-center fadeInUp">
                       <!-- Icon -->
                       <div class="how_icon">
                           <img src="{{asset('img/icons/h3.png')}}" class="colored-icon" alt="">
                       </div>
                       <h6>Follow & Manage Your Payments</h6>
                       <p>Start transacting instantly from your user and mobile friendly dashboard</p>
                   </div>
               </div>
               
           </div>
       </div>
   </section>

   

   <div class="footer-bg">
       <!-- ##### Testimonial Area Start ##### -->
       <section class="clients_testimonials_area bg-img section-padding-100-0" id="test">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="section-heading text-center">
                           <h2 class="bl-text  fadeInUp" data-wow-delay="0.3s">Loved By Our Clients</h2>
                           <p class=" fadeInUp" data-wow-delay="0.4s">We're not just all talks! Here are what our clients say about us.</p>
                       </div>
                   </div>
               </div>
           </div>
           <div class="cotainer-fluid">
               <div class="row justify-content-center fadeInUp" data-wow-delay="0.4s">
                   <div class="col-12 col-md-10 col-xs-10 offset-xs-1">
                       <div class="client_slides owl-carousel">

                           <!-- Single Testimonial -->
                           <div class="single-testimonial text-center">
                               <!-- Testimonial Image -->
                               <div class="testimonial_image">
                                   <img src="{{asset('img/test-img/3.jpg')}}" alt="">
                               </div>
                               <!-- Testimonial Feedback Text -->
                               <div class="testimonial-description">
                                   <div class="testimonial_text">
                                       <p>For over several years now, I have been using different e-banking system and have experienced lots issues consigning this system but this one here makes the difference. I'm happy I took the chance in creating an account with them.</p>
                                   </div>

                                   <!-- Admin Text -->
                                   <div class="admin_text">
                                       <h5>Sunny Khan</h5>
                                   </div>
                               </div>
                           </div>

                           <!-- Single Testimonial -->
                           <div class="single-testimonial text-center">
                               <!-- Testimonial Image -->
                               <div class="testimonial_image">
                                   <img src="{{asset('img/test-img/1.jpg')}}" alt="">
                               </div>
                               <!-- Testimonial Feedback Text  -->
                               <div class="testimonial-description">
                                   <div class="testimonial_text">
                                       <p>Their low cost and transaction fee has saved me a lot of money which other banks stole from me.</p>
                                   </div>

                                   <!-- Admin Text -->
                                   <div class="admin_text">
                                       <h5>Ajoy Das</h5>
                                   </div>
                               </div>
                           </div>

                           <!-- Single Testimonial -->
                           <div class="single-testimonial text-center">
                               <!-- Testimonial Image -->
                               <div class="testimonial_image">
                                   <img src="{{asset('img/test-img/3.jpg')}}" alt="">
                               </div>
                               <!-- Testimonial Feedback Text  -->
                               <div class="testimonial-description">
                                   <div class="testimonial_text">
                                       <p>I will recommend this system to anyone anywhere in the world due to their services. The support you get from the support team is great and very reliable when it comes to timing</p>
                                   </div>
                                   <!-- Admin Text -->
                                   <div class="admin_text">
                                       <h5>Jebin Khan</h5>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- ##### Testimonial Area End ##### -->
       @include('layouts.home.footer')
@endsection