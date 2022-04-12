@extends('layouts.adminMaster')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Category</h3>

                    <button class="btn  btn-outline-primary" data-toggle="modal" data-target="#addCategoryModal"
                        data-backdrop="static" data-keyboard="false">Add Category</button>

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
                    <h4 class="modal-title">Add Caategory</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="Addcategory" method="post" >
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name">
                        </div>
                        <input type="hidden" name="id" value="">
                       {{--  <div class="form-group">
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
                        <button type="submit" class="btn btn-primary" id="add_category" >Add</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection

@push('js')
    <script>
        function checkunique(){
            return promise = new Promise(function(resolve, reject){

                $.ajax({
                    url: "{{route('admin.category.unique.check')}}",
                    method:"POST",
                    data:{
                        'category_name':$('input[name="name"]').val(),
                        'id':$('input[name="id"]').val(),
                    },
                    success: function(result){
                        resolve(true)
                    },
                    error:function(){
                        reject(false);
                    }
                });
                });
                promise.then(function(){
                    console.log();
                });
        }

          $('#Addcategory').validate({
                rules: {
                    name: {
                        required: true,
                        remote:{
                            url: "{{route('admin.category.unique.check')}}",
                            type: "post",
                            data: {
                                category_name: function() {
                                return $('input[name="name"]').val();
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
                        required: "Please enter a category name",

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
                }
            });

        $(function() {

            $('#categorylist').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                order: [0, 'desc'],

                "ajax": {

                    "url": '{{ route('admin.category.datatable') }}',
                    'method': "POST"
                },
                columns: [
                    { data: "name", title:"Name" },
                    { data: "action", title:"Action" },

                ]

            });
        $('#add_category').on('click',function(e){
            e.preventDefault();

            if($('#Addcategory').valid()){
                $.ajax({
                    "url": '{{ route('admin.category.store') }}',
                    'method': "POST",
                     data: $('#Addcategory').serialize(),
                     success:function(response){
                            if(response.status){
                                ToastSuccess(response.message);
                                $('#addCategoryModal').modal('hide');
                                $('#Addcategory').get(0).reset();
                            }else{
                                ToastError(response.message);
                                $('#addCategoryModal').modal('hide');
                            }
                     }
                })

            }


        });



        });
    </script>
@endpush
