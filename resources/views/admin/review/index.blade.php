@extends('layouts.adminMaster')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Review</h3>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="reviewlist" class="table table-bordered table-hover">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteReviewModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Decline </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="declinedreasonForm">
                <input type="hidden" name="id" id="review_id">
                <input type="hidden" name="status" value="2" id="status">
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Reason:</label>
                  <textarea class="form-control" name="declined_reason" id="reason"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="declinedbtn">Declined</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('js')
    <script>
        const reviewlist = $('#reviewlist').DataTable({
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
                "url": '{{ route('admin.review.datatable') }}',
                'method': "POST"
            },
            columns: [{
                    data: "category_name",
                    title: "Category Name"
                },
                {
                    data: "subcategory_name",
                    title: "Subcategory Name"
                },
                {
                    data: "product_name",
                    title: "Product Name"
                },
                {
                    data: "type_of_purchase",
                    title: "Online/Offline"
                },
                {
                    data: "website",
                    title: "website/shop"
                },
                {
                    data: "created_at",
                    title: "Created"
                },
                {
                    data: "status_txt",
                    title: "Status"
                },
                {
                    data: "declined_reason",
                    title: "Reason"
                },
                {
                    data: "action",
                    title: "Action",
                    orderable: false,
                    width: '100px'
                },

            ],
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            drawCallback: function(settings) {
                $('[data-toggle="tooltip"]').tooltip()
            }

        });
        $('#declinedreasonForm').validate({
            rules: {
                "declined_reason" : {required:true},
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
        })

        function checkunique() {
            return promise = new Promise(function(resolve, reject) {

                $.ajax({
                    url: "{{ route('admin.subcategory.unique.check') }}",
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

        $('#Addsubcategory').validate({
            rules: {
                'category': {
                    required: true
                },
                name: {
                    required: true,
                    remote: {
                        url: "{{ route('admin.subcategory.unique.check') }}",
                        type: "post",
                        data: {
                            sub_category_name: function() {
                                return $('input[name="name"]').val();
                            },

                            category: function() {
                                return $('select[name="category"]').val();
                            },
                            id: function() {
                                return $('input[name="id"]').val();

                            }
                        }

                    },
                }
            },
            messages: {
                name: {
                    required: "Please enter a sub category name",

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
            $('#addSubCategoryModal').modal({
                keyboard: false,
                backdrop: 'static',
                show: false
            })

            $('#add_sub_category').on('click', function(e) {
                e.preventDefault();

                if ($('#Addsubcategory').valid()) {
                    let id = $('#addSubCategoryModal #id').val();
                    let updateurl = "{{ route('admin.sub-category.update', ':id') }}";
                    updateurl = updateurl.replace(':id', id);
                    $.ajax({
                        "url": ((id == '' && id != "undefined") ?
                            '{{ route('admin.sub-category.store') }}' : updateurl),
                        'method': "POST",
                        data: $('#Addsubcategory').serialize(),
                        success: function(response) {
                            if (response.status) {
                                ToastSuccess(response.message);
                                $('#addSubCategoryModal').modal('hide');
                                $('#Addsubcategory').get(0).reset();
                                reviewlist.ajax.reload();
                            } else {
                                ToastError(response.message);
                                $('#addSubCategoryModal').modal('hide');
                            }
                        }
                    });

                }


            });

            $('#reviewlist tbody').on('click', 'tr>td>.edit', function() {

                data = reviewlist.row(this.closest('tr')).data();
                $('#addSubCategoryModal .modal-title').html('Edit Sub Category');
                $('#addSubCategoryModal input[name="_method"]').val('PUT');
                $('#addSubCategoryModal #name').val(data.name);

                $('#addSubCategoryModal #categories').val(data.category_id);
                $('#addSubCategoryModal #id').val(data.id);
                $('#addSubCategoryModal #add_sub_category').html('Update');
                $('#addSubCategoryModal').modal('show');


            });
            // oprn model

            $('#newSubCategory').on('click', function() {
                $('#addSubCategoryModal .modal-title').html('Add Category');
                $('#addSubCategoryModal input[name="_method"]').val('POST');
                $('#addSubCategoryModal #name').val('');
                $('#addSubCategoryModal #id').val('');
                $('#addSubCategoryModal #add_sub_category').html('Add');
                $('#Addsubcategory').get(0).reset();
                $('#addSubCategoryModal').modal('show');
            })


        });

        function deleterow(id) {

            Swal.fire({
                title: 'Are you sure want to delete sub category?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $('#deleteReviewModel').modal('show');
                    //
                    let deleteurl = "{{ route('admin.sub-category.destroy', ':id') }}";
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
                                $('#addSubCategoryModal').modal('hide');
                                reviewlist.ajax.reload();

                            } else {
                                ToastError(response.message);

                            }
                        }
                    });

                }
            })
        }

        function approve(id){
            Swal.fire({
                title: 'Are you sure want to approve review?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Approve it!'
            }).then((result) => {
                if(result.isConfirmed){


                    $.ajax({
                        "url": "{{ route('admin.review.statusupdate') }}",
                        'method': "POST",
                        data: {
                           'id':id,
                           'status':1
                        },
                        success: function(response) {
                            if (response.status) {
                                ToastSuccess(response.message);
                                $('#addSubCategoryModal').modal('hide');
                                reviewlist.ajax.reload();

                            } else {
                                ToastError(response.message);

                            }
                        }
                    });
                }

            });
        }
        function declined(id){
            Swal.fire({
                title: 'Are you sure want to declined review?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Decline it!'
            }).then((result) => {
                if(result.isConfirmed){
                    $('#review_id').val(id);
                    $('#status').val(id);
                    $('#deleteReviewModel').modal('show');


                }

            });
        }

        $('#declinedbtn').on('click', function(e){

            if($('#declinedreasonForm').valid()){
                $.ajax({
                        "url": "{{ route('admin.review.statusupdate') }}",
                        'method': "POST",
                        data:$('#declinedreasonForm').serialize() ,
                        success: function(response) {
                            if (response.status) {
                                ToastSuccess(response.message);

                                $$('#declinedreasonForm').reset();
                            } else {
                                ToastError(response.message);

                            }
                        }
                    });
                }

        })
    </script>
@endpush
