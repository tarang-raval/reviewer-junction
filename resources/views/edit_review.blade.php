@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .dropzone .dz-message,
        .dropzone-remove-all {
            display: none;
        }

        .dropzone {
            border: none;
            padding: 0;
        }

        .stars {
            width: fit-content;
            margin: 0 auto;
            cursor: pointer;
        }

        .rate>i {
            color: #ff9800;
        }

        .star {
            color: #ff9800 !important;
        }

        .rate {
            height: 50px;
            margin-left: -5px;
            padding: 5px;
            font-size: 25px;
            position: relative;
            cursor: pointer;
        }

        .rate input[type="radio"] {
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, 0%);
            pointer-events: none;
        }

        .star-over::after {
            /*font-family: 'Font Awesome 5 Free';*/
            font-weight: 900;
            font-size: 16px;
            content: "\f005";
            display: inline-block;
            color: #ff9800;
            z-index: 1;
            position: absolute;
            top: 17px;
            left: 10px;
        }

        .rate:nth-child(1) .face::after {
            content: "\f119";
            /* ☹ */
        }

        .rate:nth-child(2) .face::after {
            content: "\f11a";
            /* 😐 */
        }

        .rate:nth-child(3) .face::after {
            content: "\f118";
            /* 🙂 */
        }

        .rate:nth-child(4) .face::after {
            content: "\f580";
            /* 😊 */
        }

        .rate:nth-child(5) .face::after {
            content: "\f59a";
            /* 😄 */
        }

        .face {
            opacity: 0;
            position: absolute;
            width: 35px;
            height: 35px;
            background: #ff9800;
            border-radius: 5px;
            top: -50px;
            left: 2px;
            transition: 0.2s;
            pointer-events: none;
        }

        .face::before {
            /* font-family: 'Font Awesome 5 Free'; */
            font-weight: 900;
            content: "\f0dd";
            display: inline-block;
            color: #ff9800;
            z-index: 1;
            position: absolute;
            left: 9px;
            bottom: -15px;
        }

        .face::after {
            /* font-family: 'Font Awesome 5 Free'; */
            font-weight: 900;
            display: inline-block;
            color: #fff;
            z-index: 1;
            position: absolute;
            left: 5px;
            top: -1px;
        }

        .rate:hover .face {
            opacity: 1;
        }

        #offline {
            display: none;
        }

        #regForm {
            background-color: #ffffff;
            margin: 100px auto;
            font-family: Raleway;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }

        h1 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /*
            button {
              background-color: #04AA6D;
              color: #ffffff;
              border: none;
              padding: 10px 20px;
              font-size: 17px;
              font-family: Raleway;
              cursor: pointer;
            }

            button:hover {
              opacity: 0.8;
            } */



        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }

        .rating-number2:focus {
            outline: none;
            border: none
        }

        .rating-number2 {
            min-width: 60px;
            position: absolute;
            top: -10px;
            left: 45px;
            border: none;
            padding: 0;
        }
    </style>
@endpush

