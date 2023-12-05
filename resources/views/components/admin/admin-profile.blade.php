@php
    $user = auth()->user();
@endphp

<section class="page_section">
    <div class="container-fluid-md container-lg">
        <div class="row">
            <div class="col-12">
                <div class="pagetitle">
                    <h1>Profile Management</h1>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ __('routes.admin-updateprofile') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile_wrap">
                        @if (Session::has('success'))
                            <p class="alert alert-success" style="text-align: center;">
                                {{ Session::get('success') }}
                            </p>
                        @endif
                        <div class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">

                                        <div class="profile-pic-wrapper">
                                            <div class="pic-holder">
                                                <!-- uploaded pic shown here -->
                                                @if (@$user->image)
                                                    <img id="profilePic" class="pic" src="{{ $user->image }}">
                                                @else
                                                    <img id="profilePic" class="pic"
                                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/340px-Default_pfp.svg.png">
                                                @endif
                                                <Input class="uploadProfileInput" type="file" name="image"
                                                    id="newProfilePhoto" accept="image/*"
                                                    style="opacity: 0; width:0; visibility: hidden;" />

                                                <label for="newProfilePhoto" class="upload-file-block">
                                                    <div class="text-center">
                                                        <div class="mb-2">
                                                            <i class="fa fa-camera fa-2x"></i>
                                                        </div>
                                                        <div class="text-uppercase">
                                                            Update <br /> Profile Photo
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>

                                            <div class="upload_profile_text">
                                                <p>{{ __('home.update_profile') }}</p>
                                                @if ($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                        <div class="row">

                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.fullName') }}</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ @$user->name }}">
                                                    @if ($errors->has('name'))
                                                        <span
                                                            class="text-danger">{{ __('home.fullName') }}{{ __('home.required') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.email') }}</label>
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ @$user->email }}">
                                                    @if ($errors->has('email'))
                                                        <span
                                                            class="text-danger">{{ __('home.email') }}{{ __('home.required') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.contact') }}</label>
                                                    <input type="number" name="number" class="form-control"
                                                        value="{{ @$user->contact_no }}">
                                                    @if ($errors->has('number'))
                                                        <span
                                                            class="text-danger">{{ __('home.contact') }}{{ __('home.required') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.address') }}</label>
                                                    <textarea name="address" rows="5" class="form-control" value="{{ @$user->address }}">{{ @$user->address }}</textarea>
                                                    @if ($errors->has('address'))
                                                        <span
                                                            class="text-danger">{{ __('home.address') }}{{ __('home.required') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <div class="upload_btn">
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
