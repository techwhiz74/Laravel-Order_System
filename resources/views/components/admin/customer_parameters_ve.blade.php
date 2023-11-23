<div class="modal fade" id="admin_customer_parameters_ve_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="overflow-y: hidden;">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <button type="button" class="backbutton" style="margin: 20px 0 0 20px;" onclick="hideModal()"><i
                    class="fa-solid fa-left-long" style="display: flex;"></i></button>
            <div style="padding: 0 12vw">
                <div class="pagetitle" style="margin-top: 0 !important;">
                    <h1>{{ __('home.customer_ve_parameters') }}</h1>
                    <p></p>
                </div>
                <div style="padding: 20px 10vw">
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
                                            @if (auth()->user()->user_type == 'admin')
                                                @if (auth()->user()->tempCustomerVeParameter)
                                                    <select name="admin_parameter_require_vector_file" multiple>
                                                        <option value="Adobe Illustrator (*.AI)">
                                                            Adobe Illustrator (*.AI)
                                                        </option>
                                                        <option value="Adobe PDF (*.PDF)">
                                                            Adobe PDF (*.PDF)</option>
                                                        <option value="Illustrator EPS (*.EPS)">
                                                            Illustrator EPS (*.EPS)
                                                        </option>
                                                        <option value="Illustrator Template (*.AIT)">
                                                            Illustrator Template (*.AIT)</option>
                                                        <option value="SVG (*.SVG)">
                                                            SVG (*.SVG)</option>
                                                        <option value="SVG komprimiert (*.SVGZ)">
                                                            SVG komprimiert (*.SVGZ)
                                                        </option>
                                                    </select>
                                                @else
                                                    <select name="admin_parameter_require_vector_file" multiple>
                                                        <option value="Adobe Illustrator (*.AI)">Adobe Illustrator
                                                            (*.AI)
                                                        </option>
                                                        <option value="Adobe PDF (*.PDF)">Adobe PDF (*.PDF)
                                                        </option>
                                                        <option value="Illustrator EPS (*.EPS)">Illustrator EPS (*.EPS)
                                                        </option>
                                                        <option value="Illustrator Template (*.AIT)">Illustrator
                                                            Template
                                                            (*.AIT)</option>
                                                        <option value="SVG (*.SVG)">SVG (*.SVG)</option>
                                                        <option value="SVG komprimiert (*.SVGZ)">SVG komprimiert
                                                            (*.SVGZ)
                                                        </option>
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
                                            <select name="admin_parameter_require_image_file" multiple>
                                                <option value="BMP (*.BMP)">BMP (*.BMP)</option>
                                                <option value="JPEG (*.JPG)">JPEG (*.JPG)</option>
                                                <option value="PNG (*.PNG)">PNG (*.PNG)</option>
                                                <option value="TIFF (*.TIF)">TIFF (*.TIF)</option>
                                                <option value="WebP (*.WEBP)">WebP (*.WEBP)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="upload_btn" id="admin_ve_parameter_buttons" style="display: none">
                                        <button class="btn btn-primary btn-block" type="submit"
                                            id="admin_ve_parameter_confirm">Bestätigen</button>
                                        <button class="btn btn-primary btn-block" type="submit"
                                            id="admin_ve_parameter_decline">Ablehnen</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        window.prettyPrint() && prettyPrint();
        $('[name=admin_parameter_require_image_file]').multiselect({
            // buttonWidth: '300px'
        });
    });
    $(function() {
        window.prettyPrint() && prettyPrint();
        $('[name=admin_parameter_require_vector_file]').multiselect({
            // buttonWidth: '300px'
        });
    });
    $(function() {
        $('#admin_ve_parameter_confirm').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-change-ve-parameter-confirm') }}',
                type: 'post',
                data: {
                    customer_id: $('[name=admin_ve_parameter_customer_id]').val()
                },
                success: () => {
                    $('#admin_ve_parameter_buttons').hide();
                    $.ajax({
                        url: '{{ __('routes.admin-change-ve-parameter-confirm-mail') }}',
                        type: 'get',
                        data: {
                            customer_id: $('[name=admin_ve_parameter_customer_id]')
                                .val()
                        },
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
        $('#admin_ve_parameter_decline').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-change-ve-parameter-decline') }}',
                type: 'post',
                data: {
                    customer_id: $('[name=admin_ve_parameter_customer_id]').val()
                },
                success: () => {
                    $('#admin_ve_parameter_buttons').hide();
                    $.ajax({
                        url: '{{ __('routes.admin-change-ve-parameter-decline-mail') }}',
                        type: 'get',
                        data: {
                            customer_id: $('[name=admin_ve_parameter_customer_id]')
                                .val()
                        },
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
