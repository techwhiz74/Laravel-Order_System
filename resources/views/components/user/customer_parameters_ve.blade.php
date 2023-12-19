<section class="page_section">
    <div class="row">
        <div class="col-md-1 col-xl-2"></div>
        <div class="col-12 col-md-10 col-xl-8">
            <div class="pagetitle">
                {{ __('home.customer_ve_parameters') }}
            </div>
            <div class="order_fome_container">
                <div class="row">
                    <div class="col-12">
                        <fieldset class="field-group row">
                            <legend class="field-caption">
                                {{ __('home.vector_file_information') }}</legend>
                            <div class="col-12">
                                <div class="form-group form_dv_wrap">
                                    <div class="row">
                                        <div class="col-12 col-md-3 form_label">
                                            <label>{{ __('home.required_vector_file') }}
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            @if (auth()->user()->user_type == 'customer')
                                                @if (auth()->user()->customerVeParameter)
                                                    <select name="parameter_required_vector_file" multiple>
                                                        <option value="Adobe Illustrator (*.AI)"
                                                            {{ str_contains(auth()->user()->customerVeParameter->parameter8, 'Adobe Illustrator (*.AI)') ? 'selected' : '' }}>
                                                            Adobe Illustrator (*.AI)</option>
                                                        <option value="Adobe PDF (*.PDF)"
                                                            {{ str_contains(auth()->user()->customerVeParameter->parameter8, 'Adobe PDF (*.PDF)') ? 'selected' : '' }}>
                                                            Adobe PDF (*.PDF)</option>
                                                        <option value="Illustrator EPS (*.EPS)"
                                                            {{ str_contains(auth()->user()->customerVeParameter->parameter8, 'Illustrator EPS (*.EPS)') ? 'selected' : '' }}>
                                                            Illustrator EPS (*.EPS)</option>
                                                        <option value="Illustrator Template (*.AIT)"
                                                            {{ str_contains(auth()->user()->customerVeParameter->parameter8, 'Illustrator Template (*.AIT)') ? 'selected' : '' }}>
                                                            Illustrator Template (*.AIT)</option>
                                                        <option value="SVG (*.SVG)"
                                                            {{ str_contains(auth()->user()->customerVeParameter->parameter8, 'SVG (*.SVG)') ? 'selected' : '' }}>
                                                            SVG (*.SVG)</option>
                                                        <option value="SVG komprimiert (*.SVGZ)"
                                                            {{ str_contains(auth()->user()->customerVeParameter->parameter8, 'SVG komprimiert (*.SVGZ)') ? 'selected' : '' }}>
                                                            SVG komprimiert (*.SVGZ)</option>
                                                    </select>
                                                @else
                                                    <select name="parameter_required_vector_file" multiple>
                                                        <option value="Adobe Illustrator (*.AI)">
                                                            Adobe Illustrator (*.AI)</option>
                                                        <option value="Adobe PDF (*.PDF)">
                                                            Adobe PDF (*.PDF)</option>
                                                        <option value="Illustrator EPS (*.EPS)">
                                                            Illustrator EPS (*.EPS)</option>
                                                        <option value="Illustrator Template (*.AIT)">
                                                            Illustrator Template (*.AIT)</option>
                                                        <option value="SVG (*.SVG)">
                                                            SVG (*.SVG)</option>
                                                        <option value="SVG komprimiert (*.SVGZ)">
                                                            SVG komprimiert (*.SVGZ)</option>
                                                    </select>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group form_dv_wrap">
                                    <div class="row">
                                        <div class="col-12 col-md-3 form_label">
                                            <label>{{ __('home.required_image_file') }}
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            @if (auth()->user()->user_type == 'customer')
                                                @if (auth()->user()->customerVeParameter)
                                                    <select name="parameter_required_image_file" multiple>
                                                        <option value="BMP (*.BMP)"
                                                            {{ str_contains(auth()->user()->customerVeParameter->parameter9, 'BMP (*.BMP)') ? 'selected' : '' }}>
                                                            BMP (*.BMP)</option>
                                                        <option value="JPEG (*.JPG)"
                                                            {{ str_contains(auth()->user()->customerVeParameter->parameter9, 'JPEG (*.JPG)') ? 'selected' : '' }}>
                                                            JPEG (*.JPG)
                                                        </option>
                                                        <option value="PNG (*.PNG)"
                                                            {{ str_contains(auth()->user()->customerVeParameter->parameter9, 'PNG (*.PNG)') ? 'selected' : '' }}>
                                                            PNG (*.PNG)</option>
                                                        <option value="TIFF (*.TIF)"
                                                            {{ str_contains(auth()->user()->customerVeParameter->parameter9, 'TIFF (*.TIF)') ? 'selected' : '' }}>
                                                            TIFF (*.TIF)</option>
                                                        <option value="WebP (*.WEBP)"
                                                            {{ str_contains(auth()->user()->customerVeParameter->parameter9, 'WebP (*.WEBP)') ? 'selected' : '' }}>
                                                            WebP (*.WEBP)
                                                        </option>
                                                    </select>
                                                @else
                                                    <select name="parameter_required_image_file" multiple>
                                                        <option value="BMP (*.BMP)">BMP (*.BMP)</option>
                                                        <option value="JPEG (*.JPG)">JPEG (*.JPG)
                                                        </option>
                                                        <option value="PNG (*.PNG)">PNG (*.PNG)</option>
                                                        <option value="TIFF (*.TIF)">
                                                            TIFF (*.TIF)</option>
                                                        <option value="WebP (*.WEBP)">WebP (*.WEBP)
                                                        </option>
                                                    </select>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-12 ">
                                <div class="upload_btn">
                                    <button class="btn btn-primary btn-block" type="submit"
                                        id="customer_ve_parameter_submit">{{ __('home.request_change') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-xl-2"></div>
    </div>
</section>
@include('components.user.change_ve_parameter_success')
