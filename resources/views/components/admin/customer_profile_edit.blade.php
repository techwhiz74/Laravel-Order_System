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
        border: 1px solid #ddd !important;
    }

    .form-group .form-control :focus {
        border: 1px solid #888 !important;
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
<div class="modal fade" id="admin_customer_profile_edit_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Änderung des Kundenprofils</h5>
                <button type="button" class="close" style="font-size: 22px" onclick="hideModal()">&times;</button>
            </div>
            <div class="modal-body" style="font-size: 13px; font-family:'Inter';">
                <div class="container" style="padding: 20px">
                    <form id="admin_change_profile_form" action="">
                        <input type="hidden" name="admin_change_profile_id" value="" />
                        <div class="customer_profile_page">
                            <div class="div_flex">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <fieldset class="field-group row">
                                        <legend class="field-caption">{{ __('home.general_information') }}</legend>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label class="control-label">{{ __('home.customer_number') }}
                                                </label>
                                                <input type="text" name="admin_customer_number"
                                                    class="admin_customer_profile_input" value="">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12"></div>
                            </div>
                            <div class="div_flex">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <fieldset class="field-group row"
                                        style="padding-bottom: 10px; margin-right:5px !important;">
                                        <legend class="field-caption">{{ __('home.customer_data') }}</legend>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label>{{ __('home.company') }} </label>
                                                <input type="text" name="admin_company"
                                                    class="admin_customer_profile_input" value="">
                                                @if ($errors->has('company'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label>{{ __('home.company_addition') }} </label>
                                                <input type="text" name="admin_company_addition"
                                                    class="admin_customer_profile_input" value="">
                                                @if ($errors->has('company_addition'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12" style="padding-right:0">
                                            <div class="form-group form_dv_wrap">
                                                <label class="">{{ __('home.name') }}</label>
                                                <input type="text" name="admin_name"
                                                    class="admin_customer_profile_input" value="">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label class=""
                                                    style="width:65px;">{{ __('home.first_name') }}</label>
                                                <input type="text" name="admin_first_name"
                                                    class="admin_customer_profile_input"
                                                    style="width: calc(100% - 75px) !important;" value="">
                                                @if ($errors->has('first_name'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label>{{ __('home.street_number') }}</label>
                                                <input type="text" name="admin_street_number"
                                                    class="admin_customer_profile_input" value="">
                                                @if ($errors->has('street_number'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12" style="width: 42%;">
                                            <div class="form-group form_dv_wrap">
                                                <label>{{ __('home.postal_code') }}</label>
                                                <input type="text" name="admin_postal_code"
                                                    class="admin_customer_profile_input" value="">
                                                @if ($errors->has('postal_code'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12" style="width: 58%; padding-left:0;">
                                            <div class="form-group form_dv_wrap">
                                                <label style="width:30px">{{ __('home.location') }}</label>
                                                <input type="text" name="admin_location"
                                                    class="admin_customer_profile_input"
                                                    style="width: calc(100% - 40px) !important;" value="">
                                                @if ($errors->has('location'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label>{{ __('home.country') }}</label>
                                                <select name="admin_country" class="admin_customer_profile_input">
                                                    <option value="Deutschland">Deutschland</option>
                                                    <option value="Österreich">Österreich</option>
                                                    <option value="Schweiz">Schweiz</option>
                                                    <option value="Italien">Italien</option>
                                                    <option value="Niederlande">Niederlande</option>
                                                </select>
                                                @if ($errors->has('country'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label class="">{{ __('home.email') }}</label>
                                                <input type="email" name="admin_email"
                                                    class="admin_customer_profile_input" value="">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label>{{ __('home.website') }}</label>
                                                <input type="text" name="admin_website"
                                                    class="admin_customer_profile_input" value="">
                                                @if ($errors->has('website'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12" style="padding-right: 0;">
                                            <div class="form-group form_dv_wrap">
                                                <label class="">{{ __('home.phone') }} </label>
                                                <input type="text" name="admin_phone"
                                                    class="admin_customer_profile_input" value="">
                                                @if ($errors->has('phone'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label class="" style="width:65px;">{{ __('home.mobile') }}
                                                </label>
                                                <input type="text" name="admin_mobile"
                                                    class="admin_customer_profile_input"
                                                    style="width: calc(100% - 75px) !important;" value="">
                                                @if ($errors->has('mobile'))
                                                    <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                            class="fa fa-exclamation-circle"
                                                            aria-hidden="true"></i></span>
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
                                                <input type="text" name="admin_tax_number"
                                                    class="admin_customer_profile_input" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label style="width:60px;">{{ __('home.vat_number') }} </label>
                                                <input type="text" name="admin_vat_number"
                                                    class="admin_customer_profile_input"
                                                    style="width: calc(100% - 70px) !important;" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12" style="padding-right:0;">
                                            <div class="form-group form_dv_wrap">
                                                <label>{{ __('home.register_number') }} </label>
                                                <input type="text" name="admin_register_number"
                                                    class="admin_customer_profile_input" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12"></div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label>{{ __('home.kd_group') }} </label>
                                                <select name="admin_kd_group" class="admin_customer_profile_input">
                                                    <option value=""></option>
                                                    <option value="Wiederverkäufer">
                                                        Wiederverkäufer
                                                    </option>
                                                    <option value="Endkunde">Endkunde
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label>{{ __('home.kd_category') }} </label>
                                                <select name="admin_kd_category" class="admin_customer_profile_input">
                                                    <option value=""></option>
                                                    <option value="Stickprogramme & Vektordateien">
                                                        Stickprogramme & Vektordateien
                                                    </option>
                                                    <option value="Standard">Standard
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label>{{ __('home.payment_method') }} </label>
                                                <select name="admin_payment_method"
                                                    class="admin_customer_profile_input">
                                                    <option value=""></option>
                                                    <option value="Sofort ohne Abzug">
                                                        Sofort ohne Abzug
                                                    </option>
                                                    <option value="Lastschrift">
                                                        Lastschrift
                                                    </option>
                                                    <option value="Vorkasse">
                                                        Vorkasse</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label>{{ __('home.bank_name') }} </label>
                                                <input type="text" name="admin_bank_name"
                                                    class="admin_customer_profile_input" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12"
                                            style="padding-right: 0; padding-bottom:10px;">
                                            <div class="form-group form_dv_wrap">
                                                <label>{{ __('home.IBAN') }} </label>
                                                <input type="text" name="admin_IBAN"
                                                    class="admin_customer_profile_input" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group form_dv_wrap">
                                                <label style="width:60px;">{{ __('home.BIC') }} </label>
                                                <input type="text" name="admin_BIC"
                                                    class="admin_customer_profile_input"
                                                    style="width: calc(100% - 70px) !important;" value="">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="upload_btn">
                                                <button class="btn btn-primary btn-block" type="button"
                                                    id="confirm_customer_button">Kunde
                                                    freischalten</button>
                                                <button class="btn btn-primary btn-block" type="button"
                                                    id="decline_customer_button">Kundenkonto
                                                    ablehnen</button>
                                                <button class="btn btn-primary btn-block" type="submit"
                                                    id="save_customer_button">Kunde
                                                    ändern</button>
                                                <button type="button" id="customer_accept"
                                                    class="btn btn-primary btn-block">Annehmen</button>
                                                <button type="button" id="customer_decline"
                                                    class="btn btn-primary btn-block">Ablehnen</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function editCustomerProfile(id) {
        $('#decline_customer_button').hide();
        $('#confirm_customer_button').hide();
        $('#save_customer_button').hide();
        $('#customer_accept').hide();
        $('#customer_decline').hide();
        $.ajax({
            url: '{{ __('routes.admin-get-customer-profile') }}',
            type: 'get',
            data: {
                id
            },
            success: (response) => {
                console.log("profile", response.profile);
                console.log("temp", response.temp);
                $('[name=admin_change_profile_id]').val(response.profile.id);
                $('[name=admin_customer_number]').val(response.profile.customer_number);
                $('[name=admin_name]').val(response.profile.name);
                $('[name=admin_first_name]').val(response.profile.first_name);
                $('[name=admin_email]').val(response.profile.email);
                $('[name=admin_company]').val(response.profile.company);
                $('[name=admin_company_addition]').val(response.profile.company_addition);
                $('[name=admin_street_number]').val(response.profile.street_number);
                $('[name=admin_postal_code]').val(response.profile.postal_code);
                $('[name=admin_location]').val(response.profile.location);
                $('[name=admin_country]').val(response.profile.country);
                $('[name=admin_website]').val(response.profile.website);
                $('[name=admin_phone]').val(response.profile.phone);
                $('[name=admin_mobile]').val(response.profile.mobile);
                $('[name=admin_tax_number]').val(response.profile.tax_number);
                $('[name=admin_vat_number]').val(response.profile.vat_number);
                $('[name=admin_register_number]').val(response.profile.register_number);
                $('[name=admin_kd_group]').val(response.profile.kd_group);
                $('[name=admin_kd_category]').val(response.profile.kd_category);
                $('[name=admin_payment_method]').val(response.profile.payment_method);
                $('[name=admin_bank_name]').val(response.profile.bank_name);
                $('[name=admin_IBAN]').val(response.profile.IBAN);
                $('[name=admin_BIC]').val(response.profile.BIC);

                if (response.profile.name != response.temp.name) {
                    $('[name=admin_name]').val(response.temp.name);
                    $('[name=admin_name]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.first_name != response.temp.first_name) {
                    $('[name=admin_first_name]').val(response.temp.first_name);
                    $('[name=admin_first_name]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.email != response.temp.email) {
                    $('[name=admin_email]').val(response.temp.email);
                    $('[name=admin_email]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.company != response.temp.company) {
                    $('[name=admin_company]').val(response.temp.company);
                    $('[name=admin_company]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.company_addition != response.temp.company_addition) {
                    $('[name=admin_company_addition]').val(response.temp.company_addition);
                    $('[name=admin_company_addition]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.street_number != response.temp.street_number) {
                    $('[name=admin_street_number]').val(response.temp.street_number);
                    $('[name=admin_street_number]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.postal_code != response.temp.postal_code) {
                    $('[name=admin_postal_code]').val(response.temp.postal_code);
                    $('[name=admin_postal_code]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.location != response.temp.location) {
                    $('[name=admin_location]').val(response.temp.location);
                    $('[name=admin_location]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.country != response.temp.country) {
                    $('[name=admin_country]').val(response.temp.country);
                    $('[name=admin_country]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.website != response.temp.website) {
                    $('[name=admin_website]').val(response.temp.website);
                    $('[name=admin_website]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.phone != response.temp.phone) {
                    $('[name=admin_phone]').val(response.temp.phone);
                    $('[name=admin_phone]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.mobile != response.temp.mobile) {
                    $('[name=admin_mobile]').val(response.temp.mobile);
                    $('[name=admin_mobile]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.tax_number != response.temp.tax_number) {
                    $('[name=admin_tax_number]').val(response.temp.tax_number);
                    $('[name=admin_tax_number]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.vat_number != response.temp.vat_number) {
                    $('[name=admin_vat_number]').val(response.temp.vat_number);
                    $('[name=admin_vat_number]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.register_number != response.temp.register_number) {
                    $('[name=admin_register_number]').val(response.temp.register_number);
                    $('[name=admin_register_number]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.kd_group != response.temp.kd_group) {
                    $('[name=admin_kd_group]').val(response.temp.kd_group);
                    $('[name=admin_kd_group]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.kd_category != response.temp.kd_category) {
                    $('[name=admin_kd_category]').val(response.temp.kd_category);
                    $('[name=admin_kd_category]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.payment_method != response.temp.payment_method) {
                    $('[name=admin_payment_method]').val(response.temp.payment_method);
                    $('[name=admin_payment_method]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.bank_name != response.temp.bank_name) {
                    $('[name=admin_bank_name]').val(response.temp.bank_name);
                    $('[name=admin_bank_name]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.IBAN != response.temp.IBAN) {
                    $('[name=admin_IBAN]').val(response.temp.IBAN);
                    $('[name=admin_IBAN]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }
                if (response.profile.BIC != response.temp.BIC) {
                    $('[name=admin_BIC]').val(response.temp.BIC);
                    $('[name=admin_BIC]').css({
                        'animation': 'blinkers 2s linear infinite',
                    });
                }

                if (response.profile.customer_number == null || response.profile.customer_number ==
                    "") {
                    $('#decline_customer_button').show();
                    $('#confirm_customer_button').show();
                } else {
                    if (response.temp == null) {
                        $('#save_customer_button').show();
                    } else {
                        $('#customer_accept').show();
                        $('#customer_decline').show();
                    }
                }
                $('#admin_customer_profile_edit_popup').modal("show");
            },
            error: () => {
                console.error('err');
            }
        })


    }
    $('#admin_change_profile_form').submit(function(e) {
        e.preventDefault();
        var change_profile_data = new FormData();
        change_profile_data.append('id', $('[name=admin_change_profile_id]').val());
        change_profile_data.append('customer_number', $('[name=admin_customer_number]').val());
        change_profile_data.append('name', $('[name=admin_name]').val());
        change_profile_data.append('first_name', $('[name=admin_first_name]').val());
        change_profile_data.append('email', $('[name=admin_email]').val());
        change_profile_data.append('company', $('[name=admin_company]').val());
        change_profile_data.append('company_addition', $('[name=admin_company_addition]').val());
        change_profile_data.append('street_number', $('[name=admin_street_number]').val());
        change_profile_data.append('postal_code', $('[name=admin_postal_code]').val());
        change_profile_data.append('location', $('[name=admin_location]').val());
        change_profile_data.append('country', $('[name=admin_country]').val());
        change_profile_data.append('website', $('[name=admin_website]').val());
        change_profile_data.append('phone', $('[name=admin_phone]').val());
        change_profile_data.append('mobile', $('[name=admin_mobile]').val());
        change_profile_data.append('tax_number', $('[name=admin_tax_number]').val());
        change_profile_data.append('vat_number', $('[name=admin_vat_number]').val());
        change_profile_data.append('register_number', $('[name=admin_register_number]').val());
        change_profile_data.append('kd_group', $('[name=admin_kd_group]').val());
        change_profile_data.append('kd_category', $('[name=admin_kd_category]').val());
        change_profile_data.append('payment_method', $('[name=admin_payment_method]').val());
        change_profile_data.append('bank_name', $('[name=admin_bank_name]').val());
        change_profile_data.append('IBAN', $('[name=admin_IBAN]').val());
        change_profile_data.append('BIC', $('[name=admin_BIC]').val());

        $.ajax({
            url: '{{ __('routes.admin-change-profile') }}',
            type: 'post',
            contentType: false,
            processData: false,
            data: change_profile_data,
            success: () => {
                $('#admin_customer_profile_edit_popup').hide();
                $('#customer_list_table_reload_button').trigger('click');
            },
            error: () => {
                console.error('error!');
            }
        })
    })
    $('#confirm_customer_button').click(function() {
        var confirm_profile_data = new FormData();
        confirm_profile_data.append('customer_number', $('[name=admin_customer_number]').val());
        confirm_profile_data.append('admin_confirm_profile_id', $('[name=admin_change_profile_id]').val())
        $.ajax({
            url: '{{ __('routes.admin-confirm-profile') }}',
            type: 'post',
            data: confirm_profile_data,
            processData: false,
            contentType: false,
            success: () => {
                $('#admin_customer_profile_edit_popup').hide();
                $('#customer_list_table_reload_button').trigger('click');
            },
            error: () => {
                console.error('error');
            }
        })
    })
    $('#decline_customer_button').click(function() {
        $.ajax({
            url: '{{ __('routes.admin-decline-profile') }}',
            type: 'post',
            data: {
                admin_decline_profile_id: $('[name=admin_change_profile_id]').val()
            },
            success: () => {
                $('#admin_customer_profile_edit_popup').hide();
                $('#customer_list_table_reload_button').trigger('click');
            },
            error: () => {
                console.error("error");
            }
        })
    })
    $('#customer_accept').click(function() {
        var customer_accept_data = new FormData();
        customer_accept_data.append('id', $('[name=admin_change_profile_id]').val());
        customer_accept_data.append('name', $('[name=admin_name]').val());
        customer_accept_data.append('first_name', $('[name=admin_first_name]').val());
        customer_accept_data.append('email', $('[name=admin_email]').val());
        customer_accept_data.append('company', $('[name=admin_company]').val());
        customer_accept_data.append('company_addition', $('[name=admin_company_addition]').val());
        customer_accept_data.append('street_number', $('[name=admin_street_number]').val());
        customer_accept_data.append('postal_code', $('[name=admin_postal_code]').val());
        customer_accept_data.append('location', $('[name=admin_location]').val());
        customer_accept_data.append('country', $('[name=admin_country]').val());
        customer_accept_data.append('website', $('[name=admin_website]').val());
        customer_accept_data.append('phone', $('[name=admin_phone]').val());
        customer_accept_data.append('mobile', $('[name=admin_mobile]').val());
        customer_accept_data.append('tax_number', $('[name=admin_tax_number]').val());
        customer_accept_data.append('vat_number', $('[name=admin_vat_number]').val());
        customer_accept_data.append('register_number', $('[name=admin_register_number]').val());
        customer_accept_data.append('kd_group', $('[name=admin_kd_group]').val());
        customer_accept_data.append('kd_category', $('[name=admin_kd_category]').val());
        customer_accept_data.append('payment_method', $('[name=admin_payment_method]').val());
        customer_accept_data.append('bank_name', $('[name=admin_bank_name]').val());
        customer_accept_data.append('IBAN', $('[name=admin_IBAN]').val());
        customer_accept_data.append('BIC', $('[name=admin_BIC]').val());
        $.ajax({
            url: '{{ __('routes.admin-accept-change') }}',
            type: 'POST',
            contentType: false,
            processData: false,
            data: customer_accept_data,
            success: (result) => {
                console.log('The customer\'s profile has been changed');
                $('#admin_customer_profile_edit_popup').modal("hide");
                $('#customer_list_table_reload_button').trigger('click');

            },
            error: (err) => {
                console.error(err);
            }
        })
    })
    $('#customer_decline').click(function() {
        var id = $('[name=admin_change_profile_id]').val();
        $.ajax({
            url: '{{ __('routes.admin-decline-change') }}' + id,
            type: 'post',
            succcess: () => {
                $('#admin_customer_profile_edit_popup').modal("hide");
                $('#customer_list_table_reload_button').trigger('click');
            },
            error: (err) => {
                console.error('error!');
            }
        })
    })
</script>
