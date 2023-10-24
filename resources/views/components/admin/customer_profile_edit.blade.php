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
<div class="modal fade" id="admin_customer_profile_edit_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Änderung des Kundenprofils</h5>
                <button type="button" class="close" style="font-size: 22px" onclick="hideModal()">&times;</button>
            </div>
            <div class="modal-body" style="font-size: 13px; font-family:'Inter';">
                <div class="container" style="padding: 10px">
                    <form id="admin_change_profile_form" action="" style="padding-right:10px;">
                        <input type="hidden" name="admin_change_profile_id" value="" />
                        <div class="row">
                            <div class="customer_profile_page">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <fieldset class="field-group row">
                                            <legend class="field-caption">{{ __('home.general_information') }}</legend>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="control-label">{{ __('home.customer_number') }}
                                                    </label>
                                                    <input type="text" name="admin_customer_number"
                                                        class="form-control" value="">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12"></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <fieldset class="field-group row" style="padding-bottom: 10px">
                                            <legend class="field-caption">{{ __('home.customer_data') }}</legend>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.company') }} </label>
                                                    <input type="text" name="admin_company" class="form-control"
                                                        value="">
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
                                                        class="form-control" value="">
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
                                                    <input type="text" name="admin_name" class="form-control"
                                                        value="">
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
                                                    <input type="text" name="admin_first_name" class="form-control"
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
                                                        class="form-control" value="">
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
                                                    <input type="text" name="admin_postal_code" class="form-control"
                                                        value="">
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
                                                    <input type="text" name="admin_location" class="form-control"
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
                                                    <input type="text" name="admin_country" class="form-control"
                                                        value="">
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
                                                    <input type="email" name="admin_email" class="form-control"
                                                        value="">
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
                                                    <input type="text" name="admin_website" class="form-control"
                                                        value="">
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
                                                    <input type="text" name="admin_phone" class="form-control"
                                                        value="">
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
                                                    <input type="text" name="admin_mobile" class="form-control"
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
                                        <fieldset class="field-group row">
                                            <legend class="field-caption">{{ __('home.customer_information') }}
                                            </legend>
                                            <div class="col-lg-6 col-md-12" style="padding-right: 0">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.tax_number') }} </label>
                                                    <input type="text" name="admin_tax_number"
                                                        class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <label style="width:60px;">{{ __('home.vat_number') }} </label>
                                                    <input type="text" name="admin_vat_number"
                                                        class="form-control"
                                                        style="width: calc(100% - 70px) !important;" value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12" style="padding-right:0;">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.register_number') }} </label>
                                                    <input type="text" name="admin_register_number"
                                                        class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12"></div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.kd_group') }} </label>
                                                    <input type="text" name="admin_kd_group" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.kd_category') }} </label>
                                                    <input type="text" name="admin_kd_category"
                                                        class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.payment_method') }} </label>
                                                    <input type="text" name="admin_payment_method"
                                                        class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.bank_name') }} </label>
                                                    <input type="text" name="admin_bank_name" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12"
                                                style="padding-right: 0; padding-bottom:10px;">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.IBAN') }} </label>
                                                    <input type="text" name="admin_IBAN" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <label style="width:60px;">{{ __('home.BIC') }} </label>
                                                    <input type="text" name="admin_BIC" class="form-control"
                                                        style="width: calc(100% - 70px) !important;" value="">
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="row">
                                            <div class="col-12 ">
                                                <div class="upload_btn">
                                                    <button class="btn btn-primary btn-block" type="submit">Profile
                                                        Change</button>
                                                </div>
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
        $.ajax({
            url: '{{ __('routes.admin-get-customer-profile') }}',
            type: 'get',
            data: {
                id
            },
            success: (response) => {
                console.log(response);
                data = response[0];
                $('#admin_customer_profile_edit_popup').modal("show");
                $('[name=admin_change_profile_id]').val(data.id);
                $('[name=admin_customer_number]').val(data.customer_number);
                $('[name=admin_name]').val(data.name);
                $('[name=admin_first_name]').val(data.first_name);
                $('[name=admin_email]').val(data.email);
                $('[name=admin_company]').val(data.company);
                $('[name=admin_company_addition]').val(data.company_addition);
                $('[name=admin_street_number]').val(data.street_number);
                $('[name=admin_postal_code]').val(data.postal_code);
                $('[name=admin_location]').val(data.location);
                $('[name=admin_country]').val(data.country);
                $('[name=admin_website]').val(data.website);
                $('[name=admin_phone]').val(data.phone);
                $('[name=admin_mobile]').val(data.mobile);
                $('[name=admin_tax_number]').val(data.tax_number);
                $('[name=admin_vat_number]').val(data.vat_number);
                $('[name=admin_register_number]').val(data.register_number);
                $('[name=admin_kd_group]').val(data.kd_group);
                $('[name=admin_kd_category]').val(data.kd_category);
                $('[name=admin_payment_method]').val(data.payment_method);
                $('[name=admin_bank_name]').val(data.bank_name);
                $('[name=admin_IBAN]').val(data.IBAN);
                $('[name=admin_BIC]').val(data.BIC);
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
</script>
