@extends('navbar')
@section('content')
    @if(\Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success">
            {{\Illuminate\Support\Facades\Session::get('success')}}
        </div>
    @endif
    @if(\Illuminate\Support\Facades\Session::get('fail'))
        <div class="alert alert-danger">
            {{\Illuminate\Support\Facades\Session::get('fail')}}
        </div>
    @endif



    <form name="edit" action=" {{route('update-email',$item->id)}}" method="post" >
        @csrf

        <div >
            <div class="col-md-6 col-md-offset-3">

                <dl class="dl-horizontal info">
                    <dt>Old email</dt>
                    <dd>  {{ $item->email }}</dd>
                </dl>

                <div class="form-group">
                    <label >New Email</label>
                    <input type="text" class="form-control" name="email" >
                    <span style="color: red">@error('email'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary show_confirm">Save</button>
                </div>
            </div>
        </div>

    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            event.preventDefault();
            swal({
                title: `Are you sure you want to your profile ?`,
                text: "If you update this, it will be changed.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willEdit) => {
                    if (willEdit) {
                        form.submit();
                    }
                });
        });

    </script>
@endsection
