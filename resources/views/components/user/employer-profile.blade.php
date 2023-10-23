@php
    $user = auth()->user();
@endphp
<style>
    .card {
        background: #e9e9e9;
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

<section class="customer_profile_section">
    <div class="container-fluid-md container-lg">
        <div class="row">
            <div class="col-12">
                <div class="pagetitle">
                    <h1>Profile Management </h1>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ __('routes.customer-profileupdate') }}" enctype="multipart/form-data">
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
                                                @if ($user->image)
                                                    <img id="profilePic" class="pic" src="{{ $user->image }}">
                                                @else
                                                    <img id="profilePic" class="pic"
                                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/340px-Default_pfp.svg.png">
                                                @endif

                                                <input class="uploadProfileInput" type="file" name="image"
                                                    id="newProfilePhoto" accept="image/*"
                                                    style="opacity: 0; width:0; padding:0; visibility: hidden;"
                                                    readonly />
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
                                                <p>Update Profile Picture</p>
                                                @if ($errors->has('image'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.fullName') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <!-- <input type="file" name="image"> -->
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ @$user->name }}" readonly>
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.email') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ @$user->email }}" readonly>
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger"> {{ __('home.requiredMessage') }} <i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.contact') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="number" name="number" class="form-control"
                                                        value="{{ @$user->contact_no }}" readonly>
                                                    @if ($errors->has('number'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('embroidery_form.salutation') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <div class="custom-select">
                                                        <select class="form-control" name="salutation" readonly>
                                                            <option value="" selected="selected">
                                                                {{ __('vector_form.salutation') }}</option>
                                                            <option value="vector_form.mister"
                                                                {{ @$user->salutation == 'vector_form.mister' ? 'selected' : '' }}>
                                                                {{ __('vector_form.mister') }}</option>
                                                            <option value="vector_form.woman"
                                                                {{ @$user->salutation == 'vector_form.woman' ? 'selected' : '' }}>
                                                                {{ __('vector_form.woman') }}</option>
                                                            <option value="vector_form.company"
                                                                {{ @$user->salutation == 'vector_form.company' ? 'selected' : '' }}>
                                                                {{ __('vector_form.company') }}</option>
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('salutation'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('vector_form.company') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="company" class="form-control"
                                                        value="{{ @$user->company }}" readonly>
                                                    @if ($errors->has('company'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.address') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="address" class="form-control"
                                                        value="{{ @$user->address }}" readonly>
                                                    @if ($errors->has('address'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.zip_code') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="zip_code" class="form-control"
                                                        value="{{ @$user->zip_code }}" readonly>
                                                    @if ($errors->has('zip_code'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.place') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="place" class="form-control"
                                                        value="{{ @$user->place }}" readonly>
                                                    @if ($errors->has('place'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.VAT_No') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="vat_no" class="form-control"
                                                        value="{{ @$user->vat_no }}" readonly>
                                                    @if ($errors->has('vat_no'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.website') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="site" class="form-control"
                                                        value="{{ @$user->site }}" readonly>
                                                    @if ($errors->has('site'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.thread') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="thread" class="form-control"
                                                        value="{{ @$user->thread }}" readonly>
                                                    @if ($errors->has('thread'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.file_emb') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="file_emb" class="form-control"
                                                        value="{{ @$user->emb_fileType }}" readonly>
                                                    @if ($errors->has('file_emb'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.file_vect') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="file_vect" class="form-control"
                                                        value="{{ @$user->vec_fileType }}" readonly>
                                                    @if ($errors->has('file_vect'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.thread_instruction') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="thread_instruction"
                                                        class="form-control" value="{{ @$user->thread_notes }}"
                                                        readonly>
                                                    @if ($errors->has('thread_instruction'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.thread_cut') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="thread_cut" class="form-control"
                                                        value="{{ @$user->thread_cut_notes }}" readonly>
                                                    @if ($errors->has('thread_cut'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.needle_instruction') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="needle_instruction"
                                                        class="form-control" value="{{ @$user->needle_notes }}"
                                                        readonly>
                                                    @if ($errors->has('needle_instruction'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.font_instruction') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="font_instruction"
                                                        class="form-control" value="{{ @$user->font_notes }}"
                                                        readonly>
                                                    @if ($errors->has('font_instruction'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{ __('home.special_instruction') }} <span
                                                            class="reqiurd">*</span></label>
                                                    <input type="text" name="special_instruction"
                                                        class="form-control" value="{{ @$user->special_notes }}"
                                                        readonly>
                                                    @if ($errors->has('special_instruction'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
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
                        @if (@auth()->user()->user_type == 'customer')
                            <button class="btn btn-primary btn-block" type="submit">Submit</button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
