@extends('layouts.adminMaster')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Product</h3>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pointslist" class="table table-bordered table-hover">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_pointsModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Points</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="Addpoints" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="POST">
                        <div class="form-group">
                            <label for="name">sub Category Name</label>
                            <input type="text" class="form-control" id="subcatname" name="subcategory_name" readonly placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">
                            <label for="name">Points</label>
                            <input type="text" class="form-control" id="points" name="points"  placeholder="Enter Category Name">
                        </div>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="subcategory_id" id="subcategory_id" value="">


                    </div>
                    <div class="modal-footer flex-end">
                        <button type="submit" class="btn btn-primary" id="ADD_POINTS">Add</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection

@push('js')

    <script>

        const productlist=$('#pointslist').DataTable({
                "paging": true,
                "serverSide": true,
                "lengthChange": true,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": true,
                "responsive": true,
                dom: 'Bfrtip',
                order: [0, 'desc'],

                "ajax": {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "url": '{{ route('admin.points.datatable') }}',
                    'method': "POST"
                },
                columns: [
                    { data: "subcategory_name", title:"sub-category name" },
                    { data: "category_name", title:"category name" },
                    { data: "points", title:"Points" },
                    { data: "action", title:"Action", orderable:false,width:'100px' },
                ],
                drawCallback: function( settings ) {
                    $('[data-toggle="tooltip"]').tooltip()
                }

            });

            $(document).on( 'click', '#pointslist tbody td .edit', function (e) {
                e.preventDefault();
            let rowdata=productlist.row($(this).closest('tr').index()).data();
            $('#subcatname').val(rowdata.subcategory_name);
            $('#points').val(rowdata.points);
            $('#subcategory_id').val(rowdata.subcategory_id);
            $('#id').val(rowdata.id);
            $('#add_pointsModal').modal('show');



    } );
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
});

}
$('#Addpoints').validate({
    'rules':{
        'points':{required:true,number:true,min:0},
    }
})
    $(document).on('click','#ADD_POINTS',function(e){
            e.preventDefault();
            let url="{{route('admin.points.store')}}";
                if($('#Addpoints').valid()){
                    $.ajax({
                        "url": url,
                        'method': "POST",
                        data: $('#Addpoints').serializeArray(),
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
    });




    </script>
@endpush
