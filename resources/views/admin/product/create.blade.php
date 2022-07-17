@extends('layouts.adminMaster')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if ($errors->any())
                <div class="alert alert-danger">
                   <ul>
                      @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                      @endforeach
                   </ul>

                </div>
                @endif
                <form id="productform" method="post" action="{{(isset($product) && !empty($product))?route('admin.product.update',$product->id):route('admin.product.store')}}">
                    @csrf
                    @if (isset($product) && !empty($product))
                    @method('PUT')
                    @endif
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">{{ (isset($product) && !empty($product))?'Edit':'Add'}} Product</h3>
                        <div>
                            <button type="submit" class="btn btn-primary">{{ (isset($product) && !empty($product))?'Update':'Save'}}</button>
                        <a href="{{route('admin.product.index')}}" class="btn btn-default">cancel</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> category</label>
                                    <select class="form-control select2" name="category" id="category">
                                        <option value="">Select Category</option>
                                        @forelse ($category as $cat)
                                            <option value="{{ $cat->id }}" {{ (isset($product) && !empty($product) && $product->category==$cat->id )?'selected':''}}>{{ $cat->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Subcategory</label>
                                    <select class="form-control select2" name="subcategory" id="subcategory">
                                        <option value="">Select Subcategory</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" id="product_name"  placeholder="Product Name" value="{{ (isset($product) && !empty($product) && isset($product->product_name))?$product->product_name:old('product_name')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" class="form-control" name="price" id="price" placeholder="" value="{{ (isset($product) && !empty($product) && isset($product->price))?$product->price:old('price')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Discount Price</label>
                                    <input type="number" class="form-control" name="discount_price" id="price" placeholder="" value="{{ (isset($product) && !empty($product) && isset($product->discount_price))?$product->discount_price:old('discount_price')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Affiliated Link</label>
                                    <input type="url" class="form-control" name="affliatedLink" id="affliatedLink" placeholder="" value="{{ (isset($product) && !empty($product) && isset($product->affliated_link))?$product->affliated_link:old('affliated_link')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Short Description</label>
                                    <textarea class="form-control summernote" name="short_description" id="short_description" rows="3">{{ (isset($product) && !empty($product) && isset($product->short_description))?$product->short_description:old('short_description')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h3>Attribute</h3>
                            <hr />

                            <div class="col-md-12 repeater">
                                <div data-repeater-list="attribute">
                                    @if(isset($product) && !empty($product))
                                    @if($product->productAttributes->count()>0)
                                    @forelse ($product->productAttributes as $attribute)
                                    <div data-repeater-item>

                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Attribute Name</label>
                                                    <input type="text" class="form-control" name="attribute_name" id=""
                                                        aria-describedby="helpId" placeholder="" value="{{$attribute->attribute_name}}" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Attribute Name</label>
                                                    <input type="text" class="form-control" name="attribute_value" id=""
                                                        aria-describedby="helpId" placeholder="" value="{{$attribute->attribute_value}}">
                                                </div>
                                            </div>
                                            <input type="hidden" name="attribute_id" value="{{$attribute->id}}">
                                            <div class="col-md-3 ">
                                                <input data-repeater-delete type="button" class="btn btn-danger mt-3"
                                                    value="Delete" />
                                                {{-- <button class="btn btn-danger mt-3">Delete</button> --}}
                                                {{-- <input data-repeater-create type="button"  class="btn btn-primary mt-3" value="Add"/> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Attribute Name</label>
                                                <input type="text" class="form-control" name="attribute_name" id=""
                                                    aria-describedby="helpId" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Attribute Name</label>
                                                <input type="text" class="form-control" name="attribute_value" id=""
                                                    aria-describedby="helpId" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <input data-repeater-delete type="button" class="btn btn-danger mt-3"
                                                value="Delete" />
                                            {{-- <button class="btn btn-danger mt-3">Delete</button> --}}
                                            {{-- <input data-repeater-create type="button"  class="btn btn-primary mt-3" value="Add"/> --}}
                                        </div>
                                    </div>
                                    @endforelse
                                    @else
                                    <div data-repeater-item>

                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Attribute Name</label>
                                                    <input type="text" class="form-control" name="attribute_name" id=""
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Attribute Name</label>
                                                    <input type="text" class="form-control" name="attribute_value" id=""
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                            </div>
                                            <input type="hidden" name="attribute_id" value="">
                                            <div class="col-md-3 ">
                                                <input data-repeater-delete type="button" class="btn btn-danger mt-3"
                                                    value="Delete" />
                                                {{-- <button class="btn btn-danger mt-3">Delete</button> --}}
                                                {{-- <input data-repeater-create type="button"  class="btn btn-primary mt-3" value="Add"/> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    @else
                                    <div data-repeater-item>

                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Attribute Name</label>
                                                    <input type="text" class="form-control" name="attribute_name" id=""
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Attribute Name</label>
                                                    <input type="text" class="form-control" name="attribute_value" id=""
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                            </div>
                                            <input type="hidden" name="attribute_id" value="{{$attribute->id}}">
                                            <div class="col-md-3 ">
                                                <input data-repeater-delete type="button" class="btn btn-danger mt-3"
                                                    value="Delete" />
                                                {{-- <button class="btn btn-danger mt-3">Delete</button> --}}
                                                {{-- <input data-repeater-create type="button"  class="btn btn-primary mt-3" value="Add"/> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endif




                                </div>
                                <input data-repeater-create type="button" class="btn btn-primary mt-3" value="Add" />
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control summernote" name="full_description" id="full_description" rows="3">{{ (isset($product) && !empty($product) && isset($product->short_description))?$product->short_description:old('short_description')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{route('admin.product.index')}}" class="btn btn-default">cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.1.1/jquery.repeater.min.js"
        integrity="sha512-rvjzx3C9dsanpeWTxqKAu5f2Ux/HJU0Jzbijr6PeQJdMqvJfYHPB/S8Fv2lE2Xh8StLPZ6dEyBQGYTma3lEv/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();

            $('#category').change(function(){
                     if($(this).val()!=""){

                            $.ajax({
                                    url:"{{route('admin.category.subcategory')}}",
                                    method:"POST",
                                    data:{'category_id':$(this).val()},
                            }).done(function(response){
                                $('#subcategory').html('');
                                $('#subcategory').append(`<option value="">Select Subcategory</options>`);
                                    if(response.length>0){
                                        for(let x  of response){
                                            $('#subcategory').append(`<option value="${x.id}">${x.name}</options>`);
                                        }

                                        $('#subcategory').val("{{ (isset($product) && !empty($product) && isset($product->sub_category))?$product->sub_category:old('sub_category')}}")
                                    }
                            })
                     }
            })

            $('.repeater').repeater({

                initEmpty: true,

                defaultValues: {
                    'attribute_name': '',
                    'attribute_value': ''
                },

                show: function() {
                    $(this).slideDown();
                },

                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },

                isFirstItemUndeletable: true
            });


            $('#productform').validate({
                rules: {
                    category: {required: true},
                    subcategory: {required: true},
                    product_name: {required: true},
                },
                messages: {
                    category: { required: "Please select category"},
                    subcategory: { required: "Please select sub category"},
                    product_name: { required: "Please enter product name"}
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
                }
            });
            $('#category').trigger('change');
        });
    </script>
@endpush
