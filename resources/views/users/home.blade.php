@extends('layout.layout')
@section('content')
    <hr>
    @if (Session::has('message'))
        <p class="alert alert-danger" style="text-align: center;">
            {{ Session::get('message') }}
        </p>
    @endif


    <h1> This is Home Page </h1>
    <hr>
@endsection
