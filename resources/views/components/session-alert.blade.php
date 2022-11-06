<div class="container">
     <div class="row p-2 ">
        <div class="col-md-12">
         @if (!empty(Session::get('success')))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {!! Session::get('success') !!}
            </div>
            @elseif (!empty(Session::get('error')))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {!! Session::get('error') !!}
            </div>
            @elseif (!empty(Session::get('warning')))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {!! Session::get('warning') !!}
            </div>
         @endif
     </div>
     </div>
</div>
