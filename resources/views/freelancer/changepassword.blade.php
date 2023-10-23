@extends('layout.layout')
@section('content')
<section class="login_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="login_wrap">
                    @if(Session::has('message'))
                    <p class="alert alert-danger" style="text-align: center;">
                        {{(Session::get('message'))}}
                    </p>
                    @endif
                    @if(Session::has('success'))
                    <p class="alert alert-success" style="text-align: center;">
                        {{(Session::get('success'))}}
                    </p>
                    @endif

                    @if (count($errors))
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                    @endforeach
                    @endif
                    <form action="{{__('routes.freelancer-change-password')}}" method="post">
                        @csrf
                        <div class="login_heading">
                            <h1>Change Password</h1>
                        </div>

                        <div class="form_dv">
                            <input type="password" placeholder="Current Password*" name="oldpassword" required>
                        </div>

                        <div class="form_dv">
                            <input type="password" placeholder="New Password*" name="newpassword" required>
                        </div>

                        <div class="form_dv">
                            <input type="password" placeholder="Confirm New Password*" name="password_confirmation" required>
                        </div>
                        <div class="submit_btn">
                            <button type="submit">Change Password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
