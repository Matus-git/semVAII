
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

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ostatne veci</h2>
        </div>

        @if(Auth::check())
            @if(Auth::user()->isAdmin())
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{route('create-acc')}}" title="Create a shirt"> <i class="fas fa-plus-circle">Insert</i> </a>
                </div>
            @endif
        @endif

    </div>
    @foreach($items as $item)

        <div class="container">
            @if(Auth::check())
                @if(Auth::user()->isAdmin())


                    <div class=" btn-group shop-item">
                        <a class="btn btn-success" href="{{route('edit-acc',$item->id)}}"><i>Edit</i> </a>

                        <form method="GET" action="{{route('delete-acc',$item['id'])}}">
                            @csrf
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>
                    </div>

                @endif
            @endif

            <div class="row">

                <div class="shop-item-info">
                    <div >
                        <img  class="shop-item-photo" src="photos/{{$item['image']}}" alt="image">
                    </div>
                    <div class="shop-item-details">
                        <strong class="shop-item-name">
                            {{$item['name']}}
                        </strong>
                        <div class="shop-item-final">
                            <div >
                                <p> farba:   {{$item['color']}} </p>
                                <p> velkost:   {{$item['size']}} </p>
                                <p> cena:  {{$item['price']}} eur </p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>
@endsection





