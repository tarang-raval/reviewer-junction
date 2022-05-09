<!doctype html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Reviewer Junction') }}</title>
    <meta name="description" content="">

	<link rel="icon" type="image/png" href="img/icon.png')}}">

    <!-- <link rel="apple-touch-icon" href="apple-touch-icon.png')}}">-->
    <!-- Place favicon.ico in the root directory -->


    <!-- =========================
        Loding All Stylesheet
    ============================== -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/megamenu.css')}}">

    <!-- =========================
        Loding Main Theme Style


		#3c51a6

#232f3e
    ============================== -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- =========================
    	Header Loding JS Script
    ============================== -->
    <script src="{{asset('assets/js/modernizr.js') }}"></script>
  </head>
  <body class="">
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

	<div class="preloader"></div>

    <!-- =========================
        Header Top Section
    ============================== -->


    <!-- =========================
        Header Section
    ============================== -->
	<section id="wd-header" class="">
		<div class="container-fluid custom-width">
			<div class="row">
				<div class="col-md-12 col-lg-3 col-xl-3 text-center second-home-main-logo">
					<a href="index.html"><img src="{{asset('assets/img/logo.jpeg')}}" alt="Logo" style="max-width:160px"></a>
				</div>
				<div class="col-md-6 col-lg-6 slider-search-section d-none d-lg-flex align-items-center">
						<div class="input-group">
							<div class="input-group-btn">
								<button type="button" class="btn btn-secondary wd-slider-search-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								All Categories <i class="fa fa-angle-down" aria-hidden="true"></i>
								</button>
								<div class="dropdown-menu wd-dropdown-menu">
									<div class="search-category">
										<div class="row">
											<div class="col-md-6">
												<h6 class="search-category-title">Cameras and photos</h6>
												 <ul>
												 	<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Camera Electronice</a></li>
												 	<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Camera Appereances</a></li>
												 	<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> DSLR</a></li>
												 	<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Video cameras</a></li>
												 	<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Top Cameras</a></li>
												 </ul>
											</div>
											<div class="col-md-6">
												<h6 class="search-category-title">Cameras and photos</h6>
												 <ul>
												 	<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Camera Electronice</a></li>
												 	<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Camera Appereances</a></li>
												 	<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> DSLR</a></li>
												 	<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Video cameras</a></li>
												 	<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Top Cameras</a></li>
												 </ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<input type="text" class="form-control input-search-box" placeholder="Enter your search key ...">
							<span class="input-group-btn">
								<button class="btn btn-secondary wd-search-btn" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
							</span>
						</div>
					</div>
				<div class="col-md-6 col-lg-4  col-xl-3  d-flex align-items-center">
					<button class="btn btn-info btn-xs review-btn">Write A Review</button>
                    @guest
                        <button class="btn btn-primary my-account ml-2  pt-0" data-toggle="modal" data-target=".bd-example-modal-lg2">
                            <i class="fa fa-user" aria-hidden="true"></i> My account
                        </button>
                    @endguest
                    @auth
                       HI, {{Auth::user()->name}}
                       <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                    @endauth

					<div class="modal fade bd-example-modal-lg2" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="container">
									<div class="row text-left">
										<div class="col-md-12 p0">

											<div class="modal-tab-section wd-modal-tabs">
												<ul class="nav nav-tabs wd-modal-tab-menu text-center" id="myTabs" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-expanded="true">Login</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="sign-up-tab" data-toggle="tab" href="#sign-up" role="tab" aria-controls="sign-up">Sign up</a>
													</li>
												</ul>
												<div class="tab-content" id="myTabContent">
													<div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">

													<div class="row">
														<div class="col-md-6 p0 brand-description-area">
															<img src="{{asset('assets/img/login-img-1.jpg') }}" class="img-fluid" alt="">
															<div class="brand-description">
																<div class="brand-logo">
																	<!-- <img src="{{asset('assets/img/logo.png') }}" alt="Logo"> -->
																</div>
																<div class="modal-description">

																</div>
																<ul class="list-unstyled">

																</ul>
															</div>
														</div>
														<div class="col-md-12 col-lg-6 p0">
															<div class="login-section text-center">
																<div class="social-media">
																	<a href="#" class="facebook-bg"><i class="fa fa-facebook" aria-hidden="true"></i> Login</a>
																	<a href="#" class="twitter-bg"><i class="fa fa-twitter" aria-hidden="true"></i> Login</a>
																	<a href="#" class="google-bg"><i class="fa fa-google-plus" aria-hidden="true"></i> Login</a>
																</div>
																<div class="login-form text-left">
																	<form  id="loginform" method="post">
                                                                        @csrf
																		<div class="form-group">
																			<label for="exampleInputEmaillogin">User name</label>
																			<input type="text" class="form-control" id="exampleInputEmaillogin" placeholder="John mist |" name="email">
																		</div>
																		<div class="form-group">
																			<label for="exampleInputPasswordlogin">Password</label>
																			<input type="password" class="form-control" id="exampleInputPasswordlogin" placeholder="*** *** ***" autocomplete="off" name="passwors">
																		</div>
																		<button type="submit" class="btn btn-primary wd-login-btn">LOGIN</button>

																		<div class="form-check">
																			<label class="form-check-label">
																				<input type="checkbox" class="form-check-input">
																				Save this password
																			</label>
																		</div>

																		<div class="wd-policy">
																			<p>
																				By Continuing. I conferm that i have read and userstand the <a href="#">terms of uses</a> and <a href="#">Privacy Policy</a>.
																				Don’t have an account? <a href="#" class="black-color"><strong><u>Sign up</u></strong></a>
																			</p>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>

													</div>
													<div class="tab-pane fade" id="sign-up" role="tabpanel" aria-labelledby="sign-up-tab">

													<div class="row">
														<div class="col-md-6 p0 brand-login-section">
															<img src="{{asset('assets/img/login-img-2.jpg') }}" class="img-fluid" alt="">
															<div class="brand-description">
																<div class="brand-logo">
																	<!-- <img src="{{asset('assets/img/logo.png')}}" alt="Logo"> -->
																</div>
																<div class="modal-description">

																</div>
																<ul class="list-unstyled">

																</ul>
															</div>
														</div>
														<div class="col-md-6 p0">
															<div class="sign-up-section text-center">
																<div class="login-form text-left">
																	<form id="registerform" >
                                                                        @csrf
																		<div class="form-group">
																			<label for="first_name">First Name</label>
																			<input type="text" class="form-control" id="firstName-sign-up" placeholder="First Name" name="first_name" >
																		</div>
																		<div class="form-group">
																			<label for="last_name">Last Name</label>
																			<input type="text" class="form-control" id="lastName-sign-up" placeholder="Last Name" name="last_name">
																		</div>
                                                                        <div class="form-group">
																			<label for="mobile_no">Mobile No</label>
																			<input type="text" class="form-control" id="mobile-sign-up" placeholder="Enter Mobile No" name="mobile_no">
																		</div>
																		<div class="form-group">
																			<label for="email">Email</label>
																			<input type="text" class="form-control" id="email-sign-up" placeholder="Enter Your Email" name="email">
																		</div>
																		<div class="form-group">
																			<label for="password">Password</label>
																			<input type="password" class="form-control" id="password-sign-up" placeholder="*********" name="password" autocomplete="off">
																		</div>
																		<button type="submit" class="btn btn-primary wd-login-btn">Sign Up</button>

																		<div class="wd-policy">
																			<p>
																				By Continuing. I conferm that i have read and userstand the <a href="#">terms of uses</a> and <a href="#">Privacy Policy</a>.
																				Don’t have an account?
                                                                                <button type="button" name="signup" value="signup" class="black-color"><strong><u>Sign up</u></strong></button>
																			</p>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>

													</div>
												</div>
											</div>

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

    <!-- =========================
        Header Section
    ============================== -->
	<section id="wd-header-2" class="wd-header-nav sticker-nav mob-sticky bg-orange">
		<div class="container-fluid custom-width">
			<div class="row">
                <div class="col-md-8 col-2 col-sm-6 col-md-4 d-block d-lg-none">
                    <div class="accordion-wrapper hide-sm-up">
                        <a href="#" class="mobile-open"><i class="fa fa-bars" ></i></a>
                        <!--Mobile Menu start-->

                        <ul id="mobilemenu" class="accordion">
                           <!-- <li class="mob-logo"><a href="index.html"><img src="{{asset('assets/img/logo.png')}}" alt=""></a></li>-->
                            <li><a class="closeme" href="#"><i class="fa fa-times" ></i></a></li>
                            <li class="mob-logo"><a href="index.html"><img src="{{asset('assets/img/logo.png')}}" alt=""></a></li>


                            <li>
                                <div class="link">Home</div>

                            </li>
                            <li>
                                <div class="link">Comparison Product <i class="fa fa-chevron-down"></i></div>
                                <ul class="submenu font-sky">
                                    <li><a href="compare-products.html">Comparison Product</a></li>
                                    <li><a href="compare-products-single.html">Compare Products Single</a></li>
                                    <li><a href="compare-products-choose-market.html">Compare Products Choose Market</a></li>

                                </ul>
                            </li>
                            <li>
                                <div class="link ">shop<i class="fa fa-chevron-down"></i></div>
                                <ul class="submenu">

                                    <li><a href="#">Shop Page</a></li>
                                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                    <li><a href="shop-left-sidebar-full-grid.html">Shop Left Sidebar Full Grid</a></li>
                                    <li><a href="shop-right-sidebar-full-grid.html">Shop Right Sidebar Full Grid</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="product-details-scroll.html">Product Details v2</a></li>
                                    <li><a href="wishlist.html">Wishlist View</a></li>
                                </ul>
                            </li>

                            <li>
                                <div class="link">megamenu<i class="fa fa-chevron-down"></i></div>
                                <ul class="submenu ">
                                  <li><a href="#">Visual Phones</a></li>
					              <li><a href="#">Chinese phones</a></li>
					              <li><a href="#">Google Phones</a></li>
					              <li><a href="#">Video cameras</a></li>
					              <li><a href="#">Top Cameras</a></li>
					              <li><a href="#">Cheap Cameras</a></li>
					              <li><a href="#">Best Cameras</a></li>
					              <li><a href="#">Luxury Cameras</a></li>
					              <li><a href="#">Simple Cameras</a></li>
                                  <li><a href="#">Phone Electronice</a></li>
					              <li><a href="#">Phone Appereances</a></li>
					              <li><a href="#">Visual Phones</a></li>
					              <li><a href="#">Chinese phones</a></li>
					              <li><a href="#">Google Phones</a></li>
					              <li><a href="#">Cheap Phones</a></li>
					              <li><a href="#">Luxury phones</a></li>
					              <li><a href="#">Simple phones</a></li>
                                  <li><a href="#">Camera Electronice</a></li>
					              <li><a href="#">Camera Appereances</a></li>
					              <li><a href="#">DSLR</a></li>
					              <li><a href="#">Video cameras</a></li>
					              <li><a href="#">Top Cameras</a></li>
					              <li><a href="#">Cheap Cameras</a></li>
					              <li><a href="#">Best Cameras</a></li>
					              <li><a href="#">Luxury Cameras</a></li>
					              <li><a href="#">Simple Cameras</a></li>
                                </ul>

                            </li>
                            <li>
                                <div class="link">Reviews<i class="fa fa-chevron-down"></i></div>
                                <ul class="submenu">
                                    <li><a href="product-details-review-history.html">Product History</a></li>
                                    <li><a href="product-details-single-review.html">Single Review</a></li>
                                    <li><a href="review-left-sidebar.html">Review Left Sidebar</a></li>
                                    <li><a href="review-right-sidebar.html">Review Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="link">Blog<i class="fa fa-chevron-down"></i></div>
                                <ul class="submenu">
                                    <li><a href="blog-full-grid.html">Blog Full Grid</a></li>
                                    <li><a href="blog-two-grid.html">Blog Two Grid</a></li>
                                    <li><a href="blog-three-grid.html">Blog Three Grid</a></li>
                                    <li><a href="blog-four-grid.html">Blog Four Grid</a></li>
                                    <li><a href="blog-four-grid-left-sidebar.html">Blog Four Grid Left Sidebar</a></li>
                                    <li><a href="blog-four-grid-right-sidebar.html">Blog Four Grid Right Sidebar</a></li>
                                    <li><a href="single-blog-with.html">Single Blog</a></li>
                                    <li><a href="single-blog-with-add.html">Single Blog With Add</a></li>
                                </ul>
                            </li>
                            <li class="out-link"><a class="" href="contact-us.html">Contact</a></li>
                            <li class="out-link"><a class="" href="coupon.html">Coupon</a></li>

                        </ul>
                        <!--Mobile Menu end-->
                    </div>
                </div><!--Mobile menu end-->
                <div class="col-xl-3 d-none d-xl-block">
                        <div class="department" id="cat-department">
                            <img src="{{asset('assets/img/menu-bar.png')}}" alt="menu-bar">
                            All Department
                            <div class="shape-img">
                                <img src="{{asset('assets/img/department-shape-img.png')}}" class="img-fluid" alt="department img">
                            </div>
                            <div id="department-list" class="department-list">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="#!">
                                            <div class="department-list-logo">
                                                <img src="{{asset('assets/img/department-img/department-img-1.png')}}" alt="">
                                            </div>
                                            <span class="sub-list-main-menu">Furniture</span> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                        <div class="wd-sub-list">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6 class="black-color wd-sub-list-title">Cameras and photos</h6>
                                                        <ul class="wd-sub-menu">
                                                            <li><a href="#">Camera Electronice</a></li>
                                                            <li><a href="#">Camera Appereances</a></li>
                                                            <li><a href="#">DSLR</a></li>
                                                            <li><a href="#">Video cameras</a></li>
                                                            <li><a href="#">Top Cameras</a></li>
                                                            <li><a href="#">Cheap Cameras</a></li>
                                                            <li><a href="#">Best Cameras</a></li>
                                                            <li><a href="#">Luxury Cameras</a></li>
                                                            <li><a href="#">Simple Cameras</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 class="black-color wd-sub-list-title">Cameras and photos</h6>
                                                        <ul class="wd-sub-menu">
                                                            <li><a href="#">Camera Electronice</a></li>
                                                            <li><a href="#">Camera Appereances</a></li>
                                                            <li><a href="#">DSLR</a></li>
                                                            <li><a href="#">Video cameras</a></li>
                                                            <li><a href="#">Top Cameras</a></li>
                                                            <li><a href="#">Cheap Cameras</a></li>
                                                            <li><a href="#">Best Cameras</a></li>
                                                            <li><a href="#">Luxury Cameras</a></li>
                                                            <li><a href="#">Simple Cameras</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 class="black-color wd-sub-list-title">Cameras and photos</h6>
                                                        <ul class="wd-sub-menu">
                                                            <li><a href="#">Camera Electronice</a></li>
                                                            <li><a href="#">Camera Appereances</a></li>
                                                            <li><a href="#">DSLR</a></li>
                                                            <li><a href="#">Video cameras</a></li>
                                                            <li><a href="#">Top Cameras</a></li>
                                                            <li><a href="#">Cheap Cameras</a></li>
                                                            <li><a href="#">Best Cameras</a></li>
                                                            <li><a href="#">Luxury Cameras</a></li>
                                                            <li><a href="#">Simple Cameras</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="product-details-scroll.html"><img src="{{asset('assets/img/department-img/department-sub-list-img-1.jpg') }}" class="department-sub-list-img" alt="department-sub-list-img"></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="product-details-scroll.html"><img src="{{asset('assets/img/department-img/department-sub-list-img-2.jpg') }}" class="department-sub-list-img" alt="department-sub-list-img"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item"><a href="product-details-scroll.html">
                                        <div class="department-list-logo">
                                            <img src="{{asset('assets/img/department-img/department-img-2.png')}}" alt="">
                                        </div><span class="sub-list-main-menu">Household</span></a>
                                    </li>
                                    <li class="list-group-item"><a href="product-details-scroll.html">
                                        <div class="department-list-logo">
                                            <img src="{{asset('assets/img/department-img/department-img-3.png')}}" alt="">
                                        </div><span class="sub-list-main-menu">Clothes</span></a>
                                    </li>
                                    <li class="list-group-item"><a href="product-details-scroll.html">
                                        <div class="department-list-logo">
                                            <img src="{{asset('assets/img/department-img/department-img-4.png')}}" alt="">
                                        </div><span class="sub-list-main-menu">Accessories</span></a>
                                    </li>
                                    <li class="list-group-item"><a href="product-details-scroll.html">
                                        <div class="department-list-logo">
                                            <img src="{{asset('assets/img/department-img/department-img-5.png')}}" alt="">
                                        </div><span class="sub-list-main-menu">Electronics</span></a>
                                    </li>
                                    <li class="list-group-item"><a href="product-details-scroll.html">
                                        <div class="department-list-logo">
                                            <img src="{{asset('assets/img/department-img/department-img-6.png')}}" alt="">
                                        </div><span class="sub-list-main-menu">Corporate staff</span></a>
                                    </li>
                                    <li class="list-group-item"><a href="product-details-scroll.html">
                                        <div class="department-list-logo">
                                            <img src="{{asset('assets/img/department-img/department-img-7.png')}}" alt="">
                                        </div><span class="sub-list-main-menu">Sinking staff</span></a>
                                    </li>
                                    <li class="list-group-item"><a href="product-details-scroll.html">
                                        <div class="department-list-logo">
                                            <img src="{{asset('assets/img/department-img/department-img-8.png')}}" alt="">
                                        </div><span class="sub-list-main-menu">Plant</span></a>
                                    </li>
                                    <li class="list-group-item"><a href="product-details-scroll.html">
                                        <div class="department-list-logo">
                                            <img src="{{asset('assets/img/department-img/department-img-9.png')}}" alt="">
                                        </div><span class="sub-list-main-menu">Washing machine</span></a>
                                    </li>
                                    <li class="list-group-item"><a href="product-details-scroll.html">
                                        <div class="department-list-logo">
                                            <img src="{{asset('assets/img/department-img/department-img-10.png')}}" alt="">
                                        </div><span class="sub-list-main-menu">Winding staff</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-10 col-xl-7 header-search-box d-none d-lg-block">
                    <div id="main-menu-2" class="main-menu-desktop no-border main-menu-sh">
                            <div class="menu-container wd-megamenu text-left">
                                <div class="menu">
                                    <ul class="wd-megamenu-ul">
                                        <li><a href="index.html" class="main-menu-list"><i class="fa fa-home" aria-hidden="true"></i> Home</a>

                                        </li>

                                        <li><a href="products.html" class="main-menu-list">Product </a>
                                            <!-- <ul class="single-dropdown">
                                                <li><a href="#">Shop Page</a></li>
                                                <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                <li><a href="shop-left-sidebar-full-grid.html">Shop Left Sidebar Full Grid</a></li>
                                                <li><a href="shop-right-sidebar-full-grid.html">Shop Right Sidebar Full Grid</a></li>
                                                <li><a href="product-details.html">Product Details</a></li>
                                                <li><a href="product-details-scroll.html">Product Details v2</a></li>
                                                <li><a href="wishlist.html">Wishlist View</a></li>
                                            </ul> -->
                                        </li>
										<li><a href="#" class="main-menu-list">Submit A Review </a>
                                            <!-- <ul class="single-dropdown">
                                                <li><a href="#">Shop Page</a></li>
                                                <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                <li><a href="shop-left-sidebar-full-grid.html">Shop Left Sidebar Full Grid</a></li>
                                                <li><a href="shop-right-sidebar-full-grid.html">Shop Right Sidebar Full Grid</a></li>
                                                <li><a href="product-details.html">Product Details</a></li>
                                                <li><a href="product-details-scroll.html">Product Details v2</a></li>
                                                <li><a href="wishlist.html">Wishlist View</a></li>
                                            </ul> -->
                                        </li>

                                        <li><a href="review-left-sidebar.html" class="main-menu-list">Product Review</a>
                                            <ul class="single-dropdown">
                                                <li><a href="#">Electronics</a></li>
                                                <li><a href="#">Groceries</a></li>
                                                <li><a href="#">Brand</a></li>

                                            </ul>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-10 col-sm-6 col-md-4 col-lg-2 col-xl-2 text-right">
                        <!-- =========================
                             Cart Out
                        ============================== -->

                    <div class="header-cart">
                       <div class="account-section d-md-block d-lg-none">
								<button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg2">
									<i class="fa fa-sign-in" aria-hidden="true"></i><span>Login/Register</span>
								</button>

				        </div>
                        <div class="serch-wrapper">
                            <div class="search">
                                <input class="search-input" placeholder="Search" type="text">
                                <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            </div>
                        </div>




                    </div>

                </div>
			</div>
		</div>
	</section>



    <!-- =========================
        Slider Section
    ============================== -->
    <section id="main-slider-section">
    	<div id="main-slider" class="slider-bg2  owl-carousel owl-theme product-review slider-cat">
			<div class="item d-flex  slider-bg align-items-center">
				<div class="container-fluid">
					<div class="row justify-content-end">

						<!-- <div class="slider-text col-sm-6  col-xl-4   col-md-6 order-2 order-sm-1">
							<h6 class="sub-title">Choose your favourite market</h6>
							<h1 class="slider-title"><strong class="highlights-text">Compare</strong> Best Prices</h1>
							<p class="slider-content">Grabe it hurry.</p>
							<a href="#" class="btn btn-primary wd-shop-btn slider-btn">
								Go to store <i class="fa fa-arrow-right" aria-hidden="true"></i>
							</a>
						</div>
						<div class="col-sm-6  col-md-6 col-xl-6 order-1 order-sm-2 slider-img">
						    <img src="{{asset('assets/img/slider-img/slider3.png')}}" alt="">
						</div> -->
					</div>
				</div>
			</div>
           <div class="item d-flex  slider-bg align-items-center">
				<div class="container-fluid">
					<div class="row justify-content-end">
						<!-- <div class="slider-text  col-sm-6 col-xl-4    col-md-6">
							<h6 class="sub-title">Choose your favourite market</h6>
							<h1 class="slider-title"><strong class="highlights-text">Compare</strong> Best Prices</h1>
							<p class="slider-content">Grabe it hurry.</p>
							<a href="#" class="btn btn-primary wd-shop-btn slider-btn">
								Go to store <i class="fa fa-arrow-right" aria-hidden="true"></i>
							</a>
						</div>
						<div class="col-sm-6 col-md-6 col-xl-6  slider-img fadeInDown animated">
						    <img src="{{asset('assets/img/slider-img/slider4.png')}}" alt="">
						</div> -->
					</div>
				</div>
			</div>
    	</div>
    </section>

	<!-- =========================
        Choose Category
    ============================== -->
    <section id="choose-category">
    	<div class="container-fluid custom-width">
    		<div class="choose-category-area-box">
	    		<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="choose-category-main-title">Recent Product Review</h2>
					</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="300ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-4.jpg') }}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #ff8a80"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="600ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-5.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #8899f9"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="900ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-6.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #84ffff"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="1200ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-7.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #ff9e80"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="0ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-8.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #ea80fc"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="0ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-9.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #84ffff"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="0ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-12.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #ffd740"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="0ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-13.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #a788ff"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="0ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-14.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #ff8a80"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="0ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-15.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #8c9eff"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="0ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-16.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #84ffff"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="0ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-17.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #ff9e80"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="0ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-18.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #ea80fc"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="0ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-19.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #90a4ae"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="0ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-6.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #98e389"></span>
	    			</div>
	    			<div class="col-sm-6 col-md-4 col-lg-3 choose-category-box wow fadeIn animated" data-wow-delay="0ms">
						<div class="d-flex justify-content-start align-items-center">
		    				<div class="category-info">
								<h6 class="choose-category-title">Laptops</h6>
	    						<div class="choose-category-content">
									<p>Compare and buy best Branded
									laptops from online store</p>
	    						</div>
	    						<a href="#" class="badge badge-light choose-category-link">Check Review</a>
		    				</div>
		    				<div class="category-img">
		    					<a href="#"><img class="img-fluid" src="{{asset('assets/img/categories/categories-img-14.jpg')}}" alt=""></a>
		    				</div>
						</div>
						<span class="wd-border-bottom" style="background: #a788ff"></span>
	    			</div>
	    		</div>
    		</div>
    	</div>
    </section>


	<!-- =========================
        Amazon Top Deals
    ============================== -->

	<div class="product-view-modal modal fade bd-example-modal-lg-product-1" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

		    <!-- ====================================
		        Product Details Gallery Section
		    ========================================= -->
			<div class="row">
				<div class="product-gallery col-12 col-md-12 col-lg-6">
				    <!-- ====================================
				        Single Product Gallery Section
				    ========================================= -->
				    <div class="row">
						<div class="col-md-12 product-slier-details">
							<div id="product-view-model" class="product-view owl-carousel owl-theme">
							    <div class="item">
							    	<img src="{{asset('assets/img/product-img/product-view-img-1.jpg')}}" class="img-fluid" alt="Product Img">
							    </div>
							    <div class="item">
							    	<img src="{{asset('assets/img/product-img/product-view-img-2.jpg')}}" class="img-fluid" alt="Product Img">
							    </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-12 col-md-12 col-lg-6">
					<div class="product-details-gallery">
						<div class="list-group">
							<h4 class="list-group-item-heading product-title">
								Vigo SP111-31N-P2GH Spin 1
							</h4>
							<div class="media">
								<div class="media-left media-middle">
									<div class="rating">
										<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
										<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
										<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
										<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
									</div>
								</div>
								<div class="media-body">
									<p>3.7/5 <span class="product-ratings-text"> -1747 Ratings</span></p>
								</div>
							</div>
						</div>
						<div class="list-group content-list">
							<p><i class="fa fa-dot-circle-o" aria-hidden="true"></i> 100% Original product</p>
							<p><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Manufacturer Warranty</p>
						</div>
					</div>
					<div class="product-store row">
						<div class="col-12 product-store-box">
							<div class="row">
								<div class="col-3 p0 store-border-img">
									<img src="{{asset('assets/img/product-store/product-store-img1.jpg')}}" class="figure-img img-fluid" alt="Product Img">
								</div>
								<div class="col-5 store-border-price text-center">
									<div class="price">
										<p>$234</p>
									</div>
								</div>
								<div class="col-4 store-border-button">
									<a href="#" class="btn btn-primary wd-shop-btn pull-right">
										Buy it now
									</a>
								</div>
							</div>
						</div>
						<div class="col-12 product-store-box">
							<div class="row">
								<div class="col-3 p0 store-border-img">
									<img src="{{asset('assets/img/product-store/product-store-img2.jpg')}}" class="figure-img img-fluid" alt="Product Img">
								</div>
								<div class="col-5 store-border-price text-center">
									<div class="price">
										<p>$535</p>
									</div>
								</div>
								<div class="col-4 store-border-button">
									<a href="#" class="btn btn-primary wd-shop-btn pull-right red-bg">
										Buy it now
									</a>
								</div>
							</div>
						</div>
						<div class="col-12 product-store-box">
							<div class="row">
								<div class="col-3 p0 store-border-img">
									<img src="{{asset('assets/img/product-store/product-store-img3.jpg')}}" class="figure-img img-fluid" alt="Product Img">
								</div>
								<div class="col-5 store-border-price">
									<span class="badge badge-secondary wd-badge text-uppercase">Best</span>
									<div class="price text-center">
										<p>$198</p>
									</div>
								</div>
								<div class="col-4 store-border-button">
									<a href="#" class="btn btn-primary wd-shop-btn pull-right orange-bg">
										Buy it now
									</a>
								</div>
							</div>
						</div>
						<div class="col-12 product-store-box">
							<div class="row">
								<div class="col-3 p0 store-border-img">
									<img src="{{asset('assets/img/product-store/product-store-img4.jpg')}}" class="figure-img img-fluid" alt="Product Img">
								</div>
								<div class="col-5 store-border-price text-center">
									<div class="price">
										<p>$634</p>
									</div>
								</div>
								<div class="col-4 store-border-button">
									<a href="#" class="btn btn-primary wd-shop-btn pull-right green-bg">
										Buy it now
									</a>
								</div>
							</div>
						</div>
						<div class="col-12 product-store-box">
							<div class="row">
								<div class="col-3 p0 store-border-img">
									<img src="{{asset('assets/img/product-store/product-store-img5.jpg')}}" class="figure-img img-fluid" alt="Product Img">
								</div>
								<div class="col-5 store-border-price text-center">
									<div class="price">
										<p>$234</p>
									</div>
								</div>
								<div class="col-4 store-border-button">
									<a href="#" class="btn btn-primary wd-shop-btn pull-right blue-bg">
										Buy it now
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



			</div>
		</div>
	</div>


    <!-- =========================
        Review Section
    ============================== -->
    <section id="review" class="bg-image">
    	<div class="container-fluid custom-width">
    		<div class="row">
    			<div class="col-md-12">
					<h2 class="review-title">
						Check <span>REVIEW</span> With <span>Reviewer Junction </span> Theme to make <br>
						Best <span>Revenue.</span>
					</h2>
    			</div>
    			<!-- <div class="col-12 col-md-12 col-lg-7 col-xl-12">
					<div class="test-slider-up owl-carousel owl-theme row wow fadeInRight animated" data-wow-delay="300ms">
					    <div class="item">
							<ul class="list-unstyled review-list">
							  <li class="media">
								<div class="media">
									<img class="d-flex mr-3" src="{{asset('assets/img/review/th-review-author-img-1.png')}}" alt="Generic placeholder image">
									<div class="media-body">
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
										<p class="review-content">
											<i class="fa fa-quote-left" aria-hidden="true"></i>Great theme, I had to build a site in a hurry.<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
									</div>
								</div>
							  </li>
							  <li class="media">
								<div class="media">
									<img class="d-flex mr-3" src="{{asset('assets/img/review/th-review-author-img-2.png')}}" alt="Generic placeholder image">
									<div class="media-body">
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
										<p class="review-content">
											<i class="fa fa-quote-left" aria-hidden="true"></i>Great theme, I had to build a site in a hurry.<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
									</div>
								</div>
							  </li>
							  <li class="media">
								<div class="media">
									<img class="d-flex mr-3" src="{{asset('assets/img/review/th-review-author-img-3.png')}}" alt="Generic placeholder image">
									<div class="media-body">
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
										<p class="review-content">
											<i class="fa fa-quote-left" aria-hidden="true"></i>Great theme, I had to build a site in a hurry.<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
									</div>
								</div>
							  </li>
							  <li class="media">
								<div class="media">
									<img class="d-flex mr-3" src="{{asset('assets/img/review/th-review-author-img-4.png')}}" alt="Generic placeholder image">
									<div class="media-body">
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
										<p class="review-content">
											<i class="fa fa-quote-left" aria-hidden="true"></i>Great theme, I had to build a site in a hurry.<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
									</div>
								</div>
							  </li>
							</ul>
					    </div>
					    <div class="item">
							<ul class="list-unstyled review-list">
							  <li class="media">
								<div class="media">
									<img class="d-flex mr-3" src="{{asset('assets/img/review/th-review-author-img-1.png')}}" alt="Generic placeholder image">
									<div class="media-body">
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
										<p class="review-content">
											<i class="fa fa-quote-left" aria-hidden="true"></i>Great theme, I had to build a site in a hurry.<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
									</div>
								</div>
							  </li>
							  <li class="media">
								<div class="media">
									<img class="d-flex mr-3" src="{{asset('assets/img/review/th-review-author-img-2.png')}}" alt="Generic placeholder image">
									<div class="media-body">
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
										<p class="review-content">
											<i class="fa fa-quote-left" aria-hidden="true"></i>Great theme, I had to build a site in a hurry.<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
									</div>
								</div>
							  </li>
							  <li class="media">
								<div class="media">
									<img class="d-flex mr-3" src="{{asset('assets/img/review/th-review-author-img-3.png')}}" alt="Generic placeholder image">
									<div class="media-body">
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
										<p class="review-content">
											<i class="fa fa-quote-left" aria-hidden="true"></i>Great theme, I had to build a site in a hurry.<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
									</div>
								</div>
							  </li>
							  <li class="media">
								<div class="media">
									<img class="d-flex mr-3" src="{{asset('assets/img/review/th-review-author-img-4.png')}}" alt="Generic placeholder image">
									<div class="media-body">
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
										<p class="review-content">
											<i class="fa fa-quote-left" aria-hidden="true"></i>Great theme, I had to build a site in a hurry.<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
									</div>
								</div>
							  </li>
							</ul>
					    </div>
					</div>
    			</div> -->
    		</div>
    	</div>
    </section>

	<!-- =========================
        Best Rated Items
    ============================== -->
    <!-- <section id="best-rated">
    	<div class="container-fluid custom-width">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="text-left best-rated-title">
    					<h4>Best Rated Items</h4>
    				</div>
    				<div class="col-md-12 wow fadeInUp animated" data-wow-delay="300ms">
    				<div class="row">
	    				<div class="col-12 col-sm-6 col-md-6 col-xl-3 p0">
	    					<div class="bast-rated-box">
								<div class="media">
									<a href="product-details.html"><img class="d-flex mr-3" src="{{asset('assets/img/best-rated/best-reted-img.jpg')}}" alt="Generic placeholder image"></a>
									<div class="media-body">
										<strong class="price">$50.00 - $60.00</strong>
										<p class="rated-content">Echo Dot ( 2nd Generation )</p>
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-12 col-sm-6 col-md-6 col-xl-3 p0">
	    					<div class="bast-rated-box">
								<div class="media">
									<a href="product-details.html"><img class="d-flex mr-3" src="{{asset('assets/img/best-rated/best-reted-img-2.jpg')}}" alt="Generic placeholder image"></a>
									<div class="media-body">
										<strong class="price">$50.00 - $60.00</strong>
										<p class="rated-content">Echo Dot ( 2nd Generation )</p>
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-12 col-sm-6 col-md-6 col-xl-3 p0">
	    					<div class="bast-rated-box">
								<div class="media">
									<a href="product-details.html"><img class="d-flex mr-3" src="{{asset('assets/img/best-rated/best-reted-img-3.jpg')}}" alt="Generic placeholder image"></a>
									<div class="media-body">
										<strong class="price">$50.00 - $60.00</strong>
										<p class="rated-content">Echo Dot ( 2nd Generation )</p>
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-12 col-sm-6 col-md-6 col-xl-3 p0">
	    					<div class="bast-rated-box">
								<div class="media">
									<a href="product-details.html"><img class="d-flex mr-3" src="{{asset('assets/img/best-rated/best-reted-img-4.jpg')}}" alt="Generic placeholder image"></a>
									<div class="media-body">
										<strong class="price">$50.00 - $60.00</strong>
										<p class="rated-content">Echo Dot ( 2nd Generation )</p>
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-12 col-sm-6 col-md-6 col-xl-3 p0">
	    					<div class="bast-rated-box">
								<div class="media">
									<a href="product-details.html"><img class="d-flex mr-3" src="{{asset('assets/img/best-rated/best-reted-img-5.jpg')}}" alt="Generic placeholder image"></a>
									<div class="media-body">
										<strong class="price">$50.00 - $60.00</strong>
										<p class="rated-content">Echo Dot ( 2nd Generation )</p>
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-12 col-sm-6 col-md-6 col-xl-3 p0">
	    					<div class="bast-rated-box">
								<div class="media">
									<a href="product-details.html"><img class="d-flex mr-3" src="{{asset('assets/img/best-rated/best-reted-img-6.jpg')}}" alt="Generic placeholder image"></a>
									<div class="media-body">
										<strong class="price">$50.00 - $60.00</strong>
										<p class="rated-content">Echo Dot ( 2nd Generation )</p>
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-12 col-sm-6 col-md-6 col-xl-3 p0">
	    					<div class="bast-rated-box">
								<div class="media">
									<a href="product-details.html"><img class="d-flex mr-3" src="{{asset('assets/img/best-rated/best-reted-img-7.jpg')}}" alt="Generic placeholder image"></a>
									<div class="media-body">
										<strong class="price">$50.00 - $60.00</strong>
										<p class="rated-content">Echo Dot ( 2nd Generation )</p>
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-12 col-sm-6 col-md-6 col-xl-3 p0">
	    					<div class="bast-rated-box">
								<div class="media">
									<a href="product-details.html"><img class="d-flex mr-3" src="{{asset('assets/img/best-rated/best-reted-img-8.jpg')}}" alt="Generic placeholder image"></a>
									<div class="media-body">
										<strong class="price">$50.00 - $60.00</strong>
										<p class="rated-content">Echo Dot ( 2nd Generation )</p>
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-12 col-sm-6 col-md-6 col-xl-3 p0">
	    					<div class="bast-rated-box">
								<div class="media">
									<a href="product-details.html"><img class="d-flex mr-3" src="{{asset('assets/img/best-rated/best-reted-img-9.jpg')}}" alt="Generic placeholder image"></a>
									<div class="media-body">
										<strong class="price">$50.00 - $60.00</strong>
										<p class="rated-content">Echo Dot ( 2nd Generation )</p>
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-12 col-sm-6 col-md-6 col-xl-3 p0">
	    					<div class="bast-rated-box">
								<div class="media">
									<a href="product-details.html"><img class="d-flex mr-3" src="{{asset('assets/img/best-rated/best-reted-img-10.jpg')}}" alt="Generic placeholder image"></a>
									<div class="media-body">
										<strong class="price">$50.00 - $60.00</strong>
										<p class="rated-content">Echo Dot ( 2nd Generation )</p>
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-12 col-sm-6 col-md-6 col-xl-3 p0">
	    					<div class="bast-rated-box">
								<div class="media">
									<a href="product-details.html"><img class="d-flex mr-3" src="{{asset('assets/img/best-rated/best-reted-img-11.jpg')}}" alt="Generic placeholder image"></a>
									<div class="media-body">
										<strong class="price">$50.00 - $60.00</strong>
										<p class="rated-content">Echo Dot ( 2nd Generation )</p>
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-12 col-sm-6 col-md-6 col-xl-3 p0">
	    					<div class="bast-rated-box">
								<div class="media">
									<a href="product-details.html"><img class="d-flex mr-3" src="{{asset('assets/img/best-rated/best-reted-img-12.jpg')}}" alt="Generic placeholder image"></a>
									<div class="media-body">
										<strong class="price">$50.00 - $60.00</strong>
										<p class="rated-content">Echo Dot ( 2nd Generation )</p>
										<div class="rating">
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	    					</div>
	    				</div>
    				</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section> -->

	<!-- =========================
        Weekly Top News
    ============================== -->
    <section id="weekly-news">
    	<div class="container-fluid custom-width">
    		<div class="row">
    		    <div class="col-md-12 text-center">
					<h2 class="news-title">Weekly Most Reviewed Product</h2>
				</div>
    			<div class=" col-sm-6 col-md-6 col-xl-3 wow fadeInRight animated" data-wow-delay="300ms">
    				<div class="weekly-news-box">
						<figure class="figure">
							<div class="weekly-news-img text-left">
								<img src="{{asset('assets/img/weekly-news/weekly-news-img-1.jpg')}}" class="figure-img img-fluid rounded" alt="weekly-news-img">
								<div class="weekly-news-title">
									<a href="single-blog-with.html"><h4>Most wonderfull affiliate market theme and template Revieer Junction</h4></a>
								</div>
							</div>
							<figcaption class="figure-caption">
								<div class="blog-meta container">
									<div class="row">
										<div class="col blog-meta-box">
											<a href="single-blog-with.html"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Likes  115</a>
										</div>
										<div class="col blog-meta-box">
											<a href="single-blog-with.html"><i class="fa fa-commenting" aria-hidden="true"></i> Comments  59</a>
										</div>
										<div class="col blog-meta-box">
											<a href="single-blog-with.html"><i class="fa fa-share-alt-square" aria-hidden="true"></i> Share  20</a>
										</div>
									</div>
								</div>
								<div class="text-center">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum at, quibusdam ipsa tenetur possimus dignissimos vitae nesciunt laudantium laborum in iste eveniet reprehenderit maxime fVigoe culpa
								</div>
								<a href="single-blog-with.html" class="badge badge-light wd-news-more-btn">Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
							</figcaption>
						</figure>
						<div class="weekly-news-shape"></div>
    				</div>
    			</div>
    			<div class=" col-sm-6 col-md-6 col-xl-3 wow fadeInRight animated" data-wow-delay="600ms">
    				<div class="weekly-news-box">
						<figure class="figure">
							<div class="weekly-news-img text-left">
								<img src="{{asset('assets/img/weekly-news/weekly-news-img-2.jpg')}}" class="figure-img img-fluid rounded" alt="weekly-news-img">
								<div class="weekly-news-title">
									<a href="single-blog-with.html"><h4>Power is your hand if you get money making theme </h4></a>
								</div>
							</div>
							<figcaption class="figure-caption">
								<div class="blog-meta container">
									<div class="row">
										<div class="col blog-meta-box">
											<a href="single-blog-with.html"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Likes  115</a>
										</div>
										<div class="col blog-meta-box">
											<a href="single-blog-with.html"><i class="fa fa-commenting" aria-hidden="true"></i> Comments  59</a>
										</div>
										<div class="col blog-meta-box">
											<a href="single-blog-with.html"><i class="fa fa-share-alt-square" aria-hidden="true"></i> Share  20</a>
										</div>
									</div>
								</div>
								<div class="text-center">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum at, quibusdam ipsa tenetur possimus dignissimos vitae nesciunt laudantium laborum in iste eveniet reprehenderit maxime fVigoe culpa
								</div>
								<a href="single-blog-with.html" class="badge badge-light wd-news-more-btn">Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
							</figcaption>
						</figure>
						<div class="weekly-news-shape"></div>
    				</div>
    			</div>
    			<div class=" col-sm-6 col-md-6 col-xl-3 wow fadeInRight animated" data-wow-delay="900ms">
    				<div class="weekly-news-box">
						<figure class="figure">
							<div class="weekly-news-img text-left">
								<img src="{{asset('assets/img/weekly-news/weekly-news-img-3.jpg')}}" class="figure-img img-fluid rounded" alt="weekly-news-img">
								<div class="weekly-news-title">
									<a href="single-blog-with.html"><h4>No need to develop online store if you have idea like Revieer Junction</h4></a>
								</div>
							</div>
							<figcaption class="figure-caption">
								<div class="blog-meta container">
									<div class="row">
										<div class="col blog-meta-box">
											<a href="single-blog-with.html"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Likes  115</a>
										</div>
										<div class="col blog-meta-box">
											<a href="single-blog-with.html"><i class="fa fa-commenting" aria-hidden="true"></i> Comments  59</a>
										</div>
										<div class="col blog-meta-box">
											<a href="single-blog-with.html"><i class="fa fa-share-alt-square" aria-hidden="true"></i> Share  20</a>
										</div>
									</div>
								</div>
								<div class="text-center">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum at, quibusdam ipsa tenetur possimus dignissimos vitae nesciunt laudantium laborum in iste eveniet reprehenderit maxime fVigoe culpa
								</div>
								<a href="single-blog-with.html" class="badge badge-light wd-news-more-btn">Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
							</figcaption>
						</figure>
						<div class="weekly-news-shape"></div>
    				</div>
    			</div>
    			<div class=" col-sm-6 col-md-6 col-xl-3 wow fadeInRight animated" data-wow-delay="1200ms">
    				<div class="weekly-news-box">
						<figure class="figure">
							<div class="weekly-news-img text-left">
								<img src="{{asset('assets/img/weekly-news/weekly-news-img-4.jpg')}}" class="figure-img img-fluid rounded" alt="weekly-news-img">
								<div class="weekly-news-title">
									<a href="single-blog-with.html"><h4>Money making is easy to get our themes with affiliate market idea</h4></a>
								</div>
							</div>
							<figcaption class="figure-caption">
								<div class="blog-meta container">
									<div class="row">
										<div class="col blog-meta-box">
											<a href="single-blog-with.html"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Likes  115</a>
										</div>
										<div class="col blog-meta-box">
											<a href="single-blog-with.html"><i class="fa fa-commenting" aria-hidden="true"></i> Comments  59</a>
										</div>
										<div class="col blog-meta-box">
											<a href="single-blog-with.html"><i class="fa fa-share-alt-square" aria-hidden="true"></i> Share  20</a>
										</div>
									</div>
								</div>
								<div class="text-center">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum at, quibusdam ipsa tenetur possimus dignissimos vitae nesciunt laudantium laborum in iste eveniet reprehenderit maxime fVigoe culpa
								</div>
								<a href="single-blog-with.html" class="badge badge-light wd-news-more-btn">Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
							</figcaption>
						</figure>
						<div class="weekly-news-shape"></div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>


