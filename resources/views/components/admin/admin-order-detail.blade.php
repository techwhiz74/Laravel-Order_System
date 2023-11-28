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
<div class="modal fade" id="admin_order_detail_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>

            <div class="pagetitle" style="margin-top:10px !important;">
                <h1>Bestelldetails</h1>
                <p></p>
            </div>
            <div style="font-size: 13px; font-family:'Inter'; padding:20px 10vw">
                <div class="col-12" style="display: flex">
                    <div class="col-6" style="padding-right: 2.5px">
                        <div class="order_detail_div1">
                            <div style="height: 50px; font-size:18px;">Übersicht Bestelldetails</div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:120px; margin:0">
                                            <strong>{{ __('home.customer_number') }}</strong>
                                        </p>
                                        <div id="admin_detail_customer_number" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:120px; margin:0"><strong>{{ __('home.order_number') }}</strong>
                                        </p>
                                        <div id="admin_detail_order_number" class="order_detail_input_div_element"
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
                                        <div id="admin_detail_project_name" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group form_dv_wrap order_size"
                                        style="display: flex; align-items:center">
                                        <p style="width:120px; margin:0"><strong>{{ __('home.size') }}</strong>
                                        </p>
                                        <div id="admin_detail_size" class="order_detail_input_div_element"
                                            style="width:65px;">
                                        </div>
                                        <span style="margin-left: 5px;">mm</span>
                                        <div id="admin_detail_width_height" class="order_detail_input_div_element"
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
                                        <div id="admin_detail_final_product" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group form_dv_wrap" style="display: flex;">
                                        <p style="width:120px; margin:0">
                                            <strong>{{ __('home.special instructions') }}</strong>
                                        </p>
                                        <div id="admin_detail_special_instructions"
                                            class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px); height:130px !important; align-items:flex-start !important;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6" style="padding-left: 2.5px">
                        <div class="order_detail_div1">
                            <div style="height: 50px; font-size:18px;">Kunden-Parameter</div>
                            <div id="admin_embroidery_parameter_div">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.yarn_information') }}</p>
                                            <div id="admin_yarn_information" class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.need_embroidery_files') }}</p>
                                            <div id="admin_need_embroidery_files" class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.cutting_options') }}</p>
                                            <div id="admin_cutting_options" class="order_detail_input_div_element"
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
                                            <div id="admin_special_cutting_options"class="order_detail_input_div_element"
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
                                            <div id="admin_needle_instructions" class="order_detail_input_div_element"
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
                                            <div id="admin_standard_instructions"
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
                                            <div id="admin_special_standard_instructions"
                                                class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="admin_vector_parameter_div">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap"
                                            style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.required_vector_file') }}</p>
                                            <div id="admin_required_vector_file"
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
                                            <div id="admin_required_image_file" class="order_detail_input_div_element"
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
                            <div class="col-12"
                                style="display: flex; justify-content:space-between; margin-bottom:10px;">
                                <div style="font-size:18px;">Dateiübersicht</div>
                                <div>
                                    <button class="btn btn-primary btn-sm" onclick="adminMultipleDownload()"
                                        style="background-color:#c3ac6d; border:none; font-size:13px;"><i
                                            class="fa-solid fa-download"></i>&nbsp&nbsp{{ __('home.alldownload') }}</button>
                                </div>
                            </div>
                            <div class="col-12" style="display:flex;">
                                <div style="margin-right: 10px;">
                                    <ul class="nav nav-tabs flex-column"
                                        style="background-color: rgb(244, 244, 244); width:95%; border-bottom:none; padding-left:0px;">
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="admin_subfolder_structure1">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p style="padding-top: 6px;">
                                                        ORIGINALDATEI</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="admin_subfolder_structure2">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p style="padding-top: 6px;">
                                                        STICKPROGRAMM</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="admin_subfolder_structure3">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p style="padding-top: 6px;">
                                                        VEKTORDATEI</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="responsive-table" style="height: 300px; width:100%;">
                                    <table id="admin_order_detail" class="table table-striped"
                                        style="width:100%; font-size:13px;">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">
                                                    {{ __('home.customer_number') }}</th>
                                                <th style="text-align: center">{{ __('home.order_number') }}</th>
                                                <th style="text-align: center">{{ __('home.index') }}</th>
                                                <th style="text-align: center">{{ __('home.extension') }}</th>
                                                <th style="text-align: center">{{ __('home.download') }}</th>
                                                <th style="text-align: center">
                                                    {{ __('home.delete') }}</th>
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
                            <div id="admin_green_job">
                                <div style="height: 50px; font-size:18px;">Aktivität-Übersicht</div>
                                <div id="freelancer_job_start_div">
                                    <button onclick="AdminStartJob()" class="job_button">Job starten</button>
                                </div>

                            </div>
                            <div id="admin_yellow_job">
                                <div style="height: 50px; font-size:18px;">Aktivität-Übersicht</div>
                                <div style="display: flex; flex-direction:column; justify-content:space-between">
                                    <div id="admin_job_update_div">
                                        <button onclick="AdminUpdateJob()" class="job_button">Dateien
                                            hochladen</button>
                                    </div>
                                    <div id="admin_job_upload_div">
                                        <form action="" id="admin_job_start_form">
                                            <input type="hidden" name="admin_detail_id" value="">
                                            <div style="display: flex; height:225px;">
                                                <div id="admin_job_upload" action="" method="POST"
                                                    enctype="multipart/form-data"
                                                    style="width: 100%; overflow-x:hidden; overflow-y:auto;">
                                                    <noscript><input type="hidden" name="redirect"
                                                            value="" /></noscript>
                                                    <div class="row fileupload-buttonbar">
                                                        <div class="col-lg-7">
                                                            <span class="fileinput-button">
                                                                <i class="glyphicon glyphicon-plus"></i>
                                                                <span
                                                                    style="font-size: 13px;">{{ __('home.add_file') }}...</span>
                                                                <input type="file" name="files[]" multiple
                                                                    id="admin_detail_file_input" />
                                                            </span>
                                                            <button type="submit" class="btn btn-primary start"
                                                                style="visibility: hidden;">
                                                                <i class="glyphicon glyphicon-upload"></i>
                                                                <span>Start Upload</span>
                                                            </button>

                                                            <span class="fileupload-process"></span>
                                                        </div>
                                                        <div class="col-lg-5 fileupload-progress fade">
                                                            <div class="progress progress-striped active"
                                                                role="progressbar" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                                <div class="progress-bar progress-bar-success"
                                                                    style="width: 0%;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table role="presentation" class="table table-striped"
                                                        id="order_form_upload_list">
                                                        <tbody class="files"></tbody>
                                                    </table>

                                                </div>
                                            </div><br>
                                            <div style="display: flex; justify-content:flex-end">
                                                <div>
                                                    <button type="submit"
                                                        class="admin_job_start_submit">Hochladen</button>
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
@include('components.admin.start_job_confirm_modal')
@include('components.admin.start_job_success_modal')
@include('components.admin.detail_upload_success_modal')
@include('components.admin.end_job_success_modal')
@include('components.admin.delete_detail_file_confirm_modal')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var admin_detail_table;
    var folderType = 'Originaldatei';

    function AdminOpenOrderDetailModal(id, type) {
        $('#admin_order_detail_popup').modal("show");
        folderType = type;
        $('#admin_job_update_div').show();
        $('#admin_job_upload_div').hide();
        $('#admin_green_job').hide();
        $('#admin_yellow_job').hide();

        $('#admin_embroidery_parameter_div').hide();
        $('#admin_vector_parameter_div').hide();
        $('#order_form_upload_list tr').remove();

        $('[name=admin_detail_id]').val(id);
        $('#admin_subfolder_structure1').hide();
        $('#admin_subfolder_structure2').hide();
        $('#admin_subfolder_structure3').hide();
        $.ajax({
            url: '{{ __('routes.admin-get-order-detail') }}',
            type: 'GET',
            data: {
                id
            },
            success: (data) => {
                console.log(data);
                var folderArray = [];
                data.detail.map((item, index) => {
                    item = item.split('/')[3];
                    if (folderArray.filter((el) => el == item).length == 0) {
                        folderArray.push(item);
                    }
                });

                if (data.order.status == 'Offen') {
                    $('#admin_green_job').show();
                } else if (data.order.status == 'In Bearbeitung') {
                    $('#admin_yellow_job').show();
                    // folderArray.forEach((item) => {
                    //     if (item == "Stickprogramm" || item == "Vektordatei") {
                    //         $('#freelancer_job_end_div').show();
                    //     }
                    // })
                }

                console.log(folderArray);
                $('#admin_order_detail_popup').find('#admin_detail_customer_number').text(data.order
                    .customer_number);
                $('[name=admin_detail_id]').val(data.order.id);
                $('#admin_order_detail_popup').find('#admin_detail_order_number').text(data.order
                    .order_number);
                $('#admin_order_detail_popup').find('#admin_detail_project_name').text(data.order
                    .project_name);
                $('#admin_order_detail_popup').find('#admin_detail_size').text(data.order.size);
                $('#admin_order_detail_popup').find('#admin_detail_width_height').text(data.order
                    .width_height);
                $('#admin_order_detail_popup').find('#admin_detail_final_product').text(data.order
                    .products);
                $('#admin_order_detail_popup').find('#admin_detail_special_instructions').text(data
                    .order.special_instructions);
                $data_type = data.order.type;
                if ($data_type == "Vector") {
                    $('.order_size').hide();
                    $('.order_final_product').hide();
                    $('#admin_vector_parameter_div').show();
                } else {
                    $('.order_size').show();
                    $('.order_final_product').show();
                    $('#admin_embroidery_parameter_div').show();
                }
                folderArray.forEach((item) => {
                    if (item == "Originaldatei") {
                        $('#admin_subfolder_structure1').show();

                    } else if (item == "Stickprogramm") {
                        $('#admin_subfolder_structure2').show();
                    } else if (item == "Vektordatei") {
                        $('#admin_subfolder_structure3').show();
                    }
                })
            },
            error: () => {
                console.error('err');
            }
        })

        admin_detail_table = $('#admin_order_detail').DataTable({
            responsive: true,
            language: {

            },
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ __('routes.admin-order-detail') }}',
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

        $('#admin_order_detail_popup').modal("show");
        admin_detail_table.destroy();

        //customer parameter information
        $.ajax({
            url: '{{ __('routes.admin-parameter') }}',
            type: 'GET',
            data: {
                id: $('[name=admin_detail_id]').val()
            },
            success: (data) => {
                console.log(data);
                $('#admin_yarn_information').text(data.parameter1);
                $('#admin_need_embroidery_files').text(data.parameter2);
                $('#admin_cutting_options').text(data.parameter3);
                $('#admin_special_cutting_options').text(data.parameter4);
                $('#admin_needle_instructions').text(data.parameter5);
                $('#admin_standard_instructions').text(data.parameter6);
                $('#admin_special_standard_instructions').text(data.parameter7);
                $('#admin_required_vector_file').text(data.parameter8);
                $('#admin_required_image_file').text(data.parameter9);
            },
            error: () => {
                console.error('error');
            }
        })
    }

    function adminMultipleDownload() {
        window.location.href = '{{ url('multi-download') }}/' + $('[name=admin_detail_id]').val() + '?type=' +
            folderType;
    }
    $('#admin_subfolder_structure1').click(function() {
        AdminOpenOrderDetailModal($('[name=admin_detail_id]').val(), 'Originaldatei');
    });
    $('#admin_subfolder_structure2').click(function() {
        AdminOpenOrderDetailModal($('[name=admin_detail_id]').val(), 'Stickprogramm');
    });
    $('#admin_subfolder_structure3').click(function() {
        AdminOpenOrderDetailModal($('[name=admin_detail_id]').val(), 'Vektordatei');
    });



    function AdminStartJob() {
        AdminStartJobConfirmAlert();
        $('#admin_start_job_confirm').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-startjob') }}',
                type: 'GET',
                data: {
                    start_job_id: $('[name=admin_detail_id]').val()
                },
                success: () => {
                    $('#admin_all_table_reload_button').trigger('click');
                    $('#admin_green_table_reload_button').trigger('click');
                    $('#admin_yellow_table_reload_button').trigger('click');
                    $('#admin_green_job').hide();
                    $('#admin_start_job_confirm_popup').modal('hide');
                    $('#admin_start_job_success_popup').modal('show');
                },
                error: () => {
                    console.error("error");
                }
            })
        })

    }

    function AdminUpdateJob() {
        $('#admin_job_upload_div').show();
        $('#admin_job_update_div').hide();
    }

    $('#admin_job_start_form').submit(function(e) {
        e.preventDefault();
    })
    $('.admin_job_start_submit').click(function(e) {
        e.preventDefault();
        $('[name=admin_change_id]').val("");
        $('[name=admin_request_id]').val("");
        var admin_job_data = new FormData();
        admin_job_data.append('admin_detail_id', $('[name=admin_detail_id]').val());
        $('#admin_job_upload').find('.fileupload-buttonbar .start').trigger('click');
    })

    function AdminEndJob() {
        $.ajax({
            url: '{{ __('routes.admin-endjob') }}',
            type: 'GET',
            data: {
                end_job_id: $('[name=admin_detail_id]').val()
            },
            success: () => {
                $('#admin_all_table_reload_button').trigger('click');
                $('#admin_yellow_table_reload_button').trigger('click');
                $('#admin_red_table_reload_button').trigger('click');
                $('#admin_yellow_job').hide();
                setTimeout(() => {
                    $('#admin_upload_success_popup').modal('hide');
                    $('#admin_end_job_success_popup').modal('show');
                }, 1000);
            },
            error: () => {
                $('#admin_end_job_success_popup').modal('hide');
                EndJobError();
            }
        })
    }

    function AdminDeleteFile(id) {
        $('#admin_delete_detail_file_confirm_popup').modal('show');
        console.log(id);
        $('#admin_delete_detail_file_confirm').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-detail-delete-file') }}' + id,
                type: 'GET',
                success: () => {
                    $('#admin_subfolder_structure1').trigger('click');
                    $('#admin_delete_detail_file_confirm_popup').modal('hide');
                },
                error: () => {
                    console.log("error");
                }
            })
        })
    }

    function AdminStartJobConfirmAlert() {
        $('#admin_start_job_confirm_popup').modal('show');
    }

    function EndJobError() {
        $('#end_job_error_popup').modal('show');
    }
    $(function() {
        $('#admin_detail_file_input').on('change', function() {
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
