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


    @foreach($items as $data)

            @if(Auth::check())
                @if(Auth::user()->isAdmin())
                @endif
            @endif
            <table class="container-fluid ">
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Phone number</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Street</th>
                    <th>House number</th>
                    <th>Post code</th>
                </tr>
                <tr>
                    <td>{{$data['name'] }}</td>
                    <td>{{$data['surname'] }}</td>
                    <td>{{$data['phone_number'] }}</td>
                    <td>{{$data['email'] }}</td>
                    <td>{{$data['type'] }}</td>
                    <td>{{$data['state'] }}</td>
                    <td>{{$data['city'] }}</td>
                    <td>{{$data['street'] }}</td>
                    <td>{{$data['house_number'] }}</td>
                    <td>{{$data['post_code'] }}</td>
                    <td>
                    </td>
                </tr>
            </table>
        </div>
    @endforeach
@endsection
