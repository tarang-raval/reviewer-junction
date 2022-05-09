@extends('layouts.adminMaster')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Product</h3>

                    <a  href="{{route('admin.product.create')}}"  class="btn  btn-outline-primary" >Add Product</a>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="productlist" class="table table-bordered table-hover">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>

        const productlist=$('#productlist').DataTable({
                "paging": true,
                "serverSide": true,
                "lengthChange": true,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": true,
                "responsive": true,
                order: [0, 'desc'],

                "ajax": {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "url": '{{ route('admin.product.datatable') }}',
                    'method': "POST"
                },
                columns: [
                    { data: "product_name", title:"Product Name" },
                    { data: "category_name", title:"category name" },
                    { data: "sub_category_name", title:"sub-category name" },
                    { data: "action", title:"Action", orderable:false,width:'100px' },

                ],
                drawCallback: function( settings ) {
                    $('[data-toggle="tooltip"]').tooltip()
                }

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
        let deleteurl = "{{ route('admin.product.destroy', ':id') }}";
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

                    productlist.ajax.reload();

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
