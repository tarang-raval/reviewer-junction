@extends('layouts.adminMaster')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Category</h3>

                    <button class="btn  btn-outline-primary" id="newCategory">Add Category</button>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="categorylist" class="table table-bordered table-hover">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addCategoryModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="Addcategory" method="post">
                    <div class="modal-body">
                        @method('POST')

                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">

                            <input type="file" class="form-control" id="filename" name="category_image"  accept=".jpg,.png">
                            <small>only allow to jpg,png</small>
                        </div>
                        <input type="hidden" name="id" id="id" value="">
                        {{-- <div class="form-group">
                            <label for="exampleInputFile">Icon Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                    <div class="modal-footer flex-end">
                        <button type="submit" class="btn btn-primary" id="add_category">Add</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection

@push('js')
    <script>
        const categorylist = $('#categorylist').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            order: [0, 'desc'],

            "ajax": {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": '{{ route('admin.category.datatable') }}',
                'method': "POST"
            },
            columns: [{
                    data: "name",
                    title: "Name"
                },
                {
                    data: "action",
                    title: "Action",
                    orderable: false,
                    width: '100px'
                },

            ],
            drawCallback: function(settings) {
                $('[data-toggle="tooltip"]').tooltip()
            }

        });


        function checkunique() {
            return promise = new Promise(function(resolve, reject) {

                $.ajax({
                    url: "{{ route('admin.category.unique.check') }}",
                    method: "POST",
                    data: {
                        'category_name': $('input[name="name"]').val(),
                        'id': $('input[name="id"]').val(),
                    },
                    success: function(result) {
                        resolve(true)
                    },
                    error: function() {
                        reject(false);
                    }
                });
            });
            promise.then(function() {
                console.log();
            });
        }

        $('#Addcategory').validate({
            rules: {
                name: {
                    required: true,
                    remote: {
                        url: "{{ route('admin.category.unique.check') }}",
                        type: "post",
                        data: {
                            category_name: function() {
                                return $('input[name="name"]').val();
                            },
                            id: function() {
                                return $('input[name="id"]').val();
                            },

                        }
                    }
                },
                category_image: {
                                required: false,
                                accept:"image/png,image/jpg,image/jpeg"
                                }
            },
            messages: {
                name: {
                    required: "Please enter a category name",
                },
                category_image: {

                                accept: " Please Select only .jpg and .png file"
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
            }
        });

        $(function() {
            $('#addCategoryModal').modal({
                keyboard: false,
                backdrop: 'static',
                show: false
            })

            $('#add_category').on('click', function(e) {
                e.preventDefault();

                if ($('#Addcategory').valid()) {
                    var form = document.querySelector('#Addcategory');
                    var formData = new FormData(form);
                    let id = $('#addCategoryModal #id').val();
                    let updateurl = "{{ route('admin.category.update', ':id') }}";
                    updateurl = updateurl.replace(':id', id);
                    $.ajax({
                        "url": ((id == '' && id != "undefined") ?
                            '{{ route('admin.category.store') }}' : updateurl),
                        'method': "POST",
                        contentType: false,
                         processData: false,
                        data: formData,
                        success: function(response) {
                            if (response.status) {
                                ToastSuccess(response.message);
                                $('#addCategoryModal').modal('hide');
                                $('#Addcategory').get(0).reset();
                                categorylist.ajax.reload();
                            } else {
                                ToastError(response.message);
                                $('#addCategoryModal').modal('hide');
                            }
                        }
                    });

                }


            });

            $('#categorylist tbody').on('click', 'tr>td>.edit', function() {

                data = categorylist.row(this.closest('tr')).data();
                $('#addCategoryModal .modal-title').html('Edit Category');
                $('#addCategoryModal input[name="_method"]').val('PUT');
                $('#addCategoryModal #name').val(data.name);
                $('#addCategoryModal #id').val(data.id);
                $('#addCategoryModal #add_category').html('Update');
                $('#addCategoryModal').modal('show');


            });
            // oprn model

            $('#newCategory').on('click', function() {
                $('#addCategoryModal .modal-title').html('Add Category');
                $('#addCategoryModal input[name="_method"]').val('POST');
                $('#addCategoryModal #name').val('');
                $('#addCategoryModal #id').val('');
                $('#addCategoryModal #add_category').html('Add');
                $('#Addcategory').get(0).reset();
                $('#addCategoryModal').modal('show');
            })


        });

        function deleterow(id) {

            Swal.fire({
                title: 'Are you sure want to delete category?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    //
                    let deleteurl = "{{ route('admin.category.destroy', ':id') }}";
                    deleteurl = deleteurl.replace(':id', id);
                    $.ajax({
                        "url": deleteurl,
                        'method': "POST",
                        data: {
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status) {
                                ToastSuccess(response.message);
                                $('#addCategoryModal').modal('hide');
                                categorylist.ajax.reload();

                            } else {
                                ToastError(response.message);

                            }
                        }
                    });

                }
            })
        }
    </script>
@endpush
