@extends('layouts.master')
@push('css')
    <style>
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
    </style>
@endpush

@section('content')
    <section class="product-details">
        <div class="container">

            <div class="row">
                <div class="col-md-9 m-auto">
                    <div class="card">
                        <div class="card-header">
                            write Review
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Review </h5>
                                @if (!empty(Session::get('error')))
                                        <button class="alert alert-danger">{{Session::get('error')}}</button>
                                @endif
                            <form id="reviewForm" method="post" action="{{ route('submit.review.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="categories">Category</label>
                                    <select class="form-control select2" data-size="5" name="category" id="category" data-live-search="true" >
                                        <option value="">-- select Category --</option>
                                        @forelse ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="sub Category">Sub Category</label>
                                    <select class="form-control select2" name="subcategory" id="subcategory">
                                        <option value="">-- Select Sub Category --</option>

                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="sub Category ">Product</label>
                                    <select class="form-control select2" name="product" id="product">
                                        <option value="">-- Select Product --</option>

                                    </select>

                                </div>
                                <div class="form-group">

                                    <label for="type ofpurchase">How do you purchase Product ?</label>
                                    <input class="" type="radio" name="type_of_purchase" id="type_of_purchase"
                                        value="online" checked> Online
                                    <input class="" type="radio" name="type_of_purchase" id="type_of_purchase"
                                        value="Offline"> Offline
                                </div>
                                <div id="online" >
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
                                <h6>Your Review</h6>
                                <hr>
                                <div class="form-group">
                                    <label>Your Opnion</label>
                                    <textarea class="form-control" name="review_text"></textarea>
                                </div>
                                <div class="row d-none">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last" class="color-green">Prons</label>
                                            <textarea class="form-control col-md-12" id="exampleFormControlTextarea1" placeholder="Write your Opinion here ... "></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea2wd" class="color-red">Cons</label>
                                            <textarea class="form-control col-12 summernote" id="exampleFormControlTextarea2wd" placeholder="Write your Opinion here ... "></textarea>
                                            <div id="summernote"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                        <div class="rating-market-section d-flex justify-content-center ">
                                            <div class="rating-star " style="position:relative">
                                                <div class="review-rating"></div>
                                                <div class="rating-number m-0" style="position: absolute;
                                                top: -7px;
                                                left: 45px;" >0</div>
                                            </div>


                                        </div>
                                        <input type="hidden" name="rating">
                                </div>

                                <input type="submit" class="form-control" value="Submit Review">


                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('js')
    <script>
        $(function() {
            if(getCookie('requiredLogin')){
                $('#myaccount').trigger('click');
            }
            $('.review-rating').on('click',function(){
                let r=$('.review-rating').rateYo("rating");
                $('.rating-number').html(r);
                $('[name="rating"]').html(r);
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

        });
        $.validator.addMethod(
            "checkAlreadyReview",
            function(value, element, regexp) {
                let check=false;
                fetch('/checkAlreadyReview', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: JSON.stringify({product_id: value, user_id: AuthUser})
                    }).then((response)=>response.json()).then(resposne=>{ check=resposne.status});
                    console.log(check);
              return check;
            },
            "already review ."
          );
        $('#reviewForm').validate({
                rules:{
                    'category':{required:true},
                    'subcategory':{required:true},
                    'type_of_purchase':{required:true},
                    'review_text':{required:true},
                    'product':{required:true,
                                remote: {
                                url: "/checkAlreadyReview",
                                type: "POST",
                                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                                data: {
                                product_id: function() {
                                    return $( "#product" ).val();
                                },
                                user_id:function(){
                                    return  AuthUser;
                                }
                                }
                            }
                        },
                },
                messages:{
                    "product":{
                        'remmote':"product review already added"
                    }
                },
                errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                 $(element).removeClass('is-invalid');
            },
            submitHandler : function(form) {
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
                        body: JSON.stringify({product_id: $('#product').val() , user_id: AuthUser})
                    }).then((response)=>response.json()).then(resposne=>{ if(resposne){
                        form.submit();
                    }});
                }
        })
        $('#category').on('change',function(){

            if($(this).val()!=''){
                var url="{{route('getsubcategory')}}";

                $.ajax({
                    "url":url,
                    "method":"post",
                    data: {category_id:$(this).val()},
                    success: function(response) {
                        if (response.status) {
                                var str=`<option value="">-- Select Sub Category --</option>`;
                            for (const d of response.data) {
                                    str+=`<option value='${d.id}'>${d.name}</option>`;
                            }
                            $('#subcategory').html(str);
                            $('#subcategory').selectpicker('refresh');

                        }
                    }


                })



            }
        });
        $('#subcategory').on('change',function(){

            if($(this).val()!=''){
                var url="{{route('getproductbysubcategory')}}";

                $.ajax({
                    "url":url,
                    "method":"post",
                    data: {subcategory_id:$(this).val()},
                    success: function(response) {
                        if (response.status) {
                                var str=`<option value="">-- Select Product --</option>`;
                            for (const d of response.data) {
                                    str+=`<option value='${d.id}'>${d.name}</option>`;
                            }
                            $('#product').html(str);
                            $('#product').selectpicker('refresh');

                        }
                    }


                })



            }
        });

    </script>
@endpush
