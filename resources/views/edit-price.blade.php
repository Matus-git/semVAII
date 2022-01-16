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

    <form name="edit" action="{{route('update-price',$price->id_product)}}" method="post" >
        @csrf

        <div >
            <div class="col-md-6 col-md-offset-3">

                <div class="form-group">
                    <label >Price</label>
                    <input type="number" class="form-control" name="price" value="{{old('price') ?? $price->price}}">
                    <span style="color: red">@error('price'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label >Valid from</label>
                    <input type="date" class="form-control" name="valid_from" value="{{old('valid_from') ?? $price->valid_from}}">
                    <span style="color: red">@error('valid_from'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label >Valid until</label>
                    <input type="date" class="form-control" name="valid_until" value="{{old('valid_until') ?? $price->valid_until}}">
                    <span style="color: red">@error('valid_until'){{ $message }} @enderror</span>
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
                title: `Are you sure you want to update price ?`,
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
