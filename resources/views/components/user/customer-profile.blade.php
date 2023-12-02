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

<section class="page_section">
    <div class="row">
        <div class="col-md-1 col-xl-2"></div>
        <div class="col-12 col-md-10 col-xl-8">
            <div class="pagetitle">
                {{ __('home.sample_customer') }}
            </div>
            <form id="request_profile_form" action="" class="order_fome_container">
                <div class="customer_profile_page">
                    <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}" />
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
                                                <input type="text" readonly name="customer_number"
                                                    class="form-control" value="{{ @$user->customer_number }}">
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
                                                <input type="text" name="profile_company" class="form-control"
                                                    value="{{ @$user->company }}">
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
                                                <input type="text" name="profile_company_addition"
                                                    class="form-control" value="{{ @$user->company_addition }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('company_addition'))
                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-6 form_label">
                                                <label class="">{{ __('home.name') }}</label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" name="profile_name" class="form-control"
                                                    value="{{ @$user->name }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-5 form_label">
                                                <label class="">{{ __('home.first_name') }}</label>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <input type="text" name="profile_first_name" class="form-control"
                                                    value="{{ @$user->first_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-3 form_label">
                                                <label>{{ __('home.street_number') }}</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="profile_street_number" class="form-control"
                                                    value="{{ @$user->street_number }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('street_number'))
                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-6 form_label">
                                                <label>{{ __('home.postal_code') }}</label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" name="profile_postal_code" class="form-control"
                                                    value="{{ @$user->postal_code }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('postal_code'))
                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-5 form_label">
                                                <label style="width:60px">{{ __('home.location') }}</label>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <input type="text" name="profile_location" class="form-control"
                                                    value="{{ @$user->location }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('location'))
                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-3 form_label">
                                                <label>{{ __('home.country') }}</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="profile_country" class="form-control">
                                                    <option value="Deutschland"
                                                        {{ @$user->country == 'Deutschland' ? 'selected' : '' }}>
                                                        Deutschland
                                                    </option>
                                                    <option value="Österreich"
                                                        {{ @$user->country == 'Österreich' ? 'selected' : '' }}>
                                                        Österreich
                                                    </option>
                                                    <option value="Schweiz"
                                                        {{ @$user->country == 'Schweiz' ? 'selected' : '' }}>
                                                        Schweiz</option>
                                                    <option value="Italien"
                                                        {{ @$user->country == 'Italien' ? 'selected' : '' }}>
                                                        Italien</option>
                                                    <option value="Niederlande"
                                                        {{ @$user->country == 'Niederlande' ? 'selected' : '' }}>
                                                        Niederlande
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        @if ($errors->has('country'))
                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-3 form_label">
                                                <label class="">{{ __('home.email') }}</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="email" name="profile_email" class="form-control"
                                                    value="{{ @$user->email }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-3 form_label">
                                                <label>{{ __('home.website') }}</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="profile_website" class="form-control"
                                                    value="{{ @$user->website }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('website'))
                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-6 form_label">
                                                <label class="">{{ __('home.phone') }} </label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" name="profile_phone" class="form-control"
                                                    value="{{ @$user->phone }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-5 form_label">
                                                <label class="">{{ __('home.mobile') }}
                                                </label>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <input type="text" name="profile_mobile" class="form-control"
                                                    value="{{ @$user->mobile }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('mobile'))
                                            <span class="text-danger">{{ __('home.requiredMessage') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
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
                                <div class="col-md-6 col-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-6 form_label">
                                                <label>{{ __('home.tax_number') }} </label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" name="profile_tax_number" class="form-control"
                                                    value="{{ @$user->tax_number }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-5 form_label">
                                                <label style="width:60px;">{{ __('home.vat_number') }} </label>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <input type="text" name="profile_vat_number" class="form-control"
                                                    value="{{ @$user->vat_number }}">
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
                                                <input type="text" name="profile_register_number"
                                                    class="form-control" value="{{ @$user->register_number }}">
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
                                                <select name="profile_kd_group" class="form-control">
                                                    <option value=""></option>
                                                    <option value="Wiederverkäufer"
                                                        {{ @$user->kd_group == 'Wiederverkäufer' ? 'selected' : '' }}>
                                                        Wiederverkäufer
                                                    </option>
                                                    <option value="Endkunde"
                                                        {{ @$user->kd_group == 'Endkunde' ? 'selected' : '' }}>Endkunde
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
                                                <select name="profile_kd_category" class="form-control">
                                                    <option value=""></option>
                                                    <option value="Stickprogramme & Vektordateien"
                                                        {{ @$user->kd_category == 'Stickprogramme & Vektordateien' ? 'selected' : '' }}>
                                                        Stickprogramme & Vektordateien
                                                    </option>
                                                    <option value="Standard"
                                                        {{ @$user->kd_category == 'Standard' ? 'selected' : '' }}>
                                                        Standard
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
                                                <select name="profile_payment_method" class="form-control">
                                                    <option value=""></option>
                                                    <option value="Sofort ohne Abzug"
                                                        {{ @$user->payment_method == 'Sofort ohne Abzug' ? 'selected' : '' }}>
                                                        Sofort ohne Abzug
                                                    </option>
                                                    <option value="Lastschrift"
                                                        {{ @$user->payment_method == 'Lastschrift' ? 'selected' : '' }}>
                                                        Lastschrift
                                                    </option>
                                                    <option value="Vorkasse"
                                                        {{ @$user->payment_method == 'Vorkasse' ? 'selected' : '' }}>
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
                                                <input type="text" name="profile_bank_name" class="form-control"
                                                    value="{{ @$user->bank_name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-6 form_label">
                                                <label>{{ __('home.IBAN') }} </label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" name="profile_IBAN" class="form-control"
                                                    value="{{ @$user->IBAN }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group form_dv_wrap">
                                        <div class="row">
                                            <div class="col-12 col-md-5 form_label">
                                                <label style="width:60px;">{{ __('home.BIC') }} </label>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <input type="text" name="profile_BIC" class="form-control"
                                                    value="{{ @$user->BIC }}">
                                            </div>
                                        </div>
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
        <div class="col-md-1 col-xl-2"></div>
    </div>
</section>
@include('components.user.change_profile_success')
