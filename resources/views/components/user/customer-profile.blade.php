@php
    $user = auth()->user();
    
    $currentLocale = app()->getLocale();
    $currentPath = Request::path();
    $languagePrefix = $currentLocale . '/';
    //echo $currentPath;
    // Remove existing language prefix if present
    $currentPathWithoutLang = preg_replace('/^(en|de)\//', '', $currentPath);
    
    if ($currentLocale === 'en') {
        $currentLanguage = 'English';
    } elseif ($currentLocale === 'de') {
        $currentLanguage = 'Deutsch';
    } else {
        $currentLanguage = $currentLocale;
    }
    
    // Generate URLs for language switches
    $enUrl = 'en/';
    $deUrl = 'de/';
    // Handle case where URL already contains language prefix
    if (strpos($currentPath, $languagePrefix) === 0) {
        $currentPathWithoutLang = substr($currentPath, strlen($languagePrefix));
        $enUrl = 'en/' . $currentPathWithoutLang;
        $deUrl = 'de/' . $currentPathWithoutLang;
    }
    
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
        font-size: 13px !important;
        color: #060617;
        font-family: "Inter", "Helvetica", monospace;
        line-height: 1.6;
        width: 90px;
    }

    .form-check>label {
        padding-left: 12px;
        font-size: 16px !important;
    }

    .control-label-wrap {
        width: auto !important;
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

    .field-group {
        border: 1px solid black;
        padding: 5px;
        margin: 0;
    }

    .field-caption {
        float: none;
        width: auto;
        margin-left: 20px;
        padding: 5px;
        margin-bottom: -5px
    }

    .form-group .form-control {
        display: inline !important;
        width: calc(100% - 100px) !important;
        font-size: 13px;
    }

    @media screen and (max-width: 992px) {

        .form-group .control-label,
        .form-group>label {
            width: 100%;
        }

        .form-group .form-control {
            display: inline !important;
            width: 100% !important;
        }
    }

    @media screen and (max-width: 768px) {

        .form-group .control-label,
        .form-group>label {
            width: 125px;
        }

        .form-group .form-control {
            display: inline !important;
            width: calc(100% - 130px) !important;
        }
    }

    @media screen and (max-width: 600px) {

        .form-group .control-label,
        .form-group>label {
            width: 100%;
        }

        .form-group .form-control {
            display: inline !important;
            width: 100% !important;
        }
    }

    .custom-select {
        display: inline;
    }

    .space {
        min-height: 30px;
    }

    .mw-100 {
        min-width: 100%;
        padding-left: 0;
    }

    .nav-tabs {
        border-bottom: 2px solid #777;
        padding-left: 12px;
    }

    .nav-tabs .nav-link {
        background-color: #e9e9e9 !important;
        margin-right: 0 !important;
        margin-bottom: 0 !important;
        color: #212529 !important;
    }

    .nav-tabs .nav-link:active,
    .nav-tabs .nav-link:hover,
    .nav-tabs li.active .nav-link {
        background-color: #777 !important;
        color: white !important;

    }


    .list-group {
        margin: 5px;
    }

    .submit_btn {
        padding-right: 10px;
        padding-bottom: 10px;
    }
</style>

<section class="customer_profile_section">
    <div class="container-fluid-md container-lg mw-100">

        <div class="pagetitle">
            <h1>{{ __('home.sample_customer') }}</h1>
            <p></p>
        </div>
        <form id="request_profile_form" action="" class="order_fome_container">
            <div class="customer_profile_page">

                <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}" />

                <div class="div_flex">
                    <div class="col-lg-6 col-md-6 col-12">
                        <fieldset class="field-group row" style="margin-right: 5px !important;">
                            <legend class="field-caption">{{ __('home.general_information') }}</legend>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label class="control-label">{{ __('home.customer_number') }}
                                    </label>
                                    <input type="text" readonly name="customer_number" class="form-control"
                                        value="{{ @$user->customer_number }}">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12"></div>
                </div>
                <div class="div_flex">
                    <div class="col-lg-6 col-md-6 col-12">
                        <fieldset class="field-group row" style="padding-bottom: 15px; margin-right:5px !important;">
                            <legend class="field-caption">{{ __('home.customer_data') }}</legend>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.company') }} </label>
                                    <input type="text" name="profile_company" class="form-control"
                                        value="{{ @$user->company }}">
                                    @if ($errors->has('company'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.company_addition') }} </label>
                                    <input type="text" name="profile_company_addition" class="form-control"
                                        value="{{ @$user->company_addition }}">
                                    @if ($errors->has('company_addition'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" style="padding-right:0">
                                <div class="form-group form_dv_wrap">
                                    <label class="">{{ __('home.name') }}</label>
                                    <input type="text" name="profile_name" class="form-control"
                                        value="{{ @$user->name }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label class="" style="width:65px;">{{ __('home.first_name') }}</label>
                                    <input type="text" name="profile_first_name" class="form-control"
                                        style="width: calc(100% - 75px) !important;" value="{{ @$user->first_name }}">
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.street_number') }}</label>
                                    <input type="text" name="profile_street_number" class="form-control"
                                        value="{{ @$user->street_number }}">
                                    @if ($errors->has('street_number'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" style="width: 42%;">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.postal_code') }}</label>
                                    <input type="text" name="profile_postal_code" class="form-control"
                                        value="{{ @$user->postal_code }}">
                                    @if ($errors->has('postal_code'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" style="width: 58%; padding-left:0;">
                                <div class="form-group form_dv_wrap">
                                    <label style="width:30px">{{ __('home.location') }}</label>
                                    <input type="text" name="profile_location" class="form-control"
                                        style="width: calc(100% - 40px) !important;" value="{{ @$user->location }}">
                                    @if ($errors->has('location'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.country') }}</label>
                                    <input type="text" name="profile_country" class="form-control"
                                        value="{{ @$user->country }}">
                                    @if ($errors->has('country'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label class="">{{ __('home.email') }}</label>
                                    <input type="email" name="profile_email" class="form-control"
                                        value="{{ @$user->email }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.website') }}</label>
                                    <input type="text" name="profile_website" class="form-control"
                                        value="{{ @$user->website }}">
                                    @if ($errors->has('website'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" style="padding-right: 0;">
                                <div class="form-group form_dv_wrap">
                                    <label class="">{{ __('home.phone') }} </label>
                                    <input type="text" name="profile_phone" class="form-control"
                                        value="{{ @$user->phone }}">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label class="" style="width:65px;">{{ __('home.mobile') }}
                                    </label>
                                    <input type="text" name="profile_mobile" class="form-control"
                                        style="width: calc(100% - 75px) !important;" value="{{ @$user->mobile }}">
                                    @if ($errors->has('mobile'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12"
                        style="display: flex; flex-direction:column; justify-content:space-between">
                        <fieldset class="field-group row" style="margin-left: 5px !important;">
                            <legend class="field-caption">{{ __('home.customer_information') }}
                            </legend>
                            <div class="col-lg-6 col-md-12" style="padding-right: 0">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.tax_number') }} </label>
                                    <input type="text" name="profile_tax_number" class="form-control"
                                        value="{{ @$user->tax_number }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label style="width:60px;">{{ __('home.vat_number') }} </label>
                                    <input type="text" name="profile_vat_number" class="form-control"
                                        style="width: calc(100% - 70px) !important;"
                                        value="{{ @$user->vat_number }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" style="padding-right:0;">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.register_number') }} </label>
                                    <input type="text" name="profile_register_number" class="form-control"
                                        value="{{ @$user->register_number }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12"></div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.kd_group') }} </label>
                                    <input type="text" name="profile_kd_group" class="form-control"
                                        value="{{ @$user->kd_group }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.kd_category') }} </label>
                                    <input type="text" name="profile_kd_category" class="form-control"
                                        value="{{ @$user->kd_category }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.payment_method') }} </label>
                                    <input type="text" name="profile_payment_method" class="form-control"
                                        value="{{ @$user->payment_method }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.bank_name') }} </label>
                                    <input type="text" name="profile_bank_name" class="form-control"
                                        value="{{ @$user->bank_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" style="padding-right: 0; padding-bottom:10px;">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.IBAN') }} </label>
                                    <input type="text" name="profile_IBAN" class="form-control"
                                        value="{{ @$user->IBAN }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label style="width:60px;">{{ __('home.BIC') }} </label>
                                    <input type="text" name="profile_BIC" class="form-control"
                                        style="width: calc(100% - 70px) !important;" value="{{ @$user->BIC }}">
                                </div>
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-12 ">
                                <div class="upload_btn">
                                    <button id="request_customer_profile_submit" class="btn btn-primary btn-block"
                                        type="submit">{{ __('home.request_change') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


@push('custom-script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
