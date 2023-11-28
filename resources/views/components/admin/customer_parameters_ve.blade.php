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
                                    <div class="row">
                                        <div class="col-20">
                                            <label style="width: 200px;">{{ __('home.required_vector_file') }}
                                            </label>
                                        </div>
                                        <div class="col-80">
                                            <div class="dropdown">
                                                <div class="product-multiselect8 dropdown-toggle">
                                                    <div id="selected_ve_parameter8">
                                                    </div>
                                                </div>
                                                <div class="product-item-menu8">
                                                    <div class="row parameter-select-items-vector"
                                                        style="font-size: 13px;">
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Adobe Illustrator (*.AI)" />Adobe
                                                            Illustrator
                                                            (*.AI)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Adobe PDF (*.PDF)" />Adobe PDF
                                                            (*.PDF)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Illustrator EPS (*.EPS)" />Illustrator EPS
                                                            (*.EPS)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Illustrator Template (*.AIT)" />Illustrator
                                                            Template
                                                            (*.AI)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="SVG (*.SVG)" />SVG (*.SV)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="SVG komprimiert (*.SVGZ)">SVG
                                                            komprimiert (*.SVGZ)
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="margin-bottom:5px;">
                                    <div class="row">
                                        <div class="col-20">
                                            <label style="width: 200px;">{{ __('home.required_image_file') }}
                                            </label>
                                        </div>
                                        <div class="col-80">
                                            <div class="dropdown">
                                                <div class="product-multiselect9 dropdown-toggle">
                                                    <div id="selected_ve_parameter9">
                                                    </div>
                                                </div>
                                                <div class="product-item-menu9">
                                                    <div class="row parameter-select-items-image"
                                                        style="font-size: 13px;">
                                                        <div>
                                                            <input type="checkbox" value="BMP (*.BMP)" />BMP (*.BMP)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="JPEG (*.JPG)" />JPEG (*.JPG)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="PNG (*.PNG)" />PNG (*.PNG)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="TIFF (*.TIF)" />TIFF (*.TIF)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="WebP (*.WEBP)" />WebP (*.WEBP)
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                    <div class="upload_btn" id="admin_ve_parameter_change_buttons">
                                        <button class="btn btn-primary btn-block" type="submit"
                                            id="admin_ve_parameter_change">Ändern</button>
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
        $('#admin_ve_parameter_change').click(function() {
            var ve_parameter_change_data = new FormData();
            ve_parameter_change_data.append('parameter8', $('#selected_ve_parameter8').text());
            ve_parameter_change_data.append('parameter9', $('#selected_ve_parameter9').text());
            ve_parameter_change_data.append('customer_id', $('[name=admin_ve_parameter_customer_id]')
                .val());
            var confirm = window.confirm('Möchten Sie diesen Kundenvektorparameter ändern?');
            if (confirm == true) {
                $.ajax({
                    url: '{{ __('routes.admin-change-ve-parameter-change') }}',
                    type: 'post',
                    data: ve_parameter_change_data,
                    contentType: false,
                    processData: false,
                    success: () => {
                        $('#admin_ve_parameter_buttons').hide();
                        console.log("success");
                    },
                    error: () => {
                        console.error("error");
                    }
                })
            }
        })
        $('#admin_ve_parameter_confirm').click(function() {
            var ve_parameter_conform_data = new FormData();
            ve_parameter_conform_data.append('parameter8', $('#selected_ve_parameter8').text());
            ve_parameter_conform_data.append('parameter9', $('#selected_ve_parameter9').text());
            ve_parameter_conform_data.append('customer_id', $('[name=admin_ve_parameter_customer_id]')
                .val());
            $.ajax({
                url: '{{ __('routes.admin-change-ve-parameter-confirm') }}',
                type: 'post',
                data: ve_parameter_conform_data,
                contentType: false,
                processData: false,
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
