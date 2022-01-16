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



    <form name="edit" action=" {{route('update-address',$item->id)}}" method="post" >
        @csrf

        <div >
            <div class="col-md-6 col-md-offset-3">

                <div class="form-group">
                    <label >State</label>
                    <input type="text" class="form-control" name="state" value="{{old('state') ?? $item->state}}" >
                    <span style="color: red">@error('state'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label >City</label>
                    <input type="text" class="form-control" name="city" value="{{old('city') ?? $item->city}}" >
                    <span style="color: red">@error('city'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label >Street</label>
                    <input type="text" class="form-control" name="street" value="{{old('street') ?? $item->street}}" >
                    <span style="color: red">@error('street'){{ $message }} @enderror</span>
                </div>


                <div class="form-group">
                    <label >House number</label>
                    <input type="text" class="form-control" name="house_number" value="{{old('house_number') ?? $item->house_number}}" >
                    <span style="color: red">@error('house_number'){{ $message }} @enderror</span>
                </div>


                <div class="form-group">
                    <label >Post code</label>
                    <input type="text" class="form-control" name="post_code" value="{{old('post_code') ?? $item->post_code}}" >
                    <span style="color: red">@error('post_code'){{ $message }} @enderror</span>
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