@section('content')
    <section class="product-details">
        <div class="container">

            <div class="row">
                <div class="col-md-9 m-auto py-5">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Review </h5>

                            <form id="reviewForm" method="post" action="{{ route('submit.review.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{$review->id}}">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="categories">Category</label>
                                            <select class="form-control select2" data-size="5" name="category"
                                                id="category" data-live-search="true">
                                                <option value="">-- select Category --</option>
                                                @forelse ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ !empty($review) && $review->category_id == $category->id ? ' selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="sub Category">Sub Category</label>
                                            <select class="form-control select2" name="subcategory" id="subcategory"
                                                data-size="5" data-live-search="true">
                                                <option value="">-- Select Sub Category --</option>

                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="sub Category ">Product</label>
                                            <select class="form-control selectpicker" name="product" id="product"
                                                data-size="5" data-live-search="true">
                                                <option value="">-- Select Product --</option>
                                            </select>

                                        </div>



                                        <div class="form-group">

                                            <label for="type ofpurchase">How do you purchase Product ?</label>
                                            <input class="" type="radio" name="type_of_purchase" value="online"
                                                {{ !empty($review) && $review->type_of_purchase == 'online' ? ' checked' : '' }}>
                                            Online
                                            <input class="" type="radio" name="type_of_purchase" value="Offline"
                                                {{ !empty($review) && $review->type_of_purchase == 'Offline' ? ' checked' : '' }}>
                                            Offline
                                        </div>
                                        <div id="online">
                                            <div class="form-group">
                                                <label>Website Name</label>
                                                <input type="text" name="website" class="form-control"
                                                    value="{{ !empty($review) && $review->website ? $review->website : '' }}">
                                            </div>

                                        </div>
                                        <div id="offline" style="display: none">
                                            <div class="form-group">
                                                <label>Shop Name</label>
                                                <input type="text" name="shop_name" class="form-control"
                                                    value="{{ !empty($review) && $review->shop_name ? $review->shop_name : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Address Line 1</label>
                                                <input type="text" name="address_line1" class="form-control"
                                                    value="{{ !empty($review) && $review->address_line1 ? $review->address_line1 : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Address Line 2</label>
                                                <input type="text" name="address_line2" class="form-control"
                                                    value="{{ !empty($review) && $review->address_line2 ? $review->address_line2 : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label>city</label>
                                                <input type="text" name="city" class="form-control"
                                                    value="{{ !empty($review) && $review->city ? $review->city : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" name="state" class="form-control"
                                                    value="{{ !empty($review) && $review->state ? $review->state : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Pincode/Zip Code</label>
                                                <input type="text" name="pincode" class="form-control"
                                                    value="{{ !empty($review) && $review->pincode ? $review->pincode : '' }}">
                                            </div>

                                        </div>


                                        <div class="form-group">

                                            <div class="rating-market-section d-flex justify-content-center ">
                                                <div class="rating-star" style="position:relative">
                                                    <div class="review-rating"
                                                        data-rateyo-rating="{{ !empty($review) && !empty($review->rating) ? $review->rating : '0' }}">
                                                    </div>
                                                    <input type="text" name="rating" class="rating-number2 m-0"
                                                        value="{{ !empty($review) && $review->rating ? $review->rating : '' }}"
                                                        readonly>
                                                </div>


                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label>Your Opnion</label>
                                            <textarea class="form-control" name="review_text">{!! $review->review_text !!}</textarea>
                                            <span id="review_text_error" class="invalid-feedback"
                                                style="display: block !important;"></span>
                                            <div class="d-flex justify-content-between">
                                                <span class="form-text text-muted">Minimum Character Required <span
                                                        id="minchar">70</span></span>
                                                <span id="characterCount"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Add Media</label>
                                            <!--begin::Dropzone-->
                                            <div class="dropzone dropzone-queue mb-2 border-none" id="dropzonejs">
                                                <!--begin::Controls-->
                                                <div class="dropzone-panel mb-lg-0 mb-2">
                                                    <a class="dropzone-select btn btn-sm btn-primary me-2">Attach
                                                        files</a>
                                                    <a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove
                                                        All</a>
                                                </div>
                                                <!--end::Controls-->

                                                <!--begin::Items-->
                                                <div class="dropzone-items wm-200px">
                                                    <div class="dropzone-item" style="display:none">
                                                        <!--begin::File-->
                                                        <div class="dropzone-file">
                                                            <div class="dropzone-filename"
                                                                title="some_image_file_name.jpg">
                                                                <span data-dz-name>some_image_file_name.jpg</span>
                                                                <strong>(<span data-dz-size>340kb</span>)</strong>
                                                            </div>

                                                            <div class="dropzone-error" data-dz-errormessage></div>
                                                        </div>
                                                        <!--end::File-->

                                                        <!--begin::Progress-->
                                                        <div class="dropzone-progress">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-primary" role="progressbar"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    aria-valuenow="0" data-dz-uploadprogress>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Progress-->

                                                        <!--begin::Toolbar-->
                                                        <div class="dropzone-toolbar">
                                                            <span class="dropzone-delete" data-dz-remove><i
                                                                    class="bi bi-x fs-1"></i></span>
                                                        </div>
                                                        <!--end::Toolbar-->
                                                    </div>
                                                </div>
                                                <!--end::Items-->
                                            </div>
                                            <!--end::Dropzone-->

                                            <!--begin::Hint-->
                                            <span class="form-text text-muted">Max file size is 1MB and max number of
                                                files is 5.</span>
                                            <!--end::Hint-->
                                        </div>
                                        <div class="form-group ">
                                            <?php
                                            $filenamelist = !empty($review->files) ? json_decode($review->files, true) : [];
                                            ?>

                                            <div class="row tab-gallery">

                                                @forelse ($filenamelist as $file)
                                                    <?php
                                                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                                                    ?>
                                                    @switch($ext)
                                                        @case('jpg')
                                                        @case('png')

                                                        @case('gif')
                                                        @case('jpeg')
                                                            <div class="col-6 col-md-3">
                                                                <img class="figure-img img-fluid"
                                                                    src="{{ asset('storage/storage/public/review/' . $file) }}"
                                                                    alt="review">
                                                            </div>
                                                        @break

                                                        @default
                                                    @endswitch

                                                    @empty
                                                    @endforelse


                                                </div>
                                                @forelse ($filenamelist as $file)
                                                    <?php
                                                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                                                    ?>
                                                    @switch($ext)
                                                        @case('jpg')
                                                        @case('png')

                                                        @case('gif')
                                                        @case('jpeg')
                                                            <img src="{{ asset('storage/storage/public/review/' . $file) }}"
                                                                class="img-fluid rounded">
                                                        @break

                                                        @default
                                                    @endswitch
                                                    @empty
                                                    @endforelse
                                                </div>
                                                <input type="hidden" name="filesNameList" id="uploadimage"
                                                    value="{{ !empty($review) && $review->files ? implode(',', json_decode($review->files, true)) : '' }}">
                                                <div class="row d-none">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="last" class="color-green">Prons</label>
                                                            <textarea class="form-control col-md-12" id="exampleFormControlTextarea1" placeholder="Write your Opinion here ... "></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea2wd"
                                                                class="color-red">Cons</label>
                                                            <textarea class="form-control col-12 summernote" id="exampleFormControlTextarea2wd"
                                                                placeholder="Write your Opinion here ... "></textarea>
                                                            <div id="summernote"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <div style="float:right;">
                                                <button type="button"  class="btn btn-primary btn-theme"
                                                    >Cancel</button>
                                                <button type="submit" class="btn btn-primary btn-theme"
                                                    onclick="nextPrev(1)">Update</button>
                                            </div>
                                        </div>
                                        <!-- Circles which indicates the steps of the form: -->
                                        <div style="text-align:center;margin-top:40px;">
                                            <span class="step"></span>
                                            <span class="step"></span>
                                            <span class="step"></span>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                {{--   <form id="reviewForm" method="post" action="{{ route('submit.review.store') }}">
                                @csrf





                                <h6>Your Review</h6>
                                <hr>




                                <input type="submit" class="form-control" value="Submit Review">


                            </form> --}}

                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </section>
        @endsection

        @push('js')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"
                integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
            <script>
                const siteSetting = JSON.parse('{!! $sitesetting !!}')

                function check() {
                    return new Promise(resolve => {
                        fetch('/checkAlreadyReview', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            body: JSON.stringify({
                                product_id: $("#product").val(),
                                user_id: AuthUser
                            })
                        }).then((response) => response.json()).then(resposne => {
                            resolve(resposne.status);
                        });
                    });
                }
                async function checkalreadyreview() {
                    return await check();
                }

                $(function() {
                    CKEDITOR.replace('review_text');

                    if (getCookie('requiredLogin')) {
                        $('#myaccount').trigger('click');
                    }
                    $('.review-rating').on('click', function() {
                        let r = $('.review-rating').rateYo("rating");
                        $('.rating-number').val(r);
                        $('[name="rating"]').val(r);
                    })
                    $(document).on({
                        mouseover: function(event) {
                            $(this).find('.fa').addClass('star-over');
                            $(this).prevAll().find('.fa').addClass('active-color');
                        },
                        mouseleave: function(event) {
                            $(this).find('.fa').removeClass('star-over');
                            $(this).prevAll().find('.fa').removeClass('active-color');
                        }
                    }, '.rate');


                    $(document).on('click', '.rate', function() {
                        if (!$(this).find('.star').hasClass('rate-active')) {
                            $(this).siblings().find('.star').addClass('far').removeClass('fas rate-active');
                            $(this).find('.star').addClass('rate-active fas').removeClass('far star-over');
                            $(this).prevAll().find('.star').addClass('fas').removeClass('far star-over');
                        } else {
                            console.log('has');
                        }
                    });

                    $(document).on('click', '[name="type_of_purchase"]:checked', function() {

                        console.log($(this).val());
                        if ($(this).val() == 'Offline') {
                            $('#online').hide();
                            $('#offline').show();
                        } else {
                            $('#online').show();
                            $('#offline').hide();
                        }
                    });
                    $('#minchar').val(siteSetting.minium_review_character);
                    CKEDITOR.instances.review_text.on('change', function() {
                        CKEDITOR.instances.review_text.updateElement();

                        let text = stripHtml($('[name="review_text"]').val());
                        text = text.replace(/[\s]/, '');
                        console.log(text.length);
                        $('#characterCount').html(text.length);

                    });

                });
                $.validator.addMethod(
                    "checkAlreadyReview",
                    function(value, element, regexp) {
                        let check = false;
                        fetch('/checkAlreadyReview', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            body: JSON.stringify({
                                product_id: value,
                                user_id: AuthUser
                            })
                        }).then((response) => response.json()).then(resposne => {
                            check = resposne.status
                        });
                        console.log(check);
                        return check;
                    },
                    "already review ."
                );

                function validatereviewtext() {
                    CKEDITOR.instances.review_text.updateElement();

                    let text = stripHtml($('[name="review_text"]').val());
                    if (text == "") {
                        $('#review_text_error').html('Please enter the review');
                        return false;
                    } else if (text.length < siteSetting.minium_review_character) {
                        $('#review_text_error').html('Minimum ' + siteSetting.minium_review_character + ' Character Required ');
                        return false;
                    } else {
                        return true;
                    }

                }
                $('#reviewForm').validate({
                    ignore: [],
                    rules: {
                        'category': {
                            required: true
                        },
                        'subcategory': {
                            required: true
                        },
                        'type_of_purchase': {
                            required: true
                        },
                        'website': {
                            required: function(element) {

                                return $('[name="type_of_purchase"]:checked').length > 0 && $(
                                        '[name="type_of_purchase"]:checked')
                                    .val() == "online" && element.value == "";
                            },
                            url: true
                        },
                        'shop_name': {
                            required: function(element) {
                                return $('[name="type_of_purchase"]:checked').length > 0 && $(
                                        '[name="type_of_purchase"]:checked')
                                    .val() == "Offline" && element.value == '';
                            }
                        },
                        'address_line1': {
                            required: function(element) {
                                return $('[name="type_of_purchase"]:checked').length > 0 && $(
                                        '[name="type_of_purchase"]:checked')
                                    .val() == "Offline" && element.value == '';
                            }
                        },
                        'city': {
                            required: function(element) {
                                return $('[name="type_of_purchase"]:checked').length > 0 && $(
                                        '[name="type_of_purchase"]:checked')
                                    .val() == "Offline" && element.value == '';
                            }
                        },
                        'state': {
                            required: function(element) {
                                return $('[name="type_of_purchase"]:checked').length > 0 && $(
                                        '[name="type_of_purchase"]:checked')
                                    .val() == "Offline" && element.value == '';
                            }
                        },
                        'pincode': {
                            required: function(element) {
                                return $('[name="type_of_purchase"]:checked').length > 0 && $(
                                        '[name="type_of_purchase"]:checked')
                                    .val() == "Offline" && element.value == '';
                            }
                        },
                        'country': {
                            required: function(element) {
                                return $('[name="type_of_purchase"]:checked').length > 0 && $(
                                        '[name="type_of_purchase"]:checked')
                                    .val() == "Offline" && element.value == '';
                            }
                        },

                        'rating': {
                            required: true
                        },

                        'product': {
                            required: true,

                        },
                    },
                    messages: {
                        "product": {
                            'remote': "product review already added"
                        }
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    },
                    submitHandler: function(form) {
                        //do something here
                        /*   if(AuthUser==null || AuthUser=='undefined' || AuthUser=="" ){

                              localStorage.setItem('review', $(form).serialize());

                              $('#myaccount').trigger('click');
                              return false;

                          }else{ */
                        // form.submit();

                        /* } */
                        form.submit();
                    }
                })
                $('#category').on('change', function() {

                    if ($(this).val() != '') {
                        var url = "{{ route('getsubcategory') }}";

                        $.ajax({
                            "url": url,
                            "method": "post",
                            data: {
                                category_id: $(this).val()
                            },
                            success: function(response) {
                                if (response.status) {
                                    var str = `<option value="">-- Select Sub Category --</option>`;
                                    for (const d of response.data) {
                                        str += `<option value='${d.id}'>${d.name}</option>`;
                                    }
                                    $('#subcategory').html(str);
                                    $('#subcategory').val('<?php echo $review->subcategory_id; ?>');
                                    $('#subcategory').selectpicker('refresh');
                                    $('#subcategory').trigger('change');

                                }
                            }


                        })



                    }
                });
                $('#subcategory').on('change', function() {

                    if ($(this).val() != '') {
                        var url = "{{ route('getproductbysubcategory') }}";

                        $.ajax({
                            "url": url,
                            "method": "post",
                            data: {
                                subcategory_id: $(this).val()
                            },
                            success: function(response) {
                                if (response.status) {
                                    var str = `<option value="">-- Select Product --</option>`;
                                    for (const d of response.data) {
                                        str +=
                                            `<option value='${d.id}' data-thumbnail="/images/no-image.png" >${d.name}</option>`;
                                    }
                                    $('#product').html(str);
                                    $('#product').val('<?php echo $review->product_id; ?>');
                                    $('#product').selectpicker('refresh');

                                }
                            }


                        })



                    }
                });

                $(document).ready(function() {
                    $('#category').trigger('change');
                    $('[name="type_of_purchase"]:checked').trigger('click');
                    $('#review-rating').trigger('click');
                })
            </script>
        @endpush
