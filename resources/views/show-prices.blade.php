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

    @foreach($prices as $price)

        <div class="container">
            @if(Auth::check())
                @if(Auth::user()->isAdmin())
                @endif
            @endif
                <table class="container">
                    <tr>
                        <th>ID</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Date</th>
                    </tr>
                <tr>
                    <td>{{$price['id_product']}}</td>
                    <td>{{$price['price']}}</td>
                    <td>{{$price['valid_from']}}</td>
                    <td>{{$price['valid_until']}}</td>
                    <td>
                        <div class=" btn-group ">
                            <a class="btn btn-success" href="{{route('edit-price',$price['id_product'])}}" ><i>Edit</i> </a>

                            <form method="GET" action="{{route('delete-price',$price['id_product'])}}">
                                @csrf
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                </table>
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
