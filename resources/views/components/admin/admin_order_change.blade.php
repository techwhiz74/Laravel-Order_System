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
    /* .row::after {
        content: "";
        display: table;
        clear: both;
    } */

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
<div class="modal fade" id="admin_change_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <div id="admin_change_customer_number" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:120px; margin:0"><strong>{{ __('home.order_number') }}</strong>
                                        </p>
                                        <div id="admin_change_order_number" class="order_detail_input_div_element"
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
                                        <div id="admin_change_project_name" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group form_dv_wrap order_size"
                                        style="display: flex; align-items:center">
                                        <p style="width:120px; margin:0"><strong>{{ __('home.size') }}</strong>
                                        </p>
                                        <div id="admin_change_size" class="order_detail_input_div_element"
                                            style="width:65px;">
                                        </div>
                                        <span style="margin-left: 5px;">mm</span>
                                        <div id="admin_change_width_height" class="order_detail_input_div_element"
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
                                        <div id="admin_change_final_product" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group form_dv_wrap" style="display: flex;">
                                        <p style="width:120px; margin-top:5px;">
                                            <strong>Änderungstext</strong>
                                        </p>

                                        <div class="order_detail_div1"
                                            style="width:calc(100% - 120px); height: 130px !important; background-color:#fff;border:none !important;">
                                            <div id="admin_change_text1"></div>
                                            <div id="admin_change_text2"></div>
                                            <div id="admin_change_text3"></div>
                                            <div id="admin_change_text4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6" style="padding-left: 2.5px">
                        <div class="order_detail_div1">
                            <div style="height: 50px; font-size:18px;">Kunden-Parameter</div>
                            <div id="admin_change_embroidery_parameter_div">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.yarn_information') }}</p>
                                            <div id="admin_change_yarn_information"
                                                class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.need_embroidery_files') }}</p>
                                            <div id="admin_change_need_embroidery_files"
                                                class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.cutting_options') }}</p>
                                            <div id="admin_change_cutting_options"
                                                class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap"
                                            style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.special_cutting_options') }}
                                            </p>
                                            <div id="admin_change_special_cutting_options"class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap"
                                            style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.needle_instructions') }}</p>
                                            <div id="admin_change_needle_instructions"
                                                class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap"
                                            style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.standard_instructions') }}
                                            </p>
                                            <div id="admin_change_standard_instructions"
                                                class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap"
                                            style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">
                                                {{ __('home.special_standard_instructions') }}</p>
                                            <div id="admin_change_special_standard_instructions"
                                                class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="admin_change_vector_parameter_div">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap"
                                            style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.required_vector_file') }}</p>
                                            <div id="admin_change_required_vector_file"
                                                class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap"
                                            style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.required_image_file') }}</p>
                                            <div id="admin_change_required_image_file"
                                                class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
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
                                            <li class="request_li" type="button" id="admin_change1">
                                                {{ __('home.change1') }}
                                            </li>
                                            <li class="request_li" type="button" id="admin_change2">
                                                {{ __('home.change2') }}
                                            </li>
                                            <li class="request_li" type="button" id="admin_change3">
                                                {{ __('home.change3') }}
                                            </li>
                                            <li class="request_li" type="button" id="admin_change4">
                                                {{ __('home.change4') }}
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-12">
                                <div style="display: flex; justify-content:flex-end; margin-bottom:5px;">
                                    <button class="btn btn-primary btn-sm" onclick="admin_change_multipleDownload()"
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
                                                id="admin_change_subfolder_structure3_1">
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
                                                id="admin_change_subfolder_structure3_2">
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
                                                id="admin_change_subfolder_structure3_3">
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
                                                id="admin_change_subfolder_structure3_4">
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
                                                id="admin_change_subfolder_structure4_1">
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
                                                id="admin_change_subfolder_structure4_2">
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
                                                id="admin_change_subfolder_structure4_3">
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
                                                id="admin_change_subfolder_structure4_4">
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

                                    <table id="admin_change_order_detail" class="table table-striped"
                                        style="width:100%; font-size:13px; ">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">
                                                    {{ __('home.customer_number') }}</th>
                                                <th style="text-align: center">{{ __('home.order_number') }}</th>
                                                <th style="text-align: center">{{ __('home.index') }}</th>
                                                <th style="text-align: center">{{ __('home.extension') }}</th>
                                                <th style="text-align: center">{{ __('home.download') }}</th>
                                                <th style="text-align: center">{{ __('home.delete') }}</th>
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
                            <div id="admin_green_change">
                                <div style="height: 50px; font-size:18px;">Änderung starten</div>
                                <div>
                                    <button onclick="AdminStartChange()" class="job_button">Änderung
                                        starten</button>
                                </div>

                            </div>
                            <div id="admin_yellow_change">
                                <div style="height: 50px; font-size:18px;">Änderung hochladen</div>
                                <div style="display: flex; flex-direction:column; justify-content:space-between">
                                    <div id="admin_change_upload_div">
                                        <form action="" id="admin_change_uplaod_form"
                                            style="height: 280px; display:flex; flex-direction:column; justify-content:space-between;">
                                            <input type="hidden" name="admin_change_id" value="" />
                                            <input type="hidden" name="admin_change_time" value="" />
                                            <div style="display: flex; overflow-y:auto;">
                                                <div id="admin_change_fileupload" action="" method="POST"
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
                                                                    id="admin_change_file_input" />
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
                                                        class="admin_change_upload_submit">Hochladen</button>
                                                </div>
                                            </div>
                                        </form>
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

