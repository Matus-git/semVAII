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

    <form name="edit" action=" {{route('update',$hoodie->id_hoodie)}}" onsubmit="return(validateForm())" method="post" >
        @csrf

        <div class="row">
            <div class="col-md-6 col-md-offset-3">


                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" class="form-control" name="image">
                            <span style="color: red">@error('image'){{ $message }} @enderror</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control" name="name"  value="{{old('name') ?? $hoodie->name}}" >
                        <span style="color: red">@error('name'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label >Description</label>
                        <input type="text" class="form-control" name="description" value="{{old('description') ?? $hoodie->description}}">
                        <span style="color: red">@error('description'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label >Color</label>
                        <input type="text" class="form-control" name="color" value="{{old('color') ?? $hoodie->color}}">
                        <span style="color: red">@error('color'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label >Size</label>
                        <input type="text" class="form-control" name="size"  value="{{old('size') ?? $hoodie->size}}">
                        <span style="color: red">@error('size'){{ $message }} @enderror</span>
                    </div>

                <div class="form-group">
                    <label >Price id</label>
                    <input type="number" class="form-control" name="id_product"  value="{{old('id_product') ?? $hoodie->id_product}}">
                    <span style="color: red">@error('price id'){{ $message }} @enderror</span>
                </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary show_confirm">Save</button>

                    </div>

            </div>
        </div>

    </form>

    <script>
        function validateForm() {
            if (document.edit.image.value =="" &&
                document.edit.name.value ==""&&
                document.edit.description.value =="" &&
                document.edit.size.value ==""&&
                document.edit.color.value ==""){
                alert("You forget to fill image , name , description , color , size");
                return false;
            }

            if (document.edit.image.value =="") {
                alert("This is not an image path");
                return false;
            }

            if (document.edit.name.value =="") {
                alert("Name must be filled out");
                return false;
            }
            if (document.edit.description.value =="") {
                alert("Description must be filled out");
                return false;
            }
            if (document.edit.size.value =="") {
                alert("Size must be filled out");
                return false;
            }
            if (document.edit.color.value =="") {
                alert("Color must be filled out");
                return false;
            }
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to update this hoodie?`,
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
