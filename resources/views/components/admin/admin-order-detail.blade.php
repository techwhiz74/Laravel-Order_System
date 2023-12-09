<div class="modal fade" id="admin_order_detail_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>
            <div class="row" style="margin-top: -30px;">
                <div class="col-xl-1"></div>
                <div class="col-12 col-xl-10">
                    <div class="pagetitle">Bestelldetails
                    </div>
                    <div style="font-size: 13px; font-family:'Inter';">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="order_detail_div">
                                    <div class="box_title">{{ __('home.detail_box1') }}</div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group form_dv_wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 form_label">
                                                        <label class="control-label">{{ __('home.customer_number') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div id="admin_detail_customer_number"
                                                            class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group form_dv_wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 form_label">
                                                        <label class="control-label">{{ __('home.order_number') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div id="admin_detail_order_number"
                                                            class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group form_dv_wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-3 form_label">
                                                        <label class="control-label">{{ __('home.projectname') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <div id="admin_detail_project_name"
                                                            class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 order_size">
                                            <div class="form-group form_dv_wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 form_label">
                                                        <label class="control-label">{{ __('home.size') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-8 col-md-4">
                                                        <div id="admin_detail_size"
                                                            class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-2 form_label">
                                                        <label class="control-label">mm
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 order_size">
                                            <div class="form-group form_dv_wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 form_label">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div id="admin_detail_width_height"
                                                            class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group form_dv_wrap order_final_product">
                                                <div class="row">
                                                    <div class="col-12 col-md-3 form_label">
                                                        <label class="control-label">{{ __('home.fianl_product') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <div id="admin_detail_final_product"
                                                            class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group form_dv_wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-3 form_label">
                                                        <label
                                                            class="control-label">{{ __('home.special instructions') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <div id="admin_detail_special_instructions"
                                                            class="order_detail_input_div_element"
                                                            style="height:85px !important;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="order_detail_div">
                                    <div class="box_title">{{ __('home.detail_box2') }}</div>
                                    <div id="admin_embroidery_parameter_div">
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.yarn_information') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="admin_yarn_information"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.need_embroidery_files') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="admin_need_embroidery_files"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.cutting_options') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="admin_cutting_options"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.special_cutting_options') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="admin_special_cutting_options"
                                                                class="order_detail_input_div_element"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.needle_instructions') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="admin_needle_instructions"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.standard_instructions') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="admin_standard_instructions"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.special_standard_instructions') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="admin_special_standard_instructions"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="admin_vector_parameter_div">
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.required_vector_file') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="admin_required_vector_file"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.required_image_file') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="admin_required_image_file"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="order_detail_div">
                                    <div class="col-12 file_view_box">
                                        <div class="box_title">Dateiübersicht</div>
                                        <div>
                                            <button class="btn btn-primary btn-sm" onclick="adminMultipleDownload()"
                                                style="background-color:#c3ac6d; border:none; font-size:13px;"><i
                                                    class="fa-solid fa-download"></i>&nbsp&nbsp{{ __('home.alldownload') }}</button>
                                        </div>
                                    </div>
                                    <div class="col-12 file_view_flex_toggle">
                                        <div style="margin-right: 10px;">
                                            <ul class="nav nav-tabs column_flex">
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
                                        <div class="responsive-table file_view_table">
                                            <table id="admin_order_detail" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">
                                                            {{ __('home.customer_number') }}</th>
                                                        <th style="text-align: center">{{ __('home.order_number') }}
                                                        </th>
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
                            <div class="col-12 col-lg-6">
                                <div class="freelancer_job_div">
                                    <div id="admin_green_job">
                                        <div class="box_title">Aktivität-Übersicht</div>
                                        <div id="freelancer_job_start_div">
                                            <button onclick="AdminStartJob()" class="job_button">JOB STARTEN</button>
                                        </div>

                                    </div>
                                    <div id="admin_yellow_job">
                                        <div class="box_title">Aktivität-Übersicht</div>
                                        <div
                                            style="display: flex; flex-direction:column; justify-content:space-between">
                                            <div id="admin_job_update_div">
                                                <button onclick="AdminUpdateJob()" class="job_button">DATEIEN
                                                    HOCHLADEN</button>
                                            </div>
                                            <div id="admin_job_upload_div">
                                                <form action="" id="admin_job_start_form"
                                                    class="box_file_upload_form">
                                                    <input type="hidden" name="admin_detail_id" value="">
                                                    <div style="display: flex;">
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
                                                                    <button type="submit"
                                                                        class="btn btn-primary start"
                                                                        style="visibility: hidden;">
                                                                        <i class="glyphicon glyphicon-upload"></i>
                                                                        <span>Start</span>
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
                                                                class="admin_job_start_submit">HOCHLADEN</button>
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
                <div class="col-xl-1"></div>
            </div>

        </div>
    </div>
</div>
@include('components.admin.start_job_confirm_modal')
@include('components.admin.start_job_success_modal')
@include('components.admin.detail_upload_success_modal')
@include('components.admin.end_job_success_modal')
@include('components.admin.delete_detail_file_confirm_modal')
@include('components.admin.order-count-modal')
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

        $('#admin_yarn_information').text("");
        $('#admin_need_embroidery_files').text("");
        $('#admin_cutting_options').text("");
        $('#admin_special_cutting_options').text("");
        $('#admin_needle_instructions').text("");
        $('#admin_standard_instructions').text("");
        $('#admin_special_standard_instructions').text("");
        $('#admin_required_vector_file').text("");
        $('#admin_required_image_file').text("");
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
                if (data[0] != null) {
                    $('#admin_yarn_information').text(data[0].parameter1);
                    $('#admin_need_embroidery_files').text(data[0].parameter2);
                    $('#admin_cutting_options').text(data[0].parameter3);
                    $('#admin_special_cutting_options').text(data[0].parameter4);
                    $('#admin_needle_instructions').text(data[0].parameter5);
                    $('#admin_standard_instructions').text(data[0].parameter6);
                    $('#admin_special_standard_instructions').text(data[0].parameter7);
                }
                if (data[1] != null) {
                    $('#admin_required_vector_file').text(data[1].parameter8);
                    $('#admin_required_image_file').text(data[1].parameter9);
                }
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
        console.log('aa');
        $('#admin_order_count').modal('show');
        $('#admin_order_count_confirm').click(function() {
            var data = new FormData();
            data.append('count_number', $('[name=admin_order_count_select]').val());
            data.append('order_id', $('[name=admin_detail_id]').val())
            $.ajax({
                url: '{{ __('routes.admin-order-count') }}',
                type: 'post',
                data: data,
                contentType: false,
                processData: false,
                success: () => {
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
                            $('#em_admin_payment_table_reload_button').trigger(
                                'click');
                            $('#ve_admin_payment_table_reload_button').trigger(
                                'click');
                            $('#admin_yellow_job').hide();
                            $('#admin_order_count').modal('hide');
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
                },
                error: () => {
                    console.error('error');
                }
            })
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
