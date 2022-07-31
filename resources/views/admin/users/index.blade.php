@extends('layouts.adminMaster')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">User</h3>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="userlist" class="table table-bordered table-hover">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>

        const userlist=$('#userlist').DataTable({
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
                    "url": '{{ route('admin.user.datatable') }}',
                    'method': "POST"
                },
                columns: [
                    { data: "name", title:"Name" },
                    { data: "email", title:"Email" },
                    { data: "created_at", title:"Created" },
                    { data: "action", title:"Action", orderable:false,width:'100px' },

                ],
                drawCallback: function( settings ) {
                    $('[data-toggle="tooltip"]').tooltip()
                }

            });


        function checkunique(){
            return promise = new Promise(function(resolve, reject){

                $.ajax({
                    url: "{{route('admin.subcategory.unique.check')}}",
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

          $('#Addsubcategory').validate({
                rules: {
                    'category':{required:true},
                    name: {
                        required: true,
                        remote:{
                            url: "{{route('admin.subcategory.unique.check')}}",
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
            $('#addSubCategoryModal').modal({
                keyboard: false,
                backdrop:'static',
                show:false
                })

        $('#add_sub_category').on('click',function(e){
            e.preventDefault();

            if($('#Addsubcategory').valid()){
                let id=$('#addSubCategoryModal #id').val();
                let  updateurl="{{ route('admin.sub-category.update',':id') }}";
                updateurl=updateurl.replace(':id',id);
                $.ajax({
                    "url": ((id=='' && id!="undefined")?'{{ route('admin.sub-category.store') }}':updateurl),
                    'method': "POST",
                     data: $('#Addsubcategory').serialize(),
                     success:function(response){
                            if(response.status){
                                ToastSuccess(response.message);
                                $('#addSubCategoryModal').modal('hide');
                                $('#Addsubcategory').get(0).reset();
                                categorylist.ajax.reload();
                            }else{
                                ToastError(response.message);
                                $('#addSubCategoryModal').modal('hide');
                            }
                     }
                });

            }


        });

        $('#categorylist tbody').on( 'click', 'tr>td>.edit', function () {

                   data=categorylist.row( this.closest('tr') ).data();
                   $('#addSubCategoryModal .modal-title').html('Edit Sub Category');
                   $('#addSubCategoryModal input[name="_method"]').val('PUT');
                   $('#addSubCategoryModal #name').val(data.name);

                   $('#addSubCategoryModal #categories').val(data.category_id);
                   $('#addSubCategoryModal #id').val(data.id);
                   $('#addSubCategoryModal #add_sub_category').html('Update');
                   $('#addSubCategoryModal').modal('show');


        } );
        // oprn model

        $('#newSubCategory').on('click',function(){
                 $('#addSubCategoryModal .modal-title').html('Add Category');
                 $('#addSubCategoryModal input[name="_method"]').val('POST');
                   $('#addSubCategoryModal #name').val('');
                   $('#addSubCategoryModal #id').val('');
                   $('#addSubCategoryModal #add_sub_category').html('Add');
                   $('#Addsubcategory').get(0).reset();
                   $('#addSubCategoryModal').modal('show');
        })


        });
        function deleterow(id){

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

    //
    let deleteurl= "{{ route('admin.sub-category.destroy',':id') }}";
        deleteurl=deleteurl.replace(':id',id);
        $.ajax({
                    "url":deleteurl,
                    'method': "POST",
                     data: {'_method':'DELETE'},
                     success:function(response){
                            if(response.status){
                                ToastSuccess(response.message);
                                $('#addSubCategoryModal').modal('hide');
                                categorylist.ajax.reload();

                            }else{
                                ToastError(response.message);

                            }
                     }
                });

  }
})
        }

    </script>
@endpush
