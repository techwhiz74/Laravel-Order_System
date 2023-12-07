<div class="modal fade" id="admin_customer_parameters_ve_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244); padding-top:1vw !important;">
            <button type="button" class="backbutton" style="margin: 20px 0 0 20px;" onclick="hideModal()"><i
                    class="fa-solid fa-left-long" style="display: flex;"></i></button>
            <div class="row">
                <div class="col-md-1 col-xl-2"></div>
                <div class="col-12 col-md-10 col-xl-8">
                    <div class="pagetitle">{{ __('home.customer_ve_parameters') }}
                    </div>
                    <div>
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
                                                                    <input type="checkbox"
                                                                        value="Adobe PDF (*.PDF)" />Adobe
                                                                    PDF
                                                                    (*.PDF)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Illustrator EPS (*.EPS)" />Illustrator
                                                                    EPS
                                                                    (*.EPS)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Illustrator Template (*.AIT)" />Illustrator
                                                                    Template
                                                                    (*.AI)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="SVG (*.SVG)" />SVG
                                                                    (*.SV)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="SVG komprimiert (*.SVGZ)">SVG
                                                                    komprimiert (*.SVGZ)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                    <div class="dropdown">
                                                        <div class="product-multiselect9 dropdown-toggle">
                                                            <div id="selected_ve_parameter9">
                                                            </div>
                                                        </div>
                                                        <div class="product-item-menu9">
                                                            <div class="row parameter-select-items-image"
                                                                style="font-size: 13px;">
                                                                <div>
                                                                    <input type="checkbox" value="BMP (*.BMP)" />BMP
                                                                    (*.BMP)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="JPEG (*.JPG)" />JPEG
                                                                    (*.JPG)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="PNG (*.PNG)" />PNG
                                                                    (*.PNG)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="TIFF (*.TIF)" />TIFF
                                                                    (*.TIF)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="WebP (*.WEBP)" />WebP
                                                                    (*.WEBP)
                                                                </div>
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
                                                id="admin_ve_parameter_confirm">BESTÄTIGEN</button>
                                            <button class="btn btn-primary btn-block" type="submit"
                                                id="admin_ve_parameter_decline">ABLEHNEN</button>
                                        </div>
                                        <div class="upload_btn" id="admin_ve_parameter_change_buttons">
                                            <button class="btn btn-primary btn-block" type="submit"
                                                id="admin_ve_parameter_change">ÄNDERN</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-xl-2"></div>
            </div>
        </div>
    </div>
</div>
