@extends('layout.layout')
@section('content')
    <section class="login_section change-password-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="login_wrap">
                        @if (Session::has('message'))
                            <p class="alert alert-danger" style="text-align: center;">
                                {{ Session::get('message') }}
                            </p>
                        @endif
                        @if (Session::has('success'))
                            <p class="alert alert-success" style="text-align: center;">
                                {{ Session::get('success') }}
                            </p>
                        @endif

                        @if (count($errors))
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                        @endif

                        <form action='{{ __('routes.freelancer-em-change-avatar-handle') }}' method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="login_heading">
                                <h1>{{ __('home.change_avatar') }}</h1>
                            </div>
                            <div class="login_body">
                                <input type="file" class="form-control" name="change_avatar" style="font-size: 13px;"
                                    required>
                            </div>
                            <div class="submit_btn">
                                <button type="submit">{{ __('home.change_avatar_b') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
