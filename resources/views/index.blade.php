@extends('layouts.master')

@section('content')


    <!-- =========================
        Slider Section
    ============================== -->
    <section id="main-slider-section">
    	<div id="main-slider" class="slider-bg2  owl-carousel owl-theme product-review slider-cat">
			<div class="item d-flex  slider-bg align-items-center">
				<div class="container-fluid">
					<div class="row justify-content-end">

						 <div class="slider-text col-sm-6  col-xl-4   col-md-6 order-2 order-sm-1">
							<h6 class="slider-title text-light">Write <strong class="highlights-text">Review</strong></h6>
							<h1 class="slider-title text-light"><strong class="highlights-text">Earn</strong> Points</h1>
							<a href="{{route('submit.review')}}" class="btn btn-primary wd-shop-btn slider-btn">
								Write Review <i class="fa fa-arrow-right" aria-hidden="true"></i>
							</a>
						</div>

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

    ============================== -->
    <section >
    	<div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="choose-category-main-title">How it Works</h2>
                </div>
			</div>
			<div class="row">

                    <div class="col-md-4">
                        <div class="service-item  text-center" >
							<img src="{{asset('../assets/img/user.png')}}">
                            <div class="service-detail p-4">
                                <h4>Sign Up</h4>
                                <p></p>
                            </div>
                        </div>
                    </div>
					<div class="col-md-4">
                        <div class="service-item  text-center" >

							<img src="{{asset('../assets/img/feedback.png')}}">

                            <div class="service-detail p-4">
                                <h4>Write Review</h4>
                                <p></p>
                            </div>
                        </div>
                    </div>
					<div class="col-md-4">
                        <div class="service-item  text-center" >
                            <img src="{{asset('../assets/img/token.png')}}">
                            <div class="service-detail p-4">
                                <h4>Earn Points</h4>
                                <p></p>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>


    <!-- =========================
        Review Section
    ============================== -->
    <section id="review" class="bg-image">
    	<div class="container-fluid custom-width">
    		<div class="row">
    			<div class="col-md-12 text-center ">
					<h2 class="review-title pt-4">
						Write <span>Review</span><br/>
                        Start <span>earning rewards </span>
					</h2>
                    @guest
                    <button class="btn btn-light mt-4"  data-toggle="modal" data-target=".bd-example-modal-lg2">Sign Up</button>
                    @endguest

    			</div>

    		</div>
    	</div>
    </section>





@endsection
