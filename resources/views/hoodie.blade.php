@extends('navbar')

@section('content')

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Mikiny</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('create-hoodie')}}" title="Create a hoodie"> <i class="fas fa-plus-circle">Insert</i> </a>

        </div>



    </div>
        @foreach($hoodies as $hoodie)

            <div class="container">
                <div class="shop-item">
                    <a class="btn btn-success" href="{{route('edit-hoodie',$hoodie->id_hoodie)}}"><i>Edit</i>
                    </a>

                    <form method="POST" action=""{{route('delete',$hoodie['id_hoodie'])}}">
                        @csrf
                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                    </form>


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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
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

