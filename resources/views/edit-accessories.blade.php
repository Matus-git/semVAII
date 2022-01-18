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

    <form name="edit" action=" {{route('update-acc',$item->id)}}" method="post" >
        @csrf

        <div class="row">
            <div class="col-md-6 col-md-offset-3">


                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" >
                        <span style="color: red">@error('image'){{ $message }} @enderror</span>
                    </div>
                </div>

                <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" name="name"  value="{{old('name')??$item->name}}" >
                    <span style="color: red">@error('name'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label >Description</label>
                    <input type="text" class="form-control" name="description" value="{{old('description')??$item->description}}" >
                    <span style="color: red">@error('description'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label >Color</label>
                    <input type="text" class="form-control" name="color" value="{{old('color')??$item->color}}" >
                    <span style="color: red">@error('color'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label >Size</label>
                    <input type="text" class="form-control" name="size"  value="{{old('size')??$item->size}}" >
                    <span style="color: red">@error('size'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label >Price id</label>
                    <input type="number" class="form-control" name="id_product"  value="{{old('id_product')??$item->id_product}}" >
                    <span style="color: red">@error('price id'){{ $message }} @enderror</span>
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
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to update ?`,
                text: "If you update this, it will be changed.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willEdit) => {
                    if (willEdit) {
                        form.submit();
                        swal("Poof! Your data has been updated!", {
                            icon: "success",
                            buttons: true,
                        });
                    } else {
                        swal("Your  file is safe!");
                    }
                });
        });

    </script>
@endsection
