<section class="customer_parameters_section">
    <div class="pagetitle">
        <h1>{{ __('home.customer_parameters') }}</h1>
        <p></p>
    </div>
    <div class="order_fome_container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <fieldset class="field-group row">
                    <legend class="field-caption">
                        {{ __('home.embroidery_file_information') }}</legend>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.yarn_information') }}
                            </label>
                            <input type="text" name="country" class="form-control"
                                style="width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.need_embroidery_files') }}
                            </label>
                            <input type="text" name="country" class="form-control"
                                style="width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.cutting_options') }}
                            </label>
                            <input type="text" name="country" class="form-control"
                                style="width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.special_cutting_options') }}
                            </label>
                            <input type="text" name="country" class="form-control"
                                style="width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.needle_instructions') }}
                            </label>
                            <input type="text" name="country" class="form-control"
                                style="width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.standard_instructions') }}
                            </label>
                            <input type="text" name="country" class="form-control"
                                style="width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12" style="margin-bottom:5px;">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.special_standard_instructions') }}
                            </label>
                            <input type="text" name="country" class="form-control"
                                style="height:70px; width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>

                </fieldset>
            </div>
            <div class="col-lg-6 col-md-6 col-12"
                style="display: flex; flex-direction:column; justify-content:space-between;">
                <fieldset class="field-group row">
                    <legend class="field-caption">
                        {{ __('home.vector_file_information') }}</legend>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.required_vector_file') }}
                            </label>
                            <input type="text" name="country" class="form-control"
                                style="width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12" style="margin-bottom:5px;">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.required_image_file') }}
                            </label>
                            <input type="text" name="country" class="form-control"
                                style="width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-12 ">
                        <div class="upload_btn">
                            @if (@auth()->user()->user_type == 'customer')
                                <button class="btn btn-primary btn-block"
                                    type="submit">{{ __('home.request_change') }}</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
