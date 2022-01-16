@extends('navbar')
@section('content')

<div class="btn-group">
    <a class="btn btn-primary" href="{{route('edit-profile')}} " title=""> <i class="fas fa-plus-circle">Edit profile</i> </a>
    <a class="btn btn-primary"  href="{{route('change-address')}}"     title=""> <i class="fas fa-plus-circle">Edit address</i> </a>
    <a class="btn btn-primary"   href="{{route('change-email')}}"  title=""> <i class="fas fa-plus-circle">Change email</i> </a>
    <form method="POST" action="{{route('delete-profile')}}">
        @csrf
        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
    </form>
</div>


    <dl class="dl-horizontal info">
        <dt>First Name</dt>
        <dd>  {{ $data['profile']->name }}</dd>
        <dt>Last Name</dt>
        <dd>{{ $data['profile']->surname }}</dd>
        <dt>Phone number</dt>
        <dd>{{ $data['profile']->phone_number }}</dd>
        <dt>Email</dt>
        <dd>{{ $data['profile']->email }}</dd>
        <dt>State</dt>
        <dd>{{ $data['address']->state }}</dd>
        <dt>City</dt>
        <dd>{{ $data['address']->city }}</dd>
        <dt>Street</dt>
        <dd>{{ $data['address']->street }}</dd>
        <dt>House number</dt>
        <dd>{{ $data['address']->house_number }}</dd>
        <dt>Post code</dt>
        <dd>{{ $data['address']->post_code }}</dd>
    </dl>
@endsection
