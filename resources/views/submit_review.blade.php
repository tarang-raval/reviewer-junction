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
        .dropzone{
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
                            @if (!empty(Session::get('error')))
                                <button class="alert alert-danger">{{ Session::get('error') }}</button>
                            @endif

                            <form id="reviewForm" method="post" action="{{ route('submit.review.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab" id="step1">
                                            <div class="form-group">
                                                <label for="categories">Category</label>
                                                <select class="form-control select2" data-size="5" name="category"
                                                    id="category" data-live-search="true">
                                                    <option value="">-- select Category --</option>
                                                    @forelse ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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

                                        </div>
                                        <div class="tab" id="step2">
                                            <div class="form-group">

                                                <label for="type ofpurchase">How do you purchase Product ?</label>
                                                <input class="" type="radio" name="type_of_purchase" value="online"
                                                    checked> Online
                                                <input class="" type="radio" name="type_of_purchase"
                                                    value="Offline"> Offline
                                            </div>
                                            <div id="online">
                                                <div class="form-group">
                                                    <label>Website Name</label>
                                                    <input type="text" name="website" class="form-control">
                                                </div>

                                            </div>
                                            <div id="offline" style="display: none">
                                                <div class="form-group">
                                                    <label>Shop Name</label>
                                                    <input type="text" name="shop_name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="address_line1" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="address_line2" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>city</label>
                                                    <input type="text" name="city" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" name="state" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Pincode</label>
                                                    <input type="text" name="pincode" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab" id="step3">
                                            <div class="form-group">

                                                <div class="rating-market-section d-flex justify-content-center ">
                                                    <div class="rating-star" style="position:relative">
                                                        <div class="review-rating"></div>
                                                        <input type="text" name="rating" class="rating-number2 m-0"
                                                            readonly>
                                                    </div>


                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label>Your Opnion</label>
                                                <textarea class="form-control" name="review_text"></textarea>
                                                <span id="review_text_error" class="invalid-feedback"
                                                    style="display: block !important;"></span>
                                                <div class="d-flex justify-content-between">
                                                    <span class="form-text text-muted">Minimum Character Required <span id="minchar">70</span></span>
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
                                                                    <div class="progress-bar bg-primary"
                                                                        role="progressbar" aria-valuemin="0"
                                                                        aria-valuemax="100" aria-valuenow="0"
                                                                        data-dz-uploadprogress>
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
                                            <input type="hidden"  name="filesNameList" id="uploadimage" value="">
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
                                                <button type="button" id="prevBtn" class="btn btn-primary btn-theme"
                                                    onclick="nextPrev(-1)">Previous</button>
                                                <button type="button" id="nextBtn" class="btn btn-primary btn-theme"
                                                    onclick="nextPrev(1)">Next</button>
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
        const siteSetting= JSON.parse('{!! $sitesetting !!}')
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
                text = text.replace(/[\s]/,'');
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
            }else if (text.length < siteSetting.minium_review_character) {
                $('#review_text_error').html('Minimum '+siteSetting.minium_review_character+' Character Required ');
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
                    remote: {
                        url: "/checkAlreadyReview",
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            product_id: function() {
                                return $("#product").val();
                            },
                            user_id: function() {
                                return AuthUser;
                            }
                        }
                    }
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
                fetch('/checkAlreadyReview', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify({
                        product_id: $('#product').val(),
                        user_id: AuthUser
                    })
                }).then((response) => response.json()).then(resposne => {
                    if (resposne) {
                        form.submit();
                    }
                });
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
                            $('#subcategory').selectpicker('refresh');

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
                            $('#product').selectpicker('refresh');

                        }
                    }


                })



            }
        });


    </script>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
        const serializeRemove = function(thisArray, thisName) {
            "use strict";
            return thisArray.filter(function(item) {
                return item.name != thisName;
            });
        }

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (!validateForm()) return false;

            if (n > 0 && currentTab == x.length - 1) {
                // ... the form gets submitted:
                if ($('#reviewForm').valid()) {
                    debugger;
                    for (instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].updateElement();
                    }

                    if (AuthUser == null || AuthUser == '') {

                        // let data=$('#reviewForm').serializeArray();
                        // data=serializeRemove(data,'_token');
                        $.ajax({
                            "url": "/submit/review/store",
                            'method': "POST",
                            data: $('#reviewForm').serializeArray(),
                            success: function(response) {
                                if (response.status) {
                                    sessionStorage.setItem('reviewformID', response.guestID);
                                    //location.assign('/myaccount');
                                    $('#myaccount').trigger('click');
                                } else {
                                    ToastError(response.message);
                                }
                            }
                        });


                        return false;
                    } else {
                        document.getElementById("reviewForm").submit();
                    }
                }
                return false;
            }
            if (n == 0 && !checkalreadyreview()) {
                alert('you have already added review for the product');
                return false
            }
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...


            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = false;
            var x = document.getElementsByClassName("tab");
            /* x = document.getElementsByClassName("tab");
             // y = x[currentTab].getElementsByTagName("input");
              y = x[currentTab].getElementsByTagName("select");
              // A loop that checks every input field in the current tab:
              for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                  // add an "invalid" class to the field:
                  y[i].className += " invalid";
                  // and set the current valid status to false
                  valid = false;
                }
              } */
            $('#reviewForm').validate().settings.ignore = ":disabled,:hidden";

            if (currentTab == x.length - 1) {
                valid = $('#reviewForm').valid() && validatereviewtext();
            } else {
                valid = $('#reviewForm').valid();
            }
            // valid=true;
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }



        // set the dropzone container id
        let uploadArray=[];
        const id = "#dropzonejs";
        const dropzone = document.querySelector(id);

        // set the preview element template
        var previewNode = dropzone.querySelector(".dropzone-item");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone(id, { // Make the whole body a dropzone
            url: "/upload/media", // Set the url for your upload script location
            headers: {
							  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							  },
            parallelUploads: 2,
            maxFiles: 5,
            maxFilesize: 1, // Max filesize in MB
            previewTemplate: previewTemplate,
            addRemoveLinks:true,
            acceptedFiles: ".jpeg,.jpg,.png,.mp4",
            previewsContainer: id + " .dropzone-items", // Define the container to display the previews
            clickable: id +
                " .dropzone-select" // Define the element that should be used as click trigger to select files.
        });

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            const dropzoneItems = dropzone.querySelectorAll('.dropzone-item');
            dropzoneItems.forEach(dropzoneItem => {
                dropzoneItem.style.display = '';
            });
        });

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            const progressBars = dropzone.querySelectorAll('.progress-bar');
            progressBars.forEach(progressBar => {
                progressBar.style.width = progress + "%";
            });
        });

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            const progressBars = dropzone.querySelectorAll('.progress-bar');
            progressBars.forEach(progressBar => {
                progressBar.style.opacity = "1";
            });
        });

        // Hide the total progress bar when nothing"s uploading anymore
        myDropzone.on("complete", function(progress) {
            const progressBars = dropzone.querySelectorAll('.dz-complete');

            setTimeout(function() {
                progressBars.forEach(progressBar => {
                    progressBar.querySelector('.progress-bar').style.opacity = "0";
                    progressBar.querySelector('.progress').style.opacity = "0";
                });
            }, 300);
        });
        myDropzone.on("success", function (file, response)  {


            if(response.status){
                uploadArray.push(response.fileName);
                    $('#uploadimage').val(JSON.stringify(uploadArray));
                    $('.dz-remove').last() .attr('id',response.fileName);
            }

        });
        myDropzone.on("removedfile", function (file)  {

           // let response = JSON.parse(responseText);

                let idfile = file._removeLink.id
                let index = uploadArray.find((val) => val == idfile);
                if(index > -1){
                    uploadArray.splice(index, 1);
                    $('#uploadimage').val(JSON.stringify(uploadArray));
                }
           $.ajax({
                type: 'POST',
                url: "/upload/media/remove", // Set the url for your upload script location
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                data: {name: idfile},
                sucess: function(data){

                }
            });

        });
    </script>
@endpush
