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
                <form id="productform" method="post" action="{{(isset($product) && !empty($product))?route('admin.product.update',$product->id):route('admin.product.store')}}" enctype="multipart/form-data">
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
                                    @if(isset($product) && !empty($product->productAttributes->count()))
                                    @if($product->productAttributes->count()>0)
                                    @php

                                        @endphp

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
                                                        aria-describedby="helpId" placeholder="{{$attribute->declined}}" value="{{$attribute->attribute_value}}">
                                                </div>
                                            </div>
                                            <input type="hidden" name="attribute_id" value="{{(isset($attribute) && isset($attribute->id))?$attribute->id:''}}">
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Thubnail Image</label>
                                    <input type="file"  name="thumbnail_image" accept="image/*">
                                    @if (isset($product) && !empty($product) && isset($product->thumbnail_image))
                                    <div class="" style="width:150px">
                                    <img src="{{asset('storage/'.$product->thumbnail_image)}}" class="img-thumbnail" alt="product">
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Add gallery Image</label>
                            <!--begin::Dropzone-->
                            <div class="dropzone dropzone-queue mb-2 border-0" id="dropzonejs">
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
                                files is 7.</span>
                            <!--end::Hint-->
                        </div>
                        <input type="hidden"  name="filesNameList" id="uploadimage" value="{{ (isset($product) && !empty($product) && isset($product->gallery_image))?$product->gallery_image:old('gallery_image')}}">
                        @php
                        $files = json_decode((isset($product) && !empty($product) && isset($product->gallery_image))?$product->gallery_image:'[]', true);

                    @endphp
                    @if (!empty($files) && is_array($files))
                    <div class="row gallery">
                        @forelse ($files as $f)
                            @php
                                $fextension = pathinfo($f,PATHINFO_EXTENSION );

                            @endphp
                            @switch($fextension)
                                @case('jpeg')
                                @case('jpg')
                                @case('png')
                                @case('gif')
                                <div>
                                    <a href="{{ asset('storage/product/' . $f) }}"
                                        class=" col-md-3 thumbnail"
                                        data-toggle="lightbox"
                                        data-gallery="gallery"
                                        class="col-md-2" target="_blank">
                                        <img src="{{ asset('storage/product/' . $f) }}"
                                            class="img-fluid rounded">
                                            <a href="javascript:void(0)" data-filename="{{$f}}" data-product-id="{{$product->id}}" class="removeImg">remove</a>
                                    </a>
                                </div>
                                @break

                                @case('mp4')

                                <div>
                                    <a href="{{ asset('storage/product/' . $f) }}"
                                        class=" col-md-3 thumbnail"
                                        data-toggle="lightbox"
                                        data-gallery="gallery"
                                        class="col-md-2" target="_blank">
                                        <video>
                                            <source  src="{{ storage_path('storage/product/' . $f) }}">
                                        </video>
                                            <a href="javascript:void(0)" data-filename="{{$f}}" data-product-id="{{$product->id}}" class="removeImg">remove</a>
                                    </a>
                                </div>

                                @break

                                @default
                            @endswitch

                            @empty
                            @endforelse


                        </div>
                    </div>
                    @endif
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
         // set the dropzone container id
         let uploadArray={!! (isset($product) && !empty($product) && isset($product->gallery_image))?$product->gallery_image:'[]' !!};
        const id = "#dropzonejs";
        const dropzone = document.querySelector(id);

        // set the preview element template
        var previewNode = dropzone.querySelector(".dropzone-item");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone(id, { // Make the whole body a dropzone
            url: "/admin/upload/media", // Set the url for your upload script location
            headers: {
							  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							  },
            parallelUploads: 2,
            maxFiles: 7,
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
                url: "/admin/upload/media/remove", // Set the url for your upload script location
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                data: {name: idfile},
                sucess: function(data){

                }
            });

        });
        $('.removeImg').click(function(e){
                $element = $(this);
            let fileName=$(this).data('filename');
            let id=$(this).data('product-id');
            if(fileName!=undefined && fileName!=''){
                let idfile = fileName
                let index = uploadArray.findIndex((val) => val == idfile);
                if(index > -1){
                    uploadArray.splice(index, 1);
                    $('#uploadimage').val(JSON.stringify(uploadArray));
                    $(this).closest('div').remove();
                }
           $.ajax({
                type: 'POST',
                url: "/admin/upload/media/remove", // Set the url for your upload script location
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                data: {name: idfile,product_id:id,gallery_image:JSON.stringify(uploadArray)},
                sucess: function(data){

                }
            });
            }
        });
    </script>
@endpush