@include('components.admin.start_change_confirm_modal')
@include('components.admin.change_upload_success_modal')
@include('components.admin.end_change_success_modal')
@include('components.admin.delete_change_file_confirm_modal')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var selector = '#admin_change1';
    var folderType = 'Änderungsdateien Kunde1';

    function AdminChange(id, type) {
        folderType = type;
        if (type == 'Originaldatei') {
            type = 'Änderungsdateien Kunde1';
            selector = '#admin_change1';
        }

        $('#admin_change_embroidery_parameter_div').hide();
        $('#admin_change_vector_parameter_div').hide();
        $('#order_form_upload_list tr').remove();

        $('#admin_green_change').show();
        $('#admin_yellow_change').hide();
        var admin_change_detail_table;
        $('[name=admin_change_id]').val(id);

        $('#admin_change_subfolder_structure3_1').hide();
        $('#admin_change_subfolder_structure3_2').hide();
        $('#admin_change_subfolder_structure3_3').hide();
        $('#admin_change_subfolder_structure3_4').hide();
        $('#admin_change_subfolder_structure4_1').hide();
        $('#admin_change_subfolder_structure4_2').hide();
        $('#admin_change_subfolder_structure4_3').hide();
        $('#admin_change_subfolder_structure4_4').hide();
        $('#admin_change_text2').hide();
        $('#admin_change_text3').hide();
        $('#admin_change_text4').hide();
        $('#admin_change1').click(function() {
            $('#admin_change_text1').show();
            $('#admin_change_text2').hide();
            $('#admin_change_text3').hide();
            $('#admin_change_text4').hide();
            $('#admin_change1').css('background', '#ddd');
            $('#admin_change2').css('background', '#eee');
            $('#admin_change3').css('background', '#eee');
            $('#admin_change4').css('background', '#eee');
        });
        $('#admin_change2').click(function() {
            $('#admin_change_text1').hide();
            $('#admin_change_text2').show();
            $('#admin_change_text3').hide();
            $('#admin_change_text4').hide();
            $('#admin_change1').css('background', '#eee');
            $('#admin_change2').css('background', '#ddd');
            $('#admin_change3').css('background', '#eee');
            $('#admin_change4').css('background', '#eee');
        });
        $('#admin_change3').click(function() {
            $('#admin_change_text1').hide();
            $('#admin_change_text2').hide();
            $('#admin_change_text3').show();
            $('#admin_change_text4').hide();
            $('#admin_change1').css('background', '#eee');
            $('#admin_change2').css('background', '#eee');
            $('#admin_change3').css('background', '#ddd');
            $('#admin_change4').css('background', '#eee');
        });
        $('#admin_change4').click(function() {
            $('#admin_change_text1').hide();
            $('#admin_change_text2').hide();
            $('#admin_change_text3').hide();
            $('#admin_change_text4').show();
            $('#admin_change1').css('background', '#eee');
            $('#admin_change2').css('background', '#eee');
            $('#admin_change3').css('background', '#eee');
            $('#admin_change4').css('background', '#ddd');
        });
        $('#admin_change_text1').text("");
        $('#admin_change_text2').text("");
        $('#admin_change_text3').text("");
        $('#admin_change_text4').text("");

        $.ajax({
            url: '{{ __('routes.admin-get-request-detail') }}',
            type: 'GET',
            data: {
                id
            },
            success: (data) => {
                if (data.order_change[0]) {
                    console.log("1q");
                    $('#admin_change_text1').text(data.order_change[0].message);
                }
                if (data.order_change[1]) {
                    console.log("2q");
                    $('#admin_change_text2').text(data.order_change[1].message);
                }
                if (data.order_change[2]) {
                    console.log("3q");
                    $('#admin_change_text3').text(data.order_change[2].message);
                }
                if (data.order_change[3]) {
                    $('#admin_change_text4').text(data.order_change[3].message);
                }

                var folderArray = [];
                data.detail.map((item, index) => {
                    item = item.split('/')[3];
                    if (folderArray.filter((el) => el == item).length == 0) {
                        folderArray.push(item);
                    }
                });


                $('#admin_change_popup').find('#admin_change_customer_number').text(data.order
                    .customer_number);
                $('#admin_change_popup').find('#admin_change_order_number').text(data.order
                    .order_number);
                $('#admin_change_popup').find('#admin_change_project_name').text(data.order
                    .project_name);
                $('#admin_change_popup').find('#admin_change_size').text(data.order.size);
                $('#admin_change_popup').find('#admin_change_width_height').text(data.order
                    .width_height);
                $('#admin_change_popup').find('#admin_change_final_product').text(data.order
                    .products);

                $data_type = data.order.type;
                if ($data_type == "Vector") {
                    $('.order_size').hide();
                    $('.order_final_product').hide();
                    $('#admin_change_vector_parameter_div').show();
                } else {
                    $('.order_size').show();
                    $('.order_final_product').show();
                    $('#admin_change_embroidery_parameter_div').show();
                }
                console.log(folderArray);
                console.log("change_count", data.change_count);
                if (data.change_count == 1) {
                    $('#admin_change1').show();
                    $('#admin_change2').hide();
                    $('#admin_change3').hide();
                    $('#admin_change4').hide();
                } else if (data.change_count == 2) {
                    $('#admin_change1').show();
                    $('#admin_change2').show();
                    $('#admin_change3').hide();
                    $('#admin_change4').hide();
                } else if (data.change_count == 3) {
                    $('#admin_change1').show();
                    $('#admin_change2').show();
                    $('#admin_change3').show();
                    $('#admin_change4').hide();
                }

                $('[name=admin_change_id]').val(data.order.id);

                $("#admin_change1").click(() => {
                    selector = "#admin_change1";
                    $('#admin_change_subfolder_structure3_1').hide();
                    $('#admin_change_subfolder_structure3_2').hide();
                    $('#admin_change_subfolder_structure3_3').hide();
                    $('#admin_change_subfolder_structure3_4').hide();
                    $('#admin_change_subfolder_structure4_1').hide();
                    $('#admin_change_subfolder_structure4_2').hide();
                    $('#admin_change_subfolder_structure4_3').hide();
                    $('#admin_change_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde1") {
                            $('#admin_change_subfolder_structure3_1').show();
                        } else if (item == "Stickprogramm Änderung1") {
                            $('#admin_change_subfolder_structure4_1').show();
                        }
                    });
                });
                $("#admin_change2").click(() => {
                    selector = "#admin_change2";
                    $('#admin_change_subfolder_structure3_1').hide();
                    $('#admin_change_subfolder_structure3_2').hide();
                    $('#admin_change_subfolder_structure3_3').hide();
                    $('#admin_change_subfolder_structure3_4').hide();
                    $('#admin_change_subfolder_structure4_1').hide();
                    $('#admin_change_subfolder_structure4_2').hide();
                    $('#admin_change_subfolder_structure4_3').hide();
                    $('#admin_change_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde2") {
                            $('#admin_change_subfolder_structure3_2').show();
                        } else if (item == "Stickprogramm Änderung2") {
                            $('#admin_change_subfolder_structure4_2').show();
                        }
                    });
                });
                $("#admin_change3").click(() => {
                    selector = "#admin_change3";
                    $('#admin_change_subfolder_structure3_1').hide();
                    $('#admin_change_subfolder_structure3_2').hide();
                    $('#admin_change_subfolder_structure3_3').hide();
                    $('#admin_change_subfolder_structure3_4').hide();
                    $('#admin_change_subfolder_structure4_1').hide();
                    $('#admin_change_subfolder_structure4_2').hide();
                    $('#admin_change_subfolder_structure4_3').hide();
                    $('#admin_change_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde3") {
                            $('#admin_change_subfolder_structure3_3').show();
                        } else if (item == "Stickprogramm Änderung3") {
                            $('#admin_change_subfolder_structure4_3').show();
                        }
                    });
                });
                $("#admin_change4").click(() => {
                    selector = "#admin_change4";
                    $('#admin_change_subfolder_structure3_1').hide();
                    $('#admin_change_subfolder_structure3_2').hide();
                    $('#admin_change_subfolder_structure3_3').hide();
                    $('#admin_change_subfolder_structure3_4').hide();
                    $('#admin_change_subfolder_structure4_1').hide();
                    $('#admin_change_subfolder_structure4_2').hide();
                    $('#admin_change_subfolder_structure4_3').hide();
                    $('#admin_change_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde4") {
                            $('#admin_change_subfolder_structure3_4').show();
                        } else if (item == "Stickprogramm Änderung4") {
                            $('#admin_change_subfolder_structure4_4').show();
                        }
                    });
                });


                $(selector).trigger('click');

                folderArray.forEach((item) => {
                    if (item == "Stickprogramm Änderung1") {
                        $('#admin_green_change').hide();
                        $('#admin_yellow_change').show();
                    }
                })

            },
            error: () => {
                console.error('err');
            }
        })
        $('#order_form_upload_list tr').remove();

        admin_change_detail_table = $('#admin_change_order_detail').DataTable({
            responsive: true,
            language: {

            },
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ __('routes.admin-change-order-detail') }}',
                type: 'GET',
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
                {
                    data: 'delete',
                    name: 'delete',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#admin_change_popup').modal('show');
        admin_change_detail_table.destroy();
        //customer parameter information
        $.ajax({
            url: '{{ __('routes.admin-change-parameter') }}',
            type: 'GET',
            data: {
                id: $('[name=admin_change_id]').val()
            },
            success: (data) => {
                console.log(data);
                $('#admin_change_yarn_information').text(data.parameter1);
                $('#admin_change_need_embroidery_files').text(data.parameter2);
                $('#admin_change_cutting_options').text(data.parameter3);
                $('#admin_change_special_cutting_options').text(data.parameter4);
                $('#admin_change_needle_instructions').text(data.parameter5);
                $('#admin_change_standard_instructions').text(data.parameter6);
                $('#admin_change_special_standard_instructions').text(data.parameter7);
                $('#admin_change_required_vector_file').text(data.parameter8);
                $('#admin_change_required_image_file').text(data.parameter9);
            },
            error: () => {
                console.error('error');
            }
        })
    }


    function admin_change_multipleDownload() {
        window.location.href = '{{ url('multi-download') }}/' + $('[name=admin_change_id]').val() + '?type=' +
            folderType;
    }

    $('#admin_change_subfolder_structure3_1').click(function() {
        AdminChange($('[name=admin_change_id]').val(), 'Änderungsdateien Kunde1');
    });
    $('#admin_change_subfolder_structure3_2').click(function() {
        AdminChange($('[name=admin_change_id]').val(), 'Änderungsdateien Kunde2');
    });
    $('#admin_change_subfolder_structure3_3').click(function() {
        AdminChange($('[name=admin_change_id]').val(), 'Änderungsdateien Kunde3');
    });
    $('#admin_change_subfolder_structure3_4').click(function() {
        AdminChange($('[name=admin_change_id]').val(), 'Änderungsdateien Kunde4');
    });
    $('#admin_change_subfolder_structure4_1').click(function() {
        AdminChange($('[name=admin_change_id]').val(), 'Stickprogramm Änderung1');
    });
    $('#admin_change_subfolder_structure4_2').click(function() {
        AdminChange($('[name=admin_change_id]').val(), 'Stickprogramm Änderung2');
    });
    $('#admin_change_subfolder_structure4_3').click(function() {
        AdminChange($('[name=admin_change_id]').val(), 'Stickprogramm Änderung3');
    });
    $('#admin_change_subfolder_structure4_4').click(function() {
        AdminChange($('[name=admin_change_id]').val(), 'Stickprogramm Änderung4');
    });
    $(function() {
        $('[name=admin_change_time]').val(new Date());
    })
    $('#admin_change_uplaod_form').submit(function(e) {
        e.preventDefault();
    })
    $('.admin_change_upload_submit').click(function(e) {
        e.preventDefault();
        $('[name=admin_detail_id]').val("");
        $('[name=admin_request_id]').val("");
        var admin_change_data = new FormData();
        admin_change_data.append('admin_change_id', $('[name=admin_change_id]').val());
        admin_change_data.append('admin_change_time', $('[name=admin_change_time]').val());
        $('#admin_change_fileupload').find('.fileupload-buttonbar .start').trigger('click');
    });

    function AdminStartChange() {
        AdminStartChangeConfirmAlert();
        $('#admin_start_change_confirm').click(function() {
            $('#admin_green_change').hide();
            $('#admin_yellow_change').show();
            $('#admin_start_change_confirm_popup').modal('hide');
        })

    }

    function AdminChangeDeleteFile(id) {
        $('#admin_delete_change_file_confirm_popup').modal('show');
        console.log(id);
        $('#admin_delete_change_file_confirm').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-change_delete_file') }}' + id,
                type: 'GET',
                success: () => {
                    $('#admin_change_subfolder_structure3_1').trigger('click');
                    $('#admin_delete_change_file_confirm_popup').modal('hide');
                },
                error: () => {
                    console.log("error");
                }
            })
        })
    }

    function AdminChangeEndChange() {

        $.ajax({
            url: '{{ __('routes.admin-endchange') }}',
            type: 'GET',
            data: {
                end_change_id: $('[name=admin_change_id]').val()
            },
            success: () => {
                $('#admin_all_table_reload_button').trigger('click');
                $('#admin_red_table_reload_button').trigger('click');
                $('#admin_blue_table_reload_button').trigger('click');
                $('#admin_change_upload_success_popup').modal('hide');
                setTimeout(() => {
                    $('#admin_end_change_success_popup').modal('show');
                }, 1000);
            },
            error: () => {
                $('#admin_change_upload_success_popup').modal('hide');
                EndChangeError();
            }
        })
    }

    function AdminStartChangeConfirmAlert() {
        console.log("sadf");
        $('#admin_start_change_confirm_popup').modal('show');
    }


    function EndChangeError() {
        $('#end_change_error_popup').modal('show');
    }

    function EndChangeSuccess() {
        $('#admin_end_change_success_popup').modal('hide');
        $('#admin_green_change').hide();
        $('#admin_yellow_change').hide();
    }
    $(function() {
        $('#admin_change_file_input').on('change', function() {
            var files = $(this)[0].files;
            for (var i = 0; i < files.length; i++) {
                var fileName = files[i].name;
                var fileExtension = fileName.split('.').pop().toLowerCase();
                var fileSize = files[i].size;
                if ($.inArray(fileExtension, ['exe', 'bat']) !== -1) {
                    alert('You cannot upload .exe or .bat files');
                    $('#order_form_upload_list tr').remove();
                    return;
                }
                if (fileSize > 25 * 1024 * 1024) {
                    alert('File size should not exceed 25 MB');
                    $('#order_form_upload_list tr').remove();
                    return;
                }
            }
        });

    })
</script>
