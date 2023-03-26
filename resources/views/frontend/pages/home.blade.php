@extends('frontend.master')
@section('content')

<header class="header_area">
        <div class="top_menu row m0">
            <div class="container box_1620">

            </div>
        </div>
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">

                    <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about-us.html">About</a></li>

                            @auth('customer')
                            <li class="nav-item"> <a href="{{route('user.profile')}}" class="nav-item nav-link"> {{ auth('customer')->user()->name}}
                                    ({{ auth('customer')->user()->role}})
                                </a></li>
                            <li class="nav-item"> <a href="{{route('web.logout')}}" class="nav-item nav-link"> Log Out</a></li>
                            @else
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"> <a href="" class="nav-item nav-link" data-toggle="modal" data-target="#registration">Patient</a></li>
                                    <li class="nav-item"> <a href="" class="nav-item nav-link" data-toggle="modal" data-target="#Doner">Be a Donar</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"> <a href="" class="nav-item nav-link" data-toggle="modal" data-target="#login">Login </a></li>
                            @endauth
                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    </header>

    @if(session()->has('message'))
    <p class="alert alert-danger">{{session()->get('message')}}</p>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Please Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.login')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div>
                            <label for="">Enter your email</label>
                            <input name="email" type="email" class="form-control" required placeholder="Enter email">
                        </div>

                        <div>
                            <label for="">Enter your password</label>
                            <input name="password" type="password" class="form-control" required placeholder="Enter password">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal patient -->
    <div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SignUp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form action="{{route('patient.registration')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Enter Your Name:</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                        </div>



                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="customer_email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="number">Phone Number</label>
                            <input name="phone" type="text" class="form-control" id="number" placeholder="Enter Number">
                        </div>

                        <div class="form-group">
                            <label for="number">Address</label>
                            <input name="address" type="text" class="form-control" id="number" placeholder="Enter address">
                        </div>


                        <div class="form-group">
                            <div>
                                <label class="form-control" for="">Select Blood Group</label>
                                <label for="">
                                    <select name="blood" id="" class="form-control">
                                        <option class="form-control" value="A+">A+</option>
                                        <option class="form-control" value="B+">B+</option>
                                        <option class="form-control" value="AB+">AB+</option>
                                        <option class="form-control" value="O+">O+</option>
                                        <option class="form-control" value="A-">A-</option>
                                        <option class="form-control" value="B-">B-</option>
                                        <option class="form-control" value="AB-">AB-</option>
                                        <option class="form-control" value="O-">O-</option>
                                    </select>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control" for="exampleInputPassword1">Password</label>
                            <input name="customer_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- Modal Donar -->
    <div class="modal fade" id="Doner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SignUp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form action="{{route('donar.registration')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Enter Your Name:</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                        </div>



                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="number">Phone Number</label>
                            <input name="phone" type="text" class="form-control" id="number" placeholder="Enter Number">
                        </div>

                        <div class="form-group">
                            <label for="number">Address</label>
                            <input name="address" type="text" class="form-control" id="number" placeholder="Enter address">
                        </div>

                        <div class="form-group">
                            <label for="number">Date of Birth</label>
                            <input name="dob" type="date" class="form-control" id="number" placeholder="Enter date">
                        </div>
                        <div class="form-group">
                            <div>
                                <label class="form-control" for="">Select Blood Group</label>
                                <label for="">
                                    <select name="blood" id="" class="form-control">
                                        <option class="form-control" value="A+">A+</option>
                                        <option class="form-control" value="B+">B+</option>
                                        <option class="form-control" value="AB+">AB+</option>
                                        <option class="form-control" value="O+">O+</option>
                                        <option class="form-control" value="A-">A-</option>
                                        <option class="form-control" value="B-">B-</option>
                                        <option class="form-control" value="AB-">AB-</option>
                                        <option class="form-control" value="O-">O-</option>
                                    </select>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="customer_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <section class="home_banner_area">
        <div class="banner_inner">
            <div class="container">
                <div class="row banner_content">
                    <div class="col-lg-5">
                        <h2>We’re Web Hosting <br /> Professionals</h2>
                        <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women.</p>
                        <div class="offer-text">
                       @auth('customer')
                       @if(auth('customer')->user()->role=="Donar")
                       <a href="{{route('check.request')}}" class="btn btn-warning"> <big>Check Blood Request</big></a>

                       @else
                       <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"> <big> Request for Blood</big></a>
                        @endif
                        @else
                        <p class="btn btn-primary"> Login to Request</p>
                        @endauth
                    </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner_map_img">
                            <img src="{{url('/uploads/blood.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Modal for blood request-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Post here</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('request')}}" method="post" >
                                @csrf

                                <div class="form-group">
                                    <label for="name">Enter Patient Name</label>
                                    <input required name="name" type="text" class="form-control" id="name" placeholder="Enter Patient Name">
                                </div>

                                <div class="form-group">
                                    <label for="price">Enter Address</label>
                                    <input required name="address" type="text" class="form-control" id="address" placeholder="Enter Address">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Enter Phone Number</label>
                                    <input required name="phone" type="text" class="form-control" id="exampleInputEmail1" value="+880" placeholder="Enter Phone Number">


                                </div>

                                <div class="form-group">
                            <div>
                                <label class="form-control" for="">Select Blood Group</label>
                                <label for="">
                                    <select name="blood" id="" class="form-control">
                                        <option class="form-control" value="A+">A+</option>
                                        <option class="form-control" value="B+">B+</option>
                                        <option class="form-control" value="AB+">AB+</option>
                                        <option class="form-control" value="O+">O+</option>
                                        <option class="form-control" value="A-">A-</option>
                                        <option class="form-control" value="B-">B-</option>
                                        <option class="form-control" value="AB-">AB-</option>
                                        <option class="form-control" value="O-">O-</option>
                                    </select>
                                </label>
                            </div>
                        </div>

                              

                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" name="description" id=""></textarea>
                                </div>


                               




                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

    <section class="feature_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Some Features that Made us Unique</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="row feature_inner">
                <div class="col-lg-3 col-sm-6">
                    <div class="feature_item">
                        <h4>Expert Technicians</h4>
                        <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power of the Internet is becoming more common due to rapid advancement.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="feature_item">
                        <h4>Expert Technicians</h4>
                        <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power of the Internet is becoming more common due to rapid advancement.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="feature_item">
                        <h4>Expert Technicians</h4>
                        <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power of the Internet is becoming more common due to rapid advancement.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="feature_item">
                        <h4>Expert Technicians</h4>
                        <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power of the Internet is becoming more common due to rapid advancement.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="price_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Choose Your Best Pricing Plans</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="price_inner row m0">
                <div class="col-lg-3 col-sm-6 p0">
                    <div class="price_item">
                        <div class="price_text">
                            <h3>Basic</h3>
                            <h5>Individuals/Freelancers</h5>
                            <h2>£39<span>/mo</span></h2>
                            <ul class="list">
                                <li><a href="#">RAM 1 GB</a></li>
                                <li><a href="#">Core CPU 1</a></li>
                                <li><a href="#">SSD Storage 20 GB</a></li>
                                <li><a href="#">Transfer 1 TB</a></li>
                                <li><a href="#">Network In 40 Gb</a></li>
                            </ul>
                        </div>
                        <a class="price_btn" href="#">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 p0">
                    <div class="price_item">
                        <div class="price_text">
                            <h3>Starter</h3>
                            <h5>Small Companies</h5>
                            <h2>£59<span>/mo</span></h2>
                            <ul class="list">
                                <li><a href="#">RAM 2 GB</a></li>
                                <li><a href="#">Core CPU 2</a></li>
                                <li><a href="#">SSD Storage 50 GB</a></li>
                                <li><a href="#">Transfer 1 TB</a></li>
                                <li><a href="#">Network In 40 Gb</a></li>
                            </ul>
                        </div>
                        <a class="price_btn" href="#">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 p0">
                    <div class="price_item">
                        <div class="price_text">
                            <h3>Business</h3>
                            <h5>Medium Companies</h5>
                            <h2>£79<span>/mo</span></h2>
                            <ul class="list">
                                <li><a href="#">RAM 4 GB</a></li>
                                <li><a href="#">Core CPU 4</a></li>
                                <li><a href="#">SSD Storage 75 GB</a></li>
                                <li><a href="#">Transfer 2 TB</a></li>
                                <li><a href="#">Network In 80 Gb</a></li>
                            </ul>
                        </div>
                        <a class="price_btn" href="#">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 p0">
                    <div class="price_item">
                        <div class="price_text">
                            <h3>Enterprise</h3>
                            <h5>Large Companies</h5>
                            <h2>£99<span>/mo</span></h2>
                            <ul class="list">
                                <li><a href="#">RAM 8 GB</a></li>
                                <li><a href="#">Core CPU 8</a></li>
                                <li><a href="#">SSD Storage 100 GB</a></li>
                                <li><a href="#">Transfer 2 TB</a></li>
                                <li><a href="#">Network In 100 Gb</a></li>
                            </ul>
                        </div>
                        <a class="price_btn" href="#">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="solution_area p_120">
        <div class="container">
            <div class="solution_inner">
                <h4>Looking for a Custom Solution?</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                <a class="white_btn" href="#">Request Free Consultation</a>
            </div>
        </div>
    </section>


    <section class="client_says_area p_120">
        <div class="container">
            <div class="row client_says_inner">
                <div class="col-lg-4">
                    <div class="says_left">
                        <h3>What our Client’s Say about us</h3>
                        <p>Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer hears tales of diamonds and begins dreaming.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="says_item">
                        <h4>Nellie Vega</h4>
                        <h5>Head of Marketing, Apple Inc.</h5>
                        <p>“The following article covers a topic that has recently moved to center stage at least it seems that way. If you’ve been”</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="says_item">
                        <h4>Estelle Andrews</h4>
                        <h5>Head of Marketing, Apple Inc.</h5>
                        <p>“The following article covers a topic that has recently moved to center stage at least it seems that way. If you’ve been”</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="service_area p_120">
        <div class="container">
            <div class="main_title white">
                <h2>Top Services We Provided</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="row service_inner">
                <div class="col-lg-4 col-md-6">
                    <div class="service_item">
                        <h4><i class="lnr lnr-cloud"></i>Cloud Hosting</h4>
                        <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service_item">
                        <h4><i class="lnr lnr-earth"></i>Web Hosting</h4>
                        <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service_item">
                        <h4><i class="lnr lnr-screen"></i>Cloud Computing</h4>
                        <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service_item">
                        <h4><i class="lnr lnr-inbox"></i>VPS Hosting</h4>
                        <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service_item">
                        <h4><i class="lnr lnr-chart-bars"></i>Server Analytics</h4>
                        <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service_item">
                        <h4><i class="lnr lnr-lighter"></i>Data Mining</h4>
                        <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="latest_grid_blog_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Latest Posts from Our Blog</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="row l_blog_inner">
                <div class="col-lg-4">
                    <div class="l_blog_item">
                        <h6>10 April, 2018</h6>
                        <a href="#">
                            <h4>Benjamin Franklin S Method Of Habit Formation</h4>
                        </a>
                        <p>There are many kinds of narratives and organizing principles. Science is driven by evidence gathered in experiments, and by the falsification of extant theories and their </p>
                        <div class="view_text">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>4.5k Views</a>
                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>07</a>
                            <a href="#"><i class="fa fa-share" aria-hidden="true"></i>362</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="l_blog_item">
                        <h6>10 April, 2018</h6>
                        <a href="#">
                            <h4>Benjamin Franklin S Method Of Habit Formation</h4>
                        </a>
                        <p>There are many kinds of narratives and organizing principles. Science is driven by evidence gathered in experiments, and by the falsification of extant theories and their </p>
                        <div class="view_text">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>4.5k Views</a>
                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>07</a>
                            <a href="#"><i class="fa fa-share" aria-hidden="true"></i>362</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="l_blog_item">
                        <h6>10 April, 2018</h6>
                        <a href="#">
                            <h4>Benjamin Franklin S Method Of Habit Formation</h4>
                        </a>
                        <p>There are many kinds of narratives and organizing principles. Science is driven by evidence gathered in experiments, and by the falsification of extant theories and their </p>
                        <div class="view_text">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>4.5k Views</a>
                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>07</a>
                            <a href="#"><i class="fa fa-share" aria-hidden="true"></i>362</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="clients_logo_area p_120">
        <div class="container">
            <div class="clients_slider owl-carousel">
                <div class="item">
                    <img src="img/clients-logo/c-logo-1.png" alt="">
                </div>
                <div class="item">
                    <img src="img/clients-logo/c-logo-2.png" alt="">
                </div>
                <div class="item">
                    <img src="img/clients-logo/c-logo-3.png" alt="">
                </div>
                <div class="item">
                    <img src="img/clients-logo/c-logo-4.png" alt="">
                </div>
                <div class="item">
                    <img src="img/clients-logo/c-logo-5.png" alt="">
                </div>
            </div>
        </div>
    </section>


    <footer class="footer-area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h6 class="footer_title">Top Products</h6>
                        <ul class="list">
                            <li><a href="#">Managed Website</a></li>
                            <li><a href="#">Manage Reputation</a></li>
                            <li><a href="#">Power Tools</a></li>
                            <li><a href="#">Marketing Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="single-footer-widget news_widgets">
                        <h6 class="footer_title">Newsletter</h6>
                        <p>You can trust us. we only send promo offers, not a single spam.</p>
                        <div id="mc_embed_signup">
                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                <div class="input-group d-flex flex-row">
                                    <input name="EMAIL" placeholder="Your email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                    <button class="btn sub-btn">Subscribe</button>
                                </div>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 offset-lg-1">
                    <div class="single-footer-widget instafeed">
                        <h6 class="footer_title">Instagram Feed</h6>
                        <ul class="list instafeed d-flex flex-wrap">
                            <li><img src="img/instagram/Image-01.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-02.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-03.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-04.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-05.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-06.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-07.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-08.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-md-8 footer-text m-0">
                    Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                </p>
                <div class="col-lg-4 col-md-4 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>

    @endsection