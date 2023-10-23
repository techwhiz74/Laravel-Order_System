@extends('layout.layout')
@section('content')
    <h1> This Header Section </h1>
    @if (@auth()->user()->user_type == 'admin')
        <a href="{{ route('admin-logout') }}" style="color:gray;font-weight:600;">
            <i class="bi bi-power mr-1 p-1" style="color:gray;"></i>Logout</a>
    @elseif(@auth()->user()->user_type == 'freelancer')
        <a href="{{ route('freelancer-logout') }}" style="color:gray;font-weight:600;">
            <i class="bi bi-power mr-1 p-1" style="color:gray;"></i>Logout</a>
    @elseif(@auth()->user()->user_type == 'customer')
        <a href="{{ route('customer-logout') }}" style="color:gray;font-weight:600;">
            <i class="bi bi-power mr-1 p-1" style="color:gray;"></i>Logout</a>
    @endif

    @if (Session::has('message'))
        <p class="alert alert-danger" style="text-align: center;">
            {{ Session::get('message') }}
        </p>
    @endif
@endsection
