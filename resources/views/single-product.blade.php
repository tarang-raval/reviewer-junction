@extends('layouts.master')


@section('content')
    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-12 p0">
                    <div class="page-location">
                        <ul>
                            <li><a href="#">
                                    Home /  <span class="divider">/</span>
                                </a></li>
                            <li><a class="page-location-active" href="#">
                                   {{$product->product_name}}
                                    <span class="divider">/</span>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 product-details-section">
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
                                    <div class="lSSlideOuter  d-none">
                                        <div class="lSSlideWrapper usingCss">
                                            <div class="lSSlideOuter noPager">
                                                <div class="lSSlideWrapper usingCss">
                                                    <ul id="lightSlider" class="lightSlider lsGrab lSSlide"
                                                        style="width: 0px; transform: translate3d(0px, 0px, 0px); height: 0px; padding-bottom: 0%;">
                                                        <li data-thumb="{{asset('images/no-image.png')}}"
                                                            class="lslide active" style="width: 0px; margin-right: 0px;">
                                                            <img class="figure-img img-fluid"
                                                                src="{{asset('images/no-image.png')}}"
                                                                alt="product-img">
                                                        </li>
                                                        <li data-thumb="{{asset('images/no-image.png')}}"
                                                            class="lslide" style="width: 0px; margin-right: 0px;">
                                                            <img class="figure-img img-fluid"
                                                                src="{{asset('images/no-image.png')}}"
                                                                alt="product-img">
                                                        </li>
                                                        <li data-thumb="{{asset('images/no-image.png')}}"
                                                            class="lslide" style="width: 0px; margin-right: 0px;">
                                                            <img class="figure-img img-fluid"
                                                                src="{{asset('images/no-image.png')}}"
                                                                alt="product-img">
                                                        </li>
                                                        <li data-thumb="{{asset('images/no-image.png')}}"
                                                            class="lslide" style="width: 0px; margin-right: 0px;">
                                                            <img class="figure-img img-fluid"
                                                                src="{{asset('images/no-image.png')}}"
                                                                alt="product-img">
                                                        </li>
                                                        <li data-thumb="{{asset('images/no-image.png')}}"
                                                            class="lslide" style="width: 0px; margin-right: 0px;">
                                                            <img class="figure-img img-fluid"
                                                                src="{{asset('images/no-image.png')}}"
                                                                alt="product-img">
                                                        </li>
                                                        <li data-thumb="{{asset('images/no-image.png')}}"
                                                            class="lslide" style="width: 0px; margin-right: 0px;">
                                                            <img class="figure-img img-fluid"
                                                                src="{{asset('images/no-image.png')}}"
                                                                alt="product-img">
                                                        </li>
                                                    </ul>
                                                    <div class="lSAction"><a class="lSPrev"></a><a class="lSNext"></a></div>
                                                </div>
                                                <ul class="lSPager lSGallery"
                                                    style="margin-top: 5px; transition-duration: 400ms; width: 1.5px; transform: translate3d(0px, 0px, 0px);">
                                                </ul>
                                            </div>
                                            <div class="lSAction"><a class="lSPrev"></a><a class="lSNext"></a></div>
                                        </div>
                                        <ul class="lSPager lSGallery"
                                            style="margin-top: 5px; transition-duration: 400ms; width: 654.5px; transform: translate3d(0px, 0px, 0px);">
                                            <li style="width:100%;width:104px;margin-right:5px" class="active"><a
                                                    href="#"><img src="{{asset('images/no-image.png')}}"></a>
                                            </li>
                                            <li style="width:100%;width:104px;margin-right:5px"><a href="#"><img
                                                        src="{{asset('images/no-image.png')}}"></a></li>
                                            <li style="width:100%;width:104px;margin-right:5px"><a href="#"><img
                                                        src="{{asset('images/no-image.png')}}"></a></li>
                                            <li style="width:100%;width:104px;margin-right:5px"><a href="#"><img
                                                        src="{{asset('images/no-image.png')}}"></a></li>
                                            <li style="width:100%;width:104px;margin-right:5px"><a href="#"><img
                                                        src="{{asset('images/no-image.png')}}"></a></li>
                                            <li style="width:100%;width:104px;margin-right:5px"><a href="#"><img
                                                        src="{{asset('images/no-image.png')}}"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-12 col-md-12 col-lg-6">
                            <div class="product-details-gallery">
                                <div class="list-group">
                                    <h4 class="list-group-item-heading product-title">
                                        {{$product->product_name}}
                                    </h4>
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <div class="rating">
                                                <a href="#"><i class="fa fa-star active-color"
                                                        aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star active-color"
                                                        aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star active-color"
                                                        aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <p class="d-none">3.7/5 <span class="product-ratings-text"> -1747 Ratings</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group content-list">

                                    {!! $product->short_description !!}
                                    {{-- <p><i class="fa fa-dot-circle-o" aria-hidden="true"></i> 100% Original product</p>
                                    <p><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Manufacturer Warranty</p> --}}
                                </div>
                            </div>
                            <div class="product-store row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="wd-tab-section">
                        <ul class="nav nav-pills mb-3 wd-tab-menu" id="nav">
                            <li class="nav-item col-6 col-md">
                                <a href="#description-section" class="nav-link" id="description-tab">Description</a>
                            </li>
                            <li class="nav-item col-6 col-md">
                                <a href="#full-specifiction" class="nav-link" id="full-specifiction-tab">Ful
                                    Specifiction</a>
                            </li>
                            <li class="nav-item col-6 col-md">
                                <a href="#reviews" class="nav-link" id="reviews-tab">Reviews</a>
                            </li>
                            <li class="nav-item col-6 col-md current">
                                <a href="#specifiction" class="nav-link" id="price-history-tab">Price History</a>
                            </li>
                        </ul>

                        <div class="tab-pane" id="description-section">
                                {!! $product->full_description !!}
                        </div>
                        <div class="tab-pane" id="full-specifiction">
                            <h6>Full Specifiction</h6>
                            <br>
                            <ul class="list-group wd-info-section">
                                @if($product->productAttributes)
                                @forelse ($product->productAttributes as $productAttributes)
                                <li class="list-group-item d-flex justify-content-between align-items-center p0">
                                    <div class="col-12 col-md-6 info-section">
                                        <p>{{$productAttributes->attribute_name}} :{{$productAttributes->attribute_name}} </p>

                                    </div>

                                </li>
                                @empty

                                @endforelse
                                @endif

                            </ul>
                        </div>
                        <div class="tab-pane reviews-section" id="reviews">
                            <div class="row">
                                <div class="col-12">
                                    <p class="wd-opacity">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Asperiores id assumenda, ex ab voluptatem doloremque soluta magnam eum nihil iusto
                                        maiores! Libero nisi maior</p>

                                    <h6 class="review-rating-title">Average Ratings and Reviews</h6>
                                    <div class="row tab-rating-bar-section">
                                        <div class="col-8 col-md-4 col-lg-4">
                                            <img src="img/review-bg.png" alt="review-bg">
                                            <div class="review-rating text-center">
                                                <h1 class="rating">4.5</h1>
                                                <p>4 Ratings &amp;
                                                    0 Reviews</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3 rating-bar-section">
                                            <div class="media rating-star-area">
                                                <p>5 <i class="fa fa-star" aria-hidden="true"></i></p>
                                                <div class="media-body rating-bar">
                                                    <div class="progress wd-progress">
                                                        <div class="progress-bar wd-bg-green" role="progressbar"
                                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media rating-star-area">
                                                <p>4 <i class="fa fa-star" aria-hidden="true"></i></p>
                                                <div class="media-body rating-bar">
                                                    <div class="progress wd-progress">
                                                        <div class="progress-bar wd-bg-green" role="progressbar"
                                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media rating-star-area">
                                                <p>3 <i class="fa fa-star" aria-hidden="true"></i></p>
                                                <div class="media-body rating-bar">
                                                    <div class="progress wd-progress">
                                                        <div class="progress-bar wd-bg-green" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media rating-star-area">
                                                <p>2 <i class="fa fa-star" aria-hidden="true"></i></p>
                                                <div class="media-body rating-bar">
                                                    <div class="progress wd-progress">
                                                        <div class="progress-bar wd-bg-yellow" role="progressbar"
                                                            style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media rating-star-area">
                                                <p>1 <i class="fa fa-star" aria-hidden="true"></i></p>
                                                <div class="media-body rating-bar">
                                                    <div class="progress wd-progress">
                                                        <div class="progress-bar wd-bg-red" role="progressbar"
                                                            style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="reviews-market" style="">

                                        <!--
                                            =================================
                                            Review Our Market
                                            =================================
                                        -->


                                        <!--
                                            =================================
                                            Review Our Product
                                            =================================
                                        -->
                                        <div class="review-our-product text-left row">
                                            <div class="col-12 col-lg-6 reviews-title">
                                                <h3>Review</h3>
                                            </div>

                                            <div class="col-12 col-lg-6 text-right display-none-md">
                                                <div class="filter">
                                                    <div class="btn-group" role="group">
                                                        <div class="d-flex">
                                                            <p>View as:</p>
                                                            <button id="btnGroupDropwdreview" type="button"
                                                                class="btn btn-secondary dropdown-toggle filter-btn"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Latest
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="btnGroupDropwdreview"
                                                                style="position: absolute; transform: translate3d(50px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item" href="#">Oldest First</a>
                                                                <a class="dropdown-item" href="#">Higest Ratetd</a>
                                                                <a class="dropdown-item" href="#">Lowest Ratetd</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-warning">Write A Review</button>
                                                </div>
                                            </div>

                                            <!-- =================================
                                                Review Client Section
                                                ================================= -->

                                            <div class="col-12 review-our-product-area">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="media">
                                                                    <div class="media-left media-middle">
                                                                        <a href="#">
                                                                            <img class="media-object rounded-circle"
                                                                                src="img/client/client-img-1.png"
                                                                                alt="client-img">
                                                                        </a>
                                                                    </div>
                                                                    <div class="media-body ml-2">
                                                                        <h4 class="media-heading client-title">Robert Strud
                                                                        </h4>
                                                                        <div class="client-subtitle">GJ <a
                                                                                href="#">India</a></div>
                                                                        <div class="">
                                                                            <p class="review-date">November 17, 2016</p>
                                                                        </div>
                                                                        <div class="rating-star d-flex">
                                                                            <span
                                                                                class="badge badge-secondary wd-star-market-badge text-uppercase">4.5
                                                                                <i class="fa fa-star-o"
                                                                                    aria-hidden="true"></i></span>
                                                                            <div class="review-rating-yellow-5  jq-ry-container"
                                                                                style="width: 95px;">
                                                                                <div class="jq-ry-group-wrapper">
                                                                                    <div
                                                                                        class="jq-ry-normal-group jq-ry-group">
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#e3e3e3">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#e3e3e3"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#e3e3e3"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#e3e3e3"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#e3e3e3"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <div class="jq-ry-rated-group jq-ry-group"
                                                                                        style="width: 100%;">
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#ff9800">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#ff9800"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#ff9800"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#ff9800"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#ff9800"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-4">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry. Lorem Ipsum has been the industry's standard dummy
                                                            text ever since the 1500s, when an unknown printer took a galley
                                                            of type and scrambled it to make a type specimen book. It has
                                                            survived not only five centuries, but also the leap into
                                                            electronic typesetting, remaining essentially unchanged. It was
                                                            popularised in the 1960s with the release of Letraset sheets
                                                            containing Lorem Ipsum passages, and more recently with desktop
                                                            publishing software like Aldus PageMaker including versions of
                                                            Lorem Ipsum.</p>
                                                    </div>

                                                    <div class="col-6 col-md-4">
                                                        <div class="client-review-list">
                                                            <div class="media">
                                                                <div class="media-left media-middle">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="img/client/client-list-icon-1.png"
                                                                            alt="client-img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Prons</h6>
                                                                </div>
                                                            </div>
                                                            <ul class="check-list">
                                                                <li><i class="fa fa-check" aria-hidden="true"></i> All
                                                                </li>
                                                                <li><i class="fa fa-check" aria-hidden="true"></i> Design
                                                                </li>
                                                                <li><i class="fa fa-check" aria-hidden="true"></i>
                                                                    Developing</li>
                                                                <li><i class="fa fa-check" aria-hidden="true"></i> Metalic
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="client-review-list">
                                                            <div class="media">
                                                                <div class="media-left media-middle">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="img/client/client-list-icon-2.png"
                                                                            alt="client-img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Prons</h6>
                                                                </div>
                                                            </div>
                                                            <ul class="check-list icon-red">
                                                                <li><i class="fa fa-check" aria-hidden="true"></i> All
                                                                </li>
                                                                <li><i class="fa fa-check" aria-hidden="true"></i> Design
                                                                </li>
                                                                <li><i class="fa fa-check" aria-hidden="true"></i>
                                                                    Developing</li>
                                                                <li><i class="fa fa-check" aria-hidden="true"></i> Metalic
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-12 review-our-product-area">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="media">
                                                                    <div class="media-left media-middle">
                                                                        <a href="#">
                                                                            <img class="media-object rounded-circle"
                                                                                src="img/client/client-img-1.png"
                                                                                alt="client-img">
                                                                        </a>
                                                                    </div>
                                                                    <div class="media-body ml-2">
                                                                        <h4 class="media-heading client-title">Robert Strud
                                                                        </h4>
                                                                        <div class="client-subtitle">GJ <a
                                                                                href="#">India</a></div>
                                                                        <div class="">
                                                                            <p class="review-date">November 17, 2016</p>
                                                                        </div>
                                                                        <div class="rating-star d-flex">
                                                                            <span
                                                                                class="badge badge-secondary wd-star-market-badge text-uppercase">4.5
                                                                                <i class="fa fa-star-o"
                                                                                    aria-hidden="true"></i></span>
                                                                            <div class="review-rating-yellow-5  jq-ry-container"
                                                                                style="width: 95px;">
                                                                                <div class="jq-ry-group-wrapper">
                                                                                    <div
                                                                                        class="jq-ry-normal-group jq-ry-group">
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#e3e3e3">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#e3e3e3"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#e3e3e3"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#e3e3e3"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#e3e3e3"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <div class="jq-ry-rated-group jq-ry-group"
                                                                                        style="width: 100%;">
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#ff9800">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#ff9800"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#ff9800"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#ff9800"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                        <!--?xml version="1.0" encoding="utf-8"?--><svg
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 12.705 512 486.59"
                                                                                            x="0px" y="0px"
                                                                                            xml:space="preserve"
                                                                                            width="19px" height="19px"
                                                                                            fill="#ff9800"
                                                                                            style="margin-left: 0px;">
                                                                                            <polygon
                                                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-4">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry. Lorem Ipsum has been the industry's standard dummy
                                                            text ever since the 1500s, when an unknown printer took a galley
                                                            of type and scrambled it to make a type specimen book. It has
                                                            survived not only five centuries, but also the leap into
                                                            electronic typesetting, remaining essentially unchanged. It was
                                                            popularised in the 1960s with the release of Letraset sheets
                                                            containing Lorem Ipsum passages, and more recently with desktop
                                                            publishing software like Aldus PageMaker including versions of
                                                            Lorem Ipsum.</p>
                                                    </div>

                                                    <div class="col-6 col-md-4">
                                                        <div class="client-review-list">
                                                            <div class="media">
                                                                <div class="media-left media-middle">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="img/client/client-list-icon-1.png"
                                                                            alt="client-img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Prons</h6>
                                                                </div>
                                                            </div>
                                                            <ul class="check-list">
                                                                <li><i class="fa fa-check" aria-hidden="true"></i> All
                                                                </li>
                                                                <li><i class="fa fa-check" aria-hidden="true"></i> Design
                                                                </li>
                                                                <li><i class="fa fa-check" aria-hidden="true"></i>
                                                                    Developing</li>
                                                                <li><i class="fa fa-check" aria-hidden="true"></i> Metalic
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="client-review-list">
                                                            <div class="media">
                                                                <div class="media-left media-middle">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="img/client/client-list-icon-2.png"
                                                                            alt="client-img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Prons</h6>
                                                                </div>
                                                            </div>
                                                            <ul class="check-list icon-red">
                                                                <li><i class="fa fa-check" aria-hidden="true"></i> All
                                                                </li>
                                                                <li><i class="fa fa-check" aria-hidden="true"></i> Design
                                                                </li>
                                                                <li><i class="fa fa-check" aria-hidden="true"></i>
                                                                    Developing</li>
                                                                <li><i class="fa fa-check" aria-hidden="true"></i> Metalic
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <a href="https://unsplash.it/1200/768.jpg?image=251"
                                                        data-toggle="lightbox" data-gallery="gallery" class="col-md-2">
                                                        <img src="https://unsplash.it/600.jpg?image=251"
                                                            class="img-fluid rounded">
                                                    </a>
                                                    <a href="https://unsplash.it/1200/768.jpg?image=252"
                                                        data-toggle="lightbox" data-gallery="gallery" class="col-md-2">
                                                        <img src="https://unsplash.it/600.jpg?image=252"
                                                            class="img-fluid rounded">
                                                    </a>
                                                    <a href="https://unsplash.it/1200/768.jpg?image=253"
                                                        data-toggle="lightbox" data-gallery="gallery" class="col-md-2">
                                                        <img src="https://unsplash.it/600.jpg?image=253"
                                                            class="img-fluid rounded">
                                                    </a>
                                                </div>


                                            </div>

                                        </div>

                                        <!--
                                            =================================
                                            Review Comment Section
                                            =================================
                                        -->
                                        <div class="review-comment-section">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-lg-12 col-xl-8">
                                                    <div class="reviews-title leave-opinion">
                                                        <h3>Leave your Opinion here</h3>
                                                    </div>
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="first" class="color-black">Name
                                                                        *</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="" id="first">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="last" class="color-black">Email
                                                                        *</label>
                                                                    <input type="email" class="form-control"
                                                                        placeholder="" id="last">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="last" class="color-green"></label>
                                                                    <textarea class="form-control col-md-12" id="exampleFormControlTextarea1" placeholder="Write your Opinion here ... "></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="last"
                                                                        class="color-green">Prons</label>
                                                                    <textarea class="form-control col-md-12" id="exampleFormControlTextarea1" placeholder="Write your Opinion here ... "></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea2wd"
                                                                        class="color-red">Cons</label>
                                                                    <textarea class="form-control col-12" id="exampleFormControlTextarea2wd" placeholder="Write your Opinion here ... "></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-md-12 product-rating-area">
                                                                <div class="product-rating-ph">
                                                                    <div class="rating-area">
                                                                        <div class="d-flex justify-content-between">
                                                                            <p>Camera</p>
                                                                            <div class="rating">
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-1"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-2"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-3"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-4"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-5"
                                                                                        aria-hidden="true"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="rating-slider-1 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                            <span tabindex="0"
                                                                                class="ui-slider-handle ui-corner-all ui-state-default"
                                                                                style="left: 0%;"></span></div>
                                                                    </div>
                                                                    <div class="rating-area">
                                                                        <div class="d-flex justify-content-between">
                                                                            <p>Video Quality</p>
                                                                            <div class="rating">
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-2-1"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-2-2"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-2-3"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-2-4"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-2-5"
                                                                                        aria-hidden="true"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="rating-slider-2 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                            <span tabindex="0"
                                                                                class="ui-slider-handle ui-corner-all ui-state-default"
                                                                                style="left: 0%;"></span></div>
                                                                    </div>
                                                                    <div class="rating-area">
                                                                        <div class="d-flex justify-content-between">
                                                                            <p>Box Quality</p>
                                                                            <div class="rating">
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-3-1"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-3-2"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-3-3"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-3-4"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-3-5"
                                                                                        aria-hidden="true"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="rating-slider-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                            <span tabindex="0"
                                                                                class="ui-slider-handle ui-corner-all ui-state-default"
                                                                                style="left: 0%;"></span></div>
                                                                    </div>
                                                                    <div class="rating-area">
                                                                        <div class="d-flex justify-content-between">
                                                                            <p>Video Quality</p>
                                                                            <div class="rating">
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-4-1"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-4-2"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-4-3"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-4-4"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-4-5"
                                                                                        aria-hidden="true"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="rating-slider-4 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                            <span tabindex="0"
                                                                                class="ui-slider-handle ui-corner-all ui-state-default"
                                                                                style="left: 0%;"></span></div>
                                                                    </div>
                                                                    <div class="rating-area">
                                                                        <div class="d-flex justify-content-between">
                                                                            <p>Box Quality</p>
                                                                            <div class="rating">
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-5-1"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-5-2"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-5-3"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-5-4"
                                                                                        aria-hidden="true"></i></a>
                                                                                <a href="#"><i
                                                                                        class="fa fa-star cat-5-5"
                                                                                        aria-hidden="true"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="rating-slider-5 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                            <span tabindex="0"
                                                                                class="ui-slider-handle ui-corner-all ui-state-default"
                                                                                style="left: 0%;"></span></div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <button type="submit"
                                                                    class="btn btn-primary review-comment"><i
                                                                        class="fa fa-check" aria-hidden="true"></i> Post
                                                                    Comment</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="col-12 col-md-12 col-lg-12 col-xl-4 product-rating-area">
                                                    <div class="product-rating-list product-rating-desktop">
                                                        <div class="rating-area">
                                                            <div class="d-flex justify-content-between">
                                                                <p>Camera</p>
                                                                <div class="rating">
                                                                    <a href="#"><i class="fa fa-star cat-1"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-2"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-3"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-4"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-5"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="rating-slider-1 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                <span tabindex="0"
                                                                    class="ui-slider-handle ui-corner-all ui-state-default"
                                                                    style="left: 0%;"></span></div>
                                                        </div>
                                                        <div class="rating-area">
                                                            <div class="d-flex justify-content-between">
                                                                <p>Video Quality</p>
                                                                <div class="rating">
                                                                    <a href="#"><i class="fa fa-star cat-2-1"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-2-2"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-2-3"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-2-4"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-2-5"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="rating-slider-2 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                <span tabindex="0"
                                                                    class="ui-slider-handle ui-corner-all ui-state-default"
                                                                    style="left: 0%;"></span></div>
                                                        </div>
                                                        <div class="rating-area">
                                                            <div class="d-flex justify-content-between">
                                                                <p>Box Quality</p>
                                                                <div class="rating">
                                                                    <a href="#"><i class="fa fa-star cat-3-1"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-3-2"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-3-3"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-3-4"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-3-5"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="rating-slider-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                <span tabindex="0"
                                                                    class="ui-slider-handle ui-corner-all ui-state-default"
                                                                    style="left: 0%;"></span></div>
                                                        </div>
                                                        <div class="rating-area">
                                                            <div class="d-flex justify-content-between">
                                                                <p>Video Quality</p>
                                                                <div class="rating">
                                                                    <a href="#"><i class="fa fa-star cat-4-1"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-4-2"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-4-3"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-4-4"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-4-5"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="rating-slider-4 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                <span tabindex="0"
                                                                    class="ui-slider-handle ui-corner-all ui-state-default"
                                                                    style="left: 0%;"></span></div>
                                                        </div>
                                                        <div class="rating-area">
                                                            <div class="d-flex justify-content-between">
                                                                <p>Box Quality</p>
                                                                <div class="rating">
                                                                    <a href="#"><i class="fa fa-star cat-5-1"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-5-2"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-5-3"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-5-4"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-star cat-5-5"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="rating-slider-5 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                <span tabindex="0"
                                                                    class="ui-slider-handle ui-corner-all ui-state-default"
                                                                    style="left: 0%;"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane specifiction-section" id="specifiction" style="display: none;">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <h2 class="specifiction-title">Specifiction</h2>
                                    <ul class="list-group specifiction-list">
                                        <li class="list-group-item">Brand Name : <span>Asus</span></li>
                                        <li class="list-group-item">Google Play: <span>Yes</span></li>
                                        <li class="list-group-item">Talk Time: <span>4-6h</span></li>
                                        <li class="list-group-item">Size: <span>154.6x75.2x8.35mm</span></li>
                                        <li class="list-group-item">Feature: <span>Gravity Response,MP3
                                                Playback,Touchscreen,GPS</span></li>
                                        <li class="list-group-item">CPU: <span>Octa Core</span></li>
                                        <li class="list-group-item">ROM: <span>16G</span></li>
                                        <li class="list-group-item">Release Date : <span>2018</span></li>
                                        <li class="list-group-item">Unlock Phones: <span>Yes</span></li>
                                        <li class="list-group-item">Battery Type: <span>Not Detachable</span></li>
                                        <li class="list-group-item">Display Resolution: <span>1920x1080</span></li>
                                        <li class="list-group-item">Battery Capacity(mAh): <span>4000mAh</span></li>
                                        <li class="list-group-item">CPU Manufacturer: <span>Qualcomm</span></li>
                                        <li class="list-group-item">SlotsDesign: <span>Bar</span></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-md-7 price-history-section">
                                    <h2 class="price-history-title">Price History</h2>
                                    <p class="price-history-subtitle">Percent Change In Price</p>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-12 col-xl-4 price-history-box">
                                                <div class="row price-box">
                                                    <div class="col-5 col-lg-2 col-xl-5 p0">
                                                        <div class="wd-since-month"><canvas width="125"
                                                                height="125"
                                                                style="height: 100px; width: 100px;"></canvas><canvas
                                                                width="100" height="100"></canvas><strong
                                                                class="total-price">52%</strong></div>
                                                    </div>
                                                    <div class="col-7 col-lg-6 col-lg-7 p0">
                                                        <div class="main-price">
                                                            <strong>52.06%</strong>
                                                            <p class="since-price">Since Last Month</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-12 col-xl-4 price-history-box">
                                                <div class="row price-box">
                                                    <div class="col-5 col-lg-2 col-xl-5 p0">
                                                        <div class="wd-since-day"><canvas width="125"
                                                                height="125"
                                                                style="height: 100px; width: 100px;"></canvas><canvas
                                                                width="100" height="100"></canvas><strong
                                                                class="total-price">10%</strong></div>
                                                    </div>
                                                    <div class="col-7 col-lg-6 col-lg-7 p0">
                                                        <div class="main-price">
                                                            <strong>20.31%</strong>
                                                            <p class="since-price">Last 10 Days</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-12 col-xl-4 price-history-box">
                                                <div class="row price-box">
                                                    <div class="col-5 col-lg-2 col-xl-5 p0">
                                                        <div class="wd-since-year"><canvas width="125"
                                                                height="125"
                                                                style="height: 100px; width: 100px;"></canvas><canvas
                                                                width="100" height="100"></canvas><strong
                                                                class="total-price">25%</strong></div>
                                                    </div>
                                                    <div class="col-7 col-lg-6 col-lg-7 p0">
                                                        <div class="main-price">
                                                            <strong>25.26%</strong>
                                                            <p class="since-price">Since Last Month</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 tab-chart-bord">
                                        <h2 class="tab-chart-bord-title">Price Change In Chart</h2>
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="active" id="pills-amazon-tab" data-toggle="pill"
                                                    href="#pills-amazon" role="tab" aria-controls="pills-amazon"
                                                    aria-expanded="true">
                                                    <i class="fa fa-circle" aria-hidden="true"></i><img
                                                        src="img/client/tab-img-1.png" alt="">
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                                    role="tab" aria-controls="pills-profile" aria-expanded="true">
                                                    <i class="fa fa-circle" aria-hidden="true"></i><img
                                                        src="img/client/tab-img-2.png" alt="">
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a id="pills-snapdeal-tab" data-toggle="pill" href="#pills-snapdeal"
                                                    role="tab" aria-controls="pills-snapdeal"
                                                    aria-expanded="true">
                                                    <i class="fa fa-circle" aria-hidden="true"></i><img
                                                        src="img/client/tab-img-3.png" alt="">
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a id="pills-ebay-tab" data-toggle="pill" href="#pills-ebay"
                                                    role="tab" aria-controls="pills-ebay" aria-expanded="true">
                                                    <i class="fa fa-circle" aria-hidden="true"></i><img
                                                        src="img/client/tab-img-4.png" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-amazon" role="tabpanel"
                                                aria-labelledby="pills-amazon-tab">
                                                <img class="img-fluid" src="img/client/chart-bord-1.png"
                                                    alt="chart-bord">
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                aria-labelledby="pills-profile-tab">
                                                <img class="img-fluid" src="img/client/chart-bord-2.png"
                                                    alt="chart-bord">
                                            </div>
                                            <div class="tab-pane fade" id="pills-snapdeal" role="tabpanel"
                                                aria-labelledby="pills-snapdeal-tab">
                                                <img class="img-fluid" src="img/client/chart-bord-3.png"
                                                    alt="chart-bord">
                                            </div>
                                            <div class="tab-pane fade" id="pills-ebay" role="tabpanel"
                                                aria-labelledby="pills-ebay-tab">
                                                <img class="img-fluid" src="img/client/chart-bord-4.png"
                                                    alt="chart-bord">
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
@endsection

@push('js')

<script>
    $(document).ready(funtion(e){
        loadreview();
    });
    function loadreview(){

    }
</script>

@endpush
