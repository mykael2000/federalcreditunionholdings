@extends('layouts.home.header')
@section('title','TFC Bank - About')
@section('content')
<!-- ##### Welcome Area Start ##### -->
<div class="breadcumb-area clearfix auto-init">
        
    <!-- breadcumb content -->
    <div class="breadcumb-content">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="breadcumb--con text-center">
                        <h2 class="w-text title wow fadeInUp" data-wow-delay="0.2s">About us</h2>
                        <ol class="breadcrumb justify-content-center wow fadeInUp" data-wow-delay="0.4s">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Welcome Area End ##### -->

<!-- ##### About Us Area Start ##### -->
<section class="about-us-area section-padding-100 relative" id="about">
        
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 offset-lg-0 col-md-12 no-padding-left">
                    <div class="welcome-meter about-sec-wrapper fadeInUp" data-wow-delay="0.4s">
                        <img src="{{asset('img/core-img/about-sec2.jpg')}}" class="about-i" alt="">
                        <div class="article special box-shadow">
                            <img src="{{asset('img/icons/s55.png')}}" class="mb-10" alt="">
                            <h3 class="article__title w-text">Our Mission</h3> 
                            <p class="g-text">Here at TFC Bank, We thrive to make renowned business owners discover an approach to effective banking.</p>                
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-lg-6 offset-lg-0 col-md-10 offset-md-1">
                    <div class="who-we-contant mt-s">
                        <div class="promo-section">
                            <h3 class="special-head ">Learn More About Us</h3>
                        </div>
                        <h4 class="d-blue fadeInUp" data-wow-delay="0.3s">Transfer and Deposite your money anytime, anywhere in the world</h4>
                        <p class="fadeInUp" data-wow-delay="0.4s">Easily transfer and deposit money from and into your online bank account with us within minutes</p>
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
                                        <div class="foot-c-info">Best Networking & Low Cost and Fast transfer</div>
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

    <section class="how section-padding-100-70 relative map-bg map-before">

        <div class="container">

            <div class="section-heading text-center">
                <h2 class=" fadeInUp d-blue bold" data-wow-delay="0.3s">More Of What We Offer</h2>
                <p class=" fadeInUp" data-wow-delay="0.4s">To meet up with today's challenges, we've established a unique, more personal approach to Financial and Banking solutions.</p>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Content -->
                    <div class="service_single_content box-shadow text-center  fadeInUp" data-wow-delay="0.2s">
                        <!-- Icon -->
                        <div class="how_icon">
                            <img src="{{asset('img/icons/n3.png')}}" class="colored-icon" alt="">
                        </div>
                        <h6>Low Transaction Fee</h6>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Content -->
                    <div class="service_single_content box-shadow text-center fadeInUp" data-wow-delay="0.3s">
                        <!-- Icon -->
                        <div class="how_icon">
                            <img src="{{asset('img/icons/n5.png')}}" class="colored-icon" alt="">
                        </div>
                        <h6>Fast Payments</h6>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Content -->
                    <div class="service_single_content box-shadow text-center  fadeInUp">
                        <!-- Icon -->
                        <div class="how_icon">
                            <img src="{{asset('img/icons/s4.png')}}" class="colored-icon" alt="">
                        </div>
                        <h6>Latest Strategies</h6>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Content -->
                    <div class="service_single_content box-shadow text-center fadeInUp">
                        <!-- Icon -->
                        <div class="how_icon">
                            <img src="{{asset('img/icons/n7.png')}}" class="colored-icon" alt="">
                        </div>
                        <h6>Dedicated Team</h6>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    

    <div class="clearfix"></div>

    <section class="about-us-area section-padding-70-70">
        
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-3 col-md-12 ">
                   
                    <div class="col-xs-12">
                        <div class="article special">
                            <img src="{{asset('img/icons/n3.png')}}" class="mb-10" alt="">
                            <h3 class="article__title">Strategy</h3> 
                            <p>We point on the needs of little to middle market businesses.</p>               
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="article special">
                            <img src="{{asset('img/icons/n5.png')}}" class="mb-10" alt="">
                            <h3 class="article__title">Business Studies</h3> 
                            <p>A systematic study to understand whether or not a specific project, venture, or approach is feasible.</p>                
                        </div>
                    </div>
                    
                </div>

                <div class="col-12 col-lg-3 col-md-12">
                    
                    <div class="col-xs-12">
                        <div class="article special mts-50">
                            <img src="{{asset('img/icons/s4.png')}}" class="mb-10" alt="">
                            <h3 class="article__title">Low Transaction Fee</h3> 
                            <p>Cut transaction cost and focus on improving your financial needs</p>                
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="article special">
                            <img src="{{asset('img/icons/n7.png')}}" class="mb-10" alt="">
                            <h3 class="article__title">Dedicated Team</h3> 
                            <p>We have dedicated team to support and help you manage risks</p>               
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-12 col-lg-6 offset-lg-0 col-md-10 offset-md-1">
                    <div class="who-we-contant mt-s">
                        <div class="promo-section">
                            <h3 class="special-head ">Our Core Features!</h3>
                        </div>
                        <h4 class="bl-text fadeInUp" data-wow-delay="0.3s">We Are The Trusted Experts We Keep Things Simple</h4>
                        <p class="fadeInUp" data-wow-delay="0.4s">We're dedicated to providing the best of services to our clients/customers. Customer satisfaction and collaboration is our top most priority.</p>
                        
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