z
    <!-- =========================
        Footer Section
    ============================== -->
    <footer class="footer wow fadeInUp animated footer-3" data-wow-delay="900ms">
    	<div class="container-fluid custom-width">
    		<div class="row">
    			<div class="col-md-12 col-lg-2">
    				<!-- ===========================
    						Footer About
    					 =========================== -->
    				<div class="footer-about">
    					<a href="index.html" class="footer-about-logo">
    						<img src="{{asset('assets/img/logo.png')}}" alt="Logo">
    					</a>
	    				<div class="footer-description">
	    					<p>Lorem ipsum dolor sit amet, anim id est laborum. Sed ut perspconsectetur, adipisci vam aliquam qua.</p>
	    				</div>
	    				<div class="wb-social-media">
						<a href="#" class="bh"><i class="fa fa-behance"></i></a>
						<a href="#" class="fb"><i class="fa fa-facebook-official"></i></a>
						<a href="#" class="db"><i class="fa fa-dribbble"></i></a>
						<a href="#" class="gp"><i class="fa fa-google-plus"></i></a>
						<a href="#" class="vn"><i class="fa fa-vine"></i></a>
						<a href="#" class="yt"><i class="fa fa-youtube-play"></i></a>
					</div>
    				</div>
    			</div>
    			<div class="col-6 col-md-3 col-lg-2 footer-nav">
    				<!-- ===========================
    						Festival Deals
    					 =========================== -->
    				<h6 class="footer-subtitle">Festival Deals</h6>
    				<ul>
    					<li><a href="index.html"> Home </a></li>
    					<li><a href="compare-products.html">Comparison Product </a></li>
    					<li><a href="#">Shop </a></li>
    					<li><a href="review-left-sidebar.html">Reviews</a></li>
    					<li><a href="blog-four-grid-left-sidebar.html">Blog</a></li>
    				</ul>
    			</div>
    			<div class="col-6 col-md-3 col-lg-2 footer-nav">
    				<!-- ===========================
    						Top Stores
    					 =========================== -->
    				<div class="stores-list">
	    				<h6 class="footer-subtitle">Top Stores</h6>
	    				<ul>
	    					<li><a href="#">Affiliate Market 1</a></li>
	    					<li><a href="#">Affiliate Market 2</a></li>
	    					<li><a href="#">Affiliate Market 3</a></li>
	    					<li><a href="#">Affiliate Market 4</a></li>
	    					<li><a href="#">Affiliate Market 5</a></li>

	    				</ul>
    				</div>
    			</div>
    			<div class="col-6 col-md-3 col-lg-2 footer-nav">
    				<!-- ===========================
    						Need Help ?
    					 =========================== -->
    				<h6 class="footer-subtitle">Need Help ?</h6>
    				<ul>
    					<li><a href="product-details-scroll.html">Getting Started</a></li>
    					<li><a href="contact-us.html">Contact Us</a></li>
    					<li><a href="product-details-scroll.html">FAQ's</a></li>
    					<li><a href="product-details-scroll.html">Press</a></li>
    					<li><a href="product-details-scroll.html">Product Feed</a></li>
    					<li><a href="product-details-scroll.html">Best Rated Product</a></li>
    					<li><a href="product-details-scroll.html">Feature product</a></li>
    				</ul>
    			</div>
    			<div class="col-6 col-md-3 col-lg-2 footer-nav">
    				<!-- ===========================
    						About
    					 =========================== -->
    				<h6 class="footer-subtitle">About</h6>
	    				<ul>
	    					<li><a href="conditions.html">Privacy</a></li>
	    					<li><a href="conditions.html">Return Policy</a></li>
	    					<li><a href="conditions.html">Order &#38; Return</a></li>
	    					<li><a href="conditions.html">Terms &#38; Conditions</a></li>
	    				</ul>
    			</div>
    			<div class="col-12 col-md-12 col-lg-2">
    				<h6 class="footer-subtitle">Newsletter Signup</h6>
    				<p class="newsletter-content">By subscribing to our mailing list you will always be update with the latest news from us.</p>
    				<div class="newsletter-form">
						<form>
							<div class="form-group">
								<input type="text" class="form-control newsletter-input" placeholder="Enter your email">
							</div>
							<button type="submit" class="btn btn-primary newsletter-btn">Join us</button>
						</form>
    				</div>
    			</div>
    		</div>
			<div class="row">
	    		<div class="col-md-6">
	    			<div class="copyright-text">
	    				<p class="text-uppercase">COPYRIGHT &copy; 2022</p><a class="created-by" href=""></a>
	    			</div>
	    		</div>
	    		<div class="col-md-6">
	    			<div class="brand-logo d-flex justify-content-start">

	    			</div>
	    		</div>
	    	</div>
    	</div>

    </footer>
    <!-- =========================
        CopyRight
    ============================== -->




    <!-- =========================
    	Main Loding JS Script
    ============================== -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/popper.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nav.js')}}"></script>
    {{-- <!-- <script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script> --> --}}
    <script src="{{asset('assets/js/jquery.rateyo.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('assets/js/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-validation/additional-methods.min.js')}}"></script>
    <script src="{{asset('assets/js/mobile.js')}}"></script>
    <script src="{{asset('assets/js/lightslider.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>

    <script src="{{asset('assets/js/simplePlayer.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>

  </body>
</html>
