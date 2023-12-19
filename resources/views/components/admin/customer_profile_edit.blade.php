<div class="modal fade" id="admin_customer_profile_edit_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244); ">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>
            <div class="row" style="margin-top: -30px;">
                <div class="col-md-1 col-xl-2"></div>
                <div class="col-12 col-md-10 col-xl-8">
                    <div class="pagetitle">Änderung des Kundenprofils
                    </div>
                    <div style="font-size: 13px; font-family:'Inter';">
                        <form id="admin_change_profile_form" action="">
                            <input type="hidden" name="admin_change_profile_id" value="" />
                            <div class="customer_profile_page">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <fieldset class="field-group row">
                                            <legend class="field-caption">{{ __('home.general_information') }}</legend>
                                            <div class="col-6" style="display: flex; align-items:center;">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.customer_number') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="text" name="admin_customer_number"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6"
                                                style="display: flex; justify-content:end; padding-bottom:12px">
                                                <div class="customer_avatar">
                                                    <div id="customer_avatar_i">
                                                        <i class="fa-solid fa-circle-user fa-3x"
                                                            style="color:#fff;"></i>
                                                    </div>
                                                    <img src="" alt="customer avatar"
                                                        style="width:40px; height:40px" id="customer_avatar">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <fieldset class="field-group row">
                                            <legend class="field-caption">{{ __('home.customer_data') }}</legend>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3 form_label">
                                                            <label>{{ __('home.company') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" name="admin_company"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('company'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3 form_label">
                                                            <label>{{ __('home.company_addition') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" name="admin_company_addition"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('company_addition'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 form_label">
                                                            <label>{{ __('home.name') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="text" name="admin_name" class="form-control"
                                                                value="">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 form_label">
                                                            <label>{{ __('home.first_name') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="text" name="admin_first_name"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('first_name'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3 form_label">
                                                            <label>{{ __('home.street_number') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" name="admin_street_number"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('street_number'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 form_label">
                                                            <label>{{ __('home.postal_code') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="text" name="admin_postal_code"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('postal_code'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 form_label">
                                                            <label>{{ __('home.location') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="text" name="admin_location"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('location'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3 form_label">
                                                            <label>{{ __('home.country') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="admin_country" class="form-control">
                                                                <option value="Deutschland">Deutschland</option>
                                                                <option value="Österreich">Österreich</option>
                                                                <option value="Schweiz">Schweiz</option>
                                                                <option value="Italien">Italien</option>
                                                                <option value="Niederlande">Niederlande</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('country'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3 form_label">
                                                            <label>{{ __('home.email') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" name="admin_email"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3 form_label">
                                                            <label>{{ __('home.website') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" name="admin_website"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('website'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 form_label">
                                                            <label>{{ __('home.phone') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="text" name="admin_phone"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('phone'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 form_label">
                                                            <label>{{ __('home.mobile') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="text" name="admin_mobile"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('mobile'))
                                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                                class="fa fa-exclamation-circle"
                                                                aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-12"
                                        style="display: flex; flex-direction:column; justify-content:space-between">
                                        <fieldset class="field-group row">
                                            <legend class="field-caption">{{ __('home.customer_information') }}
                                            </legend>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 form_label">
                                                            <label>{{ __('home.tax_number') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="text" name="admin_tax_number"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 form_label">
                                                            <label>{{ __('home.vat_number') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="text" name="admin_vat_number"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3 form_label">
                                                            <label>{{ __('home.register_number') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" name="admin_register_number"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3 form_label">
                                                            <label>{{ __('home.kd_group') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="admin_kd_group" class="form-control">
                                                                <option value=""></option>
                                                                <option value="Wiederverkäufer">
                                                                    Wiederverkäufer
                                                                </option>
                                                                <option value="Endkunde">Endkunde
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3 form_label">
                                                            <label>{{ __('home.kd_category') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="admin_kd_category" class="form-control">
                                                                <option value=""></option>
                                                                <option value="Stickprogramme & Vektordateien">
                                                                    Stickprogramme & Vektordateien
                                                                </option>
                                                                <option value="Standard">Standard
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3 form_label">
                                                            <label>{{ __('home.payment_method') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="admin_payment_method" class="form-control">
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
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3 form_label">
                                                            <label>{{ __('home.bank_name') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" name="admin_bank_name"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 form_label">
                                                            <label>{{ __('home.IBAN') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="text" name="admin_IBAN"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 form_label">
                                                            <label>{{ __('home.BIC') }} </label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="text" name="admin_BIC"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="row">
                                            <div class="col-12 ">
                                                <div class="upload_btn">
                                                    <button class="btn btn-primary btn-block" type="button"
                                                        id="confirm_customer_button">KUNDEN ENTSPERREN</button>
                                                    <button class="btn btn-primary btn-block" type="button"
                                                        id="decline_customer_button">KUNDENKONTO ABLEHNEN</button>
                                                    <button class="btn btn-primary btn-block" type="submit"
                                                        id="save_customer_button">KUNDEN ÄNDERN</button>
                                                    <button type="button" id="customer_accept"
                                                        class="btn btn-primary btn-block">ANNEHMEN</button>
                                                    <button type="button" id="customer_decline"
                                                        class="btn btn-primary btn-block">ABLEHNEN</button>
                                                    <button class="btn btn-primary btn-block" type="button"
                                                        id="change_customer_avatar">AVATAR ÄNDERN</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-1 col-xl-2"></div>
            </div>
        </div>
    </div>
</div>
@include('components.admin.change-customer-avatar')
<script>
    function editCustomerProfile(id) {
        $('#decline_customer_button').hide();
        $('#confirm_customer_button').hide();
        $('#save_customer_button').hide();
        $('#customer_accept').hide();
        $('#customer_decline').hide();
        $('#customer_avatar_i').show();
        $('#customer_avatar').hide();
        $.ajax({
            url: '{{ __('routes.admin-get-customer-profile') }}',
            type: 'get',
            data: {
                id
            },
            success: (response) => {
                $('#admin_customer_profile_edit_popup').modal("show");
                console.log("profile", response.profile);
                console.log("temp", response.temp);
                if (response.profile.image != "") {
                    $('#customer_avatar').show();
                    $('#customer_avatar_i').hide();
                    $('#customer_avatar').attr('src', response.profile.image);
                }
                $('[name=admin_change_profile_id]').val(response.profile.id);
                $('[name=admin_customer_number]').val(response.profile.customer_number);
                $('[name=admin_name]').val(response.profile.name);
                $('[name=admin_name]').css('animation', 'none');
                $('[name=admin_first_name]').val(response.profile.first_name);
                $('[name=admin_first_name]').css('animation', 'none');
                $('[name=admin_email]').val(response.profile.email);
                $('[name=admin_email]').css('animation', 'none');
                $('[name=admin_company]').val(response.profile.company);
                $('[name=admin_company]').css('animation', 'none');
                $('[name=admin_company_addition]').val(response.profile.company_addition);
                $('[name=admin_company_addition]').css('animation', 'none');
                $('[name=admin_street_number]').val(response.profile.street_number);
                $('[name=admin_street_number]').css('animation', 'none');
                $('[name=admin_postal_code]').val(response.profile.postal_code);
                $('[name=admin_postal_code]').css('animation', 'none');
                $('[name=admin_location]').val(response.profile.location);
                $('[name=admin_location]').css('animation', 'none');
                $('[name=admin_country]').val(response.profile.country);
                $('[name=admin_country]').css('animation', 'none');
                $('[name=admin_website]').val(response.profile.website);
                $('[name=admin_website]').css('animation', 'none');
                $('[name=admin_phone]').val(response.profile.phone);
                $('[name=admin_phone]').css('animation', 'none');
                $('[name=admin_mobile]').val(response.profile.mobile);
                $('[name=admin_mobile]').css('animation', 'none');
                $('[name=admin_tax_number]').val(response.profile.tax_number);
                $('[name=admin_tax_number]').css('animation', 'none');
                $('[name=admin_vat_number]').val(response.profile.vat_number);
                $('[name=admin_vat_number]').css('animation', 'none');
                $('[name=admin_register_number]').val(response.profile.register_number);
                $('[name=admin_register_number]').css('animation', 'none');
                $('[name=admin_kd_group]').val(response.profile.kd_group);
                $('[name=admin_kd_group]').css('animation', 'none');
                $('[name=admin_kd_category]').val(response.profile.kd_category);
                $('[name=admin_kd_category]').css('animation', 'none');
                $('[name=admin_payment_method]').val(response.profile.payment_method);
                $('[name=admin_payment_method]').css('animation', 'none');
                $('[name=admin_bank_name]').val(response.profile.bank_name);
                $('[name=admin_bank_name]').css('animation', 'none');
                $('[name=admin_IBAN]').val(response.profile.IBAN);
                $('[name=admin_IBAN]').css('animation', 'none');
                $('[name=admin_BIC]').val(response.profile.BIC);
                $('[name=admin_BIC]').css('animation', 'none');

                if (response.temp != null) {
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
                $('#admin_customer_profile_edit_popup').modal('hide');
                $('#customer_list_table_reload_button').trigger('click');
            },
            error: () => {
                console.error('error!');
            }
        })
    })
    $('#confirm_customer_button').click(function() {
        if ($('[name=admin_customer_number]').val() != null && $('[name=admin_customer_number]').val() !==
            "") {
            var confirm_profile_data = new FormData();
            confirm_profile_data.append('customer_number', $('[name=admin_customer_number]').val());
            confirm_profile_data.append('admin_confirm_profile_id', $('[name=admin_change_profile_id]')
                .val())
            $.ajax({
                url: '{{ __('routes.admin-confirm-profile') }}',
                type: 'post',
                data: confirm_profile_data,
                processData: false,
                contentType: false,
                success: () => {
                    $('#admin_customer_profile_edit_popup').modal('hide');
                    $('#customer_list_table_reload_button').trigger('click');
                    $.ajax({
                        url: '{{ __('routes.admin-confirm-profile-mail') }}',
                        type: 'get',
                        data: {
                            customer_id: $('[name=admin_change_profile_id]').val()
                        },
                        success: () => {
                            console.log("send email successfully");
                        },
                        error: () => {
                            console.error("error");
                        }
                    })
                },
                error: () => {
                    console.error('error');
                }
            });
        }
    })
    $('#decline_customer_button').click(function() {
        $.ajax({
            url: '{{ __('routes.admin-decline-profile-mail') }}',
            type: 'get',
            data: {
                customer_id: $('[name=admin_change_profile_id]').val()
            },
            success: () => {
                console.log("send email successfully");
                $.ajax({
                    url: '{{ __('routes.admin-decline-profile') }}',
                    type: 'post',
                    data: {
                        admin_decline_profile_id: $('[name=admin_change_profile_id]')
                            .val()
                    },
                    success: () => {
                        $('#admin_customer_profile_edit_popup').modal('hide');
                        $('#customer_list_table_reload_button').trigger('click');
                    },
                    error: () => {
                        console.error("error");
                    }
                });
            },
            error: () => {
                console.error("error");
            }
        });
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
                $.ajax({
                    url: '{{ __('routes.admin-accept-change-mail') }}',
                    type: 'get',
                    data: {
                        customer_id: $('[name=admin_change_profile_id]').val()
                    },
                    success: () => {
                        console.log("success");
                    },
                    error: () => {
                        console.error('error');
                    }
                })
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
            success: () => {
                $('#admin_customer_profile_edit_popup').modal("hide");
                $('#customer_list_table_reload_button').trigger('click');
                $.ajax({
                    url: '{{ __('routes.admin-decline-change-mail') }}',
                    type: 'get',
                    data: {
                        customer_id: $('[name=admin_change_profile_id]').val()
                    },
                    success: () => {
                        console.log("success");
                    },
                    error: () => {
                        console.error('error');
                    }
                })
            },
            error: (err) => {
                console.error('error!');
            }
        })
    })
    $('#change_customer_avatar').click(function() {
        $('#change_customer_avatar_popup').modal('show');
        $('#change_customer_avatar_form').submit(function(e) {
            e.preventDefault();
        })
        $('#change_customer_avatar_confirm').click(function() {
            var files = $('[name=change_customer_avatar_input]').prop("files")[0];
            var formData = new FormData();
            formData.append('avatar', files);
            formData.append('customer_id', $('[name=admin_change_profile_id]').val())
            $.ajax({
                url: '{{ __('routes.admin-change-customer-avatar') }}',
                type: 'POST',
                contentType: false,
                processData: false,
                data: formData,
                success: () => {
                    $('#admin_customer_profile_edit_popup').modal('hide');
                    $('#change_customer_avatar_popup').modal('hide');
                    editCustomerProfile($('[name=admin_change_profile_id]').val());
                },
                error: () => {
                    console.error("error");
                }
            });
        });
    })
</script>
