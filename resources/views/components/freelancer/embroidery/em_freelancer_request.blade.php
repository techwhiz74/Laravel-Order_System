<style>
    * {
        box-sizing: border-box;
    }

    .order_form_input,
    textarea,
    .ms-options-wrap>button,
    .ms-options-wrap>button:focus {
        width: 100%;
        height: 40px;
        padding: 12px;
        border: 1px solid #ddd !important;
        display: flex;
        margin: auto;
    }

    .ms-options-wrap * {
        font-size: 16px;
    }

    .ms-res-ctn {
        top: 100%;
        left: 0;
    }

    .order_form_lavel {
        display: inline-block;
    }

    .order_form_submit {
        background: #c4ae79 !important;
        color: #fff !important;
        height: 40px !important;
        border: 0;
        border-radius: 0;
        font-size: 13px;
        padding: 6px 25px;
        font-family: "Inter", "Helvetica", monospace;
        float: right;
    }


    .dropdown-toggle.product-multiselect {
        height: 40px;
    }

    .dropdown-toggle.product-multiselect_em_ex {
        height: 40px;
    }

    .dropdown-toggle.product-multiselect div {
        max-width: 100%;
        overflow-y: visible;
        text-wrap: wrap;
        width: 100%;
        min-height: 100%;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    .dropdown-toggle.product-multiselect_em_ex div {
        max-width: 100%;
        overflow-y: visible;
        text-wrap: wrap;
        width: 100%;
        min-height: 100%;
        background-color: #fff;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .dropdown-toggle.product-multiselect::after {
        display: none;
    }

    .dropdown-toggle.product-multiselect_em_ex::after {
        display: none;
    }

    /* .order_form_submit:hover {
        background-color: #45a049;
    }

    .order_form_submit_em_ex:hover {
        background-color: #45a049;
    } */


    .col-20 {
        float: left;
        width: 20%;
        margin-top: 10px;
    }

    .col-80 {
        float: left;
        width: 80%;
        margin-top: 6px;
    }

    .col-lg-7 {
        flex: 0 0 auto;
        width: 100%;
    }

    /* Clear floats after the columns */
    .row::after {
        content: "";
        display: table;
        clear: both;
    }

    .order_form_check_label {
        margin-left: 10px;
        margin-top: -4px;
    }

    .ms-options-wrap>.ms-options>ul input[type="checkbox"] {
        margin: auto 5px auto 0;
        position: static;
    }

    .ms-ctn .ms-sel-ctn {
        margin-left: -7px;
        padding-left: 10px;
    }

    .ms-ctn .ms-trigger .ms-trigger-ico {
        display: inline-block;
        width: 0;
        height: 0;
        vertical-align: bottom;
        border-top: 4px solid #333;
        border-right: 4px solid transparent;
        border-left: 4px solid transparent;
        content: "";
        margin-left: 8px;
        margin-top: 15px;
    }

    .ms-res-ctn .ms-res-item {
        line-height: 25px;
        text-align: left;
        padding: 2px 15px;
        color: #666;
        cursor: pointer;
    }

    .clear-products-button {
        position: absolute;
        right: 10px;
        top: 0;
        height: 100%;
        border: none;
        background-color: transparent;
    }

    .product-item-menu {
        position: absolute;
        z-index: 1000;
        display: none;
        min-width: 10rem;
        padding: 0.5rem 0;
        margin: 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
    }

    .product-item-menu_em_ex {
        position: absolute;
        z-index: 1000;
        display: none;
        min-width: 10rem;
        padding: 0.5rem 0;
        margin: 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
    }



    .btn-success {
        color: #fff;
        background-color: #c3ac6d;
        border: none;
        border-radius: 0;
    }

    .btn-success :hover {
        background-color: #c3ac6d !important;
    }


    .upload_table_button {
        color: white;
        background-color: #c3ac6d;
        border: none;
        border-radius: 0;
        padding: 5px 8px;
        width: 80px;
    }

    .order_form_validation_deliver_time,
    .order_form_validation_projectname,
    .order_form_validation_size,
    .order_form_validation_products,
    .order_form_file_upload,
    .order_form_validation_checkbox {
        color: red;
        font-style: italic;
        font-size: 13px;
        display: none;
        margin-bottom: 10px;
    }


    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75 {
            width: 100%;
            margin-top: 0;
        }
    }
