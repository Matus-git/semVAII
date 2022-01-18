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

    <div class="btn-group">
        <a class="btn btn-primary" href="{{route('create-price')}}" title=""> <i class="fas fa-plus-circle">Create Price</i> </a>
        <a class="btn btn-primary" href="{{route('prices')}}" title=""> <i class="fas fa-plus-circle">Show Price's</i> </a>
    </div>


    <form action="{{route('store-acc')}}" method="post" enctype="multipart/form-data" id="main_form">
        @csrf
        <div class="create-row">
            <div class="col-md-6 col-md-offset-3">

                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="image" >
                        <span class="text-danger error-text image_error"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name">
                    <span class="text-danger error-text name_error"></span>
                </div>

                <div class="form-group">
                    <label >Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Enter description">
                    <span class="text-danger error-text description_error"></span>
                </div>

                <div class="form-group">
                    <label >Color</label>
                    <input type="text" class="form-control" name="color" placeholder="Enter color">
                    <span class="text-danger error-text color_error"></span>
                </div>

                <div class="form-group">
                    <label>Size</label>
                    <input type="text" class="form-control" name="size" placeholder="Enter size">
                    <span class="text-danger error-text size_error"></span>
                </div>

                <div class="form-group">
                    <div class="class input-field">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" id="priceID" placeholder="Enter price">
                        <span class="text-danger error-text price_error"></span>
                    </div>
                </div>

                <div class="form-group"  style="display: none;" >
                    <label>Price id</label>

                    <input type="number" class="form-control" name="id_product" id="id_product" placeholder="Automatic fill ">
                </div>


                <div class="form-group">
                    <label>Price from</label>
                    <input type="date" class="form-control" name="valid_from" id="valid_from" >
                </div>

                <div class="form-group">
                    <label>Price until</label>
                    <input type="date" class="form-control" name="valid_until" id="valid_until" >
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>


            </div>
        </div>

    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                type:'get',
                url:"{{ route('create-hoodie.getProducts') }}",
                success:function (response){
                    var prodArray = response;
                    var dataProd = {};
                    var dataProdFrom = {};
                    for (var i = 0;i < prodArray.length;i++){
                        dataProd[prodArray[i].price] =null;
                        dataProdFrom[prodArray[i].price] = prodArray[i];
                    }
                    $('input#priceID').autocomplete({
                        data: dataProd,
                        onAutocomplete:function(reqdata){
                            $('#id_product').val(dataProdFrom[reqdata] ['id_product']);
                            $('#valid_from').val(dataProdFrom[reqdata] ['valid_from']);
                            $('#valid_until').val(dataProdFrom[reqdata] ['valid_until']);
                        }
                    });
                }
            })
        })
    </script>

    <script src="{{ asset('main.js')}}"></script>
@endsection
