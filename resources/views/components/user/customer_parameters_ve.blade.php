<section class="customer_parameters_ve_section">
    <div class="pagetitle">
        <h1>{{ __('home.customer_ve_parameters') }}</h1>
        <p></p>
    </div>
    <div class="order_fome_container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12"
                style="display: flex; flex-direction:column; justify-content:space-between;">
                <fieldset class="field-group row">
                    <legend class="field-caption">
                        {{ __('home.vector_file_information') }}</legend>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap" style="display: flex; align-items:center;">
                            <label style="width: 200px;">{{ __('home.required_vector_file') }}
                            </label>
                            <div style="width: calc(100% - 205px) !important;">
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
                    <div class="col-lg-12 col-md-12" style="margin-bottom:5px;">
                        <div class="form-group form_dv_wrap" style="display: flex; align-items:center;">
                            <label style="width: 200px;">{{ __('home.required_image_file') }}
                            </label>
                            <div style="width: calc(100% - 205px) !important;">
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

</section>

<script>
    $(function() {
        window.prettyPrint() && prettyPrint();
        $('[name=parameter_required_vector_file]').multiselect({
            // buttonWidth: '300px'
        });
        $('[name=parameter_required_image_file]').multiselect({
            // buttonWidth: '300px'
        });
    });
    $(function() {
        $('#customer_parameters_ve1').click(function() {
            $.ajax({
                url: '{{ __('routes.customer-get-ve-parameter') }}',
                type: 'get',
                success: (parameter) => {
                    var vectorFiles = parameter.parameter8.split(', ');
                    var imageFiles = parameter.parameter9.split(', ');
                    vectorFiles.forEach(item => {
                        console.log(item);
                        $('[name=parameter_required_vector_file]').find(
                            'option[value="' + item + '"]').attr('selected',
                            'selected');
                    });
                    imageFiles.forEach(item => {
                        console.log(item);
                        $('[name=parameter_required_image_file]').find(
                            'option[value="' + item + '"]').attr('selected',
                            'selected');
                    });
                },
                error: () => {
                    console.error("error");
                }
            });
        });
        $('#customer_ve_parameter_submit').click(function() {
            var ve_parameter_data = new FormData();
            ve_parameter_data.append('parameter8', $('[name=parameter_required_vector_file]').val()
                .join(', '));
            ve_parameter_data.append('parameter9', $('[name=parameter_required_image_file]').val().join(
                ', '));
            $.ajax({
                url: '{{ __('routes.customer-ve-parameter-change') }}',
                type: 'post',
                data: ve_parameter_data,
                contentType: false,
                processData: false,
                success: () => {
                    $('#customer_ve_parameter_submit').hide();
                    $.ajax({
                        url: '{{ __('routes.customer-ve-parameter-change-mail') }}',
                        type: 'get',
                        success: () => {
                            console.log("success");
                        },
                        error: () => {
                            console.error("error");
                        }
                    })
                },
                error: () => {
                    console.error("error");
                }
            })
        })
    })
</script>
