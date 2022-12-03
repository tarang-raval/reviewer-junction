@extends('layouts.master')


@section('content')
<section class="product-details">
    <div class="container">
        <div class="row">
            <div class="col-12 p0">
                <div class="page-location">
                    <ul>
                        <li><a href="#">
                                Home / <span class="divider">/</span>
                            </a></li>
                        <li><a class="page-location-active" href="#">
                                {{ $product->product_name }}
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
                                <ul id="lightSlider">
                                    @php
                                    $productimg_list = (!empty($product->gallery_image))?json_decode($product->gallery_image,true):[];

                                    @endphp
                                    @forelse($productimg_list as $img)
                                    <li data-thumb="{{asset('storage/product/'.$img)}}">
                                        <img class="figure-img img-fluid" src="{{asset('storage/product/'.$img)}}" alt="{{$product->product_name}}" />
                                    </li>
                                    @empty
                                    <li data-thumb="{{asset('asset/img/product-img/product-description-1.jpg')}}">
                                        <img class="figure-img img-fluid" src="{{asset('asset/img/product-img/product-description-1.jpg')}}" alt="product-img" />
                                    </li>
                                    @endforelse

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-12 col-md-12 col-lg-6">
                        <div class="product-details-gallery">
                            <div class="list-group">
                                <h4 class="list-group-item-heading product-title">
                                    {{ $product->product_name }}
                                </h4>
                                <div class="media d-none">
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
                                        <p class="d-none">3.7/5 <span class="product-ratings-text"> -1747
                                                Ratings</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group content-list">

                                {!! $product->short_description !!}

                            </div>
                        </div>
                        <div class="product-store row">
                            <div class="col-12 product-store-box">
                                <div class="row">
                                    <div class="col-3 p0 store-border-img">

                                    </div>
                                    <div class="col-5 store-border-price text-center">
                                        <div class="price">
                                            <p>{!! (!empty($product->discount_price)?(number_format($product->discount_price,2).'<br /><del>'.number_format($product->price,2)).'</del>':number_format($product->price,2)) !!}</p>
                                        </div>
                                    </div>
                                    <div class="col-4 store-border-button">
                                        <a href="https://www.amazon.com/" target="_blank" class="btn btn-primary wd-shop-btn pull-right">
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

                    </ul>

                    <div class="tab-pane" id="description-section">
                        {!! $product->full_description !!}
                    </div>
                    <div class="tab-pane" id="full-specifiction">
                        <h6>Full Specifiction</h6>
                        <br>
                        <ul class="list-group wd-info-section">
                            @if ($product->productAttributes)
                            @forelse ($product->productAttributes as $productAttributes)
                            <li class="list-group-item d-flex justify-content-between align-items-center p0">
                                <div class="col-12 col-md-6 info-section">
                                    <p>{{ $productAttributes->attribute_name }}
                                        :{{ $productAttributes->attribute_value }} </p>

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
                                                    <div class="progress-bar wd-bg-green" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media rating-star-area">
                                            <p>4 <i class="fa fa-star" aria-hidden="true"></i></p>
                                            <div class="media-body rating-bar">
                                                <div class="progress wd-progress">
                                                    <div class="progress-bar wd-bg-green" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media rating-star-area">
                                            <p>3 <i class="fa fa-star" aria-hidden="true"></i></p>
                                            <div class="media-body rating-bar">
                                                <div class="progress wd-progress">
                                                    <div class="progress-bar wd-bg-green" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media rating-star-area">
                                            <p>2 <i class="fa fa-star" aria-hidden="true"></i></p>
                                            <div class="media-body rating-bar">
                                                <div class="progress wd-progress">
                                                    <div class="progress-bar wd-bg-yellow" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media rating-star-area">
                                            <p>1 <i class="fa fa-star" aria-hidden="true"></i></p>
                                            <div class="media-body rating-bar">
                                                <div class="progress wd-progress">
                                                    <div class="progress-bar wd-bg-red" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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

                                        <div class="col-12 col-lg-6 text-right  ">
                                            <div class="filter">
                                                <div class="btn-group d-none" role="group">
                                                    <div class="d-flex">
                                                        <p>View as:</p>
                                                        <button id="btnGroupDropwdreview" type="button" class="btn btn-secondary dropdown-toggle filter-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Latest
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="btnGroupDropwdreview" style="position: absolute; transform: translate3d(50px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a class="dropdown-item" href="#">Oldest First</a>
                                                            <a class="dropdown-item" href="#">Higest Ratetd</a>
                                                            <a class="dropdown-item" href="#">Lowest Ratetd</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{route('submit.review.product',[$product->id])}}"><button type="button" class="btn btn-warning ">Write A Review</button></a>
                                            </div>
                                        </div>

                                        <!-- =================================
                                                    Review Client Section
                                                    ================================= -->
                                        @if ($product->getReview->count() > 0)
                                        @foreach ($product->getReview->all() as $review)
                                        <div class="col-12 review-our-product-area">
                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="media">
                                                                <div class="media-left media-middle review-user">
                                                                    <a href="#">
                                                                        <img class="media-object rounded-circle" src="{{ asset('assets/img/profile.png') }}" alt="client-img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body ml-2">
                                                                    <h4 class="media-heading client-title">
                                                                        {{ $review->getUser->fullname() }}
                                                                    </h4>
                                                                  
                                                                    <div class="">
                                                                        <p class="review-date">
                                                                            {{ date('F d, Y', strtotime($review->created_at)) }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-12 py-4">
                                                                    {{ $review->review_text }}
                                                                </div>
                                                                @php
                                                                $files = json_decode($review->files, true);
                                                                @endphp
                                                                @if (!empty($files) && is_array($files))
                                                                <div class="row gallery">
                                                                    @forelse ($files as $f)
                                                                    @php
                                                                    echo $fextension = pathinfo($f,PATHINFO_EXTENSION);

                                                                    @endphp
                                                                    @switch($fextension)
                                                                    @case('jpeg')
                                                                    @case('jpg')
                                                                    @case('png')
                                                                    @case('gif')
                                                                    <a href="{{ asset('storage/review/' . $f) }}" class=" col-md-3 thumbnail" data-toggle="lightbox" data-gallery="gallery" class="col-md-2">
                                                                        <img src="{{ asset('storage/review/' . $f) }}" class="img-fluid rounded">
                                                                    </a>
                                                                    @break

                                                                    @case('mp4')
                                                                    <a href="{{ storage_path('public/review/' . $f) }}" class=" col-md-3 thumbnail" data-toggle="lightbox" data-gallery="gallery" class="col-md-2">
                                                                        <video>
                                                                            <source src="{{ storage_path('public/review/' . $f) }}">
                                                                        </video>
                                                                    </a>
                                                                    @break

                                                                    @default
                                                                    @endswitch

                                                                    @empty
                                                                    @endforelse


                                                                </div>
                                                            
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>





                                    </div>

                                    @endforeach
                                    @endif






                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane specifiction-section" id="specifiction" style="display: none;">
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
                        </div> --}}
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@push('js')
<script>
    $('.gallery>.thumbnail').on('click', function(e) {
        e.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
@endpush