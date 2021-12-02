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

                        </div>
                    </div>

                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name">

                    </div>

                    <div class="form-group">
                        <label >Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Enter description">

                    </div>

                    <div class="form-group">
                        <label >Color</label>
                        <input type="text" class="form-control" name="color" placeholder="Enter color">

                    </div>

                    <div class="form-group">
                        <label >Size</label>
                        <input type="text" class="form-control" name="size" placeholder="Enter size">

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
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

@endsection
