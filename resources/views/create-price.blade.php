
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
    <form action="{{route('store.price')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="create-row">

            <div class="col-md-6 col-md-offset-3">

                <div class="form-group">
                    <label >Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Enter price">
                    <span style="color: red">@error('price'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label >Valid from</label>
                    <input type="date" class="form-control" name="valid_from" placeholder="Enter date from">
                    <span style="color: red">@error('valid_from'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label >Valid until</label>
                    <input type="date" class="form-control" name="valid_until" placeholder="Enter date to">
                    <span style="color: red">@error('valid_until'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </div>
        </div>

    </form>
@endsection



