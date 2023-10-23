@extends('layout.layout')
@section('content')
<style>
    .card {
        background: #e9e9e9;
        margin-bottom: 30px;
        border: none;
    }

    /* .card .card-body {
        padding-top: 20px;
        padding-bottom: 20px;
    } */

    .avatar-box-left {
        margin: 0px;
    }

    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 10px auto;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-box .avatar-preview {
        border-radius: 10%;
    }

    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-box .avatar-preview>div {
        border-radius: 10%;
        width: 100%;
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }

    .avatar-box-left {
        margin: 0px;
    }

    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 10px auto;
    }

    .form-group .control-label,
    .form-group>label {
        font-weight: 400 !important;
        font-size: 16.8px !important;
        color: #060617;
        font-family: "Inter", "Helvetica", monospace;
        line-height: 1.6;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-box .avatar-preview {
        border-radius: 10%;
    }
</style>
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
                    <form action="{{__('routes.employer-Passwordupdate')}}" method="post">
                        @csrf
                        <div class="login_heading">
                            <h1>SET PASSWORD </h1>
                        </div>
                        <div class="form_dv">
                            <input type="hidden" value="{{@$lastSegment}}" name="emp_id">
                        </div>
                        <div class="form_dv">
                            <input type="hidden" placeholder="Password*" name="customerid" value="{{@$customerid}}" required>
                        </div>

                        <div class="form_dv">
                            <input type="password" placeholder="Password*" name="password" required>
                        </div>

                        <div class="form_dv">
                            <input type="password" placeholder="Confirm Password*" name="password_confirmation" required>
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