</style>
<div class="modal fade" id="em_freelancer_request_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>

            <div class="pagetitle" style="margin-top:10px !important;">
                <h1>Änderungsanforderungen</h1>
                <p></p>
            </div>
            <div style="font-size: 13px; font-family:'Inter'; padding:20px 10vw">
                <div class="col-12" style="display: flex">
                    <div class="col-6" style="padding-right: 2.5px">
                        <div class="order_detail_div1">
                            <div style="height: 50px; font-size:18px;">Bestelldetails Information</div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:120px; margin:0">
                                            <strong>{{ __('home.customer_number') }}</strong>
                                        </p>
                                        <div id="em_detail_customer_number" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:120px; margin:0"><strong>{{ __('home.order_number') }}</strong>
                                        </p>
                                        <div id="em_detail_order_number" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:120px; margin:0"><strong>{{ __('home.projectname') }}</strong>
                                        </p>
                                        <div id="em_detail_project_name" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group form_dv_wrap order_size"
                                        style="display: flex; align-items:center">
                                        <p style="width:120px; margin:0"><strong>{{ __('home.size') }}</strong>
                                        </p>
                                        <div id="detail_size" class="order_detail_input_div_element"
                                            style="width:65px;">
                                        </div>
                                        <span style="margin-left: 5px;">mm</span>
                                        <div id="em_detail_width_height" class="order_detail_input_div_element"
                                            style="width:110px; margin-left:28px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group form_dv_wrap order_final_product"
                                        style="display: flex; align-items:center">
                                        <p style="width:120px; margin:0"><strong>{{ __('home.fianl_product') }}</strong>
                                        </p>
                                        <div id="em_detail_final_product" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group form_dv_wrap" style="display: flex;">
                                        <p style="width:120px; margin:0">
                                            <strong>Änderungstext</strong>
                                        </p>

                                        <div class="order_detail_div1"
                                            style="width:calc(100% - 120px); height: 130px !important; background-color:#fff;border:none !important;">
                                            <div id="em_order_rquest_text1"></div>
                                            <div id="em_order_rquest_text2"></div>
                                            <div id="em_order_rquest_text3"></div>
                                            <div id="em_order_rquest_text4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6" style="padding-left: 2.5px">
                        <div class="order_detail_div1">
                            <div style="height: 50px; font-size:18px;">Parameter</div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:200px; margin:0">{{ __('home.yarn_information') }}</p>
                                        <div id="em_yarn_information" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:200px; margin:0">{{ __('home.need_embroidery_files') }}</p>
                                        <div id="em_need_embroidery_files" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:200px; margin:0">{{ __('home.cutting_options') }}</p>
                                        <div id="em_cutting_options" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:200px; margin:0">{{ __('home.special_cutting_options') }}
                                        </p>
                                        <div id="em_special_cutting_options"class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:200px; margin:0">{{ __('home.needle_instructions') }}</p>
                                        <div id="em_needle_instructions" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:200px; margin:0">{{ __('home.standard_instructions') }}
                                        </p>
                                        <div id="em_standard_instructions" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:200px; margin:0">
                                            {{ __('home.special_standard_instructions') }}</p>
                                        <div id="em_special_standard_instructions"
                                            class="order_detail_input_div_element" style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" style="display: flex">
                    <div class="col-6" style="padding-right: 2.5px">
                        <div class="order_detail_div2">
                            <div>
                                <nav class="navbar navbar-expand-lg navbar-light bg-light"
                                    style="padding: 0; background:#eee !important; border:1px solid #ddd; border-bottom:none;">
                                    <div class="container-fluid" style="padding: 0">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="request_li" type="button" id="em_change1">
                                                1. Änderung
                                            </li>
                                            <li class="request_li" type="button" id="em_change2">
                                                2. Änderung
                                            </li>
                                            <li class="request_li" type="button" id="em_change3">
                                                3. Änderung
                                            </li>
                                            <li class="request_li" type="button" id="em_change4">
                                                4. Änderung
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-12">
                                <div style="display: flex; justify-content:flex-end; margin-bottom:5px;">
                                    <button class="btn btn-primary btn-sm" onclick="embroidery_multipleDownload()"
                                        style="background-color:#c3ac6d; border:none; font-size:13px;"><i
                                            class="fa-solid fa-download"></i>&nbsp&nbsp{{ __('home.alldownload') }}</button>
                                </div>
                            </div>
                            <div class="col-12" style="display:flex;">
                                <div style="margin-right: 20px;">
                                    <ul class="nav nav-tabs flex-column"
                                        style="background-color: rgb(244, 244, 244); width:95%; border-bottom:none; padding-left:0px;">
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="embroidery_subfolder_structure3_1">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p>
                                                        1.ÄNDERUNGSDATEIEN KUNDE</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="embroidery_subfolder_structure3_2">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p>
                                                        2.ÄNDERUNGSDATEIEN KUNDE</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="embroidery_subfolder_structure3_3">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p>
                                                        3.ÄNDERUNGSDATEIEN KUNDE</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="embroidery_subfolder_structure3_4">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p>
                                                        4.ÄNDERUNGSDATEIEN KUNDE</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="embroidery_subfolder_structure4_1">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p>
                                                        1.STICKPROGRAMM ÄNDERUNG</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="embroidery_subfolder_structure4_2">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p>
                                                        2.STICKPROGRAMM ÄNDERUNG</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="embroidery_subfolder_structure4_3">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p>
                                                        3.STICKPROGRAMM ÄNDERUNG</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="embroidery_subfolder_structure4_4">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p>
                                                        4.STICKPROGRAMM ÄNDERUNG</p>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="responsive-table" style="height: 200px; width:100%">

                                    <table id="embroidery_order_detail" class="table table-striped"
                                        style="width:100%; font-size:13px; ">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">
                                                    {{ __('home.customer_number') }}</th>
                                                <th style="text-align: center">{{ __('home.order_number') }}</th>
                                                <th style="text-align: center">{{ __('home.index') }}</th>
                                                <th style="text-align: center">{{ __('home.extension') }}</th>
                                                <th style="text-align: center">{{ __('home.download') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6" style="padding-left: 2.5px;">
                        <div class="freelancer_job_div">
                            <div id="em_green_job">
                                <div style="height: 50px; font-size:18px;">Änderung starten</div>
                                <div>
                                    <button onclick="EmbroideryStartChange()" class="job_button">Änderung
                                        starten</button>
                                </div>

                            </div>
                            <div id="em_yellow_job">
                                <div style="height: 50px; font-size:18px;">Änderung hochladen</div>
                                <div style="display: flex; flex-direction:column; justify-content:space-between">
                                    <div id="em_change_upload_div">
                                        <form action="" id="embroidery_uplaod_form"
                                            style="height: 230px; display:flex; flex-direction:column; justify-content:space-between;">
                                            <input type="hidden" name="embroidery_request_id" value="" />
                                            <input type="hidden" name="embroidery_time" value="" />
                                            <div style="display: flex; overflow-y:auto;">
                                                <div id="embroidery_fileupload" action="" method="POST"
                                                    enctype="multipart/form-data" style="width: 98%;">
                                                    <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                                    <noscript><input type="hidden" name="redirect"
                                                            value="" /></noscript>
                                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                                    <div class="row fileupload-buttonbar">
                                                        <div class="col-lg-7">
                                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                                            <span class="fileinput-button">
                                                                <i class="glyphicon glyphicon-plus"></i>
                                                                <span
                                                                    style="font-size: 13px;">{{ __('home.add_file') }}...</span>
                                                                <input type="file" name="files[]" multiple
                                                                    accept=".jpg, .png, .pdf, .ai, .dst" />
                                                            </span>
                                                            <button type="submit" class="btn btn-primary start"
                                                                style="visibility: hidden;">
                                                                <i class="glyphicon glyphicon-upload"></i>
                                                                <span>Start Upload</span>
                                                            </button>

                                                            <span class="fileupload-process"></span>
                                                        </div>
                                                        <!-- The global progress state -->
                                                        <div class="col-lg-5 fileupload-progress fade">
                                                            <!-- The global progress bar -->
                                                            <div class="progress progress-striped active"
                                                                role="progressbar" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                                <div class="progress-bar progress-bar-success"
                                                                    style="width: 0%;">
                                                                </div>
                                                            </div>
                                                            <!-- The extended global progress state -->
                                                            {{-- <div class="progress-extended">&nbsp;</div> --}}
                                                        </div>
                                                    </div>
                                                    <!-- The table listing the files available for upload/download -->
                                                    <table role="presentation" class="table table-striped"
                                                        id="order_form_upload_list">
                                                        <tbody class="files"></tbody>
                                                    </table>

                                                </div>
                                            </div><br>
                                            <div style="display: flex; justify-content:flex-end">
                                                <div>
                                                    <button type="submit"
                                                        class="embroidery_upload_submit">Hochladen</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="em_change_end_div">
                                        <button onclick="EmbroideryEndChange()" class="job_button">Änderung
                                            beenden</button>
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
@include('components.freelancer.embroidery.start_change_confirm_modal')
@include('components.freelancer.embroidery.end_change_confirm_modal')
@include('components.freelancer.embroidery.end_change_error_modal')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var selector = '#em_change1';

    function EmbroideryDetailRequest(id, type) {
        if (type == 'Originaldatei') {
            type = 'Änderungsdateien Kunde1';
            selector = '#em_change1';
        }
        $('#em_green_job').show();
        $('#em_yellow_job').hide();
        var embroidery_detail_table;
        $('[name=embroidery_request_id]').val(id);
        $('#embroidery_subfolder_structure3_1').hide();
        $('#embroidery_subfolder_structure3_2').hide();
        $('#embroidery_subfolder_structure3_3').hide();
        $('#embroidery_subfolder_structure3_4').hide();
        $('#embroidery_subfolder_structure4_1').hide();
        $('#embroidery_subfolder_structure4_2').hide();
        $('#embroidery_subfolder_structure4_3').hide();
        $('#embroidery_subfolder_structure4_4').hide();
        $('#em_order_rquest_text2').hide();
        $('#em_order_rquest_text3').hide();
        $('#em_order_rquest_text4').hide();
        $('#em_change1').click(function() {
            $('#em_order_rquest_text1').show();
            $('#em_order_rquest_text2').hide();
            $('#em_order_rquest_text3').hide();
            $('#em_order_rquest_text4').hide();
            $('#em_change1').css('background', '#ddd');
            $('#em_change2').css('background', '#eee');
            $('#em_change3').css('background', '#eee');
            $('#em_change4').css('background', '#eee');
        });
        $('#em_change2').click(function() {
            $('#em_order_rquest_text1').hide();
            $('#em_order_rquest_text2').show();
            $('#em_order_rquest_text3').hide();
            $('#em_order_rquest_text4').hide();
            $('#em_change1').css('background', '#eee');
            $('#em_change2').css('background', '#ddd');
            $('#em_change3').css('background', '#eee');
            $('#em_change4').css('background', '#eee');
        });
        $('#em_change3').click(function() {
            $('#em_order_rquest_text1').hide();
            $('#em_order_rquest_text2').hide();
            $('#em_order_rquest_text3').show();
            $('#em_order_rquest_text4').hide();
            $('#em_change1').css('background', '#eee');
            $('#em_change2').css('background', '#eee');
            $('#em_change3').css('background', '#ddd');
            $('#em_change4').css('background', '#eee');
        });
        $('#em_change4').click(function() {
            $('#em_order_rquest_text1').hide();
            $('#em_order_rquest_text2').hide();
            $('#em_order_rquest_text3').hide();
            $('#em_order_rquest_text4').show();
            $('#em_change1').css('background', '#eee');
            $('#em_change2').css('background', '#eee');
            $('#em_change3').css('background', '#eee');
            $('#em_change4').css('background', '#ddd');
        });
        $('#em_order_rquest_text1').text("");
        $('#em_order_rquest_text2').text("");
        $('#em_order_rquest_text3').text("");
        $('#em_order_rquest_text4').text("");

        $.ajax({
            url: '{{ __('routes.embroidery-freelancer-get-request-detail') }}',
            type: 'GET',
            data: {
                id
            },
            success: (data) => {
                if (data.order_change[0]) {
                    console.log("1q");
                    $('#em_order_rquest_text1').text(data.order_change[0].message);
                }
                if (data.order_change[1]) {
                    console.log("2q");
                    $('#em_order_rquest_text2').text(data.order_change[1].message);
                }
                if (data.order_change[2]) {
                    console.log("3q");
                    $('#em_order_rquest_text3').text(data.order_change[2].message);
                }
                if (data.order_change[3]) {
                    $('#em_order_rquest_text4').text(data.order_change[3].message);
                }

                var folderArray = [];
                data.detail.map((item, index) => {
                    item = item.split('/')[3];
                    if (folderArray.filter((el) => el == item).length == 0) {
                        folderArray.push(item);
                    }
                });


                $('#em_freelancer_request_popup').find('#em_detail_customer_number').text(data.order
                    .customer_number);
                $('#em_freelancer_request_popup').find('#em_detail_order_number').text(data.order
                    .order_number);
                $('#em_freelancer_request_popup').find('#em_detail_project_name').text(data.order
                    .project_name);
                $('#em_freelancer_request_popup').find('#em_detail_size').text(data.order.size);
                $('#em_freelancer_request_popup').find('#em_detail_width_height').text(data.order
                    .width_height);
                $('#em_freelancer_request_popup').find('#em_detail_final_product').text(data.order
                    .products);
                console.log(folderArray);
                console.log("change_count", data.change_count);
                if (data.change_count == 1) {
                    $('#em_change1').show();
                    $('#em_change2').hide();
                    $('#em_change3').hide();
                    $('#em_change4').hide();
                } else if (data.change_count == 2) {
                    $('#em_change1').show();
                    $('#em_change2').show();
                    $('#em_change3').hide();
                    $('#em_change4').hide();
                } else if (data.change_count == 3) {
                    $('#em_change1').show();
                    $('#em_change2').show();
                    $('#em_change3').show();
                    $('#em_change4').hide();
                }

                $('[name=embroidery_request_id]').val(data.order.id);

                $("#em_change1").click(() => {
                    selector = "#em_change1";
                    $('#embroidery_subfolder_structure3_1').hide();
                    $('#embroidery_subfolder_structure3_2').hide();
                    $('#embroidery_subfolder_structure3_3').hide();
                    $('#embroidery_subfolder_structure3_4').hide();
                    $('#embroidery_subfolder_structure4_1').hide();
                    $('#embroidery_subfolder_structure4_2').hide();
                    $('#embroidery_subfolder_structure4_3').hide();
                    $('#embroidery_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde1") {
                            $('#embroidery_subfolder_structure3_1').show();
                        } else if (item == "Stickprogramm Änderung1") {
                            $('#embroidery_subfolder_structure4_1').show();
                        }
                    });
                });
                $("#em_change2").click(() => {
                    selector = "#em_change2";
                    $('#embroidery_subfolder_structure3_1').hide();
                    $('#embroidery_subfolder_structure3_2').hide();
                    $('#embroidery_subfolder_structure3_3').hide();
                    $('#embroidery_subfolder_structure3_4').hide();
                    $('#embroidery_subfolder_structure4_1').hide();
                    $('#embroidery_subfolder_structure4_2').hide();
                    $('#embroidery_subfolder_structure4_3').hide();
                    $('#embroidery_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde2") {
                            $('#embroidery_subfolder_structure3_2').show();
                        } else if (item == "Stickprogramm Änderung2") {
                            $('#embroidery_subfolder_structure4_2').show();
                        }
                    });
                });
                $("#em_change3").click(() => {
                    selector = "#em_change3";
                    $('#embroidery_subfolder_structure3_1').hide();
                    $('#embroidery_subfolder_structure3_2').hide();
                    $('#embroidery_subfolder_structure3_3').hide();
                    $('#embroidery_subfolder_structure3_4').hide();
                    $('#embroidery_subfolder_structure4_1').hide();
                    $('#embroidery_subfolder_structure4_2').hide();
                    $('#embroidery_subfolder_structure4_3').hide();
                    $('#embroidery_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde3") {
                            $('#embroidery_subfolder_structure3_3').show();
                        } else if (item == "Stickprogramm Änderung3") {
                            $('#embroidery_subfolder_structure4_3').show();
                        }
                    });
                });
                $("#em_change4").click(() => {
                    selector = "#em_change4";
                    $('#embroidery_subfolder_structure3_1').hide();
                    $('#embroidery_subfolder_structure3_2').hide();
                    $('#embroidery_subfolder_structure3_3').hide();
                    $('#embroidery_subfolder_structure3_4').hide();
                    $('#embroidery_subfolder_structure4_1').hide();
                    $('#embroidery_subfolder_structure4_2').hide();
                    $('#embroidery_subfolder_structure4_3').hide();
                    $('#embroidery_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde4") {
                            $('#embroidery_subfolder_structure3_4').show();
                        } else if (item == "Stickprogramm Änderung4") {
                            $('#embroidery_subfolder_structure4_4').show();
                        }
                    });
                });


                $(selector).trigger('click');

                folderArray.forEach((item) => {
                    if (item == "Stickprogramm Änderung1") {
                        $('#em_green_job').hide();
                        $('#em_yellow_job').show();
                    }
                })

            },
            error: () => {
                console.error('err');
            }
        })
        $('#order_form_upload_list tr').remove();

        embroidery_detail_table = $('#embroidery_order_detail').DataTable({
            responsive: true,
            language: {

            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ __('routes.embroidery-freelancer-order_detail') }}",
                data: function(d) {
                    d.id = id;
                    d.type = type;
                },
            },
            columns: [{
                    data: 'customer_number',
                    name: 'customer_number'
                },

                {
                    data: 'order_number',
                    name: 'order_number'
                },

                {
                    data: 'index',
                    name: 'index'
                },

                {
                    data: 'extension',
                    name: 'extension'
                },

                {
                    data: 'download',
                    name: 'download',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#em_freelancer_request_popup').modal('show');
        embroidery_detail_table.destroy();
        //customer parameter information
        $.ajax({
            url: '{{ __('routes.freelnacer-embroidery-parameter') }}',
            type: 'GET',
            data: {
                id: $('[name=embroidery_request_id]').val()
            },
            success: (data) => {
                console.log(data);
                $('#em_yarn_information').text(data.parameter1);
                $('#em_need_embroidery_files').text(data.parameter2);
                $('#em_cutting_options').text(data.parameter3);
                $('#em_special_cutting_options').text(data.parameter4);
                $('#em_needle_instructions').text(data.parameter5);
                $('#em_standard_instructions').text(data.parameter6);
                $('#em_special_standard_instructions').text(data.parameter7);
            },
            error: () => {
                console.error('error');
            }
        })
    }


    function embroidery_multipleDownload() {
        window.location.href = '{{ url('multi-download') }}/' + $('[name=embroidery_request_id]').val();
    }

    $('#embroidery_subfolder_structure3_1').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Änderungsdateien Kunde1');
    });
    $('#embroidery_subfolder_structure3_2').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Änderungsdateien Kunde2');
    });
    $('#embroidery_subfolder_structure3_3').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Änderungsdateien Kunde3');
    });
    $('#embroidery_subfolder_structure3_4').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Änderungsdateien Kunde4');
    });
    $('#embroidery_subfolder_structure4_1').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Stickprogramm Änderung1');
    });
    $('#embroidery_subfolder_structure4_2').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Stickprogramm Änderung2');
    });
    $('#embroidery_subfolder_structure4_3').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Stickprogramm Änderung3');
    });
    $('#embroidery_subfolder_structure4_4').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Stickprogramm Änderung4');
    });
    $(function() {
        $('[name=embroidery_time]').val(new Date());
    })
    $('#embroidery_uplaod_form').submit(function(e) {
        e.preventDefault();
    })
    $('.embroidery_upload_submit').click(function(e) {
        e.preventDefault();
        var freelancer_request_data = new FormData();
        freelancer_request_data.append('embroidery_request_id', $('[name=embroidery_request_id]').val());
        freelancer_request_data.append('embroidery_time', $('[name=embroidery_time]').val());
        $('#embroidery_fileupload').find('.fileupload-buttonbar .start').trigger('click');
    });

    function EmbroideryStartChange() {
        StartChangeConfirmAlert();
        $('#start_change_confirm').click(function() {
            $('#em_green_job').hide();
            $('#em_yellow_job').show();
            $('#start_change_confirm_popup').modal('hide');
        })

    }

    function EmbroideryEndChange() {
        EndChangeConfirmAlert();
        $('#end_change_confirm').click(function() {
            $.ajax({
                url: '{{ __('routes.embroidery-freelancer-endchange') }}',
                type: 'GET',
                data: {
                    end_change_id: $('[name=embroidery_request_id]').val()
                },
                success: () => {
                    $('#em_freelancer_table_reload_btn').trigger('click');
                    $('#em_freelancer_all_table_reload_button').trigger('click');
                    $('#em_freelancer_blue_table_reload_button').trigger('click');
                    $('#em_freelancer_red_table_reload_button').trigger('click');
                    $('#em_yellow_job').hide();
                    $('#end_change_confirm_popup').modal('hide');
                    toastr.success(
                        "Der Status änderte sich von gelb auf rot");
                },
                error: () => {
                    $('#end_change_confirm_popup').modal('hide');
                    EndChangeError();
                }
            })
        })

    }

    function StartChangeConfirmAlert() {
        console.log("sadf");
        $('#start_change_confirm_popup').modal('show');
    }

    function EndChangeConfirmAlert() {
        $('#end_change_confirm_popup').modal('show');
    }

    function EndChangeError() {
        $('#end_change_error_popup').modal('show');
    }
</script>
