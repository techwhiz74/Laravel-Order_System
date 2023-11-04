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
<div class="modal fade" id="free_order_detail_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div style="height: 50px; font-size:18px;">Bestelldetails Information</div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:120px; margin:0">
                                            <strong>{{ __('home.customer_number') }}</strong>
                                        </p>
                                        <div id="detail_customer_number" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                        <p style="width:120px; margin:0"><strong>{{ __('home.order_number') }}</strong>
                                        </p>
                                        <div id="detail_order_number" class="order_detail_input_div_element"
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
                                        <div id="detail_project_name" class="order_detail_input_div_element"
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
                                        <div id="detail_width_height" class="order_detail_input_div_element"
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
                                        <div id="detail_final_product" class="order_detail_input_div_element"
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
                                        <div id="detail_special_instructions" class="order_detail_input_div_element"
                                            style="width:calc(100% - 120px); height:130px !important; align-items:flex-start !important;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6" style="padding-left: 2.5px">
                        <div class="order_detail_div1">
                            <div style="height: 50px; font-size:18px;">Parameter</div>
                            <div id="embroidery_parameter_div">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.yarn_information') }}</p>
                                            <div id="yarn_information" class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.need_embroidery_files') }}</p>
                                            <div id="need_embroidery_files" class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap" style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.cutting_options') }}</p>
                                            <div id="cutting_options" class="order_detail_input_div_element"
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
                                            <div id="special_cutting_options"class="order_detail_input_div_element"
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
                                            <div id="needle_instructions" class="order_detail_input_div_element"
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
                                            <div id="standard_instructions" class="order_detail_input_div_element"
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
                                            <div id="special_standard_instructions"
                                                class="order_detail_input_div_element"
                                                style="width:calc(100% - 120px);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="vector_parameter_div">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap"
                                            style="display: flex; align-items:center">
                                            <p style="width:200px; margin:0">{{ __('home.required_vector_file') }}</p>
                                            <div id="required_vector_file" class="order_detail_input_div_element"
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
                                            <div id="required_image_file" class="order_detail_input_div_element"
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
                                <div style="font-size:18px;">View Folder Structure</div>
                                <div>
                                    <button class="btn btn-primary btn-sm" onclick="freeMultipleDownload()"
                                        style="background-color:#c3ac6d; border:none; font-size:13px;"><i
                                            class="fa-solid fa-download"></i>&nbsp&nbsp{{ __('home.alldownload') }}</button>
                                </div>
                            </div>
                            <div class="col-12" style="display:flex;">
                                <div style="margin-right: 10px;">
                                    <ul class="nav nav-tabs flex-column"
                                        style="background-color: rgb(244, 244, 244); width:95%; border-bottom:none; padding-left:0px;">
                                        <li class="nav-item">
                                            <div class="folder_button" type="button" id="free_subfolder_structure1">
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
                                            <div class="folder_button" type="button" id="free_subfolder_structure2">
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
                                            <div class="folder_button" type="button" id="free_subfolder_structure3">
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
                                <div class="responsive-table" style="height: 350px; width:100%;">
                                    <table id="free_order_detail" class="table table-striped"
                                        style="width:100%; font-size:13px;">
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
                            <div id="green_job">
                                <div style="height: 50px; font-size:18px;">Start Job</div>
                                <div id="freelancer_job_start_div">
                                    <button onclick="StartJob()" class="job_button">Job starten</button>
                                </div>

                            </div>
                            <div id="yellow_job">
                                <div style="height: 50px; font-size:18px;">Update Job</div>
                                <div style="display: flex; flex-direction:column; justify-content:space-between">
                                    <div id="freelancer_job_update_div">
                                        <button onclick="UpdateJob()" class="job_button">Dateien hochladen</button>
                                    </div>
                                    <div id="freelacner_job_upload_div">
                                        <form action="" id="freelancer_job_start_form">
                                            <input type="hidden" name="free_detail_id" value="">
                                            <div style="display: flex">
                                                <div id="freelancer_job_upload" action="" method="POST"
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
                                                                    accept=".jpg, .png, .pdf, .ai, .dst" />
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
                                                        class="freelancer_job_start_submit">Hochladen</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="freelancer_job_end_div">
                                        <button onclick="EndJob()" class="job_button">Job abschließen</button>
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
@include('components.freelancer.alert_modal')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var free_detail_table;

    function freeOpenOrderDetailModal(id, type) {
        $('#freelancer_job_update_div').show();
        $('#freelacner_job_upload_div').hide();
        $('#freelancer_job_end_div').hide();
        $('#green_job').hide();
        $('#yellow_job').hide();

        $('#embroidery_parameter_div').hide();
        $('#vector_parameter_div').hide();


        $('[name=free_detail_id]').val(id);
        $('#free_subfolder_structure1').hide();
        $('#free_subfolder_structure2').hide();
        $('#free_subfolder_structure3').hide();
        $.ajax({
            url: '{{ __('routes.freelancer-get-order-detail') }}',
            type: 'GET',
            data: {
                id
            },
            success: (data) => {
                var folderArray = [];
                data.detail.map((item, index) => {
                    item = item.split('/')[3];
                    if (folderArray.filter((el) => el == item).length == 0) {
                        folderArray.push(item);
                    }
                });

                if (data.order.status == 'Offen') {
                    $('#green_job').show();
                } else if (data.order.status == 'In Bearbeitung') {
                    $('#yellow_job').show();
                    folderArray.forEach((item) => {
                        if (item == "Stickprogramm" || item == "Vektordatei") {
                            $('#freelancer_job_end_div').show();
                        }
                    })
                }

                console.log(folderArray);
                $('#free_order_detail_popup').find('#detail_customer_number').text(data.order
                    .customer_number);
                $('[name=free_detail_id]').val(data.order.id);
                $('#free_order_detail_popup').find('#detail_order_number').text(data.order.order_number);
                $('#free_order_detail_popup').find('#detail_project_name').text(data.order.project_name);
                $('#free_order_detail_popup').find('#detail_size').text(data.order.size);
                $('#free_order_detail_popup').find('#detail_width_height').text(data.order.width_height);
                $('#free_order_detail_popup').find('#detail_final_product').text(data.order.products);
                $('#free_order_detail_popup').find('#detail_special_instructions').text(data
                    .order.special_instructions);
                $data_type = data.order.type;
                if ($data_type == "Vector") {
                    $('.order_size').hide();
                    $('.order_final_product').hide();
                    $('#vector_parameter_div').show();
                } else {
                    $('.order_size').show();
                    $('.order_final_product').show();
                    $('#embroidery_parameter_div').show();
                }
                folderArray.forEach((item) => {
                    if (item == "Originaldatei") {
                        $('#free_subfolder_structure1').show();
                    } else if (item == "Stickprogramm") {
                        $('#free_subfolder_structure2').show();
                    } else if (item == "Vektordatei") {
                        $('#free_subfolder_structure3').show();
                    }
                })
            },
            error: () => {
                console.error('err');
            }
        })

        free_detail_table = $('#free_order_detail').DataTable({
            responsive: true,
            language: {

            },
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ __('routes.freelancer-order-detail') }}',
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

        $('#free_order_detail_popup').modal("show");
        free_detail_table.destroy();
    }

    function freeMultipleDownload() {
        window.location.href = '{{ url('multi-download') }}/' + $('[name=free_detail_id]').val();
    }
    $('#free_subfolder_structure1').click(function() {
        freeOpenOrderDetailModal($('[name=free_detail_id]').val(), 'Originaldatei');
    });
    $('#free_subfolder_structure2').click(function() {
        freeOpenOrderDetailModal($('[name=free_detail_id]').val(), 'Stickprogramm');
    });
    $('#free_subfolder_structure3').click(function() {
        freeOpenOrderDetailModal($('[name=free_detail_id]').val(), 'Vektordatei');
    });



    function StartJob() {
        console.log($('[name=free_detail_id]').val());
        $.ajax({
            url: '{{ __('routes.embroidery-freelancer-startjob') }}',
            type: 'GET',
            data: {
                start_job_id: $('[name=free_detail_id]').val()
            },
            success: () => {
                $('#em_freelancer_table_reload_btn').trigger('click');
                $('#em_freelancer_all_table_reload_button').trigger('click');
                $('#em_freelancer_green_table_reload_button').trigger('click');
                $('#em_freelancer_yellow_table_reload_button').trigger('click');
                $('#em_freelancer_red_table_reload_button').trigger('click');
                $('#ve_freelancer_table_reload_btn').trigger('click');
                $('#ve_freelancer_all_table_reload_button').trigger('click');
                $('#ve_freelancer_green_table_reload_button').trigger('click');
                $('#ve_freelancer_yellow_table_reload_button').trigger('click');
                $('#ve_freelancer_red_table_reload_button').trigger('click');
                toastr.success(
                    "Der Status änderte sich von grün auf gelb");
            },
            error: () => {
                console.error("error");
            }
        })
    }

    function UpdateJob() {
        $('#freelacner_job_upload_div').show();
        $('#freelancer_job_end_div').show();
        $('#freelancer_job_update_div').hide();
    }

    $('#freelancer_job_start_form').submit(function(e) {
        e.preventDefault();
    })
    $('.freelancer_job_start_submit').click(function(e) {
        e.preventDefault();
        var freelancer_job_data = new FormData();
        freelancer_job_data.append('free_detail_id', $('[name=free_detail_id]').val());
        $('#freelancer_job_upload').find('.fileupload-buttonbar .start').trigger('click');
    })

    function EndJob() {
        $.ajax({
            url: '{{ __('routes.embroidery-freelancer-endjob') }}',
            type: 'GET',
            data: {
                end_job_id: $('[name=free_detail_id]').val()
            },
            success: () => {
                $('#em_freelancer_table_reload_btn').trigger('click');
                $('#em_freelancer_all_table_reload_button').trigger('click');
                $('#em_freelancer_green_table_reload_button').trigger('click');
                $('#em_freelancer_yellow_table_reload_button').trigger('click');
                $('#em_freelancer_red_table_reload_button').trigger('click');
                $('#ve_freelancer_table_reload_btn').trigger('click');
                $('#ve_freelancer_all_table_reload_button').trigger('click');
                $('#ve_freelancer_green_table_reload_button').trigger('click');
                $('#ve_freelancer_yellow_table_reload_button').trigger('click');
                $('#ve_freelancer_red_table_reload_button').trigger('click');

                toastr.success(
                    "Der Status änderte sich von gelb auf rot");
            },
            error: () => {
                console.error("error");
            }
        })
    }

    function DeleteFile(id) {
        console.log(id);
        $.ajax({
            url: '{{ __('routes.freelancer-delete-files') }}' + id,
            type: 'GET',
            success: () => {
                $('#free_subfolder_structure2').trigger('click');
                $('#free_subfolder_structure3').trigger('click');
            },
            error: () => {
                console.log("error");
                DeleteErrorAlert();
            }
        })
    }

    function DeleteErrorAlert() {
        console.log("asdf");
        $('#delete_error').modal('show');
    }
</script>
