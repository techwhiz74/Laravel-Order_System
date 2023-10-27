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
<section class="admin_add_customer_section">
    <div class="pagetitle">
        <h1>Kunde Erfassen</h1>
        <p></p>
    </div>
    <div class="order_fome_container">
        <form id="admin_add_customer" action="" style="padding-right:10px;">
            <div class="customer_profile_page">
                <div class="div_flex">
                    <div class="col-lg-6 col-md-6 col-12">
                        <fieldset class="field-group row" style="margin-right: 5px !important;">
                            <legend class="field-caption">{{ __('home.general_information') }}</legend>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label class="control-label">{{ __('home.customer_number') }}
                                    </label>
                                    <input type="text" name="add_customer_number" class="form-control"
                                        value="">
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
                                    <input type="text" name="add_company" class="form-control" value="">
                                    @if ($errors->has('company'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.company_addition') }} </label>
                                    <input type="text" name="add_company_addition" class="form-control"
                                        value="">
                                    @if ($errors->has('company_addition'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" style="padding-right:0">
                                <div class="form-group form_dv_wrap">
                                    <label class="">{{ __('home.name') }}</label>
                                    <input type="text" name="add_name" class="form-control" value="">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label class="" style="width:65px;">{{ __('home.first_name') }}</label>
                                    <input type="text" name="add_first_name" class="form-control"
                                        style="width: calc(100% - 75px) !important;" value="">
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.street_number') }}</label>
                                    <input type="text" name="add_street_number" class="form-control" value="">
                                    @if ($errors->has('street_number'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" style="width: 42%;">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.postal_code') }}</label>
                                    <input type="text" name="add_postal_code" class="form-control" value="">
                                    @if ($errors->has('postal_code'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" style="width: 58%; padding-left:0;">
                                <div class="form-group form_dv_wrap">
                                    <label style="width:30px">{{ __('home.location') }}</label>
                                    <input type="text" name="add_location" class="form-control"
                                        style="width: calc(100% - 40px) !important;" value="">
                                    @if ($errors->has('location'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.country') }}</label>
                                    <select name="add_country" class="form-control">
                                        <option value="Deutschland">Deutschland</option>
                                        <option value="Österreich">Österreich</option>
                                        <option value="Schweiz">Schweiz</option>
                                        <option value="Italien">Italien</option>
                                        <option value="Niederlande">Niederlande</option>
                                    </select>
                                    @if ($errors->has('country'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label class="">{{ __('home.email') }}</label>
                                    <input type="email" name="add_email" class="form-control" value="">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.website') }}</label>
                                    <input type="text" name="add_website" class="form-control" value="">
                                    @if ($errors->has('website'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" style="padding-right: 0;">
                                <div class="form-group form_dv_wrap">
                                    <label class="">{{ __('home.phone') }} </label>
                                    <input type="text" name="add_phone" class="form-control" value="">
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
                                    <input type="text" name="add_mobile" class="form-control"
                                        style="width: calc(100% - 75px) !important;" value="">
                                    @if ($errors->has('mobile'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label class="">{{ __('home.password') }} </label>
                                    <input type="text" name="add_password" class="form-control" value="">
                                    @if ($errors->has('password'))
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
                                    <input type="text" name="add_tax_number" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label style="width:60px;">{{ __('home.vat_number') }} </label>
                                    <input type="text" name="add_vat_number" class="form-control"
                                        style="width: calc(100% - 70px) !important;" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" style="padding-right:0;">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.register_number') }} </label>
                                    <input type="text" name="add_register_number" class="form-control"
                                        value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12"></div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.kd_group') }} </label>
                                    <select name="add_kd_group" class="form-control">
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
                                    <select name="add_kd_category" class="form-control">
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
                                    <select name="add_payment_method" class="form-control">
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
                                    <input type="text" name="add_bank_name" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" style="padding-right: 0; padding-bottom:10px;">
                                <div class="form-group form_dv_wrap">
                                    <label>{{ __('home.IBAN') }} </label>
                                    <input type="text" name="add_IBAN" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group form_dv_wrap">
                                    <label style="width:60px;">{{ __('home.BIC') }} </label>
                                    <input type="text" name="add_BIC" class="form-control"
                                        style="width: calc(100% - 70px) !important;" value="">
                                </div>
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-12 ">
                                <div class="upload_btn">
                                    <button class="btn btn-primary btn-block" type="submit">KUNDE
                                        ERFASSEN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>

<script>
    $('#admin_add_customer').submit(function(e) {
        e.preventDefault();
        var add_customer_data = new FormData();
        add_customer_data.append('customer_number', $('[name = add_customer_number]').val());
        add_customer_data.append('name', $('[name = add_name]').val());
        add_customer_data.append('first_name', $('[name = add_first_name]').val());
        add_customer_data.append('company', $('[name = add_company]').val());
        add_customer_data.append('company_addition', $('[name = add_company_addition]').val());
        add_customer_data.append('street_number', $('[name = add_street_number]').val());
        add_customer_data.append('postal_code', $('[name = add_postal_code]').val());
        add_customer_data.append('location', $('[name = add_location]').val());
        add_customer_data.append('country', $('[name = add_country]').val());
        add_customer_data.append('email', $('[name = add_email]').val());
        add_customer_data.append('website', $('[name = add_website]').val());
        add_customer_data.append('phone', $('[name = add_phone]').val());
        add_customer_data.append('mobile', $('[name = add_mobile]').val());
        add_customer_data.append('tax_number', $('[name = add_tax_number]').val());
        add_customer_data.append('vat_number', $('[name = add_vat_number]').val());
        add_customer_data.append('register_number', $('[name = add_register_number]').val());
        add_customer_data.append('kd_group', $('[name = add_kd_group]').val());
        add_customer_data.append('kd_category', $('[name = add_kd_category]').val());
        add_customer_data.append('payment_method', $('[name = add_payment_method]').val());
        add_customer_data.append('bank_name', $('[name = add_bank_name]').val());
        add_customer_data.append('IBAN', $('[name = add_IBAN]').val());
        add_customer_data.append('BIC', $('[name = add_BIC]').val());
        add_customer_data.append('password', $('[name = add_password]').val());

        $.ajax({
            url: '{{ __('routes.admin-add-customer') }}',
            type: 'post',
            contentType: false,
            processData: false,
            data: add_customer_data,
            success: () => {
                $('#customer_list_table_reload_button').trigger('click');
                $('[name = add_customer_number]').val('');
                $('[name = add_name]').val('');
                $('[name = add_first_name]').val('');
                $('[name = add_company]').val('');
                $('[name = add_company_addition]').val('');
                $('[name = add_street_number]').val('');
                $('[name = add_postal_code]').val('');
                $('[name = add_location]').val('');
                $('[name = add_country]').val('');
                $('[name = add_email]').val('');
                $('[name = add_website]').val('');
                $('[name = add_phone]').val('');
                $('[name = add_mobile]').val('');
                $('[name = add_tax_number]').val('');
                $('[name = add_vat_number]').val('');
                $('[name = add_register_number]').val('');
                $('[name = add_kd_group]').val('');
                $('[name = add_kd_category]').val('');
                $('[name = add_payment_method]').val('');
                $('[name = add_bank_name]').val('');
                $('[name = add_IBAN]').val('');
                $('[name = add_BIC]').val('');
                $('[name = add_password]').val('');
            },
            error: (err) => {
                console.error('error!');
            }
        })
    })
</script>
