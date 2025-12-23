@extends('layouts.home.header')
@section('title','TFC Bank - Services')
@section('content')

 <!-- ##### Welcome Area Start ##### -->
 <div class="breadcumb-area clearfix auto-init">
        
        <!-- breadcumb content -->
        <div class="breadcumb-content">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <nav aria-label="breadcrumb" class="breadcumb--con text-center">
                            <h2 class="w-text title wow fadeInUp" data-wow-delay="0.2s">Services</h2>
                            <ol class="breadcrumb justify-content-center wow fadeInUp" data-wow-delay="0.4s">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Services</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Welcome Area End ##### -->

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

    <section class="creative-facts section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6 col-sm-12">
                    <div class="c-facts-box">
                        <div class="who-we-contant">
                            <div class="promo-section">
                                <h3 class="special-head">Our Achievements</h3>
                            </div>
                            <h4 class="d-blue wow fadeInUp bold" data-wow-delay="0.3s">We Care Too Much About Our Customers Satisfication</h4>
                            <p class="wow fadeInUp" data-wow-delay="0.4s">With several years of experience we have successfully left numbers of clients/customers happy and satisfied with our service.</p>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6">
                                    <!-- Single Cool Fact -->
                                    <div class="single_cool_fact text-center wow fadeInUp" data-wow-delay="0.2s">
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
                                    <div class="single_cool_fact text-center wow fadeInUp" data-wow-delay="0.5s">
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
                <h2 class="wow fadeInUp d-blue bold" data-wow-delay="0.3s" >Manage Payments in 3 Easy Steps</h2>
                <p class="wow fadeInUp" data-wow-delay="0.4s" >Get started running transactions in your online bank account in just 3 simple steps. It has never been this easy!</p>
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
                                   <img src="{{asset('img/test-img/1.jpg')}}" alt="">
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
                                   <img src="{{asset('img/test-img/2.jpg')}}" alt="">
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