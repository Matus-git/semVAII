@extends('navbar')

@section('content')

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Mikiny</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('create-hoodie')}}" title="Create a hoodie"> <i class="fas fa-plus-circle">Insert</i>
            </a>
        </div>
    </div>
        @foreach($hoodies as $hoodie)
            <div class="container">
                <div class="shop-item">
                    <a class="btn btn-success" href="{{route('edit-hoodie',$hoodie->id_hoodie)}}"><i>Edit</i>
                    </a>

                    <a class="btn btn-danger" href="{{route('delete',$hoodie['id_hoodie'])}}"><i class="fas fa-plus-circle" >Delete</i>
                    </a>
                </div>

                <div class="row">

                <div class="shop-item-info">
                    <div >
                        <img  class="shop-item-photo" src="photos/{{$hoodie['image']}}" alt="image">
                    </div>
                    <div class="shop-item-details">
                        <strong class="shop-item-name">
                            {{$hoodie['name']}}
                        </strong>
                        <div class="shop-item-final">
                            <div >
                                {{$hoodie['color']}}
                                 {{$hoodie['size']}}
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            @endforeach
@endsection
