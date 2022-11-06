@extends('layouts.master')

@push('css')
<style>


.ui-w-80 {
    width: 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24,28,33,0.1);
    background: rgba(0,0,0,0);
    color: #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #26B4FF;
    background: transparent;
    color: #26B4FF;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.btn-facebook {
    border-color: rgba(0,0,0,0);
    background: #3B5998;
    color: #fff;
}

.btn-instagram {
    border-color: rgba(0,0,0,0);
    background: #000;
    color: #fff;
}

.card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24,28,33,0.012);
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
}
.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}
html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}
.account-settings-multiselect ~ .select2-container {
    width: 100% !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}
.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24,28,33,0.03) !important;
}


    </style>

@endpush
@section('content')
<div class="container light-style flex-grow-1 container-p-y text-center">

    <h4 class="font-weight-bold py-3 mb-4 text-center">
       Thank You for Registring  Reviewer Junction
    </h4>
    <h6>Start writing reviews and earn points.</h6>

    <section class="p-4" >
    	<div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="choose-category-main-title">How it Works</h2>
                </div>
			</div>
			<div class="row mx-auto">


					<div class="col-md-6">
                        <div class="service-item  text-center" >

							<img src="{{asset('../assets/img/feedback.png')}}">

                            <div class="service-detail p-4">
                                <h4>Write Review</h4>
                                <p></p>
                            </div>
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="service-item  text-center" >
                            <img src="{{asset('../assets/img/token.png')}}">
                            <div class="service-detail p-4">
                                <h4>Earn Points</h4>
                                <p></p>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>






  </div>
@endsection
@push('js')
<!-- DataTable -->
<script src="{{asset('asset/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>
<script>
    $('#changepassword').validate({
            rules: {

                 old_password:{required:true},
                 password:{required:true,minlength:8},
                 password_confirmation:{required:true,equalTo: "#password"},
            },
            messages:{
                first_name:{
                    regex:"please enter first name in alphabetic"
                },
                last_name:{
                    regex:"please enter last name in alphabetic"
                },
                email:{
                    regex:"Please enter valid email",
                    remote:"Email is already availbale, try  another email id",
                },
                mopbile_name:{
                    regex:"Please enter valid email",
                    remote:"Mobile no is already availbale, try another mobile no.",
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
    $('#updatepassword').click(function(){

        if($('#changepassword').valid()){

                 $.ajax({
                    "url": "{{route('profile.changepassword')}}",
                    'method': "POST",
                    data: $('#changepassword').serialize(),
                    success: function(response) {
                        if (response.status) {

                            $('#changepassword').trigger('reset');;
                            $('#errormessage').html(response.message).removeClass('alert-danger').addClass('alert-success');
                        } else {
                            $('#errormessage').html(response.message).removeClass('alert-success').addClass('alert-danger');

                        }
                    }
                });
        }
    });
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
                "url": '{{ route('userReviewlist') }}',
                'method': "POST"
            },
            columns: [{
                    data: "review",
                    title: ""
                },



            ],
            drawCallback: function(settings) {
                $('[data-toggle="tooltip"]').tooltip()
            }

        });

</script>
@endpush
