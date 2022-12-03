@extends('layouts.master')


@section('content')
<!-- =========================
        Slider Section
        ============================== -->
        <section id="main-slider-section" class="shop-slider-section">
            <div id="shop-slider" class="owl-carousel owl-theme product-review">
                <div class="item bc-slider-bg">

                    <div class="container">
                        <div class="row">
                            <div class="slider-text col-12">
                                <!-- <h1 class="slider-title">Deals for the <span class="strong">Amazing Gamer</span></h1>
          <p class="slider-content">Comparison Your Product with Best Review from Multi-Vendor Store <br>
          Hurry to go affiliate on this day successfully with BLURB Theme.</p>
          <a href="shop-left-sidebar.html" class="btn btn-primary wd-shop-btn slider-btn">
           Go to store <i class="fa fa-arrow-right" aria-hidden="true"></i>
          </a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item bc-slider-bg-2">

                    <div class="container">
                        <div class="row">
                            <div class="slider-text col-12">
                                <!--<h1 class="slider-title">Make your day <span class="strong">Elipkart</span></h1>
         <p class="slider-content">Comparison Your Product with Best Review from Multi-Vendor Store <br>
         Hurry to go affiliate on this day successfully with BLURB Theme.</p>
         <a href="" class="btn btn-primary wd-shop-btn slider-btn">
          Go to store <i class="fa fa-arrow-right" aria-hidden="true"></i>
         </a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- =========================
      Product Section
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
                                            <img src="img/product-img/product-view-img-1.jpg" class="img-fluid"
                                                alt="Product Img">
                                        </div>
                                        <div class="item">
                                            <img src="img/product-img/product-view-img-2.jpg" class="img-fluid"
                                                alt="Product Img">
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
                                            <p>3.7/5 <span class="product-ratings-text"> -1747 Ratings</span><span
                                                    class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="product-detail.html"><i class=""
                                                            aria-hidden="true"></i>More Reviews</a>
                                                </span></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="list-group content-list">
                                    <p><i class="fa fa-dot-circle-o" aria-hidden="true"></i> 100% Original product</p>
                                    <p><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Manufacturer Warranty</p>
                                </div>
                            </div>
                            <div class="product-store row">

                            </div>
                        </div>
                        <div class="col-12 product-store-box">

                        </div>

                    </div>
                </div>
            </div>



        </div>
        </div>
        </div>
        <section id="product-amazon" class="product-shop-page product-shop-full-grid">
            <div class="container">
                <div class="row">

                    <div class="col-12 p0 ">
                        <div class="page-location">
                            <ul>
                                <li><a href="#">
                                        Home <span class="divider">/</span>
                                    </a></li>
                                <li><a class="page-location-active" href="#">
                                        Shop
                                        <span class="divider">/</span>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="order-sm-2 order-md-1  col-12 col-md-4 col-lg-3 ">
                        <!-- =========================
          Search Option
          ============================== -->
                        <div class="sidebar-search">
                            <div class="input-group wd-btn-group col-12 p0">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary wd-btn-search" type="button">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </span>
                            </div>
                        </div>

                        <!-- =========================
          Category Option
          ============================== -->
                        <div class="side-bar category category-md">
                            <h5 class="title">Category</h5>
                            <ul class="dropdown-list-menu">
                                @forelse ($categories as $category)
                                @php $count=$category->subcategory->count(); @endphp
                                    <li class="{{($count>0)?'sidebar-dropdown':''}}">
                                        @if($count>0)
                                        <p><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$category->name}} </p>
                                            {{-- <a href="{{route('category.list',[$category->slug])}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            </a> --}}
                                            <ul class="dropdown-sub-menu">
                                                @forelse ($category->subcategory as $subcategory)
                                                <li><a href="{{route('subcategory.list',[$category->slug,$subcategory->slug])}}"><i class="fa fa-angle-right" aria-hidden="true"></i>{{$subcategory->name}}</a></li>
                                                @empty

                                                @endforelse


                                            </ul>

                                        @else
                                            <a href="{{route('category.list',[$category->slug])}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            {{$category->name}}</a>
                                        @endif


                                    </li>
                                @empty

                                @endforelse

                                <li class="sidebar-dropdown">

                                    <ul class="dropdown-sub-menu">
                                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                                Touch</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                                Button</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                                Speaker</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                                Protector</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>



                        <!-- =========================
          Tags Box Option
          ============================== -->
                        <div class="side-bar tags-box">
                            <h5 class="title">Tags</h5>
                            <ul>
                                <li><a href="#">Comerce </a></li>
                                <li><a href="#">Trending</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">market</a></li>
                                <li><a href="#">mobile</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Comerce </a></li>
                                <li><a href="#">Trending</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">market</a></li>
                                <li><a href="#">mobile</a></li>
                                <li><a href="#">Business</a></li>
                            </ul>
                        </div>


                    </div>
                    <div class=" order-sm-1 order-md-2   col-12 col-md-8 col-lg-9 product-grid">
                        <div class="row">
                            <div class="col-12">
                                <div class="filter row justify-content-between">
                                    <div class="col-8 col-md-3">
                                        <h6 class="result d-none">Showing all 12 results</h6>
                                    </div>
                                    <div class="col-6 col-md-6 filter-btn-area text-center d-none">
                                        <div class="btn-group" role="group">
                                            <div class="d-flex">
                                                <p>Sort by:</p>
                                                <button id="btnGroupDropwdshowingres" type="button"
                                                    class="btn btn-secondary dropdown-toggle filter-btn"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Default
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDropwdshowingres">
                                                    <a class="dropdown-item" href="#">Camara</a>
                                                    <a class="dropdown-item" href="#">Joystick</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-3 sorting text-right">
                                        <ul class="nav nav-tabs shop-btn" id="myTab" role="tablist">
                                            <li class="nav-item ">
                                                <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab"
                                                    aria-controls="home" aria-selected="true"><i class="fa fa-bars"
                                                        aria-hidden="true"></i></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" id="profile-tab" data-toggle="tab"
                                                    href="#profile" role="tab" aria-controls="profile"
                                                    aria-selected="false"><i class="fa fa-th" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content col-12">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <div class="row">
                                        @forelse ($products as $product)
                                        <div class="col-12 col-md-6 col-lg-4 reviews-load-more">
                                            <figure class="figure product-box row">
                                                <div class="col-12 col-md-12 col-lg-12 col-xl-12 p0">
                                                    <div class="product-box-img">
                                                        <a href="{{route('singleProduct',[$product->slug])}}">
                                                            <img src="{{(!empty($product->thumbnail_image)?asset('storage/'.$product->thumbnail_image):asset('images/no-image.png'))}}" class="figure-img img-fluid" alt="{{$product->product_name}}">
                                                        </a>
                                                    </div>
                                                    <div class="quick-view-btn">
                                                        <div class="compare-btn">
                                                            {{-- <button type="button" class="btn btn-primary btn-sm"
                                                                data-toggle="modal"
                                                                data-target=".bd-example-modal-lg-product-1"><i
                                                                    class="fa fa-eye" aria-hidden="true"></i> Quick
                                                                view</button> --}}
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-12 col-md-12 col-lg-12 col-xl-12 p0">
                                                    <div class="figure-caption text-center">
                                                        <div class="price-start">
                                                            <p>Price start from <strong
                                                                    class="active-color"><u>&#8377;{{ $product->price}}</u> </strong></p>
                                                        </div>
                                                        <div class="content-excerpt">
                                                            <p>{{$product->product_name}}</p>
                                                        </div>
                                                      {{--   <div class="rating">
                                                            <a href="#"><i class="fa fa-star active-color"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-star active-color"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-star active-color"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                        </div> --}}
                                                        <div class="compare-btn">
                                                            <a class="btn btn-primary btn-sm" href="{{route('singleProduct',[$product->slug])}}"><i
                                                                    class="fa fa-exchange" aria-hidden="true"></i>View
                                                                Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>
                                        @empty
                                        <div class="col-12 col-md-6 col-lg-4 text-center">

                                            <h3 class="text-center">NO Product Found</h3>
                                        </div>
                                        @endforelse




                                    </div>
                                </div>
                                <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        @forelse ($products as $product)
                                        <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                                            <figure class="figure product-box row">
                                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                                    <div class="product-box-img">
                                                        <a href="">
                                                            <img src="{{(!empty($product->thumbnail_image)?asset('storage/'.$product->thumbnail_image):'img/shop-img/shop-img-1.jpg')}}"
                                                                class="figure-img img-fluid" alt="Product Img">
                                                        </a>
                                                    </div>
                                                    <div class="quick-view-btn">
                                                        <div class="compare-btn">
                                                            <button type="button" class="btn btn-primary btn-sm"
                                                                data-toggle="modal"
                                                                data-target=".bd-example-modal-lg-product-1"><i
                                                                    class="fa fa-eye" aria-hidden="true"></i> Quick
                                                                view</button>
                                                        </div>
                                                    </div>

                                                    <div class="wishlist">
                                                        <i class="fa fa-heart active-wishlist" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                                    <div class="figure-caption text-left">
                                                        <div class="row">
                                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                                <div class="price-start">
                                                                    <strong class="active-color"><u>&#8377;80.00</u> -
                                                                        <u>&#8377;75.00</u></strong>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12 col-lg-6">
                                                                <div class="rating">
                                                                    <a href="#"><i class="fa fa-star active-color"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star active-color"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star active-color"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="content-excerpt">
                                                                    <h6 class="product-title">Bose QuietControl 30
                                                                        Wireless <br> Headphones</h6>
                                                                    <p class="product-content">Lorem ipsum dolor sit amet,
                                                                        consectetur adipisicing elit, sed do eiusmod tempor
                                                                        incididunt ut labore et dolore magna aliqua. Ut enim
                                                                        ad minim veni</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="compare-btn">
                                                                    <a class="btn btn-primary btn-sm"
                                                                        href="product-detail.html"><i class="fa fa-exchange"
                                                                            aria-hidden="true"></i>View Detail</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>
                                        @empty
                                        <div class="col-12 col-md-6 col-lg-4 text-center">

                                            <h3 class="text-center">NO Product Found</h3>
                                        </div>
                                        @endforelse




                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center  d-none">
                                <a href="#" id="loadMore" class="btn btn-primary wd-shop-btn">
                                    Show more
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
@endsection
