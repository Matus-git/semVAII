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



    <form name="edit" action=" {{route('update-profile',$item->id)}}" method="post" >
        @csrf

        <div >
            <div class="col-md-6 col-md-offset-3">

                <div class="form-group">
                    <label >First name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name') ?? $item->name}}" >
                    <span style="color: red">@error('name'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label >Last name</label>
                    <input type="text" class="form-control" name="surname" value="{{old('surname') ?? $item->surname}}" >
                    <span style="color: red">@error('surname'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label >Phone number</label>
                    <input type="text" class="form-control" name="phone_number" value="{{old('phone_number') ?? $item->phone_number}}" >
                    <span style="color: red">@error('phone_number'){{ $message }} @enderror</span>
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
                title: `Are you sure you want to edit your profile ?`,
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
