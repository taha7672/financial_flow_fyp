@extends('layouts.links')
<style>
    .bg-color-r,
	::after {
        background-color: #1ABC9C !important;
    }

    h3,
	span,
	
    .color {
        color: #1ABC9C !important;
    }
</style>

<body class="stretched">

    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper" class="clearfix">



        <!-- Header
  ============================================= -->
        <header id="header" class="">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row">

                        <!-- Logo
      ============================================= -->
                        <div id="logo">
                            <a href="index.html" class="standard-logo"><img
                                    src="{{ asset('frontend/invoice/images/logo.png') }} " alt="Canvas Logo"></a>
                            <a href="index.html" class="retina-logo"><img
                                    src="{{ asset('frontend/invoice/images/logo@2x.png') }} " alt="Canvas Logo"></a>
                        </div><!-- #logo end -->

                        <!-- Primary Menu Mobile Trigger
      ============================================= -->
                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100">
                                <path
                                    d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                                </path>
                                <path d="m 30,50 h 40"></path>
                                <path
                                    d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                                </path>
                            </svg>
                        </div>

                        <!-- Header Buttons
      ============================================= -->
                        <div class="header-misc">
                            <a href="{{route('signup')}} "
                                class="button rounded-pill bg-color-2 button-light text-dark ls0 fw-medium m-0">Sign
                                Up</a>
                            <a href="#" class="button rounded-pill ls0 fw-medium my-0 ms-2 d-none d-sm-flex ">Download App</a>
                        </div>

                        <!-- Primary Navigation
      ============================================= -->
                        <nav class="primary-menu">

                            <ul class="menu-container">
                                <li class="menu-item"><a class="menu-link" href="#">
                                        <div>Home</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="#App-Features">
                                        <div>Features </div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="#pricing">
                                        <div>Pricing</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="#contact-us">
                                        <div>Contact Us</div>
                                    </a></li>
                            </ul>

                        </nav><!-- #primary-menu end -->

                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header><!-- #header end -->

        <!-- Slider / Hero
  ============================================= -->
        <div id="slider" class="slider-element dark py-5">

            <div class="container">
                <div class="row">
                    <div class="col-lg-5 py-5">
                        <h2 class="display-4 color fw-normal font-display"><span>The Threat is the Virus, not the people. We
                            will get through this, Together.</span></h2>
                        <p class="color"><span>Objectively harness robust ROI via functional leadership skills. Holisticly
                            create one-to-one models.</span></p>
                        <a href="{{route('signup')}}"
                            class="btn text-larger rounded-pill bg-color-r text-white px-4 py-2 h-op-09 op-ts">Sign
                            Up</a>
                        <a href="#"
                            class="btn text-larger rounded-pill px-4 py-2 ms-2 border-color color h-op-09 op-ts">Download
                            App</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content
  ============================================= -->
        <section id="content">
            <div class="content-wrap">

                <div class="container">

                    <!-- How We Care
     ============================================= -->
                    <section class="aline-section" id="how-it-works">
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-7 text-center">
                                <h3 class="display-4 color fw-bold font-display"><span>How It Works</span></h3>
                                <p class="lead" style="line-height: 1.5">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Omnis consectetur consequatur possimus asperiores. Vel maxime
                                    error cupiditate.</p>
                            </div>
                        </div>

                        <div class="row justify-content-center align-items-center gutter-50 col-mb-80">
                            <div class="col-xl-9 col-lg-11">
                                <div class="row feature-box-border col-mb-30 justify-content-center align-items-center">
                                    <div class="col-md-6  feature-box fbox-border fbox-light fbox-effect">
                                        <div class="fbox-icon">
                                            <a href="#"><i>1</i></a>
                                        </div>
                                        <div class="fbox-content">
                                            <h3 class="nott text-larger mb-2">Download & Sign up</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit dolores aperiam
                                                amet.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <img src="{{ asset('frontend/invoice/images/illustration/doctors.svg') }} "
                                            alt="Image" class="p-4" height="230">
                                    </div>

                                    <div class="clear"></div>

                                    <div class="col-md-6 feature-box fbox-border fbox-light fbox-effect">
                                        <div class="fbox-icon">
                                            <a href="#"><i>2</i></a>
                                        </div>
                                        <div class="fbox-content">
                                            <h3 class="nott text-larger mb-2">Welcome to dashboard </h3>
                                            <p>Lorem ipsum dolor sit amet, tur maiores totam odit molestiae vel ut earum
                                                deleniti.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <img src="{{ asset('frontend/invoice/images/illustration/diet.jpg') }} "
                                            alt="Image" class="p-4" height="230">
                                    </div>

                                    <div class="clear"></div>

                                    <div class="col-md-6 feature-box fbox-border fbox-light fbox-effect">
                                        <div class="fbox-icon " style="color:#1ABC9C">
                                            <a href="#"><i>3</i></a>
                                        </div>
                                        <div class="fbox-content">
                                            <h3 class="nott text-larger mb-2">Create new invoices</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi,
                                                deleniti.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <img src="{{ asset('frontend/invoice/images/illustration/nurse.png') }}"
                                            alt="Image" class="p-4" height="230">
                                    </div>

                                    <div class="clear"></div>

                                    <div class="col-md-6 feature-box  fbox-border fbox-light fbox-effect">
                                        <div class="fbox-icon">
                                            <a href="#"><i>4</i></a>
                                        </div>
                                        <div class="fbox-content">
                                            <h3 class="nott text-larger mb-2">Share invoice with coustomer </h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi,
                                                deleniti.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <img src="{{ asset('frontend/invoice/images/illustration/delivery.svg') }} "
                                            alt="Image" class="p-4" height="230">
                                    </div>

                                    <div class="clear"></div>

                                    <div class="col-md-6 feature-box fbox-border fbox-light fbox-effect noborder">
                                        <div class="fbox-icon">
                                            <a href="#"><i>5</i></a>
                                        </div>
                                        <div class="fbox-content">
                                            <h3 class="nott text-larger mb-2">You recivied Payment</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi,
                                                deleniti.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <img src="{{ asset('frontend/invoice/images/illustration/support.svg') }}"
                                            alt="Image" class="p-5" height="230">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- App-Features
     ============================================= -->
                    <section id="App-Features" class="aline-section">
                        <div class="row justify-content-between align-items-center my-6 col-mb-50">
                            <div class="col-lg-5">
                                <h3 class="display-3 color fw-normal font-display mb-5"><span>App Features</span></h3>

                                <div class="feature-box fbox-sm mb-4">
                                    <div class="fbox-icon">
                                        <i class="bg-color-r color icon-line-calendar"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h3 class="nott text-larger fw-normal mb-2">24/7 Support.</h3>
                                    </div>
                                </div>

                                <div class="feature-box fbox-sm mb-4">
                                    <div class="fbox-icon">
                                        <i class="bg-color-r color icon-line-speech-bubble"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h3 class="nott text-larger fw-normal mb-2">Create unlimited invoices & Share.
                                        </h3>
                                    </div>
                                </div>

                                <div class="feature-box fbox-sm mb-4">
                                    <div class="fbox-icon">
                                        <i class="bg-color-r color icon-line-video"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h3 class="nott text-larger fw-normal mb-2">Eccess invoice from anywhere.</h3>
                                    </div>
                                </div>

                                <div class="feature-box fbox-sm mb-4">
                                    <div class="fbox-icon">
                                        <i class="bg-color-r color icon-head-side-mask"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h3 class="nott text-larger fw-normal mb-2">Secure transaction.</h3>
                                    </div>
                                </div>

                                <div class="feature-box fbox-sm mb-4">
                                    <div class="fbox-icon">
                                        <i class="bg-color-r color icon-line-phone-call"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h3 class="nott text-larger fw-normal mb-2">Online Payment.</h3>
                                    </div>
                                </div>

                                <div class="feature-box fbox-sm mb-4">
                                    <div class="fbox-icon">
                                        <i class="bg-color-r color icon-line-map-pin"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h3 class="nott text-larger fw-normal mb-2">Available on playstore.</h3>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <img src="{{ asset('frontend/invoice/images/phone.jpg') }} " style="height: 500px;"
                                    alt="Phone call" class="rounded">
                            </div>
                        </div>
                    </section>


                </div>

                <!-- Download App Section
    ============================================= -->
                <div class="section py-md-0 section-mobile bg-color-r-2"
                    style="background: url('{{ asset('frontend/invoice/images/illustration/bg-pattern.svg') }} ') no-repeat center left / contain;">
                    <div class="container">
                        <div class="row align-items-center justify-content-between">

                            <div class="col-lg-5 col-md-6 py-5 py-lg-0">
                                <h3 class="display-3 color fw-normal font-display mb-5"><span>Download Our SimplifyInvoice App.</span></h3>
                                <p class="text-large color">Progressively strategize just in time scenarios and
                                    compelling results. Intrinsicly parallel task extensive systems whereas distinctive
                                    catalysts for scenarios and compelling results change.</p>
                                <div>
                                    <a href="#"><img src="{{ asset('frontend/invoice/images/appstore.png') }} "
                                            alt="Image" height="54" class="mt-3"></a>
                                    <a href="#"><img
                                            src="{{ asset('frontend/invoice/images/googleplay.png') }} "
                                            alt="Image" class="ms-xl-3 ms-lg-1 mt-3 ms-0 " height="54"></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 mt-5 mt-sm-0">
                                <div class="d-none d-lg-flex">
                                    <img src="{{ asset('frontend/invoice/images/iphone-2.png') }} " class="fast"
                                        alt="Image" style="height: 600px" data-animate="fadeInUp"
                                        data-delay="200">
                                    <img src="{{ asset('frontend/invoice/images/iphone-1.png') }} " class="fast"
                                        alt="Image" style="height: 600px" data-animate="fadeInUp">
                                </div>
                                <img src="{{ asset('frontend/invoice/images/iphone.png') }} " alt="Image"
                                    class="d-block d-lg-none px-5 px-sm-0 p-md-5">
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Featured Icons Area
    ============================================= -->
                <div class="container topmargin-lg clearfix">


                    <div class="clear"></div>
                    <section class="aline-section" id="pricing">

                        <div class="pricing-box pricing-extended row align-items-stretch mt-6 mx-0 border-0 rounded-3"
                            style="background-color: rgba(15,100,88,.07);">
                            <div class="pricing-desc col-lg-9 p-5">
                                <h3 class="h2 color fw-normal font-display border-bottom pb-4 mb-4"> <span>Our Pricing</span></h3>
                                <div class="pricing-features bg-transparent pt-3 pb-0">
                                    <ul class="row">
                                        <li class="col-md-6"><i class="icon-line-check-circle color me-2"></i> First
                                            15 Days Free*</li>
                                        <li class="col-md-6"><i class="icon-line-check-circle color me-2"></i> iOS
                                            &amp; Android Both Available</li>
                                        <li class="col-md-6"><i class="icon-line-check-circle color me-2"></i> Only
                                            Subscription is Chargable</li>
                                        <li class="col-md-6"><i class="icon-line-check-circle color me-2"></i> No
                                            Hidden Changes</li>
                                        <li class="col-md-6"><i class="icon-line-check-circle color me-2"></i>
                                            International Credit Cards Accepted</li>
                                        <li class="col-md-6"><i class="icon-line-check-circle color me-2"></i> Money
                                            Refund Guaranteed</li>
                                        <li class="col-md-6"><i class="icon-line-check-circle color me-2"></i> One Day
                                            Delivery</li>
                                        <li class="col-md-6"><i class="icon-line-check-circle color me-2"></i> 24x7
                                            Priority Email Support</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="pricing-action-area border-0 col-lg d-flex flex-column justify-content-center"
                                style="background-color: rgba(15,100,88,.07);">
                                <div class="pricing-price price-unit fw-bold font-primary color">
                                    <span class="price-unit ">&dollar;</span><span>19</span><span
                                        class="price-tenure font-secondary text-uppercase">Monthly</span>
                                </div>
                                <div class="pricing-action">
                                    <a href="#"
                                        class="button bg-color-r rounded-pill button-large w-100 m-0">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <!-- Contact Us
     ============================================= -->
                        <section id="contact-us" class="aline-section">
                            <div class="row justify-content-center mt-5 mt-6 mx-0 border-0 rounded-3"
                                style="background-color: rgba(15,100,88,.07);">

                                <div class="col-md-7 text-center">
                                    <h3 class="display-4 color fw-bold font-color-r font-display mt-4"><span>Contact Us</span></h3>
                                    <div class="col-lg-12">


                                        <div class="form-result"></div>

                                        <form class="mb-0" id="template-contactform" name="template-contactform"
                                            action="#" >

                                            <div class="form-process">
                                                <div class="css3-spinner">
                                                    <div class="css3-spinner-scaler"></div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 form-group mb-4">
                                                    <label class="nott ls0 L-float"
                                                        for="template-contactform-name">Name <small>*</small></label>
                                                    <input type="text" id="template-contactform-name"
                                                        name="template-contactform-name" value=""
                                                        class="rounded-pill form-control required" />
                                                </div>

                                                <div class="col-12 form-group mb-4">
                                                    <label class="nott ls0 L-float"
                                                        for="template-contactform-email">Email <small>*</small></label>
                                                    <input type="email" id="template-contactform-email"
                                                        name="template-contactform-email" value=""
                                                        class="required email rounded-pill form-control" />
                                                </div>

                                                <div class="col-12 form-group mb-4">
                                                    <label class="nott ls0 L-float"
                                                        for="template-contactform-message">Message
                                                        <small>*</small></label>
                                                    <textarea class="required rounded-5 form-control" id="template-contactform-message"
                                                        name="template-contactform-message" rows="6" cols="30"></textarea>
                                                </div>

                                                <div class="col-12 form-group mb-4 d-none">
                                                    <input type="text" id="template-contactform-botcheck"
                                                        name="template-contactform-botcheck" value=""
                                                        class="rounded-pill form-control" />
                                                </div>

                                                <div class="col-12 form-group mb-4">
                                                    <button
                                                        class="L-float button button-large rounded-pill bg-color-r px-4 py-2 h-op-09 op-ts m-0"
                                                        type="submit" id="template-contactform-submit"
                                                        name="template-contactform-submit" value="submit">Send
                                                        Message</button>
                                                </div>
                                            </div>

                                            {{-- <input type="hidden" name="prefix" value="template-contactform-"> --}}

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End Contact Us -->

                </div>
            </div>
        </section><!-- #content end -->



        <!-- Footer
  ============================================= -->
        <footer id="footer" class="dark bg-color-r border-top-0"
            style="background: url('{{ asset('frontend/invoice/images/illustration/footer-bg.svg') }} ') repeat center center / contain;">
            <div class="container">

                <!-- Footer Widgets
    ============================================= -->
                <div class="footer-widgets-wrap">

                    <div class="row justify-content-center">

                        <div class="col-lg-9">
                            <div class="widget clearfix">

                                <div class="row col-mb-30">
                                    <div class="col-lg-3 col-6 widget_links">
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#how-it-works">How It Works</a></li>
                                            <li><a href="#App-Features">App Features</a></li>
                                            <li><a href="#pricing">Pricing</a></li>
                                            <li><a href="#contact-us">Contact Us</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-3 col-6 widget_links">
                                        <ul>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Portfolio</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Events</a></li>
                                            <li><a href="#">Forums</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-3 col-6 widget_links">
                                        <ul>
                                            <li><a href="#">Corporate</a></li>
                                            <li><a href="#">Agency</a></li>
                                            <li><a href="#">eCommerce</a></li>
                                            <li><a href="#">Personal</a></li>
                                            <li><a href="#">One Page</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-3 col-6 widget_links">
                                        <ul>
                                            <li><a href="#">Corporate</a></li>
                                            <li><a href="#">Agency</a></li>
                                            <li><a href="#">eCommerce</a></li>
                                            <li><a href="#">Personal</a></li>
                                            <li><a href="#">One Page</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 mt-5 mt-lg-0 text-center text-lg-end">
                            <div class="widget clearfix">

                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <small>Call Us:</small>
                                        <h4 class="h4">(1) 22 55412474</h4>
                                    </div>

                                    <div class="col-12 d-flex justify-content-center justify-content-lg-end">
                                        <a href="#" class="social-icon si-small si-light si-facebook">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#" class="social-icon si-small si-light si-delicious">
                                            <i class="icon-delicious"></i>
                                            <i class="icon-delicious"></i>
                                        </a>
                                        <a href="#" class="social-icon si-small si-light si-paypal">
                                            <i class="icon-paypal"></i>
                                            <i class="icon-paypal"></i>
                                        </a>
                                        <a href="#" class="social-icon si-small si-light si-flattr">
                                            <i class="icon-flattr"></i>
                                            <i class="icon-flattr"></i>
                                        </a>
                                    </div>

                                    <div class="col-12 mt-5 text-white-50 text-smaller">
                                        All Rights Reserved <br>&copy; 2022 by SimplifyInvoice<br>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div><!-- .footer-widgets-wrap end -->
            </div>
        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
 ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
