<section class="page_section">
    <div class="row">
        <div class="col-md-1 col-xl-2"></div>
        <div class="col-12 col-md-10 col-xl-8">
            <div class="pagetitle">Kunde erfassen
            </div>
            <div style="font-size: 13px; font-family:'Inter';">
                <form id="admin_add_customer" action="">
                    <div class="customer_profile_page">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <fieldset class="field-group row">
                                    <legend class="field-caption">{{ __('home.general_information') }}</legend>
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap">
                                            <div class="row">
                                                <div class="col-12 col-md-3 form_label">
                                                    <label class="control-label">{{ __('home.customer_number') }}
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="add_customer_number"
                                                        class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-12"></div>
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
                                                    <input type="text" name="add_company" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                            @if ($errors->has('company'))
                                                <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                        class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
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
                                                    <input type="text" name="add_company_addition"
                                                        class="form-control" value="">
                                                </div>
                                            </div>
                                            @if ($errors->has('company_addition'))
                                                <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                        class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
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
                                                    <input type="text" name="add_name" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                        class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
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
                                                    <input type="text" name="add_first_name" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                            @if ($errors->has('first_name'))
                                                <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                        class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
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
                                                    <input type="text" name="add_street_number" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                            @if ($errors->has('street_number'))
                                                <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                        class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
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
                                                    <input type="text" name="add_postal_code" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                            @if ($errors->has('postal_code'))
                                                <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                        class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
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
                                                    <input type="text" name="add_location" class="form-control"
                                                        value="">
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
                                                    <select name="add_country" class="form-control">
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
                                                    <label>{{ __('home.email') }} <span
                                                            class="reqiurd">*</span></label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="add_email" class="form-control"
                                                        value="">
                                                    <div class="add_customer_validation_email">
                                                        E-Mail ist erforderlich
                                                    </div>
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
                                                    <input type="text" name="add_website" class="form-control"
                                                        value="">
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
                                                    <input type="text" name="add_phone" class="form-control"
                                                        value="">
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
                                                    <input type="text" name="add_mobile" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                            @if ($errors->has('mobile'))
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
                                                    <label>{{ __('home.password') }} <span
                                                            class="reqiurd">*</span></label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="add_password" class="form-control"
                                                        value="">
                                                    <div class="add_customer_validation_password">
                                                        Passwort wird benötigt
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($errors->has('password'))
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
                                                    <input type="text" name="add_tax_number" class="form-control"
                                                        value="">
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
                                                    <input type="text" name="add_vat_number" class="form-control"
                                                        value="">
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
                                                    <input type="text" name="add_register_number"
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
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group form_dv_wrap">
                                            <div class="row">
                                                <div class="col-12 col-md-3 form_label">
                                                    <label>{{ __('home.kd_category') }} </label>
                                                </div>
                                                <div class="col-12 col-md-9">
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
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group form_dv_wrap">
                                            <div class="row">
                                                <div class="col-12 col-md-3 form_label">
                                                    <label>{{ __('home.payment_method') }} </label>
                                                </div>
                                                <div class="col-12 col-md-9">
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
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group form_dv_wrap">
                                            <div class="row">
                                                <div class="col-12 col-md-3 form_label">
                                                    <label>{{ __('home.bank_name') }} </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="add_bank_name" class="form-control"
                                                        value="">
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
                                                    <input type="text" name="add_IBAN" class="form-control"
                                                        value="">
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
                                                    <input type="text" name="add_BIC" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row">
                                    <div class="col-12 ">
                                        <div class="upload_btn">
                                            <button class="btn btn-primary btn-block" type="submit">Kunde
                                                erfassen</button>
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
</section>
<script>
    $(function() {
        $('#admin_add_customer').submit(function(e) {
            e.preventDefault();
            if ($('[name=add_email]').val() != "" && $('[name=add_password]').val() != "") {
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
            }
            if ($('[name=add_email]').val() == "") {
                $('.add_customer_validation_email').show();
                $('[name=add_email]').css("border", "1px solid red");
            }
            if ($('[name=add_password]').val() == "") {
                $('.add_customer_validation_password').show();
                $('[name=add_password]').css("border", "1px solid red");
            }


        });
        $('[name=add_email]').keyup(function(e) {
            if ($(this).val() != "") {
                $('.add_customer_validation_email').hide();
                $('[name=add_email]').css("border", "1px solid #ddd");
            }
        });
        $('[name=add_password]').keyup(function(e) {
            if ($(this).val() != "") {
                $('.add_customer_validation_password').hide();
                $('[name=add_password]').css("border", "1px solid #ddd");
            }
        });
    })
</script>
