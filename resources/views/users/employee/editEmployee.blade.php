@extends('layout.layout')
@section('content')
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

        .confirm-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            width: 426px;
        }

        .confirm-popup h2 {
            font-size: 20px;
            margin-bottom: 25px;
            color: white;
            background: #090909;
            padding: 11px;
            text-align: center;
            font-weight: 600;
        }

        .confirm-popup p {
            font-size: 17px;
            margin-bottom: 20px;
            text-align: center;
        }

        .confirm-buttons {
            text-align: center;
        }

        .confirm-button {
            background-color: #c4ae79;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
        }

        .confirm-button.cancel {
            background-color: #ccc;
        }
    </style>
    <section class="page_section">
        <div class="padding-30">
            <div class="row">
                <div class="col-12">
                    <div class="pagetitle">
                        <h1> Employee Profile Management </h1>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ __('routes.employer-updateemployee') }}" enctype="multipart/form-data"
                id="profile-form">
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

                                                    <input class="uploadProfileInput_emp" type="file" name="image"
                                                        id="emp_image" accept="image/*"
                                                        style="opacity: 0; width:0; visibility: hidden;" />
                                                    <label for="emp_image" class="upload-file-block">
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
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-9 col-md-8">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap ">
                                                        <label class="">{{ __('home.fullName') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <!-- <input type="file" name="image"> -->
                                                        <input type="hidden" name="id" class="form-control"
                                                            value="{{ @$user->id }}">
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ @$user->name }}">
                                                        @if ($errors->has('name'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label class="">{{ __('home.email') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="email" name="email" class="form-control"
                                                            id="email" value="{{ old('email', @$user->email) }}">
                                                        <input type="hidden" name="confirmed_email_update"
                                                            id="confirmed_email_update" value="0">
                                                        @if ($errors->has('email'))
                                                            <span class="text-danger"> {{ __('home.requiredMessage') }} <i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label class="">{{ __('home.contact') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="number" name="number" class="form-control"
                                                            value="{{ @$user->contact_no }}">
                                                        @if ($errors->has('number'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label>{{ __('embroidery_form.salutation') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <div class="custom-select">
                                                            <select class="form-control" name="salutation">
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
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label>{{ __('vector_form.company') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="company" class="form-control"
                                                            value="{{ @$user->company }}">
                                                        @if ($errors->has('company'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label>{{ __('home.address') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="address" class="form-control"
                                                            value="{{ @$user->address }}">
                                                        @if ($errors->has('address'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label>{{ __('home.zip_code') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="zip_code" class="form-control"
                                                            value="{{ @$user->zip_code }}">
                                                        @if ($errors->has('zip_code'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label>{{ __('home.place') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="place" class="form-control"
                                                            value="{{ @$user->place }}">
                                                        @if ($errors->has('place'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label>{{ __('home.VAT_No') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="vat_no" class="form-control"
                                                            value="{{ @$user->vat_no }}">
                                                        @if ($errors->has('vat_no'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label>{{ __('home.website') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="site" class="form-control"
                                                            value="{{ @$user->site }}">
                                                        @if ($errors->has('site'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label class="">{{ __('home.thread') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="thread" class="form-control"
                                                            value="{{ @$user->thread }}">
                                                        @if ($errors->has('thread'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label class="">{{ __('home.file_emb') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="file_emb" class="form-control"
                                                            value="{{ @$user->emb_fileType }}">
                                                        @if ($errors->has('file_emb'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label class="">{{ __('home.file_vect') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="file_vect" class="form-control"
                                                            value="{{ @$user->vec_fileType }}">
                                                        @if ($errors->has('file_vect'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label class="">{{ __('home.thread_instruction') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="thread_instruction"
                                                            class="form-control" value="{{ @$user->thread_notes }}">
                                                        @if ($errors->has('thread_instruction'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label class="">{{ __('home.thread_cut') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="thread_cut" class="form-control"
                                                            value="{{ @$user->thread_cut_notes }}">
                                                        @if ($errors->has('thread_cut'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label class="">{{ __('home.needle_instruction') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="needle_instruction"
                                                            class="form-control" value="{{ @$user->needle_notes }}">
                                                        @if ($errors->has('needle_instruction'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12 ">
                                                    <div class="form-group form_dv_wrap">
                                                        <label class="">{{ __('home.font_instruction') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="font_instruction"
                                                            class="form-control" value="{{ @$user->font_notes }}">
                                                        @if ($errors->has('font_instruction'))
                                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                    class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group form_dv_wrap">
                                                        <label class="">{{ __('home.special_instruction') }} <span
                                                                class="reqiurd">*</span></label>
                                                        <input type="text" name="special_instruction"
                                                            class="form-control" value="{{ @$user->special_notes }}">
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
        <div class="confirm-popup" id="custom-confirm">
            <h2>Confirm Email Update</h2>
            <p>Are you sure you want to update the email? This will send an invitation email to the edited email address</p>
            <div class="confirm-buttons">
                <button class="confirm-button" id="custom-confirm-yes">Update</button>
                <button class="confirm-button cancel" id="custom-confirm-no">Cancel</button>
            </div>
        </div>
    </section>
@endsection

@push('custom-script')
    <script>
        document.getElementById('profile-form').addEventListener('submit', function(event) {
            const newEmail = document.getElementById('email').value;
            const currentEmail = '{{ $user->email }}';

            if (newEmail !== currentEmail) {
                event.preventDefault();

                const customConfirm = document.getElementById('custom-confirm');
                const confirmYes = document.getElementById('custom-confirm-yes');
                const confirmNo = document.getElementById('custom-confirm-no');

                customConfirm.style.display = 'block';

                confirmYes.addEventListener('click', function() {
                    document.getElementById('confirmed_email_update').value = '1';
                    document.getElementById('profile-form').submit();
                });

                confirmNo.addEventListener('click', function() {
                    customConfirm.style.display = 'none';
                });
            }
        });
        $('.uploadProfileInput_emp').on("change", function() {
            var triggerInput = $(this);
            console.log('dfkgjbds');
            var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
            var holder = $(this).closest('.profile-pic-wrapper').find(".pic-holder");
            var wrapper = $(this).closest(".profile-pic-wrapper");
            $(wrapper).find('[role="alert"]').remove();
            triggerInput.blur();
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) {
                return;
            }
            if (/^image/.test(files[0].type)) {
                // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() {
                    $(holder).addClass("uploadInProgress");
                    $(holder).find(".pic").attr("src", this.result);
                    $(holder).append(
                        '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
                    );

                    // Dummy timeout; call API or AJAX below
                    setTimeout(() => {
                        $(holder).removeClass("uploadInProgress");
                        $(holder).find(".upload-loader").remove();
                        // If upload successful
                        if (Math.random() < 0.9) {
                            $(wrapper).append(
                                '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
                            );

                            // Clear input after upload
                            // $(triggerInput).val("");

                            setTimeout(() => {
                                $(wrapper).find('[role="alert"]').remove();
                            }, 3000);
                        } else {
                            $(holder).find(".pic").attr("src", currentImg);
                            $(wrapper).append(
                                '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
                            );

                            // Clear input after upload
                            $(triggerInput).val("");
                            setTimeout(() => {
                                $(wrapper).find('[role="alert"]').remove();
                            }, 3000);
                        }
                    }, 1500);
                };
            } else {
                $(wrapper).append(
                    '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
                );
                setTimeout(() => {
                    $(wrapper).find('role="alert"').remove();
                }, 3000);
            }
        });
    </script>
@endpush
