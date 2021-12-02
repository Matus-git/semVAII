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
    <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="create-row">
            <div class="col-md-6 col-md-offset-3">


                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="image" >
                            @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name">
                        <span style="color: red">@error('name'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label >Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Enter description">
                        <span style="color: red">@error('description'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label >Color</label>
                        <input type="text" class="form-control" name="color" placeholder="Enter color">
                        <span style="color: red">@error('color'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label>Size</label>
                        <input type="text" class="form-control" name="size" placeholder="Enter size">
                        <span style="color: red">@error('size'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

            </div>
        </div>

    </form>

@endsection
